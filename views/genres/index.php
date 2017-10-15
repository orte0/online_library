<?php include ROOT . '/views/layouts/header.php' ?>

<div class="container">
<?php include ROOT . '/views/layouts/nav.php' ?>
    <div class="list">
    <?php foreach($genresList as $genresItems):?>
        <div class="genres">
        
            <h4 class="book-title">
            	<a href="/genre/<?php echo $genresItems['id'];?>">
            		<?php echo $genresItems["name"];?>
            	</a>
                (<?php echo Book::countBookByGenre($genresItems['id']); ?>)
            </h4>             
        </div>    
    <?php endforeach; ?>
    </div>
</div>

<?php include ROOT . '/views/layouts/footer.php' ?>
    
</body>
</html>