@extends('layouts.user')
@section('title','Jadwal Kereta')
@section('content')
<div class="mb-4">
    <h1 class="page-title">Jadwal <span>Kereta</span></h1>
    <p class="page-sub">Temukan jadwal kereta sesuai rute Anda</p>
</div>

<div class="k-card mb-4">
    <div class="k-card-body">
        <form method="GET" action="{{ route('user.jadwal') }}">
            <div class="row g-3">
                <div class="col-md-3"><div class="form-group" style="margin-bottom:0;"><label class="form-label">Asal</label><input type="text" name="asal" value="{{ $asal }}" class="form-input" placeholder="Stasiun asal"></div></div>
                <div class="col-md-3"><div class="form-group" style="margin-bottom:0;"><label class="form-label">Tujuan</label><input type="text" name="tujuan" value="{{ $tujuan }}" class="form-input" placeholder="Stasiun tujuan"></div></div>
                <div class="col-md-2"><div class="form-group" style="margin-bottom:0;"><label class="form-label">Tanggal</label><input type="date" name="tanggal" value="{{ $tanggal }}" class="form-input"></div></div>
                <div class="col-md-2"><div class="form-group" style="margin-bottom:0;"><label class="form-label">Kelas</label><select name="kelas" class="form-input"><option value="">Semua</option><option value="Ekonomi" {{ $kelas=='Ekonomi'?'selected':'' }}>Ekonomi</option><option value="Bisnis" {{ $kelas=='Bisnis'?'selected':'' }}>Bisnis</option><option value="Eksekutif" {{ $kelas=='Eksekutif'?'selected':'' }}>Eksekutif</option></select></div></div>
                <div class="col-md-1 d-flex align-items-end"><button type="submit" class="btn-p w-100"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z"/></svg>Cari</button></div>
                <div class="col-md-1 d-flex align-items-end"><a href="{{ route('user.jadwal') }}" class="btn-s w-100">Reset</a></div>
            </div>
        </form>
    </div>
</div>

@forelse($jadwal as $j)
<div class="jadwal-card mb-3">
    <div class="row align-items-center">
        <div class="col-md-5">
            <div style="display:flex;align-items:center;gap:9px;margin-bottom:6px;">
                <span style="font-weight:700;font-size:15px;">{{ $j->kereta->nama_kereta }}</span>
                <span class="kelas-badge {{ strtolower($j->kereta->kelas) }}">{{ $j->kereta->kelas }}</span>
            </div>
            <div class="route-d">
                <span class="stn" style="font-size:15px;">{{ $j->stasiun_asal }}</span>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"/></svg>
                <span class="stn" style="font-size:15px;">{{ $j->stasiun_tujuan }}</span>
            </div>
        </div>
        <div class="col-md-3 mt-3 mt-md-0">
            <div style="font-size:11px;color:var(--muted);font-weight:600;text-transform:uppercase;letter-spacing:.8px;margin-bottom:4px;">Keberangkatan</div>
            <div style="display:flex;align-items:center;gap:10px;">
                <div class="time-chip" style="font-size:16px;">{{ \Carbon\Carbon::parse($j->jam_berangkat)->format('H:i') }}</div>
                <div style="font-size:13px;color:var(--muted);">{{ \Carbon\Carbon::parse($j->tanggal_berangkat)->format('d M Y') }}</div>
            </div>
        </div>
        <div class="col-md-2 mt-3 mt-md-0">
            <div style="font-size:11px;color:var(--muted);font-weight:600;text-transform:uppercase;letter-spacing:.8px;margin-bottom:4px;">Kelas</div>
            <span class="kelas-badge {{ strtolower($j->kereta->kelas) }}" style="font-size:12px;padding:4px 12px;">{{ $j->kereta->kelas }}</span>
        </div>
        <div class="col-md-2 mt-3 mt-md-0 text-md-end">
            <a href="{{ route('user.pesan', ['jadwal_id'=>$j->id_jadwal]) }}" class="btn-p">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M16.5 6v.75m0 3v.75m0 3v.75m0 3V18m-9-5.25h5.25M7.5 15h3M3.375 5.25c-.621 0-1.125.504-1.125 1.125v3.026a2.999 2.999 0 010 5.198v3.026c0 .621.504 1.125 1.125 1.125h17.25c.621 0 1.125-.504 1.125-1.125v-3.026a2.999 2.999 0 010-5.198V6.375c0-.621-.504-1.125-1.125-1.125H3.375z"/></svg>
                Pesan Tiket
            </a>
        </div>
    </div>
</div>
@empty
<div class="k-card"><div class="k-card-body" style="text-align:center;color:var(--muted);padding:48px;">Tidak ada jadwal ditemukan. Coba ubah filter pencarian.</div></div>
@endforelse

@if($jadwal->hasPages())
<div class="mt-4">{{ $jadwal->appends(request()->query())->links() }}</div>
@endif
@endsection
