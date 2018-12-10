<div class="container">
    <img src="../ressources/SelfHeroes.png">
    <div class="col-md-10 col-md-offset-1">

        <form action="" method="post" id="signin">
            <h2>CREER UNE HISTOIRE</h2>
            <input type="text" name="titre" placeholder="titre">
            <?php
            if(isset($errors['titre'])){
                echo $errors['titre'];
            }
            ?>
            <input type="text" name="auteur" placeholder="auteur">
            <?php
            if(isset($errors['auteur'])){
                echo $errors['auteur'];
            }
            ?>
            <input type="text" name="description" placeholder="description">
            <?php
            if(isset($errors['description'])){
                echo $errors['description'];
            }
            ?>
            <input type="submit">
        </form>

        <a href="/SelfHeroes/php/compte"><button class="menuBtn">Revenir au Compte</button></a>
        <a href="/SelfHeroes/php/"><button class="menuBtn">Revenir au Menu</button></a>

    </div>
</div>