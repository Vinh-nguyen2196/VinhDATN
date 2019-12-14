@extends('admin.admin')
@section('noi-dung')
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
                <li><a href="">Quản lý thành viên</a></li>
                <li class="active">Thêm thành viên</li>
            </ol>
        </div><!--/.row-->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Thêm thành viên</h1>
            </div>
        </div><!--/.row-->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="col-md-8">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>
                                                {{ $error }}
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <form role="form" method="post" action="{{route('users.store')}}">
                                @csrf
                                <div class="form-group">
                                    <label>Họ & Tên</label>
                                    <input name="full_name" required class="form-control" value="{{ old('full_name') }}">
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input name="email" required type="email" class="form-control" value="{{ old('email') }}">
                                </div>
                                <div class="form-group">
                                    <label>Phone</label>
                                    <input name="phone" required type="text" class="form-control" value="{{ old('phone') }}">
                                </div>
                                <div class="form-group">
                                    <label>Address</label>
                                    <input name="address" required type="text" class="form-control" value="{{ old('address') }}">
                                </div>
                                <div class="form-group">
                                    <label>Mật khẩu</label>
                                    <input name="password" required type="password"  class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Nhập lại mật khẩu</label>
                                    <input name="password_confirmation" required type="password"  class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Quyền</label>
                                    <select name="level" class="form-control">
                                        <option value="{{ \App\Http\Controllers\RoleConstant::ROLE_ADMIN }}">Admin</option>
                                        <option value="{{\App\Http\Controllers\RoleConstant::ROLE_USER}}">Member</option>
                                    </select>
                                </div>
                                <button name="sbm" type="submit" class="btn btn-success">Thêm mới</button>
                                <button type="reset" class="btn btn-default">Làm mới</button>
                        </form>
                    </div>
                    </div>
                </div>
            </div><!-- /.col-->
        </div><!-- /.row -->

    </div>	<!--/.main-->

@endsection
