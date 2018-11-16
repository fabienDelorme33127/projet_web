<?php
//$row = array();
//$i = 0;
//$nb_histoires = count($_GET['histoires']);
//while($i < $nb_histoires){
//    echo $i;
//    array_push($row, $_GET['histoires'][$i]);
//    $i++;
//}

if(isset($_POST['click'])){
    echo $_POST['click'];
}
?>
<div class="container">
    <img src="../ressources/SelfHeroes.png">
    <div class="col-md-10 col-md-offset-1">

        <h1><?=$title?></h1>

        <table class="table table-striped table-condensed table-bordered table-rounded">
            <thead>
            <tr>
                <th width="10%">Id</th>
                <th width="10%">Titre</th>
                <th width="10%">Auteur</th>
                <th width="10%">Description</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($_SESSION['histoires'] as $key=>$histoire){
                echo '<tr>';
                echo '<td> ' . $histoire->getIdHistoire() . '</td>';
                echo '<td> ' . $histoire->getTitre() . '</td>';
                echo '<td> ' . $histoire->getAuteur() . '</td>';
                echo '<td> ' . $histoire->getDescription() . '</td>';
                echo '<td><a href="/SelfHeroes/php/compte/histoire?' . $histoire->getIdHistoire() . '"><button class="menuBtn" name="btn' . $key . '">Commencez !</button></a></td>';
                echo '</tr>';
            }
            ?>
            </tbody>
        </table>

        <a href="/SelfHeroes/php/compte/"><button class="menuBtn">Revenir au Compte</button></a>
    </div>
</div>