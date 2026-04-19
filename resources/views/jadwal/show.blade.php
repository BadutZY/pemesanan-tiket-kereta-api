@extends('layouts.app')
@section('title', 'Detail Jadwal')
@section('breadcrumb', 'Detail Jadwal')

@section('content')
<div class="page-header">
    <div style="display:flex;align-items:center;gap:12px;">
        <a href="{{ route('jadwal.index') }}" class="btn-secondary" style="padding:9px 12px;"><i class="bi bi-arrow-left"></i></a>
        <div>
            <h1 class="page-title">Detail <span style="color:var(--kai-red)">Jadwal</span></h1>
            <p class="page-subtitle">Info keberangkatan #{{ $jadwal->id_jadwal }}</p>
        </div>
    </div>
</div>
<div class="row g-3">
    <div class="col-lg-4 fade-up">
        <div class="k-card" style="padding:28px;">
            <div style="text-align:center;margin-bottom:20px;">
                <div style="font-size:52px;margin-bottom:12px;"></div>
                <span class="badge-kelas {{ strtolower($jadwal->kereta->kelas) }}" style="font-size:13px;padding:6px 16px;">{{ $jadwal->kereta->kelas }}</span>
            </div>
            <div class="info-row">
                <div class="info-label">Kereta</div>
                <div class="info-value" style="font-weight:700;">{{ $jadwal->kereta->nama_kereta }}</div>
            </div>
            <div class="info-row">
                <div class="info-label">Asal</div>
                <div class="info-value">{{ $jadwal->stasiun_asal }}</div>
            </div>
            <div class="info-row">
                <div class="info-label">Tujuan</div>
                <div class="info-value">{{ $jadwal->stasiun_tujuan }}</div>
            </div>
            <div class="info-row">
                <div class="info-label">Tanggal</div>
                <div class="info-value">{{ \Carbon\Carbon::parse($jadwal->tanggal_berangkat)->format('d F Y') }}</div>
            </div>
            <div class="info-row">
                <div class="info-label">Jam</div>
                <div class="info-value" style="color:var(--kai-gold);font-weight:800;font-size:20px;">{{ \Carbon\Carbon::parse($jadwal->jam_berangkat)->format('H:i') }} WIB</div>
            </div>
        </div>
    </div>
    <div class="col-lg-8 fade-up delay-1">
        <div class="k-card">
            <div class="k-card-header">
                <div class="k-card-title"><i class="bi bi-ticket-perforated-fill" style="color:var(--kai-red);"></i> Daftar Pemesanan</div>
                <span class="nav-badge">{{ $jadwal->pemesanan->count() }}</span>
            </div>
            <div style="overflow-x:auto;">
                <table class="k-table">
                    <thead>
                        <tr><th>Penumpang</th><th>Tanggal Pesan</th><th>Tiket</th></tr>
                    </thead>
                    <tbody>
                        @forelse($jadwal->pemesanan as $p)
                        <tr>
                            <td>
                                <div style="display:flex;align-items:center;gap:10px;">
                                    <div style="width:34px;height:34px;border-radius:10px;background:linear-gradient(135deg,var(--kai-blue),var(--kai-red));display:flex;align-items:center;justify-content:center;font-size:13px;font-weight:700;color:#fff;">
                                        {{ strtoupper(substr($p->penumpang->nama_penumpang,0,1)) }}
                                    </div>
                                    <div>
                                        <div style="font-weight:600;font-size:13px;">{{ $p->penumpang->nama_penumpang }}</div>
                                        <div style="font-size:11px;color:var(--kai-muted);">{{ $p->penumpang->no_hp }}</div>
                                    </div>
                                </div>
                            </td>
                            <td style="font-size:13px;">{{ $p->tanggal_pesan->format('d M Y') }}</td>
                            <td><span class="badge-tiket {{ $p->jumlah_tiket > 2 ? 'high' : 'low' }}">{{ $p->jumlah_tiket }} Tiket</span></td>
                        </tr>
                        @empty
                        <tr><td colspan="3" class="text-center" style="color:var(--kai-muted);padding:30px;">Belum ada pemesanan</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
