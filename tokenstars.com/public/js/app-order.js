$(document).ready(function(){

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('.buy-btn').on('click', function(){
        //console.log(this);
        $.ajax({
            method: "GET",
            url: "/order/buy/"+$(this).data("productid"),
        }).done(function( msg ) {
            $('#edit-buy-content').html(msg);
        });
    });
});
/*
function buy(product_id){
    console.log('test');
    $.ajax({
        method: "GET",
        url: "/order/buy/" + product_id.toString(),
    }).done(function( msg ) {
        $('#edit-buy-content').html(msg);
    });
}*/