<?php include ROOT . '/views/layouts/header.php' ?>
	<div class="container">
<?php include ROOT . '/views/layouts/nav.php' ?>
<?php include ROOT . '/template/js/rate.js' ?>   		
<div class="list">
	<div class="bookmarks"><h4>Ваши закладки:</h4>
	    <ul class="bookmarks">
		<?php $i=1; ?>
		<?php foreach($bookmarkList as $bookmarkItems ):?>
	    
	    <li>
	    	<a class="bookmark-delete" href="/cabinet/<?php echo $bookmarkItems["bookmark"];?>">
	    	  	Удалить 
	    	</a>
	    	<a class="bookmark" href="/book/<?php echo $bookmarkItems["bookmark"];?>">
	    	  	Закладка <?php echo $bookmarkItems["bookmark"];?>
	    	</a>
		</li>
	    	   
	    <?php $i++; ?>
	 	<?php endforeach; ?>
		</ul>             
	</div>  
	<div class="list-favorites">
		<h4>Избранные произведения:</h4>
		<?php foreach($booksList as $booksItem):?>
    	<div class="book">
        <?php include ROOT . '/views/layouts/tofavorite.php' ?>
        	<div>
            	<h4 class="book-title">
            	    <a href="/book/<?php echo $booksItem['id'];?>/1">
            	        <?php echo $booksItem["title"];?>
            	    </a>
            	</h4>
            	<h5 class="book-author">
            	    <a href="">
            	        <?php echo $booksItem["author"];?>
            	    </a>
            	</h5>
        	</div>
       		<div class="cover-img">
       		    <a href="/book/<?php echo $booksItem['id'];?>/1">
       		        <img    src="/template/images/<?php echo $booksItem['id'];?>.jpg" 
       		                alt="Обложка книги" 
       		                class="cover">
       		    </a>
       		</div>
            
        <?php if(!User::isGuest()): ?>
        <?php include ROOT . '/views/layouts/rate.php' ?>
        <?php else: ?>
        <?php endif; ?>
        </div> 
        <?php endforeach; ?>  
        </div> 
	</div>
</div>    
  

</div>
</div>

<?php include ROOT . '/views/layouts/footer.php' ?>
    
</body>
</html>