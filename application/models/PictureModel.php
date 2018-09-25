<?php

class PictureModel extends CI_Model {
	public function __construct() {
		$this->load->database ();
        $this->load->model('ConfigurationModel');
        parent::__construct();
    }

    function base64ToFile($base64_string) {
        $admin_domain = $this->ConfigurationModel->getAdminDomain();
        $upload_path = '.' . $this->ConfigurationModel->getUploadPath();
	    $filename = uniqid(rand(), true) . '.jpeg';
        $output_file = realpath($upload_path) . '/' . $filename;

        $ifp = fopen( $output_file, 'wb' );

        // $data[ 0 ] == "data:image/png;base64"
        // $data[ 1 ] == <actual base64 string>
        $data = explode( ',', $base64_string );
        fwrite($ifp, base64_decode( $data[1]));
        fclose($ifp);

        return  "$admin_domain$upload_path$filename";
    }

    public function saveImage($url, $emotion){
	    $emotion = strtolower($emotion);

        // crear la entidad
        $sql = 'INSERT INTO images
				( url, emotion )
				VALUES (?, ?)';
        $this->db->query ( $sql, array($url, $emotion));

        return  $this->db->insert_id();
    }

	public function getAllPictures() {
		$sql = 'SELECT *
				FROM images
				WHERE active is true';
		$stmt = $this->db->query ( $sql );
        $pictures = $stmt->result_array();

		return $pictures;
	}
}