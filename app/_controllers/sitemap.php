<?php
    require_once __DIR__ . "/../_common/db.php";    // Database

    function total() {
        global $db;

        $sql =
            "SELECT
                COUNT(k.key) AS total
            FROM
                `key` k";

        $stmt = $db->prepare($sql);
        $stmt->execute();

        $result = $stmt->get_result();
        $total = $result->fetch_assoc();

        $stmt->close();

        return $total;
    }

    function keys() {
        global $db;

        $sql =
            "SELECT
                k.key,
                COUNT(k.key) AS total
            FROM
                `key` k
            GROUP BY
                k.key
            ORDER BY
                total DESC";

        $stmt = $db->prepare($sql);
        $stmt->execute();

        $keys = $stmt->get_result();

        $stmt->close();

        return $keys;
    }

    function versions() {
        global $db;

        $sql =
            "SELECT
                v.name,
                v.friendlyName,
                COUNT(k.edition) AS total
            FROM
                `key` k
            RIGHT JOIN
                version v ON v.name=k.version
            GROUP BY
                v.name,
                v.friendlyName
            ORDER BY
                total DESC";

        $stmt = $db->prepare($sql);
        $stmt->execute();

        $versions = $stmt->get_result();

        $stmt->close();

        return $versions;
    }

    function editions() {
        global $db;

        $sql =
            "SELECT DISTINCT
                e.name,
                e.friendlyName,
                COUNT(k.edition) AS total
            FROM
                `key` k
            RIGHT JOIN
                edition e ON e.name=k.edition
            GROUP BY
                e.name,
                e.friendlyName
            ORDER BY
                total DESC";

        $stmt = $db->prepare($sql);
        $stmt->execute();

        $editions = $stmt->get_result();

        $stmt->close();

        return $editions;
    }

    function types() {
        global $db;

        $sql =
            "SELECT DISTINCT
                t.name,
                t.friendlyName,
                COUNT(k.type) AS total
            FROM
                `key` k
            RIGHT JOIN
                type t ON t.name=k.type
            GROUP BY
                t.name,
                t.friendlyName
            ORDER BY
                total DESC";

        $stmt = $db->prepare($sql);
        $stmt->execute();

        $types = $stmt->get_result();

        $stmt->close();

        return $types;
    }
?>
