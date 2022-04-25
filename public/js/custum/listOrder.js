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
        {data:"b_total", //chi tiet don hang
        render: function(data, type, row){
            return '<button data-id="'+data+'" type="button" class="btn btn-info" data-toggle="modal" data-target="#contentModal" id="editContent"><i class="fa-solid fa-bars"></i></button>'
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