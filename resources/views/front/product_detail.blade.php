@extends('front.master')
@section('title','Product Detail Page')
@section('content')
<div class="container">
	<div class="row">
		
		@foreach($products as $product)
		<div class="col-md-6">
		<div class="thumbnall">
			<img class="card-img-top" src="{{url('dist/images',$product->image)}}" height="460px">
		</div>
		</div>
		<div class="col-md-6">
	<?php //echo ucwords($product->pro_name);?>
			<h3>{{$product->pro_name}}</h3>
			<h6>{{$product->pro_info}}</h6>
			<h6>${{$product->pro_price}}</h6>
			<h6>Avaliable:{{$product->stock}}</h6>
				<a href="{{url('cart/addItem',$product->id)}}" class="btn btn-info">Add To Cart</a>
			<?php
			$wishlistData=DB::table('wishlist')->rightJoin('products','wishlist.pro_id','=','products.id')->where('wishlist.pro_id','=',$product->id)->get();
			$count=App\Wishlist::where(['pro_id'=>$product->id])->count();
			if($count=='0'){
				?>
			<form action="{{route('addWishlist')}}" method="post">
			<input type="hidden" name="_token" value="{{csrf_token()}}">
			<input type="hidden" name="pro_id" value="{{$product->id}}">
			<button class="btn btn-warning">Add To Wishlist</button>
			</form>
			<?php } else { 
			?>
			<h3>this product already added to wishlist<a href="{{url('/wishlist')}}">Wishlist</a></h3>
			<?php }?>
		
		</div>
		@endforeach
	</div>
	
</div>

@endsection