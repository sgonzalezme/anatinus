<?php

class PictureModel extends CI_Model {
	public function __construct() {
		$this->load->database ();
        parent::__construct();
    }


    public function saveImage($url){

        // crear la entidad
        $sql = 'INSERT INTO images
				( url )
				VALUES (?)';
        $this->db->query ( $sql, array($url));

        return  $this->db->insert_id();

    }

//	public function getAllBrands() {
//		$sql = 'SELECT 	brand.entity_id,
//						brand.role,
//						brand.user AS user_id,
//						user.email,
//						brand_avatar.savepath AS avatar,
//						CONCAT("thumbnails/", brand_avatar.savepath, "_m") AS avatar_thumbnail_m,
//						CONCAT("thumbnails/", brand_avatar.savepath, "_xs") AS avatar_thumbnail_xs,
//						brand.common_name,
//						brand.tagline,
//						brand.description,
//						brand.website,
//						brand.managed AS managed,
//						brand.edited,
//						brand.active,
//						brand.created_at,
//						CASE WHEN(brand.user IS NOT NULL) THEN user.confirmed ELSE 0 END AS confirmed,
//						COUNT(DISTINCT(followers.entity_id)) as followed_by,
//						COUNT(DISTINCT(used_brands.user)) as members
//				FROM entity AS brand
//					LEFT JOIN filebank AS brand_avatar ON brand_avatar.id=brand.avatar AND brand_avatar.isactive=1
//					LEFT JOIN follows AS brand_followers ON brand_followers.followed=brand.entity_id
//					LEFT JOIN used_brands ON used_brands.brand=brand.entity_id
//					LEFT JOIN entity AS followers ON followers.entity_id=brand_followers.follower AND followers.active=1
//					LEFT JOIN role AS brand_role ON brand_role.role_id=brand.role AND brand_role.active=1
//					LEFT JOIN videos AS brand_video ON brand_video.video_id=brand.video AND brand_video.active=1
//					LEFT JOIN user ON user.user_id=brand.user AND brand.user IS NOT NULL
//				WHERE (brand_role.role_id=3 OR (brand_role.parent IS NOT NULL AND brand_role.parent=3))
//				group by brand.entity_id';
//
//
//		$stmt = $this->db->query ( $sql );
//		$brands = $stmt->result_array();
//
//		return $brands;
//	}
	
//	public function getBrand($id) {
//		$sql = 'SELECT 	brand.entity_id,
//						brand.role,
//						brand.user AS user_id,
//						user.email,
//						brand_avatar.savepath AS avatar,
//						CONCAT("thumbnails/", brand_avatar.savepath, "_m") AS avatar_thumbnail_m,
//						CONCAT("thumbnails/", brand_avatar.savepath, "_xs") AS avatar_thumbnail_xs,
//						brand.common_name,
//						brand.tagline,
//						brand.description,
//						brand.website,
//						brand.managed AS managed,
//						brand.edited,
//						brand.created_at,
//						CASE WHEN(brand.user IS NOT NULL) THEN user.confirmed ELSE 0 END AS confirmed,
//						COUNT(DISTINCT(followers.entity_id)) as followed_by,
//						COUNT(DISTINCT(used_brands.user)) as members
//				FROM entity AS brand
//					LEFT JOIN filebank AS brand_avatar ON brand_avatar.id=brand.avatar AND brand_avatar.isactive=1
//					LEFT JOIN follows AS brand_followers ON brand_followers.followed=brand.entity_id
//					LEFT JOIN used_brands ON used_brands.brand=brand.entity_id
//					LEFT JOIN entity AS followers ON followers.entity_id=brand_followers.follower AND followers.active=1
//					LEFT JOIN role AS brand_role ON brand_role.role_id=brand.role AND brand_role.active=1
//					LEFT JOIN videos AS brand_video ON brand_video.video_id=brand.video AND brand_video.active=1
//					LEFT JOIN user ON user.user_id=brand.user AND brand.user IS NOT NULL
//				WHERE brand.entity_id = ? AND brand.active=1 AND (brand_role.role_id=3 OR (brand_role.parent IS NOT NULL AND brand_role.parent=3))';
//
//
//		$stmt = $this->db->query ( $sql, array($id) );
//		$brand = $stmt->first_row('array');
//
//		return $brand;
//	}

//	public function createUserForBrand($id, $email, $pass, $nombre){
//		// creamos el usuario
//		$enc_pass = password_hash($pass, PASSWORD_BCRYPT, array(null, PASSWORD_COST));
//
//		$sql = 'INSERT INTO user
//				(username, email, password, firstname, lastname, confirmed, validated)
//				VALUES (?, ?, ?, ?, "", 1, 1 )';
//		$this->db->query ( $sql, array($email, $email, $enc_pass, $nombre ));
//		$user_id = $this->db->insert_id();
//
//		//asociamos el nuevo usuario con la entidad
//
//		$sql = 'UPDATE entity
//				SET user = ?
//				WHERE entity.entity_id = ? ';
//		$this->db->query ( $sql, array($user_id, $id) );
//
//	}
//
//	public function updateBrand($id, $nombre, $tagline, $website, $imagen){
//		$sql = 'UPDATE entity
//				SET avatar = ?, tagline = ?, website = ?, common_name = ?, name = ?
//				WHERE entity.entity_id = ? ';
//		$this->db->query ( $sql, array($imagen, $tagline, $website, $nombre, $nombre, $id) );
//	}
//
//	public function deleteBrand($id){
//		$sql = 'UPDATE entity
//				SET active = 0
//				WHERE entity.entity_id = ? ';
//		$deleted = $this->db->query ( $sql, array($id) );
//
//		$brand = $this->getBrand($id);
//		$user_id = $brand['user_id'];
//
//		if(!is_null($user_id)){
//			$sql = 'UPDATE user
//				SET active = 0
//				WHERE user.user_id = ? ';
//			$deleted = $this->db->query ( $sql, array($user_id) );
//		}
//
//		return $deleted;
//
//	}
	
	
	
}