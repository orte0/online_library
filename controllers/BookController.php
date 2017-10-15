<?php 

include_once ROOT.'/models/Book.php';
include_once ROOT.'/models/User.php';
include_once ROOT.'/models/Rating.php';

class BookController{

	public function actionIndex(){
		
		$booksList = Book::getBooksList();

		require_once(ROOT. '/views/books/index.php');
		return true;
	}


	public function actionView($id,$page){
		
		if($id){
			$booksItem = Book::getBooksItemById($id);
		}

		if($page<=1){
			$pagenum=0;
		}else{
			$pagenum = $page-1;
		}

		require_once(ROOT. '/views/books/read.php');
		return true;
	}


	public function actionRandom(){

		$amountBooks = Book::getAmountBooks();
		$random = rand(1, $amountBooks[0]);

		header("Location: /book/$random/1");
		
		require_once(ROOT. '/views/books/read.php');
		return true;
	}


	public function actionJquery(){
		$json['status'] = false;
		if(isset($_POST['book_id']) && isset($_POST['action_id']) && !User::isGuest()){
			if($book = Book::getBooksItemById($_POST['book_id'])){
				Rating::check($book['id'], $_SESSION['user'], $_POST['action_id']);
				$json['status'] = true;
				$json['rate'] = Book::getBooksItemById($book['id'])['rate'];
			}else{
				$json['message'] = 'Такой книги нет';
			}
		}else{
			$json['message'] = 'Нет доступа';
		}
		echo json_encode($json);
		return true;
	}


	public static function actionFavorite($book_id){

		$user_id = User::checkLogged();
		if(isset($user_id) && isset($book_id) && !User::isGuest()){
			Book::addBookToFavorites($user_id,$book_id);
		}
		else{
			return false;
		}
		header("Location: /book");
	}


	public static function actionSearch(){
		$booksList = [];
		$errors = false;
		if(isset($_POST['submit'])){
			if(isset($_POST['search'])){
				$search_param = $_POST['search'];
				$count = mb_strlen($search_param);
				if($count>=4){
					$errors[] = ' Результаты запроса <b>"'.$search_param.'"</b> :';
					$booksList = Book::searchBooks($search_param);
					if(!$booksList)
						$errors[] = '<br>Произведения по вашему запросу не найдены';  
				}else{
					$errors[] = '<br>Слишком короткий запрос';
				}
			}else{
				$errors[] = '<br>Введите данные';
			}
		}else{
			$errors[]='<br> - Для поиска нажмите "Поиск произведения". ';
		}

		require_once(ROOT. '/views/books/search.php');
		return true;
	}


	public static function actionBookmark($book_id,$pagenum){

		$user_id = User::checkLogged();

		if(isset($user_id) && isset($book_id) && !User::isGuest() && isset($pagenum)){
			Book::putBookmark($user_id,$book_id,$pagenum);
		}
		else{
			return false;
		}

		header("Location: /book/$book_id/$pagenum");
	}
}

