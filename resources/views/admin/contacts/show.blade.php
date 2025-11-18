@extends('admin.layouts.app')

@section('title', 'Detail Kontak')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Detail Kontak #{{ $id }}</h3>
                </div>
                <div class="card-body">
                    {{-- TODO: Display actual contact data when model is implemented --}}
                    <div class="row">
                        <div class="col-md-6">
                            <table class="table table-borderless">
                                <tr>
                                    <th width="30%">WhatsApp:</th>
                                    <td>-</td>
                                </tr>
                                <tr>
                                    <th>Email:</th>
                                    <td>-</td>
                                </tr>
                                <tr>
                                    <th>Facebook:</th>
                                    <td>-</td>
                                </tr>
                                <tr>
                                    <th>Instagram:</th>
                                    <td>-</td>
                                </tr>
                                <tr>
                                    <th>Tanggal:</th>
                                    <td>-</td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-6">
                            <h5>Pesan:</h5>
                            <div class="border p-3 bg-light">
                                <em>Pesan akan ditampilkan di sini</em>
                            </div>
                        </div>
                    </div>
                    <div class="mt-4">
                        <a href="{{ route('admin.contacts.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left"></i> Kembali
                        </a>
                        <a href="{{ route('admin.contacts.edit', $id) }}" class="btn btn-warning">
                            <i class="fas fa-edit"></i> Edit
                        </a>
                        <form action="{{ route('admin.contacts.destroy', $id) }}" method="POST" class="d-inline" 
                              onsubmit="return confirm('Yakin ingin menghapus kontak ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">
                                <i class="fas fa-trash"></i> Hapus
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
