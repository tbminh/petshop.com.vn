@extends('layout.layout')
@section('title', 'Hồ sơ cá nhân')

{{--  ===============================================  --}}
@section('link_css')
<link rel="stylesheet" href="{{ url('public/home/css/style_profile_user.css') }}">
@endsection
{{--  ===============================================  --}}


{{--  ===============================================  --}}
@section('content')

    <style>
        .list-group{
            display: none;
        }
        .tabbable .nav-tabs{
            display: inline-block;
            margin-bottom: 10px;
        }
    </style>

<div class="maincontent-area">
    <div class="zigzag-bottom"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12">

                <br>
                <ul class="list-group">
                    <a href="{{ url('page-profile-user-information') }}" class="btn btn-default" >
                        <i class="green ace-icon fa fa-user bigger-120"></i> 
                        Hồ sơ cá nhân
                    </a>

                    <a href="{{ url('page-wait-payment/'.Auth::id()) }}" class="btn btn-default">
                        <i class="orange ace-icon fa fa-cc-mastercard bigger-120"></i>
                        Chờ thanh toán
                    </a>

                    <a href="{{ url('page-product-deliveried/'.Auth::id()) }}" class="btn btn-default">
                        {{--  chiếc xe  --}}
                        <i class="orange ace-icon fa fa-car bigger-120"></i>
                        Giao hàng
                    </a>

                    <a href="{{ url('page-product-cancelled/'.Auth::id()) }}" class="btn btn-default">
                        <i class="pink ace-icon fa fa-close bigger-120"></i>
                        Đã hủy
                    </a>
                </ul>

                <div id="user-profile-2" class="user-profile">
                    <div class="tabbable">
                        <ul class="nav nav-tabs padding-0">
                            <li>
                                <a href="{{ url('page-profile-user-information') }}">
                                    <i class="green ace-icon fa fa-user bigger-120"></i>
                                    Hồ sơ cá nhân
                                </a>
                            </li>

                            <li>
                                <a href="{{ url('page-wait-payment/'.Auth::id()) }}">
                                    <i class="orange ace-icon fa fa-cc-mastercard bigger-120"></i>
                                    Chờ thanh toán
                                </a>
                            </li>

                            <li>
                                <a href="{{ url('page-product-deliveried/'.Auth::id()) }}">
                                    {{--  chiếc xe  --}}
                                    <i class="orange ace-icon fa fa-car bigger-120"></i>
                                    Giao hàng
                                </a>
                            </li>

                            <li>
                                <a href="{{ url('page-product-cancelled/'.Auth::id()) }}">
                                    <i class="pink ace-icon fa fa-close bigger-120"></i>
                                    Đã hủy
                                </a>
                            </li>
                        </ul>
                        <br>

                        <div class="tab-content no-border padding-0">
                            <div id="home" class="tab-pane in active">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-3 center">
                                        <span class="profile-picture">
                                            <img class="editable img-responsive" alt="Avatar" id="avatar2 "
                                            src="{{url('public/home/upload_img/'.Auth::user()->avatar)}}">
                                        </span>

                                        <div class="space space-4"></div>

                                        <a href="{{ url('page-edit-info-user/'.Auth::id()) }}" class="btn btn-info btn-block">
                                            <i class="fa fa-info-circle"></i> <b>Cập nhật thông tin</b>
                                        </a>

                                        <a href="{{ url('page-change-password') }}" class="btn btn-warning btn-block">
                                            <i class="fa fa-key"></i><b> Đổi mật khẩu</b>
                                        </a>
                                        <br>
                                    </div>
                                    <!-- /.col -->

                                    <div class="col-xs-12 col-sm-9">

                                        {{--  Thừa kế từ layout-profile-user  --}}
                                        @yield('content-profile-col-9')
                                        {{--  Thừa kế từ layout-profile-user  --}}

                                    </div><!-- /.col -->
                                </div><!-- /.row -->

                                <div class="space-20"></div>

                            </div>
                            <!-- /#home -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection
