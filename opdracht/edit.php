<?php
include("db.php");
global $db;

$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$naam = $krul = $kleur = $lengte = $id = "";
$message = "";

if (isset($_POST["submit"])) {
    echo "<pre>"; print_r($_POST); echo "</pre>";

    $id = filter_input(INPUT_POST, "id", FILTER_SANITIZE_NUMBER_INT);
    $naam = filter_input(INPUT_POST, "naam", FILTER_SANITIZE_STRING);
    $krul = filter_input(INPUT_POST, "krul", FILTER_SANITIZE_STRING);
    $kleur = filter_input(INPUT_POST, "kleur", FILTER_SANITIZE_STRING);
    $lengte = filter_input(INPUT_POST, "lengte", FILTER_SANITIZE_STRING);

    if ($id) {
        $query = $db->prepare("
            UPDATE pastavorm
            SET naam = :naam, krul = :krul, kleur = :kleur, lengte = :lengte
            WHERE id = :id
        ");

        $query->bindParam(":naam", $naam);
        $query->bindParam(":krul", $krul);
        $query->bindParam(":kleur", $kleur);
        $query->bindParam(":lengte", $lengte);
        $query->bindParam(":id", $id);

        if ($query->execute()) {
            echo "✅ Geüpdatet. Rows affected: " . $query->rowCount();
        } else {
            $error = $query->errorInfo();
            echo "❌ Fout: " . $error[2];
        }
    } else {
        echo "❌ Geen geldige ID in POST ontvangen.";
    }
}

// Load existing
if (isset($_GET["id"])) {
    $id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);
    $query = $db->prepare("SELECT * FROM pastavorm WHERE id = :id");
    $query->bindParam(":id", $id);
    $query->execute();
    $result = $query->fetch(PDO::FETCH_ASSOC);

    if ($result) {
        $naam = $result["naam"];
        $krul = $result["krul"];
        $kleur = $result["kleur"];
        $lengte = $result["lengte"];
    }
}
?>

<!doctype html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Edit Pasta</title>
</head>
<body>
<form method="post" action="index.php?id=<?= $id ?>">
    <input type="hidden" name="id" value="<?= htmlspecialchars($id) ?>">

    <label>Naam:</label><br>
    <input type="text" name="naam" value="<?= htmlspecialchars($naam) ?>"><br><br>

    <label>Krul:</label><br>
    <input type="text" name="krul" value="<?= htmlspecialchars($krul) ?>"><br><br>

    <label>Kleur:</label><br>
    <input type="text" name="kleur" value="<?= htmlspecialchars($kleur) ?>"><br><br>

    <label>Lengte:</label><br>
    <input type="text" name="lengte" value="<?= htmlspecialchars($lengte) ?>"><br><br>

    <button type="submit" name="submit">Opslaan</button>
</form>
</body>
</html>
