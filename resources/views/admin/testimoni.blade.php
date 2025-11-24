@extends('admin.layouts.app')

@section('title', 'Testimoni')
@section('page-title', 'Daftar Testimoni')
@section('page-subtitle', 'Kelola testimoni dari pelanggan')

@push('styles')
<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }
    
    .page-content {
        padding: 24px;
        max-width: 1200px;
        margin: 0 auto;
    }
    
    .section {
        background: white;
        border-radius: 16px;
        padding: 24px;
        margin-bottom: 24px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    }
    
    .section-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 20px;
    }
    
    .btn {
        padding: 8px 16px;
        border: none;
        border-radius: 8px;
        font-size: 14px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 6px;
    }
    
    .btn i {
        font-size: 14px;
    }
    
    .btn-primary {
        background: #ff9500;
    .btn:disabled {
        opacity: 0.6;
        transform: none;
        box-shadow: none;
    }
    
    /* Button Colors */
    .btn-info {
        background-color: #17a2b8;
        border-color: #17a2b8;
        color: white;
    }
    
    .btn-success {
        background-color: #28a745;
        border-color: #28a745;
        color: white;
    }
    
    .btn-danger {
        background-color: #dc3545;
        border-color: #dc3545;
        color: white;
    }
    
    .btn-outline-primary {
        border: 1px solid #007bff;
        color: #007bff;
        background-color: transparent;
    }
    
    .btn-outline-warning {
        border: 1px solid #ffc107;
        color: #ffc107;
        background-color: transparent;
    }
    
    .btn-outline-success {
        border: 1px solid #28a745;
        color: #28a745;
        background-color: transparent;
    }
    
    .btn-outline-danger {
        border: 1px solid #dc3545;
        color: #dc3545;
        background-color: transparent;
    }
</style>
    }
    
    .btn-primary {
        background: #ff9500;
        color: white;
    }
    
    .btn-primary:hover {
        background: #e6860a;
        transform: translateY(-1px);
    }
    
    .btn:disabled {
        opacity: 0.6;
        transform: none;
        box-shadow: none;
    }
    
    /* Button Colors */
    .btn-info {
        background-color: #17a2b8;
        border-color: #17a2b8;
        color: white;
    }
    
    .btn-success {
        background-color: #28a745;
        border-color: #28a745;
        color: white;
    }
    
    .btn-danger {
        background-color: #dc3545;
        border-color: #dc3545;
        color: white;
    }
    
    .btn-outline-primary {
        border: 1px solid #007bff;
        color: #007bff;
        background-color: transparent;
    }
    
    .btn-outline-warning {
        border: 1px solid #ffc107;
        color: #ffc107;
        background-color: transparent;
    }
    
    .btn-outline-success {
        border: 1px solid #28a745;
        color: #28a745;
        background-color: transparent;
    }
    
    .btn-outline-danger {
        border: 1px solid #dc3545;
        color: #dc3545;
        background-color: transparent;
    }
    
    .table-container {
        overflow-x: auto;
    }
    
    .table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 16px;
    }
    
    .table th,
    .table td {
        padding: 12px 16px;
        text-align: left;
        border-bottom: 1px solid #e9ecef;
    }
    
    .table th {
        background-color: #f8f9fa;
        font-weight: 600;
        color: #495057;
        font-size: 14px;
        text-transform: uppercase;
    }
    
    .table td {
        font-size: 14px;
        color: #333;
        vertical-align: middle;
    }
    
    .table tr:hover {
        background-color: #f8f9fa;
    }
    
    .badge {
        padding: 4px 8px;
        border-radius: 12px;
        font-size: 12px;
        font-weight: 600;
        text-align: center;
        min-width: 80px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 4px;
    }
    
    .badge-warning {
        background-color: #fff3cd;
        color: #856404;
    }
    
    .badge-success {
        background-color: #d4edda;
        color: #155724;
    }
    
    .badge-danger {
        background-color: #f8d7da;
        color: #721c24;
    }
    
    .action-buttons {
        display: flex;
        gap: 6px;
    }
    
    .btn-sm {
        padding: 4px 8px;
        font-size: 12px;
        border-radius: 6px;
    }
    
    .btn-icon {
        width: 28px;
        height: 28px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        padding: 0;
    }
    
    .star-rating {
        color: #ffc107;
        white-space: nowrap;
    }
    
    .star-rating .far {
        color: #e9ecef;
    }
    
    .user-info {
        display: flex;
        flex-direction: column;
    }
    
    .user-name {
        font-weight: 600;
        color: #333;
    }
    
    .user-email {
        font-size: 12px;
        color: #6c757d;
    }
    
    @media (max-width: 768px) {
        .page-content {
            padding: 16px;
        }
        
        .section {
            padding: 16px;
        }
        
        .table th,
        .table td {
            padding: 8px 12px;
        }
        
        .action-buttons {
            flex-wrap: wrap;
            gap: 4px;
        }
        
        .btn {
            padding: 4px 8px;
            font-size: 12px;
        }
        
        .btn-icon {
            width: 24px;
            height: 24px;
        }
    }
