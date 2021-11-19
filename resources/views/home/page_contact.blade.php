@extends('layout.layout')
@section('title', 'Liên lạc')




@section('content')

<div class="container my-3 my-sm-5">

    <br/>
    <h1 class="mb-sm-4 text-center mb-4">Liên lạc với chúng tôi </h1>
    <hr>
    <div class="row">
        <div class="col-12 col-md-6">



            <h4>Địa chỉ</h4>
            <address>
                <strong>
                    Tỉnh Hậu Giang
                </strong>
                <br>
                Hòa An, Phụng Hiệp <br>
                SĐT: <a href="tel:+919036242596">+84 899 068 414</a> <br>
                Email:<a href="mailto:info@domain.com">baominh@gmail.com</a><br>
            </address>
        </div>
        <div class="col-12 col-md-6">


            <h4>Giờ mở cửa</h4>
            <p>
                Thứ hai - Thứ sáu: <span class="float-right">8 a.m - 8 p.m  </span> <br>
            </p>
            <p>
                Thứ bảy- Chủ nhật: <span class="float-right"> 8 a.m - 5 p.m</span> <br>
            </p>
            <p>
                Không làm việc vào những ngày lễ <span class="float-right"></span> <br>
            </p>
        </div>
    </div>
    <div class="row">

        <div class="col-12 col-md-6 mb-3">
            <br><h4>Gởi tin nhắn cho chúng tôi</h4>
            <form action="#">
                <div class="row">
                    <div class="col-12 col-md-6">

                        <div class="form-group">
                            <label for="name">Họ :</label>
                            <input type="text" id="name" class="form-control" placeholder="Nhập tên..." required>

                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" id="email" class="form-control" placeholder="example@domain.com" required>

                        </div>
                    </div>

                </div>
                <div class="form-group">
                    <label for="textarea">Nội dung:</label>
                    <textarea class="form-control" placeholder="Nhập nội dung vào..." name="" id="textarea" cols="30" rows="10" required></textarea>

                </div>
                <button type="submit" class="btn btn-outline-primary">Gửi</button>
            </form>
        </div>
{{--        <div class="col-12 col-md-6">--}}


{{--       <h4>Bản đồ:</h4>--}}
{{--                <div class="embed-responsive embed-responsive-4by3">--}}
{{--                    <iframe class="embed-responsive-item"--}}
{{--                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3022.6175453420647!2d-73.98784413479707!3d40.748440379327945!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c259a9aeb1c6b5%3A0x35b1cfbc89a6097f!2sEmpire+State+Building%2C+350+5th+Ave%2C+New+York%2C+NY+10118%2C+USA!5e0!3m2!1sda!2sdk!4v1491841211721"--}}
{{--                        width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>--}}
{{--                </div>--}}
{{--        </div>--}}
    </div>
</div>

@endsection


