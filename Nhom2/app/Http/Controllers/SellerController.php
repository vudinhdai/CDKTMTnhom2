<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Auth;
use App\Comment;
use App\cart;
use App\product;
use App\User;
use App\Orders;
use App\Orderitems;
use DB;

class SellerController extends Controller
{
    function getseller()
    {
    	$orders= Orders::where('seller_id', Auth::user()->id)->get();
        $orderitems = DB::table('orderitems')
            ->join('product', 'orderitems.prod_id', '=', 'product.prod_id')
            ->select('orderitems.*', 'product.prod_name')->get();
    	// $orderitems= $orderitems->join('product', 'orderitems.prod_id', '=', 'product.prod_id')
    	
    	return view('backend.home')->with('orders',$orders)->with('orderitems',$orderitems);
    }
    function logout()
    {
    	Auth::logout();
    	return redirect('/login/2');
    }

    function getorderdetail($id)
    {
        $orderitems = Orderitems::where('orderitem_id',$id)->get();
        
        $detail = product::where('prod_id', $orderitems[0]->prod_id)->get();

        return view('backend.order_detail')->with('orderitems', $orderitems)->with('detail',$detail);
    }
   
}
