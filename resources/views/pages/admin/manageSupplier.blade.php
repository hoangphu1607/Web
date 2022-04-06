@extends('layouts.admin')

@section('title', 'Quản lý nhà phân phối')

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
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addSuppliers_modals">
          THÊM NHÀ PHÂN PHỐI
        </button>
      </div>
      <div class="col-sm"></div>
    </div>

    <table class="table table-hover datatable cell-border compact stripe" id="myTable">      
      <thead>
        <tr>
          <th scope="col">STT</th>
          <th scope="col">Tên Nhà Phân Phối</th>
          <th scope="col">Email</th>
          <th scope="col">SĐT</th>
          <th scope="col">Ảnh</th>          
          <th scope="col">Cập nhật</th>
          <th scope="col">Xóa</th>
        </tr>
      </thead>      
    </table>
  </div>
  @include('partial.modal.addSuppliers')
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
      var table = $('#myTable').DataTable({
        "ajax": 'showSuppliers',
        "columns" : [
          {
            data:'id',
            render: (data, type, row, meta) => meta.row + 1
          },
          {
            data:'s_name'
          },
          {
            data:'s_email'
          },
          {
            data:'s_phone'
          },
          {
            data:'s_avt',
            render: function(data, type, row){
              return '<img src="{{asset('')}}'+data+'" alt="" width="80px" height="100px" id="img_categories_{{'row.id'}}">'
            }
          },
          {
            data:'id',
            render: function(data, type, row){
              return '<button data-id="'+ row.id +'" type="button" onclick="get_id_suppliers('+row.id+')" class="btn btn-primary" data-toggle="modal" data-target="#edit_supplier" >Edit</button>'
            }
          },
          {
            data:'id',
            render: function(data, type, row){
              return '<button data-id="'+ row.id +'" type="button" class="btn btn-danger" data-id="del_'+row.id+'" id="delete" data-toggle="modal" data-target="#confirmModal">Xóa</button>'
            }
          },
        ], 
        // columnDefs: [
        //   {
        //       targets: [2,3,4],
        //       className: 'dt-body-center'
        //   }
        // ]           
      });

      $(document).ready(function() {
        $('#addSuppliers_form').on('submit', function(e){     
            e.preventDefault();                               
            $('.error').text('');
            $.ajax({
                url: 'form-addSuppliers',
                method: 'POST', 
                data: new FormData(this),           
                cache: false,
                contentType: false,
                processData: false,                
                success:function(response){                   
                    toastr["success"]("Thêm thành công", "Thông Báo");
                    console.log(response);
                    table.ajax.reload();               
                },
                error:function(error){              
                    let tb = error.responseJSON.errors;
                    for(var i in tb){
                        $('.error_' + i).text(tb[i][0]);
                    }
                },
                            
            });           
        });
      });

      function get_id_suppliers(id){     
        $.ajax({
                url: 'showEditSupplier/'+id,
                method: 'GET', 
                //data: new FormData(this),           
                cache: false,
                contentType: false,
                processData: false,                
                success:function(response){                   
                    // toastr["success"]("Cập nhật thành công", "Thông Báo");
                    console.log(response.data.s_name);
                    $("#edit_suppliers_name").val(response.data.s_name);
                    $("#edit_suppliers_mail").val(response.data.s_mail);
                    $("#edit_uppliers_phone").val(response.data.s_phone);
                    //table.ajax.reload();               
                },
                error:function(error){              
                    let tb = error.responseJSON.errors;
                    for(var i in tb){
                        $('.error_' + i).text(tb[i][0]);
                    }
                },
                            
            });    
      }
   </script>
@stop


