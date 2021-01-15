<?php
// Front-Controler
// FILTER_VALIDATE_URL
// INPUT_GET
// Restez sur une structure de IF / ELSEIF / ELSE.
// $pages_url = filter_input(INPUT_GET, 'pages', FILTER_SANITIZE_ENCODED);

    session_start();

    if (!isset($_SESSION['pagesVues']) && ($_COOKIE['PHPSESSID'])) {
        $_SESSION['date'] = date("Y-m-d H:i:s", $timestamp = null);
        $_SESSION['pagesVues'] = 1;
    }
    else {
        $_SESSION['pagesVues'] ++;
    }

    $dateFirstVisit = $_SESSION['date'];
    $countViewPage = $_SESSION['pagesVues'];

    $url = filter_input(INPUT_GET, 'pages', FILTER_SANITIZE_ENCODED);
    $urlIssetTest = isset($url);

    $route = [
        'accueil' => 'pages/accueil.php',
        'hobbies' => 'pages/hobbies.php',
        'contact' => 'pages/contact.php',
        'page404' => 'pages/404.php'
    ];

    if ($urlIssetTest === true) {
        if (array_key_exists($url, $route)) {
            require $route[$url];
        } else {
            require 'pages/404.php';
        }

    } else {
        header("Location: /index.php?pages=accueil",TRUE,301);
    }

    unset($_SESSION);





