@extends('layout.layout')
@section('title','Chi tiết sản phẩm')



@section('content')

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->

    <style>
        .post-comments {
            padding-bottom: 9px;
            margin: 5px 0 5px;
        }

        .comments-nav {
            border-bottom: 1px solid #eee;
            margin-bottom: 5px;
        }

        .post-comments .comment-meta {
            border-bottom: 1px solid #eee;
            margin-bottom: 5px;
        }

        .post-comments .media {
            border-left: 1px dotted #000;
            border-bottom: 1px dotted #000;
            margin-bottom: 5px;
            padding-left: 10px;
        }

        .post-comments .media-heading {
            font-size: 12px;
            color: grey;
        }

        .post-comments .comment-meta a {
            font-size: 12px;
            color: grey;
            font-weight: bolder;
            margin-right: 5px;
        }
    </style>

    <div class="single-product-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="single-sidebar">
                        <h2 class="sidebar-title">Tìm kiếm thú cưng</h2>
                        <form action="">
                            <input type="text" placeholder="Nhập thông tin tìm kiếm...">
                            <input type="submit" value="Search">
                        </form>
                    </div>
                </div>

                {{--Hiển thị thông tin chi tiết sản phẩm--}}
                <div class="col-md-8">
                    <div class="product-content-right">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="product-images">
                                    <div class="product-main-img">
                                        <img src="{{url('public/upload_images/'.$view_detail_product->product_img)}}" >
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="product-inner">
                                    <h2 class="product-name">{{ $view_detail_product->product_name }}</h2>
                                    <div class="product-inner-price">
                                        <ins> {{ number_format($view_detail_product->product_price) }} VND / {{ $view_detail_product-> product_unitprice }} </ins>
                                    </div>

                                    <form action="{{ url('add-to-cart/'.Auth::id().'/'.$view_detail_product->id) }}" class="cart" method="post">
                                        @csrf
                                        <div class="quantity">
                                            <input type="number" size="10" class="input-text qty text" value="1" name="quality" min="1" step="1">
                                        </div>
                                        @if(Auth::check())
                                            <button class="add_to_cart_button" type="submit">Thêm vào giỏ hàng</button>
                                        @else
                                            <button class="add_to_cart_button" type="button" onclick="myFunction()">Thêm vào giỏ hàng</button>
                                        @endif
                                    </form>

                                    <div class="product-inner-category">
                                        <p> Loại:
                                            @foreach($get_categories as $get_category)
                                                <a href="{{url('page-category/'.Str::slug($get_category->category_name).'/'.$get_category->id)}}">
                                                    {{ $get_category->category_name }}
                                                </a>
                                            @endforeach
                                        </p>
                                    </div>

                                    <div role="tabpanel">
                                        <ul class="product-tab" role="tablist">
                                            <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Mô tả</a></li>
                                            <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Nhà cung cấp</a></li>
                                        </ul>
                                        <div class="tab-content">
                                            <div role="tabpanel" class="tab-pane fade in active" id="home">
                                                <h2>Mô tả</h2>
                                                <p> {{ $view_detail_product->product_decribe }}</p>
                                            </div>

                                            <div role="tabpanel" class="tab-pane fade" id="profile">
                                                @php($get_product_suppliers = DB::table('product_suppliers')->where('product_id',$view_detail_product->id)->first())
                                                @php($get_suppliers = DB::table('suppliers')->where('id', $get_product_suppliers->supplier_id)->first())
                                                <p><b style="font-size: 20px">{{ $get_suppliers->supplier_name }}</b>  </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            {{--     Gởi bình luận--}}
                <div class="container">
                    <div class="post-comments">
                        <form action="{{ url('post-comment-user/'.Auth::id().'/'.$view_detail_product->id) }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="comment">Bình luận</label>
                                <textarea name="input_comment_content" class="form-control" rows="5" placeholder="Nhập bình luận..."></textarea>
                            </div>
                            <button type="submit" class="btn btn-default">Gửi</button>
                        </form>
                        <br>
            {{--Show thông tin bình luận--}}
                        @forelse($show_comments as $key => $data)
                            @php($get_user = DB::table('users')->where('id', $data->user_id)->first())
                            <div class="row">
                                <div class="media">
                                    <!-- first comment -->
                                    <div class="media-heading">
                                        <img src="{{ url('public/upload_images/'.$get_user->avatar) }}" alt="Image"
                                        style="width: 50px;height: 50px; border-radius: 50%;">
                                        &emsp;
                                        <span class="label label-info">{{ $get_user->full_name }}</span>
                                    </div>


                                    <div class="panel-collapse collapse in" id="collapseOne">
                                        <div class="media-body">
                                            <p>{{ $data->comment_content }}</p>
                                            <div class="comment-meta">
                                                <span>
                                                    <a class="" role="button" data-toggle="collapse" href="#replyCommentT{{ $key }}"
                                                    aria-expanded="false" aria-controls="collapseExample">Trả lời</a>
                                                </span>
                                                <div class="collapse" id="replyCommentT{{ $key }}">
                                                    <form action="{{ url('post-reply-comment/'.Auth::id().'/'.$data->id) }}" method="post">
                                                        @csrf
                                                        <div class="form-group">
                                                            <textarea name="input_reply_comment_content" class="form-control" rows="3" placeholder="Nhập trả lời bình luận..."></textarea>
                                                        </div>
                                                        <button type="submit" class="btn btn-default">Gửi</button>
                                                    </form>
                                                </div>
                                            </div>
                                            <!-- comment-meta -->

                                            @php($show_reply_comment = DB::table('reply_comments')->where('comment_id', $data->id)->get())
                                            @foreach($show_reply_comment as $key_reply => $data_reply)

                                            <div class="media">
                                                @php($get_user_reply = DB::table('users')->where('id', $data_reply->user_id)->first())
                                                <div class="media-heading">
                                                    <img src="{{ url('public/upload_images/'.$get_user_reply->avatar) }}" alt="Image"
                                                         style="width: 50px;height: 50px; border-radius: 50%;">
                                                    &emsp;
                                                    <span class="label label-info">{{ $get_user_reply->full_name }}</span>
                                                </div>
                                                <div class="panel-collapse collapse in" id="collapseTwo">
                                                    <div class="media-body">
                                                        <p>{{ $data_reply->reply_comment_content }}</p>
                                                    </div>
                                                </div>
                                                <!-- comments -->
                                            </div>

                                            @endforeach
                                        </div>
                                    </div>
                                    <!-- comments -->

                                </div>
                            </div>
                        @empty
                            <b class="text-danger">Không có bình luận</b>
                        @endforelse
                    </div>
                    <!-- post-comments -->
                </div>

            </div>
        </div>

        <a href="javascript:void(0);" class="likebtn" rel="2209835"><i class="icon-like"></i></a>

        <!-- Product Details Section End -->

        <script>
            $('.hero__categories__all').on('click', function(){
                $('.hero__categories ul').slideToggle(400);
            });
        </script>

        <script>
            var msg = '{{Session::get('alert')}}';
            var exist = '{{Session::has('alert')}}';
            if(exist){
                alert(msg);
            }
        </script>


        <script>
            $('[data-toggle="collapse"]').on('click', function() {
                var $this = $(this),
                    $parent = typeof $this.data('parent')!== 'undefined' ? $($this.data('parent')) : undefined;
                if($parent === undefined) { /* Just toggle my  */
                    $this.find('.glyphicon').toggleClass('glyphicon-plus glyphicon-minus');
                    return true;
                }

                /* Open element will be close if parent !== undefined */
                var currentIcon = $this.find('.glyphicon');
                currentIcon.toggleClass('glyphicon-plus glyphicon-minus');
                $parent.find('.glyphicon').not(currentIcon).removeClass('glyphicon-minus').addClass('glyphicon-plus');

            });
        </script>

@endsection

