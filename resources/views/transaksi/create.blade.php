@extends('layouts.app')

@section('content')
<div class="card p-4">
    <h3>Transaksi Baru</h3>
    <form action="{{ route('transaksi.store') }}" method="POST">
        @csrf

        <table class="table" id="transaksi-table">
            <thead>
                <tr>
                    <th>Barang</th>
                    <th>Jumlah</th>
                    <th>Diskon (%)</th>
                    <th><button type="button" class="btn btn-sm btn-outline-earth" onclick="tambahBaris()">+ Tambah</button></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <select name="barang_id[]" class="form-control barang-select" required>
                            <option value="">-- Pilih Barang --</option>
                            @foreach($barangs as $barang)
                            <option value="{{ $barang->id }}" data-diskon="{{ $barang->diskon }}">
                                {{ $barang->nama }} (Stok: {{ $barang->stok }})
                            </option>
                            @endforeach
                        </select>


                    </td>
                    <td><input type="number" name="jumlah[]" class="form-control" min="1" required></td>
                    <td><input type="number" name="diskon[]" class="form-control diskon-input" readonly></td>
                    <td><button type="button" class="btn btn-danger btn-sm" onclick="hapusBaris(this)">×</button></td>
                </tr>
            </tbody>
        </table>

        <button type="submit" class="btn btn-earth btn-rounded">Simpan Transaksi</button>
        <a href="{{ route('transaksi.index') }}" class="btn btn-outline-earth btn-rounded">← Kembali</a>
    </form>
</div>

<script>
    function handleDiskon(event) {
        const selected = event.target.selectedOptions[0];
        const diskon = selected.getAttribute('data-diskon') || 0;
        const tr = event.target.closest('tr');
        tr.querySelector('.diskon-input').value = diskon;
    }

    // Untuk semua dropdown yang sudah ada di awal
    document.querySelectorAll('.barang-select').forEach(select => {
        select.addEventListener('change', handleDiskon);
    });


    function tambahBaris() {
        const table = document.querySelector('#transaksi-table tbody');
        const row = table.rows[0].cloneNode(true);

        row.querySelectorAll('input').forEach(input => input.value = '');
        row.querySelector('.barang-select').selectedIndex = 0;
        row.querySelector('.diskon-input').value = '';

        // Tambahkan event listener ke select baru
        row.querySelector('.barang-select').addEventListener('change', handleDiskon);

        table.appendChild(row);
    }


    function hapusBaris(btn) {
        const row = btn.closest('tr');
        const table = document.querySelector('#transaksi-table tbody');
        if (table.rows.length > 1) {
            row.remove();
        }
    }
</script>


@endsection