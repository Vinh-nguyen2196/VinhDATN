@extends('admin.admin')
@section('noi-dung')
        
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Danh sách bài viết</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Danh sách bài viết</h1>
			</div>
		</div><!--/.row-->
		<div id="toolbar" class="btn-group">
            <a href="product-add.html" class="btn btn-success">
                <i class="glyphicon glyphicon-plus"></i> Thêm bài viết
            </a>
        </div>
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-body">
                        <table 
                            data-toolbar="#toolbar"
                            data-toggle="table">

						    <thead>
						    <tr>
						        <th data-field="id" data-sortable="true">ID</th>
						        <th data-field="name"  data-sortable="true">Tên sản phẩm</th>
                                <th data-field="price" data-sortable="true">Loại giao dịch</th>
                                <th>Ảnh sản phẩm</th>
                                <th>Người đăng</th>
                                <th>Danh mục</th>
                                <th>Hành động</th>
						    </tr>
                            </thead>
                            <tbody>
                                @foreach($product as $row)
                                    <tr>
                                    <td style="">{{$row->id}}</td>
                                        <td style="">{{$row->name}}</td>
                                        <td style="">{{$row->state}}</td>
                                        <td style="text-align: center"><img width="130" height="180" src="source/image/product/{{$row->image}}" /></td>
                                        <td>{{$row->user->full_name}}</td>
                                        <td>{{$row->product_type->name}}</td>
                                        <td class="form-group">
                                            <a href="product-edit.html" class="btn btn-primary"><i class="glyphicon glyphicon-pencil"></i></a>
                                            <a href="product-edit.html" class="btn btn-danger"><i class="glyphicon glyphicon-remove"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                                   
                                 </tbody>
                        </table>
                        
                    </div>
                    <div class="panel-footer">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination">
                                {{$product->links()}}
                            </ul>
                        </nav>
                    </div>
				</div>
			</div>
		</div><!--/.row-->	
	</div>	<!--/.main-->
    @endsection
