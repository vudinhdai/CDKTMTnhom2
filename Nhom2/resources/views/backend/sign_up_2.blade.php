<!DOCTYPE>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<style>
#navbar{
	margin-top:50px;}
#tbl-first-row{
	font-weight:bold;}
#logout{
	padding-right:30px;}		
</style>
</head>
<body>

<div class="container">
    
    <div class="row">
    	<div class="col-sm-6">
        	<h2>Đăng kí tài khoản bán hàng </h2><br>
        	<form method="post">
        		@if(session('ok1'))
                 <div class="alert alert-success">
					      <p>{{ session('ok1') }}</p>
					</div>
        		@endif

        		@if(session('false'))
                 <div class="alert alert-success">
					      <p>{{session('false') }}</p>
					</div>
        		@endif
        		{{csrf_field()}}

        		
            	<div class="form-group">
                	<label>Tên Shop</label>
                    <input type="text" name="full" class="form-control" placeholder="Fullname" required />
                </div>
                <div class="form-group">
                	<label>Email</label>
                    <input type="text" name="mail" class="form-control" placeholder="Email" required />
                </div>
                <div class="form-group">
                	<label>Password</label>
                    <input type="password" name="pass" class="form-control" placeholder="Password" required />
                </div>
                
                <div class="form-group">
                	<label>Phone</label>
                    <input type="number" name="phone" class="form-control" placeholder="phone" required />
                </div>
                <div class="form-group">
                	<label>Địa chỉ</label>
                    <input type="text" name="address" class="form-control" placeholder="Địa chỉ" required />
                </div>
                
                <input type="submit" name="submit" value="Đăng kí" class="btn btn-primary" />
                <a href="{{asset('/login/2')}}" class="btn btn-primary" >Đăng nhập</a>
            </form>
        </div>
    </div>
</div>

</body>
</html>
