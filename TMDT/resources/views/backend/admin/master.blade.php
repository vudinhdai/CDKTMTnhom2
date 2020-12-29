<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<base href="{{asset('public/backend')}}/">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>@yield('tile')</title>
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/datepicker3.css" rel="stylesheet">
<link href="css/styles.css" rel="stylesheet">
<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
<script src="js/lumino.glyphs.js"></script>
<style type="text/css">
	li{
		list-style: none;
	}
	a{
		word-wrap: break-word;

	}
	.@yield('back'){
		background-color: #ecff99 ;
	}
</style>
</head>
<body>
	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation" style="background-color:#a1cbff">
		<div class="container-fluid">
			<div class="navbar-header">
				<a class="navbar-brand" href="{{asset('/admin')}}"><b>HNUE | ADMIN</b></a>
				<ul class="user-menu">
					<li class="dropdown pull-right">	
						<ul >
							<li><a href="{{asset('/logout_admin')}}">Đăng xuất</a></li>
						</ul>
					</li>
				</ul>
			</div>
							
		</div><!-- /.container-fluid -->
	</nav>
	<div class="row">
		<div class="col-sm-3 col-xs-3 col-lg-3 shadow p-3 mr-5 bg-white rounded" style="background-color: white;min-height: 800px;">
			<ul class="nav flex-column">
				  <li class="nav-item tab1" >
				    <a class="nav-link " href="{{asset('/admin')}}" >Quản lý đơn</a>
				  </li>
				  <li class="nav-item tab2">
				    <a class="nav-link " href="{{asset('/admin/user')}}">Quản lý tài khoản</a>
				  </li>
				  <li class="nav-item tab3">
				    <a class="nav-link" href="{{asset('/admin/cate')}}">Quản lý danh mục</a>
				  </li>
				  @if(Auth::check() && Auth::user()->acc_type == 0)
				  <li class="nav-item tab4">
				    <a class="nav-link " href="#">Thêm tài khoản admin</a>
				  </li>
				  @endif
			</ul>
		</div>
		<div class="col-sm-9 col-xs-9 col-lg-9">
			@yield('main')
		</div>
	</div>
    


	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/chart.min.js"></script>
	<script src="js/chart-data.js"></script>
	<script src="js/easypiechart.js"></script>
	<script src="js/easypiechart-data.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<!-- <script>
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
		})
	</script>	 -->
</body>

</html>
