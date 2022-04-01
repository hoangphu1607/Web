{{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" />
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid"><a href="#" class="navbar-brand"><img type="img" src="https://cdn.gridbox.io/assets/gb-92x92.png" width="40" /></a><button type="button"
            data-bs-toggle="collapse" data-bs-target="#navbarColor03" aria-controls="navbarColor03" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler"><span
                class="navbar-toggler-icon"></span></button>
        <div id="navbarColor03" class="collapse navbar-collapse">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item active"><a aria-current="page" href="#" class="nav-link active"><i class="bi-speedometer2 mr-2"></i>
                        Dashboard
                    </a></li>
                <li class="nav-item"><a href="#" class="nav-link"><i class="bi bi-clipboard-data mr-2"></i>
                        Orders
                    </a></li>
                <li class="nav-item"><a href="#" class="nav-link"><i class="bi bi-bag-check mr-2"></i>
                        Products
                    </a></li>
                <li class="nav-item"><a href="#" class="nav-link"><i class="bi bi-people-fill mr-2"></i>
                        Customers
                    </a></li>
                <li class="nav-item"><a href="#" class="nav-link"><i class="bi bi-file-earmark-bar-graph mr-2"></i>
                        Reports
                    </a></li>
            </ul>
            <div class="d-lg-flex align-items-center">
                <form type="form" class="d-flex ms-auto mb-2 mb-md-0"><input type="search" placeholder="Search" aria-label="Search" class="form-control me-2" /><button type="submit"
                        class="btn btn-outline-light"> <i class="bi bi-search"></i></button></form>
                <ul id="io85l" class="navbar-nav ms-auto">
                    <li id="ivscp" class="nav-item"><a href="#" id="dropdownUser2" data-bs-toggle="dropdown" aria-expanded="true"
                            class="text-decoration-none dropdown-toggle px-2 line-white text-white"><img type="img" src="https://github.com/mdo.png" alt="mdo" id="i3q2a" width="32" height="32"
                                class="rounded-circle" /></a>
                        <ul aria-labelledby="dropdownUser2" id="irimy" class="dropdown-menu dropdown-menu-end text-small shadow">
                            <li><a href="#" class="dropdown-item">New project...</a></li>
                            <li><a href="#" class="dropdown-item">Settings</a></li>
                            <li><a href="#" class="dropdown-item">Profile</a></li>
                            <li>
                                <hr class="dropdown-divider" />
                            </li>
                            <li><a href="#" class="dropdown-item">Sign out</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav> --}}
<body class="home-one">
    <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->
           
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
                                <li><a href="#"><i class="fa fa-user"></i>Tài Khoản Của Tôi</a></li>
                                {{-- <li><a href="#"><i class="fa fa-heart"></i>Wishlist</a></li>
                                <li><a href="checkout.html"><i class="fa fa-check-square-o"></i>Checkout</a></li> --}}
                                @if(session('id_admin'))                                    
                                    <li>
                                        <a href="#" style="color: #85ff85"><i class="fa fa-user"></i>Xin Chào {{session('admin_name')}} !!!</a>
                                    </li>
                                    <li>
                                        <a href="{{route('admin_logout')}}"><i class="fa fa-user-times"></i> Đăng Xuất </a>
                                    </li>
                                @else
                                    <li>
                                        <a href="{{route('adminLogin')}}"> <i class="fa fa-lock"></i>Đăng Nhập </a>                                    
                                    </li>
                                    <li>
                                        <a href="{{route('form_Register')}}"><i class="fa fa-pencil-square-o"></i>Đăng Ký</a>
                                    </li> 
                                @endif 
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- <div class="header-bottom">
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
                                    <li class="chart-li"><a href="#">My cart</a>
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
        </div> --}}
    </div>
    <!-- MAIN MENU AREA -->
    <div class="main-menu-area">
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
                                {{-- <li><a href="blog-left-sidebar.html">Blog</a>
                                    <ul class="sub-menu">
                                        <li><a href="blog-right-sidebar.html">Blog Right Sidebar</a></li>
                                        <li><a href="blog-single.html">Blog Details</a></li>
                                    </ul>
                                </li> --}}
                                {{-- <li><a href="#">Pages</a>
                                    <ul class="sub-menu">
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
                                </li> --}}
                                {{-- <li><a href="contact.html">contact</a></li> --}}
                            </ul>
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
    </div>
   