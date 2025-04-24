<?php
    require_once "DBController.php";
    use Controller\DBController;
    $demon = new DBController();
    $demon->openConnection();
    //var_dump($demon->getUserById(1));
    var_dump($demon->getUserByEmail('ahmed@example.com'));
