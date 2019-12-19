@extends('admin.admin')
@section('noi-dung')

    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="#">
                        <svg class="glyph stroked home">
                            <use xlink:href="#stroked-home"></use>
                        </svg>
                    </a></li>
                <li class="active">Quản lý bình luận</li>
            </ol>
        </div><!--/.row-->

        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Quản lý bình luận</h1>
            </div>
        </div><!--/.row-->
        <div id="toolbar" class="btn-group">

        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <table id="comments-list"
                               data-toolbar="#toolbar"
                               data-toggle="table">

                            <thead>
                            <tr>
                                <th data-field="id" data-sortable="true">ID</th>
                                <th>Người bình luận</th>
                                <th>Sản phẩm</th>
                                <th>Nội dung</th>
                                <th>Ngày bình luận</th>
                                <th>Hành động</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($comment as $row)
                                <tr>
                                    <td style="">{{$row->id}}</td>
                                    <td style="">{{$row->user_comment->full_name}}</td>
                                    <td style="">{{$row->prd->name}}</td>
                                    <td style=""><a
                                            href="{{route('chitietsanpham',$row->id_prd)}}">{{$row->content_cmt}}</a>
                                    </td>
                                    <td style="">{{$row->created_at}}</td>
                                    <td class="form-group">
                                        <a href="{{route('comments.delete',['id'=>$row->id])}}" class="btn btn-danger"
                                           onclick="return confirm('Ban co chac chan muon xoa hay khong?')"><i
                                                class="glyphicon glyphicon-remove"></i></a>
                                    </td>
                                </tr>

                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{--							<div class="panel-footer">--}}
                    {{--								<nav aria-label="Page navigation example">--}}
                    {{--									<ul class="pagination">--}}
                    {{--										<li class="page-item"><a class="page-link" href="#">&laquo;</a></li>--}}
                    {{--										<li class="page-item"><a class="page-link" href="#">1</a></li>--}}
                    {{--										<li class="page-item"><a class="page-link" href="#">2</a></li>--}}
                    {{--										<li class="page-item"><a class="page-link" href="#">3</a></li>--}}
                    {{--										<li class="page-item"><a class="page-link" href="#">&raquo;</a></li>--}}
                    {{--									</ul>--}}
                    {{--								</nav>--}}
                    {{--							</div>--}}
                </div>
            </div>
        </div><!--/.row-->
    </div>    <!--/.main-->
    @if(session('message'))


    @endif
    <script>
        $(document).ready(function () {
            $('#comments-list').DataTable();
        });
    </script>
@endsection
