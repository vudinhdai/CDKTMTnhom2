@extends('fontend.master')
@section('tile','Danh sach')
@section('main')
<link rel="stylesheet" href="css/category.css">
		
								<div class="products">
									<h3>{{$cates->cate_name}}</h3>
									<span  class="font-italic">Có {{$prods->count()}} sản phẩm</span>
									<div class="product-list row">
								 @foreach($prods as $prod)
                                   @if($prod->prod_promotion!=null)
								    <div class="product-item col-md-3 col-sm-6 col-xs-12">
									<div style="width: 100px; height: 30px; background-color: red; position: absolute;line-height: 30px; "><b style="color: yellow;">KHUYẾN MÃI</b></div>
									<img style="height: 150px;" src="{{asset('storage/app/avatar/'.$prod->prod_img)}}" class="img-thumbnail">
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
									<img style="height: 150px;" src="{{asset('storage/app/avatar/'.$prod->prod_img)}}" class="img-thumbnail">
									<p><a href="#">{{$prod->prod_name}}</a></p>
									<p class="price">{{number_format($prod->prod_price,0,',','.')}}đ</p>	  
									<div class="marsk">
										<a href="{{asset('detail/'.$prod->prod_id)}}">Xem chi tiết</a>
									</div>                      	                        
								</div>
								@endif
							@endforeach	
							</div>  
							<div class="mt-3">{!!$prods->links()!!} </div>              	                	
								</div>
							
@stop