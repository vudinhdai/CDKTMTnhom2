<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Comment;
use App\cart;
use App\product;
use App\User;
use Auth;
class HomeController extends Controller
{
    public function home()
    {
        $query['product'] = DB::table('product')->orderBy('prod_promotion','DESC')->take(8)->get();
        $query['product_new'] = DB::table('product')->orderBy('prod_id','DESC')->take(8)->get();
        return view('fontend.trangchu',$query);
    }

    

    
}
