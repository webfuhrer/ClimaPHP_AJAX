<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
include 'funciones.php';
$lista_provincias=devolverProvincias();
$combo_provincias=crearCombo($lista_provincias);
?>
<html>
    <head>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="js/funciones.js"></script>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        echo $combo_provincias;
        ?>
        <div id="capa_municipios"></div>
    </body>
</html>
