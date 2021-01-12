<?php require('elements/header.php'); ?>

<main>
    <section>
        <form action="contacts/contacts.php" method="POST">
            <h2 class="maincolor">
                Formulaire de contact dans le futur du présent
            </h2>
            <p>
                Civilité :
                <br>
                <input type="radio" name="genre" id="mr" value="Monsieur">
                <label for="mr">M.</label>
                <br>
                <input type="radio" name="genre" id="mme" value="Madame">
                <label for="mme">Mme</label>
            </p>
            <p>
                <label for="nom">Nom</label>
                <input type="text" name="nom" id="nom">
                <label for="prenom">Prénom</label>
                <input type="text" name="prenom" id="prenom">
            </p>
            <p>
                <label for="email">Renseignez votre email :</label>
                <br>
                <input name="email" type="email" id="email" placeholder="Pour recevoir des spams">
            </p>
            <p>
                Raison de votre prise de contact :
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
                <textarea name="textarea" id="demande" cols="50" rows="10" placeholder="Dites ce que vous voulez, je lirais pas"></textarea>
                <br>
                <input class="btn" id="annule" type="reset" value="NAN C'EST NUL">
                <input class="btn" id="envoi" type="submit" value="NIQUEL DROME">
            </p>
        </form>
    </section>
</main>

<?php require('elements/footer.php') ?>