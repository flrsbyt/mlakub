@extends('admin.layouts.app')

@section('title', 'Galeri')
@section('page-title', 'Kelola Galeri')
@section('page-subtitle', 'Kelola foto dan video untuk konten wisata')

@section('content')
<style>
  .stats-section{display:grid;grid-template-columns:repeat(auto-fit,minmax(220px,1fr));gap:1.5rem;margin-bottom:2rem}
  .stat-card{background:#fff;padding:1.25rem;border-radius:1rem;box-shadow:0 0.125rem 0.25rem rgba(0,0,0,.075)}
  .gallery-controls{background:#fff;padding:1rem 1.25rem;border-radius:1rem;margin-bottom:1.25rem;box-shadow:0 0.125rem 0.25rem rgba(0,0,0,.075)}
  .gallery-grid{display:grid;grid-template-columns:repeat(auto-fill,minmax(260px,1fr));gap:1rem}
  .gallery-item{background:#fff;border-radius:.75rem;overflow:hidden;box-shadow:0 0.125rem 0.25rem rgba(0,0,0,.075)}
  .gallery-thumb{height:180px;background:linear-gradient(135deg,#e9ecef,#dee2e6);display:flex;align-items:center;justify-content:center;font-size:2rem}
  .gallery-info{padding:1rem}
  .gallery-meta{display:flex;justify-content:space-between;color:#6c757d;font-size:.875rem;margin-top:.25rem}
</style>

<div class="stats-section">
  <div class="stat-card">
    <div class="fw-bold">Total Media</div>
    <div class="h4 mb-0">247</div>
    <div class="text-muted small">↗ +12 bulan ini</div>
  </div>
  <div class="stat-card">
    <div class="fw-bold">Foto</div>
    <div class="h4 mb-0">189</div>
    <div class="text-muted small">↗ +8 bulan ini</div>
  </div>
  <div class="stat-card">
    <div class="fw-bold">Video</div>
    <div class="h4 mb-0">58</div>
    <div class="text-muted small">↗ +4 bulan ini</div>
  </div>
</div>

<div class="gallery-controls d-flex align-items-center gap-2 flex-wrap">
  <select class="form-control" style="max-width:200px">
    <option value="">Semua Kategori</option>
    <option value="bromo">Bromo</option>
    <option value="malang">Malang</option>
    <option value="ijen">Ijen</option>
  </select>
  <select class="form-control" style="max-width:160px">
    <option value="">Semua Tipe</option>
    <option value="image">Foto</option>
    <option value="video">Video</option>
  </select>
  <input class="form-control" placeholder="Cari media..." style="max-width:280px" />
  <a href="#" class="btn btn-primary ms-auto">
    <i class="fas fa-plus"></i>
    Upload Media
  </a>
  
</div>

<div class="gallery-grid">
  <div class="gallery-item">
    <div class="gallery-thumb">🖼️</div>
    <div class="gallery-info">
      <div class="fw-bold">Sunrise Bromo Peak</div>
      <div class="gallery-meta"><span>Bromo</span><span>15 Aug 2024</span></div>
    </div>
  </div>
  <div class="gallery-item">
    <div class="gallery-thumb">🎥</div>
    <div class="gallery-info">
      <div class="fw-bold">Drone View Sea of Sand</div>
      <div class="gallery-meta"><span>Video</span><span>10 Aug 2024</span></div>
    </div>
  </div>
</div>
@endsection




