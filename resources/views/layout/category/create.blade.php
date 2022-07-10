@extends('master')

@section('title')
<title>Halaman Kategori</title>
@endsection

@section('content')
<section class="section">
    <div class="section-header">
        <h2>Halaman | Tambah Kategori</h2>
        <div class="section-header-breadcrumb">
            <div class="breadcumb-item"><a href="#">Home</a></div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <p>Halaman Tambah Kategori</p>
                </div>
                <div class="card-body">
                    <form action="{{route('category.store')}}" method="post">
                        @csrf
                        <table class="table table-bordered">
                            <tr>
                                <td>Nama Kategori</td>
                                <td><input type="text" name="name_category" class="form-control" id="" required></td>
                            </tr>
                            <tr>
                                <td>&nbsp;</td>
                                <td><button type="submit" class="btn btn-primary">Simpan</button></td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection