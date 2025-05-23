<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Nota Transaksi</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            color: #333;
            background-color: #f4f1ee;
        }
        h1, h2 {
            color: #3e3e3e;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #8d6e63;
            color: white;
        }
        .total {
            font-size: 18px;
            font-weight: bold;
            color: #8d6e63;
        }
        .keuntungan {
            font-size: 16px;
            color: #d32f2f;
        }
    </style>
</head>
<body>

    <h1>INDOJULI</h1>
    <p><strong>Tanggal:</strong> {{ $transaksi->tanggal->format('d-m-Y H:i') }}</p>

    <table>
        <thead>
            <tr>
                <th>Nama Barang</th>
                <th>Harga Satuan</th>
                <th>Jumlah</th>
                <th>Diskon (%)</th>
                <th>Diskon (Rp)</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($transaksi->detailTransaksi as $detail)
                @php
                    $harga_total = $detail->harga_satuan * $detail->jumlah;
                    $diskon_rp = ($detail->diskon / 100) * $harga_total;
                    $subtotal = $harga_total - $diskon_rp;
                @endphp
                <tr>
                    <td>{{ $detail->barang->nama }}</td>
                    <td>Rp {{ number_format($detail->harga_satuan) }}</td>
                    <td>{{ $detail->jumlah }}</td>
                    <td>{{ $detail->diskon }}%</td>
                    <td>Rp {{ number_format($diskon_rp) }}</td>
                    <td>Rp {{ number_format($subtotal) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <p class="total">Total Diskon (Keuntungan Customer): Rp {{ number_format($transaksi->total_diskon) }}</p>
    <p class="total">Total yang Harus Dibayar: Rp {{ number_format($transaksi->total) }}</p>

</body>
</html>