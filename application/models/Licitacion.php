<?php (defined('BASEPATH')) OR exit('No direct script access allowed');


class Licitacion extends CI_Model{

    public $id;
    public $nombre;

    public function __construct() {
        parent::__construct();
    }

    public function insert_factura()
    {
        $this->id = $_POST['id'];
        $this->nombre = $_POST['nombre'];        
    }    
}

?>