@extends('layouts.admin')
@section('title','Tambah Jadwal')
@section('breadcrumb','Tambah Jadwal')
@section('content')
<div class="page-header"><div style="display:flex;align-items:center;gap:12px;">
    <a href="{{ route('admin.jadwal.index') }}" class="btn-secondary" style="padding:8px 10px;"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18"/></svg></a>
    <div><h1 class="page-title">Tambah <span>Jadwal</span></h1><p class="page-subtitle">Buat jadwal keberangkatan baru</p></div>
</div></div>
<div class="row justify-content-center"><div class="col-lg-7">
    <div class="k-card fade-up">
        <div class="k-card-header"><div class="k-card-title"><div class="icon-wrap" style="background:var(--gold-soft);"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" style="color:var(--gold);"><path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25"/></svg></div>Form Jadwal</div></div>
        <div class="k-card-body">
            <form action="{{ route('admin.jadwal.store') }}" method="POST">@csrf
                <div class="form-group"><label class="form-label">Kereta <span style="color:var(--accent)">*</span></label>
                    <select name="id_kereta" class="form-input {{ $errors->has('id_kereta')?'is-invalid':'' }}"><option value="">-- Pilih Kereta --</option>@foreach($kereta as $k)<option value="{{ $k->id_kereta }}" {{ old('id_kereta')==$k->id_kereta?'selected':'' }}>{{ $k->nama_kereta }} ({{ $k->kelas }})</option>@endforeach</select>
                    @error('id_kereta')<div class="invalid-msg"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z"/></svg>{{ $message }}</div>@enderror</div>
                <div class="row g-3">
                    <div class="col-md-6"><div class="form-group"><label class="form-label">Stasiun Asal <span style="color:var(--accent)">*</span></label><input type="text" name="stasiun_asal" value="{{ old('stasiun_asal') }}" class="form-input" placeholder="cth: Jakarta Gambir"></div></div>
                    <div class="col-md-6"><div class="form-group"><label class="form-label">Stasiun Tujuan <span style="color:var(--accent)">*</span></label><input type="text" name="stasiun_tujuan" value="{{ old('stasiun_tujuan') }}" class="form-input" placeholder="cth: Bandung"></div></div>
                    <div class="col-md-6"><div class="form-group"><label class="form-label">Tanggal Berangkat <span style="color:var(--accent)">*</span></label><input type="date" name="tanggal_berangkat" value="{{ old('tanggal_berangkat') }}" class="form-input"></div></div>
                    <div class="col-md-6"><div class="form-group"><label class="form-label">Jam Berangkat <span style="color:var(--accent)">*</span></label><input type="time" name="jam_berangkat" value="{{ old('jam_berangkat') }}" class="form-input"></div></div>
                </div>
                <div style="display:flex;gap:10px;margin-top:20px;">
                    <button type="submit" class="btn-primary"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>Simpan Jadwal</button>
                    <a href="{{ route('admin.jadwal.index') }}" class="btn-secondary">Batal</a>
                </div>
            </form>
        </div>
    </div>
</div></div>
@endsection
