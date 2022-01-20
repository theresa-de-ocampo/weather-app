<?php
class Friend extends User {
	public function getFriends($id) {
		$this->db->query("
			SELECT *
			FROM `friend`
			WHERE (`from` = $id OR `to` = $id) AND `status` = 'Friends'
		");
		return $this->db->resultSet();
	}

	public function getFriendRequests($id) {
		$this->db->query("
			SELECT *
			FROM `friend`
			WHERE `to` = $id AND `status` = 'Pending'
		");
		return $this->db->resultSet();
	}
}