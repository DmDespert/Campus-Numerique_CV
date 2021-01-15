<?php

    //----FRONT CONTROLER----//

    //Initialisation de la session Php (création du cookie)
    session_start();

    $url = filter_input(INPUT_GET, 'pages', FILTER_SANITIZE_ENCODED);
    $urlIsSet = isset($url);

    //Dictionnaire des routes
    $route = [
        'accueil' => 'pages/accueil.php',
        'hobbies' => 'pages/hobbies.php',
        'contact' => 'pages/contact.php',
    ];

    //Tableau des metatitles
    $pagesMetaTitles = [
        'accueil' => $metaTitle = 'Accueil - D.Despert',
        'hobbies' => $metaTitle = 'Hobbies - D.Despert',
        'contact' => $metaTitle = 'Contact - D.Despert',
        '404'     => $metaTitle = '404 - D.Despert'
    ];

    //Tableau des metadescription
    $pagesMetaDescriptions = [
        'accueil' => $metaDescription = 'Bienvenue sur mon CV, vous trouverez ici mes références professionnelles ainsi que mon parcours et mes expériences',
        'hobbies' => $metaDescription = 'Ceci est ma page des hobbies, vous y trouverez mes passions de la vie de tous les jours',
        'contact' => $metaDescription = 'Contactez directement Dimitri Despert. Si vous avez des questions, un formulaire est mis à votre disposition',
        '404'     => $metaDescription = "Page d'erreur du site internet"
    ];

    //Tableau des titres des pages dans le header
    $pagesTitles = [
        'accueil' => $pageTitle = 'D&Eacute;veloppeur web<br>front-end & back-end',
        'hobbies' => $pageTitle = 'MES HOBBIES',
        'contact' => $pageTitle = 'ME CONTACTER',
        '404'     => $pageTitle = '404 ERROR'
    ];

    //Test des routes du Front-Controler
    if ($urlIsSet === true) {
        if (array_key_exists($url, $route)) {
            $isRoad = $route[$url];
        } else {
            $url = '404';
            $isRoad = 'pages/404.php';
        }
    } else {
        header("Location: /index.php?pages=accueil",TRUE,301);
    }

    //----PAGES VUES && DATES PREMIERE VISITE----//

    if (!isset($_SESSION['pagesVues']) && !isset($_SESSION['date'])) {
        $_SESSION['date'] = date("Y-m-d H:i:s", $timestamp = null);
        $_SESSION['pagesVues'] = 1;
    }
    else {
        $_SESSION['pagesVues'] ++;
        $dateFirstVisit = $_SESSION['date'];
    }

    $countViewPage = $_SESSION['pagesVues'];

    //----FORMULAIRE----//

    //Récupération des variables en POST
    $champCivilite = filter_input(INPUT_POST, 'genre', FILTER_SANITIZE_STRING);
    $champNom = trim(filter_input(INPUT_POST, 'nom', FILTER_SANITIZE_STRING));
    $champPrenom = trim(filter_input(INPUT_POST, 'prenom', FILTER_SANITIZE_STRING));
    $champEmail = trim(filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL));
    $champRaison = filter_input(INPUT_POST, 'raison', FILTER_SANITIZE_STRING);
    $demande = trim(filter_input(INPUT_POST, 'textarea', FILTER_SANITIZE_STRING));

    //On réinitialise le status des variables pour les champs manquants.
    $errorCivilite = null;
    $errorNom = null;
    $errorPrenom = null;
    $errorEmail = null;
    $errorRaison = null;
    $textareaToShort = null;

    //Tableau des erreurs du formulaire
    $formErrors = array (
        "civilite" => "Requis",
        "nom" =>  "Requis",
        "prenom" => "Requis",
        "email" => "Vérifiez l'email",
        "raison" => "Requis",
        "demande" => "Ce champ doit contenir au moins 5 caractères<br>"
    );

    //Affiche la phrase d'envoi confirmé, ou de formulaire incomplet
    $formIsValidORnot = "";
    $formIsValid = "Votre demande a bien été envoyée.";
    $formIsNotValid = "Formulaire incomplet, veuillez respecter les champs";

    //Non validité générale du formulaire
    $isNotValid = false;

    //Condition d'envoie de formulaire
    if(isset($_POST['submit'])) {
        if (strlen($demande) < 5) {
            $textareaToShort = $formErrors["demande"];
            $isNotValid = true;
            $validORnot = $formIsNotValid;
        }
        if (empty($champCivilite)) {
            $errorCivilite = $formErrors["civilite"];
            $isNotValid = true;
            $validORnot = $formIsNotValid;
        }
        if (empty($champNom)) {
            $errorNom = $formErrors["nom"];
            $isNotValid = true;
            $validORnot = $formIsNotValid;
        }
        if (empty($champPrenom)) {
            $errorPrenom = $formErrors["prenom"];
            $isNotValid = true;
            $validORnot = $formIsNotValid;
        }
        if (empty($champEmail)) {
            $errorEmail = $formErrors["email"];
            $isNotValid = true;
            $validORnot = $formIsNotValid;
        }
        if (empty($champRaison)) {
            $errorRaison = $formErrors["raison"];
            $isNotValid = true;
            $validORnot = $formIsNotValid;
        }
        if ($isNotValid == false) {
            $date = date("Y-m-d H:i:s");
            //On écrit dans le fichier BDD_Contacts.txt qui stock les informations du formulaire
            file_put_contents("formulaires/contact_$date.txt",
                'Nouveau contact :' . "\n"
                . 'Civilité : ' . $champCivilite . "\n"
                . 'Nom : ' . $champNom . "\n"
                . 'Prénom : ' . $champPrenom . "\n"
                . 'Email : ' . $champEmail . "\n"
                . 'Raison du contact : ' . $champRaison . "\n"
                . 'Demande : ' . $demande . "\n"
                . "\n",
                FILE_APPEND);

            $validORnot = $formIsValid;
        }
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



