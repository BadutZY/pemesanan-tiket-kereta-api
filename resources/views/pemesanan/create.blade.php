@extends('layouts.app')
@section('title', 'Pesan Tiket')
@section('breadcrumb', 'Pesan Tiket')

@section('content')
<div class="page-header">
    <div style="display:flex;align-items:center;gap:12px;">
        <a href="{{ route('pemesanan.index') }}" class="btn-secondary" style="padding:9px 12px;"><i class="bi bi-arrow-left"></i></a>
        <div>
            <h1 class="page-title">Pesan <span style="color:var(--kai-red)">Tiket</span></h1>
            <p class="page-subtitle">Buat pemesanan tiket kereta api baru</p>
        </div>
    </div>
</div>
<div class="row justify-content-center">
    <div class="col-lg-7">
        <div class="kai-card fade-up">
            <div class="k-card-header">
                <div class="k-card-title">
                    <span style="background:rgba(227,30,36,.12);color:var(--kai-red);width:32px;height:32px;border-radius:8px;display:flex;align-items:center;justify-content:center;"><i class="bi bi-ticket-perforated-fill"></i></span>
                    Form Pemesanan Tiket
                </div>
            </div>
            <div class="k-card-body">
                <form action="{{ route('pemesanan.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label class="form-label">Penumpang <span style="color:var(--kai-red)">*</span></label>
                        <select name="id_penumpang" class="form-input {{ $errors->has('id_penumpang') ? 'is-invalid' : '' }}">
                            <option value="">-- Pilih Penumpang --</option>
                            @foreach($penumpang as $p)
                            <option value="{{ $p->id_penumpang }}" {{ old('id_penumpang') == $p->id_penumpang ? 'selected' : '' }}>
                                {{ $p->nama_penumpang }} — {{ $p->no_hp }}
                            </option>
                            @endforeach
                        </select>
                        @error('id_penumpang')<div class="invalid-msg"><i class="bi bi-exclamation-circle-fill"></i> {{ $message }}</div>@enderror
                    </div>
                    <div class="form-group">
                        <label class="form-label">Jadwal Kereta <span style="color:var(--kai-red)">*</span></label>
                        <select name="id_jadwal" class="form-input {{ $errors->has('id_jadwal') ? 'is-invalid' : '' }}">
                            <option value="">-- Pilih Jadwal --</option>
                            @foreach($jadwal as $j)
                            <option value="{{ $j->id_jadwal }}" {{ old('id_jadwal') == $j->id_jadwal ? 'selected' : '' }}>
                                {{ $j->kereta->nama_kereta }} | {{ $j->stasiun_asal }} → {{ $j->stasiun_tujuan }} | {{ \Carbon\Carbon::parse($j->tanggal_berangkat)->format('d M Y') }} {{ \Carbon\Carbon::parse($j->jam_berangkat)->format('H:i') }}
                            </option>
                            @endforeach
                        </select>
                        @error('id_jadwal')<div class="invalid-msg"><i class="bi bi-exclamation-circle-fill"></i> {{ $message }}</div>@enderror
                    </div>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Tanggal Pesan <span style="color:var(--kai-red)">*</span></label>
                                <input type="date" name="tanggal_pesan" value="{{ old('tanggal_pesan', date('Y-m-d')) }}"
                                    class="form-input {{ $errors->has('tanggal_pesan') ? 'is-invalid' : '' }}">
                                @error('tanggal_pesan')<div class="invalid-msg"><i class="bi bi-exclamation-circle-fill"></i> {{ $message }}</div>@enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Jumlah Tiket <span style="color:var(--kai-red)">*</span></label>
                                <input type="number" name="jumlah_tiket" value="{{ old('jumlah_tiket', 1) }}"
                                    class="form-input {{ $errors->has('jumlah_tiket') ? 'is-invalid' : '' }}"
                                    min="1" max="10">
                                @error('jumlah_tiket')<div class="invalid-msg"><i class="bi bi-exclamation-circle-fill"></i> {{ $message }}</div>@enderror
                            </div>
                        </div>
                    </div>
                    <div style="display:flex;gap:12px;margin-top:28px;">
                        <button type="submit" class="btn-primary"><i class="bi bi-check-circle-fill"></i> Buat Pemesanan</button>
                        <a href="{{ route('pemesanan.index') }}" class="btn-secondary"><i class="bi bi-x-circle"></i> Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
