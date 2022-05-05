var table = $('#myTable').DataTable({
    "ajax": urlGetBillUserOrder,
    "columns" : [
        // {data: "b_id",
        //     render: (data, type, row, meta) => meta.row + 1
        // },
        {data:"b_id"},
        {data:"u_name"},
        // {data:"b_phone"},
        {data:"address"},
        {data:"b_total"},
        {data:"b_id", //chi tiet don hang
        render: function(data, type, row){
            return '<button data-id="'+data+'" type="button" class="btn btn-info" data-toggle="modal" data-target="#listOrderDetail" id="showListOrder"><i class="fa-solid fa-bars"></i></button>'
        }},
        {data:"b_total", // ghi chu
        render: function(data, type, row){
            return '<button data-id="'+data+'" type="button" class="btn btn-warning" data-toggle="modal" data-target="#contentModal" id="editContent"><i class="fa-solid fa-comment-dots"></i></button>'
        }},
        {data:"b_total",// xac nhan
        render: function(data, type, row){
            return '<button data-id="'+data+'" type="button" class="btn btn-success" data-toggle="modal" data-target="#contentModal" id="editContent"><i class="fa-regular fa-circle-check"></i></button>'
        }},
        {data:"b_total", // xoa
        render: function(data, type, row){
            return '<button data-id="'+data+'" type="button" class="btn btn-danger" data-toggle="modal" data-target="#contentModal" id="editContent"><i class="fa-regular fa-trash-can"></i></button>'
        }},

    ] ,
    columnDefs: [
        {
            targets: [0, -1,-2,-3,-4],
            className: 'dt-body-center'
        },          
    ]           
});
var id_bill;
$(document).on('click', '#showListOrder', function(e){
    e.preventDefault();
    id_bill = $(this).data('id');
    console.log(id_bill);
    $('.single-review').remove();
    $.ajax({
        url:urlGetBillDetailById,
        data:{
            id:id_bill
        },
        method: 'GET',
        success: function(data){
            // $('.img_product').attr("src", asset+data.pd[0].pro_avatar);
            // $('.product_name').text(data.pd[0].pro_name);
            // $('.product_des').text('Loại : '+ data.pd[0].pro_content);
            // $('.product_amount').text('Số Lượng : '+ data.pd[0].bd_amount); 
                  
            $('.checkout-head').append(data.pd)
        },
        error: function(error){
            console.log(error);

        }
    })
});



