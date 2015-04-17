<?php use App\Product; ?>

@extends("layouts.master")

@section('content')
<div class="container">
	<div class="breadcrumbs">
		<ol class="breadcrumb">
		  <li><a href="home">Home</a></li>
		  <li class="active">Detail</li>
		</ol>
	</div>
	<div class = "row text-center">
		<h3 class="text-info text-center">{{$product->model}}</h3>
		<a href={{"confirm/".\Session::get('id_product')}}  class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
	</div>	
		<div class="row container">

			<style>
				img.detail{
				    width:100%;
				    max-width:200px;
				}
			</style>

			<div class="col-sm-2">
				
			</div>
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
							<h4 class="text-info">{{$product->harga}}</h4>
						</div>
					</div>

					<div class="panel panel-default">
						<div class="panel-heading">
							<h4 class="text-info">{{$product->deskripsi}}</h4>
						</div>
					</div>
				</div><!--/category-products-->
			</div>
		</div>
	<br>
	<br>

@stop