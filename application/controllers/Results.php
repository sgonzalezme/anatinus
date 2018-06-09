<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Results extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url_helper');
		$this->load->model('ResultModel');
	}

	public function index(){

	    /** @var array $games */
        $games = $this->ResultModel->getAllResults();

		$data = array(
		    'games' => $games
        );
		$this->load->view('templates/head_common');
		$this->load->view('templates/header');
		$this->load->view('results/index', $data);
		$this->load->view('templates/footer');
	}


}
