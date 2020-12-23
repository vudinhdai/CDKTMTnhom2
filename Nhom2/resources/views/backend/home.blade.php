@extends('backend.master')
@section('tile','Home Shop')
@section('main')
 <link rel="stylesheet" type="text/css" href="public/backend/icon/css/all.css">
	<div class="col-sm-9 col-xs-12 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Trang chủ</h1>
			</div>
		</div><!--/.row-->
									
		<div class="row">
			<div class="col-xs-12 col-md-6 col-lg-3">
				<div class="panel panel-blue panel-widget ">
					<div class="row no-padding">
						<div class="col-sm-3 col-lg-5 widget-left">
							<svg class="glyph stroked bag"><use xlink:href="#stroked-bag"></use></svg>
						</div>
						<div class="col-sm-9 col-lg-7 widget-right">
							<div class="large">120</div>
							<div class="text-muted">Sản phẩm</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-md-6 col-lg-3">
				<div class="panel panel-orange panel-widget">
					<div class="row no-padding">
						<div class="col-sm-3 col-lg-5 widget-left">
							<svg class="glyph stroked empty-message"><use xlink:href="#stroked-empty-message"></use></svg>
						</div>
						<div class="col-sm-9 col-lg-7 widget-right">
							<div class="large">52</div>
							<div class="text-muted">Bình luận</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-md-6 col-lg-3">
				<div class="panel panel-teal panel-widget">
					<div class="row no-padding">
						<div class="col-sm-3 col-lg-5 widget-left">
							<i class="fas fa-shopping-bag fa-4x"></i>
						</div>
						<div class="col-sm-9 col-lg-7 widget-right">
							<div class="large">24</div>
							<div class="text-muted">Chờ duyệt</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-md-6 col-lg-3">
				<div class="panel panel-red panel-widget">
					<div class="row no-padding">
						<div class="col-sm-3 col-lg-5 widget-left">
							<svg class="glyph stroked app-window-with-content"><use xlink:href="#stroked-app-window-with-content"></use></svg>
						</div>
						<div class="col-sm-9 col-lg-7 widget-right">
							<div class="large">25.2k</div>
							<div class="text-muted">Đã giao</div>
						</div>
					</div>
				</div>
			</div>
		</div><!--/.row-->
		<table class="table table-bordered .table-responsive ">
									<tr class="active">
										<td width="5%">Mã đơn</td>								
										<td width="13%">Đơn chi tiết</td>
										<td width="3%">Tên khách</td>
										<td width="5%">SĐT</td>
										<td width="15%">Địa chỉ</td>
										<td width="5%">Tổng tiền</td>
										<td width="5%">Trạng thái</td>
										
									</tr>
									@foreach($orders as $items)
									<tr>
										<td>{{$items->order_id}}</td>
									
										
										
										<td>
											@foreach($orderitems as $orderitem)
											@if($orderitem->order_id == $items->order_id )
											<li>
												<a href="{{asset('/order-detail/'.$orderitem->orderitem_id)}}">{{$orderitem->prod_name}}</a>
											</li>
											@endif
											@endforeach
										</td>
										<td>
											{{$items->customer_name}}
										</td>
										<td>
											{{$items->customer_phone}}
										</td>
										<td>
											{{$items->address}}
										</td>
										<td>{{$items->all_paymen}} đ</td>
										<td>
											@if($items->status==0)
											<div class="btn btn-primary">
											Đang chờ duyệt
											</div>
											@endif
										</td>
									</tr>
									@endforeach
										
		</table>
		
		<!--/.row-->
	</div>	<!--/.main-->