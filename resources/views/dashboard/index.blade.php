@extends('layouts.app')

@section('content')
<div class="card p-4">
    <h3 class="mb-4">Dashboard Penjualan Hari Ini</h3>

    <div class="row">
        <div class="col-md-4">
            <div class="card shadow-sm p-3 mb-3 bg-light rounded">
                <h5>Total Transaksi</h5>
                <h3>{{ $totalTransaksi }}</h3>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow-sm p-3 mb-3 bg-light rounded">
                <h5>Total Pendapatan</h5>
                <h3>Rp {{ number_format($totalPendapatan) }}</h3>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow-sm p-3 mb-3 bg-light rounded">
                <h5>Total Diskon Diberikan</h5>
                <h3>Rp {{ number_format($totalDiskon) }}</h3>
            </div>
        </div>
    </div>

    <a href="{{ route('transaksi.index') }}" class="btn btn-earth mt-3">Lihat Riwayat Transaksi</a>
</div>
@endsection