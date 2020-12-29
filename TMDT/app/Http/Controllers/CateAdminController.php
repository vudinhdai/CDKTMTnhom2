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
use App\Category;
class CateAdminController extends Controller
{
   public function get_admin_cate(){
   	$cate = Category::all();
   	return view('backend.admin.cate')->with('cates',$cate);
   }
}
