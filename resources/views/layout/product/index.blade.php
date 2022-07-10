@extends('master')

@section('title')
<title>Halaman | Produk</title>
@endsection

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Halaman Produk</h1>

        <div class="section-header-breadcrumb">
            <div class="breadcumb-item"><a href="#">Home</a></div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card card-primary">
                @if(session()->has('sukses'))
                <div class="alert-primary" role="alert">
                    {{ session('sukses') }}
                </div>
                @endif
                <div class="card-header">
                    <a href="{{route('product.create')}}" class="btn btn-primary">Tambah Produk</a>
                </div>
                <div class="card-body">
                    <div class="table table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <th>No</th>
                                <th>Nama Produk</th>
                                <th>Deskripsi</th>
                                <th>stock</th>
                                <th>Harga</th>
                                <th>kategori Produk</th>
                                <th>Tools</th>
                            </thead>
                            <tbody>
                                @forelse ($product as $p)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $p->name_product }}</td>
                                    <td>{{ $p->description }}</td>
                                    <td>{{ $p->stock }}</td>
                                    <td>{{ $p->price }}</td>
                                    <td>{{ $p->category->name_category }}</td>
                                    <td><a href="{{route('product.edit',$p->id)}}"
                                            class="btn btn-outline-warning me-2"><i class="fas fa-edit"></i></a>
                                        <form action="{{url('/product/'.$p->id)}}" method="post" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger"
                                                onclick=" return confirm('setuju')"><i
                                                    class="fas fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="6" class="text-center">Tidak Ada Data</td>
                                </tr>


                                @endforelse

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection