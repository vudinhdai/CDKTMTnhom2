@extends('backend.admin.master')
@section('tile','Danh mục sản phẩm')
@section('back','tab3')
@section('main')
<h2>Quản lý danh mục</h2>
<a href="#" class="btn btn-primary">Thêm danh mục</a>
<table class="table table-bordered table-striped " >
	<thead>
		<tr class="bg-primary">
			<th width="10%">ID </th>
			<th width="30%">Tên danh mục</th>
			<th width="3%"></th>
			<th width="3%"></th>
			
		</tr>
	</thead>
		@foreach($cates as $cate)
		<tr>
			<th>{{$cate->cate_id}}</th>
			<th>{{$cate->cate_name}}</th>
			<th><a href="#">Sửa</a></th>
			<th><a href="#">Xóa</a></th>
		</tr>
		@endforeach

</table>


@stop