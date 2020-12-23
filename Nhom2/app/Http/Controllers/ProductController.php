<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\cart;
use App\product;
use Auth;
use DB;
class ProductController extends Controller
{
    public function getprod()
    {
    	// $data = product::where('seller_id',Auth::user()->id)->paginate(6);
    	$data = DB::table('product')
            ->join('category', 'product.prod_cateID', '=', 'category.cate_id')
            ->select('product.*', 'category.cate_name')->where('product.seller_id', Auth::user()->id)
            ->paginate(4);
        $all = product::where('seller_id', Auth::user()->id);
    	
    	return view('backend.product')->with('data',$data)->with('all', $all);
    }
    public function addprod()
    {
    	return view('backend.addprod');
    }

    public function postprod(Request $request)
    {
    	$nameimg= $request->img->getClientOriginalName();
    	$product = new product;
    	$product->prod_name = $request->name;
    	$product->prod_price = $request->price;
    	$product->prod_promotion = $request->promotion;
    	$product->prod_warranty = $request->warranty;
    	$product->seller_id = Auth::user()->id;
    	$product->prod_img = $nameimg;
    	$product->prod_int = $request->qty;
    	$product->prod_condition = $request->condition;
    	$product->prod_description = $request->description;
    	$product->prod_cateID = $request->cate;


    	$product->save();
    	$request->img->storeAS('avatar',$nameimg);
                 return redirect('/product')->with('add_mess','Đã thêm sản phẩm thành công!');
    }
    public function deleprod($id)
    {
    	product::where('prod_id',$id)->delete();

    	 return redirect('/product')->with('delete_mess','Đã xóa sản phẩm thành công!');
    }
    public function editprod($id)
    {

        $data = product::where('prod_id',$id)->get();

        return view('backend.editprod')->with('prod',$data);

    }
    public function posteditprod($id, Request $request)
    {
      
        $pro['prod_name'] = $request->name;
        $pro['prod_price'] = $request->price;
        $pro['prod_promotion'] = $request->promotion;
        $pro['prod_warranty'] = $request->warranty;
        $pro['seller_id'] = Auth::user()->id;
        
        $pro['prod_int'] = $request->qty;
        $pro['prod_condition'] = $request->condition;
        $pro['prod_description'] = $request->description;
        $pro['prod_cateID'] = $request->cate;
        if($request->hasFile('img'))
        {
            $nameimg= $request->img->getClientOriginalName();
            $pro['prod_img'] = $nameimg;
            $request->img->storeAS('avatar',$nameimg);
        }

        product::where('prod_id',$id)->update($pro);

        return redirect('/product')->with('edit_mess','Đã sửa sản phẩm thành công!');
    }

    
};
