$(function() {
    $('#liker').tooltip({
        placement: 'top'
    })

    $('.like').click(function() {
        id = $(this).attr('id');

        url = '/ramifood/ajax/like/';

        $.post(url, {id: id}, function(data) {

            if (data.like) {

                $('.like_count_' + id).fadeOut();
                $('.like_count_' + id).empty().append('<i class="icon icon-thumbs-up"></i>' + data.like);
                $('.like_count_' + id).fadeIn(500);
            }

        }, 'json');
        return false;
    })

});

