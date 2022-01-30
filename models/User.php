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

	public function editUser($data, $files) {
		require_once "../lib/upload-file.php";
		$upload_file = new UploadFile();
		$profile_picture_file_error = $files["profile-picture"]["error"];
		$id = $data["id"];

		try {
			if ($profile_picture_file_error == UPLOAD_ERR_NO_FILE) {
				$this->db->query("
					UPDATE `user`
					SET
						`fname` = ?,
						`lname` = ?,
						`contact_no` = ?,
						`location` = ?,
						`email` = ?,
						`password` = ?, 
						`status` = ?,
						`unit` = ?
					WHERE `user_id` = ?
				");
				$this->db->bind(9, $id);
			}
			else {
				$profile_picture_file_tmp_name = $files["profile-picture"]["tmp_name"];
				if ($profile_picture_file_error == UPLOAD_ERR_OK)
					if ($upload_file->isImage($profile_picture_file_tmp_name)) {
						$path = $files["profile-picture"]["name"];
						$extension = strtolower(pathinfo($path, PATHINFO_EXTENSION));
						$target_dir = "../img/profile-pictures/";
						$file_name = $id.".".$extension;
						$file_dest = $target_dir.$file_name;

						$this->db->query("
							UPDATE `user`
							SET
								`fname` = ?,
								`lname` = ?,
								`contact_no` = ?,
								`location` = ?,
								`email` = ?,
								`password` = ?, 
								`status` = ?,
								`unit` = ?,
								`profile_picture` = ?
							WHERE `user_id` = ?
						");
						$this->db->bind(9, $file_name);
						$this->db->bind(10, $id);
						move_uploaded_file($profile_picture_file_tmp_name, $file_dest);
					}
					else
						throw new Exception("Please upload image files only for proof of transaction.");
				else
					throw new Exception("[PROFILE PICTURE] ".$upload_file->codeToMessage($profile_picture_file_error));
			}

			$this->db->bind(1, $data["fname"]);
			$this->db->bind(2, $data["lname"]);
			$this->db->bind(3, $data["contact-no"]);
			$this->db->bind(4, $data["city-country-code"]);
			$this->db->bind(5, $data["email"]);
			$this->db->bind(6, password_hash($data["password"], PASSWORD_DEFAULT));
			$this->db->bind(7, $data["status"]);
			$this->db->bind(8, $data["unit"]);
			$this->db->execute("Changes were successfully saved!", "../settings.php");
		}
		catch(PDOException $e) {
			$error = $e->getMessage()." in ".$e->getFile()." on line ".$e->getLine();
			$this->db->logError($error);
		}
		catch (Exception $e) {
			$error = $e->getMessage();
			$this->db->logError($error);
			echo "<script>alert('$error');</script>";
			echo "<script>window.location.replace('../settings.php');</script>";
		}
	}
}