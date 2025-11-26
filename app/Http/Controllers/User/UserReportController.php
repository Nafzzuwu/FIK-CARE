<?php

namespace App\Http\Controllers\User;

use App\Models\Report;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserReportController extends Controller
{
    /**
     * Tampilkan form buat laporan
     */
    public function create()
    {
        return view('profile.laporan');
    }

    /**
     * Simpan laporan ke database
     */
    public function store(Request $request)
    {
        $request->validate([
            'kategori' => 'required',
            'isi_laporan' => 'required',
            'tanggal' => 'required|date',
        ]);

        Report::create([
            'user_id'      => Auth::id(),
            'nama_pelapor' => Auth::user()->name,   // ← disimpan sebagai string
            'kategori'     => $request->kategori,
            'isi_laporan'  => $request->isi_laporan,
            'tanggal'      => $request->tanggal,
            'status'       => 'Diproses',           // default
        ]);

        return redirect()
            ->route('report.index')
            ->with('success', 'Laporan berhasil dikirim!');
    }
    public function index()
    {
        $reports = Report::where('user_id', Auth::id())
            ->orderBy('created_at', 'desc')
            ->get();

        return view('profile.riwayatlaporan', compact('reports'));
    }

}