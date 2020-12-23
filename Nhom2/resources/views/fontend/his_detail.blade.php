@extends('fontend.master')
@section('tile','Chi tiết đơn hàng')
@section('main')

<h3>Chi tiết đơn hàng:</h3>
<br>
<table class="table table-bordered .table-responsive text-center">
	<tr class="active">
		<td width="8%"><span class="price">Mã sp</span></td>
		<td width="20%"><span class="price">Tên sản phẩm</span></td>
		<td width="15%"><span class="price">Ảnh</span></td>
		<td width="15%"><span class="price">Giá </span></td>
		<td width="7%"><span class="price">Số lượng</span></td>
		<td width="11.112%"><span class="price">Tổng tiền</span></td>

	</tr>
	@foreach($his as $items)
	<tr>
		<td>{{$items->prod_id}}</td>
		<td>{{$items->prod_name}}</td>
		<td><img style="width: 60%" src="{{asset('public/fontend/img/details/'.$items->prod_img)}}"></td>
		<td>{{$items->price}} đ</td>
		<td>{{$items->qty}} </td>
		<td>{{$items->all_price}} đ</td>

	</tr>

	@endforeach


</table>

@stop