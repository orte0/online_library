<?php if(!User::isGuest()): ?>
        <a href="/book/favorite/<?php echo $booksItem['id'];?>">
            <div class="toFavorites">В избранное
                <?php if(Book::checkFavoriteBook($_SESSION['user'], $booksItem['id'])): ?>
            <img src="/template/images/icons/galochka.png" alt="добавлено" class="galochka">
            <?php else: ?>
        <?php endif; ?>            
    </div>
<span class="clear"></span>          
</a>
<?php else: ?>
<?php endif; ?>






