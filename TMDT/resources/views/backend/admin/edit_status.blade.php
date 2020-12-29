@extends('backend.admin.master')
@section('tile','Trạng thái')
@section('main')
<h2>Chi tiết hóa đơn</h2>
<table>
	<tr>
		<th>Tên khách hàng </th>
		<th><h4>:{{$order[0]->customer_name}}</h4></th>
	</tr>
	<tr>
		<th>Số điện thoại </th>
		<th><h4>:{{$order[0]->customer_phone}}</h4></th>
	</tr>
	<tr>
		<th>Địa chỉ </th>
		<th><h4>:{{$order[0]->address}}</h4></th>
	</tr>
</table>
<table class="table table-bordered">
	<thead>
		<tr class="bg-primary">
			<th width="5%">Mã sản phẩm</th>
			<th width="30%">Tên Sản phẩm</th>
			<th width="20%">Ảnh sản phẩm</th>
			<th width="7%">Giá</th>
			<th width="7%">Số lượng</th>
			<th width="7%">Tổng tiền</th>
		</tr>
	</thead>
	<tbody>
		@foreach($orderitems as $items)
		<tr>
			<th>{{$items->prod_id}}</th>
			<th>{{$items->prod_name}}</th>
			<th><img style="width: 70%" src="{{asset('storage/app/avatar/'.$items->prod_img)}}"></th>
			<th>{{$items->price}} đ</th>
			<th>{{$items->qty}}</th>
			<th>{{$items->all_price}} đ</th>
		</tr>
		@endforeach
	</tbody>
</table>

<form method="post">
	{{csrf_field()}}
	<h2>Trạng thái</h2>
	<select class="selectpicker" name="status"  >
		<option value="0" @if($order[0]->status == 0) selected @endif  ><b>Đang chờ xử lý</b></option>
		<option value="1" @if($order[0]->status == 1) selected @endif><b>Giao thành công</b></option>
	</select>
	<input type="submit" name="" class="btn btn-primary" value="Lưu">
</form>


@stop