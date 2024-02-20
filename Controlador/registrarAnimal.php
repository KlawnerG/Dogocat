<?php
require_once "../Modelo/ConexionBD.php";

class registrarAnimal {
    public function regAnimal(mascotas $regAnimal) {
        try {
            $conexion = new ConexionBD();
            $conexion->abrir();
            
            $Tipo_Animal = $regAnimal -> getTipo();
            $Nombre = $regAnimal -> getNombre();
            $Edad = $regAnimal -> getEdad();
            $Raza = $regAnimal -> getRaza();
            $Tamaño = $regAnimal -> getTamaño();
            $Color = $regAnimal -> getColor();
            $Sexo = $regAnimal -> getSexo();
            $Foto = $regAnimal -> getFoto();
            
            $sql = "insert into tbl_animales VALUES('','$Tipo_Animal','$Nombre', '$Edad', '$Raza', '$Tamaño', '$Color', '$Sexo', '$Foto')";

            $conexion->consulta($sql);
            $res = $conexion->obtenerFilasAfectadas();
            if ($res > 0) {
            } else {
                return "Error al registrar Animal";
            }
        } catch (Exception $ex) {
            return "Error: " . $ex->getMessage();
        }
    }
}
?>