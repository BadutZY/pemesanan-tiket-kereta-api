@extends('layouts.app')
@section('title', 'Tambah Jadwal')
@section('breadcrumb', 'Tambah Jadwal')

@section('content')
<div class="page-header">
    <div style="display:flex;align-items:center;gap:12px;">
        <a href="{{ route('jadwal.index') }}" class="btn-secondary" style="padding:9px 12px;"><i class="bi bi-arrow-left"></i></a>
        <div>
            <h1 class="page-title">Tambah <span style="color:var(--kai-red)">Jadwal</span></h1>
            <p class="page-subtitle">Buat jadwal keberangkatan baru</p>
        </div>
    </div>
</div>
<div class="row justify-content-center">
    <div class="col-lg-7">
        <div class="kai-card fade-up">
            <div class="k-card-header">
                <div class="k-card-title">
                    <span style="background:rgba(245,166,35,.12);color:var(--kai-gold);width:32px;height:32px;border-radius:8px;display:flex;align-items:center;justify-content:center;"><i class="bi bi-calendar-plus-fill"></i></span>
                    Form Jadwal Keberangkatan
                </div>
            </div>
            <div class="k-card-body">
                <form action="{{ route('jadwal.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label class="form-label">Kereta <span style="color:var(--kai-red)">*</span></label>
                        <select name="id_kereta" class="form-input {{ $errors->has('id_kereta') ? 'is-invalid' : '' }}">
                            <option value="">-- Pilih Kereta --</option>
                            @foreach($kereta as $k)
                            <option value="{{ $k->id_kereta }}" {{ old('id_kereta') == $k->id_kereta ? 'selected' : '' }}>
                                {{ $k->nama_kereta }} ({{ $k->kelas }})
                            </option>
                            @endforeach
                        </select>
                        @error('id_kereta')<div class="invalid-msg"><i class="bi bi-exclamation-circle-fill"></i> {{ $message }}</div>@enderror
                    </div>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Stasiun Asal <span style="color:var(--kai-red)">*</span></label>
                                <input type="text" name="stasiun_asal" value="{{ old('stasiun_asal') }}"
                                    class="form-input {{ $errors->has('stasiun_asal') ? 'is-invalid' : '' }}"
                                    placeholder="cth: Jakarta Gambir">
                                @error('stasiun_asal')<div class="invalid-msg"><i class="bi bi-exclamation-circle-fill"></i> {{ $message }}</div>@enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Stasiun Tujuan <span style="color:var(--kai-red)">*</span></label>
                                <input type="text" name="stasiun_tujuan" value="{{ old('stasiun_tujuan') }}"
                                    class="form-input {{ $errors->has('stasiun_tujuan') ? 'is-invalid' : '' }}"
                                    placeholder="cth: Bandung">
                                @error('stasiun_tujuan')<div class="invalid-msg"><i class="bi bi-exclamation-circle-fill"></i> {{ $message }}</div>@enderror
                            </div>
                        </div>
                    </div>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Tanggal Berangkat <span style="color:var(--kai-red)">*</span></label>
                                <input type="date" name="tanggal_berangkat" value="{{ old('tanggal_berangkat') }}"
                                    class="form-input {{ $errors->has('tanggal_berangkat') ? 'is-invalid' : '' }}">
                                @error('tanggal_berangkat')<div class="invalid-msg"><i class="bi bi-exclamation-circle-fill"></i> {{ $message }}</div>@enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Jam Berangkat <span style="color:var(--kai-red)">*</span></label>
                                <input type="time" name="jam_berangkat" value="{{ old('jam_berangkat') }}"
                                    class="form-input {{ $errors->has('jam_berangkat') ? 'is-invalid' : '' }}">
                                @error('jam_berangkat')<div class="invalid-msg"><i class="bi bi-exclamation-circle-fill"></i> {{ $message }}</div>@enderror
                            </div>
                        </div>
                    </div>
                    <div style="display:flex;gap:12px;margin-top:28px;">
                        <button type="submit" class="btn-primary"><i class="bi bi-check-circle-fill"></i> Simpan Jadwal</button>
                        <a href="{{ route('jadwal.index') }}" class="btn-secondary"><i class="bi bi-x-circle"></i> Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
