<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Contrato extends CI_Model{
    
    public $id;
    public $nombre;
    public $fecha;
    public $licitacion;

    public function __construct() {
        parent::__construct();
    }

    public function insert_contrato()
    {
        $this->id = $_POST['id'];
        $this->nombre = $_POST['nombre'];
        $this->fecha = $_POST['fecha'];
        $this->licitacion = $_POST['licitacion'];
    }    
}

?>




