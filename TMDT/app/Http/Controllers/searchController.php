<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Comment;
use App\cart;
use App\product;
class searchController extends Controller
{
    public function getSearch(Request $request)
    {
    	$search = $request->search;
    	$key= $search;
    	$search = str_replace(' ', '%', $search);

    	$ok = product::where('prod_name', 'like','%'.$search.'%')->get();
        return view('fontend.search')->with('oks', $ok)->with('key',$key);
    }
}
