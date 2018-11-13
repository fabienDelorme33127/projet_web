<?php

if (isset($_GET['pageno'])) {
    $pageno = $_GET['pageno'];
} else {
    $pageno = 1;
}
$no_of_records_per_page = 15;
$offset = ($pageno-1) * $no_of_records_per_page;

$total_rows = count($films);
$total_pages = ceil($total_rows / $no_of_records_per_page);


$row = array();
for($i=$offset; $i < $no_of_records_per_page+$offset && $i < $total_rows; $i++){
    array_push($row, $_GET['films'][$i]);
}
?>

<div class="container">
    <div class="col-md-10 col-md-offset-1">
        <h1><?=$title?></h1>
        <p><?=$text?></p>

        <a href="/SelfHeroes/php/movie/addUpdate"><button>Ajouter/Modifier</button></a>
        <a href="/SelfHeroes/php/movie/delete"><button>Supprimer</button></a>

        <form action="" method="post" id="searchForm">
            <h2>RECHERCHER DES FILMS</h2>
            <input type="text" name="id" placeholder="id">
            <input type="text" name="id_director" placeholder="id_director">
            <input type="text" name="id_previous" placeholder="id_previous">
            <input type="text" name="score" placeholder="score">
            <input type="text" name="title" placeholder="titre">
            <input type="text" name="title_fr" placeholder="titre fr">
            <input type="text" name="year" placeholder="année">
            <input type="submit">
        </form>

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
            <?php foreach ($row as $film): ?>
                <tr>
                    <td><?=$film->getId()?></td>
                    <td><?=$film->getIdDirector()?></td>
                    <td><?=$film->getIdPrevious()?></td>
                    <td><?=$film->getScore()?></td>
                    <td><?=$film->getTitle()?></td>
                    <td><?=$film->getTitleFr()?></td>
                    <td><?=$film->getYear()?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<!--<li><a href="?pageno=1">First</a></li>-->
<a href="?pageno=1"><button>&#60;&#60;</button></a>
<a href="<?php if($pageno > 1){ echo "?pageno=".($pageno - 1); } ?>"><button>&#60;</button></a>
<a href="<?php if($pageno < $total_pages){ echo "?pageno=".($pageno + 1); } ?>"><button>&#62;</button></a>
<a href="?pageno=<?php echo $total_pages; ?>"><button>&#62;&#62;</button></a>