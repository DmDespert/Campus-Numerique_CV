<?php
    $metaTitle = 'Contact - D.Despert';
    $metaDescription = 'Contactez directement Dimitri Despert. Si vous avez 
                        des questions, un formulaire est mis à votre disposition';
    $pageTitle = 'ME CONTACTER';
    require('elements/header.php');
?>

<main>
    <section>
        <form action="https://httpbin.org/post" method="POST">
            <h2 class="maincolor">
                PRENDRE LE CONTACT DE LE MOI PAR LE TURFU
            </h2>
            <p>
                <label for="email">Renseignez votre email :</label>
                <br>
                <input name="email" type="email" id="email" placeholder="Pour recevoir des spams" required>
            </p>
            <p>
                Dites moi si vous &ecirc;tes plut&ocirc;t :
                <br>
                <input type="checkbox" name="bananeplantain" id="poney">
                <label for="poney">Une banane plantain en manque d'aventure</label>
                <br>
                <input type="checkbox" name="dora" id="dora">
                <label for="dora">Dora l'exploracuisse de poulet</label>
                <br>
                <input type="checkbox" name="dorade" id="dorade">
                <label for="dorade">Une dorade aux vermicelles</label>
                <br>
                <input type="checkbox" name="vandam" id="vandam" required>
                <label for="vandam">Une tartine de Jean-Claude Van Damme</label>
            </p>
            <p>
                Ce formulaire est compl&egrave;tement d&eacute;bile :
                <br>
                <label for="choix1">OUI</label>
                <input type="radio" name="choix1" id="choix1">
                <br>
                <label for="choix2">OUI</label>
                <input type="radio" name="choix1" id="choix2">
            </p>
            <p>
                <label for="demande" class="champ">Votre demande :</label>
                <br>
                <textarea name="textarea" id="demande" cols="50" rows="10" placeholder="Dites ce que vous voulez, je lirais pas" required></textarea>
                <br>
                <input class="btn" id="annule" type="reset" value="NAN C'EST NUL">
                <input class="btn" id="envoi" type="submit" value="NIQUEL DROME">
            </p>
        </form>
    </section>
</main>

<?php require('elements/footer.php') ?>