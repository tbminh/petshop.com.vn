@extends('layout.layout')
@section('title','Trang chủ')



@section('content')
    <style>
        @media screen and (max-width: 600px) {
            .slider-img{
                max-width: 100%;
                height: auto;
            }
        }
        .item .slider-img{
            width:1600px;
        }
    </style>


    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner">
            @foreach($show_sliders as $show_slider )
            <div class="item active">
                <img src="{{ url('public/upload_img_sliders/'.$show_slider->slider_image) }}" class="slider-img">
                <div class="carousel-caption">
                        <h2>{{ $show_slider->slider_title }}</h2>
                    <p>{{$show_slider->slider_content}}</p>
                </div>
            </div>
            @endforeach
        </div>

        <!-- Left and right controls -->
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>


    {{--Thông tin khuyến mãi--}}
    <div class="promo-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <div class="single-promo">
                        <i class="fa fa-refresh"></i>
                        <p>30 ngày đổi trả </p>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6">
                    <div class="single-promo">
                        <i class="fa fa-truck"></i>
                        <p>Free ship 20km</p>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6">
                    <div class="single-promo">
                        <i class="fa fa-lock"></i>
                        <p>Thanh toán tiện lợi</p>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6">
                    <div class="single-promo">
                        <i class="fa fa-gift"></i>
                        <p>Thú cưng đa dạng</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End promo area -->


    <!--Phần giống chó mới nhất -->
    <div class="maincontent-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="latest-product">
                        <h2 class="section-title"><b>Mặt hàng mới</b></h2>
                        <div class="product-carousel">
                            @foreach($data as $product_latests)
                                <div class="single-product">
                                    <div class="product-f-image">
                                        <img src="{{ url('public/upload_images/'.$product_latests->product_img)}} ">
                                        <div class="product-hover">
                                            @if (Auth::check())
                                                <a href="{{ url('add-cart/'.Auth::id().'/'.$product_latests->id) }}"
                                                   class="add-to-cart-link"><i class="fa fa-shopping-cart"></i>Thêm vào giỏ</a>
                                            @else
                                                <a href="{{ url('page-login') }}" class="add-to-cart-link"><i
                                                        class="fa fa-shopping-cart"></i>Thêm vào giỏ</a>
                                            @endif
                                                <a href="{{ url('page-product-detail/'.Str::slug($product_latests->product_name).'/'.$product_latests->id) }}"
                                                   class="view-details-link"><i class="fa fa-link"></i>Xem Chi tiết</a>
                                        </div>
                                    </div>
                                    <h2>
                                        <a href="{{ url('page-product-detail/'.Str::slug($product_latests->product_name )).'/'.$product_latests->id}}">
                                            {{$product_latests->product_name}}
                                        </a>
                                    </h2>
                                    <div class="product-carousel-price">
                                        <ins>{{number_format($product_latests->product_price) }} VND/ {{$product_latests->product_unitprice}}</ins>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End main content area -->

    {{--Phần phân loại các sản phẩm--}}
    <div class="maincontent-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="latest-product">
                    <h2 class="section-title"><b>Các loại sản phẩm</b></h2>
                    <div class="product-carousel">
                        @foreach($show_categories as $category)
                            <div class="single-product">
                                <div class="product-f-image">
                                    <img src="{{ url('public/upload_images/'.$category->category_image)}} ">
                                </div>
                                <h2>
                                    <a href="{{ url('page-category/'.Str::slug( $category->category_name )).'/'.$category->id}}">
                                        {{$category->category_name}}
                                    </a>
                                </h2>
                            </div>
                        @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End main content area -->

    <!--Các hãng liên quan -->
    <div class="brands-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="brand-wrapper">
                        <h2 class="section-title"><b>Thương Hiệu</b></h2>
                        <div class="brand-list">
                            <img src="public/home/img/services_logo__1.jpg" alt="">
                            <img src="public/home/img/services_logo__2.jpg" alt="">
                            <img src="public/home/img/services_logo__3.jpg" alt="">
                            <img src="public/home/img/services_logo__4.jpg" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End brands area -->
  
    <div class="product-widget-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="single-product-widget">
                        <h2 class="product-wid-title">Mặt hàng bán chạy nhất</h2>
                        <a href="" class="wid-view-more">View All</a>
                        <div class="single-wid-product">
                            <a href="#"><img src="public/upload_images/Cat2-edit.png" alt="" width="100px" height="90px"> </a>
                            <h2><a href="#"> Mèo Anh Quốc</a></h2>
                            <div class="product-wid-price">
                                <ins>900000 VND/ Con</ins>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <div class="single-product-widget">
                        <h2 class="product-wid-title">Giống mới</h2>
                        <a href="#" class="wid-view-more">View All</a>
                        <div class="single-wid-product">
                            <a href="{{ url('page-product-detail') }}">
                                <img src="{{url('public/upload_images/'.$product_latests->product_img)}}" alt="" width="100px" height="90px">
                            </a>
                            <h2>
                                <a href="{{ url('page-product-detail/'.Str::slug($product_latests->product_name )).'/'.$product_latests->id}}">
                                    {{$product_latests->product_name}}
                                </a>
                            </h2>
                            <div class="product-carousel-price">
                                <ins>{{number_format($product_latests->product_price) }} VND/{{$product_latests->product_unitprice}}</ins>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End product widget area -->
@endsection




