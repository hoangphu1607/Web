var idItem;
var url = 'home/getProductById';

$(document).on('click','#productItem',function(e){
    e.preventDefault();
    idItem = $(this).data('id');  
    $.ajax({
        url:url,
        method: 'GET',
        data:{
            id:idItem
        },
        success: function(data){
            console.log(data);
            $('#img_main').attr('src',data.product[0].pro_avatar);
            $('#name_product').text(data.product[0].pro_name);
            // conver price vnd
            var price = data.product[0].pro_price;
            price = price.toLocaleString('it-IT', {style : 'currency', currency : 'VND'});
            $('#pro_price').text(price +" / "+data.product[0].pro_content);
            // $('#pro_status').text(data.product[0].pro_status);
            
        },
        error: function(error){
            console.log(error);
        }
    })
});
console.log(idItem);

