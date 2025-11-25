<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReportController extends Controller
{
    /**
     * Tampilkan form buat laporan
     */
    public function create()
    {
        return view('profile.laporan');
    }

    /**
     * Simpan laporan (sementara tanpa database)
     */
    public function store(Request $request)
    {
        $request->validate([
            'kategori' => 'required',
            'isi_laporan' => 'required',
            'tanggal' => 'required|date',
        ]);

        // NANTI bisa diganti dengan insert DB
        // Sekarang cuma redirect aja
        return redirect()
            ->route('dashboard.user')
            ->with('success', 'Laporan Anda berhasil dikirim!');
    }

    /**
     * Halaman riwayat laporan
     * (sementara kosong karena belum pakai database)
     */
    public function index()
    {
        // Dummy data (kalau mau lihat tampilannya jalan)
        $laporan = [
            [
                'kategori' => 'Fasilitas',
                'isi' => 'AC ruangan 305 tidak berfungsi.',
                'tanggal' => '2025-01-20',
                'status' => 'Diproses'
            ],
            [
                'kategori' => 'Layanan',
                'isi' => 'Respon pelayanan akademik terlalu lama.',
                'tanggal' => '2025-01-18',
                'status' => 'Selesai'
            ]
        ];

        return view('profile.riwayatlaporan', compact('laporan'));
    }
}
