@extends('home.master.master-home')
@section('title','Trang cá nhân')
@section('content')
<div class="row" style="margin-top: 100px;">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-body">
                <h1 class="page-header" style="text-align: center;">Danh sách thông báo đổi</h1>
                <table class="table table-light">
                    <thead>
                      <tr>
                        <th style="height: 25px;" scope="col">STT</th>
                        <th style="height: 25px;" scope="col">Người đổi</th>
                        <th style="height: 25px;" scope="col">Địa chỉ</th>
                        <th style="height: 25px;" scope="col">Sản phẩm rao</th>
                        <th style="height: 25px;" scope="col">Sản phẩm đổi</th>
                        <th style="height: 25px;" scope="col">Giá trị ước lượng(VNĐ)</th>
                        <th style="height: 25px;" scope="col">Option</th>

                    </tr>
                </thead>
                <tbody>
                    @if($notifyOfUser)
                    @foreach($notifyOfUser as $noti)
                    <tr>
                      <th scope="row">{{ $noti->id }}</th>
                      <td>{{ $noti->user_send->full_name }}</td>
                      <td>{{ $noti->user_send->address}}</td>
                      <td>{{ $noti->product_send->name}}</td>
                      <td>{{ $noti->product_convert->name}}</td>
                      @if($noti->product_convert->unit_price==null)
                      <td>sản phẩm tặng</td>
                      @else
                      <td>{{ number_format($noti->product_convert->unit_price,0,"",".")}}</td>
                      @endif
                      <td> <a href="chi-tiet-san-pham/{{$noti->product_convert->id}}" class="btn btn-success">
                        <i class="glyphicon glyphicon-plus"></i> xem chi tiết
                    </a>
                    
                    <a href="dele-notice/{{$noti->id}}" class="btn btn-danger"><i class="glyphicon glyphicon-remove"></i>Từ chối</a>

                     
                  
                    

                   <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myid{{ $noti->id }}"><i class="fa fa-thumbs-o-up"></i>
                      tạo lịch hẹn
                   </button>
                  

                    <div class="modal fade" id="myid{{ $noti->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content {{ $noti->id }}">
                              <div class="modal-header"style="padding-top: 56px;" >
                                <h5 class="modal-title" id="exampleModalLabel" >Lịch hẹn</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <form action="{{ route('send',['id_product_notify'=>$noti->product_convert->id,'id_product_doi'=> $noti->product_send->id,'id_nhan'=>$noti->user_send->id]) }}" class="form{{$noti->id}}" name="myform{{ $noti->id }}" method="get">
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
{{ $notifyOfUser->links() }}
@endif
</div>








</div>
</div>
</div>


@endsection

