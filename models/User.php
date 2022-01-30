<?php
class User {
	protected $db;

	public function __construct() {
		$this->db = new Database();
	}

	public function addUser($data) {
		$this->db->query("
			INSERT INTO `user` (`fname`, `lname`, `contact_no`, `location`, `email`, `password`)
			VALUES (?, ?, ?, ?, ?, ?)
		");
		$this->db->bind(1, $data["fname"]);
		$this->db->bind(2, $data["lname"]);
		$this->db->bind(3, $data["contact-no"]);
		$this->db->bind(4, $data["location"]);
		$this->db->bind(5, $data["email"]);
		$this->db->bind(6, password_hash($data["password"], PASSWORD_DEFAULT));
		$this->db->execute("Your account was successfully created!", "../index.php");
	}

	public function confirmUser($email) {
		$this->db->query("SELECT `user_id`, `password` FROM `user` WHERE `email` = ?");
		$this->db->bind(1, $email);
		return $this->db->resultRecord();
	}

	public function getUser($id) {
		$this->db->query("SELECT * FROM `user` WHERE `user_id` = ?");
		$this->db->bind(1, $id);
		return $this->db->resultRecord();
	}

	public function getUsers() {
		$this->db->query(" SELECT `user_id`, `fname`, `lname`, `location`, `profile_picture` FROM `user`");
		return $this->db->resultSet();
	}
}