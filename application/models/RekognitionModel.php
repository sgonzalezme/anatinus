<?php

use \Aws\Rekognition\RekognitionClient;

class RekognitionModel extends CI_Model {
	public function __construct() {
		$this->load->database ();
        $this->load->model('PictureModel');
        parent::__construct();
    }

    public function getEmotionFromUrl($url){
        $result = array(
            'emotion' => 'UNKNOWN',
            'link' => null
        );

	    try {
            $image_bytes = $this->getImage($url);
            $image_base64 = "data:image/jpeg;base64," . base64_encode($image_bytes);

            $image_file = $this->PictureModel->base64ToFile($image_base64);
            $result['link'] = $image_file;

            $options = [
                'profile' => 'default',
                'region' => 'us-west-2',
                'version' => 'latest'
            ];

            $rekognition = new RekognitionClient($options);

            // Call DetectFaces
            $aws_result = $rekognition->DetectFaces(array(
                    'Image' => array(
                        'Bytes' => $image_bytes
                    ),
                    "MinConfidence" => 80,
                    'Attributes' => array('ALL') //DEFAULT doesn't have emotions
                )
            );

            $face_details = $aws_result->get('FaceDetails');
            if(!empty($face_details)){
                $emotions = $face_details[0]['Emotions'];
                $result['emotion'] = $emotions[0]['Type'];
            }
        } catch (\Exception $e){
            error_log($e->getMessage());
        }

        return $result;
    }

    private function getImage($url){
        $ch = curl_init ($url);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US; rv:1.9.2.12) Gecko/20101026 Firefox/3.6.12');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_BINARYTRANSFER,1);
        $resource = curl_exec($ch);
        curl_close ($ch);

        return $resource;
    }


	
}