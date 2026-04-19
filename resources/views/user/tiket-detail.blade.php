@extends('layouts.user')
@section('title','Detail Tiket')
@section('content')
<div class="mb-4">
    <div style="display:flex;align-items:center;gap:12px;">
        <a href="{{ route('user.tiket') }}" class="btn-s" style="padding:8px 10px;"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18"/></svg></a>
        <div><h1 class="page-title">E-Ticket <span>#{{ str_pad($pemesanan->id_pemesanan,5,'0',STR_PAD_LEFT) }}</span></h1></div>
    </div>
</div>
<div class="row justify-content-center">
    <div class="col-lg-7">
        <div class="k-card" style="border-color:rgba(192,57,43,.2);">
            <div style="background:var(--accent);padding:24px 28px;position:relative;overflow:hidden;">
                <div style="position:absolute;right:-30px;top:-30px;width:120px;height:120px;border-radius:50%;background:rgba(255,255,255,.05);"></div>
                <div style="position:relative;">
                    <div style="font-size:11px;text-transform:uppercase;letter-spacing:1.5px;color:rgba(255,255,255,.7);margin-bottom:4px;">KAI Express — E-Ticket</div>
                    <div style="font-family:var(--display);font-size:22px;font-weight:900;color:#fff;">#{{ str_pad($pemesanan->id_pemesanan,5,'0',STR_PAD_LEFT) }}</div>
                    <div style="margin-top:8px;"><span class="status-badge {{ $pemesanan->status }}" style="font-size:11px;">{{ strtoupper($pemesanan->status) }}</span></div>
                </div>
            </div>

            <div style="padding:24px 28px;border-bottom:2px dashed var(--border);">
                <div class="row">
                    <div class="col-5 text-center">
                        <div style="font-size:10px;color:var(--muted);text-transform:uppercase;letter-spacing:.8px;margin-bottom:6px;">Dari</div>
                        <div style="font-family:var(--display);font-size:18px;font-weight:900;">{{ $pemesanan->jadwal->stasiun_asal }}</div>
                    </div>
                    <div class="col-2 text-center d-flex align-items-center justify-content-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" style="width:22px;height:22px;color:var(--accent);"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"/></svg>
                    </div>
                    <div class="col-5 text-center">
                        <div style="font-size:10px;color:var(--muted);text-transform:uppercase;letter-spacing:.8px;margin-bottom:6px;">Ke</div>
                        <div style="font-family:var(--display);font-size:18px;font-weight:900;">{{ $pemesanan->jadwal->stasiun_tujuan }}</div>
                    </div>
                </div>
            </div>

            <div style="padding:20px 28px;">
                <div class="row g-3 mb-4">
                    <div class="col-6"><div style="font-size:10px;color:var(--muted);text-transform:uppercase;letter-spacing:.8px;margin-bottom:4px;">Kereta</div><div style="font-weight:700;font-size:14px;">{{ $pemesanan->jadwal->kereta->nama_kereta }}</div></div>
                    <div class="col-6"><div style="font-size:10px;color:var(--muted);text-transform:uppercase;letter-spacing:.8px;margin-bottom:4px;">Kelas</div><span class="kelas-badge {{ strtolower($pemesanan->jadwal->kereta->kelas) }}">{{ $pemesanan->jadwal->kereta->kelas }}</span></div>
                    <div class="col-6"><div style="font-size:10px;color:var(--muted);text-transform:uppercase;letter-spacing:.8px;margin-bottom:4px;">Tanggal</div><div style="font-weight:600;font-size:13px;">{{ \Carbon\Carbon::parse($pemesanan->jadwal->tanggal_berangkat)->format('d M Y') }}</div></div>
                    <div class="col-6"><div style="font-size:10px;color:var(--muted);text-transform:uppercase;letter-spacing:.8px;margin-bottom:4px;">Jam</div><div class="time-chip" style="display:inline-flex;">{{ \Carbon\Carbon::parse($pemesanan->jadwal->jam_berangkat)->format('H:i') }} WIB</div></div>
                    <div class="col-6"><div style="font-size:10px;color:var(--muted);text-transform:uppercase;letter-spacing:.8px;margin-bottom:4px;">Penumpang</div><div style="font-weight:700;font-size:14px;">{{ $pemesanan->penumpang->nama_penumpang }}</div></div>
                    <div class="col-6"><div style="font-size:10px;color:var(--muted);text-transform:uppercase;letter-spacing:.8px;margin-bottom:4px;">Jumlah Tiket</div><div style="font-family:var(--display);font-size:22px;font-weight:900;">{{ $pemesanan->jumlah_tiket }}x</div></div>
                </div>

                @if($pemesanan->status === 'confirmed')
                <form method="POST" action="{{ route('user.tiket.cancel',$pemesanan->id_pemesanan) }}" onsubmit="return confirm('Yakin ingin membatalkan pemesanan ini?')">
                    @csrf
                    <button type="submit" class="btn-s w-100 justify-content-center" style="border-color:rgba(192,57,43,.3);color:#f87171;">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg>
                        Batalkan Pemesanan
                    </button>
                </form>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
