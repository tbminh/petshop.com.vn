@extends('home.profile_user.layout_profile_user')
@section('title', 'Đổi mật khẩu')
@section('content-profile-col-9')

<div class="form-group col-md-10">
    <div class="tab-content">
        <div>
            <h1 style="text-align: center;"> Đổi mật khẩu</h1>

            <form action="/" method="post">

                <div class="field-wrap">
                    <label>
                        Mật khẩu cũ<span class="req">*</span>
                    </label>
                    <input type="password" required autocomplete="off" style=" display:block;width:100%;" placeholder="Nhập mật khẩu cũ"/>
                </div>

                <div class="field-wrap">
                    <label>
                        <br/> Mật khẩu mới<span class="req">*</span>
                    </label>
                    <input type="password"required autocomplete="off"  style=" display:block;width:100%;height:100%;" placeholder="Nhập mật khẩu mới"/>
                </div>

                <div class="field-wrap">
                    <label>
                        <br/> Xác nhận mật khẩu <span class="req">*</span>
                    </label>
                    <input type="password"required autocomplete="off"  style=" display:block;width:100%;height:100%;" placeholder="Xác nhận mật khẩu"/>
                </div>


                <br/>
                <div class="form-group row"  align="right">
                    <div class="offset-sm-2 col-sm-7">
                        <button type="submit" class="btn btn-danger">Xác nhận</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- tab-content -->
</div> <!-- /form -->



<script>
    $('.form').find('input, textarea').on('keyup blur focus', function (e) {

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
