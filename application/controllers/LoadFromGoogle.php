<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class LoadFromGoogle extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url_helper');
		$this->load->model('PictureModel');
		$this->load->model('ConfigurationModel');
		$this->load->model('RekognitionModel');
	}

	public function create(){
		try{
			if($this->input->method() == 'post'){
				$emotion = urlencode($_POST['emotion']);
				$results_1 = $this->getNext10Elements($emotion, 1);
				$results_2 = $this->getNext10Elements($emotion, 11);
                $results_3 = $this->getNext10Elements($emotion, 21);

				$data = array();
				$data['emotion'] = $emotion;
				$data['results'] = array_merge($results_1, $results_2, $results_3);
				// -------

                $this->load->view('templates/head_common');
                $this->load->view('templates/header');
                $this->load->view('loadfromgoogle/results', $data);
                $this->load->view('templates/footer');

			}
			else{
                $data = array();
				$this->load->view('templates/head_common');
				$this->load->view('templates/header');
                $this->load->view('loadfromgoogle/create', $data);
				$this->load->view('templates/footer');
			}
		}
		catch(Exception $e){
			show_404();
		}
	}

	public function save(){
        try{
            if($this->input->method() == 'post'){
                $pics_to_save = $_POST['pics'];
                foreach ($pics_to_save as $pic) {
                    $decoded_pic = json_decode($pic, true);
                    $this->PictureModel->saveImage($decoded_pic['link'], $decoded_pic['emotion']);
                }
            }
            redirect('/loadfromgoogle/create');
        }
        catch(Exception $e){
            show_404();
        }
	}

    private function getNext10Elements($emotion, $init){
	    $cse_url = $this->ConfigurationModel->getCustomSearchApiUrl();
	    $cse_key = $this->ConfigurationModel->getCustomSearchApiKey();
	    $cse_cx  = $this->ConfigurationModel->getCustomSearchApiCx();
        $url = $cse_url .
            "?key=" . $cse_key .
            "&cx="  . $cse_cx .
            "&q=$emotion&searchType=image&imgType=photo&start=$init";
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        // Make the REST call, returning the result
        $curl_response = curl_exec($curl);
        $response = json_decode($curl_response, true);
        curl_close($curl);

        // Build of the results
        $results = array();
        foreach ($response['items'] as $num => $face){
            $link = $face['link'];
            $rekognition_result = $this->RekognitionModel->getEmotionFromUrl($link);
            $results[$num] = $rekognition_result;
        }

        return $results;
    }
	
}
