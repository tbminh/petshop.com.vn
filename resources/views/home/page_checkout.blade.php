@extends('layout.layout')
@section('title', 'Thanh toán')
@section('content')


    <div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-bit-title text-center">
                        <h2>Giỏ Hàng</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>


<div class="single-product-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div id="customer_details" class="col2-set">
                        <div class="col-1">
                            <div class="woocommerce-billing-fields">
                                <h3>Thông tin</h3>
                                <label class="" for="billing_country">
                                    <b style="font-size: 20px">
                                        <p>Họ tên: {{Auth::user()->full_name}}</p>
                                        <p>Điện thoại: {{Auth::user()->phone}}</p>
                                        <p>Email: {{Auth::user()->email }}</p>
                                        <p>Địa chỉ: {{Auth::user()->adress }}</p>
                                        <a href="{{ url('page-edit-info-user/'.Auth::id())}}" class="btn btn-default" style="background-color: #1abc9c;color: white;" >
                                            Thay đổi thông tin
                                        </a>
                                    </b>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-8">
                    <div class="product-content-right">
                        <div class="woocommerce">
                            <form action="{{ url('checkout-payment/'.Auth::id()) }}" class="checkout" method="post">
                                @csrf
                                <h3 id="order_review_heading">Hóa đơn</h3>
                                <div id="order_review" style="position: relative;">
                                    <table class="shop_table">
                                        <thead>
                                            <tr>
                                                <th>STT</th>
                                                <th class="product-image">Hình ảnh</th>
                                                <th class="product-name">Tên sản phẩm</th>
                                                <th class="product-price">Giá</th>
                                                <th class="product-quality">Số lượng</th>
                                                <th class="product-total">Tổng</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $total_price = 0; ?>
                                            @foreach($show_carts as $key => $data)
                                            @php($get_products = DB::table('products')->where('id', $data->product_id)->first())
                                                <tr class="cart_item">
                                                    <td>{{ ++ $key }} </td>
                                                    <td class="product-image">
                                                        <a href="#">
                                                            <img class="shop_thumbnail" src="{{url('public/upload_images/'.$get_products->product_img)}}" width="145" height="145">
                                                        </a>
                                                    </td>

                                                    <td data-label="Tên sản phẩm">
                                                        <a href="{{ url('page-product-detail/'.Str::slug($get_products->product_name).'/'. $get_products->id) }}" style="color:#1abc9c ">
                                                            {{ $get_products->product_name }}
                                                        </a>
                                                    </td>
                                                    <td data-label="Giá sản phẩm" >
                                                        <span class="amount" >{{ number_format($get_products->product_price) }} VND</span>
                                                    </td>
                                                    <td data-label="Số lượng">
                                                        {{ $data->cart_quality }}
                                                    </td>
                                                    <td data-label="Tổng đơn hàng">
                                                        <?php
                                                            $price = $get_products->product_price;
                                                            $qty = $data->cart_quality;
                                                            $total = $price * $qty;
                                                            $total_price = $total_price + $total;
                                                        ?>
                                                        <span class="amount">{{ number_format($total) }} VND</span>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>

{{--                                    Chọn phương thức thanh toán--}}
                                    <div class="row">
                                        <div class="col-md-4">
                                            <h4>Phương thức thanh toán</h4>
                                        </div>
                                        <div class="col-md-8">
                                            <select name="inputMethodPayment" class="form-control" required>
                                                <option value="">- - Chọn phương thức - -</option>
                                                <option value="Thanh toán chuyển khoản">Thanh toán chuyển khoản</option>
                                                <option value="Thanh toán tiền mặt">Thanh toán tiền mặt</option>
                                            </select>
                                        </div>
                                    </div>

                                    <br>

                                    <table class="shop_table" style="width:100%;" >
                                        <tfoot>
                                            <tr class="cart-subtotal">
                                                <td>
                                                    <strong>Tổng phụ giỏ hàng</strong>
                                                </td>
                                                <td>
                                                    <span>
                                                        {{ number_format($total_price) }} VND
                                                    </span>
                                                </td>
                                            </tr>

                                            <tr class="shipping">
                                                <td>
                                                    <strong>Vận chuyển và xử lí</strong>
                                                </td>
                                                <td>
                                                    @if ($total_price >= 1000000)
                                                        <b>Miễn phí vận chuyển</b>
                                                        <input type="hidden" value="0" name="inputDelivery">
                                                    @else
                                                        <b><?php $delivery = 100000; echo number_format($delivery); ?> VND</b>
                                                        <input type="hidden" value="{{ $delivery }}" name="inputDelivery">
                                                    @endif
                                                </td>
                                            </tr>

                                            <tr class="order-total">
                                                <td>
                                                    <strong>Tổng đơn hàng</strong>
                                                </td>

                                                <td data-label="Tổng đơn hàng">
                                                    @if ($total_price >= 1000000)
                                                        <strong><span class="amount">{{ number_format($total_price) }} VND</span></strong>
                                                    @else
                                                        <strong><span class="amount"><?php $total_all = $total_price + 100000; echo number_format($total_all); ?> VND</span></strong>
                                                    @endif
                                                </td>
                                            </tr>

                                            <tr>
                                                <td></td>
                                                <td class="actions">
                                                        <input type="submit" value="Đặt hàng" name="update_cart" class="button">
                                                </td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>





@endsection
