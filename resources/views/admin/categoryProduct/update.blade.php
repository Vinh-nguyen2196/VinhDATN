@extends('admin.admin')
@section('noi-dung')
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
                <li><a href="">Quản lý danh mục</a></li>
                <li class="active">Cập nhật danh mục</li>
            </ol>
        </div><!--/.row-->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Cập nhật danh mục </h1>
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
                            <form role="form" method="post" action="{{ route('categories.edit', $categoryProduct->id) }}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label>Tên danh mục </label>
                                    <input name="name" required type="text" class="form-control" value="{{ $categoryProduct->name }}">
                                </div>
                                <div class="form-group">
                                    <label>Mô tả </label>
                                    <input name="description"  required type="text" class="form-control" value="{{ $categoryProduct->description }}">
                                </div>
                                <div class="form-group">
                                    <label>Hình ảnh  </label>
                                    <input type="file" name="image"  onchange="loadFile(event)" accept="image/*">
                                    <img id="img">
                                </div>

                                <button type="submit" class="btn btn-success">Cập nhật</button>
                                <button type="reset" class="btn btn-default">Làm mới</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div><!-- /.col-->
        </div><!-- /.row -->

    </div>	<!--/.main-->
    <script>
        let loadFile = function (event) {
            let reader = new FileReader();
            reader.onload = function () {
                let output = document.getElementById('img');
                output.src = reader.result;
            };
            reader.readAsDataURL(event.target.files[0]);
        };
    </script>
@endsection
