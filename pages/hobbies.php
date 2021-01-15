
<?php
    $metaTitle = 'Hobbies - D.Despert';
    $metaDescription = 'Ceci est ma page des hobbies, vous y trouverez 
                            mes passions de la vie de tous les jours';
    $pageTitle = 'MES HOBBIES';
    require('elements/header.php');
?>

<main>
    <section>
        <div class="description">
            <h2 class="maincolor">
                Fruits de ma passion :
            </h2>
            <ul>
                <li><i class="fa fa-music" aria-hidden="true"></i> Guitare</li>
                <li><i class="fa fa-tree" aria-hidden="true"></i> Trekking</li>
                <li><i class="fa fa-camera" aria-hidden="true"></i> Photographie</li>
                <li><i class="fa fa-desktop" aria-hidden="true"></i> Flat design</li>
                <li><i class="fa fa-motorcycle" aria-hidden="true"></i> Moto</li>
                <li><i class="fa fa-moon-o" aria-hidden="true"></i> Astrologie</li>
                <li><i class="fa fa-headphones" aria-hidden="true"></i> Musique</li>
                <li><i class="fa fa-picture-o" aria-hidden="true"></i> Dessin</li>
            </ul>
        </div>
        <iframe width="820" height="576" src="https://www.youtube.com/embed/9lTxLvunRrE"
        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
        allowfullscreen></iframe>
    </section>
</main>

<?php require('elements/footer.php') ?>