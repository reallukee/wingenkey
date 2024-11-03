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

    function versions($search, $sort) {
        global $db;

        if ($sort == "up") {
            $sort = "DESC";
        }

        if ($sort == "down") {
            $sort = "ASC";
        }

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
                total $sort";

        $searchParam = "%" . $search . "%";

        $stmt = $db->prepare($sql);
        $stmt->bind_param("ss", $searchParam, $searchParam);
        $stmt->execute();

        $versions = $stmt->get_result();

        $stmt->close();

        return $versions;
    }

    function create($name, $friendlyName) {
        try {
            global $db;

            $sql =
                "INSERT INTO
                    version
                VALUES
                    (?, ?)";

            $stmt = $db->prepare($sql);
            $stmt->bind_param("ss", $name, $friendlyName);
            $stmt->execute();

            $stmt->close();
        } catch (Exception $e) {
            header("location: ../versions.php");
        }
    }

    function update($name, $friendlyName) {
        global $db;

        $sql =
            "UPDATE
                version v
            SET
                v.friendlyName=?
            WHERE
                v.name=?";

        $stmt = $db->prepare($sql);
        $stmt->bind_param("ss", $friendlyName, $name);
        $stmt->execute();

        $stmt->close();
    }

    function remove($name) {
        global $db;

        $sql =
            "DELETE FROM
                version v
            WHERE
                v.name=?";

        $stmt = $db->prepare($sql);
        $stmt->bind_param("s", $name);
        $stmt->execute();

        $stmt->close();
    }
?>
