<?php use App\Product; 
	use App\User; 
	use App\DetailPemesanan;
?>

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
		<h3 class="text-info text-center">Detail Pesanan</h3>
	</div>	
		<div class="row container">

			<style>
				img.detail{
				    width:100%;
				    max-width:200px;
				}
			</style>
			<div class="col-sm-1"></div>
			<div class="col-sm-3">
				<img class = "detail" src="images/pesanan/cart.png"  class="girl img-responsive" alt="" />
			</div>

			<?php 
				$user =  DB::table('user')
                    ->where('id', $detailPemesanan->id_user)
                    ->first();
			 ?>
			<div class="col-sm-8">
				<div class="panel-group category-products" id="accordian"><!--category-productsr-->
					<div class="panel panel-default">
						<div class="panel-heading col-sm-4">
							<h4 class="text-info ">ID Pemesan</h4>
						</div>
						<div class="panel-heading col-sm-8">
							<h4 class="text-info ">{{$detailPemesanan->id_user}}</h4>
						</div>
					</div>	
					<div class="panel panel-default">
						<div class="panel-heading col-sm-4">
							<h4 class="text-info ">Nama Pemesan</h4>
						</div>
						<div class="panel-heading col-sm-8">
							<h4 class="text-info ">{{$detailPemesanan->nama_pemesan}}</h4>
						</div>
					</div>	
					<div class="panel panel-default">
						<div class="panel-heading col-sm-4">
							<h4 class="text-info ">Telepon Pemesanan</h4>
						</div>
						<div class="panel-heading col-sm-8">
							<h4 class="text-info ">{{$detailPemesanan->telepon_pemesan}}</h4>
						</div>
					</div>
					<div class="panel panel-default">
						<div class="panel-heading col-sm-4">
							<h4 class="text-info ">Email Pemesan</h4>
						</div>
						<div class="panel-heading col-sm-8">
							<h4 class="text-info ">{{$detailPemesanan->email_pemesan}}</h4>
						</div>
					</div>
					<div class="panel panel-default">
						<div class="panel-heading col-sm-4">
							<h4 class="text-info ">Alamat Pemesan</h4>
						</div>
						<div class="panel-heading col-sm-8">
							<h4 class="text-info ">{{$detailPemesanan->alamat1_pemesan}}</h4>
						</div>
					</div>
					<div class="panel panel-default">
						<div class="panel-heading col-sm-4">
							<h4 class="text-info "></h4>
						</div>
						<div class="panel-heading col-sm-8">
							<h4 class="text-info ">{{$detailPemesanan->alamat2_pemesan}}</h4>
						</div>
					</div>
					<div class="panel panel-default">
						<div class="panel-heading col-sm-4">
							<h4 class="text-info ">Nama Penerima</h4>
						</div>
						<div class="panel-heading col-sm-8">
							<h4 class="text-info ">{{$detailPemesanan->nama_penerima}}</h4>
						</div>
					</div>	
					<div class="panel panel-default">
						<div class="panel-heading col-sm-4">
							<h4 class="text-info ">Telepon Penerima</h4>
						</div>
						<div class="panel-heading col-sm-8">
							<h4 class="text-info ">{{$detailPemesanan->telepon_penerima}}</h4>
						</div>
					</div>
					<div class="panel panel-default">
						<div class="panel-heading col-sm-4">
							<h4 class="text-info ">Email Penerima</h4>
						</div>
						<div class="panel-heading col-sm-8">
							<h4 class="text-info ">{{$detailPemesanan->email_penerima}}</h4>
						</div>
					</div>
					<div class="panel panel-default">
						<div class="panel-heading col-sm-4">
							<h4 class="text-info ">Alamat Pemesan</h4>
						</div>
						<div class="panel-heading col-sm-8">
							<h4 class="text-info ">{{$detailPemesanan->alamat1_penerima}}</h4>
						</div>
					</div>

					<div class="panel panel-default">
						<div class="panel-heading col-sm-4">
							<h4 class="text-info ">Negara Penerima</h4>
						</div>
						<div class="panel-heading col-sm-8">
							<h4 class="text-info ">{{$detailPemesanan->negara_penerima}}</h4>
						</div>
					</div>
					<div class="panel panel-default">
						<div class="panel-heading col-sm-4">
							<h4 class="text-info ">Propinsi Penerima</h4>
						</div>
						<div class="panel-heading col-sm-8">
							<h4 class="text-info ">{{$detailPemesanan->propinsi_penerima}}</h4>
						</div>
					</div>
					<div class="panel panel-default">
						<div class="panel-heading col-sm-4">
							<h4 class="text-info ">Kode Pos Penerima</h4>
						</div>
						<div class="panel-heading col-sm-8">
							<h4 class="text-info ">{{$detailPemesanan->kode_pos_penerima}}</h4>
						</div>
					</div>
					<div class="panel panel-default">
						<div class="panel-heading col-sm-4">
							<h4 class="text-info ">Catatan Tambahan</h4>
						</div>
						<div class="panel-heading col-sm-8">
							<h4 class="text-info ">{{$detailPemesanan->catatan_tambahan}}</h4>
						</div>
					</div>
				</div><!--/category-products-->
			</div>
		</div>

		<div class="text-center">
			<a type="button" href={{ URL::previous() }} class="btn btn-default get">Back</a>
		</div>
</div>
	<br>
	<br>

@stop