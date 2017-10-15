<?php

include_once ROOT . '/models/User.php';
include_once ROOT . '/models/Book.php';

class CabinetController{

	public function actionIndex(){
		
		$user_id = User::checkLogged();
		$bookmarkList = Book::getBookmarkList($user_id);
		
			$booksList = Book::getFavoritesBookList($user_id);
		
		require_once(ROOT . '/views/cabinet/index.php');

		return true;

	}


	public static function actionDeletebookmark($book_id,$pagenum){
		
		$user_id = User::checkLogged();
		
		if(isset($user_id) && isset($book_id) && !User::isGuest() && isset($pagenum)){
			
			Book::deleteBookmark($user_id,$book_id,$pagenum);
		}
		else{
			return false;
		}

		header("Location: /cabinet/");
	}
	




}