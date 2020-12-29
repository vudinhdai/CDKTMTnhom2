<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Comment;
use App\cart;
use App\product;
use Auth;
use App\Orders;
use App\Orderitems;
class CartController extends Controller
{
    public function postCart(Request $request)
    {
        $cart = new cart;
        $product = product::find($request->id_prod);
        $id_user= Auth::user()->id;
        $int =cart::where('cart_prod_id',$request->id_prod)->where('cart_user_id',Auth::user()->id)->get();
       
        if($int->count()!=0)
        {
            $ok = $int[0]->cart_all_price +  $int[0]->cart_price;
         cart::where('cart_prod_id',$request->id_prod)->update(array(
                         'cart_int'=>$int[0]->cart_int+1));
         cart::where('cart_prod_id',$request->id_prod)->update(array(
                         'cart_all_price'=>$ok ));
         
         
        }
        else {
                $cart->cart_user_id= $id_user;
                $cart->cart_img= $product->prod_img;
                $cart->cart_name = $product->prod_name;
            if($product->prod_promotion ==null){
                $cart->cart_price = $product->prod_price;
                }
            else{
                $cart->cart_price = $product->prod_promotion; 
                }
        $cart->cart_prod_id = $request->id_prod;
        $cart->seller_id = $product->seller_id;
        $cart->cart_int = 1;
        $cart->cart_all_price = $cart->cart_price * $cart->cart_int;
        $cart->save();

        }
        $cart=cart::where('cart_user_id', $id_user)->get();
        return back()->with('add','Thêm vào giỏ hàng thành công!');
    }
    public function getCart()
    {   if(Auth::check()){
        $id_user= Auth::user()->id;
        $cart=cart::where('cart_user_id', $id_user)->get();
        $sum= cart::where('cart_user_id',Auth::user()->id)->sum('cart_all_price');
        return view('fontend.cart')->with('cart',$cart)->with('sum',$sum);
        }
        else {
            return redirect('login/1')->with('cart_mess','Vui lòng đăng nhập để vào giỏ hàng!');
        }
    }
    public function deleteCart($id)
    {
        cart::where('cart_id',$id)->delete();
        return redirect('/cart');
    }
    public function updateCart(Request $request)
    {
      $cartt= cart::where('cart_id',$request->cart_id)->get();
      $price_all = $cartt[0]->cart_price * $request->qty;
      cart::where('cart_id',$request->cart_id)->update(array('cart_int'=>$request->qty ));
      cart::where('cart_id',$request->cart_id)->update(array('cart_all_price'=>$price_all));
      $sum= cart::where('cart_user_id',Auth::user()->id)->sum('cart_all_price');
      return back()->with('sum',$sum);
    }
    public function by(Request $request)
    {
    	$name = $request->name;
    	$phone = $request->phone;
    	$address= $request->add;
        //--------------

        $group_cart = DB::table('cart')->select(DB::raw('sum(cart_all_price) as price_all, seller_id'))->groupBy('seller_id')->where('cart_user_id',Auth::user()->id)->get();
    
         //--------------
        
        foreach($group_cart as $items)
        {
            $order = new Orders;
            $order->customer_id = Auth::user()->id;
            $order->address = $address;
            $order->customer_phone =$phone ;
            $order->customer_name = $name;
            $order->all_paymen = $items->price_all;
            $order->seller_id = $items->seller_id;
            $order->status = 0;
            $order->save();

        $cart= cart::where('cart_user_id', Auth::user()->id)->where('seller_id',$order->seller_id)->get();
            foreach($cart as $item1)
            {
                $orderitems = new Orderitems;
                $orderitems->order_id = $order->order_id;
                $orderitems->prod_id = $item1->cart_prod_id;
                $orderitems->qty= $item1->cart_int;
                $orderitems->price = $item1->cart_price;
                $orderitems->all_price = $item1->cart_all_price;
                $orderitems->prod_img = $item1->cart_img;
                $orderitems->prod_name = $item1->cart_name;
                $orderitems->save();
            }


        }
        $cart_test = cart::where('cart_user_id', Auth::user()->id)->get();
    	if($cart_test->count()==0)
            return redirect('/cart')->with('mess','Bạn phải thêm sản phẩm vào giỏ hàng trước!!');
    	return redirect('/cart')->with('mess','Bạn đã mua hàng thành công!!');
    }

    
}

