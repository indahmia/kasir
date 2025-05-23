<?php

namespace App\Models;

use App\Models\DetailTransaksi; 
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $fillable = ['tanggal', 'total', 'total_diskon'];
    protected $casts = [
        'tanggal' => 'datetime',
    ];
    // Tambahkan relasi ini
    public function detailTransaksi()
    {
        return $this->hasMany(DetailTransaksi::class);
    }
    
}