@extends('layout.layout')
@section('title', 'Đăng ký')
@section('content')

<div class="form-register">

    <style>
        /*Small devices (landscape phones, 576px and up)*/
        @media (max-width: 576px) {
            .title-register{
                font-size: 30px;
            }
            .top-row .field-wrap .req{
                font-size: 14px;
            }
            .top-row .field-wrap label{
                font-size: 16px;
            }
        }
    </style>

        <h1 class="title-register">Đăng ký tại đây</h1>
        <form action="{{url('post-sign-up')}}" method="post">
            @csrf
            <div class="top-row">
                <div class="field-wrap">
                    <label>Họ và tên <span class="req">*</span></label>
                    <input type="text" required autocomplete="off" style="display:block;width:100%;height:100%;" name="inputFullname"/>
                </div>

                <div class="field-wrap">
                    <label>Tên tài khoản<span class="req">*</span></label>
                    <input type="text" required autocomplete="off" style="display:block;width:100%;height:100%;" name="inputUsername"/>
                    <small class="text-danger">{{ $errors->first('inputUsername') }}</small>
                </div>

                <div class="field-wrap">
                    <label>Địa chỉ email<span class="req">*</span></label>
                    <input type="email" required autocomplete="off" style="display:block;width:100%;height:100%;" name="inputEmail"/>
                </div>

                <div class="field-wrap">
                    <label>Điện thoại<span class="req">*</span></label>
                    <input type="text" required autocomplete="off" style="display:block;width:100%;height:100%;" name="inputPhone"/>
                </div>

                <div class="field-wrap">
                    <label> Mật khẩu<span class="req">*</span></label>
                    <input type="password" required autocomplete="off" style="display:block;width:100%;height:100%;" name="inputPassword" id="password"/>
                </div>
                <div class="field-wrap">
                    <label>Xác nhận mật khẩu<span class="req">*</span></label>
                    <input type="password" required autocomplete="off" style="display:block;width:100%;height:100%;" name="inputPasswordComfirm" id="confirm_password"/>
                </div>
            </div>
            <button type="submit" class="button button-block">Đăng ký</button>
        </form>
      </div>
    </div>
    <!-- tab-content -->
</div> <!-- /form -->

<style>
  *, *:before, *:after {
    box-sizing: border-box;
  }

  a {
    text-decoration:none;
    color:$main;
    transition:.5s ease;
    &:hover {
      color:$main-dark;
    }
  }

  .form-register {
    background:rgba($form-bg,.9);
    padding: 40px;
    max-width:600px;
    margin:40px auto;
    border-radius:$br;
    box-shadow:0 4px 10px 4px rgba($form-bg,.3);
  }

  .tab-group {
    list-style:none;
    padding:0;
    margin:0 0 40px 0;
    &:after {
      content: "";
      display: table;
      clear: both;
    }
    li a {
      display:block;
      text-decoration:none;
      padding:15px;
      background:rgba($gray-light,.25);
      color:$gray-light;
      font-size:20px;
      float:left;
      width:50%;
      text-align:center;
      cursor:pointer;
      transition:.5s ease;
      &:hover {
        background:$main-dark;
        color:$white;
      }
    }
    .active a {
      background:$main;
      color:$white;
    }
  }

  .tab-content > div:last-child {
    display:none;
  }


  h1 {
    text-align:center;
    color:$white;
    font-weight:$thin;
    margin:0 0 40px;
  }

  label {
    position:absolute;
    transform:translateY(6px);
    left:13px;
    color:rgba($white,.5);
    transition:all 0.25s ease;
    -webkit-backface-visibility: hidden;
    pointer-events: none;
    font-size:22px;
    .req {
      margin:2px;
      color:$main;
    }
  }

  label.active {
    transform:translateY(50px);
    left:2px;
    font-size:14px;
    .req {
      opacity:0;
    }
  }

  label.highlight {
    color:$white;
  }

  textarea {
    font-size:22px;
    padding:5px 10px;
    background:none;
    background-image:none;
    border:1px solid $gray-light;
    color:$white;
    border-radius:0;
    transition:border-color .25s ease, box-shadow .25s ease;
    focus {
      outline:0;
      border-color:$main;
    }
  }

  textarea {
    border:2px solid $gray-light;
    resize: vertical;
  }

  .field-wrap {
    position:relative;
    margin-bottom:40px;
  }

  .top-row {
    &:after {
      content: "";
      display: table;
      clear: both;
    }

    > div {
      float:left;
      width:48%;
      margin-right:4%;
      &:last-child {
        margin:0;
      }
    }
  }

  .button {
    border:0;
    outline:none;
    border-radius:0;
    padding:15px 0;
    font-size:2rem;
    font-weight:$bold;
    text-transform:uppercase;
    letter-spacing:.1em;
    background:$main;
    color:$white;
    transition:all.5s ease;
    -webkit-appearance: none;
    &:hover, &:focus {
      background:$main-dark;
    }
  }

  .button-block {
    display:block;
    width:100%;
  }

  .forgot {
    margin-top:-20px;
    text-align:right;
  }
</style>

<script>

    var password = document.getElementById("password")
        , confirm_password = document.getElementById("confirm_password");

    function validatePassword(){
        if(password.value != confirm_password.value) {
            confirm_password.setCustomValidity("Mật khẩu không khớp. Vui lòng nhập lại!");
        } else {
            confirm_password.setCustomValidity('');
        }
    }

    password.onchange = validatePassword;
    confirm_password.onkeyup = validatePassword;


    $('.form-register').find('input, textarea').on('keyup blur focus', function (e) {

    var $this = $(this),
        label = $this.prev('label');

        if (e.type === 'keyup') {
              if ($this.val() === '') {
            label.removeClass('active highlight');
          } else {
            label.addClass('active highlight');
          }
      } else if (e.type === 'blur') {
          if( $this.val() === '' ) {
              label.removeClass('active highlight');
              } else {
              label.removeClass('highlight');
              }
      } else if (e.type === 'focus') {

        if( $this.val() === '' ) {
              label.removeClass('highlight');
              }
        else if( $this.val() !== '' ) {
              label.addClass('highlight');
              }
      }

  });

  $('.tab a').on('click', function (e) {

    e.preventDefault();

    $(this).parent().addClass('active');
    $(this).parent().siblings().removeClass('active');

    target = $(this).attr('href');

    $('.tab-content > div').not(target).hide();

    $(target).fadeIn(600);

  });
</script>

@endsection
