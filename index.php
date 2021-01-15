<?php

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
    ];

    $pagesMetaTitles = [
        'accueil' => $metaTitle = 'Accueil - D.Despert',
        'hobbies' => $metaTitle = 'Hobbies - D.Despert',
        'contact' => $metaTitle = 'Contact - D.Despert'
    ];

    $pagesMetaDescriptions = [
        'accueil' => $metaDescription = 'Bienvenue sur mon CV, vous trouverez ici mes références professionnelles ainsi que mon parcours et mes expériences',
        'hobbies' => $metaDescription = 'Ceci est ma page des hobbies, vous y trouverez mes passions de la vie de tous les jours',
        'contact' => $metaDescription = 'Contactez directement Dimitri Despert. Si vous avez des questions, un formulaire est mis à votre disposition'
    ];

    $pagesTitles = [
        'accueil' => $pageTitle = 'D&Eacute;veloppeur web<br>front-end & back-end',
        'hobbies' => $pageTitle = 'MES HOBBIES',
        'contact' => $pageTitle = 'ME CONTACTER'
    ];

    if ($urlIssetTest === true) {
        if (array_key_exists($url, $route)) {
            $isRoad = $route[$url];
        } else {
            $isRoad = 'pages/404.php';
        }
    } else {
        header("Location: /index.php?pages=accueil",TRUE,301);
    }

    ob_start();
    require('elements/header.php');
    require $isRoad;
    require('elements/footer.php');
    $render = ob_get_contents();
    ob_end_clean();

    echo $render;

    unset($_SESSION);

?>



