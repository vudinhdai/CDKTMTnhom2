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
<script type="text/javascript">
	@if(session('mess'))
		alert(' {{session('mess')}}','thông báo' );
	@endif
</script>

</head>

<body >
	
	<div class="row">
		<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
			<div class="login-panel panel panel-default" >
				<div class="panel-heading" style="background-color: orange; color: white;">
                
                  <b>ADMIN</b>

				</div>
				
				<div class="panel-body">
					<form role="form" method="post">
						{{csrf_field()}}
						<fieldset>
							<div class="form-group">
								<input required class="form-control" placeholder="tài khoản admin" name="tk" type="text" autofocus="">
							</div>
							<div class="form-group">
								<input required class="form-control" placeholder="mật khẩu" name="password" type="password" value="">
							</div>
							<input type="submit" name="submit" class="btn btn-primary" value="Đăng nhập">
							
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
</body>

</html>
