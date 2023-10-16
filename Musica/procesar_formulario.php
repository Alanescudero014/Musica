<?php
include "conexion.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = $_POST['usuario'];
    $contrasena = $_POST['contrasena'];
    $privilegios = implode(',', $_POST['privilegios']);  // Convertir el array de privilegios en una cadena separada por comas

    // Insertar el nuevo usuario en la base de datos
    $sql = "INSERT INTO usuarios (nombre, contrasena, privilegios) VALUES (?, ?, ?)";

    $stmt = $pdo->prepare($sql);
    $stmt->execute([$usuario, $contrasena, $privilegios]);

    echo "Usuario creado exitosamente.";

    // Cierra la conexión a la base de datos
    $pdo = null;
}
header("Location: login.html");
?>
