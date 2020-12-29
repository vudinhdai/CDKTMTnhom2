<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Comment;
use App\cart;
use App\product;
use App\Category;
class CateController extends Controller
{
    public function getCate($id)
    {
        $prod  =product::where('prod_cateID', $id )->paginate(8);
        $cate = Category::find($id);
    	return view('fontend.category')->with('prods', $prod)->with('cates', $cate);
    }
}
