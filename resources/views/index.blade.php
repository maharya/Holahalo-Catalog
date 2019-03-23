@extends('layouts.app')

@section('stylesheets')
@endsection

@section('content')

<!-- letest product section -->
<section class="top-letest-product-section">
	<div class="container">
		<div class="section-title">
			<h2>Produk Terbaru </h2>
		</div>
		<div class="product-slider owl-carousel">
			@foreach($products as $product)
			<div class="product-item">
				<div class="pi-pic">
				<div style="width: 150px; height: 200px; background-size: cover; background-repeat: no-repeat; 
				background-image: url('{{{ URL::asset('img/product/'.$product->url_pict)}}}');
				background-position: 50% 50%;">
				</div>
					<!-- <img src="{{{ URL::asset('img/product/'.$product->url_pict)}}}" alt=""> -->
					<div class="pi-links">
						<a href="{{route('product.detail', $product->id)}}" class="add-card"><i class="flaticon-bag"></i><span>DETAIL</span></a>
					</div>
				</div>
				<div class="pi-text">
					<p>{{$product->name}}</p>
				</div>
			</div>
			@endforeach
		</div>
	</div>
</section>
<!-- letest product section end -->

@endsection

@section('scripts')
@endsection