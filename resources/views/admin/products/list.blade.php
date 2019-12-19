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
                <li class="active">Danh sách bài viết</li>
            </ol>
        </div><!--/.row-->

        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Danh sách bài viết</h1>
            </div>
        </div><!--/.row-->
        <div id="toolbar" class="btn-group">
            <a href="{{route('products.create')}}" class="btn btn-success">
                <i class="glyphicon glyphicon-plus"></i> Thêm bài viết
            </a>
        </div>
        <div class="row">
{{--            <div class="col-12">--}}
{{--                @if(\Illuminate\Support\Facades\Session::has('success'))--}}
{{--                    <div class="alert alert-success m-2">--}}
{{--                        <span class="">{{ \Illuminate\Support\Facades\Session::get('success') }}</span>--}}
{{--                    </div>--}}
{{--                @endif--}}
{{--            </div>--}}
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <table id="products-list" data-toolbar="#toolbar" data-toggle="table" class="p-2">
                            <thead>
                            <tr>
                                <th data-field="id" data-sortable="true">ID</th>
                                <th data-field="name" data-sortable="true">Tên</th>
                                <th data-field="user" data-sortable="true">Người đăng</th>
                                <th>Thể loại</th>
                                <th>Đơn giá</th>
                                <th>Trạng thái</th>
                                <th>Giá khuyến mại</th>
                                <th>Ảnh</th>
                                <th>Đơn vị</th>
                                <th>Mới</th>
                                <th>Chức năng</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($products as $key=> $product)
                                <tr>
                                    <td style="">{{ ++$key }}</td>
                                    <td style="">
                                        {{ $product->name }}
                                    </td>
                                    <td>
                                        {{ $product->user->full_name }}
                                    </td>
                                    <td style="">
                                        {{ $product->product_type->name }}
                                    </td>
                                    <td>
                                        {{$product->unit_price}}
                                    </td>
                                    <td>
                                        @if($product->state)
                                            {{$product->state}}
                                        @else
                                            <span>Không có dữ liệu</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($product->promotion_price)
                                            {{$product->promotion_price}}
                                        @else
                                            <span>Không có dữ liệu</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($product->image)
                                            <img width="130" height="180"
                                                 src="{{asset('storage/' . $product->image )}}"/>
                                        @else
                                            <span>Không có dữ liệu</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($product->unit)
                                            {{$product->unit}}
                                        @else
                                            <span>Không có dữ liệu</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($product->new)
                                            <span>Sản phẩm mới</span>
                                        @else
                                            <span>Sản phẩm cũ</span>
                                        @endif
                                    </td>
                                    <td class="form-group row">
                                        <a href="{{ route('products.update', $product->id) }}" class="btn btn-primary"><i class="glyphicon glyphicon-pencil"></i></a>
                                        <a href="{{ route('products.destroy', $product->id) }}" class="btn btn-danger" onclick="return confirm('This will delete all user data! You definitely want to delete?')"><i class="glyphicon glyphicon-remove"></i></a>
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
        $(document).ready(function () {
            $('#products-list').DataTable();
        });
    </script>
@endsection

