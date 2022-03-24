@extends('layouts.admin')

@section('title', 'Danh mục sản phẩm')
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
        <div class="card-header">Thêm Loại Sản Phẩm</div>
        <div class="card-body">
            {{-- FORM THÊM LOẠI SẢN PHẨM --}}
            <form type="form" action="{{route('addCategories')}}" name="contact" method="POST" data-netlify="true" enctype="multipart/form-data">
                {{-- INPUT TÊN SẢN PHẨM --}}
                <div class="form-group">
                    <label for="productName">TÊN LOẠI SẢN PHẨM:</label>
                    <input type="text" placeholder="Tên sản phẩm..." class="form-control" name="categories_name"/>
                </div>
                @error('categories_name')
                    <div style="color: red">{{$message}}</div>
                @enderror  
                {{-- INPUT LINK ẢNH SẢN PHẨM --}}
                <div class="form-group">
                    <label for="productName">AVATAR:</label>
                    @csrf
                    <div class="image">                    
                        <input type="file" class="form-control" required name="image">
                    </div>       
                    @error('image')
                        <div style="color: red">{{$message}}</div>
                    @enderror           
                </div>
                {{-- Load Ảnh Lên --}}
                {{-- <div class="form-group">
                    @if ($message = Session::get('success'))                    
                        <img src="{{ asset('img\categories\{{ Session::get('image')}}') }}" alt="">                    
                    @endif   
                </div> --}}
                {{-- BUTTON SUBMIT --}}
                <button type="submit" class="btn btn-primary">Thêm Loại Sản Phẩm</button>
            </form>
            {{-- END FORM --}}
        </div>
    </div>
</div>
@stop
