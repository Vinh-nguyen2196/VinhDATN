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
                <li><a href="">Quản lý bài viết</a></li>
                <li class="active">Sửa bài viết</li>
            </ol>
        </div><!--/.row-->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Sửa bài viết</h1>
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
                            <form role="form" method="post" action="{{route('products.edit', $product->id)}}"
                                  enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label>Tên sản phẩm</label>
                                    <input name="name" required class="form-control" value="{{ $product->name }}">
                                </div>
                                <div class="form-group">
                                    <label>Thể loại</label>
                                    <select name="type" class="form-control">
                                        @foreach($types as $type)
                                            <option
                                                @if($type->id === $product->id_type)
                                                    selected
                                                @endif
                                                value="{{$type->id}}">{{$type->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Mô tả</label>
                                    <textarea name="description" class="form-control" cols="30"
                                              rows="5">{{ $product->description }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label>Đơn giá</label>
                                    <input name="unit_price" required type="text" class="form-control"
                                           value="{{ $product->unit_price }}">
                                </div>
                                <div class="form-group">
                                    <label>Trạng thái</label>
                                    <input name="state" required type="text" class="form-control"
                                           value="{{ $product->state }}">
                                </div>
                                <div class="form-group">
                                    <label>Giảm giá</label>
                                    <input name="promotion_price" required type="text" class="form-control"
                                           value="{{ $product->promotion_price }}">
                                </div>
                                <div class="form-group">
                                    <label>Unit</label>
                                    <input name="unit" required type="text" class="form-control"
                                           value="{{ $product->unit }}">
                                </div>
                                <div class="form-group">
                                    <label>Ảnh</label>
                                    <input name="image" required type="file" class="form-control">
                                    <img src="{{asset('storage/' . $product->image)}}" style="max-width: 300px" class="mt-2" alt="">
                                </div>
                                <button name="sbm" type="submit" class="btn btn-success">Thêm mới</button>
                                <button type="reset" class="btn btn-default">Làm mới</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
