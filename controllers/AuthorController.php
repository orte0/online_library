<?php 

include_once ROOT.'/models/Book.php';
include_once ROOT.'/models/User.php';

class AuthorController{

	public function actionIndex(){

		$authorsList = Book::getAuthorsList();

		require_once(ROOT. '/views/authors/index.php');
		return true;
	}

	public function actionView($id){

		if($id){
			$booksList = Book::getBooksListByAuthor($id);
		}

		
		require_once(ROOT. '/views/authors/view.php');
		return true;
	}

	public static function actionFavorite($author_id){

		$user_id = User::checkLogged();
		if(isset($user_id) && isset($author_id) && !User::isGuest()){
			Book::addAuthorToFavorites($user_id,$author_id);
		}
		else{
			return false;
		}
		header("Location: /author");
	}

}