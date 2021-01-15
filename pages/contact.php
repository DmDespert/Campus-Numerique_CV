<?php



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