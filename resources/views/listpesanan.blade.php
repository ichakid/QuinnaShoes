<?php use App\Product; ?>

@extends("layouts.master")

@section('content')

	<section id="cart_items">

		<div class="container">
		<div class="breadcrumbs">
			<ol class="breadcrumb">
			  <li><a href="home">Home</a></li>
			  <li class="active">Shopping Order</li>
			</ol>
		</div>
		<div class = "row text-center">
			<h3 class="text text-center">{{$str}}</h3>
			<br>
		</div>	
			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="text-center image">Design</td>
							<td class="text-center description">Description</td>
							<td class="text-center price">Quantity</td>
							<td class="text-center total">Size</td>
							<?php if(\Session::get('peran')==1){
								echo "<td class=\"text-center price\">Update</td>";
								echo "<td class=\"text-center price\">Action</td>";
								}else{
									echo "<td class=\"text-center price\">Status</td>";
								}
							 ?>
							<td >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
							<td ></td>
						</tr>
					</thead>
					<tbody>
					
						<style>
							img.pesanimg{
							    width:100%;
							    max-width:110px;
							    padding-left:0 none;
							    margin-left:0px;
							}
						</style>
						@foreach ($arrayPesanan as $pesanan)
							<tr>
								<td class="row cart_product">
									<div class="text-center ">
										<a href=""><img class="pesanimg"  src="{{"images/pesanan/".$pesanan->nama_gambar}}" alt=""></a>
									</div>
									<p>	</p>
									<div class="text-center">
										<?php if($pesanan->tipe == 'cart'){ ?>
											<a type="button" href={{"detailcart/".$pesanan->id}} class="btn btn-default get">Detail</a>
										<?php }else{ ?>
											<a type="button" href={{"detailpesanan/".$pesanan->id}} class="btn btn-default get">Detail</a>
										<?php } ?>
									</div>
								</td>
								<td class="text-center cart_description">
									<p>{{$pesanan->deskripsi_pemesanan}}</p>
								</td>
								<td class="text-center cart_price"><p>{{$pesanan->jumlah}}</p>
								</td>
								<td class="text-center cart_price"><p>{{$pesanan->deskripsi_ukuran}}</p>
								</td>
								</td>
								<td class="text-center cart_price"><p>{{$pesanan->status}}</p>
								</td>
								<?php if($pesanan->status=="Pending" && (\Session::get('peran')==1)){?>
								<td class="text-center cart_price">
									<p>
										<a type="button" href={{"acceptpesanan/".$pesanan->id}} class="btn btn-default get">Accept</a>
									</p>
								</td>
								<?php }?>

								<?php if($pesanan->status=="Diterima" && (\Session::get('peran')==1)){?>
								<td class="text-center cart_price">
									<p>
										<a type="button" href={{"finishpesanan/".$pesanan->id}} class="btn btn-default get">Finish</a>
									</p>
								</td>
								<?php }?>

								<td class="text-center cart_price">
									<p class ="cart_delete">
										<a class="cart_quantity_delete" href={{"deletepesanan/".$pesanan->id}} ><i class="fa fa-times"></i></a>
									</p>
								</td>
								<td ></td>
							</tr>
						@endforeach
						
					</tbody>
				</table>
					<?php 
						if($arrayPesanan==null && \Session::get('peran')==2){
							echo "<h3 class = \"text-center text-info\">Anda Belum Melakukan Pemesanan</h3>";
							echo "<div class=\"row text-center\">
								<a type=\"button \" class=\"  btn-info btn\" href=\"orderbydesign\" class=\"btn btn-default get\">Order by Design</a>
								</div> <br>";
						}
						if($arrayPesanan==null && \Session::get('peran')==1){
							echo "<h3 class = \"text-center text-info\">Tidak Ada Pemesanan</h3>";
							echo "<div class=\"row text-center\">
								</div> <br>";
						}
					 ?>
			</div>
		</div>
	</section> <!--/#cart_items-->
	
@stop