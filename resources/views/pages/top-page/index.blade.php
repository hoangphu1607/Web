@extends('layouts.master')

@section('title', 'Trang Chủ')

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

@section('breadcrumb')
    @include('partial.users.breadcrumb')
@stop
@section('sidebar')
    @include('partial.users.sidebar')
@stop

@section('content')
@yield('sidebar');
    <div class="main-content" >
        <div class="top-page"> 
		<!-- this is content -->           
		<!-- Product AREA -->
		<div class="product-area">
			<div class="container">
				<div class="row">
					<div class="col-md-3 col-sm-4">
						<div class="product-catagori-area">
							<div class="product-categeries">
								<h2>Categeries</h2>
								<div class="panel-group" id="accrodian">
									<div class="panel panel-default">
										<div class="panel-heading">
											<h4 class="panel-title">
												<i class="fa fa-heart"></i> Cua Tươi Ngon
												<a class="collapsed" data-toggle="collapse" href="#colOne" data-parent="#accrodian"></a>
											</h4>
										</div>
										<div class="panel-collapse collapse" id="colOne">
											<div class="panel-body">
												<a href="#"><i class="fa fa-angle-double-right"></i> Categori-1</a>
												<a href="#"><i class="fa fa-angle-double-right"></i> Categori-2</a>
												<a href="#"><i class="fa fa-angle-double-right"></i> Categori-3</a>
											</div>
										</div>
									</div>
									<div class="panel panel-default">
										<div class="panel-heading">
											<h4 class="panel-title">
												<i class="fa fa-male"></i> Men
												<a class="collapsed" data-toggle="collapse" href="#colTwo" data-parent="#accrodian"></a>
											</h4>
										</div>
										<div class="panel-collapse collapse" id="colTwo">
											<div class="panel-body">
												<a href="#"><i class="fa fa-angle-double-right"></i> Categori-1</a>
												<a href="#"><i class="fa fa-angle-double-right"></i> Categori-2</a>
												<a href="#"><i class="fa fa-angle-double-right"></i> Categori-3</a>
											</div>
										</div>
									</div>
									<div class="panel panel-default">
										<div class="panel-heading">
											<h4 class="panel-title">
												<i class="fa fa-female"></i> Women
												<a class="collapsed" data-toggle="collapse" href="#colThree" data-parent="#accrodian"></a>
											</h4>
										</div>
										<div class="panel-collapse collapse" id="colThree">
											<div class="panel-body">
												<a href="#"><i class="fa fa-angle-double-right"></i> Categori-1</a>
												<a href="#"><i class="fa fa-angle-double-right"></i> Categori-2</a>
												<a href="#"><i class="fa fa-angle-double-right"></i> Categori-3</a>
											</div>
										</div>
									</div>
									<div class="panel panel-default">
										<div class="panel-heading">
											<h4 class="panel-title">
												<i class="fa fa-odnoklassniki"></i> Kids
												<a class="collapsed" data-toggle="collapse" href="#colFour" data-parent="#accrodian"></a>
											</h4>
										</div>
										<div class="panel-collapse collapse" id="colFour">
											<div class="panel-body">
												<a href="#"><i class="fa fa-angle-double-right"></i> Categori-1</a>
												<a href="#"><i class="fa fa-angle-double-right"></i> Categori-2</a>
												<a href="#"><i class="fa fa-angle-double-right"></i> Categori-3</a>
											</div>
										</div>
									</div>
									<div class="panel panel-default">
										<div class="panel-heading">
											<h4 class="panel-title">
												<i class="fa fa-gift"></i> Gift
												<a class="collapsed" data-toggle="collapse" href="#colFive" data-parent="#accrodian"></a>
											</h4>
										</div>
										<div class="panel-collapse collapse" id="colFive">
											<div class="panel-body">
												<a href="#"><i class="fa fa-angle-double-right"></i> Categori-1</a>
												<a href="#"><i class="fa fa-angle-double-right"></i> Categori-2</a>
												<a href="#"><i class="fa fa-angle-double-right"></i> Categori-3</a>
											</div>
										</div>
									</div>
									<div class="panel panel-default">
										<div class="panel-heading">
											<h4 class="panel-title">
												<i class="fa fa-bitbucket"></i> Accessories
												<a class="collapsed" data-toggle="collapse" href="#colSix" data-parent="#accrodian"></a>
											</h4>
										</div>
										<div class="panel-collapse collapse" id="colSix">
											<div class="panel-body">
												<a href="#"><i class="fa fa-angle-double-right"></i> Categori-1</a>
												<a href="#"><i class="fa fa-angle-double-right"></i> Categori-2</a>
												<a href="#"><i class="fa fa-angle-double-right"></i> Categori-3</a>
											</div>
										</div>
									</div>
									<div class="panel panel-default">
										<div class="panel-heading">
											<h4 class="panel-title">
												<i class="fa fa-coffee"></i> Offer
												<a class="collapsed" data-toggle="collapse" href="#colSeven" data-parent="#accrodian"></a>
											</h4>
										</div>
										<div class="panel-collapse collapse" id="colSeven">
											<div class="panel-body">
												<a href="#"><i class="fa fa-angle-double-right"></i> Categori-1</a>
												<a href="#"><i class="fa fa-angle-double-right"></i> Categori-2</a>
												<a href="#"><i class="fa fa-angle-double-right"></i> Categori-3</a>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="best-seller-area">
								<h2 class="header-title">Best seller</h2>
								<div class="best-sell-product">
									<div class="best-product-img">
										{{-- Ảnh của phần best sale!! nên đặt chiều cao và rộng là: 80 71 --}}
										<a href="#"><img src="{{asset('img/product/lau/lau.webp')}}" alt="product" style="max-width: 71px; height: 80px"></a>
									</div>
									<div class="best-product-content">
										<h2><a href="#">Et harum quidem red T-shirt</a></h2>
										<h3>$45.00</h3>
										<div class="best-product-rating">
											<a href="#"><i class="fa fa-star"></i></a>
											<a href="#"><i class="fa fa-star"></i></a>
											<a href="#"><i class="fa fa-star"></i></a>
											<a href="#"><i class="fa fa-star"></i></a>
											<a href="#"><i class="fa fa-star-o"></i></a>
										</div>
									</div>
								</div>
								<div class="best-sell-product">
									<div class="best-product-img">
										<a href="#"><img src="{{asset('img/product/lau/lau.webp')}}" alt="product" style="max-width: 71px; height: 80px"></a>
									</div>
									<div class="best-product-content">
										<h2><a href="#">Et harum quidem red T-shirt</a></h2>
										<h3>$45.00</h3>
										<div class="best-product-rating">
											<a href="#"><i class="fa fa-star"></i></a>
											<a href="#"><i class="fa fa-star"></i></a>
											<a href="#"><i class="fa fa-star"></i></a>
											<a href="#"><i class="fa fa-star"></i></a>
											<a href="#"><i class="fa fa-star-o"></i></a>
										</div>
									</div>
								</div>
								<div class="best-sell-product">
									<div class="best-product-img">
										<a href="#"><img src="{{asset('img/product/lau/lau.webp')}}" alt="product" style="max-width: 71px; height: 80px"></a>
									</div>
									<div class="best-product-content">
										<h2><a href="#">Et harum quidem red T-shirt</a></h2>
										<h3>$45.00</h3>
										<div class="best-product-rating">
											<a href="#"><i class="fa fa-star"></i></a>
											<a href="#"><i class="fa fa-star"></i></a>
											<a href="#"><i class="fa fa-star"></i></a>
											<a href="#"><i class="fa fa-star"></i></a>
											<a href="#"><i class="fa fa-star-o"></i></a>
										</div>
									</div>
								</div>
								<div class="best-sell-product">
									<div class="best-product-img">
										<a href="#"><img src="{{asset('img/product/lau/lau.webp')}}" alt="product" style="max-width: 71px; height: 80px"></a>
									</div>
									<div class="best-product-content">
										<h2><a href="#">Et harum quidem red T-shirt</a></h2>
										<h3>$45.00</h3>
										<div class="best-product-rating">
											<a href="#"><i class="fa fa-star"></i></a>
											<a href="#"><i class="fa fa-star"></i></a>
											<a href="#"><i class="fa fa-star"></i></a>
											<a href="#"><i class="fa fa-star"></i></a>
											<a href="#"><i class="fa fa-star-o"></i></a>
										</div>
									</div>
								</div>
								<p class="view-details">
									<a href="#">View details</a>
								</p>
							</div>
							<div class="add-kids single-add">
								<a href="#"><img src="{{asset('img/product/tom/tom.jpg')}}" alt="add"></a>
							</div>
							<div class="testmonial-area fix">
								<h2 class="header-title">Testimonial</h2>
								<div id="owl-testmonial" class="owl-carousel">
									<div class="testmonial fix">
										<span><i class="fa fa-quote-left"></i></span>
										<p>Lorem ipsum dolor consetetuer adipiscing elit. Aenean commdo ligula eget dolor. Aenean massa.</p>
										<h3>-MatthE Jensen</h3>
										<img src="img/testmonial.jpg" alt="">
									</div>
									<div class="testmonial fix">
										<span><i class="fa fa-quote-left"></i></span>
										<p>Lorem ipsum dolor consetetuer adipiscing elit. Aenean commdo ligula eget dolor. Aenean massa.</p>
										<h3>-MatthE Jensen</h3>
										<img src="img/testmonial.jpg" alt="">
									</div>
								</div>
							</div>
							<div class="subscribe-area">
								<h2>Subscribe Letter</h2>
								<form action="#">
									<div class="input-group">
										<input type="text" class="form-control" placeholder="Enter your E-mail">
										<button type="button" class="btn"><i class="fa fa-envelope-o"></i></button>
									</div>
								</form>
							</div>
						</div>
					</div>
					<div class="col-md-9 col-sm-8">
						<div class="product-items-area">
							<div class="product-items">
								<h2 class="product-header">CUA TƯƠI NGON</h2>
								<div class="row">
									<div id="product-slider" class="owl-carousel">
										<div class="col-md-4">
											<div class="single-product">
												<div class="single-product-img">
													<a href="#">
														{{-- Ảnh Sản Phẩm  --}}
														<img class="primary-img" src="{{asset('img\product\cua\cua.webp')}}" alt="product">
														{{-- <img class="primary-img" src="img/product/single-product-1.jpg" alt="product">
														<img class="secondary-img" src="img/product/kids-1.jpg" alt="product"> --}}
													</a>
													<div class="single-product-action">
														<a href="#"><i class="fa fa-external-link"></i></a>
														<a href="#"><i class="fa fa-shopping-cart"></i></a>
													</div>
												</div>
												<div class="single-product-content">
													<div class="product-content-left">
														<h2><a href="#">EXCLUSIVE STYLE</a></h2>
														<p>Jacket’s</p>
													</div>
													<div class="product-content-right">
														<h3>$27.00</h3>
													</div>
												</div>
											</div>
										</div>
										<div class="col-md-4">
											<div class="single-product">
												<div class="single-product-img">
													<a href="#">
														{{-- Ảnh Sản Phẩm  --}}
														<img class="primary-img" src="{{asset('img\product\cua\cua.webp')}}" alt="product">
														{{-- <img class="primary-img" src="img/product/single-product-2.jpg" alt="product">
														<img class="secondary-img" src="img/product/women-2.jpg" alt="product"> --}}
													</a>
													<div class="single-product-action">
														<a href="#"><i class="fa fa-external-link"></i></a>
														<a href="#"><i class="fa fa-shopping-cart"></i></a>
													</div>
												</div>
												<div class="single-product-content">
													<div class="product-content-left">
														<h2><a href="#">EXCLUSIVE STYLE</a></h2>
														<p>Jacket’s</p>
													</div>
													<div class="product-content-right">
														<h3>$27.00</h3>
													</div>
												</div>
											</div>
										</div>
										<div class="col-md-4">
											<div class="single-product">
												<div class="single-product-img">
													<a href="#">
														{{-- Ảnh Sản Phẩm  --}}
														<img class="primary-img" src="{{asset('img\product\cua\cua.webp')}}" alt="product">
														{{-- <img class="primary-img" src="img/product/single-product-3.jpg" alt="product">
														<img class="secondary-img" src="img/product/men-2.jpg" alt="product"> --}}
													</a>
													<div class="single-product-action">
														<a href="#"><i class="fa fa-external-link"></i></a>
														<a href="#"><i class="fa fa-shopping-cart"></i></a>
													</div>
												</div>
												<div class="single-product-content">
													<div class="product-content-left">
														<h2><a href="#">EXCLUSIVE STYLE</a></h2>
														<p>Jacket’s</p>
													</div>
													<div class="product-content-right">
														<h3>$27.00</h3>
													</div>
												</div>
											</div>
										</div>
										<div class="col-md-4">
											<div class="single-product">
												<div class="single-product-img">
													<a href="#">
														{{-- Ảnh Sản Phẩm  --}}
														<img class="primary-img" src="{{asset('img\product\cua\cua.webp')}}" alt="product">
														{{-- <img class="primary-img" src="img/product/single-product-1.jpg" alt="product">
														<img class="secondary-img" src="img/product/kids-1.jpg" alt="product"> --}}
													</a>
													<div class="single-product-action">
														<a href="#"><i class="fa fa-external-link"></i></a>
														<a href="#"><i class="fa fa-shopping-cart"></i></a>
													</div>
												</div>
												<div class="single-product-content">
													<div class="product-content-left">
														<h2><a href="#">EXCLUSIVE STYLE</a></h2>
														<p>Jacket’s</p>
													</div>
													<div class="product-content-right">
														<h3>$27.00</h3>
													</div>
												</div>
											</div>
										</div>
										<div class="col-md-4">
											<div class="single-product">
												<div class="single-product-img">
													<a href="#">
														{{-- Ảnh Sản Phẩm  --}}
														<img class="primary-img" src="{{asset('img\product\cua\cua.webp')}}" alt="product">
														{{-- <img class="primary-img" src="img/product/single-product-2.jpg" alt="product">
														<img class="secondary-img" src="img/product/women-2.jpg" alt="product"> --}}
													</a>
													<div class="single-product-action">
														<a href="#"><i class="fa fa-external-link"></i></a>
														<a href="#"><i class="fa fa-shopping-cart"></i></a>
													</div>
												</div>
												<div class="single-product-content">
													<div class="product-content-left">
														<h2><a href="#">EXCLUSIVE STYLE</a></h2>
														<p>Jacket’s</p>
													</div>
													<div class="product-content-right">
														<h3>$27.00</h3>
													</div>
												</div>
											</div>
										</div>
										<div class="col-md-4">
											<div class="single-product">
												<div class="single-product-img">
													<a href="#">
														{{-- Ảnh Sản Phẩm  --}}
														<img class="primary-img" src="{{asset('img\product\cua\cua.webp')}}" alt="product">
														{{-- <img class="primary-img" src="img/product/single-product-3.jpg" alt="product">
														<img class="secondary-img" src="img/product/men-2.jpg" alt="product"> --}}
													</a>
													<div class="single-product-action">
														<a href="#"><i class="fa fa-external-link"></i></a>
														<a href="#"><i class="fa fa-shopping-cart"></i></a>
													</div>
												</div>
												<div class="single-product-content">
													<div class="product-content-left">
														<h2><a href="#">EXCLUSIVE STYLE</a></h2>
														<p>Jacket’s</p>
													</div>
													<div class="product-content-right">
														<h3>$27.00</h3>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="product-items">
								<h2 class="product-header">CÁ TƯƠI SỐNG</h2>
								<div class="row">
									<div id="product-slider-two" class="owl-carousel">
										<div class="col-md-4">
											<div class="single-product">
												<div class="single-product-img">
													<a href="#">
														{{-- Ảnh Sản Phẩm  --}}
														<img class="primary-img" src="{{asset('img\product\cua\cua.webp')}}" alt="product">
														{{-- <img class="primary-img" src="img/product/men-1.jpg" alt="product">
														<img class="secondary-img" src="img/product/single-product-3.jpg" alt="product"> --}}
													</a>
													<div class="single-product-action">
														<a href="#"><i class="fa fa-external-link"></i></a>
														<a href="#"><i class="fa fa-shopping-cart"></i></a>
													</div>
												</div>
												<div class="single-product-content">
													<div class="product-content-left">
														<h2><a href="#">EXCLUSIVE STYLE</a></h2>
														<p>Jacket’s</p>
													</div>
													<div class="product-content-right">
														<h3>$27.00</h3>
													</div>
												</div>
											</div>
										</div>
										<div class="col-md-4">
											<div class="single-product">
												<div class="single-product-img">
													<a href="#">
														{{-- Ảnh Sản Phẩm  --}}
														<img class="primary-img" src="{{asset('img\product\cua\cua.webp')}}" alt="product">
														{{-- <img class="primary-img" src="img/product/men-2.jpg" alt="product">
														<img class="secondary-img" src="img/product/single-product-3.jpg" alt="product"> --}}
													</a>
													<div class="single-product-action">
														<a href="#"><i class="fa fa-external-link"></i></a>
														<a href="#"><i class="fa fa-shopping-cart"></i></a>
													</div>
												</div>
												<div class="single-product-content">
													<div class="product-content-left">
														<h2><a href="#">EXCLUSIVE STYLE</a></h2>
														<p>Jacket’s</p>
													</div>
													<div class="product-content-right">
														<h3>$27.00</h3>
													</div>
												</div>
											</div>
										</div>
										<div class="col-md-4">
											<div class="single-product">
												<div class="single-product-img">
													<a href="#">
														{{-- Ảnh Sản Phẩm  --}}
														<img class="primary-img" src="{{asset('img\product\cua\cua.webp')}}" alt="product">
														{{-- <img class="primary-img" src="img/product/men-3.jpg" alt="product">
														<img class="secondary-img" src="img/product/single-product-3.jpg" alt="product"> --}}
													</a>
													<div class="single-product-action">
														<a href="#"><i class="fa fa-external-link"></i></a>
														<a href="#"><i class="fa fa-shopping-cart"></i></a>
													</div>
												</div>
												<div class="single-product-content">
													<div class="product-content-left">
														<h2><a href="#">EXCLUSIVE STYLE</a></h2>
														<p>Jacket’s</p>
													</div>
													<div class="product-content-right">
														<h3>$27.00</h3>
													</div>
												</div>
											</div>
										</div>
										<div class="col-md-4">
											<div class="single-product">
												<div class="single-product-img">
													<a href="#">
														{{-- Ảnh Sản Phẩm  --}}
														<img class="primary-img" src="{{asset('img\product\cua\cua.webp')}}" alt="product">
														{{-- <img class="primary-img" src="img/product/men-1.jpg" alt="product">
														<img class="secondary-img" src="img/product/single-product-3.jpg" alt="product"> --}}
													</a>
													<div class="single-product-action">
														<a href="#"><i class="fa fa-external-link"></i></a>
														<a href="#"><i class="fa fa-shopping-cart"></i></a>
													</div>
												</div>
												<div class="single-product-content">
													<div class="product-content-left">
														<h2><a href="#">EXCLUSIVE STYLE</a></h2>
														<p>Jacket’s</p>
													</div>
													<div class="product-content-right">
														<h3>$27.00</h3>
													</div>
												</div>
											</div>
										</div>
										<div class="col-md-4">
											<div class="single-product">
												<div class="single-product-img">
													<a href="#">
														{{-- Ảnh Sản Phẩm  --}}
														<img class="primary-img" src="{{asset('img\product\cua\cua.webp')}}" alt="product">
														{{-- <img class="primary-img" src="img/product/men-2.jpg" alt="product">
														<img class="secondary-img" src="img/product/single-product-3.jpg" alt="product"> --}}
													</a>
													<div class="single-product-action">
														<a href="#"><i class="fa fa-external-link"></i></a>
														<a href="#"><i class="fa fa-shopping-cart"></i></a>
													</div>
												</div>
												<div class="single-product-content">
													<div class="product-content-left">
														<h2><a href="#">EXCLUSIVE STYLE</a></h2>
														<p>Jacket’s</p>
													</div>
													<div class="product-content-right">
														<h3>$27.00</h3>
													</div>
												</div>
											</div>
										</div>
										<div class="col-md-4">
											<div class="single-product">
												<div class="single-product-img">
													<a href="#">
														{{-- Ảnh Sản Phẩm  --}}
														<img class="primary-img" src="{{asset('img\product\cua\cua.webp')}}" alt="product">
														{{-- <img class="primary-img" src="img/product/men-3.jpg" alt="product">
														<img class="secondary-img" src="img/product/single-product-3.jpg" alt="product"> --}}
													</a>
													<div class="single-product-action">
														<a href="#"><i class="fa fa-external-link"></i></a>
														<a href="#"><i class="fa fa-shopping-cart"></i></a>
													</div>
												</div>
												<div class="single-product-content">
													<div class="product-content-left">
														<h2><a href="#">EXCLUSIVE STYLE</a></h2>
														<p>Jacket’s</p>
													</div>
													<div class="product-content-right">
														<h3>$27.00</h3>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="arrivals-area single-add">
								<a href="#"> <img src="img/banner/arrivals.jpg" alt="arrivals"> </a>
							</div>
							<div class="product-items">
								<h2 class="product-header">NGAO, SÒ, ỐC</h2>
								<div class="row">
									<div id="product-slider-women" class="owl-carousel">
										<div class="col-md-4">
											<div class="single-product">
												<div class="single-product-img">
													<a href="#">
														<img class="primary-img" src="{{asset('img\product\cua\cua.webp')}}" alt="product">
														{{-- Ảnh nền sau khi đưa chuột vào ảnh --}}
														{{-- <img class="secondary-img" src="img/product/single-product-2.jpg" alt="product"> --}}
														
													</a>
													<div class="single-product-action">
														<a href="#"><i class="fa fa-external-link"></i></a>
														<a href="#"><i class="fa fa-shopping-cart"></i></a>
													</div>
												</div>
												<div class="single-product-content">
													<div class="product-content-left">
														<h2><a href="#">EXCLUSIVE STYLE</a></h2>
														<p>Jacket’s</p>
													</div>
													<div class="product-content-right">
														<h3>$27.00</h3>
													</div>
												</div>
											</div>
										</div>
										<div class="col-md-4">
											<div class="single-product">
												<div class="single-product-img">
													<a href="#">
														{{-- <img class="primary-img" src="img/product/women-2.jpg" alt="product"> --}}
														<img class="primary-img" src="{{asset('img\product\cua\cua.webp')}}" alt="product">
														{{-- <img class="secondary-img" src="img/product/single-product-2.jpg" alt="product"> --}}
													</a>
													<div class="single-product-action">
														<a href="#"><i class="fa fa-external-link"></i></a>
														<a href="#"><i class="fa fa-shopping-cart"></i></a>
													</div>
												</div>
												<div class="single-product-content">
													<div class="product-content-left">
														<h2><a href="#">EXCLUSIVE STYLE</a></h2>
														<p>Jacket’s</p>
													</div>
													<div class="product-content-right">
														<h3>$27.00</h3>
													</div>
												</div>
											</div>
										</div>
										<div class="col-md-4">
											<div class="single-product">
												<div class="single-product-img">
													<a href="#">
														<img class="primary-img" src="{{asset('img\product\cua\cua.webp')}}" alt="product">
														{{-- <img class="primary-img" src="img/product/women-3.jpg" alt="product">
														<img class="secondary-img" src="img/product/single-product-2.jpg" alt="product"> --}}
													</a>
													<div class="single-product-action">
														<a href="#"><i class="fa fa-external-link"></i></a>
														<a href="#"><i class="fa fa-shopping-cart"></i></a>
													</div>
												</div>
												<div class="single-product-content">
													<div class="product-content-left">
														<h2><a href="#">EXCLUSIVE STYLE</a></h2>
														<p>Jacket’s</p>
													</div>
													<div class="product-content-right">
														<h3>$27.00</h3>
													</div>
												</div>
											</div>
										</div>
										<div class="col-md-4">
											<div class="single-product">
												<div class="single-product-img">
													<a href="#">
														<img class="primary-img" src="{{asset('img\product\cua\cua.webp')}}" alt="product">
														{{-- <img class="primary-img" src="img/product/single-product-2.jpg" alt="product">
														<img class="secondary-img" src="img/product/single-product-2.jpg" alt="product"> --}}
													</a>
													<div class="single-product-action">
														<a href="#"><i class="fa fa-external-link"></i></a>
														<a href="#"><i class="fa fa-shopping-cart"></i></a>
													</div>
												</div>
												<div class="single-product-content">
													<div class="product-content-left">
														<h2><a href="#">EXCLUSIVE STYLE</a></h2>
														<p>Jacket’s</p>
													</div>
													<div class="product-content-right">
														<h3>$27.00</h3>
													</div>
												</div>
											</div>
										</div>
										<div class="col-md-4">
											<div class="single-product">
												<div class="single-product-img">
													<a href="#">
														<img class="primary-img" src="{{asset('img\product\cua\cua.webp')}}" alt="product">
														{{-- <img class="primary-img" src="img/product/women-2.jpg" alt="product">
														<img class="secondary-img" src="img/product/single-product-2.jpg" alt="product"> --}}
													</a>
													<div class="single-product-action">
														<a href="#"><i class="fa fa-external-link"></i></a>
														<a href="#"><i class="fa fa-shopping-cart"></i></a>
													</div>
												</div>
												<div class="single-product-content">
													<div class="product-content-left">
														<h2><a href="#">EXCLUSIVE STYLE</a></h2>
														<p>Jacket’s</p>
													</div>
													<div class="product-content-right">
														<h3>$27.00</h3>
													</div>
												</div>
											</div>
										</div>
										<div class="col-md-4">
											<div class="single-product">
												<div class="single-product-img">
													<a href="#">
														<img class="primary-img" src="{{asset('img\product\cua\cua.webp')}}" alt="product">
														{{-- <img class="primary-img" src="img/product/women-3.jpg" alt="product">
														<img class="secondary-img" src="img/product/single-product-2.jpg" alt="product"> --}}
													</a>
													<div class="single-product-action">
														<a href="#"><i class="fa fa-external-link"></i></a>
														<a href="#"><i class="fa fa-shopping-cart"></i></a>
													</div>
												</div>
												<div class="single-product-content">
													<div class="product-content-left">
														<h2><a href="#">EXCLUSIVE STYLE</a></h2>
														<p>Jacket’s</p>
													</div>
													<div class="product-content-right">
														<h3>$27.00</h3>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="product-items">
								<h2 class="product-header">LẨU HẢI SẢN</h2>
								<div class="row">
									<div id="product-slider-kids" class="owl-carousel">
										<div class="col-md-4">
											<div class="single-product">
												<div class="single-product-img">
													<a href="#">
														{{-- Ảnh Sản Phẩm  --}}
														<img class="primary-img" src="{{asset('img\product\lau\lau.webp')}}" alt="product">
														{{-- <img class="primary-img" src="img/product/kids-1.jpg" alt="product">
														<img class="secondary-img" src="img/product/single-product-1.jpg" alt="product"> --}}
													</a>
													<div class="single-product-action">
														<a href="#"><i class="fa fa-external-link"></i></a>
														<a href="#"><i class="fa fa-shopping-cart"></i></a>
													</div>
												</div>
												<div class="single-product-content">
													<div class="product-content-left">
														<h2><a href="#">EXCLUSIVE STYLE</a></h2>
														<p>Jacket’s</p>
													</div>
													<div class="product-content-right">
														<h3>$27.00</h3>
													</div>
												</div>
											</div>
										</div>
										<div class="col-md-4">
											<div class="single-product">
												<div class="single-product-img">
													<a href="#">
														{{-- Ảnh Sản Phẩm  --}}
														<img class="primary-img" src="{{asset('img\product\lau\lau.webp')}}" alt="product">
														{{-- <img class="primary-img" src="img/product/kids-2.jpg" alt="product">
														<img class="secondary-img" src="img/product/single-product-1.jpg" alt="product"> --}}
													</a>
													<div class="single-product-action">
														<a href="#"><i class="fa fa-external-link"></i></a>
														<a href="#"><i class="fa fa-shopping-cart"></i></a>
													</div>
												</div>
												<div class="single-product-content">
													<div class="product-content-left">
														<h2><a href="#">EXCLUSIVE STYLE</a></h2>
														<p>Jacket’s</p>
													</div>
													<div class="product-content-right">
														<h3>$27.00</h3>
													</div>
												</div>
											</div>
										</div>
										<div class="col-md-4">
											<div class="single-product">
												<div class="single-product-img">
													<a href="#">
														{{-- Ảnh Sản Phẩm  --}}
														<img class="primary-img" src="{{asset('img\product\lau\lau.webp')}}" alt="product">
														{{-- <img class="primary-img" src="img/product/kids-3.jpg" alt="product">
														<img class="secondary-img" src="img/product/single-product-1.jpg" alt="product"> --}}
													</a>
													<div class="single-product-action">
														<a href="#"><i class="fa fa-external-link"></i></a>
														<a href="#"><i class="fa fa-shopping-cart"></i></a>
													</div>
												</div>
												<div class="single-product-content">
													<div class="product-content-left">
														<h2><a href="#">EXCLUSIVE STYLE</a></h2>
														<p>Jacket’s</p>
													</div>
													<div class="product-content-right">
														<h3>$27.00</h3>
													</div>
												</div>
											</div>
										</div>
										<div class="col-md-4">
											<div class="single-product">
												<div class="single-product-img">
													<a href="#">
														{{-- Ảnh Sản Phẩm  --}}
														<img class="primary-img" src="{{asset('img\product\lau\lau.webp')}}" alt="product">
														{{-- <img class="primary-img" src="img/product/kids-1.jpg" alt="product">
														<img class="secondary-img" src="img/product/single-product-1.jpg" alt="product"> --}}
													</a>
													<div class="single-product-action">
														<a href="#"><i class="fa fa-external-link"></i></a>
														<a href="#"><i class="fa fa-shopping-cart"></i></a>
													</div>
												</div>
												<div class="single-product-content">
													<div class="product-content-left">
														<h2><a href="#">EXCLUSIVE STYLE</a></h2>
														<p>Jacket’s</p>
													</div>
													<div class="product-content-right">
														<h3>$27.00</h3>
													</div>
												</div>
											</div>
										</div>
										<div class="col-md-4">
											<div class="single-product">
												<div class="single-product-img">
													<a href="#">
														{{-- Ảnh Sản Phẩm  --}}
														<img class="primary-img" src="{{asset('img\product\lau\lau.webp')}}" alt="product">
														{{-- <img class="primary-img" src="img/product/kids-2.jpg" alt="product">
														<img class="secondary-img" src="img/product/single-product-1.jpg" alt="product"> --}}
													</a>
													<div class="single-product-action">
														<a href="#"><i class="fa fa-external-link"></i></a>
														<a href="#"><i class="fa fa-shopping-cart"></i></a>
													</div>
												</div>
												<div class="single-product-content">
													<div class="product-content-left">
														<h2><a href="#">EXCLUSIVE STYLE</a></h2>
														<p>Jacket’s</p>
													</div>
													<div class="product-content-right">
														<h3>$27.00</h3>
													</div>
												</div>
											</div>
										</div>
										<div class="col-md-4">
											<div class="single-product">
												<div class="single-product-img">
													<a href="#">
														{{-- Ảnh Sản Phẩm  --}}
														<img class="primary-img" src="{{asset('img\product\lau\lau.webp')}}" alt="product">
														{{-- <img class="primary-img" src="img/product/kids-3.jpg" alt="product">
														<img class="secondary-img" src="img/product/single-product-1.jpg" alt="product"> --}}
													</a>
													<div class="single-product-action">
														<a href="#"><i class="fa fa-external-link"></i></a>
														<a href="#"><i class="fa fa-shopping-cart"></i></a>
													</div>
												</div>
												<div class="single-product-content">
													<div class="product-content-left">
														<h2><a href="#">EXCLUSIVE STYLE</a></h2>
														<p>Jacket’s</p>
													</div>
													<div class="product-content-right">
														<h3>$27.00</h3>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
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
    <script>
      $(function () {
          // your custom javascript
      });
   </script>
@stop
