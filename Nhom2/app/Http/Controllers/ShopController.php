<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Comment;
use App\cart;
use App\product;
use App\User;
class ShopController extends Controller
{
	public function getshop($id)
	{
		$user= User::find($id);
		$prod = product::where('seller_id', $id)->get();
		return view('fontend.shop')->with('shops',$user)->with('prods',$prod);
	}
}
