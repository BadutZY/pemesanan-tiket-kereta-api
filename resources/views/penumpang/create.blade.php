@extends('layouts.app')
@section('title','Tambah Penumpang')
@section('breadcrumb','Tambah Penumpang')
@section('content')
<div class="page-header">
    <div style="display:flex;align-items:center;gap:12px;">
        <a href="{{ route('penumpang.index') }}" class="btn-secondary" style="padding:8px 10px;">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18"/></svg>
        </a>
        <div><h1 class="page-title">Tambah <span>Penumpang</span></h1><p class="page-subtitle">Masukkan data penumpang baru</p></div>
    </div>
</div>
<div class="row justify-content-center">
    <div class="col-lg-6">
        <div class="k-card fade-up">
            <div class="k-card-header">
                <div class="k-card-title">
                    <div class="icon-wrap" style="background:var(--accent-soft);"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" style="color:var(--accent);"><path stroke-linecap="round" stroke-linejoin="round" d="M19 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zM4 19.235v-.11a6.375 6.375 0 0112.75 0v.109A12.318 12.318 0 0110.374 21c-2.331 0-4.512-.645-6.374-1.766z"/></svg></div>
                    Form Data Penumpang
                </div>
            </div>
            <div class="k-card-body">
                <form action="{{ route('penumpang.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label class="form-label">Nama Penumpang <span style="color:var(--accent)">*</span></label>
                        <input type="text" name="nama_penumpang" value="{{ old('nama_penumpang') }}" class="form-input {{ $errors->has('nama_penumpang') ? 'is-invalid' : '' }}" placeholder="Nama lengkap sesuai KTP">
                        @error('nama_penumpang')<div class="invalid-msg"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z"/></svg>{{ $message }}</div>@enderror
                    </div>
                    <div class="form-group">
                        <label class="form-label">NIK (16 Digit) <span style="color:var(--accent)">*</span></label>
                        <input type="text" name="nik" value="{{ old('nik') }}" class="form-input mono {{ $errors->has('nik') ? 'is-invalid' : '' }}" placeholder="3201XXXXXXXXXXXX" maxlength="16">
                        @error('nik')<div class="invalid-msg"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z"/></svg>{{ $message }}</div>@enderror
                    </div>
                    <div class="form-group">
                        <label class="form-label">Nomor HP <span style="color:var(--accent)">*</span></label>
                        <input type="text" name="no_hp" value="{{ old('no_hp') }}" class="form-input {{ $errors->has('no_hp') ? 'is-invalid' : '' }}" placeholder="08XXXXXXXXXX">
                        @error('no_hp')<div class="invalid-msg"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z"/></svg>{{ $message }}</div>@enderror
                    </div>
                    <div style="display:flex;gap:10px;margin-top:24px;">
                        <button type="submit" class="btn-primary">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            Simpan Data
                        </button>
                        <a href="{{ route('penumpang.index') }}" class="btn-secondary">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
