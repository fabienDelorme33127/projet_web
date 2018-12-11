<div class="container">
    <img src="../../ressources/SelfHeroes.png">
    <div class="col-md-10 col-md-offset-1">

        <form action="" method="post" id="signin">
            <h2>CREER VOTRE PERSONNAGE !</h2>
            <input type="text" name="nom" placeholder="nom">
            <?php
            if(isset($errors['nom'])){
                echo $errors['nom'];
            }
            ?>
            <input type="text" name="race" placeholder="race" value="">
            <?php
            if(isset($errors['race'])){
                echo $errors['race'];
            }
            ?>
            <input type="text" name="lore" placeholder="lore" value="">
            <?php
            if(isset($errors['lore'])){
                echo $errors['lore'];
            }
            ?>
            <input type="submit">
        </form>

        <a href="/SelfHeroes/php/compte"><button class="menuBtn">Revenir au Compte</button></a>
        <a href="/SelfHeroes/php/"><button class="menuBtn">Revenir au Menu</button></a>

    </div>
</div>