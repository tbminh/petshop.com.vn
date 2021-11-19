@extends('layout.layout_admin')
@section('title', 'Trang danh sách sản phẩm')


@section('breadcrumb')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6"></div>
                <div class="col-sm-6 text-right">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{'page-admin'}}">Trang chủ</a></li>
                        <li class="breadcrumb-item active">Danh sách sản phẩm</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
@endsection


@section('content')
    <section class="content">
        <!-- Main row -->
        <div class="row">
            <!-- Left col -->
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
                            SẢN PHẨM
                        </h3>
                        <div class="card-tools">
                            <a class="btn btn-primary btn-sm" href="{{ url('add-product') }}" role="button">
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
                                <th>Loại sản phẩm</th>
                                <th>Nhà sản xuất</th>
                                <th>Tên sản phẩm</th>
                                <th>Số lượng</th>
                                <th>Giá bán</th>
                                <th>Hình ảnh</th>
                                <th>Mô tả</th>
                                <th>Đơn vị tính</th>
                                <th scope="col" colspan="3">Tùy chọn</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($show_products as $key => $data)
                            <tr>
                                <td> {{ ++$key }}</td>
                                <td>
                                    @php($get_categorys = DB::table('categories')->where('id',$data->category_id)->get())
                                    @foreach($get_categorys as $get_category)
                                        {{ $get_category->category_name }}
                                    @endforeach
                                </td>

                                <td>
                                    @php($get_product_suppliers = DB::table('product_suppliers')->where('product_id',$data->id)->first())
                                    @php($get_suppliers = DB::table('suppliers')->where('id', $get_product_suppliers->supplier_id)->first())
                                    {{ $get_suppliers->supplier_name }}
                                </td>

                                <td>{{$data->product_name}}</td>
                                <td>{{$data->product_quality}}</td>
                                <td>{{$data->product_price}}</td>
                                <td>
                                    <img src="{{ url('public/upload_images/'.$data->product_img) }}"
                                         class="img-circle elevation-2" alt="Product Image " width="30px" height="30px">
                                </td>
                                <td>{{$data->product_decribe}}</td>
                                <td>{{$data->product_unitprice}}</td>

                                <td>
                                    <a class="btn btn-danger btn-xs" href="{{url('delete-product/'.$data->id) }}" role="button" onclick="return confirm('Bạn có chắc muốn xóa không?');">
                                        <i class="fa fa-trash"></i> Xóa
                                    </a>
                                </td>

                                <td>
                                    <a class="btn btn-primary btn-xs" href="{{ url('edit-product/'.$data->id) }}" role="button">
                                        <i class="fas fa-edit"></i> Đổi
                                    </a>
                                </td>

                                <td>
                                    <a class="btn btn-success btn-xs" href="{{ url('see-product/'.$data->id) }}" role="button">
                                        <i class="fas fa-eye"></i> Xem
                                    </a>
                                </td>
                            </tr>

                            @empty
                                <tr>
                                    <td colspan="11">
                                        <b class="text-danger">Không có dữ liệu </b>
                                    </td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>

                        <ul class="pagination justify-content-xl-end" style="margin:20px 0">
                            {{ $show_products->links() }}
                        </ul>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </section>
            <!-- /.Left col -->
        </div>
        <!-- /.row (main row) -->

    </section>
    
@endsection

