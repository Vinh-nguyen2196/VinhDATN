@extends('master.master')

@section('title')
sửa thành viên
@endsection

@section('content')
<article class="content dashboard-page">
                    <div class="col-md-12">
                            @if(session('thongbao'))
                            <div>
                                <div class="alert alert-success" role="alert">
                                  <h4 class="alert-heading">Success</h4>
                                 
                                </div>
                            </div>
                            @endif
                            <div class="card card-block sameheight-item" style="height: 720px;">
                                <div class="title-block">
                                    <h3 class="title"> Sửa Thành Viên : {{$user->full}} </h3>
                                    <hr>
                                </div>
                                <form method="POST">@csrf
                                    <div class="form-group">
                                        <label class="control-label">Họ Và Tên</label>
                                    <input name="full" type="text" class="form-control underlined" value="{{$user->full}}">
                                    {{showError($errors,'full')}}
                                 </div>
                                    <div class="form-group">
                                        <label  class="control-label">Số điện thoại</label>
                                        <input name="phone" type="text" class="form-control underlined" value="{{$user->phone}}">
                                        {{showError($errors,'phone')}} </div>
                                    <div class="form-group">
                                        <label class="control-label">Địa chỉ</label>
                                        <input name="address"  type="text" class="form-control underlined" value="{{$user->address}}"> 
                                        {{showError($errors,'address')}}</div>
                                    <div class="form-group">
                                        <label class="control-label">Số CMT</label>
                                        <input name="id_number" type="text" class="form-control underlined" value="{{$user->id_number}}">
                                        {{showError($errors,'id_number')}} </div>                                               
                                  <div align='right'>
                                        <button type="submit" class="btn btn-success">Sửa</button>
                                        <button class="btn btn-primary" type="reset" >Nhập lại</button>
                                  </div>
                                </form>
                            </div>
                        </div>

            </article>
@endsection

