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

/* Kategori Badge */
.kategori-badge {
    background: rgba(139, 92, 246, 0.2);
    color: #a78bfa;
    padding: 6px 14px;
    border-radius: 20px;
    font-size: 0.85rem;
    font-weight: 600;
    display: inline-block;
}

/* Isi Laporan - FIXED */
.laporan-text {
    color: #1f2937 !important;
    max-width: 300px;
    overflow: visible !important;
    text-overflow: ellipsis;
    white-space: normal !important;
    display: block !important;
    font-weight: 600 !important;
    line-height: 1.4;
}

/* Tanggal - FIXED */
.tanggal-text {
    color: #1f2937 !important;
    font-size: 0.9rem !important;
    display: flex !important;
    align-items: center;
    gap: 6px;
    font-weight: 600 !important;
}

.tanggal-text i {
    color: #3b82f6 !important;
    font-size: 1.1rem;
}

/* Status Select */
.select-status {
    border-radius: 20px;
    padding: 7px 14px;
    font-weight: 600;
    font-size: 0.85rem;
    border: none;
    cursor: pointer;
    transition: all 0.2s ease;
    outline: none;
}

.select-status:hover {
    transform: translateY(-1px);
    box-shadow: 0 4px 10px rgba(0,0,0,0.2);
}

.status-Diproses { 
    background: linear-gradient(135deg, #fbbf24 0%, #f59e0b 100%);
    color: #78350f;
}

.status-Selesai { 
    background: linear-gradient(135deg, #34d399 0%, #10b981 100%);
    color: #064e3b;
}

.status-Ditolak { 
    background: linear-gradient(135deg, #f87171 0%, #ef4444 100%);
    color: white;
}

.select-status option {
    color: #000 !important;
    background-color: #ffffff !important;
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

    .laporan-text {
        max-width: 150px;
    }
}
</style>

<div class="container py-5">

    <!-- Page Header -->
    <div class="page-header">
        <h2>Daftar Laporan</h2>
        <p>Kelola dan pantau semua laporan yang masuk dari pengguna</p>
    </div>

    <!-- Table Wrapper -->
    <div class="table-wrapper">

        <table class="table table-dark-custom table-borderless w-100">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Pelapor</th>
                    <th>Kategori</th>
                    <th>Isi Laporan</th>
                    <th>Tanggal</th>
                    <th>Status</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>

            <tbody>
                @forelse($laporan as $item)
                <tr>
                    <td>
                        <span class="id-badge">#{{ $item->id }}</span>
                    </td>
                    
                    <td>
                        <div style="display: flex; align-items: center; gap: 8px;">
                            <i class="bi bi-person-circle" style="color: #60a5fa; font-size: 1.3rem;"></i>
                            <span>{{ $item->nama_pelapor }}</span>
                        </div>
                    </td>
                    
                    <td>
                        <span class="kategori-badge">{{ $item->kategori }}</span>
                    </td>
                    
                    <td>
                        <span class="laporan-text" title="{{ $item->isi_laporan }}">
                            {{ Str::limit($item->isi_laporan, 50) }}
                        </span>
                    </td>
                    
                    <td>
                        <span class="tanggal-text">
                            <i class="bi bi-calendar3"></i>
                            {{ \Carbon\Carbon::parse($item->tanggal)->format('d M Y') }}
                        </span>
                    </td>

                    <!-- STATUS -->
                    <td>
                        <form action="{{ route('admin.daftarlaporan.status', $item->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <select name="status" onchange="this.form.submit()"
                                class="select-status status-{{ $item->status }}">
                                <option value="Diproses" {{ $item->status == 'Diproses' ? 'selected' : '' }}>Diproses</option>
                                <option value="Selesai"  {{ $item->status == 'Selesai' ? 'selected' : '' }}>Selesai</option>
                                <option value="Ditolak"  {{ $item->status == 'Ditolak' ? 'selected' : '' }}>Ditolak</option>
                            </select>
                        </form>
                    </td>

                    <!-- DELETE -->
                    <td class="text-center">
                        <span onclick="confirmDelete({{ $item->id }})" class="btn-delete">
                            <i class="bi bi-trash"></i>
                        </span>

                        <form id="delete-form-{{ $item->id }}" 
                              action="{{ route('admin.daftarlaporan.delete', $item->id) }}" 
                              method="POST" style="display: none;">
                            @csrf
                            @method('DELETE')
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7">
                        <div class="empty-state">
                            <i class="bi bi-inbox"></i>
                            <p>Belum ada laporan yang masuk</p>
                        </div>
                    </td>
                </tr>
                @endforelse
            </tbody>

        </table>

    </div>

</div>


<script>
function confirmDelete(id) {
    Swal.fire({
        title: "Hapus laporan?",
        text: "Data tidak dapat dikembalikan!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#ef4444",
        cancelButtonColor: "#6b7280",
        confirmButtonText: "Ya, hapus!",
        cancelButtonText: "Batal",
        background: '#1e293b',
        color: '#fff',
        customClass: {
            popup: 'swal-dark'
        }
    }).then((result) => {
        if (result.isConfirmed) {
            document.getElementById("delete-form-" + id).submit();
        }
    });
}
</script>

<style>
.swal-dark {
    border: 1px solid rgba(255, 255, 255, 0.1) !important;
}
</style>

<script>
function confirmDelete(id) {
    Swal.fire({
        title: "Hapus laporan?",
        text: "Data tidak dapat dikembalikan!",
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
