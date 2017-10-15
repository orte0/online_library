       <div class="page-nav">
        <a class="page-nav" href="/book/<?=$booksItem['id'];?>/<?=$pagenum++;?>"> 
            << 
        </a>
            
            <a class="page-nav" href=""><?php echo $pagenum; ?> </a>

        <a class="page-nav" href="/book/<?=$booksItem['id'];?>/<?=$pagenum+1;?>"> 
            >> 
        </a>

        <a href="/book/bookmark/<?php echo $booksItem['id'];?>/<?php echo $pagenum; ?>" class="to-bookmark">Добавить закладку</a>
        </div>