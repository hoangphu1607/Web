<body class="home-one">
    <!-- HEADER AREA -->
    <div class="header-area">
        <div class="header-top-bar">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <div class="header-top-left">
                            <div class="header-top-menu">
                                <ul class="list-inline">
                                    {{-- <li><img src="img/vn.png" alt="flag"></li> --}}
                                    <li class="dropdown"><a href="#" data-toggle="dropdown">Việt Nam</a>
                                        {{-- <ul class="dropdown-menu">
                                            <li><a href="#">Spanish</a></li>
                                            <li><a href="#">China</a></li>
                                        </ul> --}}
                                    </li>
                                    <li class="dropdown"><a href="#" data-toggle="dropdown">VNĐ</a>
                                        {{-- <ul class="dropdown-menu usd-dropdown">
                                            <li><a href="#">USD</a></li>
                                            <li><a href="#">GBP</a></li>
                                            <li><a href="#">EUR</a></li>
                                        </ul> --}}
                                    </li>
                                </ul>
                            </div>
                            <p>Welcome visitor!</p>
                        </div>
                    </div>
                    <div class="col-md-8 col-sm-8 col-xs-12">
                        <div class="header-top-right">
                            <ul class="list-inline">
                                @if(session('id_user'))                                    
                                    <li>
                                        <a href="{{route('user.index')}}" style="color: #85ff85"><i class="fa fa-user"></i>Xin Chào {{session('user_name')}} !!!</a>
                                    </li>
                                    <li>
                                        <a href="{{route('logout')}}"><i class="fa fa-user-times"></i> Đăng Xuất </a>
                                    </li>
                                @else
                                    <li>
                                        <a href="{{route('user.login')}}"> <i class="fa fa-lock"></i>Đăng Nhập </a>                                    
                                    </li>
                                    <li>
                                        <a href="{{route('register')}}"><i class="fa fa-pencil-square-o"></i>Đăng Ký</a>
                                    </li> 
                                @endif 
                            </ul> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-md-2 col-sm-2 col-xs-12">
                        <div class="header-logo">
                            <a href="index.html"><img src="img/logo.png" alt="logo"></a>
                        </div>
                    </div>
                    <div class="col-md-10 col-sm-10 col-xs-12">
                        <div class="search-chart-list">
                            <div class="catagori-menu">
                                <ul class="list-inline">
                                    <li><i class="fa fa-search"></i></li>
                                    <li>
                                        <select>
                                            <option value="All Categories">All Categories</option>
                                            <option value="Categorie One">Categorie One</option>
                                            <option value="Categorie Two">Categorie Two</option>
                                            <option value="Categorie Three">Categorie Three</option>
                                            <option value="Categorie Four">Categorie Four</option>
                                            <option value="Categorie Five">Categorie Five</option>
                                        </select>
                                    </li>
                                </ul>
                            </div>
                            <div class="header-search">
                                <form action="#">
                                    <input type="text" placeholder="My Search"/>
                                    <button type="button"><i class="fa fa-search"></i></button>
                                </form>
                            </div>
                            <div class="header-chart">
                                <ul class="list-inline">
                                    <li><a href="#"><i class="fa fa-cart-arrow-down"></i></a></li>
                                    <li class="chart-li"><a href="{{route('showBill')}}">ĐƠN HÀNG</a>
                                        <ul>
                                            <li>
                                                <div class="header-chart-dropdown">
                                                    <div class="header-chart-dropdown-list">
                                                        <div class="dropdown-chart-left floatleft">
                                                            <a href="#"><img src="img/product/best-product-1.png" alt="list"></a>
                                                        </div>
                                                        <div class="dropdown-chart-right">
                                                            <h2><a href="#">Feugiat justo lacinia</a></h2>
                                                            <h3>Qty: 1</h3>
                                                            <h4>£80.00</h4>
                                                        </div>
                                                    </div>
                                                    <div class="header-chart-dropdown-list">
                                                        <div class="dropdown-chart-left floatleft">
                                                            <a href="#"><img src="img/product/best-product-2.png" alt="list"></a>
                                                        </div>
                                                        <div class="dropdown-chart-right">
                                                            <h2><a href="#">Aenean eu tristique</a></h2>
                                                            <h3>Qty: 1</h3>
                                                            <h4>£70.00</h4>
                                                        </div>
                                                    </div>
                                                    <div class="chart-checkout">
                                                        <p>subtotal<span>£150.00</span></p>
                                                        <button type="button" class="btn btn-default">Chckout</button>
                                                    </div>
                                                </div> 
                                            </li> 
                                        </ul> 
                                    </li>
                                    <li><a href="#">2 items</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- MAIN MENU AREA -->
    {{-- <div class="main-menu-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="main-menu hidden-xs">
                        <nav>
                            <ul>
                                <li><a href="index.html">Trang Chủ</a></li>
                                <li><a href="shop.html">Khuyến Mãi</a></li>
                                <li><a href="shop.html">Ngao, Sò, Ốc</a></li>
                                <li><a href="shop.html">Cua, Ghẹ</a></li>
                                <li><a href="shop.html">Tôm Các Loại</a></li>
                                <li><a href="shop.html">Cá, Mực</a></li>                                
                                <li><a href="shop.html">Gia Vị</a></li>
                                <li><a href="shop.html">Đông Lạnh</a></li>
                                <li><a href="shop.html">Lẩu</a>
                                    <ul class="sub-menu">
                                        <li><a href="blog-right-sidebar.html">Lẩu This</a></li>
                                        <li><a href="blog-single.html">Lẩu That</a></li>
                                    </ul>
                                </li>
                                
                                <li><a href="shop.html">Sushi & Sashimi</a></li>
                        </nav>
                    </div>
                    <!-- Mobile MENU AREA -->
                    <div class="mobile-menu hidden-sm hidden-md hidden-lg">
                        <nav>
                            <ul>
                                <li><a href="index.html">Home</a></li>
                                <li><a href="shop.html">Shop</a>
                                    <ul>
                                        <li><a href="#">Shop Layouts</a>
                                            <ul>
                                                <li><a href="#">Full Width</a></li>
                                                <li><a href="#">Sidebar Left</a></li>
                                                <li><a href="#">Sidebar Right</a></li>
                                                <li><a href="#">List View</a></li>
                                            </ul>	
                                        </li>
                                        <li><a href="#">Shop Pages</a>
                                            <ul>
                                                <li><a href="#">Category</a></li>
                                                <li><a href="#">My Account</a></li>
                                                <li><a href="#">Wishlist</a></li>
                                                <li><a href="#">Shopping Cart</a></li>
                                            </ul>	
                                        </li>
                                        <li><a href="#">Product Types</a>
                                            <ul>
                                                <li><a href="#">Simple Product</a></li>
                                                <li><a href="#">Variable Product</a></li>
                                                <li><a href="#">Grouped Product</a></li>
                                                <li><a href="#">Downloadable</a></li>
                                            </ul>	
                                        </li>
                                    </ul>
                                </li>
                                <li><a href="shop.html">Men</a></li>
                                <li><a href="shop.html">Women</a></li>
                                <li><a href="shop.html">Kids</a></li>
                                <li><a href="shop.html">gift</a></li>
                                <li><a href="blog-left-sidebar.html">Blog</a>
                                    <ul>
                                        <li><a href="blog-right-sidebar.html">Blog Right Sidebar</a></li>
                                        <li><a href="blog-single.html">Blog Details</a></li>
                                    </ul>
                                </li>
                                <li><a href="#">Pages</a>
                                    <ul>
                                        <li><a href="shop.html">Shop</a></li>
                                        <li><a href="shop.html">Men</a></li>
                                        <li><a href="shop.html">Women</a></li>
                                        <li><a href="shop.html">Kids</a></li>
                                        <li><a href="shop.html">Gift</a></li>
                                        <li><a href="about-us.html">About Us</a></li>
                                        <li><a href="single-product.html">Single Product</a></li>
                                        <li><a href="cart.html">Cart</a></li>
                                        <li><a href="checkout.html">Checkout</a></li>
                                        <li><a href="look-book.html">Look Book</a></li>
                                        <li><a href="404.html">Error 404</a></li>
                                    </ul>
                                </li>
                                <li><a href="contact.html">contact</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <!-- SUPPORT AREA -->
    <div class="support-area">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-4 col-xs-12">
                    <div class="single-support">
                        <div class="sigle-support-icon">
                            <p><i class="fa fa-plane"></i></p>
                        </div>
                        <div class="sigle-support-content">
                            <h2>GIAO HÀNG  </h2>
                            <p>ĐƠN GIÁ TRÊN 200.000 VNĐ</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-4 col-xs-12">
                    <div class="single-support">
                        <div class="sigle-support-icon">
                            <p><i class="fa fa-dollar"></i></p>
                        </div>
                        <div class="sigle-support-content">
                            <h2>ĐỔI TRẢ 1 VS 1</h2>
                            <p>Nhanh Chống Tại Nhà</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-4 col-xs-12">
                    <div class="single-support">
                        <div class="sigle-support-icon">
                            <p><i class="fa fa-clock-o"></i></p>
                        </div>
                        <div class="sigle-support-content">
                            <h2>HỔ TRỢ 24/7</h2>
                            <p>Tư Vấn Online</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 hidden-sm col-xs-12">
                    <div class="single-support">
                        <div class="sigle-support-icon">
                            <p><i class="fa fa-umbrella"></i></p>
                        </div>
                        <div class="sigle-support-content">
                            <h2>KHÁCH HÀNG VIP</h2>
                            <p>Ưu Đãi Mua Hàng</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>