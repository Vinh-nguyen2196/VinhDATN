 @extends('master')
 @section('content')

        <div class="row">
            <ol class="breadcrumb">
                <li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
                <li class="active">Thông báo yêu cầu đổi</li>
            </ol>
        </div><!--/.row-->
        
        <div class="row">
            <div class="col-lg-12">
                
            </div>
        </div><!--/.row-->
        <div id="toolbar" class="btn-group">
        
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <table class="table table-dark">
                        <thead>
                          <tr>
                            <th scope="col">STT</th>
                            <th scope="col">Người đổi</th>
                            <th scope="col">Địa chỉ</th>
                            <th scope="col">Sản phẩm rao</th>
                            <th scope="col">Sản phẩm đổi</th>
                            <th scope="col">Giá trị ước lượng(VNĐ)</th>
                            <th scope="col">Option</th>

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
                              <td>{{ $noti->product_convert->unit_price}}</td>
                              @endif
                              <td> <a href="chi-tiet-san-pham/{{$noti->product_convert->id}}" class="btn btn-success">
                                        <i class="glyphicon glyphicon-plus"></i> xem chi tiết
                                    </a>
                                    <a href="dele-notice/{{$noti->id}}" class="btn btn-danger"><i class="glyphicon glyphicon-remove"></i>Từ chối</a>
                                </td>
                            </tr>
                           @endforeach
                           @else
                          
                           {!!'<h3>bạn không có sản phẩm nào</h3>'!!}
                           @endif

                          </tbody>

                        </table>
<!-- {{$notifyOfUser->links()}} -->

                    </div>

                    <div class="panel-footer">
                       
                    </div>
                </div>
            </div>
        </div><!--/.row-->  
  <!-- main -->
 @endsection