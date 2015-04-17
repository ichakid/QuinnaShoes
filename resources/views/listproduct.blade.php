<?php use App\Product; ?>

@extends("layouts.master")

@section('content')


	
	<section id="cart_items">

		<div class="container">
		<div class="breadcrumbs">
			<ol class="breadcrumb">
			  <li><a href="home">Home</a></li>
			  <li class="active">List Product</li>
			</ol>
		</div>


			<div class="row text-center">
				<h3>List Product</h3>
				<br>
			</div>
			
			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="text-center image">Item</td>
							<td class="text-center price">Model</td>
							<td class="text-center description">Description</td>
							<td class="text-center price">Price</td>
							<td class="text-center total">Edit</td>
							<td ></td><td ></td>
						</tr>
					</thead>
					<tbody>
					
						<style>
							img.cartimg{
							    width:100%;
							    max-width:70px;
							}
						</style>
						@foreach ($arrayProduct as $product)
							<tr>
								<td class="row cart_product">
									<div class="text-center ">
										<a href=""><img class="cartimg"  src="{{"images/home/".$product->nama_gambar}}" alt=""></a>
									</div>
								</td>
								<td class="text-center image">
									<h4><a href="">{{$product->model}}</a></h4>
									<p>{{"Kategori : ".$product->kategori}}</p>
								</td>
								<td class="text-center price">
									<p>{{"".$product->deskripsi.""}}</p>
								</td>
								<td class="text-center cart_description">
									<p>{{"Rp  ".$product->harga.",-"}}</p>
								</td>

								<td class="text-center cart_total">
									<a class="btn btn-info" href={{"editproduct/".$product->id}} >Edit</a>
								</td>
								<td class="center-block cart_delete">
									<a class="cart_quantity_delete" href={{"deleteproduct/".$product->id}} ><i class="fa fa-times"></i></a>
								</td>
								<td ></td>
							</tr>
						@endforeach		
							<tr>
								<td class=" cart_product">
									
								</td>
								<td class="text-center image">
									
								</td>
								<td class="text-center price">
									<a class="btn get text-info" href="addproduct" >Add +</a>	
									
								</td>
								<td class="text-center cart_description">
								</td>

								<td class="text-center cart_total">
								</td>
								<td class="center-block cart_delete">
								</td>
							</tr>			
					</tbody>
				</table>
						
					<?php 
						if($arrayProduct==null){
							echo "<h3 class = \"text-center text-info\">Product Anda Kosong</h3>";
						}
					 ?>
			</div>
		</div>
	</section> <!--/#cart_items-->
	
@stop