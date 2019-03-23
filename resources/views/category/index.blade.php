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

<!-- Category section -->
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
            <h3><a href="javascript:void(0);" class="site-btn" data-toggle="modal" data-target="#modalCreate">Tambah Kategori</a></h3>
            <div class="cart-table-warp">
                <table class="table table-bordered" id="categoryTable">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kategori</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($categories as $key => $category)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$category->name}}</td>
                            <td>
                                <a href="javascript:void(0);" class="btn btn-warning"
                                 onclick="getKategori('{{$category->id}}')" 
                                 data-toggle="modal" data-target="#modalUpdate">Ubah</a>
                                <a href="{{route('category.destroy', $category->id)}}" class="btn btn-danger">Hapus</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
<!-- Category section end -->

<!-- Modal Create section -->
<<div class="modal fade" id="modalCreate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Kategori</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form class="checkout-form" method="POST" action="{{ route('category.store') }}">
        <div class="modal-body">
            @csrf
            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                <input id="name-create" type="text" class="form-control" name="name"
                    required autofocus placeholder="Kategori">
                @if ($errors->has('name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="site-btn sb-dark" data-dismiss="modal">Batal</button>
            <button type="submit" class="site-btn">Simpan Data</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- Modal Create section end -->

<!-- Modal Update section -->
<<div class="modal fade" id="modalUpdate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ubah Kategori</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form class="checkout-form" method="POST" action="{{ route('category.update') }}">
        <div class="modal-body">
            @csrf
            <input type="hidden" id="id-update" name="id">
            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                <input id="name-update" type="text" class="form-control" name="name"
                    required autofocus placeholder="Kategori">
                @if ($errors->has('name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="site-btn sb-dark" data-dismiss="modal">Batal</button>
            <button type="submit" class="site-btn">Ubah Data</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- Modal Update section end -->
@endsection

@section('scripts')
<script src="{{{ URL::asset('plugins/jquery-datatables/jquery.dataTables.min.js')}}}"></script>
<script type="text/javascript">
    $(document).ready( function () {
        $('#categoryTable').DataTable();
    } );

    function getKategori(id) {
        $.ajax({
            type : "post",
            url  : "{{ route('category.edit') }}",
            data : { _token: "{{csrf_token()}}", id : id },
            dataType : "json",
            success :function(data){
                document.getElementById("id-update").value = data[0]['id'];
                document.getElementById("name-update").value = data[0]['name'];
            },
            error : function(data){
                alert('Error mengambil data kategori, Error: ' + JSON.stringify(data));
            }
        });
    }
</script>
@endsection