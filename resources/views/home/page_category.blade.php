@extends('layout.layout')
@section('title', 'Trang loại sản phẩm')

{{--Nội dung sản phẩm--}}
@section('content')
    {{--    Các giống chó--}}
    <div class="maincontent-area">
        <div class="zigzag-bottom"> </div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="latest-product"><br/><br/>
                        <h2 class="section-title"><b>{{$category_id->category_name}}</b></h2>
                            <div class="product-carousel">
                                @forelse($show_cate_products as $data)
                                    <div class="single-product">
                                        <div class="product-f-image">
                                            <img src="{{ url('public/upload_images/'.$data->product_img)}} ">
                                        </div>
                            {{--                                        Hiển thị tên sản phẩm--}}
                                        <h2>
                                            <a href="{{ url('page-product-detail/'.Str::slug($data->product_name)).'/'.$data->id}}">
                                                {{$data->product_name}}
                                            </a>
                                        </h2>
                            {{--                                        Hiển thị giá sản phẩm--}}
                                        <div class="product-carousel-price">
                                            <ins> {{number_format($data->product_price)}}VND/ {{ $data->product_unitprice }} </ins>
                                        </div>

                                        <div class="product-option-shop">
                                            <a class="add_to_cart_button" href="{{ url('page-cart') }}">Thêm vào giỏ</a>
                                        </div>
                                    </div>
                                @empty
                                    <b class="text-danger">Không có dữ liệu </b>
                                @endforelse
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End main content area -->




@endsection
