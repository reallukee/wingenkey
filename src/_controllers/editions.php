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

    function editions($search, $sort) {
        global $db;

        if ($sort == "up") {
            $sort = "DESC";
        }

        if ($sort == "down") {
            $sort = "ASC";
        }

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
                total $sort";

        $searchParam = "%" . $search . "%";

        $stmt = $db->prepare($sql);
        $stmt->bind_param("ss", $searchParam, $searchParam);
        $stmt->execute();

        $editions = $stmt->get_result();

        $stmt->close();

        return $editions;
    }

    function create($name, $friendlyName) {
        try {
            global $db;

            $sql =
                "INSERT INTO
                    edition
                VALUES
                    (?, ?)";

            $stmt = $db->prepare($sql);
            $stmt->bind_param("ss", $name, $friendlyName);
            $stmt->execute();

            $stmt->close();
        } catch (Exception $e) {
            header("location: ../editions.php");
        }
    }

    function update($name, $friendlyName) {
        global $db;

        $sql =
            "UPDATE
                edition e
            SET
                e.friendlyName=?
            WHERE
                e.name=?";

        $stmt = $db->prepare($sql);
        $stmt->bind_param("ss", $friendlyName, $name);
        $stmt->execute();

        $stmt->close();
    }

    function remove($name) {
        global $db;

        $sql =
            "DELETE FROM
                edition e
            WHERE
                e.name=?";

        $stmt = $db->prepare($sql);
        $stmt->bind_param("s", $name);
        $stmt->execute();

        $stmt->close();
    }
?>
