@extends('layouts.app')
@section('title','Dashboard')
@section('breadcrumb','Dashboard')

@section('content')
<div class="page-header">
    <h1 class="page-title">Dashboard <span>Overview</span></h1>
    <p class="page-subtitle">Ringkasan sistem pemesanan tiket kereta api</p>
</div>

<!-- Stats -->
<div class="row g-3 mb-4">
    <div class="col-6 col-xl-3 fade-up">
        <div class="stat-card">
            <div class="stat-icon-wrap" style="background:var(--accent-soft);">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8" style="color:var(--accent);"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z"/></svg>
            </div>
            <div class="stat-value" data-count="{{ $totalPenumpang }}">{{ $totalPenumpang }}</div>
            <div class="stat-label">Total Penumpang</div>
        </div>
    </div>
    <div class="col-6 col-xl-3 fade-up d1">
        <div class="stat-card">
            <div class="stat-icon-wrap" style="background:var(--blue-soft);">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8" style="color:#60a5fa;"><path stroke-linecap="round" stroke-linejoin="round" d="M8.25 18.75a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m3 0h6m-9 0H3.375a1.125 1.125 0 01-1.125-1.125V14.25m16.5 4.5a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m3 0h1.125c.621 0 1.129-.504 1.09-1.124a17.902 17.902 0 00-3.213-9.193 2.056 2.056 0 00-1.58-.86H14.25M16.5 18.75h-2.25m0-11.177v-.958c0-.568-.422-1.048-.987-1.106a48.554 48.554 0 00-10.026 0 1.106 1.106 0 00-.987 1.106v7.635m12-6.677v6.677m0 4.5v-4.5m0 0h-12"/></svg>
            </div>
            <div class="stat-value" data-count="{{ $totalKereta }}">{{ $totalKereta }}</div>
            <div class="stat-label">Armada Kereta</div>
        </div>
    </div>
    <div class="col-6 col-xl-3 fade-up d2">
        <div class="stat-card">
            <div class="stat-icon-wrap" style="background:var(--gold-soft);">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8" style="color:var(--gold);"><path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5"/></svg>
            </div>
            <div class="stat-value" data-count="{{ $totalJadwal }}">{{ $totalJadwal }}</div>
            <div class="stat-label">Jadwal Aktif</div>
        </div>
    </div>
    <div class="col-6 col-xl-3 fade-up d3">
        <div class="stat-card">
            <div class="stat-icon-wrap" style="background:var(--green-soft);">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8" style="color:#4ade80;"><path stroke-linecap="round" stroke-linejoin="round" d="M16.5 6v.75m0 3v.75m0 3v.75m0 3V18m-9-5.25h5.25M7.5 15h3M3.375 5.25c-.621 0-1.125.504-1.125 1.125v3.026a2.999 2.999 0 010 5.198v3.026c0 .621.504 1.125 1.125 1.125h17.25c.621 0 1.125-.504 1.125-1.125v-3.026a2.999 2.999 0 010-5.198V6.375c0-.621-.504-1.125-1.125-1.125H3.375z"/></svg>
            </div>
            <div class="stat-value" data-count="{{ $totalTiket }}">{{ $totalTiket }}</div>
            <div class="stat-label">Total Tiket Terjual</div>
        </div>
    </div>
</div>

