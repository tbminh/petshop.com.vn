    @extends('layout.layout_admin')
    @section('title', 'Trang quản lý slider')


    @section('breadcrumb')
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6"></div>
                    <div class="col-sm-6 text-right">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{url('page-admin')}}">Trang chủ</a></li>
                            <li class="breadcrumb-item active">Quản lý slider</li>
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

                    {{--       Hiển thị dòng thông báo đã thêm thành công   --}}
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
                                QUẢN LÝ SLIDER
                            </h3>
                            <div class="card-tools">
                                <a class="btn btn-primary btn-sm" href="#" role="button" data-toggle="modal" data-target="#modelId">
                                    <i class="fa fa-plus-circle"></i> Thêm mới
                                </a>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-1">
                            <table class="table">
                                    <th>STT</th>
                                    <th>Tên sản phẩm</th>
                                    <th>Tiêu đề</th>
                                    <th>Nội dung</th>
                                    <th>Hình ảnh</th>
                                    <th scope="col" colspan="2">Tùy chọn</th>
                                </tr>
                                </thead>
                                <tbody>

                                @forelse($show_sliders as $key => $data)

                                <tr>
                                    <td> {{ ++$key }}</td>

                                    <td>
                                        @php($get_products = DB::table('products')->where('id',$data->product_id)->get())
                                        @foreach($get_products as $get_product)
                                            {{ $get_product->product_name }}
                                        @endforeach
                                    </td>

                                    <td>{{$data->slider_title}}</td>
                                    <td>{{$data->slider_content}}</td>

                                    <td>
                                        <img src="{{ url('public/upload_images/'.$data->slider_image) }}"
                                             class="img-circle elevation-2" alt="Product Image" width="30px" height="30px">
                                    </td>

                                    <td>
                                        <a class="btn btn-danger btn-xs" href="{{url('delete-slider/'.$data->id) }}" role="button" onclick="return confirm('Bạn có chắc muốn xóa không?');">
                                            <i class="fa fa-trash"></i> Xóa
                                        </a>
                                    </td>

                                    <td>
                                        <a class="btn btn-primary btn-xs" href="{{ url('edit-product') }}" role="button">
                                            <i class="fas fa-edit"></i> Đổi
                                        </a>
                                    </td>


                                </tr>
                                @empty
                                    <tr>
                                        <td>
                                        <td colspan="5">
                                            <b class="text-danger">Không có dữ liệu </b>
                                        </td>
                                        </td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </section>
                <!-- /.Left col -->
            </div>
            <!-- /.row (main row) -->

        </section>


        <!-- Modal -->
        <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <form action="{{ url('post-slider') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">THÊM SLIDER </h5>
                        </div>

                        <div class="form-group">
                            <label for="">Tên sản phẩm</label>
                            <select name="inputProductID" class="form-control">
                                <option value=""> --Chọn--</option>
                                @php($get_products = DB::table('products')->get())
                                @foreach($get_products as $value)
                                    <option value="{{ $value->id }}">
                                        {{$value->product_name}}
                                    </option>
                                @endforeach
                            </select>
                        </div>


                            <div class="form-group">
                                <label for="">Tiêu đề</label>
                                <input type="text" name="inputTitle" class="form-control" placeholder="Nhập tiêu đề">
                            </div>



                            <div class="form-group">
                                <label for="">Hình ảnh</label>
                                <input type="file" class="form-control-file" id="imgInp" name="inputFileImage">
                                <img id="blah" src="#" style="max-width:100%;height:50px;border-radius:5px;"/>
                            </div>

                            <div class="form-group">
                                <label for="">Nội dung</label>
                                <textarea class="form-control" name="inputContent" rows="6" placeholder="Nhập nội dung sản phẩm"></textarea>
                            </div>

                            <div class="form-group ">
                                <div class="col-12 text-right">
                                    <button type="submit" class="btn btn-primary btn-sm">Thêm</button>
                                </div>
                            </div>

                        </div>
                         </form>
                    </div>
            </div>



        <script>
            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('#blah').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(input.files[0]); // convert to base64 string
                }
            }
            $("#imgInp").change(function() {
                readURL(this);
            });
        </script>

    @endsection

