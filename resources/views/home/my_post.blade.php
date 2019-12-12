@extends('home.master.master-home')
@section('title','Trang cá nhân')
@section('content')
<div class="row" style="margin-top: 100px;">

    <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                       <h1 class="page-header" style="text-align: center;">Danh sách các bài đăng</h1>
                    <table class="table table-light">
                            <thead>
                              <tr>
                                <th scope="col">STT</th>
                                <th scope="col">Tên sản phẩm</th>
                                <th scope="col">trạng thái</th>
                                <th scope="col">Giá trị ước lượng(VNĐ)</th>
                                <th scope="col">Ngày đăng tải</th>
                                <th scope="col">Option</th>

                              </tr>
                            </thead>
                            <tbody>
                              @if($my_prd)
                              @foreach($my_prd as $prd)
                              <tr>
                                <th scope="row">{{ $prd->id }}</th>
                                <td>{{ $prd->name }}</td>
                                <td>{{ $prd->state}}</td>
                                 <td>{{ $prd->unit_price}}</td>
                                <td>{{ $prd->created_at}}</td>
                               
                                <td> <a href="chi-tiet-san-pham/{{$prd->id}}" class="btn btn-success">
                                          <i class="glyphicon glyphicon-plus"></i> xem chi tiết
                                      </a>
                                      <a href="update/{{ $prd->id }}" class="btn btn-secondary"><i class="fa fa-wrench" aria-hidden="true"></i> Chỉnh sửa</a>
                                      <a onclick="return del()" href="home/product/delete/{{ $prd->id }}" class="btn btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i> Xóa</a>
                                  </td>
                              </tr>
                             @endforeach
                          
                             

                            </tbody>

                          </table>
                          {{ $my_prd->links() }}
                          @endif
                    </div>
                </div>
            </div>
        </div>

@endsection

@section('script')
@parent
  <script>
function del(){
       return confirm('bạn muốn xóa bài viết này không?');
     }
   </script>
@endsection