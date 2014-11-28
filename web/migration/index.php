<?php
include "DBHandler.php";
include "Migration.php";

if (isset($_POST['m'])) {

    ini_set('display_errors', '1');

    $db = new DBHandler();
    $m = new Migration($db);
    //$m->addPictures($m->selectPictures());
    //$m->addArtists($m->selectArtists());
    //$m->addArticles($m->selectArticles());
    //$m->addDiscos($m->selectDiscos());
    //$m->addTours($m->selectTours());
    $m->addEvents($m->selectEvents());
}


?>
<!DOCTYPE HTML>
<html>
<head>
    <title>M</title>
</head>
<body>
<form method="post">
    <input type="submit" name="m">
</form>
</body>
</html>