<?php
    require_once __DIR__ . "/../_common/db.php";    // Database

    function total($search) {
        global $db;

        $sql =
            "SELECT
                COUNT(v.name) AS total
            FROM
                version v
            WHERE
                v.name LIKE ?
            OR
                v.friendlyName LIKE ?";

        $searchParam = "%" . $search . "%";

        $stmt = $db->prepare($sql);
        $stmt->bind_param("ss", $searchParam, $searchParam);
        $stmt->execute();

        $versions = $stmt->get_result();
        $total = $versions->fetch_assoc();

        $stmt->close();

        return $total;
    }

    function versions($search) {
        global $db;

        $sql =
            "SELECT
                v.*,
                COUNT(k.key) AS total
            FROM
                version v
            LEFT JOIN
                `key` k ON k.version=v.name
            WHERE
                v.name LIKE ?
            OR
                v.friendlyName LIKE ?
            GROUP BY
                v.name
            ORDER BY
                total DESC";

        $searchParam = "%" . $search . "%";

        $stmt = $db->prepare($sql);
        $stmt->bind_param("ss", $searchParam, $searchParam);
        $stmt->execute();

        $versions = $stmt->get_result();

        $stmt->close();

        return $versions;
    }
?>
