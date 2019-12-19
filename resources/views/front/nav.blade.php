<nav class="navbar navbar-expand-lg navbar-light" style="background-color:#68D2F9;">
  
	<a class="navbar-brand" href="{{url('/')}}"><img src="{{asset('dist/images/logo.jpg')}}" width="80px" height="80px" style="border:10px solid #ccc"></a>
  
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="{{route('home')}}">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('shop')}}">Shop</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Categories
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
			<?php $cats=DB::table('categories')->get()?>
			@foreach($cats as $cat)
          <a class="dropdown-item" href="{{url('category',$cat->id)}}">{{ucwords($cat->name)}}</a>
          @endforeach
		  </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Sign In</a>
      </li>
		
		<li class="nav-item">
        <a class="nav-link" href="{{url('/contact')}}">Contact</a>
      </li>
		<li class="nav-item">
		<a class="nav-link" href="{{url('/profile')}}">Profile</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" href="{{url('wishlist')}}">Wishlist<span>({{App\Wishlist::count()}})</span></a>
      </li>
		<?php
		if(Auth::check())
		{?>
			 <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Cart
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
			
          <a class="dropdown-item">{{Auth::user()->name}}</a>
			
			<a class="dropdown-item" href="{{url('/logout')}}">Logout</a>
			<a class="dropdown-item" href="{{url('/profile')}}">Profile</a>
				 </div>
				 </li>
		
		<?php }else{?>
		<li class="nav-item">
		<a class="nav-link" href="{{url('/login')}}">Login</a>
		</li>
		<?php }?>
		<li class="nav-item">
		<a  class="nav-link" href="{{url('/cart')}}">&nbsp;Cart({{Cart::count()}}&nbsp;items)&nbsp;&nbsp;({{Cart::total()}})</a>
		</li>
    </ul>
    
  </div>
</nav>