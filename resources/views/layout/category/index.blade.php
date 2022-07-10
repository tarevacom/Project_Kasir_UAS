@extends('master')

@section('title')
<title>Halaman | Kategori</title>
@endsection

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Halaman Kategori</h1>

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
                    <a href="{{route('category.create')}}" class="btn btn-primary">Tambah Kategori</a>
                </div>
                <div class="card-body">
                    <div class="table table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <th>No</th>
                                <th>Nama Kategori</th>
                                <th>Tools</th>
                            </thead>
                            <tbody>
                                @forelse ($category as $c)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $c ->name_category}}</td>
                                    <td><a href="{{route('category.edit',$c->id)}}"
                                            class="btn btn-outline-warning me-2"><i class="fas fa-edit"></i></a>
                                        <form action="{{url('/category/'.$c->id)}}" method="post" class="d-inline">
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
                                    <td colspan="3" class="text-center">Tidak ada data</td>
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