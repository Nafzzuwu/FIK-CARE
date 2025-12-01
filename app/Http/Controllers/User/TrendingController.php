<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TrendingController extends Controller
{
    public function index()
    {
        $reports = Report::orderBy('hasil_vote', 'desc')->get();
        return view('profile.trendinglaporan', compact('reports'));
    }

    public function vote($id)
    {
        // 1. Ambil ID user yang sedang login
        $userId = Auth::id();
        
        // 2. Cari User LANGSUNG dari database (ini memastikan kita dapat instance Model yang valid)
        $user = \App\Models\User::find($userId); 

        $report = Report::findOrFail($id);

        // Cek apakah user sudah voting
        // (Gunakan == 1 untuk memastikan tipe datanya cocok)
        if ($user->telah_voting == 1) {
            return redirect()->back()->with('error', 'Kamu sudah melakukan voting.');
        }

        // Tambah vote laporan
        $report->increment('hasil_vote');

        // 3. Update status user MANUAL (tanpa mass assignment/update[])
        $user->telah_voting = true; 
        $user->save(); // Pakai save(), jangan update()

        return redirect()->back()->with('success', 'Voting berhasil!');
    }
}
