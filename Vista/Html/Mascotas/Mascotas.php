<?php
require_once "../../../Modelo/ConexionBD.php";

$conexion = new ConexionBD();
$conexion->abrir();

$sql = "SELECT * FROM tbl_animales";
$conexion->consulta($sql);
$result = $conexion->obtenerResult();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mascotas Disponibles</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
    <link rel="stylesheet" href="../../../Vista/Estilos/estilo.css">
</head>
<body>

<div class="swiper mySwiper">
    <div class="swiper-wrapper">
        <?php
        while ($fila = mysqli_fetch_assoc($result)) {
            ?>
            <div class="swiper-slide">
                <div class="icons">
                    <i class="fa-solid fa-circle-arrow-left"></i>
                    <img src="/Vista/Imagenes/icono.jpg" alt="">
                    <i class="fa-regular fa-heart"></i>
                </div>
                <div class="mascota-content">
                    <div class="mascota-txt">
                        <span><?php echo $fila['Nombre']; ?> </span>
                        <h2> EDAD: <br> <?php echo $fila['Edad']; ?></h2>
                        <h2> RAZA: <br><?php echo $fila['Raza']; ?></h2>
                        <h2> TAMAÑO: <br><?php echo $fila['Tamaño']; ?></h2>
                        <h2> COLOR: <br><?php echo $fila['Color']; ?></h2>
                        <h2> SEXO: <br><?php echo $fila['Sexo']; ?></h2>
                    </div>
                    <div class="mascota-img">
                        <?php
                        if (isset($fila['Foto'])) {
                            $imagenCodificada = base64_encode($fila['Foto']);
                            ?>
                            <img src="data:image/jpeg;base64,<?php echo $imagenCodificada; ?>" alt="Imagen de la mascota">
                            <?php
                        } else {
                            echo "Error: No se encontró la imagen de la mascota.";
                        }
                        ?>
                    </div>
                </div>
            </div>
            <?php
        }
        ?>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script>
    var swiper = new Swiper(".mySwiper", {
        effect: "coverflow",
        grabCursor: true,
        centeredSlides: true,
        slidesPerView: "auto",
        loop: true,
        coverflowEffect: {
            depth: 500,
            modifier: 1,
            slideShadows: true,
            rotate: 0,
            stretch: 0
        }
    })
</script>
</body>
</html>
