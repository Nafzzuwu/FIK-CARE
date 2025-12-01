<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Report;
use App\Models\User;
use Illuminate\Http\Request;

class AdminReportController extends Controller
{
    // ==============================
    // DASHBOARD ADMIN
    // ==============================
    public function index()
    {
        return view('admin.dashboard', [
            'totalLaporan'   => Report::count(),
            'laporanPending' => Report::where('status', 'pending')->count(),
            'laporanSelesai' => Report::where('status', 'selesai')->count(),
            'laporanDitolak' => Report::where('status', 'ditolak')->count(),
            'totalPengguna'  => User::count(),
        ]);
    }

    // ==============================
    // DAFTAR LAPORAN
    // ==============================
    public function laporan()
    {
        $laporan = Report::with('user')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('admin.daftarlaporan', compact('laporan'));
    }

    // ==============================
    // UPDATE STATUS LAPORAN
    // ==============================
    public function updateStatus(Request $request, $id)
    {
        $laporan = Report::findOrFail($id);

        $laporan->status = $request->status;
        $laporan->save();

        return redirect()->route('admin.daftarlaporan')
                        ->with('success', 'Status laporan berhasil diperbarui');
    }

    // ==============================
    // HAPUS LAPORAN
    // ==============================
    public function delete($id)
    {
        Report::findOrFail($id)->delete();
        return back()->with('success', 'Laporan berhasil dihapus.');
    }

    // ==============================
    // DAFTAR PENGGUNA (VIEW ONLY)
    // ==============================
    public function pengguna()
    {
        $users = User::orderBy('id', 'desc')->get();
        return view('admin.daftarpengguna', compact('users'));
    }

    // ==============================
    // HAPUS PENGGUNA
    // ==============================
    public function deleteUser($id)
    {
        User::findOrFail($id)->delete();
        return back()->with('success', 'Pengguna berhasil dihapus.');
    }

    public function saveFeedback(Request $request, $id)
    {
        $request->validate([
            'feedback' => 'required|string'
        ]);

        $report = Report::findOrFail($id);
        $report->feedback = $request->feedback;
        $report->save();

        return back()->with('success', 'Feedback berhasil disimpan');
    }

}
