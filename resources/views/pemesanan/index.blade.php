@extends('layouts.app')
@section('title', 'Pemesanan Tiket')
@section('breadcrumb', 'Pemesanan')

@section('content')
<div class="page-header d-flex align-items-center justify-content-between flex-wrap gap-3">
    <div>
        <h1 class="page-title">Pemesanan <span style="color:var(--kai-red)">Tiket</span></h1>
        <p class="page-subtitle">Kelola transaksi pemesanan tiket kereta api</p>
    </div>
    <div style="display:flex;gap:10px;">
        <a href="{{ route('laporan') }}" class="btn-secondary">
            <i class="bi bi-bar-chart-fill"></i> Laporan
        </a>
        <a href="{{ route('pemesanan.create') }}" class="btn-primary">
            <i class="bi bi-ticket-perforated-fill"></i> Pesan Tiket
        </a>
    </div>
</div>

<!-- Stats Bar -->
<div class="row g-3 mb-4 fade-up">
    <div class="col-md-4">
        <div class="k-card" style="padding:18px 24px;">
            <div style="display:flex;align-items:center;gap:14px;">
                <div class="stat-icon" style="background:rgba(227,30,36,.12);color:var(--kai-red);margin:0;"><i class="bi bi-ticket-perforated-fill"></i></div>
                <div>
                    <div style="font-family:'Syne',sans-serif;font-size:24px;font-weight:800;">{{ $totalTiket }}</div>
                    <div style="font-size:12px;color:var(--kai-muted);">Total Tiket Terjual</div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Search & Filter -->
<div class="kai-card mb-4 fade-up delay-1">
    <div class="k-card-body" style="padding:16px 20px;">
        <form method="GET" action="{{ route('pemesanan.index') }}">
            <div class="row g-2 align-items-center">
                <div class="col-md-5">
                    <div class="search-bar">
                        <i class="bi bi-search"></i>
                        <input type="text" name="search" value="{{ $search }}" placeholder="Cari penumpang atau rute..." class="form-input">
                    </div>
                </div>
                <div class="col-md-3">
                    <select name="filter_tiket" class="form-input">
                        <option value="">Semua Pemesanan</option>
                        <option value="lebih2" {{ $filterTiket == 'lebih2' ? 'selected' : '' }}>Tiket > 2 Kursi</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn-primary w-100 justify-content-center"><i class="bi bi-search"></i> Filter</button>
                </div>
                <div class="col-md-2">
                    <a href="{{ route('pemesanan.index') }}" class="btn-secondary w-100 justify-content-center"><i class="bi bi-x-circle"></i> Reset</a>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Table -->
<div class="kai-card fade-up delay-2">
    <div class="k-card-header">
        <div class="k-card-title">
            <span style="background:rgba(227,30,36,.12);color:var(--kai-red);width:32px;height:32px;border-radius:8px;display:flex;align-items:center;justify-content:center;"><i class="bi bi-ticket-perforated-fill"></i></span>
            Daftar Pemesanan
        </div>
        <span style="font-size:12px;color:var(--kai-muted);">{{ $pemesanan->total() }} transaksi</span>
    </div>
    <div style="overflow-x:auto;">
        <table class="k-table">
            <thead>
                <tr>
                    <th>#ID</th>
                    <th>Penumpang</th>
                    <th>Kereta & Rute</th>
                    <th>Tanggal Pesan</th>
                    <th>Tiket</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($pemesanan as $index => $p)
                <tr>
                    <td style="color:var(--kai-muted);font-size:12px;">#{{ $p->id_pemesanan }}</td>
                    <td>
                        <div style="display:flex;align-items:center;gap:10px;">
                            <div style="width:38px;height:38px;border-radius:10px;background:linear-gradient(135deg,var(--kai-blue),var(--kai-red));display:flex;align-items:center;justify-content:center;font-size:14px;font-weight:700;color:#fff;flex-shrink:0;">
                                {{ strtoupper(substr($p->penumpang->nama_penumpang,0,1)) }}
                            </div>
                            <div>
                                <div style="font-weight:600;font-size:13px;">{{ $p->penumpang->nama_penumpang }}</div>
                                <div style="font-size:11px;color:var(--kai-muted);">{{ $p->penumpang->no_hp }}</div>
                            </div>
                        </div>
                    </td>
                    <td>
                        <div style="font-weight:600;font-size:13px;">{{ $p->jadwal->kereta->nama_kereta }}</div>
                        <div class="route-wrap" style="margin-top:3px;">
                            <span class="station" style="font-size:11px;color:var(--kai-muted);">{{ $p->jadwal->stasiun_asal }}</span>
                            <span class="arrow" style="font-size:12px;"><i class="bi bi-arrow-right"></i></span>
                            <span class="station" style="font-size:11px;color:var(--kai-muted);">{{ $p->jadwal->stasiun_tujuan }}</span>
                        </div>
                    </td>
                    <td style="font-size:13px;">{{ $p->tanggal_pesan->format('d M Y') }}</td>
                    <td>
                        <span class="badge-tiket {{ $p->jumlah_tiket > 2 ? 'high' : 'low' }}">
                            {{ $p->jumlah_tiket }} Tiket
                        </span>
                    </td>
                    <td>
                        <div style="display:flex;gap:6px;">
                            <a href="{{ route('pemesanan.show', $p->id_pemesanan) }}" class="btn-action view"><i class="bi bi-eye-fill"></i></a>
                            <a href="{{ route('pemesanan.edit', $p->id_pemesanan) }}" class="btn-action edit"><i class="bi bi-pencil-fill"></i></a>
                            <form id="del-pesan-{{ $p->id_pemesanan }}" action="{{ route('pemesanan.destroy', $p->id_pemesanan) }}" method="POST" style="display:inline;">
                                @csrf @method('DELETE')
                                <button type="button" class="btn-action delete" onclick="confirmDelete('del-pesan-{{ $p->id_pemesanan }}')"><i class="bi bi-trash-fill"></i></button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr><td colspan="6"><div class="empty-state"><i class="bi bi-ticket-perforated"></i><p>Belum ada pemesanan</p></div></td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
    @if($pemesanan->hasPages())
    <div class="k-card-body" style="padding:16px 20px;">
        {{ $pemesanan->appends(['search' => $search, 'filter_tiket' => $filterTiket])->links() }}
    </div>
    @endif
</div>
@endsection
