<?php
include 'variables.php';
include 'Provincia.php';
include 'Municipio.php';

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
function devolverProvincias()
{
    global $servername, $nombre_bd, $password, $username;
    $dsn="mysql:host=$servername; dbname=$nombre_bd";
    $conexion=new PDO($dsn, $username, $password);
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    try {
    $sql="SELECT id_provincia, provincia FROM provincias";    
    $resultado=$conexion->query($sql);
    $lista_resultados=$resultado->fetchAll();
    $lista_objetos_provincia=array();
    for($i=0; $i<count($lista_resultados); $i++)
        {
        $provincia=$lista_resultados[$i];
        $p=new Provincia($provincia['provincia'], $provincia['id_provincia']);
        array_push($lista_objetos_provincia, $p);
        }
            
    } catch (Exception $ex) {
        
    }
    return $lista_objetos_provincia;
}
function crearCombo($lista_provincias)
{
    $aux="<select id='provincia'>";
   
    foreach ($lista_provincias as $key => $value) {
        //$key son numeros poruqe $lista_provincias es un array numerico
        //$value es el valor de cada elemento de la lista
         $nombre=$value->getNombre();
        $id=$value->getId();
        $aux.="<option value='$id'>$nombre</option>";
        
    }
    $aux.="</select>";
    return $aux;
}
function devolverMunicipiosPorProvincia($id)
{
     global $servername, $nombre_bd, $password, $username;
    $dsn="mysql:host=$servername; dbname=$nombre_bd";
    $conexion=new PDO($dsn, $username, $password);
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    try {
    $sql="SELECT cod_municipio, nombre FROM municipios WHERE id_provincia='$id'";    
    $resultado=$conexion->query($sql);
    $lista_resultados=$resultado->fetchAll();
    $lista_objetos_municipio=array();
    for($i=0; $i<count($lista_resultados); $i++)
        {
        $municipio=$lista_resultados[$i];
        $m=new Municipio($municipio['nombre'], $municipio['cod_municipio']);
        array_push($lista_objetos_municipio, $m);
        }
            
    } catch (Exception $ex) {
        echo $ex->getMessage();
    }
    return $lista_objetos_municipio;
}
function pintarJSON($lista_municipios)
{
    /*
     * {'municipios':[{'id':5, 'nombre': 'albacete'}, {'id':6, 'nombre': 'castellon'},....] }
     */
    $json="{\"municipios\":[";
    for ($i=0; $i<count($lista_municipios); $i++)
    {
        $m=$lista_municipios[$i];
        $nombre=$m->getNombre();
        $id=$m->getId();
        $json.="{\"id\":$id, \"nombre\":\"$nombre\"},";
    }
    $json= substr($json, 0,strlen($json)-1 );
    $json.="]}";
    
    //echo ($json);
    return $json;
}
