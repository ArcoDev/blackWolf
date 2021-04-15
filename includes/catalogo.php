<?php
require "conexion.php";
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="content-type" content="application/x-apple-aspen-config; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../assets/img/favicon.png" type="image/x-icon">
    <!-- CDN Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!--CDN font awasome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"
        integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w=="
        crossorigin="anonymous" />
    <link rel="stylesheet" href="../css/styles.css">
    <title>Catalogo Black-Wolf</title>
</head>

<body>
    <a href="https://wa.link/zdwtie" class="float" target="_blank">
        <i class="fab fa-whatsapp my-float"></i>
    </a>
    <!--Navbar-->
    <div id="contenido" class="contenido">
        <nav id="nav" class="navegacion">
            <a href="../index.html" title="Amora Joyeria">
                <div id="logo" class="logo"></div>
            </a>
            <div class="items">
                <ul id="enlaces" class="enlaces" style="list-style: none;">
                    <a class="active" href="../index.html">
                        <li>Regresar</li>
                    </a>
                </ul>
                <i id="menMov" class="fas fa-bars menMov"></i>
            </div>
        </nav>
    </div>
    <section class="cajaCategorias">
        <div class="titulo">
            <h1>Catálogo</h1>
        </div>
        <section class="categorias">
            <select id="seleccionarCat" onchange="filtroCategorias();">
                <option>Selecciona una categoría</option>
                <option value="todos">Todos</option>
                <option value="brasaletes">Brasaletes</option>
                <option value="collares">Collares</option>
            </select>
        </section>
        <h2 id="txtBrasaletes" class="titulo">Brasaletes</h2>

        <div id="brasaletes" class="brasaletes">
        <?php
            $consulta = $con->query("SELECT * FROM productos WHERE nombre_cat = 'brasaletes' ")?>
            <div class="cajaImg">
            <?php 
                while ($imagenes = mysqli_fetch_array($consulta)) { 
                    echo  '<div class="infoImg">
                              <img loading="lazy" class="sizeImg" title="' . $imagenes["nombre"] . '" src="../assets/images/' . $imagenes["url_foto"] . '" alt="imagenes de los productos de amora">
                              <div class="ribbon"><span>'.$imagenes["precio"].'</span></div>
                              <p>'.$imagenes["nombre"].'</p>
                           </div>';
                }?>
            </div>
        </div>

        <h2 id="txtCollares" class="titulo">Collares</h2>
        <div id="collares" class="collares">
        <?php
            $consulta = $con->query("SELECT * FROM productos WHERE nombre_cat = 'collares' ")?>
            <div class="cajaImg">
            <?php 
                while ($imagenes = mysqli_fetch_array($consulta)) { 
                    echo  '<div class="infoImg">
                              <img loading="lazy" class="sizeImg" title="' . $imagenes["nombre"] . '" src="../assets/images/' . $imagenes["url_foto"] . '" alt="imagenes de los productos de amora">
                              <div class="ribbon"><span>'.$imagenes["precio"].'</span></div>
                              <p>'.$imagenes["nombre"].'</p>
                           </div>';
                }?>
            </div>
        </div>

    </section>

    <!--Script Personal -->
    <script src="../js/main.js"></script>
</body>

</html>