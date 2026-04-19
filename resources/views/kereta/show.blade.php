@extends('layouts.app')
@section('title', 'Detail Kereta')
@section('breadcrumb', 'Detail Kereta')

@section('content')
<div class="page-header">
    <div style="display:flex;align-items:center;gap:12px;">
        <a href="{{ route('kereta.index') }}" class="btn-secondary" style="padding:9px 12px;"><i class="bi bi-arrow-left"></i></a>
        <div>
            <h1 class="page-title">Detail <span style="color:var(--kai-red)">Kereta</span></h1>
            <p class="page-subtitle">{{ $kereta->nama_kereta }}</p>
        </div>
    </div>
</div>
<div class="row g-3">
    <div class="col-lg-4 fade-up">
        <div class="kai-card text-center" style="padding:32px 24px;">
            <div style="font-size:64px;margin-bottom:16px;"></div>
            <h3 style="font-family:'Syne',sans-serif;font-size:22px;font-weight:800;margin-bottom:10px;">{{ $kereta->nama_kereta }}</h3>
            <span class="badge-kelas {{ strtolower($kereta->kelas) }}" style="font-size:13px;padding:6px 16px;">{{ $kereta->kelas }}</span>
            <div style="margin-top:24px;display:flex;gap:10px;justify-content:center;">
                <a href="{{ route('kereta.edit', $kereta->id_kereta) }}" class="btn-primary"><i class="bi bi-pencil-fill"></i> Edit</a>
            </div>
        </div>
    </div>
    <div class="col-lg-8 fade-up delay-1">
        <div class="k-card">
            <div class="k-card-header">
                <div class="k-card-title"><i class="bi bi-calendar3" style="color:var(--kai-gold);"></i> Jadwal Kereta</div>
                <span class="nav-badge">{{ $kereta->jadwal->count() }}</span>
            </div>
            <div style="overflow-x:auto;">
                <table class="k-table">
                    <thead>
                        <tr><th>Rute</th><th>Tanggal</th><th>Jam</th><th>Pemesanan</th></tr>
                    </thead>
                    <tbody>
                        @forelse($kereta->jadwal as $j)
                        <tr>
                            <td>
                                <div class="route-wrap">
                                    <span class="station" style="font-size:13px;">{{ $j->stasiun_asal }}</span>
                                    <span class="arrow"><i class="bi bi-arrow-right"></i></span>
                                    <span class="station" style="font-size:13px;">{{ $j->stasiun_tujuan }}</span>
                                </div>
                            </td>
                            <td style="font-size:13px;">{{ \Carbon\Carbon::parse($j->tanggal_berangkat)->format('d M Y') }}</td>
                            <td><span style="color:var(--kai-gold);font-weight:700;">{{ \Carbon\Carbon::parse($j->jam_berangkat)->format('H:i') }}</span></td>
                            <td><span class="badge-tiket low">{{ $j->pemesanan->count() }} Order</span></td>
                        </tr>
                        @empty
                        <tr><td colspan="4" class="text-center" style="color:var(--kai-muted);padding:30px;">Belum ada jadwal</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
