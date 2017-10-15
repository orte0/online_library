<?php include ROOT . '/views/layouts/header.php' ?>
<div class="container">
<?php include ROOT . '/views/layouts/nav.php' ?>
    <div class="list">
    <?php foreach($authorsList as $authorsItems ):?>
        <div class="genres">
            <h4 class="book-title">
                <?php if(!User::isGuest()): ?>
                <a href="author/favorite/<?php echo $authorsItems['id'];?>">+</a>
                <?php else: ?>
                <?php endif; ?>
            	<a href="/author/<?php echo $authorsItems['id'];?>">
            		<?php echo $authorsItems["name"];?>
            	</a>
                (<?php echo Book::countBookByAuthor($authorsItems['id']) ?>)
            </h4>             
        </div>    
    <?php endforeach; ?>
    </div>
</div>

<?php include ROOT . '/views/layouts/footer.php' ?>
    
</body>
</html>