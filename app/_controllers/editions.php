<?php
    require_once __DIR__ . "/../_common/db.php";    // Database

    function total($search) {
        global $db;

        $sql =
            "SELECT
                COUNT(e.name) AS total
            FROM
                edition e
            WHERE
                e.name LIKE ?
            OR
                e.friendlyName LIKE ?";

        $searchParam = "%" . $search . "%";

        $stmt = $db->prepare($sql);
        $stmt->bind_param("ss", $searchParam, $searchParam);
        $stmt->execute();

        $editions = $stmt->get_result();
        $total = $editions->fetch_assoc();

        $stmt->close();

        return $total;
    }

    function editions($search) {
        global $db;

        $sql =
            "SELECT
                e.*,
                COUNT(k.key) AS total
            FROM
                edition e
            LEFT JOIN
                `key` k ON k.edition=e.name
            WHERE
                e.name LIKE ?
            OR
                e.friendlyName LIKE ?
            GROUP BY
                e.name
            ORDER BY
                total DESC";

        $searchParam = "%" . $search . "%";

        $stmt = $db->prepare($sql);
        $stmt->bind_param("ss", $searchParam, $searchParam);
        $stmt->execute();

        $editions = $stmt->get_result();

        $stmt->close();

        return $editions;
    }
?>
