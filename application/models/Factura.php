<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

class Factura extends CI_Model{

    public $ID;
    public $nombre;
    public $Fecha;
    public $Adjunto;
    public $CONTRATO;
    public $precio;
    public $iva;
    public $total;

    public function __construct() {
        parent::__construct();
    }

    public function insert_factura()
    {
        $this->ID = $_POST['ID'];
        $this->nombre = $_POST['nombre'];
        $this->Fecha = date('Y/mm/dd');
        $this->Adjunto = $_POST['Adjunto'];
        $this->CONTRATO = $_POST['CONTRATO'];
        $this->precio = $_POST['precio'];
        $this->iva = $_POST['iva'];
        $this->total = $_POST['total'];
    }
}
?>