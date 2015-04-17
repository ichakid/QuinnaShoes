<?php 
	use App\Product;
	use App\DetailPemesanan; 
	$total_bayar = 0;
	$total_jumlah = 0;
	$jumlah_item = 0;
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
				  <li><a href="#">Home</a></li>
				  <li class="active">Check out</li>
				</ol>
			</div><!--/breadcrums-->
			
			
				
			<div class="row text-center">
				<h3>Detail Information</h3>
				<hr>
				<label class = "text-center"><i> Fill the column and click Submit Data to continue checking out! </i></label>
			
			</div>

			<div class="shopper-informations">
				<div class="row">
					<div class="col-sm-1"></div>
					<div class="col-sm-3">

						<div class="bill-to">
							<p class="text-center">Billing</p>
							<div class="form-one">
								{!! Form::open(['url'=>"checkoutdata", 'method'=>'PATCH'])!!}
								<?php if(\Session::get('id_data_saved')==0) {?>
									<input type="text" name = "nama_pemesan" placeholder="Name" required>
									<input type="text" name = "telepon_pemesan" placeholder="Phone Number" required>
									<input type="email" name = "email_pemesan" placeholder="Email" required>
									<input type="text" name = "alamat1_pemesan" placeholder="Address 1 " required>
									<input type="text" name = "alamat2_pemesan" placeholder="Address 2">
								<?php }else{ ?>
									<?php 
										$data = DetailPemesanan::find(\Session::get('id_data_saved'));
									 ?>
									<input type="text" value = "{{$data->nama_pemesan}}" name = "nama_pemesan" placeholder="Name" readonly>
									<input type="text" value = "{{$data->telepon_pemesan}}" name = "telepon_pemesan" placeholder="Phone Number" readonly>
									<input type="text" value = "{{$data->email_pemesan}}" name = "email_pemesan" placeholder="Email" readonly>
									<input type="text" value = "{{$data->alamat1_pemesan}}" name = "alamat1_pemesan" placeholder="Address 1 " readonly>
									<input type="text" value = "{{$data->alamat2_pemesan}}" name = "alamat2_pemesan" placeholder="Address 2" readonly>
								<?php } 
								?>
							</div>
							
						</div>
					</div>
					<div class="col-sm-3">
						<div class="bill-to">
								<p class="text-center">Shipping</p>
							<div class="form-two">
								<form >
								<?php if(\Session::get('id_data_saved')==0) {?>
									<input type="text" name="nama_penerima" placeholder="Receiver Name" required>
									<input type="text" name="telepon_penerima" placeholder="Receiver's Phone Number" required>
									<input type="email" name="email_penerima" placeholder="Receiver's email">
									<input type="text" name="alamat_penerima" placeholder="Shipping Address" required>
									<select name="negara_penerima">
										<option>Indonesia</option>
									</select>
									<select name="propinsi_penerima">
										<option>Jawa Timur</option>
										<option>Jawa Barat</option>
										<option>Banten</option>
										<option>Jakarta</option>
									</select>
									<input type="number"  name="kode_pos_penerima" placeholder="Zip / Postal Code" required>
								<?php }else{ ?>
									<input type="text"  value="{{$data->nama_penerima}}" name="nama_penerima" placeholder="Receiver Name"  readonly>
									<input type="text" value="{{$data->telepon_penerima}}" name="telepon_penerima" placeholder="Receiver's Phone Number"  readonly>
									<input type="text" value="{{$data->email_penerima}}" name="email_penerima" placeholder="Receiver's email"  readonly>
									<input type="text" value="{{$data->alamat_penerima}}" name="alamat_penerima" placeholder="Shipping Address"  readonly>
									<select v name="negara_penerima" readonly>
										<option>{{$data->negara_penerima}}</option>
									</select>
									<select name="propinsi_penerima" readonly>
										<option>{{$data->propinsi_penerima}}</option>
									</select>
									<input type="text"  value="{{$data->kode_pos_penerima}}" name="kode_pos_penerima" placeholder="Zip / Postal Code"  readonly>
								<?php } 
								?>
							</div>
						</div>
					</div>	

					<div class="col-sm-4">
						<div class="order-message">
							<p class="text-center">Notes Order</p>
							<?php if(\Session::get('id_data_saved')==0) {?>
								<textarea name="catatan_tambahan"  placeholder="Notes about your order, Special Notes for Delivery" rows="16"></textarea>
							<?php }else{ ?>
								<textarea name="catatan_tambahan"  placeholder= "{{$data->catatan_tambahan}}" rows="16" readonly></textarea>
							<?php }
							 ?>
						</div>

					</div>				
				</div>
				<div class=" text-center row">
					<?php if(\Session::get('id_data_saved')==0) {?>
						<label ><input type="checkbox" required> I declare that this data is true</input></label>
					<?php } ?>

				</div>
				<?php if(\Session::get('id_data_saved')==0) {?>
					<div class="row text-center">
						<div class="col-sm-5"></div>
						<div class=" center-block  col-sm-2">
							<button type="submit" class="btn btn-default check_out" >Submit Data</button>	
						</div>
					</div>
				<?php } 
				?>
				{!!Form::close()!!}
				
			</div>
			<div class="review-payment">
				<h2>Review & Total Payment</h2>
			</div>
