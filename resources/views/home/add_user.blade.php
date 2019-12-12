@extends('master.master')
@section('title','thêm thành viên')
@section('content')
<article class="content dashboard-page">
                    <div class="col-md-12">
                           
                            <div class="card card-block sameheight-item" style="height: 720px;">
                                <div class="title-block">
                                    <h3 class="title"> THÊM THÀNH VIÊN </h3>
                                    <hr>
                                </div>
                             
                                <form method="POST">@csrf
                                    <div class="form-group">
                                        <label class="control-label">Họ Và Tên</label>
                                        <input name="full" type="text" value="{{old('full')}}" class="form-control underlined"> </div>
                                        {{showError($errors,'full')}}
                                    <div class="form-group">
                                        <label class="control-label">Số điện thoại</label>
                                        <input name="phone" type="text" value="{{old('phone')}}" class="form-control underlined"> </div>
                                        {{showError($errors,'phone')}}
                                    <div class="form-group">
                                        <label class="control-label">Địa chỉ</label>
                                        <input name="address" type="text" value="{{old('address')}}" class="form-control underlined"> </div>
                                        {{showError($errors,'address')}}
                                    <div class="form-group">
                                        <label class="control-label">Số CMT</label>
                                        <input name="id_number" type="text" value="{{old('id_number')}}" class="form-control underlined"> </div>  
                                        {{showError($errors,'id_number')}}          
                                    <div align='right'>
                                            <button type="submit" class="btn btn-success">Thêm</button>
                                            <button class="btn btn-primary" type="reset" >Nhập lại</button>
                                    </div>
                                </form>
                            </div>
                        </div>

            </article>
@endsection