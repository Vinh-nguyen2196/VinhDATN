@extends('master')
@section('content')
<div  class="inner-header">
    <div class="container">
        
    
   
    <!--/.row-->
    <div class="row">
        <div class="col-xs-12 col-md-12 col-lg-12">

            <div class="panel panel-primary">
                <div class="panel-heading" style="text-align: center;background-color: #285037">Thông tin</div>
                <div class="panel-body">
                    <div class="bootstrap-table">
                        <div class="table-responsive">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6" style="margin-left:280px">
                                        <div class="panel panel-blue">
                                            <div class="panel-heading dark-overlay">Thông tin nguời đăng tải</div>
                                            <div class="panel-body">
                                            <strong><span class="glyphicon glyphicon-user" aria-hidden="true"></span> : {{$user->full_name}}</strong> <br>
                                                <strong><span class="glyphicon glyphicon-phone" aria-hidden="true"></span> : {{$user->email}}</strong>
                                                <br>
                                                <strong><span class="glyphicon glyphicon-send" aria-hidden="true"></span> : {{$user->address}}</strong>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </div>
                        <h3>Tổng số bài đăng : {{count($new_product)}}</h3>
                            <div class="row">
                                @foreach($new_product as $new)
                                <div class="col-sm-3">
                                    <article class="thumbnail h__thumbnail item">
                                        <div class="single-item">
                
                
                                            <div class="single-item-header">
                                                <a style="cursor: pointer; text-decoration: none;" class="image" href="{{route('chitietsanpham',$new->id)}}">
                                                    <img src="source/image/product/{{$new->image}}" alt=""height="250px" width="250px"/>
                                                </a>
                                            </div>
                
                                            <a class="media" href="{{route('chitietsanpham',$new->id)}}" style="cursor: pointer; text-decoration: none;">
                                                <div class="media-left">
                                                    <i class="fa fa-phone" style="font-size: 24px; color: lightblue"></i>
                                                </div>
                                                <div class="media-body">
                                                    <h4 class="media-heading ng-binding" title="{{$new->full_name}}">{{$new->user->full_name}}</h4>
                                                    <p title="{{$new->address}}" class="ng-binding">{{$new->user->address}}</p>
                                                </div>
                                            </a>
                
                                            <a class="caption" href="{{route('chitietsanpham',$new->id)}}" style="cursor: pointer; text-decoration: none;">
                                                <h3 title="{{$new->name}}" class="ng-binding">{{$new->name}}</h3>
                                                <h4 class="h__detail__gia ng-binding" ><i style="font-size: 17px !important" class="fa fa-usd" aria-hidden="true"></i>: {{number_format($new->unit_price)}} VNĐ</h4>
                                                <h4 class="h__detail__gia ng-binding" typesell=""><i style="font-size: 17px !important; color: green;" class="fa fa-check-square" aria-hidden="true"></i> : {{$new->state}}</h4>
                                            </a>
                                        </div>
                                    </article>
                
                
                                </div>
                
                                @endforeach
                
                            </div>

                            <div class="row" style="border-top: 1px solid; padding-top: 15px;margin-left: 15px;">
                                <div class="product-rating-overview__filters"><div class="product-rating-overview__filter product-rating-overview__filter--active product-rating-overview__filter--all"><a>tất cả</a></div>
                                <div class="product-rating-overview__filter">5 Sao (455)</div>
                                <div class="product-rating-overview__filter">4 Sao (19)</div>
                                <div class="product-rating-overview__filter">3 Sao (4)</div>
                                <div class="product-rating-overview__filter">2 Sao (2)</div>
                                <div class="product-rating-overview__filter">1 Sao (3)</div>
                                <div class="media">
            
                                @foreach($rate as $ra)
                                <div class="row" style="margin-left: 15px;">
                                            <a class="pull-left href="#" ">
                                                <img style="padding-left: 5px;" class="media-object" src="../public/image/sao.jpg" alt="">
                                            </a>
                                            <div class="media-body" style="display: inline;">
                                                <h4 class="media-heading"><a href="detail-user/{{$ra->id_user_rate}}">{{$ra->user_rate->full_name}}</a>
                                                    
                                                <small>{{$ra->created_at}}</small>
                                                </h4>
                                                <span style="font-weight: bold;"><i class="fa fa-check" aria-hidden="true"></i> Đánh giá: {{$ra->prd_rated->name }} </span>
                                                @for($star=1;$star<=$ra->rate;$star++)
                                                <span class="glyphicon glyphicon-star"></span>
                                                
                                                @endfor
                                                <p>{{$ra->cmt}}</p>
                                                
                                            </div>
                                </div>
                                @endforeach
                            </div>
                            {{$rate->links()}}
                            
            
            
                        
                
                    <div class="space50">&nbsp;</div>

                          
                           
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>
    <!--/.row-->

</div>
</div>
@endsection