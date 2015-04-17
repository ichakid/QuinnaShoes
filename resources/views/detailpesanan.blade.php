<?php use App\Product; 
	use App\User; 
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
				<img class = "detail" src="{{"images/pesanan/".$pesanan->nama_gambar}}"  class="girl img-responsive" alt="" />
			</div>
			<?php 
				$user =  DB::table('user')
                    ->where('id', $pesanan->id_user)
                    ->first();
			 ?>
			<div class="col-sm-8">
				<div class="panel-group category-products" id="accordian"><!--category-productsr-->
					<div class="panel panel-default">
						<div class="panel-heading col-sm-4">
							<h4 class="text-info ">Nama Pemesan</h4>
						</div>
						<div class="panel-heading col-sm-8">
							<h4 class="text-info ">{{$user->nama}}</h4>
						</div>
					</div>	
					<div class="panel panel-default">
						<div class="panel-heading col-sm-4">
							<h4 class="text-info ">Deskripsi Pemesanan</h4>
						</div>
						<div class="panel-heading col-sm-8">
							<h4 class="text-info ">{{$pesanan->deskripsi_pemesanan}}</h4>
						</div>
					</div>
					<div class="panel panel-default">
						<div class="panel-heading col-sm-4">
							<h4 class="text-info ">Tanggal Akhir Pembuatan</h4>
						</div>
						<div class="panel-heading col-sm-8">
							<h4 class="text-info ">{{$pesanan->deadline}}</h4>
						</div>
					</div>
					<div class="panel panel-default">
						<div class="panel-heading col-sm-4">
							<h4 class="text-info ">Alamat Pemesan</h4>
						</div>
						<div class="panel-heading col-sm-8">
							<h4 class="text-info ">{{$pesanan->alamat}}</h4>
						</div>
					</div>
					<div class="panel panel-default">
						<div class="panel-heading col-sm-4">
							<h4 class="text-info ">Jenis Pembayaran</h4>
						</div>
						<div class="panel-heading col-sm-8">
							<h4 class="text-info ">{{$pesanan->jenis_pembayaran}}</h4>
						</div>
					</div>
					<div class="panel panel-default">
						<div class="panel-heading col-sm-4">
							<h4 class="text-info ">Deskripsi Ukuran</h4>
						</div>
						<div class="panel-heading col-sm-8">
							<h4 class="text-info ">{{$pesanan->deskripsi_ukuran}}</h4>
						</div>
					</div>
					<div class="panel panel-default">
						<div class="panel-heading col-sm-4">
							<h4 class="text-info ">Jumlah Sepatu</h4>
						</div>
						<div class="panel-heading col-sm-8">
							<h4 class="text-info ">{{$pesanan->jumlah}}</h4>
						</div>
					</div>
					<div class="panel panel-default">
						<div class="panel-heading col-sm-4">
							<h4 class="text-info ">Nomor Telepon</h4>
						</div>
						<div class="panel-heading col-sm-8">
							<h4 class="text-info ">{{$pesanan->no_telepon}}</h4>
						</div>
					</div>
					<div class="panel panel-default">
						<div class="panel-heading col-sm-4">
							<h4 class="text-info ">Status Pesanan</h4>
						</div>
						<div class="panel-heading col-sm-8">
							<h4 class="text-info ">{{$pesanan->status}}</h4>
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