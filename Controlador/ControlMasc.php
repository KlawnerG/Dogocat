<?php
require_once "Mascota.php";
require_once "registrarAnimal.php";

if (isset($_POST["Tipo"], $_POST["Nombre"], $_POST["Edad"], $_POST["Raza"], $_POST["Tamaño"], $_POST["Color"], $_POST["Sexo"])) {
    try {
        $Tipo_Animal = $_POST["Tipo"];
        $Nombre = $_POST["Nombre"];
        $Edad = $_POST["Edad"];
        $Raza = $_POST["Raza"];
        $Tamaño = $_POST["Tamaño"];
        $Color = $_POST["Color"];
        $Sexo = $_POST["Sexo"];

        if (isset($_FILES["Foto"]) && $_FILES["Foto"]["error"] == UPLOAD_ERR_OK) {
            $ruta = "../../../uploads/";  
            $foto_nombre = $_FILES["Foto"]["name"];
            $foto_ruta = $ruta . $foto_nombre;

            if (!file_exists($ruta)) {
                mkdir($ruta, 0777, true);
            }


            if (move_uploaded_file($_FILES["Foto"]["tmp_name"], $foto_ruta)) {
                echo "Se ingrese el animal correctamente.";
            } else {
                echo "Error uploading file.";
            }
        } else {
            $foto_ruta = ""; 
        }

        $mascota = new mascotas();
        $mascota->Mascota($Tipo_Animal, $Nombre, $Edad, $Raza, $Tamaño, $Color, $Sexo, $foto_ruta);

        $regAnimal = new registrarAnimal();
        $result = $regAnimal->regAnimal($mascota);

        echo $result;
    } catch (Exception $ex) {
        echo 'Error: ' . $ex->getMessage();
    }

} else {
    echo "Llenar todos los campos";
}
?>
