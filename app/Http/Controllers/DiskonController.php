<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;

class DiskonController extends Controller
{
    public function index()
    {
        $barangs = Barang::all();
        return view('diskon.index', compact('barangs'));
    }

    public function update(Request $request)
    {
        foreach ($request->diskon as $id => $value) {
            $barang = Barang::find($id);
            if ($barang) {
                $barang->diskon = $value ?? 0;
                $barang->save();
            }
        }

        return redirect()->route('diskon.index')->with('success', 'Diskon berhasil diperbarui!');
    }
}