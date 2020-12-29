
@extends('fontend.master')
@section('tile','Thông tin')
@section('main')

<h3>Thông tin: </h3>
<br>
Gmail: 
<input type="email" name="" value="{{$gmail}}"><br><br>
<h3>Lịch sử mua hàng:</h3>
<br>
<table class="table table-bordered .table-responsive text-center">
									<tr class="active">
										<td width="8%"><span class="price">Mã</span></td>
										<td width="20%"><span class="price">Tên khách hàng</span></td>
										<td width="15%"><span class="price">Số điện thoại</span></td>
										<td width="30%"><span class="price">Địa chỉ</span></td>
										<td width="13.6665%"><span class="price">Tổng Tiền</span></td>
										<td width="11.112%"><span class="price">Thời gian</span></td>
										<td width="5%"><span class="price">Chi tiết</span></td>
									</tr>
									@foreach($history as $items)
									<tr>
										<td>{{$items->order_id}}</td>
										<td>{{$items->customer_name}}</td>
										<td>{{$items->customer_phone}}</td>
										<td>{{$items->address}}</td>
										<td>{{$items->all_paymen}} đ</td>
										<td>{{$items->created_at}}</td>
										<td><a href="{{asset('/his-detail/'.$items->order_id)}}">Xem</a></td>
									</tr>
									@endforeach
									
									
								</table>

@stop