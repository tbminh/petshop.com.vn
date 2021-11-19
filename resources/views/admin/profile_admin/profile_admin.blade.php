@extends('layout.layout_admin')
@section('title', 'Hồ sơ cá nhân')

@section('breadcrumb')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6"></div>
                <div class="col-sm-6 text-right">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('page-admin') }}">Trang chủ</a></li>
                        <li class="breadcrumb-item active">Thông tin quản trị viên</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
@endsection


@section('content')
    <br>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">
                    <!-- Profile Image -->
                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile text-center">
                             <span class="profile-picture">
                                 <img class="editable img-responsive" alt=" Avatar" id="avatar2"
                                      src="{{ url('public/upload_images/'.Auth::user()->avatar) }}" style="width:100px; height:100px;">
                             </span>

                            <div class="text-center">
                                <a href="#" class="d-block">{{ Auth::user()->username }}</a>
                            </div>

                            <p class="text-muted text-center">
                                @php($get_roles = DB::table('role_accesses')->where('id', Auth::user()->role_id)->first())
                                {{ $get_roles->role_name }}
                            </p>

                            <a href="{{ url('change-pass/'.Auth::id()) }}" class="btn btn-primary btn-block"><i class="fa fa-key"></i><b>Đổi mật khẩu</b></a>


                            <!-- About Me Box -->
                            <div class="card card-primary">
                                <!-- /.card-header -->
                                <div class="card-body">

                                    <strong> <i class="fas fa-book mr-1"> </i> Họ và tên </strong>
                                    <p class="text-muted">{{Auth::user()->full_name}}  </p>
                                    <hr>

                                    <strong><i class="fas fa-map-marker-alt mr-1"></i> Địa chỉ</strong>
                                    <p class="text-muted">{{Auth::user()->adress}}</p>
                                    <hr>

                                    <strong><i class="fas fa-pencil-alt mr-1"></i> Số điện thoại </strong>
                                    <p class="text-muted"> {{Auth::user()->phone}} </p>

                                    <hr>

                                    <strong><i class="far fa-file-alt mr-1"></i> Email</strong>

                                    <p class="text-muted">{{Auth::user()->email}}</p>
                                </div>
                                <!-- /.card-body -->
                            </div>

                            <!-- /.card -->
                        </div>
                    </div>
                    <!-- /.row -->
                </div>


                @yield('content-change')
                <!-- /.col -->
            </div>
        </div>
    </section>
@endsection
