<?php
    /*
        Model: To be hooked to the poll controller and render on the front controller
    */
    define("DB_INFO", "mysql:host=localhost;dbname=depdiv");
    define("DB_USER", "root");
    define("DB_PASSWORD", "");

    try {
        $database = new PDO(DB_INFO, DB_USER, DB_PASSWORD);
    } catch(PDOException $e) {
        $error_message = $e->getMessage();
        $page_data->setContent("<h1>Connection failed!</h1><p>$e</p>");
        exit();
    }
?>