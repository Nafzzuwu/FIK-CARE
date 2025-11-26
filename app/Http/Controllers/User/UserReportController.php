<?php

namespace App\Http\Controllers\User;

use App\Models\Report;

class UserReportController extends Controller
{
    public function index()
    {
        $reports = Report::where('user_id', auth()->id())->latest()->get();

        return view('user.reports', compact('reports'));
    }
}
