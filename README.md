# codeigniter_enreda

1. Montar un entorno de Codeigniter:
  
  - Descargar codeigniter de la pagina oficial.(https://codeigniter.com/download)
  - Descomprimir en el directorio raíz asignado al servidor Apache( por defecto: /var/www/html)
  - Configurar el archivo de configuración situado en la carpeta application/config/config.php:
      - configurar base_url del proyecto y clave de encriptación para la seguridad.
  
2. Hacer el frontend solo accesible con usuario registrado:
  
  - Observamos que en el archivo /config/config.php el parametro config['subclass_prefix'] este igualado a 'MY_
  - en la carpeta application/core creamos un fichero llamado 'MY_' lo que queramos '.php' en mi caso creamos 
    'MY_controller.php'.
  - Dentro de este archivo pegamos el siguiente código :
  ```
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
  ```

  Con este código podemos hacer que todos los controladores que creamos posteriormente hereden de estos controladores según       nuestra necesidad, como podemos ver en el controlador FronendController todos heredaran la llamada al método                 "chechkloginStatus" en el constructor que los redireccionara a 'base_url' en caso de no estar logeados en el sistema.
  Esto nos simplifica a mi parecer la creación de todos los controladores posteriores separándolos en tipos según su utilidad   y como es el caso del fronend heredando todos funcionalidades concretas, así seguiríamos la regla DRY(don't repeat           yourself).
  
  3. Creación de los modelos:
  
    - Creamos los archivos de los nuevos modelos en application/models.
    - Añadimos los modelos al array $autoload['model'] del archivo /application/config/autoload.php
    - Creamos los modelos en los 3 ficheros con los requisitos necesarios.
