<?php 

include_once ROOT.'/models/Book.php';
include_once ROOT.'/models/User.php';

class GenreController{

	public function actionIndex(){
		$genresList = array();
		$genresList = Book::getGenresList();
		
		require_once(ROOT. '/views/genres/index.php');
		return true;
	}

	public function actionView($id){
		if($id){
			$booksList = Book::getBooksListByGenre($id);
		}
		
		

		require_once(ROOT. '/views/genres/view.php');
		return true;
	}


}

?>