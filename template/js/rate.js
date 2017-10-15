<script>
    $(document).ready(function() {
        $(document).on('click', '.left-dislike', function() {
            var id = $(this).data('id');
            $.post('/book/jquery', {'book_id': id, 'action_id': 0}, function(data) {
                $('.rate-'+id).text('Рейтинг:'+data.rate);
                console.log(data);
            }, 'json');
        });

         $(document).on('click', '.right-like', function() {
            var id = $(this).data('id');
            $.post('/book/jquery', {'book_id': id, 'action_id': 1}, function(data) {
                $('.rate-'+id).text('Рейтинг:'+data.rate);
                console.log(data);
            }, 'json');
        });
    });
    
</script>
