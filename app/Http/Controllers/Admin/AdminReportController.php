<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Report;
use App\Models\User;
use Illuminate\Http\Request;

class AdminReportController extends Controller
{
    // ==============================
    // DASHBOARD
    // ==============================
    public function index()
    {
        return view('admin.dashboard', [
            'totalLaporan'   => Report::count(),
            'totalPengguna'  => User::count(),
            'laporanPending' => Report::where('status', 'pending')->count(),
        ]);
    }


    // ==============================
    // DAFTAR LAPORAN
    // ==============================
    public function laporan()
    {
        $laporan = Report::with('user')->orderBy('created_at', 'desc')->get();

        return view('admin.daftarlaporan', compact('laporan'));
    }

    public function updateStatus(Request $request, $id)
    {
        $report = Report::findOrFail($id);

        // toggle status
        $report->status = $report->status === 'selesai' ? 'pending' : 'selesai';
        $report->save();

        return back()->with('success', 'Status laporan diperbarui.');
    }

    public function delete($id)
    {
        Report::findOrFail($id)->delete();
        return back()->with('success', 'Laporan berhasil dihapus.');
    }


    // ==============================
    // DAFTAR PENGGUNA
    // ==============================
    public function pengguna()
    {
        $users = User::orderBy('id', 'desc')->get();

        return view('admin.daftarpengguna', compact('users'));
    }

    public function updateRole($id)
    {
        $user = User::findOrFail($id);

        // toggle role
        $user->role = $user->role === 'admin' ? 'user' : 'admin';
        $user->save();

        return back()->with('success', 'Role pengguna diperbarui.');
    }

    public function deleteUser($id)
    {
        User::findOrFail($id)->delete();

        return back()->with('success', 'Pengguna berhasil dihapus.');
    }
}
