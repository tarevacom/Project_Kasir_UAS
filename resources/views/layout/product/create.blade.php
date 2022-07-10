@extends('master')

@section('title')
<title>Halaman Produk</title>
@endsection

@section('content')
<section class="section">
    <div class="section-header">
        <h2>Halaman | Tambah Produk</h2>
        <div class="section-header-breadcrumb">
            <div class="breadcumb-item"><a href="#">Home</a></div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <p>Halaman Tambah Produk</p>
                </div>
                <div class="card-body">
                    <form action="{{route('product.store')}}" method="post">
                        @csrf
                        <table class="table table-bordered">
                            <tr>
                                <td>Nama Produk</td>
                                <td><input type="text" name="name_product" class="form-control" id="" required></td>
                            </tr>
                            <tr>
                                <td>Deskripsi</td>
                                <td><input type="text" name="description" class="form-control" id="" required></td>
                            </tr>
                            <tr>
                                <td>Stock</td>
                                <td><input type="text" name="stock" class="form-control" id="" required></td>
                            </tr>
                            <tr>
                                <td>Harga</td>
                                <td><input type="text" name="price" class="form-control" id="" required></td>
                            </tr>
                            <tr>
                                <td>Kategori</td>
                                <td>
                                    <select name="category_id" id="" class="form-control">
                                        <option value="0">--Pilih Data--</option>
                                        @foreach ($category as $cat)
                                        <option value="{{ $cat->id}}">{{ $cat->name_category }}</option>
                                        @endforeach
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>&nbsp;</td>
                                <td><button type=" submit" class="btn btn-primary">Simpan</button>
                                </td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection