<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class LoadFromGoogle extends CI_Controller {

    const CUSTOM_SEARCH_API_KEY = 'AIzaSyB2pTFm-D8GcHRZiELqedJNr6sGa6xr0UY';
    const CUSTOM_SEARCH_API_URL = 'https://www.googleapis.com/customsearch/v1';
    const CUSTOM_SEARCH_API_CX = '015513001353225384047:nxv91uwfvx4';

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
				$emotion = urlencode($_POST['emotion']);
				$results_1 = $this->getNext10Elements($emotion, 1);
				$results_2 = $this->getNext10Elements($emotion, 11);
                $results_3 = $this->getNext10Elements($emotion, 21);

				$data = array();
				$data['emotion'] = $emotion;
				$data['results'] = array_merge($results_1, $results_2, $results_3);
				$data['emotions'] = $this->ConfigurationModel->getAvailableEmotions();

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
                $emotion = urlencode($_POST['emotion']);
                $pics_to_save = $_POST['pics'];
                foreach ($pics_to_save as $pic) {
                    $this->PictureModel->saveImage($pic, $emotion);
                }

                // -------
                redirect('/loadfromgoogle/create');
            } else{
                redirect('/loadfromgoogle/create');
            }
        }
        catch(Exception $e){
            show_404();
        }
	}

    private function getNext10Elements($emotion, $init){
        $url = self::CUSTOM_SEARCH_API_URL .
            "?key=" . self::CUSTOM_SEARCH_API_KEY .
            "&cx=" . self::CUSTOM_SEARCH_API_CX .
            "&q=$emotion%20face&searchType=image&imgType=photo&start=$init";
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
            $results[$num] = $link;
        }

        return $results;
    }
	
}
