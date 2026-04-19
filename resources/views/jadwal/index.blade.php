@extends('layouts.app')
@section('title', 'Jadwal Kereta')
@section('breadcrumb', 'Jadwal')

@section('content')
<div class="page-header d-flex align-items-center justify-content-between flex-wrap gap-3">
    <div>
        <h1 class="page-title">Jadwal <span style="color:var(--kai-red)">Keberangkatan</span></h1>
        <p class="page-subtitle">Kelola jadwal perjalanan kereta api</p>
    </div>
    <a href="{{ route('jadwal.create') }}" class="btn-primary">
        <i class="bi bi-calendar-plus-fill"></i> Tambah Jadwal
    </a>
</div>

<!-- Search & Filter -->
<div class="kai-card mb-4 fade-up">
    <div class="k-card-body" style="padding:16px 20px;">
        <form method="GET" action="{{ route('jadwal.index') }}">
            <div class="row g-2 align-items-center">
                <div class="col-md-5">
                    <div class="search-bar">
                        <i class="bi bi-search"></i>
                        <input type="text" name="search" value="{{ $search }}" placeholder="Cari stasiun asal/tujuan..." class="form-input">
                    </div>
                </div>
                <div class="col-md-3">
                    <input type="text" name="tujuan" value="{{ $tujuan }}" placeholder="Filter tujuan (cth: Bandung)" class="form-input">
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn-primary w-100 justify-content-center"><i class="bi bi-search"></i> Filter</button>
                </div>
                <div class="col-md-2">
                    <a href="{{ route('jadwal.index') }}" class="btn-secondary w-100 justify-content-center"><i class="bi bi-x-circle"></i> Reset</a>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Table -->
<div class="kai-card fade-up delay-1">
    <div class="k-card-header">
        <div class="k-card-title">
            <span style="background:rgba(245,166,35,.12);color:var(--kai-gold);width:32px;height:32px;border-radius:8px;display:flex;align-items:center;justify-content:center;"><i class="bi bi-calendar3"></i></span>
            Daftar Jadwal
        </div>
        <span style="font-size:12px;color:var(--kai-muted);">{{ $jadwal->total() }} jadwal</span>
    </div>
    <div style="overflow-x:auto;">
        <table class="k-table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Kereta</th>
                    <th>Rute</th>
                    <th>Tanggal</th>
                    <th>Jam</th>
                    <th>Pemesanan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($jadwal as $index => $j)
                <tr>
                    <td style="color:var(--kai-muted);font-size:12px;">{{ $jadwal->firstItem() + $index }}</td>
                    <td>
                        <div style="font-weight:600;font-size:13px;">{{ $j->kereta->nama_kereta }}</div>
                        <span class="badge-kelas {{ strtolower($j->kereta->kelas) }}">{{ $j->kereta->kelas }}</span>
                    </td>
                    <td>
                        <div class="route-wrap">
                            <span class="station">{{ $j->stasiun_asal }}</span>
                            <span class="arrow"><i class="bi bi-arrow-right"></i></span>
                            <span class="station">{{ $j->stasiun_tujuan }}</span>
                        </div>
                    </td>
                    <td style="font-size:13px;">{{ \Carbon\Carbon::parse($j->tanggal_berangkat)->format('d M Y') }}</td>
                    <td>
                        <span style="background:rgba(245,166,35,.1);color:var(--kai-gold);padding:4px 10px;border-radius:6px;font-weight:700;font-size:13px;">
                            {{ \Carbon\Carbon::parse($j->jam_berangkat)->format('H:i') }}
                        </span>
                    </td>
                    <td><span class="badge-tiket {{ $j->pemesanan_count > 0 ? 'low' : '' }}" style="{{ $j->pemesanan_count == 0 ? 'background:rgba(139,148,158,.1);color:var(--kai-muted);border:1px solid var(--kai-border);' : '' }}">{{ $j->pemesanan_count }} Order</span></td>
                    <td>
                        <div style="display:flex;gap:6px;">
                            <a href="{{ route('jadwal.show', $j->id_jadwal) }}" class="btn-action view"><i class="bi bi-eye-fill"></i></a>
                            <a href="{{ route('jadwal.edit', $j->id_jadwal) }}" class="btn-action edit"><i class="bi bi-pencil-fill"></i></a>
                            <form id="del-jadwal-{{ $j->id_jadwal }}" action="{{ route('jadwal.destroy', $j->id_jadwal) }}" method="POST" style="display:inline;">
                                @csrf @method('DELETE')
                                <button type="button" class="btn-action delete" onclick="confirmDelete('del-jadwal-{{ $j->id_jadwal }}')"><i class="bi bi-trash-fill"></i></button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr><td colspan="7"><div class="empty-state"><i class="bi bi-calendar-x"></i><p>Belum ada jadwal</p></div></td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
    @if($jadwal->hasPages())
    <div class="k-card-body" style="padding:16px 20px;">
        {{ $jadwal->appends(['search' => $search, 'tujuan' => $tujuan])->links() }}
    </div>
    @endif
</div>
@endsection
