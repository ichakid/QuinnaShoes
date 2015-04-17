@extends("layouts.master")

@section('middle')
<div class="header-bottom"><!--header-bottom-->
			<div class="container">
				<div class="row">
					<div class="col-sm-9">
						<div class="mainmenu pull-left">
							<ul class="nav navbar-nav collapse navbar-collapse">
								<li><a href="index.html" class="active">Home</a></li>
								
								<li class="dropdown"><a href="#">Blog<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        <li><a href="blog.html">Blog List</a></li>
										<li><a href="blog-single.html">Blog Single</a></li>
                                    </ul>
                                </li> 
								<li><a href="404.html">404</a></li>
								<li><a href="contact-us.html">Contact</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="search_box pull-right">
							<input type="text" placeholder="Search"/>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-bottom-->
	</header><!--/header-->
	
@stop
<?php
	 $n = 1;
	 $m = 1;
?>
@section('slider')
		<section id="slider"><!--slider-->
			<div class="row">
				<div class="col-sm-12">
					<div id="slider-carousel" class="carousel slide" data-ride="carousel">
						
						<ol class="carousel-indicators">
								<li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
							@foreach ($arrayProductSlider as $productS )
								<?php if( $m < count($arrayProductSlider )){  ?>
											<li data-target="#slider-carousel" data-slide-to={{$m}}></li>
								<?php }
								$m++ ?>
							@endforeach
						</ol>
					
						<div class="carousel-inner">
						
						<style>
							img.slider{
							    height:300px;
							}
						</style>
						@foreach ($arrayProductSlider as $productS)
							<?php 
								if($n==1) {
									echo "<div class=\"item active\">";
								}else{
									echo "<div class=\"item\">";
								}
							?>
								<div class="col-sm-6">
									<h1><span>Q</span>-SHOES</h1>
									<h2> Trusted Shoes Online Store</h2>
									<p>We accept single shoes order and even big scale order</p>
									<div class="row ">
										<div class="col-sm-2"></div>
										<a type="button" href={{"confirm/".$productS->id}} class="btn btn-default get">Get it now</a>
										<a type="button " class="btn-info btn" href="orderbydesign" class="btn btn-default get">Order by Design</a>
									</div>
								</div>
								<div class="col-sm-6">
									<img class="slider" src="{{"images/home/".$productS->nama_gambar}}"  class="girl img-responsive" alt="" />
									<img src="images/home/pricing.png"  class="pricing" alt="" />
								</div>
							</div>
							<?php $n++ ?>
						@endforeach
							
						</div>
						
						<a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
							<i class="fa fa-angle-left"></i>
						</a>
						<a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
							<i class="fa fa-angle-right"></i>
						</a>
					</div>
					
				</div>
	</section><!--/slider-->
	<br>
				<br>
				<hr>
@stop


@section('content')
	
	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<div class="left-sidebar">
						<h2>Shoes Category</h2>
						<div class="panel-group category-products" id="accordian"><!--category-productsr-->
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a data-toggle="collapse" data-parent="#accordian" href="#sportswear">
											<span class="badge pull-right"><i class="fa fa-plus"></i></span>
											Unique
										</a>
									</h4>
								</div>
								<div id="sportswear" class="panel-collapse collapse">
									<div class="panel-body">
										<ul>
											<li><a href="#">Mens </a></li>
											<li><a href="#">Woman </a></li>
											<li><a href="#">Kids </a></li>
										</ul>
									</div>
								</div>
							</div>
							
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="#">Sportwear</a></h4>
								</div>
							</div>

							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="#">Fashion</a></h4>
								</div>
							</div>

							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="#">Daily Life</a></h4>
								</div>
							</div>
						</div><!--/category-products-->
				
					
					</div>
				</div>
				
				<div class="col-sm-9 padding-right">
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center">Hot Items</h2>
						<style>
							img.hot_item{
							    height:268px%;
							    width:249px;
							}
						</style>
						@foreach ($arrayProductHotItem as $productHI)
					        <div class="col-sm-4">
								<div class="product-image-wrapper">
									<div class="single-products">
											<div class="productinfo text-center">
												<img class="hot_item" src="{{"images/home/".$productHI->nama_gambar}}" alt="" />
												<h2>{{"Rp ".$productHI->harga.",-"}}</h2>
												<p>{{$productHI->model}}</p>
												<a href={{"confirm/".$productHI->id}}  class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
											</div>
											<div class="product-overlay">
												<div class="overlay-content">
												<a href={{"detail/".$productHI->id}} >
													<img class="hot_item"  src="{{"images/home/".$productHI->nama_gambar}}" alt="" /></a>
													<h2>{{"Rp ".$productHI->harga.",-"}}</h2>
													<p>{{$productHI->model}}</p>
													<a href={{"confirm/".$productHI->id}} class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
												</div>
											</div>
									</div>
								</div>
							</div>
						@endforeach
						
						
						
					</div><!--features_items-->

				</div>
			</div>
		</div>
	</section>
@stop