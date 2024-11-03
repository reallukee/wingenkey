<?php
    require_once __DIR__ . "/../_common/db.php";    // Database

    function total($search) {
        global $db;

        $sql =
            "SELECT
                COUNT(*) AS total
            FROM
                (
                    SELECT
                        'Version' AS type,
                        v.friendlyName AS value1,
                        v.name AS id
                    FROM
                        version v
                    WHERE
                        v.name LIKE ?
                    OR
                        v.friendlyName LIKE ?
                    UNION ALL
                    SELECT
                        'Edition' AS type,
                        e.friendlyName AS value1,
                        e.name AS id
                    FROM
                        edition e
                    WHERE
                        e.name LIKE ?
                    OR
                        e.friendlyName LIKE ?
                    UNION ALL
                    SELECT
                        'Type' AS type,
                        t.friendlyName AS value1,
                        t.name AS id
                    FROM
                        type t
                    WHERE
                        t.name LIKE ?
                    OR
                        t.friendlyName LIKE ?
                ) AS latot";

        $searchParam = "%" . $search . "%";

        $stmt = $db->prepare($sql);
        $stmt->bind_param("ssssss", $searchParam, $searchParam, $searchParam, $searchParam, $searchParam, $searchParam);
        $stmt->execute();

        $search = $stmt->get_result();
        $total = $search->fetch_assoc();

        $stmt->close();

        return $total;
    }

    function search($search) {
        global $db;

        $sql =
            "SELECT
                'Version' AS type,
                v.friendlyName AS value1,
                v.name AS id
            FROM
                version v
            WHERE
                v.name LIKE ?
            OR
                v.friendlyName LIKE ?
            UNION ALL
            SELECT
                'Edition' AS type,
                e.friendlyName AS value1,
                e.name AS id
            FROM
                edition e
            WHERE
                e.name LIKE ?
            OR
                e.friendlyName LIKE ?
            UNION ALL
            SELECT
                'Type' AS type,
                t.friendlyName AS value1,
                t.name AS id
            FROM
                type t
            WHERE
                t.name LIKE ?
            OR
                t.friendlyName LIKE ?";

        $searchParam = "%" . $search . "%";

        $stmt = $db->prepare($sql);
        $stmt->bind_param("ssssss", $searchParam, $searchParam, $searchParam, $searchParam, $searchParam, $searchParam);
        $stmt->execute();

        $keys = $stmt->get_result();

        $stmt->close();

        return $keys;
    }
?>
