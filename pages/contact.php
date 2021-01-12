<?php require('elements/header.php');

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

    $textareaToShort = "";
    $validORnot = "";

    $requisTab = [
        $requis1 = "",
        $requis2 = "",
        $requis3 = "",
        $requis4 = "",
        $requis5 = ""
    ];

    //Fonction qui test chacun des champs du tableau
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

    //Condition d'envoie de formulaire
    if(isset($_POST['submit'])) {
        if (!testTableau($rangementFormulaire) || strlen($demande) < 5) {
            $validORnot = "Formulaire incomplet";
            if (strlen($demande) < 5) {
                $textareaToShort = "Veuillez remplir ce champ d'au moins 5 caractères" . "<br>";
            }
            for ($i=0; $i < count($rangementFormulaire); $i++) {
                if (empty($rangementFormulaire[$i])) {
                    $requisTab[$i] = "<i> (Requis)</i>";
                }
            }
        } else {
            //On écrit dans le fichier BDD_Contacts.txt qui stock les informations du formulaire
            file_put_contents("formulaires/BDD_Contacts.txt",
                'Nouveau contact :' . "\n"
                . 'Civilité : ' . $civilite . "\n"
                . 'Nom : ' . $nom . "\n"
                . 'Prénom : ' . $prenom . "\n"
                . 'Email : ' . $email . "\n"
                . 'Raison du contact : ' . $raisonContact . "\n"
                . 'Demande : ' . $demande . "\n"
                . "\n",
                FILE_APPEND);

            $validORnot = "Votre demande a bien été envoyée.";
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
                <span>Civilité : <?= $requis1 ?></span>
                <br>
                <input type="radio" name="genre" id="mr" value="Monsieur">
                <label for="mr">M.</label>
                <br>
                <input type="radio" name="genre" id="mme" value="Madame">
                <label for="mme">Mme</label>
            </p>
            <p>
                <label for="nom">Nom <?= $requis2 ?></label>
                <input type="text" name="nom" id="nom" value="<?php echo $_POST['nom'];?>">
                <label for="prenom">Prénom <?= $requis3 ?></label>
                <input type="text" name="prenom" id="prenom" value="<?php echo $_POST['prenom'];?>">
            </p>
            <p>
                <label for="email">Renseignez votre email : <?= $requis4 ?></label>
                <br>
                <input name="email" type="email" id="email" placeholder="Pour recevoir des spams" value="<?php echo $_POST['email'];?>"">
            </p>
            <p>
                Raison de votre prise de contact : <?= $requis5 ?>
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
                <?= $textareaToShort ?>
                <textarea name="textarea" id="demande" cols="50" rows="10" placeholder="Dites ce que vous voulez, je lirais pas"></textarea>
                <br>
                <input class="btn" id="annule" type="reset" value="NAN C'EST NUL">
                <input class="btn" id="envoi" type="submit" name="submit" value="NIQUEL DROME">
            </p>
            <?= $validORnot ?>
        </form>
    </section>
</main>

<?php require('elements/footer.php') ?>