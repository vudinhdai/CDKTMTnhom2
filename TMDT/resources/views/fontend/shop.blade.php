@extends('fontend.master')
@section('tile','Shop')
@section('main')
<link rel="stylesheet" href="css/details.css">
<div id="wrap-inner">
	<h3>Thông tin Shop: {{$shops->name}} </h3>
<table style="width: 400px;">
	<tr>
		<td style="width: 30%;color: red;"><b>Gmail: </b></td>
		<td>{{$shops->email}}</td>
	</tr>
	<tr>
		<td style="width: 30%;color: red;"><b>Số điện thoại: </b></td>
		<td>{{$shops->hotline}}</td>
	</tr>
	<tr>
		<td style="width: 30%;color: red;"><b>Địa chỉ: </b></td>
		<td>{{$shops->address}}</td>
	</tr>

</table>
<hr  width="100%" align="center" />
<h3>Sản phẩm đang bán </h3>

<div class="product-list row">
								 @foreach($prods as $prod)
                                   @if($prod->prod_promotion!=null)
								    <div class="product-item col-md-3 col-sm-6 col-xs-12">
									<div style="width: 100px; height: 30px; background-color: red; position: absolute;line-height: 30px; "><b style="color: yellow;">KHUYẾN MÃI</b></div>
									<img style="height: 150px;"  src="{{asset('storage/app/avatar/'.$prod->prod_img)}}" class="img-thumbnail">
									<p><a href="#">{{$prod->prod_name}}</a></p>
									<p style="text-decoration-line: line-through">{{number_format($prod->prod_price,0,',','.')}}đ</p>	  
									<p class="price" style="padding-top:0px;">{{number_format($prod->prod_promotion,0,',','.')}}đ</p>	  
									<div class="marsk">
										<a href="{{asset('detail/'.$prod->prod_id)}}">Xem chi tiết</a>
									</div>                      	                        
								    </div>
								@endif
								@if($prod->prod_promotion==null)
								<div class="product-item col-md-3 col-sm-6 col-xs-12">
									<a href="#"><img style="height: 150px;" src="{{asset('storage/app/avatar/'.$prod->prod_img)}}" class="img-thumbnail"></a>
									<p><a href="#">{{$prod->prod_name}}</a></p>
									<p class="price">{{number_format($prod->prod_price,0,',','.')}}đ</p>	  
									<div class="marsk">
										<a href="{{asset('detail/'.$prod->prod_id)}}">Xem chi tiết</a>
									</div>                      	                        
								</div>
								@endif
							@endforeach	
</div>
</div>
@stop	