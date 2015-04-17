@extends("layouts.master")

@section('content')
<div class="container">
		<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="home">Home</a></li>
				  <li class="active">Account</li>
				</ol>
			</div>
			<div class="row">
				<div class="text-center col-sm-4"></div>
				<div class="text-center col-sm-4">
					<div class="signup-form"><!--sign up form-->
						<?php $name = Session::get('nama') ?>
						<h2>Edit Account</h2>
						{!! Form::open(['url'=>"updateduser", 'method'=>'PATCH'])!!}
							<input type="text" name="nama" value = "{{$name}}" placeholder="Name" required/>
							<input type="email" name="email" value = {{$user->email}}  placeholder="Email Address" required/>
							<input type="password"  name="password" value = {{$user->password}}  placeholder="Password" required/>
							<p></p>
							<button type="submit" class="btn pull-right btn-default">Save</button>
						{!!Form::close()!!}
					</div><!--/sign up form-->
				</div>
			</div>
	<br>
	
@stop