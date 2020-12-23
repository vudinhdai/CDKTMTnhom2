<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<base href="{{asset('public/backend')}}/">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Forms</title>

	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/datepicker3.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">

	<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<script src="js/respond.min.js"></script>
<![endif]-->

</head>

<body>

	<div class="row">
		<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
			<div class="login-panel panel panel-default">
				<div class="panel-heading" style="background-color: orange; color: white;">

					Đăng nhập {{$mess}}

				</div>
				@if (session('mess'))
				<div class="alert alert-success">
					<p>{{ session('mess') }}</p>
				</div>
				@endif

				@if (session('alert'))
				<div class="alert alert-success">
					<p>{{ session('alert') }}</p>
				</div>
				@endif
				@if (session('cart_mess'))
				<div class="alert alert-success">
					<p>{{ session('cart_mess') }}</p>
				</div>
				@endif
				<div class="panel-body">
					<form role="form" method="post">
						{{csrf_field()}}
						<fieldset>
							<div class="form-group">
								<input required class="form-control" placeholder="E-mail" name="email" type="email" autofocus="">
							</div>
							<div class="form-group">
								<input required class="form-control" placeholder="Password" name="password" type="password" value="">
							</div>
							<div class="checkbox">
								<label>
									<input name="remember" type="checkbox" value="re">Remember Me
								</label>
							</div>
							<input type="submit" name="submit" class="btn btn-primary" value="Login">
							@if($mess==' ')
							<a class="btn btn-primary" href="{{asset('/sign_up')}}">Đăng kí</a>
							@else
							<a class="btn btn-primary" href="{{asset('/sign_up/2')}}">Đăng kí</a>
							<a href="{{asset('trang-chu')}}">Trang chủ</a>
							@endif
						</fieldset>
					</form>
				</div>
			</div>
		</div><!-- /.col-->
	</div><!-- /.row -->
	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/chart.min.js"></script>
	<script src="js/chart-data.js"></script>
	<script src="js/easypiechart.js"></script>
	<script src="js/easypiechart-data.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script>
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
		})
	</script>
</body>

</html>