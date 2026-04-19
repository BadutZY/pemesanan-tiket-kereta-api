@extends('layouts.app')
@section('title', 'Edit Pemesanan')
@section('breadcrumb', 'Edit Pemesanan')

@section('content')
<div class="page-header">
    <div style="display:flex;align-items:center;gap:12px;">
        <a href="{{ route('pemesanan.index') }}" class="btn-secondary" style="padding:9px 12px;"><i class="bi bi-arrow-left"></i></a>
        <div>
            <h1 class="page-title">Edit <span style="color:var(--kai-red)">Pemesanan</span></h1>
            <p class="page-subtitle">Perbarui data pemesanan #{{ $pemesanan->id_pemesanan }}</p>
        </div>
    </div>
</div>
<div class="row justify-content-center">
    <div class="col-lg-7">
        <div class="kai-card fade-up">
            <div class="k-card-header">
                <div class="k-card-title">
                    <span style="background:rgba(245,166,35,.12);color:var(--kai-gold);width:32px;height:32px;border-radius:8px;display:flex;align-items:center;justify-content:center;"><i class="bi bi-pencil-fill"></i></span>
                    Edit Pemesanan
                </div>
            </div>
            <div class="k-card-body">
                <form action="{{ route('pemesanan.update', $pemesanan->id_pemesanan) }}" method="POST">
                    @csrf @method('PUT')
                    <div class="form-group">
                        <label class="form-label">Penumpang <span style="color:var(--kai-red)">*</span></label>
                        <select name="id_penumpang" class="form-input">
                            @foreach($penumpang as $p)
                            <option value="{{ $p->id_penumpang }}" {{ old('id_penumpang', $pemesanan->id_penumpang) == $p->id_penumpang ? 'selected' : '' }}>
                                {{ $p->nama_penumpang }} — {{ $p->no_hp }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Jadwal Kereta <span style="color:var(--kai-red)">*</span></label>
                        <select name="id_jadwal" class="form-input">
                            @foreach($jadwal as $j)
                            <option value="{{ $j->id_jadwal }}" {{ old('id_jadwal', $pemesanan->id_jadwal) == $j->id_jadwal ? 'selected' : '' }}>
                                {{ $j->kereta->nama_kereta }} | {{ $j->stasiun_asal }} → {{ $j->stasiun_tujuan }} | {{ \Carbon\Carbon::parse($j->tanggal_berangkat)->format('d M Y') }} {{ \Carbon\Carbon::parse($j->jam_berangkat)->format('H:i') }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Tanggal Pesan <span style="color:var(--kai-red)">*</span></label>
                                <input type="date" name="tanggal_pesan" value="{{ old('tanggal_pesan', $pemesanan->tanggal_pesan->format('Y-m-d')) }}" class="form-input">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Jumlah Tiket <span style="color:var(--kai-red)">*</span></label>
                                <input type="number" name="jumlah_tiket" value="{{ old('jumlah_tiket', $pemesanan->jumlah_tiket) }}" class="form-input" min="1" max="10">
                            </div>
                        </div>
                    </div>
                    <div style="display:flex;gap:12px;margin-top:28px;">
                        <button type="submit" class="btn-primary"><i class="bi bi-check-circle-fill"></i> Perbarui</button>
                        <a href="{{ route('pemesanan.index') }}" class="btn-secondary"><i class="bi bi-x-circle"></i> Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
