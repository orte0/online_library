<?php 

include_once ROOT . '/models/User.php';

class UserController{


	public static function actionRegister(){
		
		$email = '';
		$password = '';
		$result = false;
		$errors = false; 
		

		if(isset($_POST['submit'])){
			$email = $_POST['email'];
			$password = $_POST['password'];
		}

		if(!User::checkEmail($email)){
			$errors[] = 'Введён неверный Email';
		}

		if(!User::checkPassword($password)){
			$errors[] = 'Пароль не должен быть короче 6ти символов';
		}

		if(User::checkEmailExists($email)){
			$errors[] = 'Такой email уже используется';
		}

		if($errors == false){
			$result = User::register($email, md5($password));
		}



		require_once(ROOT . '/views/regauth/register.php');
		return true;
	}

	public static function actionLogin(){
		
		$email = '';
		$password = '';
		
		
		if(isset($_POST['submit'])){
			$email = $_POST['email'];
			$password = $_POST['password'];

			$errors = false; 

			if(!User::checkEmail($email)){
				$errors[] = 'Введён неверный Email';
			}

			if(!User::checkPassword($password)){
				$errors[] = 'Пароль не должен быть короче 6-ти символов';
			}
			
			$userId = User::checkUserData($email,md5($password));

			if($userId == false){
				$errors[] = "Введены неверные данные!";
			}
			else{
				User::auth($userId);

				header("Location: /cabinet/");
			}

		} 

		require_once(ROOT . "/views/regauth/login.php");
		return true;
	}


	public function actionLogout(){
		if(!isset($_SESSION)){
			session_start();
		}
		unset($_SESSION["user"]);
		header("Location: /book/");
		return true;
	}

	

	
	
	


}


