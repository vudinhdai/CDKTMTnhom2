@extends('backend.master')
@section('tile','Sản phẩm')
@section('main')

			<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Sản phẩm</h1>
			</div>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-xs-12 col-md-12 col-lg-12">
				
				<div class="panel panel-primary">
					<div class="panel-heading">Danh sách sản phẩm</div>
					<div class="panel-body">
						<div class="bootstrap-table">
							@if (session('delete_mess'))
								<div class="alert alert-success">
								      <p>{{ session('delete_mess') }}</p>
								</div>
							@endif
							@if (session('add_mess'))
								<div class="alert alert-success">
								      <p>{{ session('add_mess') }}</p>
								</div>
							@endif
							@if (session('edit_mess'))
								<div class="alert alert-success">
								      <p>{{ session('edit_mess') }}</p>
								</div>
							@endif
							<span style="color: red;">Có tất cả {{$all->count()}} sản phẩm</span>	
							
							<div class="table-responsive">
								<a href="{{asset('/add-prod')}}" class="btn btn-primary">Thêm sản phẩm</a>

								<table class="table table-bordered" style="margin-top:20px;">			
									<thead>
										<tr class="bg-primary">
											<th>ID</th>
											<th width="30%">Tên Sản phẩm</th>
											<th width="7%">Số lượng</th>
											<th width="10%">Ảnh sản phẩm</th>
											<th>Giá sản phẩm</th>
											<th>Giá khuyến mãi</th>
											<th>Danh mục</th>
											<th width="15%">Tùy chọn</th>
										</tr>
									</thead>
									<tbody>
										@foreach($data as $items)
										<tr>
											<td>{{$items->prod_id}}</td>
											<td>{{$items->prod_name}}</td>
											<td>{{$items->prod_int}}</td>
											<td>
												<a href="{{asset('/detail/'.$items->prod_id)}}"><img height="150px" src="{{asset('storage/app/avatar/'. $items->prod_img)}}" class="thumbnail"></a>
											</td>
											<td>{{number_format($items->prod_price,0,',','.')}} VND</td>
											<td>{{number_format($items->prod_promotion,0,',','.')}}VND</td>
											
											<td>{{$items->cate_name}}</td>
											<td>
												<a href="{{asset('/edit-prod/'.$items->prod_id)}}" class="btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i> Sửa</a>
												<a href="{{asset('/dele-prod/'.$items->prod_id)}}" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i> Xóa</a>
											</td>
										</tr>
										@endforeach

										
										
									</tbody>
								</table>
								{!! $data->links()!!}						
							</div>
						</div>
						<div class="clearfix"></div>
					</div>
				</div>
			</div>
		</div><!--/.row-->
	</div>
	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/chart.min.js"></script>
	<script src="js/chart-data.js"></script>
	<script src="js/easypiechart.js"></script>
	<script src="js/easypiechart-data.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script>
		$('#calendar').datepicker({
		});
		!function ($) {
		    $(document).on("click","ul.nav li.parent > a > span.icon", function(){          
		        $(this).find('em:first').toggleClass("glyphicon-minus");      
		    }); 
		    $(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
		}(window.jQuery);

		$(window).on('resize', function () {
		  if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
		})
		$(window).on('resize', function () {
		  if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
		});
		function changeImg(input){
		    //Nếu như tồn thuộc tính file, đồng nghĩa người dùng đã chọn file mới
		    if(input.files && input.files[0]){
		        var reader = new FileReader();
		        //Sự kiện file đã được load vào website
		        reader.onload = function(e){
		            //Thay đổi đường dẫn ảnh
		            $('#avatar').attr('src',e.target.result);
		        }
		        reader.readAsDataURL(input.files[0]);
		    }
		}
		$(document).ready(function() {
		    $('#avatar').click(function(){
		        $('#img').click();
		    });
		});
	</script>
@stop