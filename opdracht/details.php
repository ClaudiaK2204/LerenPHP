<?php
include ("db.php");
global $db;

if (isset($_GET["id"]))
    echo "<p>ID: " . $_GET["id"] . "</p>";

$query = $db->prepare("SELECT * FROM pastavorm WHERE id = :id");
$query->bindParam(":id", $_GET["id"]);
$query->execute();
$result = $query->fetchAll(PDO::FETCH_ASSOC);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
</head>
<body>
<div class="card">
    <div class="card-body">
        <?php
        foreach ($result as $row) {
            echo "<h5 class='card-title card text-white bg-primary mb-3'>" . $row["naam"] . "</h5>";
            echo "<p class='card-text'>Krul:" . $row["krul"] . "<br>" . "Kleur:" . $row["kleur"] ."<br>" . "lengte:" . $row["lengte"] . "</p>";
        }
        ?>
    </div>
</div>
<button><a href="index.php">Go home</a> </button>
</body>
</html>