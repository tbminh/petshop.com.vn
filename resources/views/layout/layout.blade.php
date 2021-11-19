{{-- Icon: https://fontawesome.bootstrapcheatsheets.com/# --}}

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> @yield('title')</title>
    <link rel="shortcut icon" href="{{ url('public/home/img/slideform-search-mobile-1.jpg') }}" />


    <!-- Google Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,200,300,700,600' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,100' rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css2?family=Mulish:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" referrerpolicy="no-referrer" />


    <!-- Sweetalert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>


    <!-- Font Awesome -->
      <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ url('public/home/css/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ url('public/home/css/style.css') }}">
    <link rel="stylesheet" href="{{ url('public/home/css/responsive.css') }}">

    @yield('link_css')

    <style type="text/css" media="screen">
        table {
            padding: 0;
            width: 100%;
            table-layout: auto;
        }

        table tr {
            background-color: #f8f8f8;
            border: 1px solid #ddd;
            padding: .10em;
        }

        table th,
        table td {
            padding: 10px;
            text-align: center;
            border: 1px solid #ddd;
            font-size: 12px;
        }

        table th {
            font-size: 12px;
            text-transform: uppercase;
            color: black;
            font-weight: bold;
        }

        @media screen and (max-width: 600px) {
            table {
                border: 0;
                width: 100%;
            }

            table thead {
                clip: rect(0 0 0 0);
                height: 1px;
                overflow: hidden;
                padding: 0;
                position: absolute;
            }

            table tr {
                display: block;
                margin-bottom: 15px;
            }

            table td {
                border-bottom: 1px solid #ddd;
                display: block;
                font-size: 13px;
                text-align: right;
            }

            table td::before {
                /*
                * aria-label has no advantage, it won't be read inside a table
                content: attr(aria-label);
                */
                content: attr(data-label);
                float: left;
                font-weight: bold;
                text-transform: uppercase;
            }

            table td:last-child {
                border-bottom: 0;
            }
            .shopping-item {
                display: none;
            }
            .form-seach{
                display: none;
            }
            .navbar-form .input-group .input-group-btn button{
                height: 34px;
            }
            .col-sm-12 .form-search-mobile{
                display: inline-block;
            }
            .row #cart-mobile{
                display: inline-block;
            }
        }
        .row .col-md-6 .form-seach #input-search{
            width: 400px;
        }
        .form-search-mobile{
            display: none;
        }
        #cart-mobile{
            display: none;
        }
    </style>

  </head>

  <body style="font-family: 'Mulish', sans-serif;">

  <style>
      /* Dropdown Button */
      .dropbtn {
          background-color: #008CBA;
          color: white;
          padding: 16px;
          font-size: 16px;
          border: none;
      }

      /* The container <div> - needed to position the dropdown content */
      .dropdown {
          position: relative;
          display: inline-block;
      }

      /* Dropdown Content (Hidden by Default) */
      .dropdown-content {
          display: none;
          position: absolute;
          background-color: #f1f1f1;
          min-width: 160px;
          box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
          z-index: 1;
      }

      /* Links inside the dropdown */
      .dropdown-content a {
          color: black;
          padding: 12px 16px;
          text-decoration: none;
          display: block;
      }

      /* Change color of dropdown links on hover */
      .dropdown-content a:hover {background-color: #ddd;}

      /* Show the dropdown menu on hover */
      .dropdown:hover .dropdown-content {display: block;}

      /* Change the background color of the dropdown button when the dropdown content is shown */
      .dropdown:hover .dropbtn {background-color: #3e8e41;}
  </style>

    <div class="header-area">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="user-menu">
                        <ul>
                            @if (Auth::check())
                                <li>
                                    <div class="dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink">
                                            <i class="fa fa-user"></i> <b>{{ Auth::user()->username }}</b>
                                        </a>
                                    </div>
                                        <div class="dropdown-content">
                                            <a href="{{ url('logout') }}" onclick="return confirm('Bạn có muốn đăng xuất không ?')">Đăng xuất</a>
                                            <a href="{{url('page-change-password')}}">Đổi mật khẩu</a>
                                            <a href="{{ url('page-profile-user-information') }}">Thông tin cá nhân</a>
                                    </div>
                                </li>
                            @else
                                <li><a href="{{ url('page-sign-up') }}"><i class="fa fa-check"></i> Đăng ký</a></li>
                                <li><a href="{{url('page-login')}}"><i class="fa fa-sign-in"></i> Đăng nhập</a></li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End header area -->

    <div class="site-branding-area">
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <div class="logo">
                        <h1>
                            <a href="{{ url('/') }}">
                                <img src="{{ url('public/home/img/logo.jpg') }}" style="max-width: 100%;height:60px;">
                            </a>
                        </h1>
                    </div>
                </div>

                {{-- Thanh tìm kiếm --}}
                <div class="col-sm-12 col-md-6">
                    <form action="{{ url('page-product') }}" style="margin-top: 45px;" class="form-seach" method="get">
                        <input type="text" id="input-search" placeholder="Tìm kiếm thông tin..." name="inputSearch">
                        <input type="submit" value="Tìm kiếm">
                    </form>

                    <form class="navbar-form form-search-mobile" action="/action_page.php">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Tìm kiếm sản phẩm">
                            <div class="input-group-btn">
                                <button class="btn btn-default btn-sm" type="submit">
                                    <i class="glyphicon glyphicon-search"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="col-sm-3">
                    <div class="shopping-item">
                        @if (Auth::check())
                            <a href="{{ url('page-cart/'.Auth::id()) }}"> Giỏ hàng
                                <i class="fa fa-shopping-cart"></i>
                                <span class="product-count">
                                    @php($count_cart = DB::table('shopping_carts')->where('user_id', Auth::id())->count())
                                        {{ $count_cart }}
                                </span>
                            </a>
                        @else
                            <a href="{{ url('page-login')}}"> Giỏ hàng
                                <i class="fa fa-shopping-cart"></i>
                                <span class="product-count">0</span>
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End site branding area -->

    <div class="mainmenu-area">
        <div class="container-fluid">
            <div class="navbar-header">
                <div class="row">
                    <span  class="col-sm-6">
                        <button type="button" class="navbar-toggle" id="button-bar">
                            <i class="fa fa-bars"></i>
                        </button>
                    </span>
                    <span  class="col-sm-6" id="cart-mobile">
                        @if (Auth::check())
                            <a href="{{url('page-cart/'.Auth::id())}}">
                                <button type="button" class="navbar-toggle">
                                    <i class="fa fa-shopping-cart" style="color: black;"></i>
                                </button>
                            </a>
                        @else
                            <a href="#" onclick="cart_comfirm()">
                                <button type="button" class="navbar-toggle">
                                    <i class="fa fa-shopping-cart" style="color: black;"></i>
                                </button>
                            </a>
                        @endif
                    </span>
                </div>
            </div>
            <div class="collapse FTi-collapse" id="myNavbar">
                <ul class="nav navbar-nav">
                    <li><a href="{{ url('/') }}">Trang chủ</a></li>
                    <li><a href="{{ url('page-product') }}">Cửa hàng</a></li>
                    <li><a href="{{ url('page-news') }}">Tin tức</a></li>
                    <li><a href="{{ url('page-contact') }}">Liên lạc</a></li>
                </ul>
            </div>
        </div>
    </div>
  <!-- End mainmenu area -->


    @yield('content')



    <div class="footer-top-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <div class="footer-about-us">
                        <h2>
                            <a href="{{ url('/') }}">
                                <img src="{{ url('public/home/img/logo.png') }}" style="max-width: 100%;height:60px;">
                            </a>
                        </h2>
                        <p>Pet Shop tự tin là địa chỉ chuyên nghiệp và uy tín bậc nhất trong việc cung cấp các giống chó mèo, thức ăn cho chó mèo. Đến với Pet Shop bạn sẽ tìm được một người bạn 4 chân dễ thương cho ngôi nhà của mình.</p>
                        <p>Đến với Pet Shop, bạn sẽ nhận được sự tư vấn tận tình, chuyên nghiệp đến từ đội ngũ nhân viên bán hàng trẻ nhưng đầy nhiệt huyết và kinh nghiệm trong việc chăm sóc chó mèo. Hơn thế nữa, Pet Shop còn có các chương trình ưu đãi, khuyến mãi dành cho khách hàng diễn ra thường xuyên.</p>
                        <div class="footer-social">
                            <a href="#" target="_blank"><i class="fa fa-facebook"></i></a>
                            <a href="#" target="_blank"><i class="fa fa-twitter"></i></a>
                            <a href="#" target="_blank"><i class="fa fa-youtube"></i></a>
                            <a href="#" target="_blank"><i class="fa fa-linkedin"></i></a>
                            <a href="#" target="_blank"><i class="fa fa-pinterest"></i></a>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 col-sm-9">
                    <div class="footer-newsletter">
                        <h2 class="footer-wid-title ">Tin tức</h2>
                        <p>Đăng ký nhận bản tin của chúng tôi và nhận các ưu đãi độc quyền mà bạn sẽ không tìm thấy ở bất kỳ nơi nào khác ngay trong hộp thư đến của bạn!</p>
                        <div class="newsletter-form">
                            <form action="#">
                                <input type="email" placeholder="Nhập vào email của bạn">
                                <input type="submit" value="Subscribe">
                            </form>
                        </div>
                    </div>
                </div>


                <div class="col-md-3 col-sm-6">
                    <div class="footer-menu">
                        <h2 class="footer-wid-title">Giống chó</h2>
                        <ul>
                            <li><a href="#">Gâu đần</a></li>
                            <li><a href="#">Corgi</a></li>
                            <li><a href="#">Husky</a></li>
                            <li><a href="#">Shiba</a></li>
                            <li><a href="#">Pug</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6">
                    <div class="footer-menu">
                        <h2 class="footer-wid-title">Giống mèo</h2>
                        <ul>
                            <li><a href="#">Mèo Xiêm</a></li>
                            <li><a href="#">Mèo Anh Quốc</a></li>
                            <li><a href="#">Mèo Ba Tư</a></li>
                            <li><a href="#">Mèo Tai Cụt</a></li>
                            <li><a href="#">Mèo Munchkin</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6">
                    <div class="footer-menu"><br/>
                        <h2 class="footer-wid-title">Điều hướng </h2>
                        <ul>
                            <li><a href="{{ url('page-profile-user-information') }}">Tài khoản</a></li>
                            <li><a href="#"> Lịch sử mua hàng </a></li>
                            <li><a href="#">Chi tiết sản phẩm</a></li>
                            <li><a href="{{ url('page-contact') }}">Liên lạc với chúng tôi </a></li>
                            <li><a href="#">Về đầu trang </a></li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </div> <!-- End footer top area -->

    <div class="footer-bottom-area">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="copyright">
                        <p>&copy; 2020 PetShop. Đã đăng ký bản quyền. Coded with <i class="fa fa-heart"></i> by <a href="http://wpexpand.com" target="_blank">WP Expand</a></p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="footer-card-icon">
                        <i class="fa fa-cc-discover"></i>
                        <i class="fa fa-cc-mastercard"></i>
                        <i class="fa fa-cc-paypal"></i>
                        <i class="fa fa-cc-visa"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End footer bottom area -->

    <script>
      $(document).ready(function(){
          $("#button-bar").click(function(){
              $("#myNavbar").toggle();
          });
      });

      function cart_comfirm() {
          alert("Vui lòng đăng nhập để mua hàng!");
          location.href = "{{ url('page-login') }}";
      }
    </script>

    <!-- Latest jQuery form server -->
    <script src="https://code.jquery.com/jquery.min.js"></script>

    <!-- Bootstrap JS form CDN -->
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

    <!-- jQuery sticky menu -->
    <script src="{{ url('public/home/js/owl.carousel.min.js') }}"></script>
    <script src="{{ url('public/home/js/jquery.sticky.js') }}"></script>

    <!-- jQuery easing -->
    <script src="{{ url('public/home/js/jquery.easing.1.3.min.js') }}"></script>

    <!-- Main Script -->
    <script src="{{ url('public/home/js/main.js') }}"></script>
  </body>
</html>
