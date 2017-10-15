<?php  
    $filename = ROOT . "/files/books/" . $booksItem['id'] . ".txt";
    $file = file_get_contents($filename);
    $text = wordwrap($file, 3500, '|', true);
    $text = str_replace("\r\n","<br>", $text);
    $pages = explode ('|', $text);
    $count = count($pages);
    if($pagenum>$count-1){
        $pagenum=$count-1;
    }

?>