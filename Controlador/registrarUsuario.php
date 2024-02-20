<?php
require_once "../Modelo/ConexionBD.php";

class RegistrarUsuario {
    public function regUsuario(Usuarios $regUsuario) {
        try {
            $conexion = new ConexionBD();
            $conexion->abrir();
            
            $Documento = $regUsuario->getDocumento();
            $Nombres = $regUsuario->getNombres();
            $Apellidos = $regUsuario->getApellidos();
            $Ciudad = $regUsuario->getCiudad();
            $Direccion = $regUsuario->getDireccion();
            $Correo = $regUsuario->getCorreo();
            $Telefono = $regUsuario->getTelefono();
            $Rol = $regUsuario->getRol();
            $Contraseña = $regUsuario->getContraseña();
            
            $sql = "INSERT INTO tbl_usuarios VALUES('','$Documento','$Nombres','$Apellidos','$Ciudad','$Direccion','$Correo','$Telefono','$Rol','$Contraseña')";
            
            $conexion->consulta($sql);
            $res = $conexion->obtenerFilasAfectadas();
            
            if ($res > 0) {
                return "Usuario registrado correctamente";
            } else {
                return "Error al registrar usuario";
            }
        } catch (Exception $ex) {
            return "Error: " . $ex->getMessage();
        }
    }
}
?>