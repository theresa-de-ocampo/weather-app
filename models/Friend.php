<?php
class Friend extends User {
	public function getFriends($id) {
		$this->db->query("
			SELECT
				`user_id` AS `friend_id`,
				`fname`,
				`lname`,
				`profile_picture`,
				`user`.`status`
			FROM
				`user`
			INNER JOIN `friend`
				ON `user_id` = `from` OR `user_id` =`to`
			WHERE
				(`from` = $id OR `to` = $id) AND
				`friend`.`status` = 'Friends' AND
				`user_id` != $id
			ORDER BY
				`fname`
		");
		return $this->db->resultSet();
	}

	public function getFriendIds($id) {
		$this->db->query("
			SELECT
				`user_id`
			FROM
				`user`
			INNER JOIN `friend`
				ON `user_id` = `from` OR `user_id` =`to`
			WHERE
				(`from` = $id OR `to` = $id) AND
				`friend`.`status` = 'Friends' AND
				`user_id` != $id
		");
		return $this->db->resultSetOneColumn();
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

	public function sendFriendRequest($from, $to) {
		$this->db->query("INSERT INTO `friend` (`from`, `to`) VALUES (?, ?)");
		$this->db->bind(1, $from);
		$this->db->bind(2, $to);
		return $this->db->execute();
	}

	public function checkForRequest($base_id, $check_id) {
		$this->db->query("
			SELECT
				`user_id`,
				`from`
			FROM
				`user`
			INNER JOIN `friend`
				ON `user_id` = `from` OR `user_id` =`to`
			WHERE
				(
					(`from` = $base_id AND `to` = $check_id) OR
					(`from` = $check_id AND `to` = $base_id)
				) AND
				`friend`.`status` = 'Pending' AND
				`user_id` != $base_id
		");
		return $this->db->resultRecord();
	}
}