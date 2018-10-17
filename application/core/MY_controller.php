<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

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
?>