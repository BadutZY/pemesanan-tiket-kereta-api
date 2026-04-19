@extends('layouts.app')
@section('title','Data Penumpang')
@section('breadcrumb','Penumpang')

@section('content')
<div class="page-header d-flex align-items-center justify-content-between flex-wrap gap-3">
    <div>
        <h1 class="page-title">Data <span>Penumpang</span></h1>
        <p class="page-subtitle">Kelola data penumpang kereta api</p>
    </div>
    <a href="{{ route('penumpang.create') }}" class="btn-primary">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M19 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zM4 19.235v-.11a6.375 6.375 0 0112.75 0v.109A12.318 12.318 0 0110.374 21c-2.331 0-4.512-.645-6.374-1.766z"/></svg>
        Tambah Penumpang
    </a>
</div>

<div class="k-card mb-4 fade-up">
    <div class="k-card-body" style="padding:14px 18px;">
        <form method="GET" action="{{ route('penumpang.index') }}">
            <div class="row g-2 align-items-center">
                <div class="col-md-8">
                    <div class="search-wrap">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z"/></svg>
                        <input type="text" name="search" value="{{ $search }}" placeholder="Cari nama, NIK, atau nomor HP..." class="form-input">
                    </div>
                </div>
                <div class="col-md-2"><button type="submit" class="btn-primary w-100 justify-content-center">Cari</button></div>
                <div class="col-md-2"><a href="{{ route('penumpang.index') }}" class="btn-secondary w-100 justify-content-center">Reset</a></div>
            </div>
        </form>
    </div>
</div>

<div class="k-card fade-up d1">
    <div class="k-card-header">
        <div class="k-card-title">
            <div class="icon-wrap" style="background:var(--accent-soft);">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" style="color:var(--accent);"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z"/></svg>
            </div>
            Daftar Penumpang
        </div>
        <span style="font-size:12px;color:var(--text-muted);">{{ $penumpang->total() }} data</span>
    </div>
    <div style="overflow-x:auto;">
        <table class="k-table">
            <thead>
                <tr>
                    <th>#</th><th>Penumpang</th><th>NIK</th><th>No. HP</th><th>Pemesanan</th><th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($penumpang as $i => $p)
                <tr>
                    <td style="color:var(--text-muted);font-size:12px;">{{ $penumpang->firstItem() + $i }}</td>
                    <td>
                        <div style="display:flex;align-items:center;gap:10px;">
                            <div class="av-circle" style="background:var(--bg-surface3);color:var(--text-secondary);font-size:12px;font-family:var(--font-body);font-weight:700;border:1px solid var(--border);">{{ strtoupper(substr($p->nama_penumpang,0,2)) }}</div>
                            <div>
                                <div style="font-weight:600;">{{ $p->nama_penumpang }}</div>
                                <div style="font-size:11px;color:var(--text-muted);">ID #{{ $p->id_penumpang }}</div>
                            </div>
                        </div>
                    </td>
                    <td><span class="mono" style="background:var(--bg-surface2);padding:3px 8px;border-radius:5px;border:1px solid var(--border);">{{ $p->nik }}</span></td>
                    <td style="color:var(--text-secondary);">{{ $p->no_hp }}</td>
                    <td>
                        <span class="badge-count {{ $p->pemesanan_count > 0 ? 'low' : 'zero' }}">{{ $p->pemesanan_count }} order</span>
                    </td>
                    <td>
                        <div style="display:flex;gap:5px;">
                            <a href="{{ route('penumpang.show',$p->id_penumpang) }}" class="btn-icon view">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.964-7.178z"/><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                            </a>
                            <a href="{{ route('penumpang.edit',$p->id_penumpang) }}" class="btn-icon edit">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10"/></svg>
                            </a>
                            <form id="del-p-{{ $p->id_penumpang }}" action="{{ route('penumpang.destroy',$p->id_penumpang) }}" method="POST" style="display:inline;">
                                @csrf @method('DELETE')
                                <button type="button" class="btn-icon delete" onclick="confirmDelete('del-p-{{ $p->id_penumpang }}')">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0"/></svg>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr><td colspan="6"><div class="empty-state">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0"/></svg>
                    <p>Belum ada data penumpang</p>
                    <a href="{{ route('penumpang.create') }}" class="btn-primary mt-3" style="display:inline-flex;">Tambah Sekarang</a>
                </div></td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
    @if($penumpang->hasPages())
    <div class="k-card-body" style="padding:14px 18px;">{{ $penumpang->appends(['search'=>$search])->links() }}</div>
    @endif
</div>
@endsection
