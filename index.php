<?php
// Front-Controler
// FILTER_VALIDATE_URL
// INPUT_GET
// Restez sur une structure de IF / ELSEIF / ELSE.
// $pages_url = filter_input(INPUT_GET, 'pages', FILTER_SANITIZE_ENCODED);

    session_start();

    $dateFirstVisit = $_SESSION['date'];
    $countViewPage = $_SESSION['pagesVues'];

    if(empty($_COOKIE['PHPSESSID'])) {
        $_SESSION['date'] = date("Y-m-d H:i:s", $timestamp = null);
    }
    if (!isset($_SESSION['pagesVues'])) {
        $_SESSION['pagesVues'] = 1;
    }
    else {
        $_SESSION['pagesVues'] ++;
    }

    $accueil = 'pages/accueil.php';
    $hobbies = 'pages/hobbies.php';
    $contact = 'pages/contact.php';
    $page404 = 'pages/404.php';

    $url = filter_input(INPUT_GET, 'pages', FILTER_SANITIZE_ENCODED);
    $urlIssetTest = isset($url);

    if ($urlIssetTest === true) {
        if ($url === 'accueil') {
            $metaTitle = 'Accueil - D.Despert';
            $metaDescription = 'Bienvenue sur mon CV, vous trouverez ici mes références 
                        professionnelles ainsi que mon parcours et mes expériences';
            $pageTitle = 'D&Eacute;veloppeur web<br>front-end & back-end';
            require $accueil;
        } else if ($url === 'hobbies') {
            $metaTitle = 'Hobbies - D.Despert';
            $metaDescription = 'Ceci est ma page des hobbies, vous y trouverez 
                        mes passions de la vie de tous les jours';
            $pageTitle = 'MES HOBBIES';
            require $hobbies;
        } else if ($url === 'contact') {
            $metaTitle = 'Contact - D.Despert';
            $metaDescription = 'Contactez directement Dimitri Despert. Si vous avez 
                        des questions, un formulaire est mis à votre disposition';
            $pageTitle = 'ME CONTACTER';
            require $contact;
        } else {
            $metaTitle = '404 - D.Despert';
            $metaDescription = "Page d'erreur du site internet";
            $pageTitle = '404 ERROR';
            require $page404;
        }
    } else {
        header("Location: /index.php?pages=accueil",TRUE,301);
    }

    unset($_SESSION);





