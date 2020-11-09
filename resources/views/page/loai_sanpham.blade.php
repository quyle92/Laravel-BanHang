@extends('master')
@section('content')
	<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">Sản phẩm</h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb font-large">
					<a href="index.html">Home</a> / <span>Sản phẩm</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	<div class="container">
		<div id="content" class="space-top-none">
			<div class="main-content">
				<div class="space60">&nbsp;</div>
				<div class="row">
					<div class="col-sm-3">
						<ul class="aside-menu">
							@foreach($danh_sach_loaisp as $dslsp)
							<li><a href="loaisp/{{$dslsp->id}}">{{$dslsp->name}}</a></li>
							@endforeach
						</ul>
					</div>
					<div class="col-sm-9">
						<div class="beta-products-list">
							<h4>{{$loai_sp->first()->name}}</h4>{{--can use this: {{$loai_sp[0]->name}} or $loai_sp[0]['name'] --}}
							<div class="beta-products-details">
								<p class="pull-left">{{$list_sp->total()}} products found</p>
								<div class="clearfix"></div>
							</div>

							<div class="row">
								@foreach($list_sp as $lsp)
								<div class="col-sm-4">
									<div class="single-item">
										<div class="single-item-header">
											<a href="chitiet-sanpham/{{$lsp->id}}"><img src="images/products/{{$lsp->image}}" alt="" height="250px"></a>
										</div>
										<div class="single-item-body">
											<p class="single-item-title">{{$lsp->name}}</p>
											<!-- {{$lsp['name']}} -->
											<p class="single-item-price"> 
												<span>{{number_format($lsp->unit_price,0,",",".")}}đ</span>
											</p>
										</div>
										<div class="single-item-caption">
											<a class="add-to-cart pull-left" href="add-to-cart/{{$lsp->id}}"><i class="fa fa-shopping-cart"></i></a>
											<a class="beta-btn primary" href="chitiet-sanpham/{{$lsp->id}}">Details <i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div>
										</div>
									</div>
								</div>
								@endforeach
							</div>
							 {!!$list_sp->appends(['query' =>Str::slug($loai_sp[0]->name)])->links()!!}
						</div> <!-- .beta-products-list -->

						<div class="space50">&nbsp;</div>

						<div class="beta-products-list">
							<h4>Top Products</h4>
							<div class="beta-products-details">
								<p class="pull-left">{{$top_sp->total()}} products found</p>
								<div class="clearfix"></div>
							</div>
							<div class="row">
								@foreach($top_sp as $tsp)
								<div class="col-sm-4">
									<div class="single-item">
										<div class="single-item-header">
											<a href="chitiet-sanpham/{{$tsp->id}}"><img src="images/products/{{$tsp->image}}" alt="" height="250px"></a>
										</div>
										<div class="single-item-body">
											<p class="single-item-title">{{$tsp->name}}</p>
											<p class="single-item-price">
												<span>$34.55</span>
											</p>
										</div>
										<div class="single-item-caption">
											<a class="add-to-cart pull-left" href="add-to-cart/{{$tsp->id}}"><i class="fa fa-shopping-cart"></i></a>
											<a class="beta-btn primary" href="chitiet-sanpham/{{$tsp->id}}">Details <i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div>
										</div>
									</div>
								</div>
								@endforeach
							</div>
							<div class="space40">&nbsp;</div>
							 {!!$top_sp->appends(['query' =>'top-sp'])->links()!!}
						</div> <!-- .beta-products-list -->
					</div>
				</div> <!-- end section with sidebar and main content -->


			</div> <!-- .main-content -->
		</div> <!-- #content -->
	</div> <!-- .container -->
@endsection	