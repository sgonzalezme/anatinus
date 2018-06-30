<?php

class ResultModel extends CI_Model {
	public function __construct() {
		$this->load->database ();
        parent::__construct();
    }

	public function getAllResults() {
		$sql = 'SELECT game.*, user.username as username,
                group_concat(concat(game_emotion.emotion, \'-\', game_emotion.result)) as summary
				FROM game
				LEFT JOIN user on game.user_id = user.user_id
                LEFT JOIN game_emotion on game.game_id = game_emotion.game_id
				WHERE user.active is true 
				group by game.game_id';
		$stmt = $this->db->query ( $sql );
        $games = $stmt->result_array();

		return $games;
	}

    public function getResultsFromUser($user_id) {
        $sql = 'SELECT game.*, user.username as username,
                group_concat(concat(game_emotion.emotion, \'-\', game_emotion.result)) as summary
				FROM game
				LEFT JOIN user on game.user_id = user.user_id
				LEFT JOIN game_emotion on game.game_id = game_emotion.game_id
				WHERE user.active is true and user.user_id = ?';
        $stmt = $this->db->query ( $sql, array($user_id));
        $games = $stmt->result_array();

        return $games;
    }

    public function getResultsByEmotion($user_id) {
        $sql = 'SELECT distinct game_emotion.emotion,
				sum(result) as right_answers,
				count(result) as total
				FROM game_emotion
				LEFT JOIN user on game_emotion.user_id = user.user_id
				WHERE user.active is true and user.user_id = ?
				group by emotion';
        $stmt = $this->db->query ( $sql, array($user_id));
        $stats = $stmt->result_array();

        return $stats;
    }
	
}