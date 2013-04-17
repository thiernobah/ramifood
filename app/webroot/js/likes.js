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
    
     $('.confirmed').click(function() {
        id = $(this).attr('id');
        
        d = id.split('-');
        user_id = d[0];
        an_id = d[1];

        url = '/ramifood/ajax/confirmed/';

        $.post(url, {user_id: user_id,an_id:an_id}, function(data) {

            if (data.confirmed === 'ok') {

                $('.confirmed_status_' + user_id).fadeOut();
                $('.confirmed_status_' + user_id).empty().append('Vous avez vous accepté');
                $('.confirmed_status_' + user_id).fadeIn(500);
            }

        }, 'json');
        return false;
    })

});

