<?php include ROOT . '/views/layouts/paginator.php' ?>
<?php include ROOT . '/views/layouts/header.php' ?>

<div class="container">

<?php include ROOT . '/views/layouts/nav.php' ?>

    <div class="read">
        <?php if(!Book::checkPage($pagenum)): ?>
        <div class="cover-img"><a href=""><img src="/template/images/<?php echo $booksItem['id'];?>.jpg" alt="Обложка книги" class="cover"></a></div>
        <h1 class="book-title"><?php echo $booksItem["title"];?></h1>
        <h2 class="book-author"><?php echo $booksItem["author"];?></h2>
        <?php else: ?>
        <?php endif; ?>
        <?php include ROOT . '/views/layouts/pagenav.php' ?>
        <br>
        <?php print $pages[$pagenum-1]; echo "<br>"; ?>
     </div>    
</div>
<?php include ROOT . '/views/layouts/footer.php' ?>

</body>
</html>