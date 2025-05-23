<style>
    form {
        max-width: 400px;
        margin: 20px auto;
        padding: 20px;
        background-color: #f9fafb;
        border: 1px solid #e5e7eb;
        border-radius: 8px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        font-family: Arial, sans-serif;
    }

    input[type="text"],
    input[type="number"] {
        width: 100%;
        padding: 10px;
        margin-top: 6px;
        margin-bottom: 16px;
        border: 1px solid #d1d5db;
        border-radius: 4px;
        box-sizing: border-box;
    }

    label {
        font-weight: 600;
        margin-bottom: 4px;
        display: block;
        color: #374151;
    }

    button {
        background-color: #3b82f6;
        color: white;
        padding: 10px 16px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-weight: bold;
    }

    button:hover {
        background-color: #2563eb;
    }

    .mb-4 {
        margin-bottom: 16px;
    }
</style>

<form method="POST" action="{{ isset($barang) ? route('barang.update', $barang->id) : route('barang.store') }}">
    @csrf
    @if(isset($barang))
        @method('PUT')
    @endif

    <label for="nama">Nama Barang</label>
    <input type="text" name="nama" id="nama" value="{{ old('nama', $barang->nama ?? '') }}" placeholder="Nama Barang">

    <label for="harga">Harga</label>
    <input type="number" name="harga" id="harga" value="{{ old('harga', $barang->harga ?? '') }}" placeholder="Harga">

    <label for="stok">Stok</label>
    <input type="number" name="stok" id="stok" value="{{ old('stok', $barang->stok ?? '') }}" placeholder="Stok">

    <div class="mb-4">
        <label for="diskon">Diskon (%)</label>
        <input type="number" name="diskon" id="diskon" class="form-input" value="{{ old('diskon', $barang->diskon ?? 0) }}" min="0" max="100">
    </div>

    <button type="submit">{{ isset($barang) ? 'Update' : 'Tambah' }}</button>
</form>