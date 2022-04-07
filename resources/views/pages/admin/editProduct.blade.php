@extends('layouts.admin')

@section('title', 'Quản Lý Sản Phẩm')

@section('style-libraries')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.css">
@stop

@section('styles')
    {{--custom css item suggest search--}}
    <style>
        .autocomplete-group { padding: 2px 5px; }
        /* The Modal (background) */
        
    </style>
    <link rel="stylesheet" href="{{ asset('css/animate.css') }}">
    <link href='https://fonts.googleapis.com/css?family=Raleway:400,700,600,500,300,800,900' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,400italic,500,300,300italic,500italic,700' rel='stylesheet' type='text/css'>
    <!-- Bootstrap CSS
	============================================ -->      
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <!-- font-awesome.min CSS
    ============================================ -->      
    <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">
    
    <!-- Mean Menu CSS
    ============================================ -->      
    <link rel="stylesheet" href="{{asset('css/meanmenu.min.css')}}">
    
    <!-- owl.carousel CSS
    ============================================ -->      
    <link rel="stylesheet" href="{{asset('css/owl.carousel.css')}}">
    
    <!-- owl.theme CSS
    ============================================ -->      
    <link rel="stylesheet" href="{{asset('css/owl.theme.css')}}">

    <!-- owl.transitions CSS
    ============================================ -->      
    <link rel="stylesheet" href="{{asset('css/owl.transitions.css')}}">
    
    <!-- Price Filter CSS
    ============================================ --> 
    <link rel="stylesheet" href="{{asset('css/jquery-ui.min.css')}}">	

    <!-- nivo-slider css
    ============================================ --> 
    <link rel="stylesheet" href="{{asset('css/nivo-slider.css')}}">
    
    <!-- animate CSS
    ============================================ -->         
    <link rel="stylesheet" href="{{asset('css/animate.css')}}">
    
    <!-- jquery-ui-slider CSS
    ============================================ --> 
    <link rel="stylesheet" href="{{asset('css/jquery-ui-slider.css')}}">
    
    <!-- normalize CSS
    ============================================ -->        
    <link rel="stylesheet" href="{{asset('css/normalize.css')}}">

    <!-- main CSS
    ============================================ -->          
    <link rel="stylesheet" href="{{asset('css/main.css')}}">
    
    <!-- style CSS
    ============================================ -->          
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    
    <!-- responsive CSS
    ============================================ -->          
    <link rel="stylesheet" href="{{asset('css/responsive.css')}}">
    
    {{-- datatable --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap4.min.css">
    <script src="{{asset('js/vendor/modernizr-2.8.3.min.js')}}"></script>

@stop

@section('breadcrumb')
    @include('partial.users.breadcrumb')
@stop
@section('sidebar')
    @include('partial.users.sidebar')
@stop

@section('content')
{{-- @yield('sidebar'); --}}
  <div class="container py-5">
    
    <div class="row">
      <div class="col-sm"></div>
      <div class="col-sm">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addProduct_modals">
          THÊM SẢN PHẨM MỚI
        </button>
      </div>
      <div class="col-sm"></div>
    </div>

    <table class="table table-hover datatable cell-border compact stripe" id="myTable">      
      <thead>
        <tr>
          <th scope="col">STT</th>
          <th scope="col">Tên Sản Phẩm</th>
          <th scope="col">Hình Ảnh</th>
          <th scope="col">Loại Sản Phẩm</th>          
          <th scope="col">Nhà Cung Cấp</th>
          <th scope="col">Giá Cả</th>
          <th scope="col">Đơn Vị Tính</th>
          <th scope="col">Chỉnh Sửa</th>
          <th scope="col">Xóa</th>
        </tr>
      </thead>
      
    </table>
  </div>
  
  @include('partial.modal.edit_product')
  @include('partial.modal.addProduct') 
@stop

  

@section('scripts')
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.js"></script>
    {{--jquery.autocomplete.js--}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    {{--quick defined--}}
    {{-- Datatable --}}
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>

    {{-- <script src="{{asset('js/custum/categories.js')}}"></script> --}}
    <script>
      var idProduct;
      var table = $('#myTable').DataTable({
        "ajax": 'getAllProduct',
        "columns" : [
          {data: "id",
            render: (data, type, row, meta) => meta.row + 1
          },
          {data:"pro_name"},
          {data:"pro_avatar",
            render: function(data, type, row, meta) {
              return '<img src="{{asset('')}}'+data+'" alt="'+row.pro_name+'" width="80px" height="100px"">'
            }
          },
          {data:"c_name"},
          {data:"s_name"},
          {data:"pro_price"},
          {data:"pro_content"},
          {data:"id",
            render: function(data, type, row){
              return '<button data-id="'+ row.id +'" type="button" class="btn btn-primary" data-toggle="modal" data-target="#productModal" id="editProduct"><i class="fa-solid fa-pen-to-square"></i></button>'
            }
          },
          {
            data:"id",
            render: function(data, type, row){
              return '<button data-id="'+ row.id +'" type="button" class="btn btn-danger" data-id="del_'+row.id+'" id="delete" data-toggle="modal" data-target="#confirmModal"><i class="fa-solid fa-trash-can"></i></button>'
            }
          }         
        ] ,
        columnDefs: [
          {
              targets: [3,4,5,6,7],
              className: 'dt-body-center'
          }
        ]           
      });
      //Add product
      $(document).ready(function() {
        $('#Product_form').on('submit', function(e){
            e.preventDefault();                    
            $('.error').text('');
            $.ajax({
                url: 'form-addProduct',
                method: 'POST', 
                data: new FormData(this),
                // dataType: 'json',                
                cache: false,
                contentType: false,
                processData: false,                
                success:function(response){                   
                    toastr["success"]("Thêm thành công!!!", "Thông Báo");   
                    table.ajax.reload();               
                },
                error:function(error){  
                  console.log(error);            
                    let tb = error.responseJSON.errors;
                    for(var i in tb){
                        $('.error_' + i).text(tb[i][0]);
                    }
                },                            
            });
        });
      });
      //Get Id and data Product for Update
      $(document).on('click','#editProduct',function(e){
        e.preventDefault();
        var id = $(this).data('id');
        idProduct = id;
        $.ajax({          
          url: 'getOneProduct',
          method: 'POST',
          data: {
            id:idProduct,
            _token: "{{ csrf_token() }}"
          },     
          success: function(data) { 
            // console.log( );
            var cate_id = data.product[0].pro_category_id;
            var sup_id = data.product[0].supplier_id;
            $('#pro_name').val(data.product[0].pro_name);
            $('#pro_price').val(data.product[0].pro_price);
            $('#pro_content').val(data.product[0].pro_content);
            $('#cate_id'+ cate_id).attr('selected','true');
            $('#sup_id'+ sup_id).attr('selected','true');
          },
          error: function(error){
            console.log(error);
          }
        });
      });
      //Update
      $('#productUpdate_form').on('submit', function(e){
        e.preventDefault();
        var myData = new FormData(this);
        myData.append('id',idProduct);  
        $('.error').text('');
        // console.log(myData);
        $.ajax({          
          url: 'updateProduct',
          method: 'POST',
          data: myData,     
          cache: false,
          contentType: false,
          processData: false,
          success: function(data) { 
            console.log(data );  
            toastr["success"]("Thêm thành công!!!", "Thông Báo");   
            table.ajax.reload();            
          },
          error: function(error){
            console.log(error);
            let tb = error.responseJSON.errors;
            for(var i in tb){
                $('.error_' + i).text(tb[i][0]);
            }
          }
        });   
      });
      
   </script>
@stop


