@extends('backend.master')
@section('tile','Chi tiết hóa đơn')
@section('main')
<style type="text/css">
	p{
		font-family: arial;
	}
</style>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">		
		<h3>Chi tiết hóa đơn</h3>
		
		<table>
			<tr>
				<td><img style="width: 200px;" src="{{asset('storage/app/avatar/'.$detail[0]->prod_img)}}"></td>
				<td width="400px"><div id="product-details" class="col-xs-12 col-sm-7 col-md-7">
									<h3>{{$detail[0]->prod_name}}</h3>
									@if($detail[0]->prod_promotion==null)
									<p>Giá: <span class="price">{{number_format($detail[0]->prod_price,0,',','.')}}đ</span></p>
									@endif

									@if($detail[0]->prod_promotion!=null)
									<p>Giá gốc: <span  style="text-decoration-line: line-through">{{number_format($detail[0]->prod_price,0,',','.')}}đ</span></p>
									<p>Giá khuyến mãi: <span class="price" style="">{{number_format($detail[0]->prod_promotion,0,',','.')}}đ</span></p>
									@endif

									<p>Bảo hành: {{$detail[0]->prod_warranty}}</p>
									<p>Tình trạng: {{$detail[0]->prod_condition}} </p>
									<p>[{{$detail[0]->prod_int}} sản phẩm có sẵn]</p>					
							    </div></td>
			</tr>
		</table>
		<table class="table table-bordered .table-responsive text-center">
									<tr class="active">
										<td width="5%">Mã đơn chi tiết</td>
										<td width="5%">Mã hóa đơn</td>
										<td width="15%">Tên sản phẩm</td>
										<td width="10%">Giá</td>
										<td width="3%">Số lượng</td>
										<td width="10%">Thành tiền</td>
										
										
									</tr>
									<tr>
										<td>{{$orderitems[0]->orderitem_id}}</td>
										<td>{{$orderitems[0]->order_id}}</td>
										<td>{{$detail[0]->prod_name}}</td>
										<td>{{$orderitems[0]->price}} đ</td>
										<td>{{$orderitems[0]->qty}}</td>
										<td>{{$orderitems[0]->all_price}} </td>
									</tr>
	  	</table>
							    				
									
													
</div>
@stop	

