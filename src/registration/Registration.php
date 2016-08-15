<?php

namespace App\registration;

use PDO;


class Registration 
{
	public $dbuser = 'root';
	public $dbpass = '';
	public $conn = "";
	public $id = "";
	public $name = "";
	public $pass = "";
	public $email = "";
	public $data = "";
	public $verify_id = "";
	public function __construct()
	{
		session_start();
		$this->conn = new PDO('mysql:host=localhost;dbname=project_user_management', $this->dbuser, $this->dbpass);
	}

	public function prepare($data = "")
	{
		$this->name = $data['username'];
		$this->pass = $data['pass'];
		$this->email = $data['email'];
		if (!empty($data['vid'])) {
			$thi->verify_id = $dat['vid'];
		} else {
			# code...
		}
		
		return $this;
	}

	public function index()
	{
		try {
			$query = "SELECT * FROM `tbl_users` ";
			$stmt = $this->conn->prepare($query) or die('Unable to query.');
			while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
				$this->data[] = $row;
			}
		} catch (Exception $e) {
			echo "Error: " . $e->getMessage();
		}
		return $this->data;
		return $this;
	}

	public function signup()
	{
		try {
			$username = "'$this->name'";
			$query = "SELECT * FROM `tbl_users` WHERE username=" . $username;
			$stmt = $this->conn->prepare($query);
			$stmt->execute();
			$user = $stmt->fetch(PDO::FETCH_ASSOC);

			$email = "'$this->email'";
			$query = "SELECT * FROM `tbl_users` WHERE email=" . $email;
			$stmt = $this->conn->prepare($query);
			$stmt->execute();
			$mail = $stmt->fetch(PDO::FETCH_ASSOC);
			if (!empty($user)) {
				$_SESSION['Message'] = 'Username already exists.';
				header('location:signup.php');
			} elseif (!empty($mail)) {
				$_SESSION['Message'] = 'Already registered with this email.';
				header('location:signup.php');
			} else {
				$verify_code = uniqid();
				$query = "INSERT into `tbl_users`(id, unique_id, username, password, email, verification_id, is_active, is_admin, created_at, deleted) VALUES(:id, :uid, :usr, :pass, :email, :vid, :active, :admin, :created, :deleted)";
				$stmt = $this->conn->prepare($query);
				$stmt->execute(array(
					':id' => null,
					':uid' => uniqid(),
					':usr' => $this->name,
					':pass' => $this->pass,
					':email' => $this->email,
					':vid' => $verify_code,
					':active'=> 0,
					':admin'=> 0,
					':created' => date("Y-m-d H:i:s"),
					':deleted' => 0,
					));
				$_SESSION['Message'] = "Successfully signup. Login for continue";
                $msg = "Click the below link for verify your email address.<br/> http://localhost/views/verify.php?vid=$verify_code";
                $msg = wordwrap($msg, 70);
                mail("$this->email", "sumonmhd.com", $msg);
                $last_id = $this->conn->lastInsertId();
                $qr = "INSERT into `tbl_profiles`(id, user_id) VALUES(:id, :usr_id)";
                $stmt = $this->conn->prepare($qr);
                $stmt->execute(array(
                	':id' => null,
                	':usr_id' => $last_id,
                	));
                header('location:signup.php');
			}
			

		} catch (Exception $e) {
			echo 'Error: ' . $e->getMessage();
		}
	}

	public function login()
	{
		$username = "'$this->name'";
		$password = "'$this->pass'";
		$query = "SELECT * FROM `tbl_users` WHERE username = $username AND password = $password";
		$stmt = $this->conn->prepare($query);
		$stmt->execute();
		$user = $stmt->fetch(PDO::FETCH_ASSOC);
		if (isset($user) && !empty($user)) {
			if ($user['is_active'] == 0) {
				$_SESSION['Message'] = "<h3>Your account is not verified yet. Check your Email.</h3>";
				header('location:login.php');
			} else {
				$_SESSION['user'] = $user;
				header('location:index.php');
			}
			
		} else {
			$_SESSION['Message'] = "<h3>Invalid username or password.</h3>";
			header('location:login.php');
		}
		
	}

	public function verification()
	{
		$verify_code = "'$this->verify_id'";
		$query = "SELECT * FROM `tbl_users` WHERE verification_id = $verify_id";
		$stmt = $this->conn->prepare($query);
		$stmt->execute();
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		if(isset($row['verification_id']))
		{
			$qr = "UPDATE `tbl_users` SET is_active = 1 WHERE `verification_id` = $verify_id";
			$stmt = $this->conn->prepare($qr);
			if ($stmt->execute()) {
				$_SESSION['Message'] = "<h2>You are verified now. Thank you.</h2>";
				header('location:login.php');
			}
		}
	}
}

?>