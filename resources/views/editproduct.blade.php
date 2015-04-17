@extends("layouts.master")

@section('content')
<div class="container"> 
	<div class="breadcrumbs">
		<ol class="breadcrumb">
		  <li><a href="home">Home</a></li>
		  <li class="active">Add Product</li>
		</ol>
	</div>
	<h2 class="text-center text-info">Add Product</h2>
	<div class="row">
		<div class="text-center col-sm-2">
			
		</div>
		<style>
			img.addimage{
			    height:161px%;
			    width:150px;
			}
		</style>
		<div class="text-center col-sm-3">
			<a ><img class="addimage" src="{{"images/home/".$str}}" alt="" /></a> 
			<br><p></p>
				
				<div class="pull-center col-sm"></div>
				<?php 

						if (\Session::get('uploaded')=="false"){ 

				?>
				<div class="row pull-center col-sm-9">
					
					
				</div>

				<div class="text-center col-sm-12">
				</div>

				<?php 
						}else{

				?>
				<div class="row pull-center col-sm-9">
					
				</div>
				
				<div class="text-center col-sm-12">
				</div>
				<?php
						}
				 ?>
		</div>
		<div class="text-center col-sm-4">
			<div class="signup-form"><!--sign up form-->
				{!! Form::open(['url'=>"editproductredirect", 'method'=>'PATCH', 'files'=>true])!!}
					<input type="text" class="form-control"  value="{{$product->model}}"  name="model"  placeholder="Model Sepatu" required/>
					<input type="text" class="form-control" value="{{$product->deskripsi}}"  name="deskripsi"   placeholder="Deskripsi" required/>
					<input type="harga" class="form-control" value="{{$product->harga}}" name="harga" placeholder="Harga" required/>
					<input type="hidden" class="form-control" value="{{$product->nama_gambar}}" name="nama_gambar" value={{$str}} />
					
					<select class="span4 form-control"  id="kategori" name="kategori">
						<option value="hot_item">Hot Item Product</option>
						<option value="slider">New Product on Slider</option>
					</select>

					<p></p>
					
					<button type="submit" class="btn pull-right btn-default">Save</button>
					
				{!!Form::close()!!}
			</div><!--/sign up form-->
		</div>
      </div>
       <div class="about-section">
	   <div class="text-content">
	     <div class="span7 offset1">
	        @if(Session::has('success'))
	          <div class="alert-box success">
	          <h2>{{ Session::get('success') }}</h2>
	          </div>
	        @endif
			</div>
		</div>
	</div>
	
	
	<br>
	<br>
	<br>
   </div>
  
	


@stop