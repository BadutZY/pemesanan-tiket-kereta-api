@extends('layouts.user')
@section('title','Tiket Saya')
@section('content')
<div class="mb-4"><h1 class="page-title">Tiket <span>Saya</span></h1><p class="page-sub">Riwayat pemesanan tiket Anda</p></div>

@forelse($pesanan as $p)
<a href="{{ route('user.tiket.show',$p->id_pemesanan) }}" style="text-decoration:none;display:block;">
    <div class="k-card mb-3" style="transition:border-color .2s;" onmouseover="this.style.borderColor='rgba(255,255,255,.12)'" onmouseout="this.style.borderColor='var(--border)'">
        <div class="k-card-body">
            <div class="row align-items-center">
                <div class="col-md-1 mb-2 mb-md-0">
                    <div style="font-size:11px;font-weight:700;color:var(--muted);">#{{ str_pad($p->id_pemesanan,5,'0',STR_PAD_LEFT) }}</div>
                </div>
                <div class="col-md-4 mb-2 mb-md-0">
                    <div style="font-weight:700;font-size:14px;color:var(--text);">{{ $p->jadwal->kereta->nama_kereta }}</div>
                    <div class="route-d mt-1"><span style="font-size:12px;color:var(--muted);">{{ $p->jadwal->stasiun_asal }}</span><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" style="width:11px;height:11px;color:var(--accent);flex-shrink:0;"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"/></svg><span style="font-size:12px;color:var(--muted);">{{ $p->jadwal->stasiun_tujuan }}</span></div>
                </div>
                <div class="col-md-2 mb-2 mb-md-0">
                    <div style="font-size:11px;color:var(--muted);margin-bottom:3px;">Berangkat</div>
                    <div style="font-size:13px;font-weight:600;">{{ \Carbon\Carbon::parse($p->jadwal->tanggal_berangkat)->format('d M Y') }}</div>
                </div>
                <div class="col-md-2 mb-2 mb-md-0">
                    <div style="font-size:11px;color:var(--muted);margin-bottom:3px;">Tiket</div>
                    <div style="font-size:14px;font-weight:700;">{{ $p->jumlah_tiket }}x</div>
                </div>
                <div class="col-md-2 mb-2 mb-md-0">
                    <span class="status-badge {{ $p->status }}">{{ $p->status }}</span>
                </div>
                <div class="col-md-1 text-end">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" style="width:16px;height:16px;color:var(--muted);"><path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5"/></svg>
                </div>
            </div>
        </div>
    </div>
</a>
@empty
<div class="k-card"><div class="k-card-body" style="text-align:center;padding:52px;color:var(--muted);">
    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5" style="width:44px;height:44px;margin:0 auto 14px;display:block;opacity:.3;"><path stroke-linecap="round" stroke-linejoin="round" d="M16.5 6v.75m0 3v.75m0 3v.75m0 3V18m-9-5.25h5.25M7.5 15h3M3.375 5.25c-.621 0-1.125.504-1.125 1.125v3.026a2.999 2.999 0 010 5.198v3.026c0 .621.504 1.125 1.125 1.125h17.25c.621 0 1.125-.504 1.125-1.125v-3.026a2.999 2.999 0 010-5.198V6.375c0-.621-.504-1.125-1.125-1.125H3.375z"/></svg>
    Belum ada tiket. <a href="{{ route('user.jadwal') }}" style="color:var(--accent);font-weight:600;">Cari jadwal sekarang</a>
</div></div>
@endforelse

@if($pesanan->hasPages())<div class="mt-4">{{ $pesanan->links() }}</div>@endif
@endsection
