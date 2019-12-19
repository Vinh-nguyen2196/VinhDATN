        @extends('admin.admin')
        @section('noi-dung')
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
                <li class="active">Danh sách thành viên</li>
            </ol>
        </div><!--/.row-->

        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Danh sách thành viên</h1>
            </div>
        </div><!--/.row-->
        <div id="toolbar" class="btn-group">
            <a href="{{ route('users.create') }}" class="btn btn-success">
                <i class="glyphicon glyphicon-plus"></i> Thêm thành viên
            </a>
        </div>
        <div class="row">

            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <table id="users-list" data-toolbar="#toolbar" data-toggle="table" class="p-2">
                            <thead>
                            <tr>
                                <th data-field="id" data-sortable="true">ID</th>
                                <th data-field="name"  data-sortable="true">Họ & Tên</th>
                                <th data-field="price" data-sortable="true">Email</th>
                                <th>Quyền</th>
                                <th>Hành động</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $key=> $user)
                                <tr>
                                    <td style="">{{ ++$key }}</td>
                                    <td style="">{{ $user->full_name }}</td>
                                    <td style="">{{ $user->email }}</td>
                                    <td>
                                        @if($user->level == \App\Http\Controllers\RoleConstant::ROLE_ADMIN)
                                        <span class="label label-danger">Admin</span>
                                        @endif
                                            @if($user->level == \App\Http\Controllers\RoleConstant::ROLE_USER)
                                                <span class="label label-success">Member</span>
                                            @endif
                                    </td>
                                    <td class="form-group">
                                        <a href="{{ route('users.update', $user->id) }}" class="btn btn-primary"><i class="glyphicon glyphicon-pencil"></i></a>
                                        <a href="{{ route('users.destroy', $user->id) }}" class="btn btn-danger" onclick="return confirm('This will delete all user data! You definitely want to delete?')"><i class="glyphicon glyphicon-remove"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div><!--/.row-->
    </div>  <!--/.main-->
            <script>
                $(document).ready(function() {
                    $('#users-list').DataTable();
                } );
            </script>
    @endsection

