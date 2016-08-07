<?php
namespace App\registration;

use PDO;


class Profile
{
	public $id = "";
	public $first_name = "";
	public $last_name = "";
	public $father_name = "";
	public $mother_name = "";
	public $gender = "";
	public $birth_date = "";
	public $nationality = "";
	public $religion = "";
	public $occupation = "";
	public $current_workplace = "";
	public $education = "";
	public $marital_status = "";
	public $blood_group = "";
	public $language = "";
	public $height = "";
	public $skills = "";
	public $hobbies = "";
	public $bio = "";
	public $address = "";
	public $mobile = "";
	public $fax = "";
	public $web_address = "";
	public $national_id = "";
	public $passport = "";
	public $image = "";
	public $conn = "";
	public $dbuser = 'root';
	public $dbpass = '';
	
	public function __construct()
	{
		session_start();
		$this->conn = new PDO('mysql:host=localhost;dbname=project_user_management', $this->dbuser, $this->dbpass);
	}

	public function prepare($data = "")
	{
		if (!empty($data['first_name'])) {
			$this->first_name = $data['first_name'];
		}
		if (!empty($data['last_name'])) {
			$this->last_name = $data['last_name'];
		}
		if (!empty($data['father_name'])) {
			$this->father_name = $data['father_name'];
		}
		if (!empty($data['mother_name'])) {
			$this->mother_name = $data['mother_name'];
		}
		if (!empty($data['gender'])) {
			$this->gender = $data['gender'];
		}
		if (!empty($data['birth_date'])) {
			$this->birth_date = $data['birth_date'];
		}
		if (!empty($data['nationality'])) {
			$this->nationality = $data['nationality'];
		}
		if (!empty($data['religion'])) {
			$this->religion = $data['religion'];
		}
		if (!empty($data['occupation'])) {
			$this->occupation = $data['occupation'];
		}
		if (!empty($data['workplace'])) {
			$this->current_workplace = $data['workplace'];
		}
		if (!empty($data['education'])) {
			$this->education = $data['education'];
		}
		if (!empty($data['marital_status'])) {
			$this->marital_status = $data['marital_status'];
		}
		if (!empty($data['blood_group'])) {
			$this->blood_group = $data['blood_group'];
		}
		if (!empty($data['height'])) {
			$this->height = $data['height'];
		}
		if (!empty($data['bio'])) {
			$this->bio = $data['bio'];
		}
		if (!empty($data['mobile'])) {
			$this->mobile = $data['mobile'];
		}
		if (!empty($data['user_id'])) {
			$this->id = $data['user_id'];
		}
		return $this;
	}

	public function store()
	{
		try {
			$query = "UPDATE `tbl_profiles`   
				   SET `first_name` = :firstname,
				       `last_name` = :surname,
				       `father_name` = :fname,
				       `mother_name` = :mname,
				       `gender` = :gender,
				       `birth_date` = :birth_date,
				       `nationality` = :nationality,
				       `religion` = :religion,
				       `occupation` = :occupation
				 WHERE `user_id` = :user_id";
		$stmt = $this->conn->prepare($query);
		$stmt->execute(array(
			':firstname' => $this->first_name,
			':surname' => $this->last_name,
			':fname' => $this->father_name,
			':mname' => $this->mother_name,
			':gender' => $this->gender,
			':birth_date' => $this->birth_date,
			':nationality' => $this->nationality,
			':religion' => $this->religion,
			':occupation' => $this->occupation,
			':user_id' => $this->id
			));
		header('location:profile.php');
} catch(PDOException $e) {
  echo 'Error: ' . $e->getMessage();
}
	}
}


?>