@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h3 class="mb-4 fw-bold">Riwayat Laporan Saya</h3>

    @if($reports->count() == 0)
        <div class="alert alert-info">Belum ada laporan.</div>
    @else
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Judul</th>
                    <th>Tanggal</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach($reports as $r)
                    <tr>
                        <td>{{ $r->title }}</td>
                        <td>{{ $r->created_at->format('d M Y') }}</td>
                        <td>{{ $r->status }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
