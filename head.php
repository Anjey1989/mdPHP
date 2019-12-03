<?php
    session_start();

    require('utilities/DB.php');
    require('models/User.php');
    require('models/Article.php');

    $db = new DB();
    $user = null;

    if (isset($_SESSION['user_id'])) {
        $user = User::get($_SESSION['user_id']);
    }

    require('functions.php');


    if (isset($_GET['logout'])) {
        session_destroy();
        header('Location: index.php');
    }
?>
