@extends('layout.layout')
@section('title', 'Thú cưng')

{{--Nội dung sản phẩm--}}
@section('content')

    <style>
        .product-carousel-price{
            width: 54%;
            font-size: 12px;
            margin-bottom: 20px;
            border: none;
        }
        .product-option-shop{
            width: 46%;
            margin-top: -2px;
            font-size: 12px;
            margin-bottom: 20px;
            border: none;
        }
        .product-option-shop a{
            padding: 5px 5px;
        }
        @media screen and (max-width: 576px) {
           .add_to_cart_button{
               font-size: 12px;
               display: inline;
           }
            .product-carousel-price ins{
                font-size: 12px;
                display: inline;
            }

            .row .product-carousel-price, .product-option-shop{
                display: inline;
                margin-bottom: 20px;
            }
            .product-f-image{
                margin-top: 20px;
            }
        }
    </style>

    {{-- Các giống chó mèo--}}
    <div class="maincontent-area">
        <div class="zigzag-bottom"> </div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="latest-product"><br/><br/>
                        <h2 class="section-title"><b>Cửa Hàng</b></h2>

                            @foreach($show_products as $show_product)
                                <div class="single-product col-md-3">
                                    <div class="product-f-image">
                                        <img src="{{ url('public/upload_images/'.$show_product->product_img)}} ">
                                    </div>

                                    <h2>
                                        <a href="{{ url('page-product-detail/'.Str::slug($show_product->product_name )).'/'.$show_product->id}}">
                                            {{$show_product->product_name}}
                                        </a>
                                    </h2>

                                    <div class="row">
                                        <div class="product-carousel-price col-sm-5 col-lg-6">
                                            <ins>{{number_format($show_product-> product_price)}} VND/ {{$show_product-> product_unitprice}}</ins>
                                        </div>

                                        <div class="product-option-shop col-sm-5 col-lg-6">
                                            <a class="add_to_cart_button" href="{{ url('add-cart/'.Auth::id().'/'.$show_product->id)}}">
                                                Thêm vào giỏ
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach


                    </div>

                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="text-center">
                            <ul class="pagination justify-content-center pagination-sm mt-2 ">
                                {{ $show_products->links() }}
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div> <!-- End main content area -->
@endsection
