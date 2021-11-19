@extends('layout.layout_admin')
@section('title', 'Trang quản trị viên')


@section('breadcrumb')

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="page-admin">Trang chủ</a></li>
                        <li class="breadcrumb-item active">Quản trị</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
@endsection


@section('content')
    <section class="content">
        <div class="wrapper">
            <div class="row">
                <section class="col-lg-12 connectedSortable">

{{--                Hiển thị dòng thông báo đã thêm thành công--}}
                @if(session()->has('message'))
                    <div class="alert alert-success">
                        {{ session()->get('message') }}
                    </div>
                @endif


                <!-- TO DO List -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="ion ion-clipboard mr-1"></i>
                            QUẢN TRỊ
                        </h3>
                        <div class="card-tools">
                            <a class="btn btn-primary btn-sm" href="{{ url('page-add-admin') }}" role="button" >
                               <i class="fa fa-plus-circle"></i> Thêm mới
                            </a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-1">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>STT</th>
                                <th>Họ và tên</th>
                                <th>Tài khoản</th>
                                <th>Email</th>
                                <th>Địa chỉ</th>
                                <th>Điện thoại</th>
                                <th>Giới tính</th>
                                <th>Ngày sinh</th>
                                <th>Hình ảnh</th>
                            </tr>
                            </thead>
                            <tbody>

                            @forelse($show_admins as $key => $data)
                            <tr>
                                <td> {{ ++$key }}</td>
                                <td>{{$data->full_name}}</td>
                                <td>{{$data->username}}</td>
                                <td>{{$data->email}}</td>
                                <td>{{$data->adress}}</td>
                                <td>{{$data->phone}}</td>
                                <td>{{$data->sex}}</td>
                                <td>{{$data->birthday}}</td>
                                <td>
                                    <img src="{{ url('public/upload_images/'.$data->avatar) }}"
                                         class="img-circle elevation-2" alt="User Image " width="30px" height="30px">
                                </td>
                            </tr>
                            @empty
                                <tr>
                                    <td>
                                        <td colspan="11">
                                            <b class="text-danger">Không có dữ liệu </b>
                                        </td>
                                    </td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
            <section>
            </div>
        </div>
    </section


@endsection



