@extends('admin.layouts.app')

@section('title', 'Profile')
@section('page-title', 'Profile Admin')
@section('page-subtitle', 'Kelola informasi profile dan akun Anda')

@section('content')
<style>
    /* Scoped styles for profile page only */
    .profile-page .card { border-radius: 14px; box-shadow: 0 6px 20px rgba(0,0,0,0.08); height: 100%; }
    .profile-page .card-header { display: flex; align-items: center; justify-content: space-between; }
    .profile-page .card-header h5 { display: flex; align-items: center; gap: .5rem; margin: 0; }
    .profile-page .card-body { padding: 1.25rem 1.25rem 1.5rem; }

    .profile-page .form-label { font-weight: 600; color: #2c3e50; }
    .profile-page .form-control { border: 2px solid #e9ecef; border-radius: 10px; padding: .75rem 1rem; min-height: 44px; }
    .profile-page .form-control:focus { border-color: #ff6b35; box-shadow: 0 0 0 3px rgba(255,107,53,0.1); }

    .profile-page hr { margin: 1rem 0 1.25rem; border: 0; border-top: 2px solid #f1f3f5; }

    .profile-page .btn { border-radius: 10px; min-height: 44px; }
    .profile-page .btn-primary { box-shadow: 0 5px 15px rgba(255,107,53,0.25); }
    .profile-page .btn-secondary { background: #6c757d; }

    .profile-page .avatar { width: 96px; height: 96px; border-radius: 50%; display:flex; align-items:center; justify-content:center; background: linear-gradient(135deg,#ff6b35,#f7931e); color:#fff; font-size: 2.25rem; font-weight: 700; }
    .profile-page .account-card .badge-role{ background: #dc3545; color:#fff; padding:.35rem .75rem; border-radius:8px; font-weight:600; font-size:.875rem; }
    .profile-page .account-card .section-sep{ height:1px; background:#f1f3f5; margin:1rem 0 1.25rem; }
    .profile-page .account-card .meta-row{ display:flex; gap:1rem; }
    .profile-page .account-card .meta-col{ flex:1; text-align:center; }
    .profile-page .account-card .meta-label{ color:#6c757d; font-size:.875rem; margin-bottom:.25rem; }
    .profile-page .account-card .dates-row{ display:flex; gap:1rem; justify-content:space-between; }
    .profile-page .account-card .date-col{ flex:1; }

    @media (max-width: 768px) {
        .profile-page .card-body { padding: 1rem; }
    }
</style>
<div class="profile-page">
<div class="row g-3 align-items-stretch">
    <!-- Form Edit Profile -->
    <div class="col-md-8">
        <div class="card h-100">
            <div class="card-header">
                <h5 class="mb-0">
                    <i class="fas fa-user-cog me-2"></i>Edit Profile
                </h5>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('admin.profile.update') }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <!-- Upload Foto Profil -->
                    <div class="mb-4">
                        <label for="profile_photo" class="form-label">
                            <i class="fas fa-camera me-2"></i>Foto Profil
                        </label>
                        <div class="d-flex align-items-center gap-3">
                            <div class="current-avatar">
                                @if(isset($user->profile_photo) && $user->profile_photo)
                                    <img src="{{ asset('images/profile_photos/' . basename($user->profile_photo)) }}" 
                                         alt="Profile Photo" 
                                         class="rounded-circle" 
                                         style="width: 60px; height: 60px; object-fit: cover;">
                                @else
                                    <div class="avatar" style="width: 60px; height: 60px; font-size: 1.5rem;">
                                        {{ strtoupper(substr($user->name, 0, 1)) }}
                                    </div>
                                @endif
                            </div>
                            <div class="flex-grow-1">
                                <input type="file" 
                                       class="form-control @error('profile_photo') is-invalid @enderror"
                                       id="profile_photo" 
                                       name="profile_photo"
                                       accept="image/*">
                                <small class="text-muted">Format: JPG, PNG, GIF. Maksimal 2MB</small>
                                @error('profile_photo')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <hr>

                    <div class="row">
                        <!-- Nama Lengkap -->
                        <div class="col-md-6 mb-3">
                            <label for="name" class="form-label">
                                Nama Lengkap <span class="text-danger">*</span>
                            </label>
                            <input type="text" 
                                   class="form-control @error('name') is-invalid @enderror"
                                   id="name" name="name"
                                   value="{{ old('name', $user->name) }}" 
                                   required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Email -->
                        <div class="col-md-6 mb-3">
                            <label for="email" class="form-label">
                                Email <span class="text-danger">*</span>
                            </label>
                            <input type="email" 
                                   class="form-control @error('email') is-invalid @enderror"
                                   id="email" name="email"
                                   value="{{ old('email', $user->email) }}" 
                                   required>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <hr>

                    <div class="row">
                        <!-- Password Saat Ini -->
                        <div class="col-md-6 mb-3">
                            <label for="current_password" class="form-label">Password Saat Ini</label>
                            <input type="password" 
                                   class="form-control @error('current_password') is-invalid @enderror"
                                   id="current_password" name="current_password">
                            @error('current_password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Password Baru -->
                        <div class="col-md-6 mb-3">
                            <label for="new_password" class="form-label">Password Baru</label>
                            <input type="password" 
                                   class="form-control @error('new_password') is-invalid @enderror"
                                   id="new_password" name="new_password">
                            @error('new_password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- Konfirmasi Password Baru -->
                    <div class="mb-3">
                        <label for="new_password_confirmation" class="form-label">Konfirmasi Password Baru</label>
                        <input type="password" class="form-control" 
                               id="new_password_confirmation" 
                               name="new_password_confirmation">
                    </div>

                    <!-- Tombol Aksi -->
                    <div class="d-flex gap-2 flex-wrap">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save me-2"></i>Update Profile
                        </button>
                        <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left me-2"></i>Kembali ke Dashboard
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Informasi Akun -->
    <div class="col-md-4">
        <div class="card account-card h-100">
            <div class="card-header">
                <h5 class="mb-0">
                    <i class="fas fa-info-circle me-2"></i>Informasi Akun
                </h5>
            </div>
            <div class="card-body">
                <div class="text-center mb-3">
                    @if(isset($user->profile_photo) && $user->profile_photo)
                        <img src="{{ asset('images/' . $user->profile_photo) }}" 
                             alt="Profile Photo" 
                             class="rounded-circle mx-auto mb-3" 
                             style="width: 96px; height: 96px; object-fit: cover; display: block;">
                    @else
                        <div class="avatar mx-auto mb-3">{{ strtoupper(substr($user->name, 0, 1)) }}</div>
                    @endif
                    <h5 class="mb-1">{{ $user->name }}</h5>
                    <p class="text-muted mb-3">{{ $user->email }}</p>
                    <span class="badge-role">Admin</span>
                </div>

                <div class="section-sep"></div>

                <div class="dates-row">
                    <div class="date-col">
                        <div class="text-muted small">Dibuat</div>
                        <div>{{ $user->created_at->format('d M Y') }}</div>
                    </div>
                    <div class="date-col text-end">
                        <div class="text-muted small">Update Terakhir</div>
                        <div>{{ $user->updated_at->format('d M Y') }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</div>
@endsection
