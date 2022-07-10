@extends('master')

@section('title')
<title>Halaman | Transaksi</title>
@endsection

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Halaman Transaksi</h1>

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

                <div class="card-body">
                    <div class="table table-responsive">
                        <table class="table table-striped table-hover text-starts">
                            <thead >
                                <th>No</th>
                                <th>No. Invoice</th>
                                <th>Nama Produk</th>
                                <th>Harga</th>
                                <th>Sub Total</th>
                                <th>Total</th>
                                
                            </thead>
                            <tbody>
                                @forelse ($checkout as $co)
                                @php
                                 $order = App\Models\Order::where('card_id', $co->card_id)->get(); 
                                //  dd($order);  
                                @endphp

                                <tr class="border">
                                    <td>{{ $loop->iteration }}</td> 
                                    <td>{{ $co->card_id }}</td>
                                    <td>
                                        <ul class="list-group">
                                            @foreach ($order as $or)
                                            @foreach ($or->cartproduct as $p)
                                        <li>{{ $p->name_product }}@ {{ $or->jumlah }}</li>
                                        @endforeach
                                        @endforeach
                                      </ul> 
                                    </td>
                                      <td>
                                        <ul>
                                                @foreach ($order as $or)
                                                @foreach ($or->cartproduct as $p)
                                            <li>{{ $p->price }}</li>
                                            @endforeach
                                            @endforeach
                                        </ul> 
                                      </td>
                                    <td>
                                        <ul class="list-group">
                                            @foreach ($order  as $p)
                                        <li>{{ $p->sub_total }}</li>
                                        @endforeach
                                      </ul> 
                                    </td>
                                    <td> {{ $order->sum('sub_total')}}</td>

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