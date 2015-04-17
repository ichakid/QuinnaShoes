<?php 
	use App\Product; 
	use App\Penjualan; 
	use App\Pesanan;
	use App\User; 
	function writeHarga($harga){
		$result = "";
		$n = strlen($harga);
		for ($i=$n; $i>3; $i -= 3){
			$result = "." . substr($harga, $i-3, 3) . $result;
		}
		$result = substr($harga, 0, $i) . $result;
		return $result;
	}
?>

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
			<h3 class="text text-center">Data Penjualan</h3>
			<br>
		</div>	
			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="text-center image">Design</td>
							<td class="text-center price">Nama Pembeli</td>
							<td class="text-center description">Jumlah Item</td>
							<td class="text-center price">Pendapatan</td>
							<td ></td>
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
						@foreach ($arrayPenjualan as $penjualan)
							<?php 
								$pesanan = Pesanan::find($penjualan->id_pesanan);
								$user = User::find($penjualan->id_user);
							 ?>
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
									<p>{{$user->nama}}</p>
								</td>
								<td class="text-center cart_price"><p>{{$pesanan->jumlah}}</p>
								</td>
								<td class="text-center cart_price"><p>{{"Rp ".writeHarga($penjualan->total_bayar).",-"}}</p>
								</td>
								<td ></td>
							</tr>
						@endforeach
						
					</tbody>
				</table>
					<?php 
						
						if(count($arrayPenjualan)==0 && \Session::get('peran')==1){
							echo "<h3 class = \"text-center text-info\">Tidak Ada Penjualan</h3>";
							echo "<div class=\"row text-center\">
								</div> <br>";
						}
					 ?>
			</div>
		</div>
	</section> <!--/#cart_items-->
	
@stop