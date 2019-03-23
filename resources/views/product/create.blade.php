@extends('layouts.app')

@section('stylesheets')

@endsection

@section('content')
<!-- <div class="back-link">
    <a href="./category.html"> &lt;&lt; Back to Category</a>
</div> -->

<!-- Page info -->
<div class="page-top-info">
    <div class="container">
        <h4>Kelola Katalog</h4>
        <div class="site-pagination">
            <a href="javascript:void(0);">Produk</a> /
            <a href="javascript:void(0);">Tanmbah Produk</a>
        </div>
    </div>
</div>
<!-- Page info end -->

<!-- checkout section  -->
<section class="checkout-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 order-2 order-lg-2">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title text-center">Tambah Produk</h3>
                        <form class="checkout-form" method="POST" action="{{ route('product.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-12 text-center">
                                    <img src="" id="foto" alt="Foto Produk" style="width:150px; height:150px">
                                </div>
                                <div class="col-md-12 text-center">
                                    <input type="file" name="file" style="width:100px" onchange="readURL(this);" accept="image/*" required>
                                    <input type="hidden" name="url_pict" id="url_pict">
                                </div>
                                <div class="col-md-12 text-center">
                                    <label>Upload Foto</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <input type="text" name="name" id="name" placeholder="Nama Produk" oninput="fileName(this.value);" required>
                                    <textarea name="description" id="description" placeholder="Deskripsi" required></textarea>
                                </div>
                            </div>
                            <p>Pilih Kategori Produk</p>
                            <div class="row payment-list">
                                @foreach($categories as $key => $category)
                                <div class="col-md-6">
                                    <div class="form-check options">
                                        <input type="checkbox" name="category_id[]" class="form-check-input"
                                         value="{{$category->id}}" id="category-{{$category->id}}" required>
                                        <label class="form-check-label" for="defaultCheck1">
                                            {{$category->name}}
                                        </label>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-lg-6">
                                    <a href="{{route('product.index')}}" class="site-btn submit-order-btn sb-dark">Batal</a>
                                </div>
                                <div class="col-md-6 col-lg-6">
                                    <button type="submit" class="site-btn submit-order-btn">Simpan Data</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 order-1 order-lg-1">
                
            </div>
        </div>
    </div>
</section>
<!-- checkout section end -->

@endsection

@section('scripts')
<script type="text/javascript">

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                document.getElementById("foto").src = e.target.result;
            }

            reader.readAsDataURL(input.files[0]);
        }
    }
    function slugify(text)
    {
        text = text.toLowerCase();
        text = text.replace(/\s/g,'_') + '_{!! $randString !!}' + '.jpg';

        return text;
    }

    function fileName(text) {
        document.getElementById("url_pict").value = slugify(text);
    }

    $(function(){
        var requiredCheckboxes = $('.options :checkbox[required]');
        requiredCheckboxes.change(function(){
            if(requiredCheckboxes.is(':checked')) {
                requiredCheckboxes.removeAttr('required');
            } else {
                requiredCheckboxes.attr('required', 'required');
            }
        });
    });

</script>
@endsection