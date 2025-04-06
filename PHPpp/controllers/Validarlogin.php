<?php
/*$servername = "localhost";
$username = "root";
$password = "";
$dbname = "php-login";*/
include_once "../config/Conexión.php";
$a = new conexion();
$a->conectar();
// Crear conexión
//$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($a->con->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$usuario = $_POST['usuario'];
$contrasena = $_POST['contrasena'];

// Consulta para verificar usuario y contraseña
$sql = "SELECT * FROM usuarios WHERE usuario = '$usuario' AND contrasena = '$contrasena'";
$result = $a->con->query($sql);

if ($result->num_rows > 0) {
    // Inicio de sesión exitoso
    session_start();
    $_SESSION['usuario'] = $usuario;
    header("Location: ../views/menu.php");
} else {
    echo "Usuario o contraseña incorrectos.";
}

$a->con->close();
?>