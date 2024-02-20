<?php

    class mascotas{

        private $Tipo_Animal;
        private $Nombre;
        private $Edad;
        private $Raza;
        private $Tamaño;
        private $Color;
        private $Sexo;
        private $Foto;


        public function __construct(){

            $this ->Tipo_Animal = "";
            $this->Nombre= "";
            $this->Edad = "";
            $this->Raza = "";
            $this->Tamaño = "";
            $this->Color = "";
            $this->Sexo = "";
            $this ->Foto = "";
        }

        public function Mascota($Tipo_Animal, $Nombre, $Edad, $Raza, $Tamaño, $Color, $Sexo, $Foto){
            $this ->Tipo_Animal = $Tipo_Animal;
            $this->Nombre = $Nombre;
            $this->Edad = $Edad;
            $this->Raza= $Raza;
            $this->Tamaño = $Tamaño;
            $this->Color = $Color;
            $this->Sexo = $Sexo;
            $this ->Foto = $Foto;
        }
        function getTipo(){
            return $this->Tipo_Animal;
        }
        function getNombre(){
            return $this->Nombre;
        }
        function getEdad(){
            return $this->Edad;
        }
        function getRaza(){
            return $this->Raza;
        }
        function getTamaño(){
            return $this->Tamaño;
        }
        function getColor(){
            return $this->Color;
        }
        function getSexo(){
            return $this->Sexo;
        }
        function getFoto(){
            return $this->Foto;
        }
    }
?>