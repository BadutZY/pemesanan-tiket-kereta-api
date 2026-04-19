@extends('layouts.admin')
@section('title','Tambah Kereta')
@section('breadcrumb','Tambah Kereta')
@section('content')
<div class="page-header"><div style="display:flex;align-items:center;gap:12px;">
    <a href="{{ route('admin.kereta.index') }}" class="btn-secondary" style="padding:8px 10px;"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18"/></svg></a>
    <div><h1 class="page-title">Tambah <span>Kereta</span></h1><p class="page-subtitle">Daftarkan armada kereta baru</p></div>
</div></div>
<div class="row justify-content-center"><div class="col-lg-6">
    <div class="k-card fade-up">
        <div class="k-card-header"><div class="k-card-title"><div class="icon-wrap" style="background:var(--accent-soft);"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" style="color:var(--accent);"><path stroke-linecap="round" stroke-linejoin="round" d="M8.25 18.75a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m3 0h6m-9 0H3.375a1.125 1.125 0 01-1.125-1.125V14.25m16.5 4.5a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m3 0h1.125c.621 0 1.129-.504 1.09-1.124a17.902 17.902 0 00-3.213-9.193 2.056 2.056 0 00-1.58-.86H14.25M16.5 18.75h-2.25m0-11.177v-.958c0-.568-.422-1.048-.987-1.106a48.554 48.554 0 00-10.026 0 1.106 1.106 0 00-.987 1.106v7.635m12-6.677v6.677m0 4.5v-4.5m0 0h-12"/></svg></div>Form Data Kereta</div></div>
        <div class="k-card-body">
            <form action="{{ route('admin.kereta.store') }}" method="POST">@csrf
                <div class="form-group"><label class="form-label">Nama Kereta <span style="color:var(--accent)">*</span></label><input type="text" name="nama_kereta" value="{{ old('nama_kereta') }}" class="form-input {{ $errors->has('nama_kereta')?'is-invalid':'' }}" placeholder="cth: Argo Bromo Anggrek">@error('nama_kereta')<div class="invalid-msg"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z"/></svg>{{ $message }}</div>@enderror</div>
                <div class="form-group"><label class="form-label">Kelas <span style="color:var(--accent)">*</span></label>
                    <select name="kelas" class="form-input {{ $errors->has('kelas')?'is-invalid':'' }}">
                        <option value="">-- Pilih Kelas --</option>
                        <option value="Ekonomi" {{ old('kelas')=='Ekonomi'?'selected':'' }}>Ekonomi</option>
                        <option value="Bisnis" {{ old('kelas')=='Bisnis'?'selected':'' }}>Bisnis</option>
                        <option value="Eksekutif" {{ old('kelas')=='Eksekutif'?'selected':'' }}>Eksekutif</option>
                    </select>@error('kelas')<div class="invalid-msg"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z"/></svg>{{ $message }}</div>@enderror</div>
                <div style="display:flex;gap:10px;margin-top:24px;">
                    <button type="submit" class="btn-primary"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>Simpan</button>
                    <a href="{{ route('admin.kereta.index') }}" class="btn-secondary">Batal</a>
                </div>
            </form>
        </div>
    </div>
</div></div>
@endsection
