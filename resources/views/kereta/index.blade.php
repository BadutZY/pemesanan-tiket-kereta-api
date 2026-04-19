@extends('layouts.app')
@section('title', 'Data Kereta')
@section('breadcrumb', 'Kereta')

@section('content')
<div class="page-header d-flex align-items-center justify-content-between flex-wrap gap-3">
    <div>
        <h1 class="page-title">Armada <span style="color:var(--kai-red)">Kereta</span></h1>
        <p class="page-subtitle">Kelola data kereta dan kelasnya</p>
    </div>
    <a href="{{ route('kereta.create') }}" class="btn-primary">
        <i class="bi bi-train-front-fill"></i> Tambah Kereta
    </a>
</div>

<!-- Search -->
<div class="kai-card mb-4 fade-up">
    <div class="k-card-body" style="padding:16px 20px;">
        <form method="GET" action="{{ route('kereta.index') }}">
            <div class="row g-2 align-items-center">
                <div class="col-md-8">
                    <div class="search-bar">
                        <i class="bi bi-search"></i>
                        <input type="text" name="search" value="{{ $search }}" placeholder="Cari nama kereta atau kelas..." class="form-input">
                    </div>
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn-primary w-100 justify-content-center"><i class="bi bi-search"></i> Cari</button>
                </div>
                <div class="col-md-2">
                    <a href="{{ route('kereta.index') }}" class="btn-secondary w-100 justify-content-center"><i class="bi bi-x-circle"></i> Reset</a>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Cards Grid -->
<div class="row g-3 mb-4 fade-up delay-1">
    @forelse($kereta as $index => $k)
    <div class="col-md-6 col-xl-4">
        <div class="kai-card h-100" style="transition:transform .25s ease,box-shadow .25s ease;">
            <div class="k-card-body">
                <div style="display:flex;align-items:flex-start;justify-content:space-between;margin-bottom:16px;">
                    <div style="width:52px;height:52px;border-radius:14px;display:flex;align-items:center;justify-content:center;font-size:24px;
                        {{ $k->kelas == 'Eksekutif' ? 'background:rgba(139,92,246,.15);' : ($k->kelas == 'Bisnis' ? 'background:rgba(245,166,35,.15);' : 'background:rgba(46,160,67,.15);') }}">
                        
                    </div>
                    <span class="badge-kelas {{ strtolower($k->kelas) }}">{{ $k->kelas }}</span>
                </div>
                <h3 style="font-family:'Syne',sans-serif;font-size:18px;font-weight:800;margin-bottom:6px;color:var(--kai-text);">{{ $k->nama_kereta }}</h3>
                <p style="font-size:12px;color:var(--kai-muted);margin-bottom:16px;">{{ $k->jadwal_count }} Jadwal Tersedia</p>
                <div style="height:1px;background:var(--kai-border);margin-bottom:14px;"></div>
                <div style="display:flex;gap:8px;">
                    <a href="{{ route('kereta.show', $k->id_kereta) }}" class="btn-action view" title="Detail"><i class="bi bi-eye-fill"></i></a>
                    <a href="{{ route('kereta.edit', $k->id_kereta) }}" class="btn-action edit" title="Edit"><i class="bi bi-pencil-fill"></i></a>
                    <form id="del-kereta-{{ $k->id_kereta }}" action="{{ route('kereta.destroy', $k->id_kereta) }}" method="POST" style="display:inline;">
                        @csrf @method('DELETE')
                        <button type="button" class="btn-action delete" onclick="confirmDelete('del-kereta-{{ $k->id_kereta }}')"><i class="bi bi-trash-fill"></i></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @empty
    <div class="col-12">
        <div class="k-card">
            <div class="empty-state">
                <i class="bi bi-train-front"></i>
                <p>Belum ada data kereta</p>
                <a href="{{ route('kereta.create') }}" class="btn-primary mt-3">Tambah Sekarang</a>
            </div>
        </div>
    </div>
    @endforelse
</div>

@if($kereta->hasPages())
<div class="k-card">
    <div class="k-card-body" style="padding:16px 20px;">
        {{ $kereta->appends(['search' => $search])->links() }}
    </div>
</div>
@endif
@endsection
