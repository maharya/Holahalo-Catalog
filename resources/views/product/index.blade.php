@extends('layouts.app')

@section('stylesheets')
<link rel="stylesheet" href="{{{ URL::asset('plugins/jquery-datatables/css/jquery.dataTables.min.css')}}}"/>
@endsection

@section('content')
<!-- Page info -->
<div class="page-top-info">
    <div class="container">
        <h4>Kelola Katalog</h4>
        <div class="site-pagination">
            <a href="javascript:void(0);">Kategori</a> /
            <a href="javascript:void(0);">Daftar Kategori</a>
        </div>
    </div>
</div>
<!-- Page info end -->

<!-- Product section -->
<section class="category-section spad">
    <div class="container">
        @if(Session::has('message'))
        <div class="row">
            <div class="col-lg-8 order-2">
                <p class="alert {{Session::get('alert-class')}} alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>{{ Session::get('message') }}
                </p>
            </div>
            <div class="col-lg-2 order-1">
            </div>
        </div>
        @endif
        <div class="cart-table">
            <h3><a href="{{route('product.create')}}" class="site-btn">Tambah Produk</a></h3>
            <div class="cart-table-warp">
                <table class="table table-bordered" id="categoryTable">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Produk</th>
                            <th>Deskripsi</th>
                            <th>Kategori</th>
                            <th>Foto</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $key => $product)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$product->name}}</td>
                            <td>{{$product->description}}</td>
                            <td>
                                @foreach($product->category as $category)
                                    <li>{{ $category->name }}</li>
                                @endforeach
                            </td>
                            <td>
                                <img src="{{{ URL::asset('img/product/'.$product->url_pict)}}}" alt="" style="width:50px; height:50px">
                            </td>
                            <td>
                                <a href="{{route('product.edit', $product->id)}}" class="btn btn-warning">Ubah</a>
                                <a href="{{route('product.destroy', [$product->id, $product->url_pict])}}" class="btn btn-danger">Hapus</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
<!-- Product section end -->
@endsection

@section('scripts')
<script src="{{{ URL::asset('plugins/jquery-datatables/jquery.dataTables.min.js')}}}"></script>
<script type="text/javascript">
    $(document).ready( function () {
        $('#categoryTable').DataTable();
    } );
</script>
@endsection