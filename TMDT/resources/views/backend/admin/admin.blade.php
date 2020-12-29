@extends('backend.admin.master')
@section('tile','Admin')
@section('back','tab1')
@section('main')
<h2>Quản lý vận đơn</h2>
<div class="row" >
			<div class="col-xs-12 col-md-6 col-lg-3">
				<div class="panel panel-blue panel-widget ">
					<div class="row no-padding">
						<div class="col-sm-3 col-lg-5 widget-left">
							<svg class="glyph stroked bag"><use xlink:href="#stroked-bag"></use></svg>
						</div>
						<div class="col-sm-9 col-lg-7 widget-right">
							<div class="large">{{$prod}}</div>
							<div class="text-muted">Sản phẩm</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-md-6 col-lg-3">
				<div class="panel panel-orange panel-widget">
					<div class="row no-padding">
						<div class="col-sm-3 col-lg-5 widget-left">
							
						</div>
						<div class="col-sm-9 col-lg-7 widget-right">
							<div class="large">{{$ord}}</div>
							<div class="text-muted">Đơn hàng</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-md-6 col-lg-3">
				<div class="panel panel-teal panel-widget">
					<div class="row no-padding">
						<div class="col-sm-3 col-lg-5 widget-left">
							<i class="fas fa-shopping-bag fa-4x"></i>
						</div>
						<div class="col-sm-9 col-lg-7 widget-right">
							<div class="large">{{$ord_0}}</div>
							<div class="text-muted">Chờ duyệt</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-md-6 col-lg-3">
				<div class="panel panel-red panel-widget">
					<div class="row no-padding">
						<div class="col-sm-3 col-lg-5 widget-left">
							<svg class="glyph stroked app-window-with-content"><use xlink:href="#stroked-app-window-with-content"></use></svg>
						</div>
						<div class="col-sm-9 col-lg-7 widget-right">
							<div class="large">{{$ord - $ord_0}}</div>
							<div class="text-muted">Đã giao</div>
						</div>
					</div>
				</div>
			</div>
</div><!--/.row-->

<form method="get">
			Mã vận đơn: <input type="text" name="search_order" placeholder="Tìm kiếm vận đơn" id="tim"
			 onkeyup="load(this.value)">
			Trạng thái: <select class="status" onchange="load_status(this.value)">
				<option value="">---Chọn---</option>
				<option value="0">Đang chờ duyệt</option>
				<option value="1">Đã giao</option>
			</select>
			

</form>
<br>
<table id="timkiem" class="table table-bordered .table-responsive ">
	
</table>


<script type="text/javascript">
              function load(ma_vd)
              { 
             
                {
                  $.get(
                    '{{asset('/order_load')}}',
                    {ma_vd:ma_vd},
                    function(ok){
                      document.getElementById("timkiem").innerHTML = ok;
                    }
                    )
                }
              
              };
              function load_status(status)
              { 
             	if(status!= "")
                {
                  $.get(
                    '{{asset('/load_status')}}',
                    {status:status},
                    function(ok){
                      document.getElementById("timkiem").innerHTML = ok;
                    }
                    )
                }
                else location.reload();
              
              };
</script>

@stop