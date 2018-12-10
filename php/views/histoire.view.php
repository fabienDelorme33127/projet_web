<?php
$rand = "0";
?>
<div class="container">
    <img src="../ressources/SelfHeroes.png">
    <div class="col-md-10 col-md-offset-1">

        <h1><?=$title?></h1>
        <p><?=$text?></p>
        <p><?=$_SERVER['QUERY_STRING']?></p>


        <form>
            <input type="submit" name="envoyer" value="envoyer" onclick=<?=$rand=random_int(1,6)?>>
        </form>

        <tbody>

        <form action="" method="post" id="formRand">
            <input type="text" name="rand" placeholder="rand" value=<?=$rand?>>
            <?php
            if(isset($errors['rand'])){
                echo $errors['rand'];
            }
            ?>
            <input type="submit">
        </form>
        </tbody>


        <a href="/SelfHeroes/php/"><button class="menuBtn">Revenir au Menu</button></a>
        <a href="/SelfHeroes/php/compte/"><button class="menuBtn">Revenir au Compte</button></a>
        <a href="/SelfHeroes/php/compte/listeHistoires"><button class="menuBtn">Revenir à la liste Histoires</button></a>
    </div>
</div>