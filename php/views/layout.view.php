<html>
    <head>
        <title>Films</title>
<!--        <link rel="stylesheet" href="css/bootstrap.min.css">-->
        <!--<link rel="stylesheet" type="text/css" href="../css/style.css">
        <link rel="stylesheet" type="text/css" href="../../css/style.css">-->
        <?php
            $pageno = "";
            if (strstr($_SERVER['REQUEST_URI'], "pageno") != ""){
                $pageno=strstr($_SERVER['REQUEST_URI'], "pageno");
            }

            if ($_SERVER['REQUEST_URI']=="/SelfHeroes/php/" || $pageno != "") {
                echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"../css/style.css\">";
            }else if ($_SERVER['REQUEST_URI']=="/SelfHeroes/php/movie/addUpdate" || $_SERVER['REQUEST_URI']=="/SelfHeroes/php/movie/delete") {
                echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"../../css/style.css\">";
            }
        ?>
    </head>
    <body>
        <?=$content?>
        <script type="text/javascript">
            tableColoration();
            function tableColoration() {
                var trCollection = document.getElementsByTagName('tr');
                var cmpt = 0;
                console.log(trCollection);

                for (var i=0; i<trCollection.length; i++){
                    console.log(cmpt);
                    if (trCollection[i].parentNode.tagName!="THEAD" && cmpt%2!=0){
                        trCollection[i].style.backgroundColor = "rgba(63,42,16,0.3)";
                    }
                    cmpt++;
                    console.log(cmpt);
                }
            }
        </script>
    </body>
</html>