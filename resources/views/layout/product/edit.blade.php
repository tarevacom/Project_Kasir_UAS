@extends('master')

@section('title')
<title>Halaman Edit Produk</title>
@endsection

@section('content')
<section class="section">
    <div class="section-header">
        <h2>Halaman | Edit Produk</h2>
        <div class="section-header-breadcrumb">
            <div class="breadcumb-item"><a href="#">Home</a><a href="#">/produk</a><a href="#">/Edit</a></div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <p>Halaman | Edit Produk</p>
                </div>
                <div class="card-body">
                    <form action="{{route('product.update', $product->id)}}" method="post">
                        @csrf
                        @method('PUT')
                        <table class="table table-bordered">
                            <tr>
                                <td>Nama Produk</td>
                                <td><input type="text" name="name_product" value="{{$product->name_product}}"
                                        class="form-control" id="" required></td>
                            </tr>
                            <tr>
                                <td>Deskripsi</td>
                                <td><input type="text" name="description" value="{{$product->description}}"
                                        class="form-control" id="" required></td>
                            </tr>
                            <tr>
                                <td>Stock</td>
                                <td><input type="text" name="stock" value="{{$product->stock}}" class="form-control"
                                        id="" required></td>
                            </tr>
                            <tr>
                                <td>Harga</td>
                                <td><input type="text" name="price" value="{{$product->price}}" class="form-control"
                                        id="" required></td>
                            </tr>
                            <tr>
                                <td>Kategori</td>
                                <td>
                                    <select name="category_id" id="" class="form-control">
                                        <option value="0">--Pilih Data--</option>
                                        @foreach ($category as $cat)
                                        @if ($product->category_id == $cat->id)
                                        <option value="{{ $cat->id}}" selected>{{ $cat->name_category }}</option>

                                        @else

                                        @endif
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