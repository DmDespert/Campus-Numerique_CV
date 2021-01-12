<?php
    //Récupération de la valeur des radios
    $civilite = filter_input(INPUT_POST, 'genre', FILTER_SANITIZE_STRING);

    //Récupération du nom et prénom
    $nom = filter_input(INPUT_POST, 'nom', FILTER_SANITIZE_STRING);
    $prenom = filter_input(INPUT_POST, 'prenom', FILTER_SANITIZE_STRING);

    //Récupération email - FILTER_VALIDATE_EMAIL validation et FILTER_SANITIZE_EMAIL assainie email
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);

    //Récupération de la raison du contact
    $raisonContact = filter_input(INPUT_POST, 'raison', FILTER_SANITIZE_STRING);

    //Récupération du textarea
    $demande = filter_input(INPUT_POST, 'textarea', FILTER_SANITIZE_STRING);

    //On range les champs du formulaire dans un tableau
    $rangementFormulaire = [
        $civilite,
        $nom,
        $prenom,
        $email,
        $raisonContact,
        $demande
    ];

    //Fonction qui test chacuns champs du tableau
    function testTableau($tableau) {
        $i = 0;
        while ($i < count($tableau)) {
            $zoneDeTest = $tableau[$i];
            if (strlen($zoneDeTest) === 0) {
                return false;
            }
            $i++;
        }
        return true;
    }

    if (!testTableau($rangementFormulaire) || strlen($demande) < 5) {
        if (strlen($demande) < 5) {
            echo "Veuillez remplir au moins 5 caractères dans votre demande <br>";
        }
        echo "Vous n'avez pas remplis tous les champs demandés";
    } else {
        //On ouvre le fichier texte
        $fichierContact = fopen('contacts.txt', 'r+');

        //On écrit dedans
        fwrite($fichierContact, 'Civilité : ' . $civilite . "\n");
        fwrite($fichierContact, 'Nom : ' . $nom . "\n");
        fwrite($fichierContact, 'Prénom : ' . $prenom . "\n");
        fwrite($fichierContact, 'Email : ' . $email . "\n");
        fwrite($fichierContact, 'Raison du contact : ' . $raisonContact . "\n");
        fwrite($fichierContact, 'Demande : ' . $demande . "\n");

        //On referme le fichier texte
        fclose($fichierContact);

        echo "Votre demande a bien été envoyée.";
    }

?>

<meta http-equiv="refresh" content="3; URL=/index.php?pages=contact">