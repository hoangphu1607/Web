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
            <tr>
              <th scope="row">{{ $n++ }}</th>
              <td>{{$c->c_name }}</td>
              <td>{{$c->c_avatar }}</td>              
              <td><button id="{{$c->id}}" type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Sửa Thông Tin</button></td>
              <td><a href="" style="color: red"><b>Xóa</b></a></td>
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
        <div class="modal-body">
          <form>
            <div class="form-group">
              <label for="recipient-name" class="col-form-label">Recipient:</label>
              <input type="text" class="form-control" id="recipient-name">
            </div>
            <div class="form-group">
              <label for="message-text" class="col-form-label">Message:</label>
              <textarea class="form-control" id="message-text"></textarea>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Send message</button>
        </div>
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
      $(function () {
          // your custom javascript
      });
      
      // star edit record
      // var table  = $(#dataTable).DataTable();
      // table.on('click', '.edit', function(){
      //   $tr = $(this).closest('tr');
      //   if($($tr).hasClass('child')){
      //     $tr = $tr.prev('.parent');
      //   }
      //   var data = table.row($tr).data();
      //   console.log(data);
      // });
      //end edit record
      // Get the modal
      var modal = document.getElementById("myModal");

      // Get the button that opens the modal
      var btn = document.getElementById("myBtn");

      // Get the <span> element that closes the modal
      var span = document.getElementsByClassName("close")[0];
      // When the user clicks on the button, open the modal
      //Xử lý bằng ajax       
      $(document).ready(function() {
        $("button").click(function(e) {
            console.log(this.id); // or alert($(this).attr('id'));               
            e.preventDefault(); 
            let id = this.id;
            let form_data = $("form").serialize()
            console.log(form_data);
            $.ajaxSetup({
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
              }
            });
            $.ajax({
                  url: 'getOneCategories/2',
                  method: 'POST', 
                  data: {
                    id:id,
                    _token: "{{ csrf_token() }}"
                  },
                  // dataType: 'json',                
                  cache: false,
                  contentType: false,
                  processData: false,                
                  success:function(response){ 
                    console.log("Dung");                  
                      // toastr["success"]("Thêm "+ categories_name+ " thành công!!!", "Thông Báo")  ;                  
                  },
                  error:function(error){  
                    console.log(error);             
                      // let tb = error.responseJSON.errors;
                      // for(var i in tb){
                      //     $('.error_' + i).text(tb[i][0]);
                      // }
                  },
                              
              });
            modal = "block"; //modal.style.display
        }); 
      });
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


