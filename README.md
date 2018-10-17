# codeigniter_enreda

1. Montar un entorno de Codeigniter:
  
  - Descargar codeigniter de la pagina oficial.(https://codeigniter.com/download)
  - Descomprimir en el directorio raiz asignado al servidor Apache( por defecto: /var/www/html)
  - Configurar el archivo de configuracion situado en la carpeta application/config/config.php:
      - configurar base_url del proyecto y clave de encriptacion para la seguridad.
  
2. Hacer el frontend solo accesible con usuario registrado:
  
  - Observamos que en el archivo /config/config.php el parametro config['subclass_prefix'] este igualado a 'MY_
  - en la carpeta application/core creamos un fichero llamado 'MY_' lo que queramos '.php' en mi caso creamos 
    'MY_controller.php'.
  - Dentro de este archivo pegamos el siguiente código :
  '''
  <?php (defined('BASEPATH')) OR exit('Acceso denegado a scrip de entrada directa');

  class CommonController extends CI_Controller
  {
    public function __construct()
    {
        parent::__construct();
    }
  }

  class FrontendController extends CommonController
  {
    public function __construct()
    {
        parent::__construct();

        $this->chekLoginStatus();
    }

    protected function checkLoginStatus()
    {
        if(! $this->session->userdata('is_loged_in')){
            redirect('base_url');
        }
    }
  }

  class BackendController extends CommonController
  {
    public function __construct()
    {
        parent::__construct();
    }
  }
  '''
