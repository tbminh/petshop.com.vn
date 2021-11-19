@extends('admin.profile_admin.profile_admin')

@section('content-change')

    <div class="col-md-9">

        @if(session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
            </div>
        @endif

        <div class="card">
            <div class="card-header p-2">
                <ul class="nav nav-pills">
                    <li class="nav-item"><a class="nav-link active" href="#">Thông tin cập nhật</a></li>
                </ul>
            </div>
            <div class="card-body">
                <form action="{{ url('update-infor-user/'.$infor_user->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="">Họ và tên:</label>
                        <input type="text" name="inputFullname" class="form-control" placeholder="Nhập họ và tên" value="{{ $infor_user->full_name }}" disabled>
                    </div>

                    <div class="form-group">
                        <label for="">Tên tài khoản:</label>
                        <input type="text" name="inputUsername" class="form-control" placeholder="Nhập tên tài khoản" value="{{ $infor_user->username }}" disabled>
                    </div>


                    <div class="form-group">
                        <label for="">Giới tính</label><br>
                        @if ($infor_user->sex == 'Nam')
                            <div class="form-check-inline">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="inputSex" checked value="Nam">Nam
                                </label>
                            </div>

                            <div class="form-check-inline">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="inputSex" value="Nữ">Nữ
                                </label>
                            </div>

                            <div class="form-check-inline">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="inputSex" value="Khác">Khác
                                </label>
                            </div>

                        @elseif($infor_user->sex == 'Nữ')
                            <div class="form-check-inline">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="inputSex" value="Nam">Nam
                                </label>
                            </div>

                            <div class="form-check-inline">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="inputSex" checked value="Nữ">Nữ
                                </label>
                            </div>

                            <div class="form-check-inline">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="inputSex" value="Khác">Khác
                                </label>
                            </div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="birthday">Ngày sinh:</label>
                        <input type="date" class="form-control" name="inputBirthday" value="{{ $infor_user->birthday }}">
                    </div>

                    <div class="form-group">
                        <label for="birthday">Email:</label>
                        <input type="email" class="form-control" name="inputEmail" value="{{ $infor_user->email }}">
                    </div>


                    <div class="form-group ">
                        <label for="inputPhone"> Điện thoại </label>
                        <input type="number" class="form-control" name="inputPhone" placeholder="Nhập số điện thoại" value="{{ $infor_user->phone }}">
                    </div>


                    <div class="form-group">
                        <label for="inputSex">Địa chỉ</label>
                        <input type="text" class="form-control" name="inputAddress" placeholder="Nhập vào địa chỉ" value="{{ $infor_user->adress }}">
                    </div>

                    <div class="form-group">
                        <label for="inputSex">Ảnh đại diện</label><br>
                        <input type="file" name="inputFileImage">
                    </div>

                    <div class="form-group text-right">
                        <button type="submit" class="btn btn-danger">Cập nhật</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- /.card-body -->
    </div>

@endsection


