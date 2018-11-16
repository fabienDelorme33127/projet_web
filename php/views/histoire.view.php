<?php

?>
<div class="container">
    <img src="../ressources/SelfHeroes.png">
    <div class="col-md-10 col-md-offset-1">

        <h1><?=$title?></h1>
        <p><?=$text?></p>
        <p><?=$_SERVER['QUERY_STRING']?></p>

        <tbody>
        <?php
            echo '<tr>';
            echo '<td> ' . $histoire->getIdHistoire() . '</td>';
            echo '<td> ' . $histoire->getTitre() . '</td>';
            echo '<td> ' . $histoire->getAuteur() . '</td>';
            echo '<td> ' . $histoire->getDescription() . '</td>';
            echo '</tr>';
        ?>
        </tbody>


        <a href="/SelfHeroes/php/"><button class="menuBtn">Revenir au Menu</button></a>
        <a href="/SelfHeroes/php/compte/"><button class="menuBtn">Revenir au Compte</button></a>
        <a href="/SelfHeroes/php/compte/listeHistoires"><button class="menuBtn">Revenir à la liste Histoires</button></a>
    </div>
</div>