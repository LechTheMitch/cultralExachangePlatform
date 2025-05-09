<?php
    namespace Controller;
    require_once "DBController.php";
    require_once "AdminController.php";

    $demon = new DBController();
    $demon->openConnection();
    //echo AdminController::generateRevenueReport();
    DBController::insertWithStyle(1, 5445646, 07, 56, 10003);
    //var_dump($demon->getUserById(1));
