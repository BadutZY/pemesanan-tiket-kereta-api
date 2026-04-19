@extends('layouts.user')
@section('title','Pesan Tiket')
@section('content')
<div class="mb-4">
    <div style="display:flex;align-items:center;gap:12px;">
        <a href="{{ route('user.jadwal') }}" class="btn-s" style="padding:8px 10px;"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18"/></svg></a>
        <div><h1 class="page-title">Pesan <span>Tiket</span></h1><p class="page-sub">Isi data penumpang untuk melanjutkan</p></div>
    </div>
</div>
<div class="row g-3">
    <div class="col-lg-7">
        <div class="k-card">
            <div class="k-card-body">
                <h3 style="font-family:var(--display);font-size:16px;font-weight:900;margin-bottom:18px;">Data Penumpang</h3>
                <form method="POST" action="{{ route('user.pesan.store') }}">
                    @csrf
                    <input type="hidden" name="id_jadwal" value="{{ $jadwal->id_jadwal }}">
                    <div class="form-group">
                        <label class="form-label">Nama Penumpang *</label>
                        <input type="text" name="nama_penumpang" value="{{ old('nama_penumpang', Auth::user()->name) }}" class="form-input" required placeholder="Nama sesuai KTP">
                    </div>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">NIK (16 Digit) *</label>
                                <input type="text" name="nik" value="{{ old('nik', Auth::user()->nik) }}" class="form-input" placeholder="3201XXXXXXXXXXXX" maxlength="16" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">No. HP *</label>
                                <input type="text" name="no_hp" value="{{ old('no_hp', Auth::user()->no_hp) }}" class="form-input" placeholder="08XXXXXXXXXX" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Jumlah Tiket *</label>
                        <select name="jumlah_tiket" class="form-input">
                            @for($i=1;$i<=10;$i++)<option value="{{ $i }}" {{ old('jumlah_tiket')==$i?'selected':'' }}>{{ $i }} Tiket</option>@endfor
                        </select>
                    </div>
                    <button type="submit" class="btn-p w-100" style="justify-content:center;padding:12px;">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        Konfirmasi Pemesanan
                    </button>
                </form>
            </div>
        </div>
    </div>
    <div class="col-lg-5">
        <div class="k-card">
            <div class="k-card-body">
                <h3 style="font-family:var(--display);font-size:15px;font-weight:900;margin-bottom:16px;">Detail Perjalanan</h3>
                <div style="margin-bottom:14px;padding-bottom:14px;border-bottom:1px solid var(--border);">
                    <div style="display:flex;align-items:center;gap:8px;margin-bottom:6px;">
                        <span style="font-weight:700;">{{ $jadwal->kereta->nama_kereta }}</span>
                        <span class="kelas-badge {{ strtolower($jadwal->kereta->kelas) }}">{{ $jadwal->kereta->kelas }}</span>
                    </div>
                    <div class="route-d mt-2">
                        <span class="stn">{{ $jadwal->stasiun_asal }}</span>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"/></svg>
                        <span class="stn">{{ $jadwal->stasiun_tujuan }}</span>
                    </div>
                </div>
                <div style="display:flex;justify-content:space-between;font-size:13px;margin-bottom:8px;"><span style="color:var(--muted);">Tanggal</span><span>{{ \Carbon\Carbon::parse($jadwal->tanggal_berangkat)->format('d M Y') }}</span></div>
                <div style="display:flex;justify-content:space-between;font-size:13px;"><span style="color:var(--muted);">Jam</span><span class="time-chip">{{ \Carbon\Carbon::parse($jadwal->jam_berangkat)->format('H:i') }} WIB</span></div>
            </div>
        </div>
    </div>
</div>
@endsection
