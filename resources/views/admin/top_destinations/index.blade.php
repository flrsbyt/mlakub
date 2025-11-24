@extends('admin.layouts.app')

@section('title', 'Top Destinasi')
@section('page-title', 'Top Destinasi')

@section('content')
<div class="section">
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <h4 style="margin-bottom:12px;">Tambah Top Destinasi</h4>
    <form method="POST" action="{{ route('admin.top-destinations.store') }}" style="display:grid;grid-template-columns:1fr 1fr 1fr 1fr;gap:10px;align-items:end;">
        @csrf
        <div>
            <label>Nama</label>
            <input type="text" name="name" class="form-control" required />
        </div>
        <div>
            <label>Bookings</label>
            <input type="number" name="bookings" class="form-control" min="0" value="0" />
        </div>
        <div>
            <label>Urutan</label>
            <input type="number" name="sort_order" class="form-control" min="0" value="0" />
        </div>
        <div>
            <label>Status</label><br>
            <input type="checkbox" name="is_active" value="1" checked /> Aktif
        </div>
        <div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </form>
</div>

<div class="section">
    <h4 style="margin-bottom:12px;">Daftar Top Destinasi</h4>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Bookings</th>
                    <th>Urutan</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($items as $item)
                <tr>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->bookings }}</td>
                    <td>{{ $item->sort_order }}</td>
                    <td>{{ $item->is_active ? 'Aktif' : 'Nonaktif' }}</td>
                    <td style="display:flex;gap:6px;">
                        <form method="POST" action="{{ route('admin.top-destinations.update', $item) }}">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="name" value="{{ $item->name }}" />
                            <input type="hidden" name="bookings" value="{{ $item->bookings }}" />
                            <input type="hidden" name="sort_order" value="{{ $item->sort_order }}" />
                            <input type="hidden" name="is_active" value="{{ $item->is_active ? 1 : 0 }}" />
                            <button class="btn btn-edit btn-sm" type="submit">Simpan (No-Edit)</button>
                        </form>
                        <form method="POST" action="{{ route('admin.top-destinations.destroy', $item) }}" onsubmit="return confirm('Hapus item ini?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-delete btn-sm" type="submit">Hapus</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5">Belum ada data.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div>
        {{ $items->links() }}
    </div>
</div>
@endsection
