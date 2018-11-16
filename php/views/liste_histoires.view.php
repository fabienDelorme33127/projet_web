<?php

//if (isset($_GET['pageno'])) {
//    $pageno = $_GET['pageno'];
//} else {
//    $pageno = 1;
//}
//$no_of_records_per_page = 15;
//$offset = ($pageno-1) * $no_of_records_per_page;
//
//$total_rows = count($films);
//$total_pages = ceil($total_rows / $no_of_records_per_page);
//
//
$row = array();
//for($i=$offset; $i < $no_of_records_per_page+$offset && $i < $total_rows; $i++){
//    array_push($row, $_GET['films'][$i]);
//}
$i = 0;
while($_GET['films'][$i] != null){
    array_push($row, $_GET['films'][$i]);
    $i++;
}

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
                <th width="10%">Id Director</th>
                <th width="10%">Id Previous</th>
                <th width="10%">Score</th>
                <th width="30%">Titre</th>
                <th width="30%">TitreFr</th>
                <th width="20%">Année</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($row as $key=>$film): ?>
                <tr>
                    <td><?=$film->getId()?></td>
                    <td><?=$film->getIdDirector()?></td>
                    <td><?=$film->getIdPrevious()?></td>
                    <td><?=$film->getScore()?></td>
                    <td><?=$film->getTitle()?></td>
                    <td><?=$film->getTitleFr()?></td>
                    <td><?=$film->getYear()?></td>
                    <td><a href="/SelfHeroes/php/compte/histoire?<?=$film->getId()?>"><button class="menuBtn" name="btn<?=$key ?>">Commencez !</button></a></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>

        <a href="/SelfHeroes/php/compte/"><button class="menuBtn">Revenir au Compte</button></a>
    </div>
</div>