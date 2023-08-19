var $container = $('#add-like');
$container.on('click',function(e){
    e.preventDefault();
    $.ajax({
        url: '/addlike',
        method: 'POST'
    }).then(function (response){
        $('#total-likes').text(response.totalLikeCount + ' LIKES');
    });
});