<div class="row g-3 mb-4">
    <!-- Recent Orders -->
    <div class="col-lg-7 fade-up d1">
        <div class="k-card h-100">
            <div class="k-card-header">
                <div class="k-card-title">
                    <div class="icon-wrap" style="background:var(--accent-soft);">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" style="color:var(--accent);"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    </div>
                    Pemesanan Terbaru
                </div>
                <a href="{{ route('pemesanan.index') }}" class="btn-secondary" style="padding:6px 12px;font-size:12px;">Lihat Semua</a>
            </div>
            <div style="overflow-x:auto;">
                <table class="k-table">
                    <thead>
                        <tr>
                            <th>Penumpang</th>
                            <th>Rute</th>
                            <th>Tiket</th>
                            <th>Tanggal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($recentPemesanan as $p)
                        <tr>
                            <td>
                                <div style="display:flex;align-items:center;gap:10px;">
                                    <div class="av-circle" style="background:var(--bg-surface3);color:var(--text-secondary);font-size:12px;font-family:var(--font-body);font-weight:700;border:1px solid var(--border);">
                                        {{ strtoupper(substr($p->penumpang->nama_penumpang,0,2)) }}
                                    </div>
                                    <div>
                                        <div style="font-weight:600;font-size:13px;">{{ $p->penumpang->nama_penumpang }}</div>
                                        <div style="font-size:11px;color:var(--text-muted);">{{ $p->penumpang->no_hp }}</div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="route-wrap">
                                    <span class="station" style="font-size:12px;">{{ Str::limit($p->jadwal->stasiun_asal,10) }}</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"/></svg>
                                    <span class="station" style="font-size:12px;">{{ Str::limit($p->jadwal->stasiun_tujuan,10) }}</span>
                                </div>
                                <div style="font-size:11px;color:var(--text-muted);margin-top:2px;">{{ $p->jadwal->kereta->nama_kereta }}</div>
                            </td>
                            <td><span class="badge-count {{ $p->jumlah_tiket > 2 ? 'high' : 'low' }}">{{ $p->jumlah_tiket }} tiket</span></td>
                            <td style="font-size:12px;color:var(--text-muted);">{{ $p->tanggal_pesan->format('d M Y') }}</td>
                        </tr>
                        @empty
                        <tr><td colspan="4"><div class="empty-state" style="padding:30px;">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20.25 7.5l-.625 10.632a2.25 2.25 0 01-2.247 2.118H6.622a2.25 2.25 0 01-2.247-2.118L3.75 7.5M10 11.25h4M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125z"/></svg>
                            <p>Belum ada pemesanan</p>
                        </div></td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Right panels -->
    <div class="col-lg-5 fade-up d2">
        <div class="k-card mb-3">
            <div class="k-card-header">
                <div class="k-card-title">
                    <div class="icon-wrap" style="background:var(--gold-soft);">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" style="color:var(--gold);"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z"/></svg>
                    </div>
                    Tiket &gt; 2 Kursi
                </div>
                <span style="font-size:11px;font-weight:600;background:var(--accent-soft);color:var(--accent);padding:3px 9px;border-radius:5px;border:1px solid var(--accent-border);">{{ $pemesananLebihDari2->count() }}</span>
            </div>
            <div class="k-card-body" style="padding:12px 16px;">
                @forelse($pemesananLebihDari2 as $p)
                <div style="display:flex;align-items:center;justify-content:space-between;padding:9px 0;border-bottom:1px solid var(--border);">
                    <div>
                        <div style="font-size:13px;font-weight:600;">{{ $p->penumpang->nama_penumpang }}</div>
                        <div style="font-size:11px;color:var(--text-muted);">{{ $p->jadwal->stasiun_tujuan }}</div>
                    </div>
                    <span class="badge-count high">{{ $p->jumlah_tiket }} tiket</span>
                </div>
                @empty
                <p style="color:var(--text-muted);font-size:13px;text-align:center;padding:12px 0;">Tidak ada data</p>
                @endforelse
            </div>
        </div>

        <div class="k-card">
            <div class="k-card-header">
                <div class="k-card-title">
                    <div class="icon-wrap" style="background:var(--blue-soft);">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" style="color:#60a5fa;"><path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z"/></svg>
                    </div>
                    Jadwal ke Bandung
                </div>
                <span style="font-size:11px;font-weight:600;background:var(--blue-soft);color:#60a5fa;padding:3px 9px;border-radius:5px;border:1px solid rgba(37,99,176,.25);">{{ $jadwalBandung->count() }}</span>
            </div>
            <div class="k-card-body" style="padding:12px 16px;">
                @forelse($jadwalBandung as $j)
                <div style="display:flex;align-items:center;justify-content:space-between;padding:9px 0;border-bottom:1px solid var(--border);">
                    <div>
                        <div style="font-size:13px;font-weight:600;">{{ $j->kereta->nama_kereta }}</div>
                        <div style="font-size:11px;color:var(--text-muted);">{{ $j->stasiun_asal }}</div>
                    </div>
                    <div class="time-chip">{{ \Carbon\Carbon::parse($j->jam_berangkat)->format('H:i') }}</div>
                </div>
                @empty
                <p style="color:var(--text-muted);font-size:13px;text-align:center;padding:12px 0;">Tidak ada jadwal</p>
                @endforelse
            </div>
        </div>
    </div>
