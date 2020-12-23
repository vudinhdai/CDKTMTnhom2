<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Comment;
use App\cart;
use App\product;
use App\Orders;
use App\Orderitems;
use Auth;

class InfoController extends Controller
{
    function getinfo()
    {
    	if(Auth::check()!=1){
    		return redirect('/login/1');
    	}
    	$id= Auth::user()->id;
    	$gmail= Auth::user()->email;
    	$history = Orders::latest()->where('customer_id',$id)->get();

    	return view('fontend.info')->with('gmail',$gmail)->with('history',$history);    
    }
    function gethis($id)
    {
    	$his=Orderitems::latest()->where('order_id',$id)->get();
    	return view('fontend.his_detail')->with('his',$his);
    }
}
