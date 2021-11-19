@extends('layout.layout_admin')
@section('title', 'Trang hóa đơn')


@section('breadcrumb')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6"></div>
                <div class="col-sm-6 text-right">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{url('page-admin')}}">Trang chủ</a></li>
                        <li class="breadcrumb-item active">Hóa đơn</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
@endsection


@section('content')
    <section class="content">
        <!-- Main row -->
            <div class="row">
                <!-- Left col -->
                <section class="col-lg-12">
                    <!-- TO DO List -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="ion ion-clipboard mr-1"></i>
                                HÓA ĐƠN
                            </h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-1">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Mã đơn hàng</th>
                                    <th>Tên khách hàng</th>
                                    <th>Địa chỉ</th>
                                    <th>Trạng thái</th>
                                    <th>Phương thức thanh toán</th>
                                    <th scope="col" colspan="2">Tùy chọn</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($show_orders as $key => $data)
                                @php($get_user = DB::table('users')->where('id', $data->user_id)->first())
                                    <tr>
                                        <td scope ="row"> {{ ++$key }} </td>
                                        <td>{{ '000'.$data-> id }}</td>

                                        <td>{{$get_user->full_name }}</td>
                                        <td>
                                           {{ $get_user->adress }}
                                        </td>
                                        <td>
                                                @if ($data->order_status == 0 )
                                                    <b style="color:blue;"> Chờ thanh toán </b>
                                                @elseif($data->order_status == 1)
                                                    <b style="color:green;"> Đang giao hàng </b>
                                                @else
                                                    <b style="color:red;">Đã hủy</b>
                                                @endif
                                        </td>

                                        <td>{{ $data->order_amount}}</td>

                                        <td>
                                            @if ($data->order_status ==2 )
                                                <button class="btn btn-danger btn-sm" type="button" disabled>
                                                    <i class="fa fa-check-circle"></i> Duyệt
                                                </button>
                                            @elseif($data->order_status ==1)
                                                <a class="btn btn-danger btn-sm" href="{{ url('cancel-order/'.$data->id) }}" role="button">
                                                    <i class="fa fa-recycle"></i> &nbsp; Hủy
                                                </a>
                                            @else
                                                <a class="btn btn-primary btn-sm" href="{{ url('approve-order/'.$data->id) }}" role="button">
                                                    <i class="fa fa-check-circle"></i> Duyệt
                                                </a>
                                            @endif
                                        </td>

                                        <td>
                                            <a class="btn btn-success btn-xs" href="{{ url('admin-order-detail/'.$data->id) }}" role="button" >
                                                <i class="fas fa-eye"></i> Xem
                                            </a>
                                        </td>
                                    </tr>
                                    @empty
                                        <div class="alert alert-danger text-center" role="alert">
                                            <strong style="font-size: 25px;"> Không có đơn hàng</strong>
                                        </div>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </section>
                <!-- /.Left col -->
            </div>

        <!-- /.row (main row) -->
    </section>
@endsection


