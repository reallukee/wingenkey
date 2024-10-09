<?php
    require_once __DIR__ . "/../_common/db.php";    // Database

    function version($versionParam) {
        global $db;

        $sql =
            "SELECT
                v.*
            FROM
                version v
            WHERE
                v.name=?";

        $stmt = $db->prepare($sql);
        $stmt->bind_param("s", $versionParam);
        $stmt->execute();

        $result = $stmt->get_result();
        $version = $result->fetch_assoc();

        $stmt->close();

        return $version;
    }

    function keys($verifiedParam, $invalidatedParam, $versionParam, $editionParam, $typeParam) {
        global $db;

        $sql =
            "SELECT
                k.*,
                v.friendlyName AS version,
                e.friendlyName AS edition,
                t.friendlyName AS type
            FROM
                `key` k
            JOIN
                version v ON v.name=k.version
            JOIN
                edition e ON e.name=k.edition
            JOIN
                type t ON t.name=k.type
            WHERE
                k.version=?
            AND
                (
                    k.verified=?
                OR
                    ? IS NULL
                )
            AND
                (
                    k.invalidated=?
                OR
                    ? IS NULL
                )
            AND
                (
                    k.edition=?
                OR
                    ? IS NULL
                )
            AND
                (
                    k.type=?
                OR
                    ? IS NULL
                )";

        $stmt = $db->prepare($sql);
        $stmt->bind_param("siiiissss", $versionParam, $verifiedParam, $verifiedParam, $invalidatedParam, $invalidatedParam, $editionParam, $editionParam, $typeParam, $typeParam);
        $stmt->execute();

        $keys = $stmt->get_result();

        $stmt->close();

        return $keys;
    }

    function verified($versionParam) {
        global $db;

        $sql =
            "SELECT DISTINCT
                COUNT(k.verified) AS total,
                SUM(CASE WHEN k.verified=0 THEN 1 ELSE 0 END) AS notVerified,
                SUM(CASE WHEN k.verified=1 THEN 1 ELSE 0 END) AS verified
            FROM
                `key` k
            WHERE
                k.version=?";

        $stmt = $db->prepare($sql);
        $stmt->bind_param("s", $versionParam);
        $stmt->execute();

        $result = $stmt->get_result();
        $verified = $result->fetch_assoc();

        $stmt->close();

        return $verified;
    }

    function invalidated($versionParam) {
        global $db;

        $sql =
            "SELECT DISTINCT
                COUNT(k.invalidated) AS total,
                SUM(CASE WHEN k.invalidated=0 THEN 1 ELSE 0 END) AS notInvalidated,
                SUM(CASE WHEN k.invalidated=1 THEN 1 ELSE 0 END) AS invalidated
            FROM
                `key` k
            WHERE
                k.version=?";

        $stmt = $db->prepare($sql);
        $stmt->bind_param("s", $versionParam);
        $stmt->execute();

        $result = $stmt->get_result();
        $invalidated = $result->fetch_assoc();

        $stmt->close();

        return $invalidated;
    }

    function editions($versionParam) {
        global $db;

        $sql =
            "SELECT DISTINCT
                e.name,
                e.friendlyName,
                COUNT(k.edition) AS total
            FROM
                `key` k
            JOIN
                edition e ON e.name=k.edition
            WHERE
                k.version=?
            GROUP BY
                e.name,
                e.friendlyName
            ORDER BY
                total DESC";

        $stmt = $db->prepare($sql);
        $stmt->bind_param("s", $versionParam);
        $stmt->execute();

        $editions = $stmt->get_result();

        $stmt->close();

        return $editions;
    }

    function types($versionParam) {
        global $db;

        $sql =
            "SELECT DISTINCT
                t.name,
                t.friendlyName,
                COUNT(k.type) AS total
            FROM
                `key` k
            JOIN
                type t ON t.name=k.type
            WHERE
                k.version=?
            GROUP BY
                t.name,
                t.friendlyName
            ORDER BY
                total DESC";

        $stmt = $db->prepare($sql);
        $stmt->bind_param("s", $versionParam);
        $stmt->execute();

        $types = $stmt->get_result();

        $stmt->close();

        return $types;
    }

    function total($versionParam) {
        global $db;

        $sql =
            "SELECT
                COUNT(k.key) AS total
            FROM
                `key` k
            WHERE
                k.version=?";

        $stmt = $db->prepare($sql);
        $stmt->bind_param("s", $versionParam);
        $stmt->execute();

        $result = $stmt->get_result();
        $total = $result->fetch_assoc();

        $stmt->close();

        return $total;
    }
?>
