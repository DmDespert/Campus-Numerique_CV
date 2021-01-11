<?php
// Front-Controler
// FILTER_VALIDATE_URL
// INPUT_GET
// Restez sur une structure de IF / ELSEIF / ELSE.
// $pages_url = filter_input(INPUT_GET, 'pages', FILTER_SANITIZE_ENCODED);

    $accueil = 'pages/accueil.php';
    $hobbies = 'pages/hobbies.php';
    $contact = 'pages/contact.php';
    $page404 = 'pages/404.php';


    $url = $_GET['pages'];

    if ($url == 'accueil') {
        require $accueil;
    } else if ($url == 'hobbies') {
        require $hobbies;
    } else if ($url == 'contact') {
        require $contact;
    } else {
        require $page404;
    }

