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

    function types($search, $sort) {
        global $db;

        if ($sort == "up") {
            $sort = "DESC";
        }

        if ($sort == "down") {
            $sort = "ASC";
        }

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
                total $sort";

        $searchParam = "%" . $search . "%";

        $stmt = $db->prepare($sql);
        $stmt->bind_param("ss", $searchParam, $searchParam);
        $stmt->execute();

        $types = $stmt->get_result();

        $stmt->close();

        return $types;
    }

    function create($name, $friendlyName) {
        try {
            global $db;

            $sql =
                "INSERT INTO
                    type
                VALUES
                    (?, ?)";

            $stmt = $db->prepare($sql);
            $stmt->bind_param("ss", $name, $friendlyName);
            $stmt->execute();

            $stmt->close();
        } catch (Exception $e) {
            header("location: ../types.php");
        }
    }

    function update($name, $friendlyName) {
        global $db;

        $sql =
            "UPDATE
                type t
            SET
                t.friendlyName=?
            WHERE
                t.name=?";

        $stmt = $db->prepare($sql);
        $stmt->bind_param("ss", $friendlyName, $name);
        $stmt->execute();

        $stmt->close();
    }

    function remove($name) {
        global $db;

        $sql =
            "DELETE FROM
                type t
            WHERE
                t.name=?";

        $stmt = $db->prepare($sql);
        $stmt->bind_param("s", $name);
        $stmt->execute();

        $stmt->close();
    }
?>
