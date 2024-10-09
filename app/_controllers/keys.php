<?php
    require_once __DIR__ . "/../_common/db.php";    // Database

    function total($search) {
        global $db;

        $sql =
            "SELECT
                COUNT(k.key) AS total
            FROM
                `key` k
            WHERE
                k.key LIKE ?";

        $searchParam = "%" . $search . "%";

        $stmt = $db->prepare($sql);
        $stmt->bind_param("s", $searchParam);
        $stmt->execute();

        $keys = $stmt->get_result();
        $total = $keys->fetch_assoc();

        $stmt->close();

        return $total;
    }

    function keys($search) {
        global $db;

        $sql =
            "SELECT
                k.key,
                COUNT(k.key) AS total
            FROM
                `key` k
            WHERE
                k.key LIKE ?
            GROUP BY
                k.key
            ORDER BY
                total DESC";

        $searchParam = "%" . $search . "%";

        $stmt = $db->prepare($sql);
        $stmt->bind_param("s", $searchParam);
        $stmt->execute();

        $keys = $stmt->get_result();

        $stmt->close();

        return $keys;
    }
?>
