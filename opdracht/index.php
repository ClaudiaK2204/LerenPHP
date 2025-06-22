<?php
include("db.php");
global $db;

$query = $db->prepare("SELECT * FROM pastavorm");
$query->execute();
$result = $query->fetchAll();

foreach ($result as $data) {
    echo "<table class='table table-hover'>";
    {
        echo "<tr>";

        echo "<td>" . $data['id'] . "<br><button><a href='details.php?id=" . $data['id'] . " '>Details</a> </button>" . "<br><button><a href='delete.php?id=" . $data['id'] . "'>Delete</a> </button>". "<br><button><a href='edit.php?id=" . $data['id'] . "'>edit</a> </button>" . "</td>";

        echo "<td>" . $data['naam'] . "</td>";

        echo "</tr>";
    }

    echo "</table>";
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pasta</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
</head>
<body>
<h1>Alle pasta vormen</h1>
</body>
</html>
