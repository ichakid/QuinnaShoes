<?php use App\Product; ?>

@extends("layouts.master")

@section('content')
<div class="container">
	<div class="breadcrumbs">
		<ol class="breadcrumb">
		  <li><a href="home">Home</a></li>
		  <li class="active">Confirmation</li>
		</ol>
	</div>
	<div class = "row text-center">
		<?php if(\Session::has('id')==false){ ?>
			<h4 class="text-danger">Anda belum login !</h4>
			
		<?php } ?>


		<h3 class="text-info text-center">{{$product->model}}</h3>
		</div>	
		<div class="row container">

			<style>
				img.detail{
				    width:100%;
				    max-width:200px;
				}
			</style>

			<div class="col-sm-3">
				<img class = "detail" src="{{"images/home/".$product->nama_gambar}}"  class="girl img-responsive" alt="" />
			</div>
			<div class="col-sm-2">
				<div class="panel-group category-products" id="accordian"><!--category-productsr-->
							
					<div class="panel panel-default">
						<div class="panel-heading">
							<h4 class="text-info ">ID Item</h4>
						</div>
					</div>

					<div class="panel panel-default">
						<div class="panel-heading">
							<h4 class="text-info ">Harga</h4>
						</div>
					</div>

					<div class="panel panel-default">
						<div class="panel-heading">
							<h4 class="text-info ">Deskripsi</h4>
						</div>
					</div>
				</div><!--/category-products-->
			</div>
			<div class="col-sm-3">
				<div class="panel-group category-products" id="accordian"><!--category-productsr-->
							
					<div class="panel panel-default">
						<div class="panel-heading">
							<h4 class="text-info">{{$product->id}}</h4>
						</div>
					</div>

					<div class="panel panel-default">
						<div class="panel-heading">
							<h4 class="text-info">{{"Rp ".$product->harga.",-"}}</h4>
						</div>
					</div>

					<div class="panel panel-default">
						<div class="panel-heading">
							<h4 class="text-info">{{$product->deskripsi}}</h4>
						</div>
					</div>
				</div><!--/category-products-->
			</div>
			<div class="row col-sm-3">
				<div class="row">
				<div class="col-sm-12 col-sm-offset-1">
					<div class="login-form"><!--login form-->
						<div class="panel-heading text-center">
							<h4 class="text-info ">Data Pesanan</h4>
						</div>
						{!! Form::open(['url'=>"addcart", 'method'=>'PATCH'])!!}
							<input type="number" name="jumlah" min="1" placeholder="Jumlah Sepatu" required/>
							<input type="number" min="25" max="48" name="ukuran" placeholder="Ukuran Sepatu" required/>
							<input type="hidden" name="id_product" value={{$product->id}} />
					</div><!--/login form-->
				</div>
				
			</div>
			</div>
		</div>
		<div class="row text-center">
			<div class="col-sm-5"></div>
			<div class=" center-block  col-sm-2">
				<button type="submit" class="btn  add-to-cart"><i class="fa fa-shopping-cart"></i>Confirm</button>
				{!!Form::close()!!}
			</div>
		</div>
		
	<br>
	<br>

@stop