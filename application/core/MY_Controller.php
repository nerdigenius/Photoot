<?php
defined('BASEPATH') or exit('No direct access allowed!');

/**
 *
 */
// use Coolpraz\PhpBlade\PhpBlade;
class MY_Controller extends CI_Controller
{
    protected $data = array();

    public function __construct()
    {
        parent::__construct();
    }

    public function layout()
    {
        $this->template['header']          = $this->load->view('templates/header', $this->data, true);
        $this->template['footer']          = $this->load->view('templates/footer', $this->data, true);
        $this->template['sidebar']         = $this->load->view('templates/sidebar', $this->data, true);
        $this->template['control_sidebar'] = $this->load->view('templates/control_sidebar', $this->data, true);
        $this->template['page']            = $this->load->view($this->page, $this->data, true);
        $this->load->view('templates/main', $this->template);
    }
}
