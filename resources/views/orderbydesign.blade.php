@extends("layouts.master")

@section('content')
<div class="container"> 
	<div class="breadcrumbs">
		<ol class="breadcrumb">
		  <li><a href="home">Home</a></li>
		  <li class="active">Order by Design</li>
		</ol>
	</div>
	<h2 class="text-center text-info">Order by Design</h2>
	<div class="row">
		<div class="text-center col-sm-2">
			
		</div>
		<style>
			img.addimage{
			    height:330px%;
			    width:250px;
			}
		</style>
		<div class="text-center col-sm-3">
			<a ><img class="addimage" src="{{"images/pesanan/".$str}}" alt="" /></a> 
			<br><p></p>
				<div class="pull-center col-sm"></div>
				<?php 

						if (\Session::get('uploaded')=="false"){ 

				?>
				<div class="row pull-center col-sm-9">
					
				    {!! Form::open(array('url'=>'uploadgambarpesanan','method'=>'PATCH', 'visibility'=> 'hidden' ,'files'=>true)) !!}
			         
			          {!! Form::file('image') !!}
					  <p class="errors">{{$errors->first('image')}}</p>
					@if(Session::has('error'))
					<p class="errors">{{ Session::get('error') }}</p>
					@endif
					
				</div>

				<div class="text-center col-sm-12">
			      {!! Form::submit('Submit Image', array('class'=>'send-btn','class'=>'btn get')) !!}
			      {!! Form::close() !!}
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
				{!! Form::open(['url'=>"pesan", 'method'=>'PATCH', 'files'=>true])!!}
					<input type="number" min="1" class="form-control" name="jumlah"  placeholder="Jumlah Pemesanan" required/>
					<input type="date" class="form-control" name="deadline"  placeholder="Tanggal Maksimal Pembuatan" required/>
					<input type="text" class="form-control" name="deskripsi_pemesanan"   placeholder="Deskripsi Pemesanan" required/>
					<input type="text" class="form-control" name="deskripsi_ukuran"   placeholder="Deskripsi Ukuran" required/>
					<input type="text" class="form-control" name="alamat"  placeholder="Alamat Pemesan" required/>
					<input type="text" class="form-control" name="no_telepon" placeholder="Nomor Telepon" required/>
					<select class="span4 form-control"  id="pembayaran" name="pembayaran">
						<option value="Membayar uang muka pesanan">Membayar uang muka pesanan</option>
						<option value="Melunasi harga pesanan">Melunasi harga pesanan</option>
					</select>
					<input type="hidden" class="form-control" name="nama_gambar" value="{{$str}}" />
					<p></p>
					<?php 
						if (\Session::get('uploaded')=="true"){ 
					?>
					<button type="submit" class="btn pull-right btn-default">Order Now</button>
					<?php 
						\Session::put('uploaded', "false");
						}
					 ?>
				{!!Form::close()!!}
			</div><!--/sign up form-->
		</div>
      </div>
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

	<br>
	<br>
	<br>
	
@stop