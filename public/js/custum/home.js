var idItem;
var url = 'home/';
//show quick view product
$(document).on('click','#productItem',function(e){
    e.preventDefault();
    var id = $(this).data('id'); 
    idItem = id;
    console.log(id);
    $.ajax({
        url:url+'getProductById',
        method: 'GET',
        data:{
            id:idItem
        },
        success: function(data){
            console.log(data);
            // Xóa content cũ
            $('#content_child').remove();
            $('#img_main').attr('src',data.product[0].pro_avatar);
            $('#name_product').text(data.product[0].pro_name);
            // conver price vnd
            var price = data.product[0].price;
            price = price.toLocaleString('it-IT', {style : 'currency', currency : 'VND'});
            $('#pro_price').text(price +" / "+data.product[0].type);
            var node = $('#optional');
            for(var i = 0; i< data.product.length; i++) {
                node.append('<button data-id="'+data.product[i].idDes+'" type="button" class="btn btn-danger" id="op" >'+data.product[i].type+'</button> ');
            }
            //tạo div child bời vì khi ấn vào lần nữa sẽ xóa nó
            $('#content').append('<div id="content_child">'+data.product[0].pro_content+'</div>');
        },
        error: function(error){
            console.log(error);
        }
    })
});
//quick option
$(document).on('click','#op',function(e){
    e.preventDefault();
    var id = $(this).data('id'); 
    // idItem = id;
    $.ajax({
        url:url+'getDesById',
        method: 'GET',
        data:{
            id:id
        },
        success: function(data){
            // console.log(data);
            var price = data.product.price;
            price = price.toLocaleString('it-IT', {style : 'currency', currency : 'VND'});
            $('#pro_price').text(price +" / "+data.product.type);
        },
        error: function(error){
            console.log(error);
        }
    })
});


