<?php include ROOT . '/views/layouts/header.php' ?>
<div class="container">
<?php include ROOT . '/template/js/rate.js' ?>
<?php include ROOT . '/views/layouts/nav.php' ?>
      
<form class="search-form" action="" method="post" name="search">
    <input type="text" name="search" class="search-input" value="<?php if(isset($_POST['search'])){ echo$_POST['search'];}?>">
    <input class="search-button" type="submit" name="submit" value="Поиск произведения">
</form>

    <div class="list-search">
    <div class="errors">
        <?php if (isset($errors) && is_array($errors)): ?>
            <ul>
                <?php foreach ($errors as $error): ?>
                    <li> <?php echo $error; ?></li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?> 
    </div>
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
<?php include ROOT . '/views/layouts/footer.php' ?>
</body>
</html>