<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="text-center image">Item</td>
							<td class="text-center description">Description</td>
							<td class="text-center price">Price</td>
							<td class="text-center quantity">Quantity</td>
							<td class="text-center total">Size</td>
							<td class="text-center total">Total</td>
							<td></td><td ></td>
						</tr>
					</thead>
					<tbody>
					
						<style>
							img.cartimg{
							    width:100%;
							    max-width:70px;
							    margin-left:0px;
							}
						</style>
						@foreach ($isiCart as $pesanan)
							<?php 
								$product = Product::find($pesanan->id_product);
								$bayar = $product->harga*$pesanan->jumlah;
								$total_bayar =  $total_bayar + $bayar;
								$total_jumlah = $total_jumlah + $pesanan->jumlah;
								$jumlah_item = $jumlah_item + 1;
							 ?>

							<tr>
								<td class=" cart_product">
									<a href=""><img class="cartimg"  src="{{"images/home/".$product->nama_gambar}}" alt=""></a>
								</td>
								<td class="text-center cart_description">
									<h4><a href="">{{$product->model}}</a></h4>
									<p>Web ID: 1089772</p>
								</td>
								<td class="text-center cart_price">
									<p>{{"Rp  ".writeHarga($product->harga).",-"}}</p>
								</td>
								<td class="text-center cart_price"><p>{{$pesanan->jumlah}}</p>
								</td>
								<td class="text-center cart_price"><p>{{$pesanan->ukuran}}</p>
								</td>
								<td class="text-center cart_total">
									<p class="cart_total_price">{{"Rp  ".writeHarga($bayar).",-"}}</p>
								</td>
								<td class="text-center cart_price">
									<p class ="cart_delete">
										<a class="cart_quantity_delete" href={{"delete/".$product->id}} ><i class="fa fa-times"></i></a>
									</p>
								</td>
								<td ></td>
							</tr>
						@endforeach
						
					

						<tr>
							<td colspan="4">&nbsp;</td>
							<td colspan="2">
								<table class="table table-condensed total-result">
									<tr>
										<td>Cart Sub Total</td>
										<td>{{"Rp ".writeHarga($total_bayar).",-"}}</td>
									</tr>
									<tr class="shipping-cost">
										<td>Shipping Cost</td>
										<td>Rp 0,-</td>										
									</tr>
									<tr>
										<td>Total</td>
										<td><span>{{"Rp ".writeHarga($total_bayar).",-"}}</span></td>
									</tr>
								</table>
							</td>
						</tr>
						<tr>
						
						</tr>
					</tbody>
				</table>
					<?php 
					
						if($isiCart==null){
							echo "<h3 class = \"text-center text-info\">Keranjang Anda Kosong</h3>";
						}else{
							if(\Session::get('id_data_saved')!=0){ 

					?>
						{!! Form::open(['url'=>"confirmedcheckout", 'method'=>'PATCH'])!!}
							<input type="hidden" value="{{$total_bayar}}" name="total_bayar">
							<input type="hidden" value="{{$total_jumlah}}" name="total_jumlah">
							<input type="hidden" value="{{$jumlah_item}}" name="jumlah_item">
								<div class="row text-center">
									<div class="col-sm-5"></div>
									<div class=" center-block  col-sm-2">
										<button type="submit" class="btn btn-default check_out" >Buy Now</button>	
									</div>
								</div>

						{!!Form::close()!!}
					<?php			
							\Session::put('id_saved_data',0);
							}
						}
					 ?>
					
					 <p></p>
			</div>

		</div>
	</section> <!--/#cart_items-->

	
@stop