@extends('layouts.app')

@section('content')
<style>
    .card {
        background: #ffffff;
        border-radius: 16px;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        padding: 24px;
        margin: 20px auto;
        max-width: 1000px;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .card:hover {
        transform: translateY(-4px);
        box-shadow: 0 14px 35px rgba(0, 0, 0, 0.15);
    }

    h3 {
        font-weight: 600;
        color: #333;
    }

    .btn-earth {
        background: linear-gradient(to right, #16a085, #27ae60);
        color: white;
        padding: 8px 16px;
        border: none;
        border-radius: 10px;
        font-weight: 600;
        transition: background 0.3s ease, transform 0.2s;
    }

    .btn-earth:hover {
        background: linear-gradient(to right, #1abc9c, #2ecc71);
        transform: scale(1.05);
    }

    .btn-outline-earth {
        color:rgb(58, 152, 219);
        border: 2px solid #16a085;
        padding: 6px 12px;
        border-radius: 10px;
        background: transparent;
        transition: all 0.3s ease;
    }

    .btn-outline-earth:hover {
        background: #16a085;
        color: white;
    }

    .btn-danger {
        background: #e74c3c;
        border: none;
        color: white;
        padding: 6px 12px;
        border-radius: 10px;
        transition: background 0.3s ease;
    }

    .btn-danger:hover {
        background: #c0392b;
    }

    .table {
        width: 100%;
        border-collapse: separate;
        border-spacing: 0;
        border-radius: 12px;
        overflow: hidden;
        margin-top: 16px;
    }

    .table th,
    .table td {
        padding: 16px;
        text-align: left;
        border-bottom: 1px solid #e0e0e0;
        background: #fff;
    }

    .table th {
        background: #f4f6f8;
        font-weight: 600;
        color: #333;
    }

    .table-hover tbody tr:hover {
        background-color: #f1fdf7;
        cursor: pointer;
    }

    .btn-sm {
        font-size: 0.875rem;
        padding: 4px 10px;
    }

    .btn-rounded {
        border-radius: 10px;
    }

    .d-flex {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .mb-3 {
        margin-bottom: 1rem;
    }
</style>

<div class="card">
    <div class="d-flex mb-3">
        <h3>Daftar Barang</h3>
        <a href="{{ route('barang.create') }}" class="btn btn-earth btn-rounded">+ Tambah Barang</a>
    </div>

    <table class="table table-bordered table-hover">
        <thead class="table-light">
            <tr>
                <th>Nama</th>
                <th>Harga</th>
                <th>Stok</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($barangs as $b)
            <tr>
                <td>{{ $b->nama }}</td>
                <td>Rp {{ number_format($b->harga) }}</td>
                <td>{{ $b->stok }}</td>
                <td>
                    <a href="{{ route('barang.edit', $b->id) }}" class="btn btn-outline-earth btn-sm btn-rounded">Edit</a>
                    <form action="{{ route('barang.destroy', $b->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Yakin hapus barang ini?')" class="btn btn-danger btn-sm btn-rounded">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection