@extends('layouts.admin')

@section('content')

<style>
body {
    background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%) !important;
}

/* Page Header */
.page-header {
    margin-bottom: 30px;
}

.page-header h2 {
    color: white;
    font-weight: 700;
    font-size: 2rem;
    margin-bottom: 8px;
}

.page-header p {
    color: rgba(255, 255, 255, 0.7);
    margin: 0;
    font-size: 1rem;
}

/* Table Wrapper */
.table-wrapper {
    background: rgba(255, 255, 255, 0.08);
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255, 255, 255, 0.1);
    padding: 30px;
    border-radius: 20px;
    box-shadow: 0 8px 20px rgba(0,0,0,0.3);
    overflow-x: auto;
}

/* Table Custom */
.table-dark-custom {
    margin-bottom: 0;
    border-collapse: separate;
    border-spacing: 0 8px;
}

.table-dark-custom thead th {
    background: rgba(255, 255, 255, 0.05);
    color: rgba(255, 255, 255, 0.9);
    font-weight: 600;
    font-size: 0.9rem;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    padding: 14px 16px !important;
    border: none;
    white-space: nowrap;
}

.table-dark-custom thead th:first-child {
    border-radius: 12px 0 0 12px;
}

.table-dark-custom thead th:last-child {
    border-radius: 0 12px 12px 0;
}

.table-dark-custom tbody tr {
    background: rgba(255, 255, 255, 0.05);
    color: rgba(255, 255, 255, 0.9);
    transition: all 0.2s ease;
}

.table-dark-custom tbody tr:hover {
    background: rgba(255, 255, 255, 0.1);
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(0,0,0,0.2);
}

.table-dark-custom tbody td {
    padding: 16px !important;
    border: none;
    vertical-align: middle;
    font-size: 0.9rem;
}

.table-dark-custom tbody tr td:first-child {
    border-radius: 12px 0 0 12px;
}

.table-dark-custom tbody tr td:last-child {
    border-radius: 0 12px 12px 0;
}

/* ID Badge */
.id-badge {
    background: rgba(96, 165, 250, 0.2);
    color: #60a5fa;
    padding: 4px 12px;
    border-radius: 8px;
    font-weight: 600;
    display: inline-block;
}

/* User Info */
.user-info {
    display: flex;
    align-items: center;
    gap: 10px;
}

.user-icon {
    color: #60a5fa;
    font-size: 1.4rem;
}

.user-name {
    color: #1f2937 !important;
    font-weight: 600 !important;
}

/* Email */
.email-text {
    color: #374151 !important;
    font-size: 0.9rem;
    display: flex;
    align-items: center;
    gap: 6px;
    font-weight: 500 !important;
}

.email-text i {
    color: #60a5fa;
}

/* Role Badges */
.badge-role-admin {
    background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%);
    padding: 6px 14px;
    border-radius: 20px;
    color: white;
    font-size: 0.85rem;
    font-weight: 600;
    display: inline-block;
}

