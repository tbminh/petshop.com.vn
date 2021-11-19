@extends('home.profile_user.layout_profile_user')
@section('content-profile-col-9')


    <h4 class="blue">
        <span class="middle">{{Auth::user()->full_name}}</span>
        <span class="label label-purple arrowed-in-right">
            <i class="ace-icon fa fa-circle smaller-80 align-middle"></i>
            online
        </span>
    </h4>

    <div class="profile-user-info">
        <div class="profile-info-row">
            <div class="profile-info-name"> Tên tài khoản </div>

            <div class="profile-info-value">
                <span> {{Auth::user()->username}}</span>
            </div>
        </div>

        <div class="profile-info-row">
            <div class="profile-info-name"> Giới tính </div>

            <div class="profile-info-value">
                <span> {{Auth::user()->sex}}</span>
            </div>
        </div>

        <div class="profile-info-row">
            <div class="profile-info-name"> Nơi ở </div>

            <div class="profile-info-value">
                <i class="fa fa-map-marker light-orange bigger-110"></i>
                <span>{{Auth::user()->adress}}</span>
            </div>
        </div>

        <div class="profile-info-row">
            <div class="profile-info-name">Email </div>

            <div class="profile-info-value">
                <span>{{Auth::user()->email}}</span>
            </div>
        </div>

        <div class="profile-info-row">
            <div class="profile-info-name"> Đã tham gia</div>

            <div class="profile-info-value">
                <span>20/11/2020</span>
            </div>
        </div>

        <div class="profile-info-row">
            <div class="profile-info-name"> Đã online </div>

            <div class="profile-info-value">
                <span>3 giờ trước</span>
            </div>
        </div>
    </div>

    <div class="hr hr-8 dotted"></div>

    <div class="profile-user-info">
        <div class="profile-info-row">
            <div class="profile-info-name"> Trang web </div>

            <div class="profile-info-value">
                <a href="{{url('/')}}" target="_blank">www.petshop.com</a>
            </div>
        </div>

        <div class="profile-info-row">
            <div class="profile-info-name">
                <i class="middle ace-icon fa fa-facebook-square bigger-150 blue"></i>
            </div>

            <div class="profile-info-value">
                <a href="https://www.facebook.com/" target="_blank">Tìm tôi trên facebook</a>
            </div>
        </div>

        <div class="profile-info-row">
            <div class="profile-info-name">
                <i class="middle ace-icon fa fa-twitter-square bigger-150 light-blue"></i>
            </div>

            <div class="profile-info-value">
                <a href="https://twitter.com/" target="_blank">Theo dõi tôi trên Twitter</a>
            </div>
        </div>
    </div>


@endsection
