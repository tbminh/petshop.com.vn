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
                                            <a href="{{ url('logout') }}" onclick="return confirm('B???n c?? mu???n ????ng xu???t kh??ng ?')">????ng xu???t</a>
                                            <a href="{{url('page-change-password')}}">?????i m???t kh???u</a>
                                            <a href="{{ url('page-profile-user-information') }}">Th??ng tin c?? nh??n</a>
                                    </div>
                                </li>
                            @else
                                <li><a href="{{ url('page-sign-up') }}"><i class="fa fa-check"></i> ????ng k??</a></li>
                                <li><a href="{{url('page-login')}}"><i class="fa fa-sign-in"></i> ????ng nh???p</a></li>
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

                {{-- Thanh t??m ki???m --}}
                <div class="col-sm-12 col-md-6">
                    <form action="{{ url('page-product') }}" style="margin-top: 45px;" class="form-seach" method="get">
                        <input type="text" id="input-search" placeholder="T??m ki???m th??ng tin..." name="inputSearch">
                        <input type="submit" value="T??m ki???m">
                    </form>

                    <form class="navbar-form form-search-mobile" action="/action_page.php">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="T??m ki???m s???n ph???m">
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
                            <a href="{{ url('page-cart/'.Auth::id()) }}"> Gi??? h??ng
                                <i class="fa fa-shopping-cart"></i>
                                <span class="product-count">
                                    @php($count_cart = DB::table('shopping_carts')->where('user_id', Auth::id())->count())
                                        {{ $count_cart }}
                                </span>
                            </a>
                        @else
                            <a href="{{ url('page-login')}}"> Gi??? h??ng
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
                    <li><a href="{{ url('/') }}">Trang ch???</a></li>
                    <li><a href="{{ url('page-product') }}">C???a h??ng</a></li>
                    <li><a href="{{ url('page-news') }}">Tin t???c</a></li>
                    <li><a href="{{ url('page-contact') }}">Li??n l???c</a></li>
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
                        <p>Pet Shop t??? tin l?? ?????a ch??? chuy??n nghi???p v?? uy t??n b???c nh???t trong vi???c cung c???p c??c gi???ng ch?? m??o, th???c ??n cho ch?? m??o. ?????n v???i Pet Shop b???n s??? t??m ???????c m???t ng?????i b???n 4 ch??n d??? th????ng cho ng??i nh?? c???a m??nh.</p>
                        <p>?????n v???i Pet Shop, b???n s??? nh???n ???????c s??? t?? v???n t???n t??nh, chuy??n nghi???p ?????n t??? ?????i ng?? nh??n vi??n b??n h??ng tr??? nh??ng ?????y nhi???t huy???t v?? kinh nghi???m trong vi???c ch??m s??c ch?? m??o. H??n th??? n???a, Pet Shop c??n c?? c??c ch????ng tr??nh ??u ????i, khuy???n m??i d??nh cho kh??ch h??ng di???n ra th?????ng xuy??n.</p>
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
                        <h2 class="footer-wid-title ">Tin t???c</h2>
                        <p>????ng k?? nh???n b???n tin c???a ch??ng t??i v?? nh???n c??c ??u ????i ?????c quy???n m?? b???n s??? kh??ng t??m th???y ??? b???t k??? n??i n??o kh??c ngay trong h???p th?? ?????n c???a b???n!</p>
                        <div class="newsletter-form">
                            <form action="#">
                                <input type="email" placeholder="Nh???p v??o email c???a b???n">
                                <input type="submit" value="Subscribe">
                            </form>
                        </div>
                    </div>
                </div>


                <div class="col-md-3 col-sm-6">
                    <div class="footer-menu">
                        <h2 class="footer-wid-title">Gi???ng ch??</h2>
                        <ul>
                            <li><a href="#">G??u ?????n</a></li>
                            <li><a href="#">Corgi</a></li>
                            <li><a href="#">Husky</a></li>
                            <li><a href="#">Shiba</a></li>
                            <li><a href="#">Pug</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6">
                    <div class="footer-menu">
                        <h2 class="footer-wid-title">Gi???ng m??o</h2>
                        <ul>
                            <li><a href="#">M??o Xi??m</a></li>
                            <li><a href="#">M??o Anh Qu???c</a></li>
                            <li><a href="#">M??o Ba T??</a></li>
                            <li><a href="#">M??o Tai C???t</a></li>
                            <li><a href="#">M??o Munchkin</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6">
                    <div class="footer-menu"><br/>
                        <h2 class="footer-wid-title">??i???u h?????ng </h2>
                        <ul>
                            <li><a href="{{ url('page-profile-user-information') }}">T??i kho???n</a></li>
                            <li><a href="#"> L???ch s??? mua h??ng </a></li>
                            <li><a href="#">Chi ti???t s???n ph???m</a></li>
                            <li><a href="{{ url('page-contact') }}">Li??n l???c v???i ch??ng t??i </a></li>
                            <li><a href="#">V??? ?????u trang </a></li>
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
                        <p>&copy; 2020 PetShop. ???? ????ng k?? b???n quy???n. Coded with <i class="fa fa-heart"></i> by <a href="http://wpexpand.com" target="_blank">WP Expand</a></p>
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
          alert("Vui l??ng ????ng nh???p ????? mua h??ng!");
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
