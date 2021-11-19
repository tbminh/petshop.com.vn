@extends('layout.layout')
@section('title', 'Giỏ hàng')
@section('content')

    <style>
        .image-product{
            max-width: 100px;
            height: auto;
            width: 100%;
            border-radius: 5px;
        }
        .input-text{
            width: 55px;
            height: 35px;
            text-align: center;
            border-radius:5px;
            font-size: 16px;
        }
        .btn-delete {
            background-color: red;
            color: white;
            padding: 8px 15px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 13px;
            margin: 4px 2px;
            cursor: pointer;
        }
    </style>

<div class="product-big-title-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="product-bit-title text-center">
                    <h2>Giỏ hàng</h2>
                </div>
            </div>
        </div>
    </div>
</div> <!-- End Page title area -->


<div class="single-product-area">
    <div class="zigzag-bottom"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @if ($show_carts->count() > 0)
                    <div class="product-content-right">
                        <div class="woocommerce">
                            <table cellspacing="0" class="shop_table cart">
                                <thead>
                                <tr>
                                    <th>Tên sản phẩm</th>
                                    <th>Hình Ảnh</th>
                                    <th>Giá</th>
                                    <th>Số lượng</th>
                                    <th>Tổng tiền</th>
                                    <th colspan="2">Tùy chọn</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($show_carts as $show_cart)
                                    @php($get_products = DB::table('products')->where('id', $show_cart->product_id)->first())
                                    <form action="{{ url('update-cart/'.Auth::id().'/'.$show_cart->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                        <tr class="cart_item">
                                            <td data-label="Tên sản phẩm">
                                                <a href="{{ url('page-product-detail/'.Str::slug($get_products->product_name).'/'.$get_products->id) }}">{{ $get_products->product_name }}</a>
                                            </td>

                                            <td data-label="Hình ảnh">
                                                <a href="#">
                                                    <img class="image-product" src="{{url('public/upload_images/'.$get_products->product_img)}}" width="145" height="145" >
                                                </a>
                                            </td>

                                            <td data-label="Giá">
                                                <span class="amount">{{ number_format($get_products->product_price) }} VND</span>
                                            </td>

                                            <td data-label="Số lượng">
                                                <input type="number" size="4" class="input-text qty text" name="inputQty"
                                                        value="{{ $show_cart->cart_quality }}" min="0" step="1">
                                            </td>

                                            <td data-label="Thành tiền">
                                                <?php
                                                $price = $get_products->product_price;
                                                $qty = $show_cart->cart_quality;
                                                $total = $price * $qty;
                                                ?>
                                                <span class="amount">{{ number_format($total) }} VND</span>
                                            </td>

                                            <td data-label="Tùy chọn">
                                                <input type="submit" class="fa fa-circle-o" value="Cập nhật" name="update_cart" class="button">
                                            </td>


                                            <td data-label="Tùy chọn">
                                                <a href="{{ url('delete-product-cart/'.$show_cart->id) }}" class="btn-delete"
                                                onclick="return confirm('Bạn có chắc muốn xóa không?');">
                                                    XÓA
                                                </a>
                                            </td>
                                        </tr>
                                    </form>

                                @endforeach

                                <tr>
                                    <td colspan="6"></td>
                                    <td class="actions" colspan="2" style="padding:10px;">
                                        <a href="{{ url('page-checkout/'.Auth::id()) }}"  style="border:unset;width: 200px;">
                                            <input type="submit" value="Thanh Toán" name="update_cart" class="button">
                                        </a>
                                    </td>
                                </tr>
                                </tbody>
                            </table>

                        </div>
                    </div>
                @else
                    <div class="alert alert-danger text-center" role="alert">
                        <strong style="font-size: 25px;"> Giỏ hàng không có sản phẩm!!!</strong>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>

    <script>
        var msg = '{{Session::get('alert')}}';
        var exist = '{{Session::has('alert')}}';
        if(exist){
            alert(msg);
        }
    </script>


@endsection
