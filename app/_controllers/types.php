<?php
    require_once __DIR__ . "/../_common/db.php";    // Database

    function total($search) {
        global $db;

        $sql =
            "SELECT
                COUNT(t.name) AS total
            FROM
                type t
            WHERE
                t.name LIKE ?
            OR
                t.friendlyName LIKE ?";

        $searchParam = "%" . $search . "%";

        $stmt = $db->prepare($sql);
        $stmt->bind_param("ss", $searchParam, $searchParam);
        $stmt->execute();

        $types = $stmt->get_result();
        $total = $types->fetch_assoc();

        $stmt->close();

        return $total;
    }

    function types($search) {
        global $db;

        $sql =
            "SELECT
                t.*,
                COUNT(k.key) AS total
            FROM
                type t
            LEFT JOIN
                `key` k ON k.type=t.name
            WHERE
                t.name LIKE ?
            OR
                t.friendlyName LIKE ?
            GROUP BY
                t.name
            ORDER BY
                total DESC";

        $searchParam = "%" . $search . "%";

        $stmt = $db->prepare($sql);
        $stmt->bind_param("ss", $searchParam, $searchParam);
        $stmt->execute();

        $types = $stmt->get_result();

        $stmt->close();

        return $types;
    }
?>
