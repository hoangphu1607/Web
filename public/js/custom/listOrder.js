var table = $('#myTable').DataTable({
    "ajax": {
        url:urlGetBillUserOrder,
        data: {
           code : code
        }
    },
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
        {data:"b_id", // ghi chu
        render: function(data, type, row){
            return '<button data-id="'+data+'" type="button" class="btn btn-warning" onclick="showNote('+data+')" data-toggle="modal" data-target="#noteOrder" ><i class="fa-solid fa-comment-dots"></i></button>'
        }},
        {data:"b_id",// xac nhan
        render: function(data, type, row){
            if(row.b_status == 1){
                return '<button data-id="'+data+'" type="button" class="btn btn-success" onclick="delivery('+data+')" >Giao Hàng <i class="fa-solid fa-truck"></i></button>'
            }else if(row.b_status == 2)
                return '<button data-id="'+data+'" type="button" class="btn btn-success" onclick="delivery('+data+')" >Đã Nhận Hàng <i class="fa-regular fa-circle-check"></i></button>'
            else
                return 'Hoàn Tất Giao Dịch';
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
    // console.log(id_bill);
    $('.single-review').remove();
    $.ajax({
        url:urlGetBillDetailById,
        data:{
            id:id_bill
        },
        method: 'GET',
        success: function(data){
            $('.img-content').append(data.pd)
        },
        error: function(error){
            console.log(error);

        }
    })
});

function showNote(idBill) {
    $('.note-body').remove();
    $.ajax({
        url:getDataNoteById,
        data:{
            id:idBill,
            "action": "getNote",
        },
        method: 'GET',
        success: function(data){
            $('.note-main').append(data.note)
        },
        error: function(error){
            console.log(error);

        }
    })
}

function delivery(idBill) {
    $.ajax({
        url:getDataNoteById,
        data:{
            id:idBill,
            "action": "updateStatus",
            code:code
        },
        method: 'GET',
        success: function(data){
            toastr["success"]("Thành Công", "Thông Báo")  ;                  
            table.ajax.reload();       
        },
        error: function(error){
            console.log(error);

        }
    })
}



