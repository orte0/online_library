<?php 

class Book {

///////////////////////////////
// ВОЗВРАЩАЕТ СПИСОК АВТОРОВ //
///////////////////////////////
	public static function getAuthorsList(){

		$db = Db::getConnection();

		$authorsList = array();

		$sql = 'SELECT * FROM authors ORDER BY name DESC LIMIT 10';

		$result = $db->query($sql);
		$result->setFetchMode(PDO::FETCH_ASSOC);
		
		while($row = $result->fetch())
			$authorsList[] = $row;

		return $authorsList;
	}


///////////////////////////////////
// ВОЗВРАЩАЕТ СПИСОК КНИГ АВТОРА //
///////////////////////////////////

	public static function getBooksListByAuthor($id, $skip=0, $limit = 10){

		$db = Db::getConnection();
		
		$sql = "SELECT * FROM books WHERE author = {$id}";
		$result = $db->query($sql);		
		$booksList = array();	
		
		$str = "select * from authors";
		$authors = $db->query($str);
		$arr = [];
		while($r = $authors->fetch())
			$arr[$r['id']] = $r;

		$i=0;
		while($row = $result->fetch()) {
			$booksList[] = $row;
			$booksList[$i]['author'] = $arr[$row['author']]['name'];
			$i++;
		}
						
		return $booksList;
	}


////////////////////////////
// ВОЗВРАЩАЕТ СПИСОК КНИГ //
////////////////////////////
	public static function getBooksList($skip=0, $limit = 10){

		$db = Db::getConnection();

		$booksList = array();
		$sql = "SELECT * FROM books ORDER BY title  LIMIT  {$skip},  {$limit}";
		$result = $db->query($sql);
		$str = "select * from authors";
		$authors = $db->query($str);
		$arr = [];
		while($r = $authors->fetch())
			$arr[$r['id']] = $r;
		$i = 0;
		while($row = $result->fetch()){
			$booksList[$i] = $row;
			$booksList[$i]['author'] = $arr[$row['author']]['name'];
			$i++;
		}
		return $booksList;
	}


////////////////////////////////
// ВОЗВРАЩАЕТ КОЛИЧЕСТВО КНИГ //
////////////////////////////////
	public static function getAmountBooks(){
		$db = Db::getConnection();
		$sql = "SELECT COUNT(1) FROM books";
		$result = $db->query($sql);
		$amountBooks = $result->fetch();
		return $amountBooks;
	}



////////////////////////////////
// ВОЗВРАЩАЕТ КНИГУ ПО id=$id //
////////////////////////////////
	public static function getBooksItemById($id){
		$id = intval($id);

		if($id){
			
			$db = Db::getConnection();
			$sql = 'SELECT * FROM books WHERE id=' . $id;
			$result = $db->query($sql);
			$result->setFetchMode(PDO::FETCH_ASSOC);
			$booksItem = $result->fetch();

			$authorId = $booksItem['author'];
			$sql = "SELECT * FROM authors WHERE id =" . $authorId;
			$result = $db->query($sql);
			$result->setFetchMode(PDO::FETCH_ASSOC);
			$authorsItem = $result->fetch();
			$booksItem['author'] = $authorsItem['name'];

			return $booksItem;

		}
		return false;
	}


//////////////////////////////
// ВОЗВРАЩАЕТ СПИСОК ЖАНРОВ //
//////////////////////////////
	public static function getGenresList(){

		$db= Db::getConnection();

		$genresList = array();

		$sql = 'SELECT id , name FROM genres ' . ' ORDER by sort_order ASC ';

		$result = $db->query($sql);

		$i = 0;
		while($row = $result->fetch()){
			$genresList[$i]['id'] = $row['id'];
			$genresList[$i]['name'] = $row['name'];
			$i++;
		}
		
		return $genresList;
	}

//////////////////////////////////////////////
// ВОЗВРАЩАЕТ СПИСОК КНИГ В ЖАНРЕ genre=$id //
//////////////////////////////////////////////
	public static function getBooksListByGenre($id){

		if($id){
			$db = Db::getConnection();
			$booksList = array();

			$sql = "SELECT * FROM books WHERE genre = $id ORDER BY id LIMIT 10";

			$result = $db->query($sql);
			
			$str = "select * from authors";
			$authors = $db->query($str);
			$arr = [];
			while($r = $authors->fetch())
				$arr[$r['id']] = $r;

			$i = 0;
			while($row = $result->fetch()){
				$booksList[$i] = $row;
				$booksList[$i]['author'] = $arr[$row['author']]['name'];
				$i++;
			}
			return $booksList;
		}
	}

////////////////////////////////////////////////////////////////////////
// ВОЗВРАЩАЕТ СПИСОК КНИГУ $book_id В ИЗБРАННОЕ ПОЛЬЗОВАТЕЛЯ $user_id //
////////////////////////////////////////////////////////////////////////

