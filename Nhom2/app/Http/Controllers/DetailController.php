<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Comment;
use App\cart;
use App\product;
use App\User;
use Auth;

class DetailController extends Controller
{
	public function getDetail($id)
    {

    	$quety['detail'] = DB::table('product')->where('prod_id',$id)->get();
        $quety['comment'] = Comment::where('com_prod_id',$id)->orderBy('created_at','desc')->paginate(6);
        $idd = product::where('prod_id',$id)->get();
        $seller_name = User::find($idd[0]->seller_id);
        return view('fontend.details',$quety)->with('name',$seller_name);
    }
    public function postComment(Request $request, $id)
    {
         $comment= new Comment;
         $comment->com_prod_id=$id;
         $comment->com_name=$request->name;
         $comment->com_content = $request->content;
         $comment->save();
         return back();
    }
}
