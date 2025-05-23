@extends('layouts.app')

@section('content')
<div class="card p-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3>Detail Transaksi</h3>
        <a href="{{ route('transaksi.index') }}" class="btn btn-outline-earth btn-rounded">← Kembali</a>
    </div>

    <p><strong>Tanggal:</strong> {{ $transaksi->tanggal->format('d-m-Y H:i') }}</p>

    <table class="table table-bordered">
        <thead class="table-light">
            <tr>
                <th>Barang</th>
                <th>Harga Satuan</th>
                <th>Jumlah</th>
                <th>Diskon (%)</th>
                <th>Diskon (Rp)</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($transaksi->detailTransaksi as $item)
                @php
                    $harga_total = $item->harga_satuan * $item->jumlah;
                    $diskon_rp = ($item->diskon / 100) * $harga_total;
                    $subtotal = $harga_total - $diskon_rp;
                @endphp
                <tr>
                    <td>{{ $item->barang->nama }}</td>
                    <td>Rp {{ number_format($item->harga_satuan) }}</td>
                    <td>{{ $item->jumlah }}</td>
                    <td>{{ $item->diskon }}%</td>
                    <td>Rp {{ number_format($diskon_rp) }}</td>
                    <td>Rp {{ number_format($subtotal) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="mt-3">
        <p><strong>Total Diskon:</strong> Rp {{ number_format($transaksi->total_diskon) }}</p>
        <p><strong>Total Bayar:</strong> Rp {{ number_format($transaksi->total) }}</p>
    </div>

    <a href="{{ route('transaksi.cetak', $transaksi->id) }}" class="btn btn-earth btn-rounded mt-2" target="_blank">Cetak Nota (PDF)</a>
</div>
@endsection