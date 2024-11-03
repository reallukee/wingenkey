<?php
    require_once __DIR__ . "/../_common/db.php";    // Database

    function edition($editionParam) {
        global $db;

        $sql =
            "SELECT
                e.*
            FROM
                edition e
            WHERE
                e.name=?";

        $stmt = $db->prepare($sql);
        $stmt->bind_param("s", $editionParam);
        $stmt->execute();

        $result = $stmt->get_result();
        $edition = $result->fetch_assoc();

        $stmt->close();

        return $edition;
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
                k.edition=?
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
                    k.version=?
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
        $stmt->bind_param("siiiissss", $editionParam, $verifiedParam, $verifiedParam, $invalidatedParam, $invalidatedParam, $versionParam, $versionParam, $typeParam, $typeParam);
        $stmt->execute();

        $keys = $stmt->get_result();

        $stmt->close();

        return $keys;
    }

    function verified($editionParam) {
        global $db;

        $sql =
            "SELECT DISTINCT
                COUNT(k.verified) AS total,
                SUM(CASE WHEN k.verified=0 THEN 1 ELSE 0 END) AS notVerified,
                SUM(CASE WHEN k.verified=1 THEN 1 ELSE 0 END) AS verified
            FROM
                `key` k
            WHERE
                k.edition=?";

        $stmt = $db->prepare($sql);
        $stmt->bind_param("s", $editionParam);
        $stmt->execute();

        $result = $stmt->get_result();
        $verified = $result->fetch_assoc();

        $stmt->close();

        return $verified;
    }

    function invalidated($editionParam) {
        global $db;

        $sql =
            "SELECT DISTINCT
                COUNT(k.invalidated) AS total,
                SUM(CASE WHEN k.invalidated=0 THEN 1 ELSE 0 END) AS notInvalidated,
                SUM(CASE WHEN k.invalidated=1 THEN 1 ELSE 0 END) AS invalidated
            FROM
                `key` k
            WHERE
                k.edition=?";

        $stmt = $db->prepare($sql);
        $stmt->bind_param("s", $editionParam);
        $stmt->execute();

        $result = $stmt->get_result();
        $invalidated = $result->fetch_assoc();

        $stmt->close();

        return $invalidated;
    }

    function versions($editionParam) {
        global $db;

        $sql =
            "SELECT DISTINCT
                v.name,
                v.friendlyName,
                COUNT(k.version) AS total
            FROM
                `key` k
            JOIN
                version v ON v.name=k.version
            WHERE
                k.edition=?
            GROUP BY
                v.name,
                v.friendlyName
            ORDER BY
                total DESC";

        $stmt = $db->prepare($sql);
        $stmt->bind_param("s", $editionParam);
        $stmt->execute();

        $versions = $stmt->get_result();

        $stmt->close();

        return $versions;
    }

    function types($editionParam) {
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
                k.edition=?
            GROUP BY
                t.name,
                t.friendlyName
            ORDER BY
                total DESC";

        $stmt = $db->prepare($sql);
        $stmt->bind_param("s", $editionParam);
        $stmt->execute();

        $types = $stmt->get_result();

        $stmt->close();

        return $types;
    }

    function total($editionParam) {
        global $db;

        $sql =
            "SELECT
                COUNT(k.key) AS total
            FROM
                `key` k
            WHERE
                k.edition=?";

        $stmt = $db->prepare($sql);
        $stmt->bind_param("s", $editionParam);
        $stmt->execute();

        $result = $stmt->get_result();
        $total = $result->fetch_assoc();

        $stmt->close();

        return $total;
    }
?>
