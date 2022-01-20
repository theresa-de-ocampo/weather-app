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

	public function updateFriendRequest($from, $to, $status) {
		$this->db->query("
			UPDATE `friend`
			SET `status` = ?
			WHERE `from` = ? AND `to` = ?
		");
		$this->db->bind(1, $status);
		$this->db->bind(2, $from);
		$this->db->bind(3, $to);
		return $this->db->execute();
	}

	public function deleteFriendRequest($from, $to) {
		$this->db->query("
			DELETE FROM `friend`
			WHERE `from` = ? AND `to` = ?
		");
		$this->db->bind(1, $from);
		$this->db->bind(2, $to);
		return $this->db->execute();
	}
}