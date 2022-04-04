@extends('layouts.admin')

@section('title', 'Quản Lý Loại Hàng')

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
    <table class="table table-hover datatable" id="datatable">      
        
      <thead>
        <tr>
          <th scope="col">STT</th>
          <th scope="col">Tên</th>
          <th scope="col">Ảnh</th>          
          <th scope="col">Thay Đổi</th>
          <th scope="col">Xóa</th>
        </tr>
      </thead>
      <tbody>
        {{-- <tr>
          <th scope="row">1</th>
          <td>Mark</td>
          <td>Otto</td>
          <td>@mdo</td>
        </tr>
        <tr>
          <th scope="row">2</th>
          <td>Jacob</td>
          <td>Thornton</td>
          <td>@fat</td>
        </tr>
        <tr>
          <th scope="row">3</th>
          <td colspan="2">Larry the Bird</td>
          <td>@twitter</td>
        </tr> --}}
        @if(!empty($dataCategories))
          @php
            $n = 1;
          @endphp
          @foreach($dataCategories as $c)
          {{-- <form action="{{route('getOneCategories')}}" method="post" id="form-editCategories" name="contact" data-netlify="true"> --}}
            @csrf
            <tr class="listContent">
              <th scope="row">{{ $n++ }}</th>
              <td id="item_{{$c->id}}" >{{$c->c_name }}</td>
              <td><img src="{{asset($c->c_avatar)}}" alt="" width="80px" height="100px" id="img_categories_{{$c->id}}"></td>              
              <td><button data-id="{{$c->id}}" type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" id="editCategories"  >Sửa Thông Tin</button></td>
              <td><button data-id="{{$c->id}}" type="button" class="btn btn-danger" id="del_{{$c->id}}" ><b>Xóa</b></button></td>
            </tr>
          {{-- </form> --}}
          @endforeach
        @else
          <tr>
            <th scope="row">null</th>
            <td>null</td>
            <td>nulll</td>
            <td>null</td>
          </tr>
        @endif
      </tbody>
      </form>
    </table>
  </div>
  <!-- The Modal -->

  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">New message</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form method="post" action="{{ route('updateCategories') }}" name="contact" method="POST" 
        data-netlify="true" enctype="multipart/form-data" id="categoriesUpdate_form">
        <div class="modal-body">
          {{-- Form cập nhật  --}}          
            @csrf
            <div class="form-group">
              <label for="categories_name-name" class="col-form-label">Tên Loại Hàng Hóa:</label>
              <input type="text" class="form-control" id="categories_name" name="c_name">
              <span style="color: red" class="error_c_name error"></span>
            </div>

            <div class="form-group">
              <label for="categories_image" class="col-form-label">Hình Ảnh:</label>
              <img src="Hi" alt="" id="categories_image" width="80px" height="100px">
            </div>

            <div class="form-group">
              <label for="categories_image" class="col-form-label">Đổi Ảnh Mới:</label>
              <input type="file" name="new_img" id="new_img">
              <span style="color: red" class="error_new_img error"></span>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal" id="Cancel">Close</button>
          <button type="submit" class="btn btn-primary" id="Update">Send message</button>
        </div>
      </form>
      </div>
    </div>
  </div>
@stop

@section('scripts')
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.js"></script>
    {{--jquery.autocomplete.js--}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    {{--quick defined--}}
    {{-- Datatable --}}
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>
    <script>
      var id_global;
      var idName ;
      var url = '{{ URL::asset('') }}';
      var idImages;
      $(function () {
          // your custom javascript
      });
      
    
      //end edit record
      // Get the modal
      var modal = document.getElementById("myModal");

      // Get the button that opens the modal
      var btn = document.getElementById("myBtn");

      // Get the <span> element that closes the modal
      var span = document.getElementsByClassName("close")[0];
      // When the user clicks on the button, open the modal
      //Xử lý bằng ajax       
      $(document).on('click','#editCategories',function(e) {
        e.preventDefault();
        var id = $(this).data('id');
        id_global = id;
        //lấy tên loại sản phẩm theo  id
        var getName = $(this).closest('.listContent').find('#item_'+id); 
        //lấy class tên loại sản phẩm
        idName = getName[0].id;
        //lấy id image
        getIdImage = $("#img_categories_"+id);
        idImages = getIdImage[0].id;
        $.ajax({
          url: 'getOneCategories',
          method: 'POST',
          data: {
            id:id,
            _token: "{{ csrf_token() }}",
          },
          success: function(data) {    
            
            let avatar = url + data.categories[0].c_avatar;
                    
            $('#categories_name').val(data.categories[0].c_name);
            $("#categories_image").attr("src",avatar);
            // console.log(data.file);
            
          },
          error: function(error){
            console.log(error);
          }
        });       
        //     modal = "block"; //modal.style.display        
      });
      // Update data
      $('#categoriesUpdate_form').on('submit', function(e){
        e.preventDefault();
        //lấy tên
        var c_name = $(this).find('input[name="c_name"]').val();
        //lấy images
        let new_img = $(this).find('input[name="new_img"]').val();
        // console.log(new_img);
        //test
        // var file = document.querySelector("#new_img").files[0];
        // var reader = new FileReader();
        // reader.onload = function(e) {
        //   // binary data
        //   console.log(e.target.result);
        // };
        $('.error').text('');
        
        //biến item là tên của loại sản phẩm, khi update ta sẽ đổi tên luôn
        var item = idName;
        var a = new FormData(this);
        a.append('id',id_global);

        $.ajax({          
          url: 'updateCategories',
          method: 'POST',
          data: a,     
          contentType: false,
          cache: false,
          processData: false,     
          success: function(data) {  
            //Đổi tên loại sản phẩm khi cập nhật
            $('#'+item).text(data.name);
            //Đổi Ảnh khi cập nhật
            if(data.url){
              var url = '{{ URL::asset('') }}'+ data.url;
              $("#"+idImages).attr("src",url);
              console.log("Có Ảnh");
            }           
            console.log("Không Có Ảnh");
            toastr["success"]("Cập Nhật Thành Công", "Thông Báo")
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

      //Delete categories
      // $("button").click(function() {
      //     console.log(this.id); // or alert($(this).attr('id'));
      // });
      // $.ajax({
      //   url: '',
      //   method:post,
      //   data:{
      //     id:
      //   }
      // });
      // When the user clicks on <span> (x), close the modal
      span.onclick = function() {
        modal = "none";
      }

      // When the user clicks anywhere outside of the modal, close it
      window.onclick = function(event) {
        if (event.target == modal) {
          modal.style.display = "none";
        }
      }
   </script>
@stop


