<?php
require_once "../Modelo/ConexionBD.php"; // Incluye el archivo donde está la clase conexionBD

$conexion = new conexionBD(); // Crea una instancia de la clase

if ($conexion->abrir()) {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $id_usuario = $_POST['id'];
        $documento = $_POST['documento'];
        $nombres = $_POST['nombres'];
        $apellidos = $_POST['apellidos'];
        $ciudad = $_POST['ciudad'];
        $direccion = $_POST['direccion'];
        $correo = $_POST['correo'];
        $telefono = $_POST['telefono'];
        $rol = $_POST['rol'];
        
        // Realiza la actualización de los datos del usuario en la base de datos
        $sql = "UPDATE tbl_usuarios SET Documento='$documento', Nombres='$nombres', Apellidos='$apellidos', Ciudad='$ciudad', Direccion='$direccion', Correo='$correo', Telefono='$telefono', Rol='$rol' WHERE Id_usuario=$id_usuario";
        
        $conexion->consulta($sql);

        if ($conexion->obtenerFilasAfectadas() > 0) {
            echo "Datos actualizados correctamente.";
        } else {
            echo "No se pudo actualizar los datos del usuario.";
        }
    } else {
        echo "Solicitud incorrecta.";
    }
} else {
    echo "Error en la conexión a la base de datos.";
}
?>
