<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Comment;
use App\cart;
use App\product;
use App\User;
use Auth;
use App\Orders;
use App\Orderitems;
class AdminUserController extends Controller
{
    public function get_user(){
    	$user = User::where('acc_type',1)->orwhere('acc_type',2)->get();
    	return view('backend.admin.user')->with('users',$user);
    }
}
