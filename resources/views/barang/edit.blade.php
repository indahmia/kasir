<form method="POST" action="{{ isset($barang) ? route('barang.update', $barang->id) : route('barang.store') }}">
    @csrf
    @if(isset($barang))
        @method('PUT')
    @endif

    <input type="text" name="nama" value="{{ old('nama', $barang->nama ?? '') }}" placeholder="Nama Barang">
    <input type="number" name="harga" value="{{ old('harga', $barang->harga ?? '') }}" placeholder="Harga">
    <input type="number" name="stok" value="{{ old('stok', $barang->stok ?? '') }}" placeholder="Stok">
    <button type="submit">{{ isset($barang) ? 'Update' : 'Tambah' }}</button>
    <div class="mb-4">
    <label for="diskon" class="block">Diskon (%)</label>
    <input type="number" name="diskon" id="diskon" class="form-input" value="{{ old('diskon', $barang->diskon ?? 0) }}" min="0" max="100">
</div>

</form>