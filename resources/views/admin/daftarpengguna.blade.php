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
    .icon-delete {
        cursor: pointer;
        font-size: 22px;
        color: #f87171;
    }
    .icon-delete:hover {
        color: #ef4444;
    }
    .badge-role-admin {
        background: #2563eb;
        padding: 6px 12px;
        border-radius: 8px;
        color: white;
        font-size: 12px;
    }
    .badge-role-user {
        background: #22c55e;
        padding: 6px 12px;
        border-radius: 8px;
        color: white;
        font-size: 12px;
    }
    .badge-me {
        background: #facc15;
        color: black;
        padding: 4px 8px;
        border-radius: 6px;
        font-size: 11px;
        margin-left: 5px;
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
                <td class="p-3">
                    {{ $u->name }}

                    {{-- Tandai diri sendiri --}}
                    @if(auth()->id() == $u->id)
                        <span class="badge-me">Saya</span>
                    @endif
                </td>
                <td class="p-3">{{ $u->email }}</td>

                {{-- ROLE --}}
                <td class="p-3">
                    @if($u->role === 'admin')
                        <span class="badge-role-admin">Admin</span>
                    @else
                        <span class="badge-role-user">User</span>
                    @endif
                </td>

                {{-- AKSI --}}
                <td class="p-3 text-center">

                    {{-- Hanya boleh hapus USER lain (bukan admin & bukan diri sendiri) --}}
                    @if($u->role === 'user' && auth()->id() !== $u->id)
                        <span onclick="confirmDeleteUser({{ $u->id }})" class="icon-delete">🗑️</span>

                        <form id="user-delete-{{ $u->id }}" 
                            action="{{ route('admin.daftarpengguna.delete', $u->id) }}"
                            method="POST">
                            @csrf
                            @method('DELETE')
                        </form>

                    {{-- Selain itu --}}
                    @else
                        <span style="color:#9ca3af;">—</span>
                    @endif

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
