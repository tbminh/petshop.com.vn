@extends('layout.layout_admin')
@section('title','Đổi sản phẩm')

@section('link_css')

@endsection

@section('breadcrumb')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('page-admin') }}">Trang chủ</a></li>
                        <li class="breadcrumb-item"><a href="{{ url('page-list-product') }}">Sản phẩm</a></li>
                        <li class="breadcrumb-item active">Thêm sản phẩm</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
@endsection


@section('content')
    <section class="content">
        <div class="container-fluid">
            <!-- Main row -->
            <div class="row">
                <section class="col-lg-6 offset-lg-3">
                    <!-- TO DO List -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="ion ion-clipboard mr-1"></i>
                                CHỈNH SỬA SẢN PHẨM
                            </h3>
                        </div>

                        <!-- /.card-header -->
                        <div class="card-body p-2">
                            <form action="{{ url('update-product/'.$infor_product->id) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="form-group">
                                    <label for="">Tên sản phẩm:</label>
                                    <input type="text" name="inputName" class="form-control" placeholder="Nhập tên sản phẩm..."
                                    value="{{ $infor_product->product_name }}">
                                </div>

                                <div class="form-group">
                                    <label for="">Hình ảnh: </label>
                                    <input type='file' name="inputFileImage">
                                    <!--TRuyền ảnh vào thẻ img-->
                                    <img id="blah" src="{{ url('public/upload_images/'.$infor_product->product_img)}}"
                                         style="max-width:100%;height:50px;border-radius:5px;"/>
                                </div>


                                <div class="form-group col-md-10">
                                    <label for="">Giá sản phẩm:</label>
                                    <input type="number" name="inputPrice" class="form-control" placeholder="Nhập giá sản phẩm..."
                                    value="{{ ($infor_product->product_price) }}">
                                    <!--TRuyền giá sản phẩm vào value-->
                                </div>

                                <div class="form-group col-md-10">
                                    <label for="">Số lượng:</label>
                                    <input type="number" name="inputQuality" class="form-control" placeholder="Nhập số lượng..."
                                     value="{{ $infor_product->product_quality }}">
                                </div>

                                <div class="form-group col-md-10">
                                    <label for="">Đơn vị tính</label>
                                    <input type="text" name="inputUnit" class="form-control" placeholder="Nhập đơn vị tính..."
                                    value="{{ $infor_product->product_unitprice }}">
                                </div>


                                <div class="form-group">
                                    <label for="">Mô tả</label>
                                    <textarea class="form-control" name="inputDecribe" id="" rows="6" >
                                        {{ $infor_product->product_decribe}}
                                    </textarea>
                                </div>

                                <div class="form-group row">
                                    <div class="col-12 text-right">
                                        <button type="submit" class="btn btn-primary btn-sm">Thêm</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </section>

            </div>
            <!-- /.row (main row) -->
        </div>
        <!-- /.container-fluid -->
    </section>

    <script>
        CKEDITOR.replace('inputDescription');
    </script>

@endsection
