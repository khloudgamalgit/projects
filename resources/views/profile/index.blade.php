@extends('front.master')
@section('content')
<style>
	table td {
		padding: 20px;
	}
</style>
<section id="cart_items">
	<div class="container">
		<br>
		<div class="row">
		<div class="col-md-4 well well-sm">
			<div class="card text-dark bg-light  mb-3" style="max-width: 18rem;">
  <div class="card-header ">Profile Menu</div>
  <div class="card-body ">
  @include('profile.menu')
  </div>
</div>
		
		</div>
			<div class="col-md-8 ">
				<ol class="breadcrumb">
					<li><h3><span style="color:#f90">welcome {{ucwords(Auth::user()->name)}}
						in our site
						</span>
					
						</h3>
					<br>
					<br>
					</li>
					<br>
					<br>
					<center>
					<table border="0">
						<tr>
							<td><a href="{{url('/order')}}"class="btn btn-info">Orders</a></td>
							
							<td><a href="{{url('/address')}}"class="btn btn-warning">Address</a></td>
							
							<td><a href="{{url('/password')}}" class="btn btn-danger">Change Password</a></td>
						</tr>
					</table>
					</center>
				</ol>
				
		</div>
	</div>
	</div>
</section>

@endsection