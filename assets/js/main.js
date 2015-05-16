(function () {
    var currentCost = $('.currentCost'),
        golesteCos = $('.golesteCos');
        
    $('#cart-popover').popover({
        html: true,
        container: 'body',
        content: function () {
            return $('#popover_content_wrapper').html();
        }
    });
    

    //adauga in cos - handle request
    $(".addToCart").on('click', function(event){
        event.preventDefault();
        var target = $(this).attr('href');
        $.get(target, function (data, status) {
            console.log(data.total);
            $('.cosgol').fadeOut(300);
            currentCost.html(data.total);
        });
    });
    
    //goleste cos
    $('.golesteCos').on('click', function(event){
        event.preventDefault();
        var target = $(this).attr('href');
        $.get(target, function (data, status) {
            console.log(data);
            //currentCost.html(data.total);
        });
    });
    
    $('.btn-sterge').on('click', function(){
        event.preventDefault();
        var target='sterge_din_cos.php?id=',
            prodID = $(this).attr('id').slice(-1),
            pretGama = parseInt($('#cart_produs_'+prodID).find('.pretGama').text(), 10),
            pretTotal = parseInt($('#costTotal').text(), 10),
            newCost = (pretTotal - pretGama);
        $.get(target+prodID, function (data, status) {
            console.log(data);
            $('#costTotal').html(newCost);
            currentCost.html(newCost);
        });
        
        $('#cart_produs_'+prodID).fadeOut(300).delay(200).hide();
    });
    
    
})();

