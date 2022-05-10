var table = $('#myTable').DataTable({
    // processing: true,
    // serverSide: true,
    "ajax" : urlDataBillPlace, //var urlDataBillPlace in file orderPlaced = "{{route('dataBillPlace')}}"
    "columns" :[
        {data:"b_id",
            render: (data, type, row, meta) => meta.row + 1    
        },
        {data:"b_id",
        render:function(data, type, row, meta){
            return '<td class="th-delate"><a  onclick="deleteProduct('+ data +','+ row.b_user_id  +')"><i class="fa fa-trash"></i></a></td>';
        }
        },
        {data:"b_total",
            render:function(data, type, row, meta){
                return data.toLocaleString()+" vnđ  ";
            }
        },
        {data:"fullAddress",
            // render:function(data, type, row, meta){
            //     return data.toLocaleString();
            // }
        },
        {data:"b_total",
            // render:function(data, type, row, meta){
            //     return data.toLocaleString();
            // }
        },
        {data:"create_at",
        }
    ],
    columnDefs:[{
        targets: [1],
        className: 'th-details',
        
    },{
        "width": "2%", 
        "targets": 0
    }
    ]
});