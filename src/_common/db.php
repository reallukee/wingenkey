<?php
    require_once __DIR__ . "/config.php";

    $host = $DB_HOST;
    $user = $DB_USER;
    $password = $DB_PASSWORD;
    $database = $DB_DATABASE;

    $db = new mysqli($host, $user, $password, $database);

    if ($db->connect_error) {
        die($db->connect_error);
    }
?>
