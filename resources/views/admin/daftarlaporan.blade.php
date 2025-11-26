@extends('layouts.admin')

@section('content')

<style>
    .table-wrapper {
        background: #1f2937;
        padding: 25px;
        border-radius: 16px;
        box-shadow: 0 6px 18px rgba(0,0,0,0.35);
    }
    .table-dark-custom thead {
        background: #374151;
        color: #e5e7eb;
    }
    .table-dark-custom tbody tr {
        background: #4b5563;
        color: #f9fafb;
    }
    .table-dark-custom tbody tr:hover {
        background: #6b7280;
        transition: .25s;
    }
    .status-btn {
        border: none;
        padding: 6px 14px;
        border-radius: 8px;
        font-size: 13px;
        color: white;
    }
    .status-proses {
        background: #eab308;
    }
    .status-selesai {
        background: #22c55e;
    }
    .icon-delete {
        cursor: pointer;
        font-size: 22px;
        color: #f87171;
    }
    .icon-delete:hover {
        color: #ef4444;
    }
</style>

<div class="table-wrapper mt-4">

    <h2 class="fw-bold mb-4">Daftar Laporan</h2>

    <table class="table table-dark-custom table-borderless w-100">
        <thead>
            <tr>
                <th class="p-3">ID</th>
                <th class="p-3">Pelapor</th>
                <th class="p-3">Judul</th>
                <th class="p-3">Status</th>
                <th class="p-3 text-center">Aksi</th>
            </tr>
        </thead>

        <tbody>
            @foreach($laporan as $item)
            <tr>
                <td class="p-3">{{ $item->id }}</td>
                <td class="p-3">{{ $item->user->name }}</td>
                <td class="p-3">{{ $item->judul }}</td>

                <td class="p-3">
                    <form action="{{ route('admin.daftarlaporan.status', $item->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <button type="submit"
                            class="status-btn 
                            {{ $item->status == 'selesai' ? 'status-selesai' : 'status-proses' }}">
                            {{ ucfirst($item->status) }}
                        </button>
                    </form>
                </td>

                <td class="p-3 text-center">

                    <span onclick="confirmDelete({{ $item->id }})" class="icon-delete">
                        🗑️
                    </span>

                    <form id="delete-form-{{ $item->id }}" 
                        action="{{ route('admin.daftarlaporan.delete', $item->id) }}" 
                        method="POST">
                        @csrf
                        @method('DELETE')
                    </form>

                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>

<script>
function confirmDelete(id) {
    Swal.fire({
        title: "Hapus laporan?",
        text: "Aksi ini tidak dapat dibatalkan!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#d33",
        cancelButtonColor: "#3085d6",
        confirmButtonText: "Ya, hapus"
    }).then((result) => {
        if (result.isConfirmed) {
            document.getElementById("delete-form-" + id).submit();
        }
    });
}
</script>

@endsection
