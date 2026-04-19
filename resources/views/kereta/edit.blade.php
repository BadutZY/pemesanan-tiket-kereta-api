@extends('layouts.app')
@section('title', 'Edit Kereta')
@section('breadcrumb', 'Edit Kereta')

@section('content')
<div class="page-header">
    <div style="display:flex;align-items:center;gap:12px;">
        <a href="{{ route('kereta.index') }}" class="btn-secondary" style="padding:9px 12px;"><i class="bi bi-arrow-left"></i></a>
        <div>
            <h1 class="page-title">Edit <span style="color:var(--kai-red)">Kereta</span></h1>
            <p class="page-subtitle">Perbarui data: {{ $kereta->nama_kereta }}</p>
        </div>
    </div>
</div>
<div class="row justify-content-center">
    <div class="col-lg-6">
        <div class="kai-card fade-up">
            <div class="k-card-header">
                <div class="k-card-title">
                    <span style="background:rgba(245,166,35,.12);color:var(--kai-gold);width:32px;height:32px;border-radius:8px;display:flex;align-items:center;justify-content:center;"><i class="bi bi-pencil-fill"></i></span>
                    Edit Data Kereta
                </div>
            </div>
            <div class="k-card-body">
                <form action="{{ route('kereta.update', $kereta->id_kereta) }}" method="POST">
                    @csrf @method('PUT')
                    <div class="form-group">
                        <label class="form-label">Nama Kereta <span style="color:var(--kai-red)">*</span></label>
                        <input type="text" name="nama_kereta" value="{{ old('nama_kereta', $kereta->nama_kereta) }}"
                            class="form-input {{ $errors->has('nama_kereta') ? 'is-invalid' : '' }}"
                            placeholder="cth: Argo Bromo Anggrek">
                        @error('nama_kereta')<div class="invalid-msg"><i class="bi bi-exclamation-circle-fill"></i> {{ $message }}</div>@enderror
                    </div>
                    <div class="form-group">
                        <label class="form-label">Kelas <span style="color:var(--kai-red)">*</span></label>
                        <select name="kelas" class="form-input {{ $errors->has('kelas') ? 'is-invalid' : '' }}">
                            <option value="Ekonomi" {{ old('kelas', $kereta->kelas) == 'Ekonomi' ? 'selected' : '' }}> Ekonomi</option>
                            <option value="Bisnis" {{ old('kelas', $kereta->kelas) == 'Bisnis' ? 'selected' : '' }}> Bisnis</option>
                            <option value="Eksekutif" {{ old('kelas', $kereta->kelas) == 'Eksekutif' ? 'selected' : '' }}> Eksekutif</option>
                        </select>
                        @error('kelas')<div class="invalid-msg"><i class="bi bi-exclamation-circle-fill"></i> {{ $message }}</div>@enderror
                    </div>
                    <div style="display:flex;gap:12px;margin-top:28px;">
                        <button type="submit" class="btn-primary"><i class="bi bi-check-circle-fill"></i> Perbarui</button>
                        <a href="{{ route('kereta.index') }}" class="btn-secondary"><i class="bi bi-x-circle"></i> Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
