<!DOCTYPE html>
<html lang="en">
<head>
    <title>Hóa đơn thanh toán</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <style>
        .padding {
            padding: 2rem !important
        }

        .card {
            margin-bottom: 30px;
            border: none;
            -webkit-box-shadow: 0px 1px 2px 1px rgba(154, 154, 204, 0.22);
            -moz-box-shadow: 0px 1px 2px 1px rgba(154, 154, 204, 0.22);
            box-shadow: 0px 1px 2px 1px rgba(154, 154, 204, 0.22)
        }

        .card-header {
            background-color: #fff;
            border-bottom: 1px solid #e6e6f2
        }

        h3 {
            font-size: 20px
        }

        h5 {
            font-size: 15px;
            line-height: 26px;
            color: #3d405c;
            margin: 0px 0px 15px 0px;
            font-family: 'Circular Std Medium'
        }

        .text-dark {
            color: #3d405c !important
        }
    </style>
</head>
<body>

<div class="offset-xl-2 col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12 padding">
    <div class="card">
        <div class="card-header p-4">
            <a class="pt-2 d-inline-block" href="{{ url('/') }}"  target="_blank" style="text-decoration: none;">
                <img src="{{ url('public/home/img/logo.png') }}" style="max-width: 100%;height:60px;"
                     style="opacity: .8">
                <span class="brand-text font-weight-light"></span>
            </a>
            <div class="float-right">
                Ngày đặt hàng:
                <strong>{{$show_export->created_at}}</strong>
            </div>
        </div>
        <div class="card-body">
            <div class="row mb-4">
                <div class="col-sm-6">
                    <h5 class="mb-3">From:</h5>
                    <h3 class="text-dark mb-1">PetShop</h3>
                    <div>Địa chỉ: Phụng Hiệp, Hậu Giang</div>
                    <div>Email: baominh@gmail.com</div>
                    <div>Sđt: +84 925 434 581</div>
                </div>
                <div class="col-sm-6 ">
                    <h5 class="mb-3">To:</h5>
                    @php($show_user = DB::table('users')->where('id',$show_export-> user_id)->first())
                    <h3 class="text-dark mb-1">{{$show_user->full_name}}</h3>
                    <div>{{$show_user->adress}}</div>
                    <div>{{ $show_user->email }}</div>
                    <div>{{ $show_user->phone }}</div>
                </div>
            </div>
            <div class="table-responsive-sm">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th class="center">Stt</th>
                        <th>Tên sản phẩm</th>
                        <th>Giá bán</th>
                        <th class="right">Số lượng</th>
                        <th class="center">Tổng tiền</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $total_price = 0; ?>
                    @php($get_details = DB::table('order_details')->where('order_id', $show_export->id)->get())
                    @foreach($get_details as $key =>$data)
                        <tr>
                            <td class="center">{{ ++$key }} </td>
                            @php($get_product = DB::table('products')->where('id', $data->product_id)->first())
                            <td class="left strong"> {{ $get_product->product_name }}</td>
                            <td class="left">{{  number_format($get_product->product_price) }} VND</td>
                            <td class="right">{{ $data->total_quality }}</td>
                            <td class="center">
                                <?php
                                $price = $get_product->product_price;
                                $qty = $data -> total_quality;
                                $total = $price * $qty;
                                $total_price = $total_price + $total;
                                ?>
                                <span class="amount">{{ number_format($total)}} VND</span>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="row">
                <div class="col-lg-4 col-sm-5">
                </div>
                <div class="col-lg-4 col-sm-5 ml-auto">
                    <table class="table table-clear">
                        <tbody>
                        <tr>
                            <td class="left">
                                <strong class="text-dark">Tổng thu sản phẩm</strong>
                            </td>
                            <td class="right"> {{ number_format($total_price) }} VND</td>
                        </tr>
                        <tr>
                            <td class="left">
                                <strong class="text-dark">Thuế (0%)</strong>
                            </td>
                            <td class="right">0 VND</td>
                        </tr>
                        <tr class="shipping">
                            <td class="left">
                                <strong>Phương thức vận chuyển</strong>
                            </td>

                            <td>
                                @if ($total_price >= 1000000)
                                    <?php  $delivery =0; ?>
                                    <b>Miễn phí vận chuyển</b>
                                    <input type="hidden" value="0" name="inputDelivery">
                                @else
                                    <b><?php $delivery = 100000; echo number_format($delivery); ?> VND</b>
                                    <input type="hidden" value="{{ $delivery }}" name="inputDelivery">
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td class="left">
                                <strong class="text-dark">Tổng thanh toán</strong> </td>
                            <td class="right">
                                <?php $total_payment = $total_price + $delivery ?>
                                <strong class="text-dark">{{number_format($total_payment)}} VND</strong>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="card-footer bg-white">
            <p class="mb-0">Hòa An, Phụng Hiệp, Hậu Giang</p>
        </div>
    </div>

    <div class="card-tools text-right">
        <button class="btn btn-danger btn-sm" type="button" id="btn-print" onclick="Print_pdf();">
            <i class="fa fa-print"></i> In hóa đơn
        </button>
    </div>
</div>

<script>

    function Print_pdf() {
        document.getElementById("btn-print").style.display = "none";
        window.print();
    }
</script>

</body>
</html>
