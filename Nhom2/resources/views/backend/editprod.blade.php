@extends('backend.master')
@section('tile','Sửa sản phẩm')
@section('main')

<script src="js/lumino.glyphs.js"></script>
<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">Sản phẩm</h1>
		</div>
	</div>
	<!--/.row-->

	<div class="row">
		<div class="col-xs-12 col-md-12 col-lg-12">

			<div class="panel panel-primary">
				<div class="panel-heading">Thêm sản phẩm</div>
				<div class="panel-body">
					<form method="post" enctype="multipart/form-data">
						{{csrf_field()}}
						<div class="row" style="margin-bottom:40px">
							<div class="col-xs-8">
								<div class="form-group">
									<label>Tên sản phẩm</label>
									<input required type="text" name="name" class="form-control" value="{{$prod[0]->prod_name}}">
								</div>
								<div class="form-group">
									<label>Giá sản phẩm</label>
									<input required type="number" name="price" class="form-control" value="{{$prod[0]->prod_price}}">
								</div>
								<div class="form-group">
									<label>Giá khuyến mãi</label>
									<input type="number" name="promotion" placeholder="Có thể để trống" class="form-control" value="{{$prod[0]->prod_promotion}}">
								</div>
								<div class="form-group">
									<label>Ảnh sản phẩm</label>
									<input id="img" type="file" name="img" class="form-control hidden" onchange="changeImg(this)">
									<img id="avatar" class="thumbnail" width="300px" src="{{asset('storage/app/avatar/'. $prod[0]->prod_img)}}">
								</div>

								<div class="form-group">
									<label>Bảo hành</label>
									<input required type="text" name="warranty" class="form-control" value="{{$prod[0]->prod_warranty}}">
								</div>

								<div class="form-group">
									<label>Tình trạng</label>
									<input required type="text" name="condition" class="form-control" value="{{$prod[0]->prod_condition}}">
								</div>
								<div class="form-group">
									<label>Số lượng sản phẩm</label>
									<input required type="number" name="qty" class="form-control" value="{{$prod[0]->prod_int}}">
								</div>
								<div class="form-group">
									<label>Miêu tả</label>
									<textarea cols="50" rows="7" required name="description">{{$prod[0]->prod_description}}</textarea>
								</div>
								<div class="form-group">
									<label>Danh mục</label>
									<select required name="cate" class="form-control">
										@foreach($cate as $items)
										<option value="{{$items->cate_id}}">{{$items->cate_name}}</option>
										@endforeach
									</select>
								</div>

								<input type="submit" name="submit" value="Sửa" class="btn btn-primary">
								<a href="{{asset('/product')}}" class="btn btn-danger">Hủy bỏ</a>
							</div>
						</div>
					</form>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
	</div>
	<!--/.row-->
</div>
<!--/.main-->
<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/chart.min.js"></script>
<script src="js/chart-data.js"></script>
<script src="js/easypiechart.js"></script>
<script src="js/easypiechart-data.js"></script>
<script src="js/bootstrap-datepicker.js"></script>
<script>
	$('#calendar').datepicker({});
	! function($) {
		$(document).on("click", "ul.nav li.parent > a > span.icon", function() {
			$(this).find('em:first').toggleClass("glyphicon-minus");
		});
		$(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
	}(window.jQuery);

	$(window).on('resize', function() {
		if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
	})
	$(window).on('resize', function() {
		if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
	});

	function changeImg(input) {
		//Nếu như tồn thuộc tính file, đồng nghĩa người dùng đã chọn file mới
		if (input.files && input.files[0]) {
			var reader = new FileReader();
			//Sự kiện file đã được load vào website
			reader.onload = function(e) {
				//Thay đổi đường dẫn ảnh
				$('#avatar').attr('src', e.target.result);
			}
			reader.readAsDataURL(input.files[0]);
		}
	}
	$(document).ready(function() {
		$('#avatar').click(function() {
			$('#img').click();
		});
	});
</script>
@stop