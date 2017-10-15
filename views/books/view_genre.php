<?php include ROOT . '/views/layouts/header.php' ?>
<div class="container">
<?php include ROOT . '/template/js/rate.js' ?>
<?php include ROOT . '/views/layouts/nav.php' ?>
    <div class="list">
    <?php foreach($booksList as $booksItems => $booksItem):?>
        <div class="book">
            
            <h2 class="book-title">
                <a href="/book/<?php echo $booksItem['id'];?>">
                    <?php echo $booksItem["title"];?>                     
                </a>
            </h2>

            <h3 class="book-author">
                <a href="#">
                    <?php echo $booksItem["author"];?>                        
                </a>
            </h3>

            <div class="cover-img">
                <a href="/book/<?php echo $booksItem['id'];?>">
                    <img src="/template/images/<?php echo $booksItem['id'];?>.jpg" alt="Обложка книги" class="cover">
                </a>
            </div>
            
            <div class="left-dislike">
                <form action="" method="post" >
                    <input type="button" name="dislike" value="-" class="btn">
                </form>
            </div>

            <div class="book-rate">Оценка:
                <?php echo $booksItem["rate"];?>
            </div>

            <div class="right-like">
                <form action="" method="post" >
                    <input type="button" name="like" value="+" class="btn">
                </form>
            </div>  
             
        </div>    
    
    <?php endforeach; ?>

    </div>
</div>

<?php include ROOT . '/views/layouts/footer.php' ?>
    
</body>
</html>