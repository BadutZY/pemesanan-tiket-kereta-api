@extends('layouts.admin')
@section('title','Detail Penumpang')
@section('breadcrumb','Detail Penumpang')
@section('content')
<div class="page-header"><div style="display:flex;align-items:center;gap:12px;">
    <a href="{{ route('admin.penumpang.index') }}" class="btn-secondary" style="padding:8px 10px;"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18"/></svg></a>
    <div><h1 class="page-title">Detail <span>Penumpang</span></h1><p class="page-subtitle">{{ $penumpang->nama_penumpang }}</p></div>
</div></div>
@php
    $userPhoto = optional($penumpang->pemesanan->first()?->user)->photo_profile;
    $initials  = strtoupper(substr($penumpang->nama_penumpang, 0, 2));
@endphp
<div class="row g-3">
    <div class="col-lg-4 fade-up">
        <div class="k-card" style="padding:28px;text-align:center;">
            @if($userPhoto)
                <img src="{{ Storage::disk('public')->url($userPhoto) }}" alt="{{ $penumpang->nama_penumpang }}"
                     style="width:80px;height:80px;border-radius:16px;object-fit:cover;border:2px solid var(--border);margin:0 auto 16px;display:block;">
            @else
                <div style="width:80px;height:80px;border-radius:16px;background:var(--bg-surface3);border:1px solid var(--border);display:flex;align-items:center;justify-content:center;font-size:26px;font-weight:700;color:var(--text-secondary);margin:0 auto 16px;">{{ $initials }}</div>
            @endif
            <h3 style="font-family:var(--font-display);font-size:18px;font-weight:900;margin-bottom:4px;">{{ $penumpang->nama_penumpang }}</h3>
            <p style="color:var(--text-muted);font-size:12px;">ID #{{ $penumpang->id_penumpang }}</p>
            <div class="info-row" style="margin-top:20px;text-align:left;"><div class="info-lbl">NIK</div><div class="info-val"><span class="mono" style="font-size:11px;">{{ $penumpang->nik }}</span></div></div>
            <div class="info-row" style="text-align:left;"><div class="info-lbl">No. HP</div><div class="info-val">{{ $penumpang->no_hp }}</div></div>
        </div>
    </div>
    <div class="col-lg-8 fade-up d1">
        <div class="k-card">
            <div class="k-card-header"><div class="k-card-title">Riwayat Pemesanan</div><span style="font-size:11px;font-weight:600;background:var(--bg-surface2);color:var(--text-muted);padding:3px 9px;border-radius:5px;border:1px solid var(--border);">{{ $penumpang->pemesanan->count() }}</span></div>
            <div style="overflow-x:auto;"><table class="k-table">
                <thead><tr><th>Kereta</th><th>Rute</th><th>Tanggal</th><th>Tiket</th></tr></thead>
                <tbody>
                    @forelse($penumpang->pemesanan as $o)
                    <tr>
                        <td><div style="font-weight:600;font-size:13px;">{{ $o->jadwal->kereta->nama_kereta }}</div><span class="badge-kelas {{ strtolower($o->jadwal->kereta->kelas) }}">{{ $o->jadwal->kereta->kelas }}</span></td>
                        <td><div class="route-wrap"><span class="station" style="font-size:12px;">{{ $o->jadwal->stasiun_asal }}</span><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"/></svg><span class="station" style="font-size:12px;">{{ $o->jadwal->stasiun_tujuan }}</span></div></td>
                        <td style="font-size:12px;color:var(--text-muted);">{{ $o->tanggal_pesan->format('d M Y') }}</td>
                        <td><span class="badge-count {{ $o->jumlah_tiket>2?'high':'low' }}">{{ $o->jumlah_tiket }} tiket</span></td>
                    </tr>
                    @empty
                    <tr><td colspan="4" style="text-align:center;color:var(--text-muted);padding:24px;">Belum ada pemesanan</td></tr>
                    @endforelse
                </tbody>
            </table></div>
        </div>
    </div>
</div>
@endsection
