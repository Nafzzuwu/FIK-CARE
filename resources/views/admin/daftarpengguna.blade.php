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
    .btn-role {
        background: #2563eb;
        border: none;
        padding: 6px 15px;
        border-radius: 8px;
        color: white;
        font-size: 13px;
    }
    .btn-role:hover {
        background: #1d4ed8;
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

    <h2 class="fw-bold mb-4">Daftar Pengguna</h2>

    <table class="table table-dark-custom table-borderless w-100">
        <thead>
            <tr>
                <th class="p-3">ID</th>
                <th class="p-3">Nama</th>
                <th class="p-3">Email</th>
                <th class="p-3">Role</th>
                <th class="p-3 text-center">Aksi</th>
            </tr>
        </thead>

        <tbody>
            @foreach($users as $u)
            <tr>
                <td class="p-3">{{ $u->id }}</td>
                <td class="p-3">{{ $u->name }}</td>
                <td class="p-3">{{ $u->email }}</td>

                <td class="p-3">
                    <form action="{{ route('admin.daftarpengguna.role', $u->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <button class="btn-role">
                            {{ $u->role }}
                        </button>
                    </form>
                </td>

                <td class="p-3 text-center">
                    <span onclick="confirmDeleteUser({{ $u->id }})" class="icon-delete">
                        🗑️
                    </span>

                    <form id="user-delete-{{ $u->id }}" 
                        action="{{ route('admin.daftarpengguna.delete', $u->id) }}"
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
function confirmDeleteUser(id) {
    Swal.fire({
        title: "Hapus pengguna?",
        text: "Pengguna akan dihapus permanen!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#d33",
        cancelButtonColor: "#3085d6",
        confirmButtonText: "Ya, hapus"
    }).then((result) => {
        if (result.isConfirmed) {
            document.getElementById("user-delete-" + id).submit();
        }
    });
}
</script>

@endsection
