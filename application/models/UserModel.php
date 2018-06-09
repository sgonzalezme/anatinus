<?php

class UserModel extends CI_Model {
	public function __construct() {
		$this->load->database ();
        parent::__construct();
    }

	public function getUserById($user_id) {
		$sql = 'SELECT *
				FROM user
				WHERE user.user_id = ?';
		$stmt = $this->db->query ( $sql, array($user_id) );
        $user = $stmt->result_array();

        if($user){
            $user = $user[0];
        }
		return $user;
	}

	
}