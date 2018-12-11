<?php
$rand = "0";
?>
<div class="container">
    <img src="../ressources/SelfHeroes.png">
    <div class="col-md-10 col-md-offset-1">

        <h1><?=$title?></h1>
        <p><?=$text?></p>

        <?php foreach ($bts as $key=>$bt){
            echo '<a href="/SelfHeroes/php/compte/histoire?idHistoire=' . $idhistoire . '&idPersonnage=' . $_SESSION['idPersonnage'] . '&numeroPage=' . $bt->{'lienbt'} . '"><button class="menuBtn" name="btn' . $bt->{'nombt'} . '">' . $bt->{'nombt'} . '</button></a>';
        }
        ?>


        <a href="/SelfHeroes/php/"><button class="menuBtn">Revenir au Menu</button></a>
        <a href="/SelfHeroes/php/compte/"><button class="menuBtn">Revenir au Compte</button></a>
        <a href="/SelfHeroes/php/compte/listeHistoires"><button class="menuBtn">Revenir à la liste Histoires</button></a>
    </div>
</div>