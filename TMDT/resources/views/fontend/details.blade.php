@extends('fontend.master')
@section('tile','Chi tiết sản phẩm')
@section('main')
<link rel="stylesheet" href="css/details.css">
<script type="text/javascript">
	@if(session('add'))
			alert('{{ session('add') }}','Thông báo');
	@endif
</script>
<div id="wrap-inner">
						<div id="product-info">
		
							<h3>{{$detail[0]->prod_name}}</h3>
							<div class="row">
								<div id="product-img" class="col-xs-12 col-sm-5 col-md-5 text-center">
									<img style="width: 100%;" src="{{asset('storage/app/avatar/'.$detail[0]->prod_img)}}">
								</div>
								<div id="product-details" class="col-xs-12 col-sm-7 col-md-7">

									@if($detail[0]->prod_promotion==null)
									<p>Giá: <span class="price">{{number_format($detail[0]->prod_price,0,',','.')}}đ</span></p>
									@endif

									@if($detail[0]->prod_promotion!=null)
									<p>Giá gốc: <span  style="text-decoration-line: line-through">{{number_format($detail[0]->prod_price,0,',','.')}}đ</span></p>
									<p>Giá khuyến mãi: <span class="price" style="">{{number_format($detail[0]->prod_promotion,0,',','.')}}đ</span></p>
									@endif

									<p>Bảo hành: {{$detail[0]->prod_warranty}}</p>
									<p>Tình trạng: {{$detail[0]->prod_condition}} </p>
									<p>{{$qty_by[0]->sum_qty}} sản phẩm đã bán</p>
									@if($detail[0]->prod_int>0)
									<p>[Còn hàng]</p>
									<form action="{{URL::to('cart')}}" method="post">
										{{csrf_field()}}
									<input type="hidden" name="id_prod" value="{{$detail[0]->prod_id}}">
									<button type="submit" class="btn btn-default" style="width: 50%;">Thêm vào giỏ hàng</button>
								    </form>
									@else
									<p><b style="color: white;"> [Hết hàng] </b></p>
									@endif

									

								</div>
								 @if(session('add'))
										<div class="alert alert-success">
										      <h4 style="color: red;">{{ session('add') }}</h4>
										</div>
									@endif
							</div>							
						</div>
						
						<div id="product-detail">
							
							<h4>Chủ Shop: <a href="{{asset('/shop/'.$name->id)}}">{{$name->name}}</a></h4> 
							
						
							<h3>Chi tiết sản phẩm</h3>
							<p class="text-justify">{{$detail[0]->prod_description}}</p>
						</div>
						<div id="comment">
							<h3>Bình luận</h3>
							<div class="col-md-9 comment">
								<form action="" method="post">
									<div class="form-group">
										<label for="name">Tên:</label>
										<input required type="text" class="form-control" id="name" name="name">
									</div>
									<div class="form-group">
										<label for="cm">Bình luận:</label>
										<textarea required rows="5" id="cm" class="form-control" name="content"></textarea>
									</div>
									<div class="form-group text-right">
										<button type="submit" class="btn btn-default">Gửi</button>
									</div>
									{{csrf_field()}}
								</form>
							</div>
						</div>
						<div id="comment-list">
							@foreach($comment as $item)
							<ul>
								<li class="com-title">
									{{$item->com_name}}
									<br>
									<span> {{date('d/m/Y H:i',strtotime($item->created_at))}}</span>	
								</li>
								<li class="com-details">
									{{$item->com_content}}
								</li>
							</ul>
							@endforeach
							{!!$comment->links()!!}
						</div>
					</div>
@stop	