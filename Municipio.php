<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Municipio
 *
 * @author Mañanas
 */
class Municipio {
    //put your code here
    function __construct($nombre, $id) {
        $this->nombre=$nombre;
        $this->id=$id;
    }
    function getNombre()
    {
        return $this->nombre;
    }
    function getId()
    {
        return $this->id;
    }
}
