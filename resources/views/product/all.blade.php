@extends('layouts.app')

@section('stylesheets')
@endsection

@section('content')
<!-- Page info -->
<div class="page-top-info">
    <div class="container">
        <h4>Produk</h4>
        <div class="site-pagination">
            <a href="javascript:void(0);">Seluruh Produk</a>
        </div>
    </div>
</div>
<!-- Page info end -->


<!-- Category section -->
<section class="category-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 order-2 order-lg-1">
                <div class="filter-widget">
                    <h2 class="fw-title">Kategori</h2>
                    <ul class="category-menu">
                        @foreach($categories as $category)
                        <li>
                            <input type="radio" name="category_id[]" class="form-check-options"
                                value="{{$category->id}}" id="category-{{$category->id}}" required>
                            <label class="form-check-label" for="defaultCheck1">
                                {{$category->name}}
                            </label>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <div class="col-lg-9  order-1 order-lg-2 mb-5 mb-lg-0">
                <div class="row">
                    @foreach($products as $product)
                    @php
                    $catOptions = "";
                    foreach($product->category as $category)
                    {
                        $catOptions .= "options-".$category->id." ";
                    }
                    @endphp
                    <div class="col-lg-3 col-sm-6 product-options {{$catOptions}}">
                        <div class="product-item">
                            <div class="pi-pic">
                                <div style="width: 150px; height: 200px; background-size: cover;
                                background-repeat: no-repeat; 
                                background-image: url('{{{ URL::asset('img/product/'.$product->url_pict)}}}');
                                background-position: 50% 50%;">
                                </div>
                                <!-- <img src="{{{ URL::asset('img/product/'.$product->url_pict)}}}" alt="" style="height:200px"> -->
                                <div class="pi-links">
                                    <a href="{{route('product.detail', $product->id)}}" class="add-card"><i class="flaticon-bag"></i><span>DETAIL</span></a>
                                </div>
                            </div>
                            <div class="pi-text">
                                <p>{{$product->name}}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Category section end -->
@endsection

@section('scripts')
<script type="text/javascript">

    $(document).on("change", ".form-check-options", function(){
        $('.product-options').hide();
        for(i = 0; i < document.getElementsByName("category_id[]").length; i++)
        {
            if($("input[type=radio][value='"+document.getElementsByName("category_id[]")[i].value+"']").prop('checked'))
            {
                $('.options-'+document.getElementsByName("category_id[]")[i].value).show();
            }
        }
        
    });
</script>
@endsection