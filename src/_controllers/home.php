<?php
    require_once __DIR__ . "/../_common/db.php";    // Database

    function keys() {
        global $db;

        $sql =
            "SELECT
                COUNT(k.key) AS total
            FROM
                `key` k";

        $stmt = $db->prepare($sql);
        $stmt->execute();

        $result = $stmt->get_result();
        $key = $result->fetch_assoc();

        $stmt->close();

        return $key;
    }

    function versions() {
        global $db;

        $sql =
            "SELECT
                COUNT(v.name) AS total
            FROM
                version v";

        $stmt = $db->prepare($sql);
        $stmt->execute();

        $result = $stmt->get_result();
        $version = $result->fetch_assoc();

        $stmt->close();

        return $version;
    }

    function editions() {
        global $db;

        $sql =
            "SELECT
                COUNT(e.name) AS total
            FROM
                edition e";

        $stmt = $db->prepare($sql);
        $stmt->execute();

        $result = $stmt->get_result();
        $edition = $result->fetch_assoc();

        $stmt->close();

        return $edition;
    }

    function types() {
        global $db;

        $sql =
            "SELECT
                COUNT(t.name) AS total
            FROM
                type t";

        $stmt = $db->prepare($sql);
        $stmt->execute();

        $result = $stmt->get_result();
        $type = $result->fetch_assoc();

        $stmt->close();

        return $type;
    }
?>
