@extends('layout.layout')
@section('title', 'Tin tức')
@section('content')

    <style>
        @media screen and (max-width: 576px) {
            #title{
                font-size: 20px;
            }
        }
    </style>


<div class="single-product-area">
    <div class="container">
        <div class="row">
            <h2 class="section-title"><b>Tin tức</b></h2>
            <div class="col-md-4">
              <div class="thumbnail">
                <img src="public/home/img/news-edit.png" alt="">
                  <div class="caption">
                    <a href="https://kenh14.vn/chu-cun-nhat-hanh-phuc-trong-moi-hoan-canh-co-bieu-cam-giong-idol-nguyen-van-dui-ghe-20200820120008041.chn" target="_blank" title="" rel="follow, index">
                        <h3 id="title"> Chú cún Nhật hạnh phúc trong mọi hoàn cảnh, có biểu cảm giống Nguyễn Văn Dúi</h3>
                    </a>
                  </div>
              </div>
            </div>

            <div class="col-md-4">
              <div class="thumbnail">
                <img src="public/home/img/news3-edit.png "  alt="">
                  <div class="caption">
                    <a href="http://thucanhviet.com/cho-bully-american-dung-si-cua-loai-cho.html" target="_blank" title=" " rel="follow, index">
                        <h3 id="title">Chó Bully American – Dũng Sĩ của loài Chó </h3>
                    </a>
                  </div>
              </div>
            </div>

            <div class="col-md-4">
              <div class="thumbnail">
                <img src="public/home/img/news2.jpg"  alt="">
                  <div class="caption">
                    <a href="http://thucanhviet.com/cho-suc-jack-russell-terrier-giong-cho-nho-thong-minh-va-ranh-manh.html" target="_blank" title="" rel="follow, index">
                        <h3 id="title">Chó sục Jack Russell Terrier- giống chó nhỏ thông minh và ranh mãnh</h3>
                    </a>
                  </div>
              </div>
            </div>
        </div>
    </div>
</div>



@endsection
