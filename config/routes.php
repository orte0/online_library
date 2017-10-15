<?php 

return array(
	'book/([0-9]+)/([0-9]+)' => 'book/view/$1/$2',
	'book/([0-9]+)' => 'book/view/$1',

	'book/favorite/([0-9]+)' => 'book/favorite/$1',	
	
	'book/bookmark/([0-9]+)/([0-9]+)' => 'book/bookmark/$1/$2',

	'book/search' => 'book/search',
	'book/random' => 'book/random',
	'book/jquery' => 'book/jquery',

	'book' => 'book/index',
	
	'genre/([0-9]+)' => 'genre/view/$1',
	'genre' => 'genre/index',
	
	'author/([0-9]+)' => 'author/view/$1',
	'author/favorite/([0-9]+)' => 'author/favorite/$1',
	'author' => 'author/index',
	
	'cabinet/favorite' => 'cabinet/favorite',
	'cabinet/([0-9]+)/([0-9]+)' => 'cabinet/deletebookmark/$1/$2',
	'cabinet' => 'cabinet/index',


	'user/login' => 'user/login',
	'user/register' => 'user/register',
	'user/logout' => 'user/logout',

	
	'' =>'book/index',

)



?>