<?php
require_once '../Modelo/ConexionBD.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST['documento']) && !empty($_POST['Contraseña'])) {
        $documento = $_POST['documento'];
        $contrasena = $_POST['Contraseña'];

        $conexion = new conexionBD(); 
        $conexionAbierta = $conexion->abrir();

        if ($conexionAbierta) {
            $sql = "SELECT Rol FROM tbl_usuarios WHERE Documento = '$documento' AND Contraseña = '$contrasena'"; 
            echo $sql;
            $conexion->consulta($sql);
            $resultado = $conexion->obtenerResult(); 

            if ($resultado->num_rows > 0) {
                $row = $resultado->fetch_assoc();
                $_SESSION['Rol'] = $row['Rol'];
            
                if ($_SESSION['Rol'] === '1') {
                    header("Location: ../Vista/Html/Inicio/Usuario.html");
                    exit;
                } elseif ($_SESSION['Rol'] === '2' || $_SESSION['Rol'] === '3') {
                    header("Location: ../Vista/Html/Inicio/Administrador.html");
                    exit;
                } else {
                    header("Location: interfaz_invitado.php");
                    exit;
                }
            } else {
                echo "Usuario o contraseña incorrectos";
            }
        } else {
            echo "Error en la conexión a la base de datos";
        }
    }
}
?>
