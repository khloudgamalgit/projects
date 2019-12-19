<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Product;
class CartController extends Controller
{
    public function index()
	{
		$cartItems=Cart::content();//this from laravel plugin
		return view('cart.index',compact('cartItems'));
		
	}
	 public function addItem($id)
	 {
		 $product=Product::findOrFail($id);
		 Cart::add($id,$product->pro_name,1,$product->pro_price,['img'=>$product->image,'stock'=>$product->stock]);
		 return back();
	 }
	public function update(Request $request ,$id)
	{
		$qty=$request->qty;
		$proID=$request->proId;
		$product=Product::findOrfail($proID);
		$stock=$product->stock;
		
		if($qty<$stock)
		{
			Cart::update($id,$request->qty);
				return back()->with('status','ok this product updated');
		}
	
		else
		{
			return back()->with('error','please chek if qty is bigger than stock');
		}
		
	}
	public function destroy($id)
	{
		Cart::remove($id);
		return back();
	}
	
}

