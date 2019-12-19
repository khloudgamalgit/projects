<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Product;
use DB;
use App\Wishlist;

class HomeController extends Controller
{
    public function __construct()
    {
       // $this->middleware('auth');
    }

    public function index()
    {
		$products=Product::all();
        return view('front.home',compact('products'));
    }
	
	 public function shop()
    {
		$products=Product::all();
        return view('front.shop',compact('products'));
    }
	
	public function showCates($id)
	{
      $category_products=Product::where('category_id',$id)->get();
		$id_=$id;
		return view('front.category_list_pro',compact('category_products','id_'));
		
	}
	
	public function detailPro($id)
	{
       $products=DB::table('products')->where('id',$id)->get();
		return view('front.product_detail',compact('products'));
	}
	
	public function view_wishlist()
	{
		$products=DB::table('wishlist')->leftJoin('products','wishlist.pro_id','=','products.id')->get();
		
		return view('front.wishlist',compact('products'));
	}
	
	public function addWishlist(Request $request)
	{
		$wishlist=new Wishlist();
		$wishlist->user_id=Auth::user()->id;
		$wishlist->pro_id=$request->pro_id;
		$wishlist->save();
		
		$products=DB::table('products')->where('id',$request->pro_id)->get();
		return view('front.product_detail',compact('products'));
	}
	public function removeWishList($id)
	{
		DB::table('wishlist')->where('pro_id','=',$id)->delete();
		return back()->with('status','your wishlist is deleted');
	}
}








