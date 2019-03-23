@extends('layouts.app')

@section('stylesheets')
@endsection

@section('content')
<!-- Page info -->
<div class="page-top-info">
    <div class="container">
        <h4>Produk</h4>
        <div class="site-pagination">
            <a href="javascript:void(0);">Detail Produk</a>
        </div>
    </div>
</div>
<!-- Page info end -->


<!-- product section -->
<section class="product-section">
    <div class="container">
        <div class="back-link">
            <a href="{{route('product.all')}}"> &lt;&lt; Kembali Ke Produk</a>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="product-pic-zoom">
                    <img class="product-big-img" src="{{{ URL::asset('img/product/'.$product->url_pict)}}}" alt="">
                </div>
            </div>
            <div class="col-lg-6 product-details">
                <h2 class="p-title">{{$product->name}}</h2>
                <div id="accordion" class="accordion-area">
                    <div class="panel">
                        <div class="panel-header" id="headingOne">
                            <button class="panel-link active" data-toggle="collapse" data-target="#collapse1" aria-expanded="true" aria-controls="collapse1">deskripsi</button>
                        </div>
                        <div id="collapse1" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                            <div class="panel-body">
                                <p>{{$product->description}}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="social-sharing">
                    <a href=""><i class="fa fa-google-plus"></i></a>
                    <a href=""><i class="fa fa-pinterest"></i></a>
                    <a href=""><i class="fa fa-facebook"></i></a>
                    <a href=""><i class="fa fa-twitter"></i></a>
                    <a href=""><i class="fa fa-youtube"></i></a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- product section end -->

@endsection

@section('scripts')
@endsection