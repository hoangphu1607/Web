@extends('layouts.admin')

@section('title', 'Thêm Sản Phẩm')
@section('style-libraries')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.css">
@stop

@section('styles')
    {{--custom css item suggest search--}}
    <style>
        .autocomplete-group { padding: 2px 5px; }
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
    
    <script src="{{asset('js/vendor/modernizr-2.8.3.min.js')}}"></script>
@stop

{{-- @section('ckeditor')
    <script>
        CKEDITOR.replace('editor1');
    </script>
@stop --}}

@section('content')
<div class="container py-5">
    <div class="card">
        <div class="card-header">Thêm Sản Phẩm</div>
        <div class="card-body">
            {{-- FORM THÊM SẢN PHẨM --}}
            <form type="form" action="#" name="contact" method="POST" data-netlify="true">
                {{-- INPUT TÊN SẢN PHẨM --}}
                <div class="form-group">
                    <label for="productName">TÊN SẢN PHẨM:</label>
                    <input type="text" placeholder="Tên sản phẩm..." class="form-control" />
                </div>
                {{-- SELECTION LOẠI SẢN PHẨM --}}
                <div class="form-group">
                    <label for="productName">LOẠI SẢN PHẨM:</label>
                    <select class="form-select" aria-label="Default select example">
                        <option selected>CHỌN 1 LOẠI SẢN PHẨM</option>
                        <option value="1">Cua</option>
                        <option value="2">Mực</option>
                        <option value="3">Lẩu</option>
                      </select>
                </div>
                {{-- SELECTION NHÀ PHÂN PHỐI --}}
                <div class="form-group">
                    <label for="productName">NHÀ PHÂN PHỐI:</label>
                    <select class="form-select" aria-label="Default select example">
                        <option selected>CHỌN 1 NHÀ PHÂN PHỐI</option>
                        <option value="1">Vĩnh Long</option>
                        <option value="2">Trà Vinh</option>
                        <option value="3">Cần Thơ</option>
                      </select>
                </div>      
                {{-- INPUT GIÁ TIỀN --}}
                <div class="form-group">
                    <label for="productName">GIÁ TIỀN:</label>
                    <input type="text" placeholder="Giá tiền..." class="form-control" />
                </div>
                {{-- INPUT LINK ẢNH SẢN PHẨM --}}
                <div class="form-group">
                    <label for="productName">AVATAR:</label>
                    <input type="text" placeholder="Link ảnh sản phẩm..." class="form-control" />
                </div>
                {{-- TEXTAREA DESCRIPTIONS --}}               

                <div class="form-group">
                    <label for="descriptions">THÔNG TIN CHUNG:</label>
                    <textarea name="descriptions" rows="5" class="form-control" id="editor1"></textarea>
                </div>
                {{-- TEXTAREA CONTENT --}}
                <div class="form-group">
                    <label for="descriptions">NỘI DUNG:</label>
                    <textarea name="content" rows="5" class="form-control" id="editor2"
                    placeholder="Các mô tả về sản phẩm: chất lượng, hình ảnh liên quan"></textarea>
                </div>
                {{-- BUTTON SUBMIT --}}
                <button type="submit" class="btn btn-primary">Send Message</button>
            </form>
            {{-- END FORM --}}
        </div>
    </div>
</div>
<script src="{{asset('ckeditor/ckeditor.js')}}"></script>
<script>
    ClassicEditor.create(document.querySelector('#editor1'))
    .catch(error =>{
        console.error(error)
    });
    ClassicEditor.create(document.querySelector('#editor2'))
    .catch(error =>{
        console.error(error)
    });
</script>
@stop