	public static function addBookToFavorites($user_id,$book_id){
		
		$db = Db::getConnection();

		$sql_favorite = "SELECT user_id FROM favorites WHERE user_id = {$user_id} and book_id = {$book_id}";
		$result = $db->query($sql_favorite);
		$result = $result->fetch();

		if(!$result){
			$sql = "INSERT INTO favorites (user_id, book_id) VALUES ({$user_id}, {$book_id})";
			$result = $db->query($sql);
		}else{
			$sql = "DELETE FROM favorites WHERE user_id = {$user_id} and book_id = {$book_id}";
			$result = $db->query($sql);
		}
	}


//////////////////////////////////////////////////////////////////////////////////
// ПРОВЕРЯЕТ НАЛИЧИЕ КНИГИ $book_id В СПИСКЕ ИЗБРАННОГО У ПОЛЬЗОВАТЕЛЯ $user_id //
//////////////////////////////////////////////////////////////////////////////////
	public static function checkFavoriteBook($user_id,$book_id){

		$db = Db::getConnection();

		$sql = "SELECT * FROM favorites WHERE user_id = {$user_id} and book_id = {$book_id}";
		$result = $db->query($sql);
		$result = $result->fetch();
		if($result){
			return true;
		}else{
			return false;
		}
	}


////////////////////////////////////////////////////
// ПРОВЕРКА КОРРЕКТНОСТИ СТРАНИЦЫ ПРОСМОТРА КНИГИ //
////////////////////////////////////////////////////
	public static function checkPage($pagenum){
		if($pagenum>=1){
			return true;
		}
		else{
			return false;
		}
	}

////////////////////////////////////////////////////////////
// ВОЗВРАЩАЕТ СПИСОК КНИГ СООТВЕТСТВУЮЩИХ УСЛОВИЯМ ПОИСКА //
////////////////////////////////////////////////////////////
	public static function searchBooks($searchParam){

		$db = Db::getConnection();
		$booksList = array();
		$sql = "SELECT * FROM books WHERE title 
			LIKE '%{$searchParam}%' OR description 
			LIKE '%{$searchParam}%'";

		$result = $db->query($sql);
		$str = "select * from authors";
		$authors = $db->query($str);
		$arr = [];
		while($r = $authors->fetch())
			$arr[$r['id']] = $r;

		$i = 0;
		while($row = $result->fetch()){
			$booksList[$i] = $row;
			$booksList[$i]['author'] = $arr[$row['author']]['name'];
			$i++;
		}
		return $booksList;

	}

//////////////////////////////////////////////////
// ЕДИНОЖДЫ ОСТАВЛЯЕТ ЗАКЛАДКУ ТЕКУЩЕЙ СТРАНИЦЫ //
//////////////////////////////////////////////////
	public static function putBookmark($user_id,$book_id,$pagenum){
		$db = Db::getConnection();
		
		$bookmark = $book_id."/".$pagenum;

		$sql = "SELECT * FROM bookmarks WHERE user_id = {$user_id} and bookmark = '{$bookmark}'";
		$result = $db->query($sql);
		$result = $result->fetch();
		if(!$result){
			$sql = "INSERT INTO bookmarks (user_id, bookmark) VALUES ({$user_id}, '{$bookmark}')"; 
			$result = $db->query($sql);
		}else{
			return false;
		}

	}

/////////////////////////////////////////////
// ВОЗВРАЩАЕТ СПИСОК ЗАКЛАДОК ПОЛЬЗОВАТЕЛЯ //
/////////////////////////////////////////////
	public static function getBookmarkList($user_id){

		$db = Db::getConnection();

		$sql = "SELECT bookmark FROM bookmarks WHERE user_id = {$user_id}";

		$result = $db->query($sql);
		$result->setFetchMode(PDO::FETCH_ASSOC);
		
		$bookmarkList = [];
		
		while($row = $result->fetch())
			$bookmarkList[] = $row;

		return $bookmarkList;
	}
//////////////////////
// УДАЛЯЕТ ЗАКЛАДКУ //
//////////////////////
	public static function deleteBookmark($user_id,$book_id,$pagenum){
		$db = Db::getConnection();
		$bookmark = $book_id."/".$pagenum;
			$sql = "DELETE FROM bookmarks WHERE user_id = {$user_id} and bookmark = '{$bookmark}'";
			$result = $db->query($sql);		
	}


////////////////////////////////////////
// ВОЗВРАЩАЕТ КОЛИЧЕСТВО КНИГ В ЖАНРЕ //
////////////////////////////////////////
	public static function countBookByGenre($genre_id){
		$db = Db::getConnection();
		$sql = "SELECT COUNT(*) FROM books WHERE genre = {$genre_id}";
		$result = $db->query($sql);
		$result = $result->fetch();
		return $result[0];

		
	}


///////////////////////////////////////
// ВОЗВРАЩАЕТ КОЛИЧЕСТВО КНИГ АВТОРА //
///////////////////////////////////////
	public static function countBookByAuthor($author_id){
		$db = Db::getConnection();
		$sql = "SELECT COUNT(*) FROM books WHERE author = {$author_id}";
		$result = $db->query($sql);
		$result = $result->fetch();
		return $result[0];
	}



////////////////////////////////////////////////////////////
// ВОЗВРАЩАЕТ СПИСОК ИЗБРАННЫХ КНИГ ПОЛЬЗОВАТЕЛЯ $user_id //
////////////////////////////////////////////////////////////
	public static function getFavoritesBookList($user_id){
		$db = Db::getConnection();
		$sql = "SELECT book_id FROM favorites WHERE user_id = {$user_id}";
		$result = $db->query($sql);
		
		$idsList = [];
		while ($row = $result->fetch())
			$idsList[] = $row[0];

		$sql = "SELECT * FROM books WHERE id IN (".implode(',',$idsList).")";
		$result = $db->query($sql);

		$str = "SELECT * from authors";
		$authors = $db->query($str);
		$arr = [];
		while($r = $authors->fetch())
			$arr[$r['id']] = $r;
		
		$booksList = [];
		
		if($result){
			$i = 0;
			while($row = $result->fetch()){
				$booksList[$i] = $row;
				$booksList[$i]['author'] = $arr[$row['author']]['name'];
				$i++;
			}
		}


		return $booksList;
		
	}

}





