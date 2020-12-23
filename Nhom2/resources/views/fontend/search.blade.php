@extends('fontend.master')
@section('tile','Tìm kiếm')
@section('main')
<link rel="stylesheet" href="css/search.css">
<div class="products">
	<h3>Tìm kiếm với từ khóa: <span>{{$key}}</span></h3>
	<span class="font-italic">Có {{$oks->count()}} sản phẩm được tìm thấy</span>
	<div class="product-list row">
		@foreach($oks as $prod)
		@if($prod->prod_promotion!=null)
		<div class="product-item col-md-3 col-sm-6 col-xs-12">
			<div style="width: 100px; height: 30px; background-color: red; position: absolute;line-height: 30px; "><b style="color: yellow;">KHUYẾN MÃI</b></div>
			<a href="#"><img src="{{asset('public/fontend/img/details/'.$prod->prod_img)}}" class="img-thumbnail"></a>
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
			<a href="#"><img src="{{asset('public/fontend/img/details/'.$prod->prod_img)}}" class="img-thumbnail"></a>
			<p><a href="#">{{$prod->prod_name}}</a></p>
			<p class="price">{{number_format($prod->prod_price,0,',','.')}}đ</p>
			<div class="marsk">
				<a href="{{asset('detail/'.$prod->prod_id)}}">Xem chi tiết</a>
			</div>
		</div>
		@endif
		@endforeach
		@if($oks->count()==0)
		<h3><span style="color: red;">Không tìm thấy sản phẩm bạn cần tìm!<span></h3>
		@endif

	</div>
</div>


@stop