</style>
@endpush

@section('content')
<div class="page-content">
    <div class="section">
        <div class="section-header">
            <div>
                <h2 class="section-title">Daftar Testimoni</h2>
                <p class="section-subtitle">Kelola testimoni dari pelanggan Anda</p>
            </div>
            <div class="btn-group">
                <a href="{{ route('admin.kontak.testimoni') }}" class="btn {{ request('status') == null ? 'btn-primary' : 'btn-outline-primary' }}">Semua</a>
                <a href="{{ route('admin.kontak.testimoni', ['status' => 'menunggu']) }}" class="btn {{ request('status') == 'menunggu' ? 'btn-primary' : 'btn-outline-primary' }}">Menunggu</a>
                <a href="{{ route('admin.kontak.testimoni', ['status' => 'diterima']) }}" class="btn {{ request('status') == 'diterima' ? 'btn-primary' : 'btn-outline-primary' }}">Diterima</a>
                <a href="{{ route('admin.kontak.testimoni', ['status' => 'ditolak']) }}" class="btn {{ request('status') == 'ditolak' ? 'btn-primary' : 'btn-outline-primary' }}">Ditolak</a>
            </div>
        </div>
        
        <div class="table-container">
            <table class="table">
                <thead>
                    <tr>
                        <th style="width: 50px;">No</th>
                        <th>Nama & Email</th>
                        <th style="width: 120px;">Rating</th>
                        <th>Pesan</th>
                        <th style="width: 120px;">Status</th>
                        <th style="width: 180px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($pesan as $item)
                        <tr id="row-{{ $item->id }}">
                            <td>{{ $loop->iteration + (($pesan->currentPage() - 1) * $pesan->perPage()) }}</td>
                            <td>
                                <div class="user-info">
                                    <span class="user-name">{{ $item->nama }}</span>
                                    <span class="user-email">{{ $item->email }}</span>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <span class="star-rating mr-1">
                                        @for($i = 1; $i <= 5; $i++)
                                            <i class="fas {{ $i <= $item->rating ? 'fa-star' : 'fa-star text-muted' }}"></i>
                                        @endfor
                                    </span>
                                    <span class="text-muted ml-1">{{ $item->rating }}/5</span>
                                </div>
                            </td>
                            <td>
                                <div class="text-truncate" style="max-width: 300px;" title="{{ $item->keterangan }}">
                                    {{ $item->keterangan }}
                                </div>
                            </td>
                            <td>
                                @if($item->status == 'menunggu')
                                    <span class="badge badge-warning">
                                        <i class="far fa-clock"></i> {{ ucfirst($item->status) }}
                                    </span>
                                @elseif($item->status == 'diterima')
                                    <span class="badge badge-success">
                                        <i class="fas fa-check"></i> {{ ucfirst($item->status) }}
                                    </span>
                                @else
                                    <span class="badge badge-danger">
                                        <i class="fas fa-times"></i> {{ ucfirst($item->status) }}
                                    </span>
                                @endif
                            </td>
                            <td>
                                <div class="action-buttons">
                                    <button type="button" class="btn btn-sm btn-icon btn-info" data-toggle="modal" data-target="#detailModal{{ $item->id }}" title="Lihat Detail">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    
                                    @if($item->status != 'diterima')
                                    <form action="{{ route('admin.kontak.status', $item) }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <input type="hidden" name="status" value="diterima">
                                        <button type="submit" class="btn btn-sm btn-icon btn-success" title="Terima Testimoni">
                                            <i class="fas fa-check"></i>
                                        </button>
                                    </form>
                                    @endif
                                    
                                    @if($item->status != 'ditolak')
                                    <form action="{{ route('admin.kontak.status', $item) }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <input type="hidden" name="status" value="ditolak">
                                        <button type="submit" class="btn btn-sm btn-icon btn-danger" title="Tolak Testimoni">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </form>
                                    @endif
                                    
                                    <form action="{{ route('admin.kontak.destroy', $item) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus testimoni ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-icon btn-outline-danger" title="Hapus">
                                            <i class="far fa-trash-alt"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>

                        <!-- Detail Modal -->
                        <div class="modal fade" id="detailModal{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="detailModalLabel{{ $item->id }}" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="detailModalLabel{{ $item->id }}">Detail Testimoni</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="d-flex align-items-center mb-4">
                                            <div class="rounded-circle bg-light d-flex align-items-center justify-content-center" style="width: 48px; height: 48px; margin-right: 12px;">
                                                <i class="fas fa-user text-muted" style="font-size: 20px;"></i>
                                            </div>
                                            <div>
                                                <h6 class="mb-0">{{ $item->nama }}</h6>
                                                <small class="text-muted">{{ $item->email }}</small>
                                            </div>
                                            <div class="ml-auto">
                                                @if($item->status == 'menunggu')
                                                    <span class="badge badge-warning">
                                                        <i class="far fa-clock"></i> {{ ucfirst($item->status) }}
                                                    </span>
                                                @elseif($item->status == 'diterima')
                                                    <span class="badge badge-success">
                                                        <i class="fas fa-check"></i> {{ ucfirst($item->status) }}
                                                    </span>
                                                @else
                                                    <span class="badge badge-danger">
                                                        <i class="fas fa-times"></i> {{ ucfirst($item->status) }}
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        
                                        <div class="mb-3">
                                            <div class="d-flex align-items-center mb-2">
                                                <span class="star-rating mr-2">
                                                    @for($i = 1; $i <= 5; $i++)
                                                        <i class="fas {{ $i <= $item->rating ? 'fa-star' : 'fa-star text-muted' }}"></i>
                                                    @endfor
                                                </span>
                                                <span class="text-muted">{{ $item->rating }}/5</span>
                                                <span class="text-muted ml-auto">{{ $item->created_at->format('d M Y H:i') }}</span>
                                            </div>
                                            <div class="p-3 bg-light rounded">
                                                {{ $item->keterangan }}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center py-4">
                                <div class="text-muted">
                                    <i class="fas fa-inbox fa-2x mb-3"></i>
                                    <p class="mb-0">Tidak ada data testimoni</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            
            @if($pesan->hasPages())
            <div class="mt-4">
                {{ $pesan->withQueryString()->links() }}
            </div>
            @endif
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        // Auto-hide success/error messages after 5 seconds
        setTimeout(function() {
            $('.alert').fadeOut('slow');
        }, 5000);

        // Highlight row based on URL hash
        if (window.location.hash) {
            const id = window.location.hash.substring(1);
            const row = document.getElementById('row-' + id);
            if (row) {
                row.style.backgroundColor = 'rgba(255, 149, 0, 0.1)';
                setTimeout(() => {
                    row.style.transition = 'background-color 1s ease';
                    row.style.backgroundColor = '';
                    
                    // Remove inline style after animation
                    setTimeout(() => {
                        row.style.transition = '';
                    }, 1000);
                }, 2000);
                
                // Scroll to the row
                row.scrollIntoView({ behavior: 'smooth', block: 'center' });
            }
        }
        
        // Add tooltips
        $('[data-toggle="tooltip"]').tooltip();
    });
</script>
@endpush
