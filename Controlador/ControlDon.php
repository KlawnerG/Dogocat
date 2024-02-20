<?php

    require_once "Donacion.php";
    require_once "registrarDonacion.php";

    if (isset($_POST["Documento"])&& isset($_POST["Tipo"])&& isset($_POST["Descripcion"])&& isset($_POST["Valor"])&& isset($_POST["Lugar"])&& isset($_POST["Fecha"])) {
        try {

            $Documento = $_POST["Documento"];
            $Tipo = $_POST["Tipo"];
            $Descripcion = $_POST["Descripcion"];
            $Valor = $_POST["Valor"];
            $Lugar = $_POST["Lugar"];
            $Fecha = $_POST["Fecha"];
            $donacion = new donaciones();
            $donacion->Donacion($Documento, $Tipo, $Descripcion, $Valor, $Lugar, $Fecha);
            $regDonaciones = new registrarDonacion();
            $regDonaciones->regDonacion($donacion);
        } catch (Exception $ex) {
            echo 'Erros'.$ex;
        }

    }else{
        echo("Llenar todos los campos");
    }

?>