<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Results extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url_helper');
		$this->load->model('ResultModel');
		$this->load->model('UserModel');
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

    public function get($user_id){

        /** @var array $user_stats */
        $user_stats = $this->ResultModel->getResultsByEmotion($user_id);
        /** @var array $user */
        $user = $this->UserModel->getUserById($user_id);

        $data = array(
            'stats'     => $user_stats,
            'username'  => $user['username']
        );
        $this->load->view('templates/head_common');
        $this->load->view('templates/header');
        $this->load->view('results/user', $data);
        $this->load->view('templates/footer');
    }

    public function game($game_id){

        /** @var array $game_stats */
        $game_stats = $this->ResultModel->getResultsByGame($game_id);

        $data = array(
            'stats'     => $game_stats,
            'username'  => $game_stats[0]['username'],
            'game_id'   => $game_id
        );
        $this->load->view('templates/head_common');
        $this->load->view('templates/header');
        $this->load->view('results/game', $data);
        $this->load->view('templates/footer');
    }



}
