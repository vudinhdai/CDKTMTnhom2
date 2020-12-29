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
class AdminController extends Controller
{
    public function getAdmin(){

    	$orders= Orders::orderBy('created_at','desc')->get();
    	$prod = product::all();
    	$ord_0= Orders::where('status',0)->get();
        $orderitems = DB::table('orderitems')
            ->join('product', 'orderitems.prod_id', '=', 'product.prod_id')
            ->select('orderitems.*', 'product.prod_name')->get();
    	// $orderitems= $orderitems->join('product', 'orderitems.prod_id', '=', 'product.prod_id')
        return view('backend.admin.admin', ['prod'=>$prod->count(),'ord'=> $orders->count()
        , 'ord_0'=> $ord_0->count()
    	])->with('orders',$orders)->with('orderitems',$orderitems);
    }
    public function login_admin(){
      return view('backend.admin.login_admin');
    }
    public function post_login_admin(Request $request){
    	$admin = ['email' => $request->tk, 'password' => $request->password];
    	if(Auth::attempt($admin) && Auth::user()->acc_type == 0 ){
    		return redirect('/admin');
    	}
    	return redirect('/login_admin')->with('mess', 'Đăng nhập sai tài khoản mật khẩu!!');
    }
    public function logout_admin(){
    	Auth::logout();
    	return redirect('/login_admin')->with('mess','Đăng xuất thành công!');
    }
    public function order_load(Request $request){
    	$orders= Orders::orderBy('created_at','desc')->where('order_id', $request->ma_vd)->get();
        $orderitems = DB::table('orderitems')->where('order_id',$request->ma_vd)
            ->join('product', 'orderitems.prod_id', '=', 'product.prod_id')
            ->select('orderitems.*', 'product.prod_name')->get();
        $tam ='';
        foreach($orderitems as $items)
        {
        	$tam .= '<li>- '. $items->prod_name.'</li>';
        }
        $id = $orders[0]->order_id;
        if($orders[0]->status==0){
        	$tam1='<a href="'.url('/print/'.$id).'" class="btn btn-warning">
				Đang chờ duyệt
				</a>';
        }else $tam1='<a href="'.url('/print/'.$id).'" class="btn btn-primary">
				Giao thành công
				</a>';
        

        echo ' <tr class="active">
			<td width="5%">Mã đơn</td>								
			<td width="13%">Đơn chi tiết</td>
			<td width="3%">Tên khách</td>
			<td width="5%">SĐT</td>
			<td width="15%">Địa chỉ</td>
			<td width="5%">Tổng tiền</td>
			<td width="5%">Trạng thái</td>	
			</tr>'
			.'<tr>
				<td>'.$orders[0]->order_id.'</td>
				<td>'.$tam.'</td>
				<td>'.$orders[0]->customer_name.'</td>
				<td>'.$orders[0]->customer_phone.'</td>
				<td>'.$orders[0]->address.'</td>
				<td>'.$orders[0]->all_paymen.' đ</td>
				<td>'.$tam1.'</td>
			  </tr>' 

		;
    }
    public function load_status(Request $request){
    	$orders= Orders::orderBy('created_at','desc')->where('status', $request->status)->get();
  		$table = '<tr class="active">
			<td width="5%">Mã đơn</td>								
			<td width="13%">Đơn chi tiết</td>
			<td width="3%">Tên khách</td>
			<td width="5%">SĐT</td>
			<td width="15%">Địa chỉ</td>
			<td width="5%">Tổng tiền</td>
			<td width="5%">Trạng thái</td>	
			</tr>';
    	foreach($orders as $items)
    	{
    		$id = $items->order_id;
	    	if($items->status==0){
	        	$tam1='<a href="'.url('/print/'.$id).'" class="btn btn-warning">
					Đang chờ duyệt
					</a>';
	        }else $tam1='<a href="'.url('/print/'.$id).'" class="btn btn-primary">
					Giao thành công
					</a>'; 
			$orderitems = DB::table('orderitems')->where('order_id',$items->order_id)
            ->join('product', 'orderitems.prod_id', '=', 'product.prod_id')
            ->select('orderitems.*', 'product.prod_name')->get();
            
            $tam='';
            foreach($orderitems as $item)
	        {
	        	$tam .= '<li>- '. $item->prod_name.'</li>';
	        }

    		$table .= '<tr>
				<td>'.$items->order_id.'</td>
				<td>'.$tam.'</td>
				<td>'.$items->customer_name.'</td>
				<td>'.$items->customer_phone.'</td>
				<td>'.$items->address.'</td>
				<td>'.$items->all_paymen.' đ</td>
				<td>'.$tam1.'</td>
			  </tr>'; 
    	}
    	echo $table;
    }

    public function edit_status($id){
        $orderitems = Orderitems::where('order_id', $id)->get();
        $order = Orders::where('order_id',$id)->get();
        return view('backend.admin.edit_status')->with('orderitems',$orderitems)->with('order',$order);
    }
    public function post_edit_status($id,Request $request){
        Orders::where('order_id',$id)->update(array('status' => $request->status));
        return back();
    }
    
}

