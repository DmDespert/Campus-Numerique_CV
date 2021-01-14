<?php require('elements/header.php');

    //Récupération de la valeur des radios
    $champCivilite = filter_input(INPUT_POST, 'genre', FILTER_SANITIZE_STRING);

    //Récupération du nom et prénom
    $champNom = filter_input(INPUT_POST, 'nom', FILTER_SANITIZE_STRING);
    $champPrenom = filter_input(INPUT_POST, 'prenom', FILTER_SANITIZE_STRING);

    //Récupération email - FILTER_VALIDATE_EMAIL validation et FILTER_SANITIZE_EMAIL assainie email
    $champEmail = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);

    //Récupération de la raison du contact
    $champRaison = filter_input(INPUT_POST, 'raison', FILTER_SANITIZE_STRING);

    //Récupération du textarea
    $demande = filter_input(INPUT_POST, 'textarea', FILTER_SANITIZE_STRING);

    //On réinitialise le status des variables qui un message pour les champs manquants.
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

?>

<main>
    <section>
        <form action="index.php?pages=contact" method="POST" name="formulaire">
            <h2 class="maincolor">
                Formulaire de contact dans le futur du présent
            </h2>
            <p>
                <span>Civilité :</span> <i style="color:red"><?= $errorCivilite ?></i>
                <br>
                <input type="radio" name="genre" id="mr" value="Monsieur">
                <label for="mr">M.</label>
                <br>
                <input type="radio" name="genre" id="mme" value="Madame">
                <label for="mme">Mme</label>
            </p>
            <p>
                <input type="text" name="nom" id="nom" value="<?php if(isset($_POST['nom'])) { echo htmlentities($_POST['nom']);}?>">
                <label for="nom">Nom </label><i style="color:red"><?= $errorNom ?></i>
                <br>
                <input type="text" name="prenom" id="prenom" value="<?php if(isset($_POST['prenom'])) { echo htmlentities($_POST['prenom']);}?>">
                <label for="prenom">Prénom </label><i style="color:red"><?= $errorPrenom ?></i>
            </p>
            <p>
                <label for="email">Renseignez votre email :</label> <i style="color:red"><?= $errorEmail ?></i>
                <br>
                <input name="email" type="email" id="email" placeholder="Pour recevoir des spams" value="<?php if(isset($_POST['email'])) { echo htmlentities($_POST['email']);}?>">
            </p>
            <p>
                <span>Raison de votre prise de contact :</span> <i style="color:red"><?= $errorRaison ?></i>
                <br>
                <input type="radio" name="raison" id="info-presta" value="information-prestation">
                <label for="info-presta">Demande d'information et prestations</label>
                <br>
                <input type="radio" name="raison" id="emploi" value="demande-emploi">
                <label for="emploi">Proposition d'emploi</label>
            </p>
            <p>
                <label for="demande" class="champ">Votre demande :</label>
                <br>
                <i style="color:red"><?= $textareaToShort ?></i>
                <textarea name="textarea" id="demande" cols="50" rows="10" placeholder="Dites ce que vous voulez, je lirais pas"></textarea>
                <br>
                <input class="btn" id="annule" type="reset" value="NAN C'EST NUL">
                <input class="btn" id="envoi" type="submit" name="submit" value="NIQUEL DROME">
            </p>
            <i style="color:red"><?= $formIsValidORnot ?></i>
        </form>
    </section>
</main>

<?php require('elements/footer.php') ?>