@extends('layouts.app')
@section('title','Edit Penumpang')
@section('breadcrumb','Edit Penumpang')
@section('content')
<div class="page-header">
    <div style="display:flex;align-items:center;gap:12px;">
        <a href="{{ route('penumpang.index') }}" class="btn-secondary" style="padding:8px 10px;"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18"/></svg></a>
        <div><h1 class="page-title">Edit <span>Penumpang</span></h1><p class="page-subtitle">{{ $penumpang->nama_penumpang }}</p></div>
    </div>
</div>
<div class="row justify-content-center">
    <div class="col-lg-6">
        <div class="k-card fade-up">
            <div class="k-card-header">
                <div class="k-card-title">
                    <div class="icon-wrap" style="background:var(--gold-soft);"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" style="color:var(--gold);"><path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931z"/></svg></div>
                    Edit Data Penumpang
                </div>
            </div>
            <div class="k-card-body">
                <form action="{{ route('penumpang.update', $penumpang->id_penumpang) }}" method="POST">
                    @csrf @method('PUT')
                    <div class="form-group">
                        <label class="form-label">Nama Penumpang <span style="color:var(--accent)">*</span></label>
                        <input type="text" name="nama_penumpang" value="{{ old('nama_penumpang',$penumpang->nama_penumpang) }}" class="form-input {{ $errors->has('nama_penumpang') ? 'is-invalid' : '' }}" placeholder="Nama lengkap">
                        @error('nama_penumpang')<div class="invalid-msg"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z"/></svg>{{ $message }}</div>@enderror
                    </div>
                    <div class="form-group">
                        <label class="form-label">NIK (16 Digit) <span style="color:var(--accent)">*</span></label>
                        <input type="text" name="nik" value="{{ old('nik',$penumpang->nik) }}" class="form-input mono {{ $errors->has('nik') ? 'is-invalid' : '' }}" maxlength="16">
                        @error('nik')<div class="invalid-msg"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z"/></svg>{{ $message }}</div>@enderror
                    </div>
                    <div class="form-group">
                        <label class="form-label">Nomor HP <span style="color:var(--accent)">*</span></label>
                        <input type="text" name="no_hp" value="{{ old('no_hp',$penumpang->no_hp) }}" class="form-input {{ $errors->has('no_hp') ? 'is-invalid' : '' }}">
                        @error('no_hp')<div class="invalid-msg"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z"/></svg>{{ $message }}</div>@enderror
                    </div>
                    <div style="display:flex;gap:10px;margin-top:24px;">
                        <button type="submit" class="btn-primary"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>Perbarui Data</button>
                        <a href="{{ route('penumpang.index') }}" class="btn-secondary">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
