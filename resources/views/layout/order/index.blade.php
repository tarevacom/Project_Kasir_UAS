@extends('master')
@section('title')
    <title>Halaman Order</title>
@endsection

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Cart</h1>
    </div>
    @if ($message = Session::get('pesan'))
        <div class="alert alert-primary">
            <button class="close">
                <span>&times;</span>
            </button>
            <strong>{{$message}}</strong>
        </div>
    @endif
    <div class="row">
        <div class="col-12 col-md-4">
            <div class="card card-primary">
                <form action="{{ route('order.store') }}" method="post">
                    @csrf
                    @method('POST')
                    <div class="card-header">
                        <h4>Piih Produk</h4>
                    </div>
                    <div class="card-body">
                        <select name="product_id" id="" class="form-control">
                            <option value="0">--Pilih Produk--</option>
                            @foreach ($product as $p)
                            <label for="">Nama Produk</label>
                            <option  value="{{ $p->id }}">{{ $p->name_product }} - Rp.{{ $p->price }}</option>
                            @endforeach
                            
                            
                        </select>
                        <div class="invalid-feedback">
                            form nama produk harus di isi
                        </div>
                    </div>
                    <div class="card-footer d-flex justify-content-between">
                        <div class="row">
                            <div class="col-11">
                                <input type="number" min="1" class="form-control" name="jumlah" required>
                            </div>
                        </div>
                        <button class="btn btn-primary">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-12 col-md-8">
            <form action="{{ route('checkout.store') }}"method="post">
                @csrf
                @method('POST')
            <div class="card card-primary">
                <div class="card-header">
                    <h4>Cart Order</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Produk</th>
                                    <th>Jumlah</th>
                                    <th>Total Harga</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cart as $cr)
                                @foreach ($cr->cartproduct as $cp)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $cp->name_product }}</td>
                                    <td>{{ $cr->jumlah }}</td>
                                    <td>{{ $cr->sub_total }}</td>
                                    <td>Tes</td>
                                </tr>
                                @php 
                                    $total = $cart->sum('sub_total');
                                    @endphp
                                     <input type="hidden" name="card_id" value="{{$cr->card_id}}">
                                    <input type="hidden" name="total" value="{{$total}}">

                                @endforeach
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <hr>
                    @if ($cart)
                    <div class="text-right">
                        <p class="h5">Total Harga : Rp.{{ $cart->sum('sub_total') }}</p>
                        @else
                        <p class="h5">
                            Total Harga : Rp.
                        </p>
                        
                    </div>
                    @endif 
                </div>
                <hr>
            </div>
            <div class="card-footer text-right">
                 <button class="btn btn-primary" type="submit"><i class="fas fa-shopping-cart">Checkout</i></button>
            </div>
        </form >
        </div>
    </div>
</section>
    
@endsection