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
				<div class = "text-center text-info"><h4>Apakah Anda yakin ingin keluar?</h4></div>
				<br>
				<div class="text-center">
					<a href="clean" role="button" class="btn get" >Iya</a>
					<a href="home" data-dismiss="modal" class="btn btn-info">Tidak</a>
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