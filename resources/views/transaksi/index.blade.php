@extends('layouts.app')

@section('content')
<div class="card p-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3>Riwayat Transaksi</h3>
        <a href="{{ route('transaksi.create') }}" class="btn btn-earth btn-rounded">+ Transaksi Baru</a>
    </div>

    <table class="table table-striped table-hover">
        <thead class="table-light">
            <tr>
                <th>#</th>
                <th>Tanggal</th>
                <th>Jumlah Item</th>
                <th>Total</th>
                <th>Diskon</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($transaksi as $i => $t)
            <tr>
                <td>{{ $i + 1 }}</td>
                <td>{{ $t->tanggal->format('d-m-Y H:i') }}</td>
                <td>{{ $t->detail_transaksi_count }} item</td>
                <td>Rp {{ number_format($t->total) }}</td>
                <td>Rp {{ number_format($t->total_diskon) }}</td>
                <td>
                    <a href="{{ route('transaksi.show', $t->id) }}" class="btn btn-outline-earth btn-sm">Detail</a>
                    <a href="{{ route('transaksi.cetak', $t->id) }}" class="btn btn-earth btn-sm" target="_blank">Cetak</a>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="6" class="text-center">Belum ada transaksi.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection