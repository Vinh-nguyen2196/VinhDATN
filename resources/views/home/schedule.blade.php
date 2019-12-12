@extends('home.master.master-home')
@section('title','Trang cá nhân')
@section('content')
<div class="row" style="margin-top: 100px;">
    <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <h1 class="page-header" style="text-align: center;">Danh sách các lịch gặp</h1>
                    <table class="table table-light">
                        <thead>
                          <tr>
                            <th style="height: 25px;" scope="col">STT</th>
                            <th style="height: 25px;" scope="col">Người Hẹn</th>
                            <th style="height: 25px;" scope="col">Khách hàng</th>
                            <th style="height: 25px;" scope="col">Địa chỉ</th>
                            <th style="height: 25px;" scope="col">Giờ(h)</th>
                            <th style="height: 25px;" scope="col">Năm/tháng/ngày</th>
                            <th style="height: 25px;" scope="col">Số điện thoại liên hệ</th>
                            <th style="height: 25px;" scope="col">Option</th>

                          </tr>
                        </thead>
                          <tbody>
                      
                              @if($my_schedule)
                    @foreach($my_schedule as $schedu)
                    <tr>
                      <th scope="row">{{ $schedu->id }}</th>
                      <td>{{ $schedu->user_shedule_send->full_name }}</td>
                      <td>{{ $schedu->user_shedule_receive->full_name }}</td>
                      <td>{{ $schedu->address}}</td>
                      <td>{{ $schedu->hour}}</td>
                      <td>{{ $schedu->time}}</td>
                      <td>{{ $schedu->phone}}</td>
                      <td> 
                      
                        <a href="chi-tiet-san-pham/{{$schedu->id_prd_doi}}" class="btn btn-success">
                        <i class="glyphicon glyphicon-plus"></i> xem bài đăng
                    </a>
                        
                   @if($schedu->id_user_nhan==Auth::user()->id)
                   <button disabled="disabled" href="home/delete/{{$schedu->id}}" class="btn btn-danger"><i class="glyphicon glyphicon-remove"></i> Đã gặp</button>
                   @else
                    <a onclick="return del()" href="home/delete/{{$schedu->id}}" class="btn btn-danger"><i class="glyphicon glyphicon-remove"></i> Đã gặp</a>
                    @endif
                  @endforeach
                
                          
                       

                          </tbody>

                        </table>
                        {{ $my_schedule->links() }}
                    </div>
                      @endif
       
                </div>
            </div>
        </div>
        @section('script')
        @parent
         <script>
     function del(){
       return confirm('xác nhận cuộc hẹn đã gặp?');
     }
   </script>
        @endsection

@endsection

