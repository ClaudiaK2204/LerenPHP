<?php
try {
    $db = new PDO("mysql:host=localhost;dbname=pasta", "root", "");
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}