.badge-role-user {
    background: linear-gradient(135deg, #34d399 0%, #10b981 100%);
    padding: 6px 14px;
    border-radius: 20px;
    color: white;
    font-size: 0.85rem;
    font-weight: 600;
    display: inline-block;
}

/* Badge Me */
.badge-me {
    background: linear-gradient(135deg, #fbbf24 0%, #f59e0b 100%);
    color: #78350f;
    padding: 4px 10px;
    border-radius: 12px;
    font-size: 0.75rem;
    font-weight: 700;
    margin-left: 8px;
    display: inline-block;
}

/* Delete Button */
.btn-delete {
    background: rgba(239, 68, 68, 0.15);
    border: 1px solid rgba(239, 68, 68, 0.3);
    color: #f87171;
    width: 36px;
    height: 36px;
    border-radius: 10px;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: all 0.2s ease;
    font-size: 1.1rem;
}

.btn-delete:hover {
    background: rgba(239, 68, 68, 0.25);
    border-color: rgba(239, 68, 68, 0.5);
    color: #ef4444;
    transform: scale(1.1);
}

/* No Action */
.no-action {
    color: #9ca3af !important;
    font-size: 1.2rem;
}

/* Empty State */
.empty-state {
    text-align: center;
    padding: 60px 20px;
    color: rgba(255, 255, 255, 0.6);
}

.empty-state i {
    font-size: 4rem;
    color: rgba(255, 255, 255, 0.3);
    margin-bottom: 20px;
}

/* Responsive */
@media (max-width: 768px) {
    .table-wrapper {
        padding: 20px 15px;
    }

    .page-header h2 {
        font-size: 1.6rem;
    }

    .table-dark-custom {
        font-size: 0.85rem;
    }
}
</style>

<div class="container py-5">

    <!-- Page Header -->
    <div class="page-header">
        <h2>Daftar Pengguna</h2>
        <p>Kelola dan pantau semua pengguna yang terdaftar di sistem</p>
    </div>

    <!-- Table Wrapper -->
    <div class="table-wrapper">

        <table class="table table-dark-custom table-borderless w-100">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>

            <tbody>
                @forelse($users as $u)
                <tr>
                    <!-- ID -->
                    <td>
                        <span class="id-badge">#{{ $u->id }}</span>
                    </td>
                    
                    <!-- NAMA -->
                    <td>
                        <div class="user-info">
                            <i class="bi bi-person-circle user-icon"></i>
                            <span class="user-name">{{ $u->name }}</span>
                            
                            {{-- Tandai diri sendiri --}}
                            @if(auth()->id() == $u->id)
                                <span class="badge-me">Saya</span>
                            @endif
                        </div>
                    </td>
                    
                    <!-- EMAIL -->
                    <td>
                        <span class="email-text">
                            <i class="bi bi-envelope"></i>
                            {{ $u->email }}
                        </span>
                    </td>

                    <!-- ROLE -->
                    <td>
                        @if($u->role === 'admin')
                            <span class="badge-role-admin">Admin</span>
                        @else
                            <span class="badge-role-user">User</span>
                        @endif
                    </td>

                    <!-- AKSI -->
                    <td class="text-center">
                        {{-- Hanya boleh hapus USER lain (bukan admin & bukan diri sendiri) --}}
                        @if($u->role === 'user' && auth()->id() !== $u->id)
                            <span onclick="confirmDeleteUser({{ $u->id }})" class="btn-delete">
                                <i class="bi bi-trash"></i>
                            </span>

                            <form id="user-delete-{{ $u->id }}" 
                                action="{{ route('admin.daftarpengguna.delete', $u->id) }}"
                                method="POST" style="display: none;">
                                @csrf
                                @method('DELETE')
                            </form>

                        {{-- Selain itu --}}
                        @else
                            <span class="no-action">—</span>
                        @endif
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5">
                        <div class="empty-state">
                            <i class="bi bi-people"></i>
                            <p>Belum ada pengguna yang terdaftar</p>
                        </div>
                    </td>
                </tr>
                @endforelse
            </tbody>

        </table>

    </div>

</div>

<!-- SweetAlert2 Library -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
function confirmDeleteUser(id) {
    Swal.fire({
        title: "Hapus pengguna?",
        text: "Pengguna akan dihapus permanen!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#ef4444",
        cancelButtonColor: "#6b7280",
        confirmButtonText: "Ya, hapus!",
        cancelButtonText: "Batal"
    }).then((result) => {
        if (result.isConfirmed) {
            document.getElementById("user-delete-" + id).submit();
        }
    });
}
</script>

{{-- Notifikasi Success --}}
@if(session('success'))
<script>
    Swal.fire({
        icon: 'success',
        title: 'Berhasil!',
        text: "{{ session('success') }}",
        timer: 2500,
        showConfirmButton: false
    });
</script>
@endif

{{-- Notifikasi Error --}}
@if(session('error'))
<script>
    Swal.fire({
        icon: 'error',
        title: 'Gagal!',
        text: "{{ session('error') }}"
    });
</script>
@endif

{{-- Notifikasi Validation Errors --}}
@if($errors->any())
<script>
    Swal.fire({
        icon: 'error',
        title: 'Gagal',
        text: "{{ $errors->first() }}"
    });
</script>
@endif

@endsection