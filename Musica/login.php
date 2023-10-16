<?php
session_start();
include "conexion.php"; // Incluye el archivo de conexión a la base de datos

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = $_POST['usuario'];
    $contrasena = $_POST['contrasena'];

    // Realiza la autenticación del usuario consultando la base de datos
    $sql = "SELECT * FROM usuarios WHERE nombre = ? AND contrasena = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$usuario, $contrasena]);

    // Verifica si las credenciales son válidas
    if ($stmt->rowCount() > 0) {
        $_SESSION['usuario'] = $usuario;
        header("Location: gestion.php");
        exit();
    } else {
        echo "Credenciales incorrectas. Inténtalo de nuevo.";
    }
}
?>

