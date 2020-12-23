
@extends('fontend.master')
@section('tile','Giỏ hàng')
@section('main')

	                    <link rel="stylesheet" href="css/cart.css">
	                    <script type="text/javascript">
							function updateCart(qty,cart_id)
							{
								$.get(
									'{{asset('/cart/update')}}',
									{qty:qty, cart_id:cart_id},
									function(){
										location.reload();
									}
									)
							};
						</script>
						<div id="list-cart">
							<h3>Giỏ hàng</h3>
							@if($cart->count()>0)
							<form>
								<table class="table table-bordered .table-responsive text-center">
									<tr class="active">
										<td width="20%">Ảnh mô tả</td>
										<td width="22.222%">Tên sản phẩm</td>
										<td width="15%">Số lượng</td>
										<td width="13.6665%">Đơn giá</td>
										<td width="13.6665%">Thành tiền</td>
										<td width="11.112%">Xóa</td>
									</tr>
									@foreach($cart as $item)
									<tr>
										<td><a href="{{asset('/detail/'.$item->cart_prod_id)}}"><img class="img-responsive" style="width: 100%" src="{{asset('storage/app/avatar/'.$item->cart_img)}}" ></a></td>
										<td>{{$item->cart_name}}</td>
										<td>
											<div class="form-group">
												<input class="form-control" onchange="updateCart(this.value, '{{$item->cart_id}}' )" type="number" value="{{$item->cart_int}}" name="qty" >
											</div>
										</td>
										<td><span class="price">{{number_format($item->cart_price,0,',','.')}} đ</span></td>
										<td><span class="price">{{number_format($item->cart_all_price,0,',','.')}}</span></td>
										<td><a style="color: red;" href="{{asset('/delete_cart/'. $item->cart_id)}}"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
											<a style="color: red;" href="{{asset('/delete_cart/'. $item->cart_id)}}">Xóa</a>
  <path fill-rule="evenodd" d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5a.5.5 0 0 0-1 0v7a.5.5 0 0 0 1 0v-7z"/>
</svg></a>

										</td>
										
									</tr>
									@endforeach
									
								</table>
								<div class="row" id="total-price">
									<div class="col-md-6 col-sm-12 col-xs-12">										
											Tổng thanh toán: <span name="" class="total-price">
											  {{number_format($sum,0,',','.')}} đ

											</span>
																													
									</div>
									<div class="col-md-6 col-sm-12 col-xs-12">
										<a href="#" class="my-btn btn">Xóa giỏ hàng</a>
									</div>
								</div>
							</form>  
							@else
								<div class="alert alert-success">
						      	<h2>Giỏ hàng trống!</h2>
								</div>
							@endif           	                	
						</div>

						<div id="xac-nhan">
							<h3>Xác nhận mua hàng</h3>
							<form action="{{asset('/by')}}" method="post">
								{{csrf_field()}}
								<input type="hidden" name="all_pay" value="{{$sum}}">
								<div class="form-group">
									<label for="name">Họ và tên:</label>
									<input required type="text" class="form-control" id="name" name="name">
								</div>
								<div class="form-group">
									<label for="phone">Số điện thoại:</label>
									<input required type="number" class="form-control" id="phone" name="phone">
								</div>
								<div class="form-group">
									<label for="add">Địa chỉ:</label>
									<input required type="text" class="form-control" id="add" name="add">
								</div>
								<div class="form-group text-right">
									<button type="submit" class="btn btn-default">Thực hiện đơn hàng</button>
								</div>
							</form>
						</div>
			
@stop