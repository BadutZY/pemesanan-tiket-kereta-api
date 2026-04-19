@extends('layouts.app')
@section('title','Detail Penumpang')
@section('breadcrumb','Detail Penumpang')
@section('content')
<div class="page-header">
    <div style="display:flex;align-items:center;gap:12px;">
        <a href="{{ route('penumpang.index') }}" class="btn-secondary" style="padding:8px 10px;"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18"/></svg></a>
        <div><h1 class="page-title">Detail <span>Penumpang</span></h1><p class="page-subtitle">Informasi lengkap penumpang</p></div>
    </div>
</div>
<div class="row g-3">
    <div class="col-lg-4 fade-up">
        <div class="k-card" style="padding:28px;text-align:center;">
            <div style="width:64px;height:64px;border-radius:14px;background:var(--bg-surface3);border:1px solid var(--border);display:flex;align-items:center;justify-content:center;font-size:20px;font-weight:700;color:var(--text-secondary);margin:0 auto 16px;">{{ strtoupper(substr($penumpang->nama_penumpang,0,2)) }}</div>
            <h3 style="font-family:var(--font-display);font-size:19px;font-weight:900;margin-bottom:4px;">{{ $penumpang->nama_penumpang }}</h3>
            <p style="color:var(--text-muted);font-size:12px;margin-bottom:20px;">ID #{{ $penumpang->id_penumpang }}</p>
            <div style="display:flex;gap:8px;justify-content:center;flex-wrap:wrap;">
                <a href="{{ route('penumpang.edit',$penumpang->id_penumpang) }}" class="btn-primary"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931z"/></svg>Edit</a>
                <form id="del-ps" action="{{ route('penumpang.destroy',$penumpang->id_penumpang) }}" method="POST">
                    @csrf @method('DELETE')
                    <button type="button" class="btn-secondary" onclick="confirmDelete('del-ps')" style="border-color:var(--accent-border);color:#f87171;"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0"/></svg>Hapus</button>
                </form>
            </div>
        </div>
    </div>
    <div class="col-lg-8">
        <div class="k-card mb-3 fade-up d1">
            <div class="k-card-header"><div class="k-card-title">Informasi Pribadi</div></div>
            <div class="k-card-body">
                <div class="info-row"><div class="info-lbl">Nama</div><div class="info-val">{{ $penumpang->nama_penumpang }}</div></div>
                <div class="info-row"><div class="info-lbl">NIK</div><div class="info-val"><span class="mono" style="background:var(--bg-surface2);padding:3px 9px;border-radius:5px;border:1px solid var(--border);">{{ $penumpang->nik }}</span></div></div>
                <div class="info-row"><div class="info-lbl">No. HP</div><div class="info-val" style="color:var(--text-secondary);">{{ $penumpang->no_hp }}</div></div>
                <div class="info-row"><div class="info-lbl">Terdaftar</div><div class="info-val">{{ $penumpang->created_at->format('d F Y, H:i') }}</div></div>
            </div>
        </div>
        <div class="k-card fade-up d2">
            <div class="k-card-header">
                <div class="k-card-title">Riwayat Pemesanan</div>
                <span style="font-size:11px;font-weight:600;background:var(--bg-surface2);color:var(--text-muted);padding:3px 9px;border-radius:5px;border:1px solid var(--border);">{{ $penumpang->pemesanan->count() }} order</span>
            </div>
            <div style="overflow-x:auto;">
                <table class="k-table">
                    <thead><tr><th>Kereta</th><th>Rute</th><th>Tanggal Pesan</th><th>Tiket</th></tr></thead>
                    <tbody>
                        @forelse($penumpang->pemesanan as $o)
                        <tr>
                            <td><div style="font-weight:600;font-size:13px;">{{ $o->jadwal->kereta->nama_kereta }}</div><span class="badge-kelas {{ strtolower($o->jadwal->kereta->kelas) }}">{{ $o->jadwal->kereta->kelas }}</span></td>
                            <td><div class="route-wrap"><span class="station" style="font-size:12px;">{{ $o->jadwal->stasiun_asal }}</span><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"/></svg><span class="station" style="font-size:12px;">{{ $o->jadwal->stasiun_tujuan }}</span></div></td>
                            <td style="font-size:12px;color:var(--text-muted);">{{ $o->tanggal_pesan->format('d M Y') }}</td>
                            <td><span class="badge-count {{ $o->jumlah_tiket > 2 ? 'high' : 'low' }}">{{ $o->jumlah_tiket }} tiket</span></td>
                        </tr>
                        @empty
                        <tr><td colspan="4" style="color:var(--text-muted);text-align:center;padding:24px;">Belum ada pemesanan</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
