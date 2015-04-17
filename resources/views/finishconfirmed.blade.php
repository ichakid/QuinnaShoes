<?php use App\pesanan; 
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
<div class="container">
	<div class="breadcrumbs">
		<ol class="breadcrumb">
		  <li><a href="home">Home</a></li>
		  <li class="active">Logout</li>
		</ol>
	</div>
			<div class="row">
				<div class = "text-center text-info"><h4>Masukkan jumlah total pendapatan dari penjualan ini!</h4></div>
				<br>
				<div class="row">
				<div class="col-sm-2 col-sm-offset-1"></div>
				<div class="col-sm-4 col-sm-offset-1">
					<div class="login-form"><!--login form-->
						{!! Form::open(['url'=>"finishconfirmed", 'method'=>'PATCH'])!!}
						<?php 
							$pesanan = Pesanan::find(\Session::get('id_pesanan_finish'));
						 	if ($pesanan->tipe != "cart"){
						 ?>
							<input type="number" class="text-center"  name="total_bayar" placeholder="Total Pendapatan (Rp xxx)" required/>
						<?php }else{ ?>
							<input type="text" class="text-center" name="total_bayar" value="{{$pesanan->total_bayar}}" placeholder="{{"Rp ".$pesanan->total_bayar.",-"}}" readonly/>
						<?php } ?>
						<div class="row text-center">
							<div class="col-sm-3"></div>
							<div class=" center-block  col-sm-6">
								<button type="submit" class="btn btn-default check_out" >Confirm</button>	
							</div>
						</div>
						{!!Form::close()!!}
					</div><!--/login form-->
				</div>
			</div>
			</div>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	
@stop