@extends('master')
@section('content')
	<div class="rev-slider">
		<div class="fullwidthbanner-container">
						<div class="fullwidthbanner">
							<div class="bannercontainer" >
						    <div class="banner" >
									<ul>
										<!-- THE FIRST SLIDE -->
										@foreach($slide as $sl)
										<li data-transition="boxfade" data-slotamount="20" class="active-revslide" style="width: 100%; height: 100%; overflow: hidden; z-index: 18; visibility: hidden; opacity: 0;">
							            <div class="slotholder" style="width:100%;height:100%;" data-duration="undefined" data-zoomstart="undefined" data-zoomend="undefined" data-rotationstart="undefined" data-rotationend="undefined" data-ease="undefined" data-bgpositionend="undefined" data-bgposition="undefined" data-kenburns="undefined" data-easeme="undefined" data-bgfit="undefined" data-bgfitend="undefined" data-owidth="undefined" data-oheight="undefined">
														<div class="tp-bgimg defaultimg" data-lazyload="undefined" data-bgfit="cover" data-bgposition="center center" data-bgrepeat="no-repeat" data-lazydone="undefined" src="images/slide/{{$sl->image}}" data-src="images/slide/{{$sl->image}}" style="background-color: rgba(0, 0, 0, 0); background-repeat: no-repeat; background-image: url('images/slide/{{$sl->image}}'); background-size: cover; background-position: center center; width: 100%; height: 100%; opacity: 1; visibility: inherit;">
														</div>
													</div>

							        	</li>
										@endforeach

									</ul>
								</div>
							</div>

							<div class="tp-bannertimer"></div>
						</div>
		</div>
					<!--slider-->
	</div>
	<div class="container">
			<div id="content" class="space-top-none">
				<div class="main-content">
					<div class="space60">&nbsp;</div>
					<div class="row">
						<div class="col-sm-12">
							<div class="beta-products-list">
								<h4>New Products</h4>
								<div class="beta-products-details">
									<p class="pull-left">There are {{iterator_count($newProduct)}} products</p>
									<div class="clearfix"></div>
								</div>
						
								<div class="row"><?php $i=0?>
									@foreach($newProduct as $np)
									<?php $i++;?>
									<div class="col-sm-3">
										<div class="single-item">
											<div class="single-item-header">
												<a href="chitiet-sanpham/{{$np->id}}"><img src="images/products/{{$np->image}}" alt="" height="250px"></a>
											</div>
											<div class="single-item-body">
												<p class="single-item-title">{{$np->name}}</p>
												<p class="single-item-price">
													<span>{{$np->unit_price}}</span>
												@if($np->promotion_price>0)	
													<span class="flash-del">{{$np->unit_price}}</span>
													<span class="flash-sale">{{$np->promotion_price}}</span>
												@endif	
												</p>
											</div>
											<div class="single-item-caption">
												<a class="add-to-cart pull-left" href="add-to-cart/{{$np->id}}"><i class="fa fa-shopping-cart"></i></a>
												<a class="beta-btn primary" href="chitiet-sanpham/{{$np->id}}">Details <i class="fa fa-chevron-right"></i></a>
												<div class="clearfix"></div>
											</div>
										</div>
									</div>
									@if($i % 4 == 0){{--check if a number is divisible by 4 --}}
									<div class="space40">&nbsp;</div>
									<div class="space40">&nbsp;</div>
									@endif
									@endforeach
								</div>
							</div>
						</div> <!-- .beta-products-list -->

							<div class="space50">&nbsp;</div>

							<div class="beta-products-list">
								<h4>Top Products</h4>
								<div class="beta-products-details">
									<p class="pull-left">438 styles found</p>
									<div class="clearfix"></div>
								</div>
								<div class="row"><?php $i=0?>
									@foreach($topProduct as $tp)
									<?php $i++;?>
									<div class="col-sm-3">
										<div class="single-item">
											<div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>

											<div class="single-item-header">
												<a href="product.html"><img src="images/products/{{$tp->image}}" alt=""height="250px"></a>
											</div>
											<div class="single-item-body">
												<p class="single-item-title">{{$tp->name}}}</p>
												<p class="single-item-price">
													<span class="flash-del">{{$tp->unit_price}}}</span>
													<span class="flash-sale">{{$tp->promotion_price}}}</span>
												</p>
											</div>
											<div class="single-item-caption">
												<a class="add-to-cart pull-left" href="add-to-cart/{{$tp->id}}"><i class="fa fa-shopping-cart"></i></a>
												<a class="beta-btn primary" href="chitiet-sanpham/{{$tp->id}}">Details <i class="fa fa-chevron-right"></i></a>
												<div class="clearfix"></div>
											</div>
										</div>
									</div>
									@if($i % 4 == 0) 
										<div class="space40">&nbsp;</div>
										<div class="space40">&nbsp;</div>
									@endif
									@endforeach
								</div>

							</div> <!-- .beta-products-list -->
						</div>
					</div> <!-- end section with sidebar and main content -->

				</div> <!-- .main-content -->
			</div> <!-- #content -->
	</div> <!-- .container -->
@endsection	