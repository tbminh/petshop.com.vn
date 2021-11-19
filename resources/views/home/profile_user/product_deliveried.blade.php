@extends('home.profile_user.layout_profile_user')
@section('content-profile-col-9')

<div class="table-responsive-sm">
    @forelse($display_orders as $key => $data)
        <div class="panel panel-default">
            <div class="panel-heading"><b> Đơn hàng {{ '000'.$data->id }} </b></div>
            <div class="panel-body" style="padding:1px 1px;">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">STT</th>
                        <th scope="col">Hình ảnh</th>
                        <th scope="col">Tên SP</th>
                        <th scope="col">Giá</th>
                        <th scope="col">Số lượng</th>
                        <th scope="col">Tổng tiền</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php($get_details = DB::table('order_details')->where('order_id',$data->id)->get())
                    <tr>
                        <?php $total_payment = 0; ?>
                        @foreach($get_details as $get_detail)
                            @php($get_product = DB::table('products')->where('id',$get_detail-> product_id)->first())
                            <td data-label="STT">{{ ++$key }}</td>
                            <td data-label="Hình ảnh">
                                <a href="#">
                                    <img class="shop_thumbnail" src="{{url('public/upload_images/'.$get_product->product_img)}}" width="50" height="50" >
                                </a>
                            </td>

                            <td data-label="Tên SP">
                                {{$get_product-> product_name}}
                            </td>
                            <td data-label="Giá">
                                {{number_format($get_product-> product_price)}}
                            </td>
                            <td data-label="Số lượng">
                                {{ $get_detail -> total_quality }}
                            </td>
                            <td data-label="Tổng tiền">
                                <?php
                                    $price = $get_product-> product_price;
                                    $qty = $get_detail -> total_quality;
                                    $total = $price * $qty;

                                    $total_payment = $total_payment + $total;
                                ?>
                                {{ number_format($total) }} VND
                            </td>
                        </tr>
                    @endforeach
                    <tr>
                        <td colspan="5">
                            Tổng thanh toán:
                        </td>
                        <td colspan="2">
                            {{ number_format($total_payment) }} VND
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
          </div>
        @empty
            <div class="alert alert-danger text-center" role="alert">
                <strong style="font-size: 25px;"> Không có đơn hàng</strong>
            </div>
    @endforelse
    </div>

@endsection
