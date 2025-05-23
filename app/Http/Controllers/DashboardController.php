<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
{
    $today = Carbon::today();

    $transaksiHariIni = Transaksi::whereDate('tanggal', $today)->get();

    $totalTransaksi = $transaksiHariIni->count();
    $totalPendapatan = $transaksiHariIni->sum('total');
    $totalDiskon = $transaksiHariIni->sum('total_diskon');

    return view('dashboard.index', compact(
        'totalTransaksi',
        'totalPendapatan',
        'totalDiskon'
    ));
}
}