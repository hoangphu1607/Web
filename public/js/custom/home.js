var idItem;
var url = 'home/';
//price global when not selected
var price;
var description_detail_id;
var numOrder;
//show quick view product
$(document).on('click','#productItem',function(e){
    e.preventDefault();
    var id = $(this).data('id'); 
    idItem = id;
    $.ajax({
        url:url+'getProductById',
        method: 'GET',
        data:{
            id:idItem
        },
        success: function(data){
            // console.log(data);
            // Xóa content cũ
            $('#content_child').remove();
            //refresh option 
            $('.op').remove();
            // console.log(data.product[0].id);
            $('#OrderProduct').attr('data-id',data.product[0].id);
            $('#img_main').attr('src',data.product[0].pro_avatar);
            $('#name_product').text(data.product[0].pro_name);
            // conver price vnd
            price = data.product[0].price;
            description_detail_id = data.product[0].id;
            // console.log('description_detail_id: ' + description_detail_id);
            priceConver = price.toLocaleString('it-IT', {style : 'currency', currency : 'VND'});
            $('#pro_price').text(priceConver +" / "+data.product[0].type);
            var node = $('#optional');
            for(var i = 0; i< data.product.length; i++) {
                node.append('<button data-id="'+data.product[i].idDes+'" type="button" class="btn btn-danger op" id="op" >'+data.product[i].type+'</button> ');
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
            console.log(data);
            price = data.product.price;
            description_detail_id = data.product.id;
            // console.log(description_detail_id);
            priceConver = price.toLocaleString('it-IT', {style : 'currency', currency : 'VND'});
            $('#pro_price').text(priceConver +" / "+data.product.type);
        },
        error: function(error){
            console.log(error);
        }
    })
});
// $(document).on('click',function(e){
//     e.preventDefault();
//     var id = $(this).data('id')
// })
//order product
$('#formOrder').on('submit', function(e){
    e.preventDefault();
    // console.log(idItem);
    var data = new FormData(this);
    var amount = $('#quantity').val();
    // console.log(data);
    data.append('id', idItem);
    data.append('_token',_token);
    data.append('price',price);
    data.append('amount',amount);
    data.append('description_detail_id',description_detail_id)
    $.ajax({
        url: url+'orderProduct',
        method: 'POST',
        data:data,
        contentType: false,
        cache: false,
        processData: false,  
        success: function(data){
            toastr["success"]("Đặt hàng thành công!!!", "Thông Báo");  
            $('#quatityOrder').text(data.num + " Sản phẩm");
        },
        error: function(error){
            console.log(error);
        }
    })
})  	


//button option number
$(document).ready(function(){
    var quantitiy=0;
       $('.quantity-right-plus').click(function(e){
            // Stop acting like a button
            e.preventDefault();
            // Get the field name
            var quantity = parseInt($('#quantity').val());
            // If is not undefined
                $('#quantity').val(quantity + 1);
                // Increment
        });
        $('.quantity-left-minus').click(function(e){
            // Stop acting like a button
            e.preventDefault();
            // Get the field name
            var quantity = parseInt($('#quantity').val());
            // If is not undefined
                // Increment
                if(quantity>0){
                $('#quantity').val(quantity - 1);
                }
        });
        
});

function getQuantityOrder() {
    var num;
    $.ajax({
        url:urlGetQuantityOrder,
        data:{
            "idOrder":idOrder
        },
        method: 'GET',
        success: function(data){           
            num =  data.idOrder;
        },
        error: function(error){
            console.log(error);
        }
    });
    return num;
}




