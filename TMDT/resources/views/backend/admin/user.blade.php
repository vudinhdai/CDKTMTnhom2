@extends('backend.admin.master')
@section('tile','Quản lý tài khoản')
@section('back','tab2')
@section('main')
<h2>Quản lý tài khoản</h2>
<table align="center" class="table table-bordered " >
	<thead>
		<tr class="bg-primary">
			<th width="5%">ID</th>
			<th width="30%">Email</th>
			<th width="7%">Vai trò
			</th>
			<th width="15%">SĐT</th>
			<th width="7%">Địa chỉ</th>
			<th width="7%"></th>
			
		</tr>
	</thead>
	@foreach($users as $user)
		<tr>
			<th>{{$user->id}}</th>
			<th>{{$user->email}}</th>
			<th>@if($user->acc_type==1) Người mua @else Người bán @endif</th>
			<th>{{$user->hotline}}</th>
			<th>{{$user->address}}</th>
			<th>Sửa</th>
		</tr>
	@endforeach
</table>


@stop