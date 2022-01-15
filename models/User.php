<?php
class User {
	private $db;

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
}