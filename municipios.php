<?php
include 'funciones.php';

try{
$id_provincia=$_GET['id'];

$lista_objetos_municipio=devolverMunicipiosPorProvincia($id_provincia);
//echo (count($lista_objetos_municipio)." MUNICIPIOS");
$json=pintarJSON($lista_objetos_municipio);
echo $json;
} catch (Exception $e)
{
    echo $e->getMessage();
}
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

