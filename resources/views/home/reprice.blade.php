@extends('home.master.master-home')
@section('title','Trang cá nhân')
@section('content')
<div class="row" style="margin-top: 100px;">

    <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                       <h1 class="page-header" style="text-align: center;">Danh sách các khách hàng trả giá</h1>
                    <table class="table table-light">
                            <thead>
                              <tr>
                                <th scope="col">STT</th>
                                <th scope="col">Người trả giá</th>
                                <th scope="col">Sản Phẩm</th>
                                <th scope="col">Giá trả(VNĐ)</th>
                                <th scope="col">Ngày đăng tải</th>
                                <th scope="col">Option</th>

                              </tr>
                            </thead>
                            <tbody>
                              @if($reprice)
                              @foreach($reprice as $repri)
                              <tr>
                                <th scope="row">{{ $repri->id }}</th>
                                <td>{{ $repri->user_reprice->full_name }}</td>
                                <td>{{ $repri->product_post->name}}</td>
                                 <td>{{ number_format($repri->price,0,"",".")}}</td>
                                <td>{{ $repri->created_at}}</td>
                               
                                <td> <a href="chi-tiet-san-pham/{{$repri->id_product_post}}" class="btn btn-success">
                                          <i class="glyphicon glyphicon-plus"></i> xem chi tiết
                                      </a>
                                      <a onclick="return del()" href="#" class="btn btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i> Xóa</a>
                                      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myid{{ $repri->id }}"><i class="fa fa-thumbs-o-up"></i>
                                        tạo lịch hẹn
                                     </button>

                                     <div class="modal fade" id="myid{{ $repri->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content {{ $repri->id }}">
                                              <div class="modal-header"style="padding-top: 56px;" >
                                                <h5 class="modal-title" id="exampleModalLabel" >Lịch hẹn</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                  <span aria-hidden="true">&times;</span>
                                              </button>
                                            </div>
                                            <form action="{{ route('send',['id_product_notify'=>$repri->id_product_post,'id_product_doi'=> $repri->id_product_post,'id_nhan'=>$repri->user_reprice->id]) }}" class="form{{$repri->id}}" name="myform{{ $repri->id }}" method="get">
                                              <div class="modal-body schedule">
                
                
                                                    <div class="row">
                                                        <div class="col">
                                                          <input type="number" name="hour" class="form-control" placeholder="Giờ...">
                                                          </div>
                                                          <div class="col">
                                                              <input type="date" name="date" class="form-control" >
                                                          </div>
                                                    </div>
                                                    <div class="location" style="margin-top: 5px;">
                                                        <input type="text" name="address" class="form-control" placeholder="Địa điểm...">
                                                    </div>
                                                    <div class="phone" style="margin-top: 5px;">
                                                        <input type="number" name="phone" class="form-control" placeholder="Số điện thoại...">
                                                    </div>
                                            </div>
                                            <div class="modal-footer">
                
                                                <button class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                                                <button type="submit" class="btn btn-primary">Gửi</button>
                                            </div>
                                            </form>
                                          </div>
                                        </div>
                                    </div>
                                  </td>
                              </tr>
                             @endforeach
                          
                             

                            </tbody>

                          </table>
                          {{ $reprice->links() }}
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