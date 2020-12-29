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
        $prod = product::where('seller_id', Auth::user()->id)->get();
        $coment = DB::table('coments')->select('coments.*')->join('product','product.prod_id','=','coments.com_prod_id')->get();
        $ord_0 = Orders::where('seller_id', Auth::user()->id)->where('status', 0)->get();
        $ord_1 = Orders::where('seller_id', Auth::user()->id)->where('status', 1)->get();
        $orderitems = DB::table('orderitems')
            ->join('product', 'orderitems.prod_id', '=', 'product.prod_id')
            ->select('orderitems.*', 'product.prod_name')->get();
    	// $orderitems= $orderitems->join('product', 'orderitems.prod_id', '=', 'product.prod_id')
    	
    	return view('backend.home', ['prod'=>$prod->count(), 'cmt'=>$coment->count(),'ord_0'=>$ord_0->count(),'ord_1'=> $ord_1->count()])->with('orders',$orders)->with('orderitems',$orderitems);
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
