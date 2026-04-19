@extends('layouts.admin')
@section('title','Detail Kereta')
@section('breadcrumb','Detail Kereta')
@section('content')
<div class="page-header"><div style="display:flex;align-items:center;gap:12px;">
    <a href="{{ route('admin.kereta.index') }}" class="btn-secondary" style="padding:8px 10px;"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18"/></svg></a>
    <div><h1 class="page-title">Detail <span>Kereta</span></h1><p class="page-subtitle">{{ $kereta->nama_kereta }}</p></div>
</div></div>
<div class="row g-3">
    <div class="col-lg-4 fade-up">
        <div class="k-card" style="padding:28px;text-align:center;">
            <div style="width:60px;height:60px;border-radius:14px;margin:0 auto 16px;display:flex;align-items:center;justify-content:center;{{ $kereta->kelas=='Eksekutif'?'background:var(--purple-soft);':($kereta->kelas=='Bisnis'?'background:var(--gold-soft);':'background:var(--green-soft);') }}">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8" style="width:30px;height:30px;{{ $kereta->kelas=='Eksekutif'?'color:#a78bfa;':($kereta->kelas=='Bisnis'?'color:var(--gold);':'color:#4ade80;') }}"><path stroke-linecap="round" stroke-linejoin="round" d="M8.25 18.75a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m3 0h6m-9 0H3.375a1.125 1.125 0 01-1.125-1.125V14.25m16.5 4.5a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m3 0h1.125c.621 0 1.129-.504 1.09-1.124a17.902 17.902 0 00-3.213-9.193 2.056 2.056 0 00-1.58-.86H14.25M16.5 18.75h-2.25m0-11.177v-.958c0-.568-.422-1.048-.987-1.106a48.554 48.554 0 00-10.026 0 1.106 1.106 0 00-.987 1.106v7.635m12-6.677v6.677m0 4.5v-4.5m0 0h-12"/></svg>
            </div>
            <h3 style="font-family:var(--font-display);font-size:18px;font-weight:900;margin-bottom:10px;">{{ $kereta->nama_kereta }}</h3>
            <span class="badge-kelas {{ strtolower($kereta->kelas) }}" style="font-size:12px;padding:5px 14px;">{{ $kereta->kelas }}</span>
            <div style="margin-top:20px;"><a href="{{ route('admin.kereta.edit',$kereta->id_kereta) }}" class="btn-primary"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931z"/></svg>Edit</a></div>
        </div>
    </div>
    <div class="col-lg-8 fade-up d1">
        <div class="k-card">
            <div class="k-card-header"><div class="k-card-title">Daftar Jadwal</div><span style="font-size:11px;font-weight:600;background:var(--bg-surface2);color:var(--text-muted);padding:3px 9px;border-radius:5px;border:1px solid var(--border);">{{ $kereta->jadwal->count() }}</span></div>
            <div style="overflow-x:auto;"><table class="k-table">
                <thead><tr><th>Rute</th><th>Tanggal</th><th>Jam</th><th>Pesanan</th></tr></thead>
                <tbody>
                    @forelse($kereta->jadwal as $j)
                    <tr>
                        <td><div class="route-wrap"><span class="station">{{ $j->stasiun_asal }}</span><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"/></svg><span class="station">{{ $j->stasiun_tujuan }}</span></div></td>
                        <td style="font-size:13px;">{{ \Carbon\Carbon::parse($j->tanggal_berangkat)->format('d M Y') }}</td>
                        <td><div class="time-chip">{{ \Carbon\Carbon::parse($j->jam_berangkat)->format('H:i') }}</div></td>
                        <td><span class="badge-count {{ $j->pemesanan->count()>0?'low':'zero' }}">{{ $j->pemesanan->count() }} order</span></td>
                    </tr>
                    @empty
                    <tr><td colspan="4" style="text-align:center;color:var(--text-muted);padding:28px;">Belum ada jadwal</td></tr>
                    @endforelse
                </tbody>
            </table></div>
        </div>
    </div>
</div>
@endsection
