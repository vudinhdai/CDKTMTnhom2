<!DOCTYPE html>
<html>
<head>
	<base href="{{asset('public/fontend')}}/">
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<title>@yield('tile')</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/home.css">
	<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.6/umd/popper.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script type="text/javascript">
		$(function() {
			var pull = $('#pull');
			menu = $('nav ul');
			menuHeight = menu.height();

			$(pull).on('click', function(e) {
				e.preventDefault();
				menu.slideToggle();
			});
		});

		$(window).resize(function() {
			var w = $(window).width();
			if (w > 320 && menu.is(':hidden')) {
				menu.removeAttr('style');
			}
		});
	</script>
	<style type="text/css">
		a:hover {
			color: red;
		}

		#logo {
			height: 100px;
		}

		ul li {
			list-style-type: none;
		}

		a {
			text-decoration: none;
		}

		li>a {
			color: black;
		}

		ul>li {

			padding-left: 5px;
			padding-right: 5px;
		}

		ul>li>a {
			margin-top: -10px;
		}

		.dropdown-item {
			padding-top: 6px;
			padding-bottom: 6px;
		}

		ul>li:first-child {
			border: none;
		}
	</style>
</head>

<body>
	<!-- header -->
	<div class="top-header" style="background: white; border-bottom: 1px solid white;padding-top: 10px;">
		<div class="container">
			<div class="row pt-1 " style=" line-height: 10px;">
				<a href="{{asset('/login/2')}}" class="texthead">Kênh Người Bán</a>
				<div class="ml-auto">
					<ul class="row">
						<li><a href="{{asset('/sign_up')}}">Đăng kí</a></li>
						<li><a href="{{asset('/login/1')}}">Đăng nhập</a></li>

						@if($test==1)

						<li class="nav-item dropdown" style="margin: 0px;
				padding: 0px;">

							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-person-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
									<path d="M13.468 12.37C12.758 11.226 11.195 10 8 10s-4.757 1.225-5.468 2.37A6.987 6.987 0 0 0 8 15a6.987 6.987 0 0 0 5.468-2.63z" />
									<path fill-rule="evenodd" d="M8 9a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
									<path fill-rule="evenodd" d="M8 1a7 7 0 1 0 0 14A7 7 0 0 0 8 1zM0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8z" />
								</svg>
							</a>
							<div class="dropdown-menu" aria-labelledby="navbarDropdown">
								<a class="dropdown-item" href="{{asset('/info')}}">Thông tin</a>
								<a class="dropdown-item" href="#">Đơn hàng</a>
								<a class="dropdown-item" href="#">Sửa TT</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="{{asset('/logout')}}">Đăng xuất</a>
							</div>
						</li>

						@endif
					</ul>
				</div>
			</div>
		</div>
	</div>
	<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #ff9600;">
		<div class="container">
			<a class="navbar-brand" href="{{asset('trang-chu/')}}"><img id="logo" src="img/home/logo1.png"></a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav m-auto">
					<form class="form-inline my-2 my-lg-0" method="get" action="{{asset('search/')}}">
						<input required class="form-control " type="search" name="search" placeholder="Tìm kiếm..." aria-label="Search" action style="background-color: #ff9600; border:2px solid white; width: 400px;">
						<button class="btn btn-dark" type="submit"><b>Tìm kiếm</b></button>
					</form>
				</ul>
				<a href="{{asset('cart')}}">
					<h4 style="color: white;"><b>GIỎ HÀNG</b></h4>
				</a>
			</div>
		</div>
	</nav>
	<!-- endheader -->

	<!-- main -->
	<section id="body">
		<div class="container">
			<div class="row">
				<div id="sidebar" class="col-md-3">
					<nav id="menu">
						<ul>
							<li class="menu-item">danh mục sản phẩm</li>
							@foreach($cate as $list)
							<li class="menu-item"><a href="{{asset('cate/'.$list->cate_id)}}" title="">{{$list->cate_name}}</a></li>

							@endforeach
						</ul>
						<!-- <a href="#" id="pull">Danh mục</a> -->
					</nav>
				</div>

				<div id="main" class="col-md-9">
					<!-- main -->
					<!-- phan slide la cac hieu ung chuyen dong su dung jquey -->
					<div id="slider">
						<div id="demo" class="carousel slide" data-ride="carousel">

							<!-- Indicators -->
							<ul class="carousel-indicators">
								<li data-target="#demo" data-slide-to="0" class="active"></li>
								<li data-target="#demo" data-slide-to="1"></li>
								<li data-target="#demo" data-slide-to="2"></li>
							</ul>

							<!-- The slideshow -->
							<div class="carousel-inner">
								<div class="carousel-item active">
									<img src="img/home/slide-1.png" alt="Los Angeles">
								</div>
								<div class="carousel-item">
									<img src="img/home/slide-2.png" alt="Chicago">
								</div>
								<div class="carousel-item">
									<img src="img/home/slide-3.png" alt="New York">
								</div>
							</div>

							<!-- Left and right controls -->
							<a class="carousel-control-prev" href="#demo" data-slide="prev">
								<span class="carousel-control-prev-icon"></span>
							</a>
							<a class="carousel-control-next" href="#demo" data-slide="next">
								<span class="carousel-control-next-icon"></span>
							</a>
						</div>
					</div>

					<div id="banner-t" class="text-center">
						<div class="row">
							<div class="banner-t-item col-md-6 col-sm-12 col-xs-12">
								<a href="#"><img src="img/home/banner-t-1.png" alt="" class="img-thumbnail"></a>
							</div>
							<div class="banner-t-item col-md-6 col-sm-12 col-xs-12">
								<a href="#"><img src="img/home/banner-t-1.png" alt="" class="img-thumbnail"></a>
							</div>
						</div>
					</div>
					<!-- end main -->
				</div>
			</div>
		</div>
	</section>
	<!-- endmain -->
	<div class="container">
		<div id="wrap-inner">
			<div class="products">
				<h3>sản phẩm khuyến mãi</h3>
				<div class="product-list row">
					@foreach($product as $prod)
					@if($prod->prod_promotion!=null)
					<div class="product-item col-md-2 col-sm-6 col-xs-12">
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
					@endforeach
				</div>
			</div>

			<div class="products">
				<h3>sản phẩm mới</h3>
				<div class="product-list row">
					@foreach($product_new as $prod)
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
						<a href="#"><img style="height: 150px;" src="{{asset('storage/app/avatar/'.$prod->prod_img)}}" class="img-thumbnail"></a>
						<p><a href="#">{{$prod->prod_name}}</a></p>
						<p class="price">{{number_format($prod->prod_price,0,',','.')}}đ</p>
						<div class="marsk">
							<a href="{{asset('detail/'.$prod->prod_id)}}">Xem chi tiết</a>
						</div>
					</div>
					@endif
					@endforeach
				</div>
			</div>

		</div>
	</div>
	<!-- footer -->
	<footer id="footer">
		<div id="footer-t">
			<div class="container">
				<div class="row">
					<div id="logo-f" class="col-md-3 col-sm-12 col-xs-12 text-center">
						<a href="#"><img src="img/home/logo.png"></a>
					</div>
					<div id="about" class="col-md-3 col-sm-12 col-xs-12">
						<h3>About us</h3>
						<p class="text-justify">Vietpro Academy thành lập năm 2009. Chúng tôi đào tạo chuyên sâu trong 2 lĩnh vực là Lập trình Website & Mobile nhằm cung cấp cho thị trường CNTT Việt Nam những lập trình viên thực sự chất lượng, có khả năng làm việc độc lập, cũng như Team Work ở mọi môi trường đòi hỏi sự chuyên nghiệp cao.</p>
					</div>
					<div id="hotline" class="col-md-3 col-sm-12 col-xs-12">
						<h3>Hotline</h3>
						<p>Phone Sale: (+84) 0976045091</p>
						<p>Email: trongtanhnue@gmail.com</p>
						<p>Phone Sale: (+84) 0123455157</p>
						<p>Email: nhannguyen@gmail.com</p>
					</div>
					<div id="contact" class="col-md-3 col-sm-12 col-xs-12">
						<h3>Contact Us</h3>
						<p>Address 1: Khoa Công Nghệ Thông Tin Trường Đại Học Sư Phạm Hà Nội - 136 Xuân Thủy - Cầu Giấy </p>

					</div>
				</div>
			</div>
			<div id="footer-b">
				<div class="container">
					<div class="row">
						<div id="footer-b-l" class="col-md-6 col-sm-12 col-xs-12 text-center">
							<p>Khoa CNTT Đại học sư phạm Hà Nội - www.hnue.edu.vn</p>
						</div>
						<div id="footer-b-r" class="col-md-6 col-sm-12 col-xs-12 text-center">
							<p>© 2020 Nhà C 136 Xuân Thủy- Cầu Giấy- Hà Nội</p>
						</div>
					</div>
				</div>
				<div id="scroll">
					<a href="#"><img src="img/home/scroll.png"></a>
				</div>
			</div>
		</div>
	</footer>
	<!-- endfooter -->
</body>

</html>