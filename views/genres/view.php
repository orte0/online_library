<?php include ROOT . '/views/layouts/header.php' ?>
<div class="container">
<?php include ROOT . '/template/js/rate.js' ?>
<?php include ROOT . '/views/layouts/nav.php' ?>
    <div class="list">
    <?php foreach($booksList as $booksItems => $booksItem):?>
        <div class="book">
           <?php include ROOT . '/views/layouts/tofavorite.php' ?>
            <h4 class="book-title">
                <a href="/book/<?php echo $booksItem['id'];?>/1">
                    <?php echo $booksItem["title"];?>                     
                </a>
            </h4>

            <h5 class="book-author">
                <?php echo $booksItem["author"];?>         
            </h5>

            <div class="cover-img">
                <a href="/book/<?php echo $booksItem['id'];?>/1">
                    <img src="/template/images/<?php echo $booksItem['id'];?>.jpg" alt="Обложка книги" class="cover">
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

<?php include ROOT . '/views/layouts/footer.php' ?>
    
</body>
</html>