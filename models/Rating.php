<?php 

class Rating{

	public static function check($book_id, $user_id, $action){

		$db = Db::getConnection();

		$sql = "SELECT action FROM rating WHERE book_id = {$book_id} and user_id = {$user_id} LIMIT 1";

		$result = $db->query($sql);
		$result->setFetchMode(PDO::FETCH_ASSOC);
		$row = $result->fetch();
	   
	    if($row){
	    	
	    	if($row['action'] != $action){
	    		$db->query("update rating set action = {$action} where book_id={$book_id} and user_id={$user_id}");
	    		if($action == 0) {
	    			$sql2 = "UPDATE books SET rate = rate - 1 WHERE id = {$book_id}";
					$result = $db->query($sql2);
	    		} else {
	    			$sql2 = "UPDATE books SET rate = rate + 1 WHERE id = {$book_id}";
					$result = $db->query($sql2);
	    		}
	    	}

	    } else{
			
			$created_at=date('Y-m-d H:i:s');
			$sql = "INSERT INTO rating (user_id, book_id, created_at, action) VALUES ({$user_id}, {$book_id}, '{$created_at}', {$action}) ";
			$result = $db->query($sql);
						
			$sql2 = "UPDATE books SET rate = rate + 1 WHERE id = {$book_id}";
			$result = $db->query($sql2);

		}

	}


}