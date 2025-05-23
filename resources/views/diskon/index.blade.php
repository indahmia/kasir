@extends('layouts.app')

@section('content')
<div class="container">

    <form action="{{ route('diskon.update') }}" method="POST">
        @csrf
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nama Barang</th>
                    <th>Harga</th>
                    <th>Diskon (%)</th>
                </tr>
            </thead>
            <tbody>
                @foreach($barangs as $barang)
                <tr>
                    <td>{{ $barang->nama }}</td>
                    <td>Rp{{ number_format($barang->harga, 0, ',', '.') }}</td>
                    <td>
                        <input type="number" name="diskon[{{ $barang->id }}]" class="form-control" 
                               value="{{ $barang->diskon }}" min="0" max="100" step="0.01">
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <button type="submit" class="btn btn-success mt-3">Simpan Diskon</button>
    </form>
</div>
@endsection