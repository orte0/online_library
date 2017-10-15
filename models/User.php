<?php 

class User
{


	public static function register($email, $password){

		$db = Db::getConnection();

		$sql = 'INSERT INTO users (`email`, `pass`, `created_at`) '
			. ' VALUES (:email, :password, :date) ';
			
		$date=date('Y-m-d H:i:s');
		
		$result = $db->prepare($sql);
		$result->bindParam(':email', $email, PDO::PARAM_STR);
		$result->bindParam(':password', $password, PDO::PARAM_STR);
		$result->bindParam(':date', $date);

		return $result->execute();

	}

	
	public static function checkPassword($password){
		
		if(mb_strlen($password) >= 6)
			return true;
		return false;
	}


	public static function checkEmail($email){

		if(filter_var($email, FILTER_VALIDATE_EMAIL))
			return true;
		return false;
	}


	public static function checkEmailExists($email){

		$db = Db::getConnection();

		$sql = 'SELECT * FROM users WHERE email = :email LIMIT 1';

		$result = $db->prepare($sql);
		$result->bindParam(':email', $email, PDO::PARAM_STR);
		$result->execute();

		return $result->fetchAll(\PDO::FETCH_ASSOC) ? true : false;
	}



	public static function checkUserData($email, $password){
		
		$db = Db::getConnection();

		$sql = "SELECT * FROM users WHERE email = :email and pass = :password ";

		$result = $db->prepare($sql);

		$result->bindParam(':email', $email, PDO::PARAM_STR);
		$result->bindParam(':password', $password, PDO::PARAM_STR);
		$result->execute();

		$user = $result->fetch();
		
		if($user){
			return $user["id"];
		}
		
		return false;
	}


	public static function auth($userId){
		
		$_SESSION["user"] = $userId;

		if(!isset($_SESSION)){
			session_start();
		}

	}


	public static function checkLogged(){

		if(!isset($_SESSION)){
			session_start();
		}
		
		if(isset($_SESSION["user"])){
			return $_SESSION["user"];
		}
		
		header("Location: /user/login");
	}


 	public static function isGuest(){
 		
 		if(!isset($_SESSION)){
			session_start();
		}
		
		if(isset($_SESSION["user"])){
			return false;
		}
		return true;
 	}

 	

}