</div>

<!-- Quick Actions -->
<div class="k-card fade-up d3">
    <div class="k-card-header">
        <div class="k-card-title">
            <div class="icon-wrap" style="background:var(--purple-soft);">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" style="color:#a78bfa;"><path stroke-linecap="round" stroke-linejoin="round" d="M3.75 13.5l10.5-11.25L12 10.5h8.25L9.75 21.75 12 13.5H3.75z"/></svg>
            </div>
            Aksi Cepat
        </div>
    </div>
    <div class="k-card-body">
        <div class="row g-2">
            <div class="col-6 col-md-3">
                <a href="{{ route('penumpang.create') }}" class="btn-primary w-100 justify-content-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M19 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zM4 19.235v-.11a6.375 6.375 0 0112.75 0v.109A12.318 12.318 0 0110.374 21c-2.331 0-4.512-.645-6.374-1.766z"/></svg>
                    Tambah Penumpang
                </a>
            </div>
            <div class="col-6 col-md-3">
                <a href="{{ route('kereta.create') }}" class="btn-secondary w-100 justify-content-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M8.25 18.75a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m3 0h6m-9 0H3.375a1.125 1.125 0 01-1.125-1.125V14.25m16.5 4.5a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m3 0h1.125c.621 0 1.129-.504 1.09-1.124a17.902 17.902 0 00-3.213-9.193 2.056 2.056 0 00-1.58-.86H14.25M16.5 18.75h-2.25m0-11.177v-.958c0-.568-.422-1.048-.987-1.106a48.554 48.554 0 00-10.026 0 1.106 1.106 0 00-.987 1.106v7.635m12-6.677v6.677m0 4.5v-4.5m0 0h-12"/></svg>
                    Tambah Kereta
                </a>
            </div>
            <div class="col-6 col-md-3">
                <a href="{{ route('jadwal.create') }}" class="btn-secondary w-100 justify-content-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5m-9-6h.008v.008H12v-.008zM12 15h.008v.008H12V15zm0 2.25h.008v.008H12v-.008zM9.75 15h.008v.008H9.75V15zm0 2.25h.008v.008H9.75v-.008zM7.5 15h.008v.008H7.5V15zm0 2.25h.008v.008H7.5v-.008zm6.75-4.5h.008v.008h-.008v-.008zm0 2.25h.008v.008h-.008V15zm0 2.25h.008v.008h-.008v-.008zm2.25-4.5h.008v.008H16.5v-.008zm0 2.25h.008v.008H16.5V15z"/></svg>
                    Buat Jadwal
                </a>
            </div>
            <div class="col-6 col-md-3">
                <a href="{{ route('pemesanan.create') }}" class="btn-primary w-100 justify-content-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M16.5 6v.75m0 3v.75m0 3v.75m0 3V18m-9-5.25h5.25M7.5 15h3M3.375 5.25c-.621 0-1.125.504-1.125 1.125v3.026a2.999 2.999 0 010 5.198v3.026c0 .621.504 1.125 1.125 1.125h17.25c.621 0 1.125-.504 1.125-1.125v-3.026a2.999 2.999 0 010-5.198V6.375c0-.621-.504-1.125-1.125-1.125H3.375z"/></svg>
                    Pesan Tiket
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
