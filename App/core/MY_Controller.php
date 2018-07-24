<?php

(defined('BASEPATH')) OR exit('No direct script access allowed');

/* load the MX_Controller class */
require APPPATH . "third_party/MX/Controller.php";

class MY_Controller extends MX_Controller {
    
}

//////////////////////////////////////////////
/* * **************Front end Layout Set ***************** */

class Front_Controller extends MY_Controller {

    public $menuID;
    public $data;

    public function __construct() {
        parent::__construct();
        if ($this->router->fetch_method() != 'signin' && $this->router->fetch_method() != 'forgot_password')
            $this->check_user_logged_in();
        $this->load->module("users");
        $this->load->library("pagination");
    }

    public function setData($content) {
        $data = array();
        $data = $content;
        $data['main_content'] = $this->router->fetch_method();
        if (!$this->session->userdata('logged_in')) {
            $this->load->view('login', @$data);
        } else {
            $this->load->view('frontend', @$data);
        }
    }

    protected function check_user_logged_in() {
        if (!$this->session->userdata('logged_in')) {
            redirect(base_url('signin'));
        } else {
            $this->user = $this->session->userdata('logged_in');
        }
    }

}

//////////////////////////////////////////////
/* * ************** Admin Layout Set***************** */

class Admin_Controller extends MY_Controller {

    public $admin;

    public function __construct() {
        parent::__construct();
        $this->check_admin_logged_in();
        $this->load->module("users");
        $this->load->library("pagination");
    }

    protected function check_admin_logged_in() {


        /* if (!$this->session->userdata('logged_in')) {
          redirect(base_url('signin'));
          } else {
          $this->admin = $this->session->userdata('logged_in');
          } */
    }

    public function setData($content) {
        $data = array();
        $data = $content;
        $data['main_content'] = 'admin/' . $this->router->fetch_method();
        $data['currentuser'] = @$this->users->userdata();
        if (!$this->session->userdata('logged_in')) {
            $this->load->view('login', @$data);
        } else {
            $this->load->view('dashboard', @$data);
        }
    }

}

//////////////////////////////////////////////
/* * **************Front end Layout For RRM Set ***************** */

class Rrm_Controller extends MY_Controller {
    
    public function __construct() {
        parent::__construct();
        if ($this->router->fetch_method() != 'signin' && $this->router->fetch_method() != 'forgot_password')
            $this->check_user_logged_in();
        $this->load->library("pagination");
    }

    public function setData($content) {
        $data = array();
        $data = $content;
        $data['main_content'] = $this->router->fetch_method();
        if (!$this->session->userdata('logged_in')) {
            $this->load->view('login', @$data);
        } else {
            $this->load->view('rrm', @$data);
        }
    }

    protected function check_user_logged_in() {
        if (!$this->session->userdata('logged_in')) {
            redirect(base_url('signin'));
        } else {
            $this->user = $this->session->userdata('logged_in');
        }
    }

}

//////////////////////////////////////////////
/* * ************** Admin Layout Set***************** */


//////////////////////////////////////////////
/* * **************Front end Layout For Head Set ***************** */

class Head_Controller extends MY_Controller {

    public $menuID;
    public $data;

    public function __construct() {
        parent::__construct();
        if ($this->router->fetch_method() != 'signin' && $this->router->fetch_method() != 'forgot_password')
            $this->check_user_logged_in();
        $this->load->module("users");
        $this->load->library("pagination");
    }

    public function setData($content) {
        $data = array();
        $data = $content;
        $data['main_content'] = $this->router->fetch_method();
        if (!$this->session->userdata('logged_in')) {
            $this->load->view('login', @$data);
        } else {
            $this->load->view('head', @$data);
        }
    }

    protected function check_user_logged_in() {
        if (!$this->session->userdata('logged_in')) {
            redirect(base_url('signin'));
        } else {
            $this->user = $this->session->userdata('logged_in');
        }
    }

}

//////////////////////////////////////////////
/* * ************** Admin Layout Set***************** */


//////////////////////////////////////////////
/* * **************Front end Layout For RRM Leader Set ***************** */

class Rroleader_Controller extends MY_Controller {
    
    public function __construct() {
        parent::__construct();
        if ($this->router->fetch_method() != 'signin' && $this->router->fetch_method() != 'forgot_password')
            $this->check_user_logged_in();
        $this->load->library("pagination");
    }

    public function setData($content) {
        $data = array();
        $data = $content;
        $data['main_content'] = $this->router->fetch_method();
        if (!$this->session->userdata('logged_in')) {
            $this->load->view('login', @$data);
        } else {
            $this->load->view('rrm_leader', @$data);
        }
    }

    protected function check_user_logged_in() {
        if (!$this->session->userdata('logged_in')) {
            redirect(base_url('signin'));
        } else {
            $this->user = $this->session->userdata('logged_in');
        }
    }

}
?>