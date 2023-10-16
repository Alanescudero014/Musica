<?php

$host = "localhost";
$database = "musica";
$username = "postgres";
$password = "root";

try {
    $pdo = new PDO("pgsql:host=$host;dbname=$database", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error de conexión a la base de datos: " . $e->getMessage());
}
?>
