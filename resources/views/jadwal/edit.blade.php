@extends('layouts.app')
@section('title', 'Edit Jadwal')
@section('breadcrumb', 'Edit Jadwal')

@section('content')
<div class="page-header">
    <div style="display:flex;align-items:center;gap:12px;">
        <a href="{{ route('jadwal.index') }}" class="btn-secondary" style="padding:9px 12px;"><i class="bi bi-arrow-left"></i></a>
        <div>
            <h1 class="page-title">Edit <span style="color:var(--kai-red)">Jadwal</span></h1>
            <p class="page-subtitle">Perbarui jadwal keberangkatan</p>
        </div>
    </div>
</div>
<div class="row justify-content-center">
    <div class="col-lg-7">
        <div class="kai-card fade-up">
            <div class="k-card-header">
                <div class="k-card-title">
                    <span style="background:rgba(245,166,35,.12);color:var(--kai-gold);width:32px;height:32px;border-radius:8px;display:flex;align-items:center;justify-content:center;"><i class="bi bi-pencil-fill"></i></span>
                    Edit Jadwal
                </div>
            </div>
            <div class="k-card-body">
                <form action="{{ route('jadwal.update', $jadwal->id_jadwal) }}" method="POST">
                    @csrf @method('PUT')
                    <div class="form-group">
                        <label class="form-label">Kereta <span style="color:var(--kai-red)">*</span></label>
                        <select name="id_kereta" class="form-input">
                            @foreach($kereta as $k)
                            <option value="{{ $k->id_kereta }}" {{ old('id_kereta', $jadwal->id_kereta) == $k->id_kereta ? 'selected' : '' }}>
                                {{ $k->nama_kereta }} ({{ $k->kelas }})
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Stasiun Asal <span style="color:var(--kai-red)">*</span></label>
                                <input type="text" name="stasiun_asal" value="{{ old('stasiun_asal', $jadwal->stasiun_asal) }}" class="form-input">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Stasiun Tujuan <span style="color:var(--kai-red)">*</span></label>
                                <input type="text" name="stasiun_tujuan" value="{{ old('stasiun_tujuan', $jadwal->stasiun_tujuan) }}" class="form-input">
                            </div>
                        </div>
                    </div>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Tanggal Berangkat <span style="color:var(--kai-red)">*</span></label>
                                <input type="date" name="tanggal_berangkat" value="{{ old('tanggal_berangkat', $jadwal->tanggal_berangkat->format('Y-m-d')) }}" class="form-input">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Jam Berangkat <span style="color:var(--kai-red)">*</span></label>
                                <input type="time" name="jam_berangkat" value="{{ old('jam_berangkat', \Carbon\Carbon::parse($jadwal->jam_berangkat)->format('H:i')) }}" class="form-input">
                            </div>
                        </div>
                    </div>
                    <div style="display:flex;gap:12px;margin-top:28px;">
                        <button type="submit" class="btn-primary"><i class="bi bi-check-circle-fill"></i> Perbarui</button>
                        <a href="{{ route('jadwal.index') }}" class="btn-secondary"><i class="bi bi-x-circle"></i> Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
