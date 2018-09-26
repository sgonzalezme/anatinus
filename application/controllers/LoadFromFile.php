<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class LoadFromFile extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url_helper');
		$this->load->model('PictureModel');
		$this->load->model('ConfigurationModel');
    }
	
	public function create(){
		try{

			if($this->input->method() == 'post'){
                $upload_path = $this->ConfigurationModel->getUploadPath();
                $admin_domain = $this->ConfigurationModel->getAdminDomain();

                $emotion = $this->input->post('emotion');

                $config['upload_path']          = ".$upload_path";
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 4*1024; //4MB

                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload('picture')){
                    $error = $this->upload->display_errors();
                    $data = array(
                        'success' => false,
                        'result' => "Error uploading image: $error",
                        'emotions' => $this->ConfigurationModel->getAvailableEmotions()
                    );
                }
                else {
                    $upload_data = $this->upload->data();
                    $url = $admin_domain . $upload_path . $upload_data['file_name'];
                    $this->PictureModel->saveImage($url, $emotion);

                    $data = array(
                        'success' => true,
                        'result' => "Image uploaded: $url",
                        'emotions' => $this->ConfigurationModel->getAvailableEmotions()
                    );
                }
                $this->load->view('templates/head_common');
                $this->load->view('templates/header');
                $this->load->view('loadfromfile/create', $data);
                $this->load->view('templates/footer');

			}
			else{
                $emotions = $this->ConfigurationModel->getAvailableEmotions();
                $data = array(
                    'emotions' => $emotions
                );

				$this->load->view('templates/head_common');
				$this->load->view('templates/header');
                $this->load->view('loadfromfile/create', $data);
				$this->load->view('templates/footer');
			}
		}
		catch(Exception $e){
			show_404();
		}
	}

}
