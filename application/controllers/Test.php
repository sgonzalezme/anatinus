<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

use \Aws\Rekognition\RekognitionClient;

class Test extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url_helper');
        $this->load->model('ConfigurationModel');
        $this->load->model('PictureModel');
        //$this->load->library('image_lib');
	}

	public function index(){
		$data = array();
		$this->load->view('templates/head_common');
		$this->load->view('templates/header');
		$this->load->view('test/test_index', $data);
		$this->load->view('templates/footer');
	}
	
	public function create(){

	    try {

            if ($this->input->method() == 'post') {
                $options = [
                    'profile' => 'default',
                    'region' => 'us-west-2',
                    'version' => 'latest'
                ];

                $rekognition = new RekognitionClient($options);
                $picture = $_FILES['picture'];
                $image_as_binary = file_get_contents($picture["tmp_name"]);
                $mime_type = $picture['type'];

                // Call DetectFaces
                $result = $rekognition->DetectFaces(array(
                        'Image' => array(
                            'Bytes' => $image_as_binary
                        ),
                        "MinConfidence" => 80,
                        'Attributes' => array('ALL') //DEFAULT doesn't have emotions
                    )
                );

                $face_details = $result->get('FaceDetails');
                $emotions = $face_details[0]['Emotions'];

                $data = array(
                    'result' => array(
                        'emotions' => $emotions,
                        'image' => "data:$mime_type;base64," . base64_encode($image_as_binary)
                    )
                );

                $this->load->view('templates/head_common');
                $this->load->view('templates/header');
                $this->load->view('test/test_create', $data);
                $this->load->view('templates/footer');

            } else {
                // -------

                $this->load->view('templates/head_common');
                $this->load->view('templates/header');
                $this->load->view('test/test_create', array());
                $this->load->view('templates/footer');

                //redirect('/test');

            }
        }
		catch(Exception $e){
	        var_dump($e->getMessage());
			show_404();
		}
	}

	
}
