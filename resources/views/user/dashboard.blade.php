@extends('layouts.user')
@section('title','Beranda')
@section('content')
<div class="mb-4">
    <h1 class="page-title">Selamat datang, <span>{{ Auth::user()->name }}</span></h1>
    <p class="page-sub">Pesan tiket kereta api dengan mudah dan cepat</p>
</div>

<div class="row g-3 mb-4">
    <div class="col-6 col-md-3">
        <div class="k-card"><div class="k-card-body">
            <div style="font-size:11px;font-weight:600;text-transform:uppercase;letter-spacing:.8px;color:var(--muted);margin-bottom:8px;">Total Pesanan</div>
            <div style="font-family:var(--display);font-size:30px;font-weight:900;">{{ $totalPesanan }}</div>
        </div></div>
    </div>
    <div class="col-6 col-md-3">
        <div class="k-card"><div class="k-card-body">
            <div style="font-size:11px;font-weight:600;text-transform:uppercase;letter-spacing:.8px;color:var(--muted);margin-bottom:8px;">Total Tiket</div>
            <div style="font-family:var(--display);font-size:30px;font-weight:900;color:var(--accent);">{{ $totalTiket }}</div>
        </div></div>
    </div>
</div>

<!-- Search Box -->
<div class="k-card mb-4" style="border-color:rgba(192,57,43,.2);background:linear-gradient(135deg,rgba(192,57,43,.06),transparent);">
    <div class="k-card-body">
        <h3 style="font-family:var(--display);font-size:16px;font-weight:900;margin-bottom:14px;">Cari Jadwal Kereta</h3>
        <form method="GET" action="{{ route('user.jadwal') }}">
            <div class="row g-3">
                <div class="col-md-3">
                    <div class="form-group" style="margin-bottom:0;">
                        <label class="form-label">Stasiun Asal</label>
                        <input type="text" name="asal" class="form-input" placeholder="cth: Jakarta">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group" style="margin-bottom:0;">
                        <label class="form-label">Stasiun Tujuan</label>
                        <input type="text" name="tujuan" class="form-input" placeholder="cth: Bandung">
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group" style="margin-bottom:0;">
                        <label class="form-label">Tanggal</label>
                        <input type="date" name="tanggal" class="form-input">
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group" style="margin-bottom:0;">
                        <label class="form-label">Kelas</label>
                        <select name="kelas" class="form-input">
                            <option value="">Semua Kelas</option>
                            <option value="Ekonomi">Ekonomi</option>
                            <option value="Bisnis">Bisnis</option>
                            <option value="Eksekutif">Eksekutif</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-2 d-flex align-items-end">
                    <button type="submit" class="btn-p w-100">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z"/></svg>
                        Cari
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="row g-3">
    <!-- Jadwal Terbaru -->
    <div class="col-lg-7">
        <div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:14px;">
            <h3 style="font-family:var(--display);font-size:16px;font-weight:900;">Jadwal Tersedia</h3>
            <a href="{{ route('user.jadwal') }}" style="font-size:12px;color:var(--accent);text-decoration:none;font-weight:600;">Lihat Semua</a>
        </div>
        @forelse($jadwalTerbaru as $j)
        <div class="jadwal-card mb-3">
            <div class="d-flex align-items-start justify-content-between">
                <div>
                    <div style="display:flex;align-items:center;gap:8px;margin-bottom:10px;">
                        <span style="font-weight:700;font-size:14px;">{{ $j->kereta->nama_kereta }}</span>
                        <span class="kelas-badge {{ strtolower($j->kereta->kelas) }}">{{ $j->kereta->kelas }}</span>
                    </div>
                    <div class="route-d">
                        <span class="stn">{{ $j->stasiun_asal }}</span>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"/></svg>
                        <span class="stn">{{ $j->stasiun_tujuan }}</span>
                    </div>
                    <div style="font-size:12px;color:var(--muted);margin-top:6px;">{{ \Carbon\Carbon::parse($j->tanggal_berangkat)->translatedFormat('d F Y') }}</div>
                </div>
                <div style="text-align:right;">
                    <div class="time-chip mb-2">{{ \Carbon\Carbon::parse($j->jam_berangkat)->format('H:i') }}</div>
                    <a href="{{ route('user.pesan', ['jadwal_id'=>$j->id_jadwal]) }}" class="btn-p" style="padding:7px 14px;font-size:12px;">Pesan</a>
                </div>
            </div>
        </div>
        @empty
        <div class="k-card"><div class="k-card-body" style="text-align:center;color:var(--muted);padding:30px;">Belum ada jadwal tersedia</div></div>
        @endforelse
    </div>

    <!-- Pesanan Terbaru -->
    <div class="col-lg-5">
        <div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:14px;">
            <h3 style="font-family:var(--display);font-size:16px;font-weight:900;">Pesanan Terbaru</h3>
            <a href="{{ route('user.tiket') }}" style="font-size:12px;color:var(--accent);text-decoration:none;font-weight:600;">Lihat Semua</a>
        </div>
        @forelse($pesananTerbaru as $p)
        <a href="{{ route('user.tiket.show',$p->id_pemesanan) }}" style="text-decoration:none;display:block;">
            <div class="k-card mb-3" style="transition:border-color .15s;" onmouseover="this.style.borderColor='rgba(255,255,255,.12)'" onmouseout="this.style.borderColor='var(--border)'">
                <div class="k-card-body">
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <span style="font-size:12px;font-weight:700;color:var(--muted);">#{{ str_pad($p->id_pemesanan,5,'0',STR_PAD_LEFT) }}</span>
                        <span class="status-badge {{ $p->status }}">{{ $p->status }}</span>
                    </div>
                    <div style="font-weight:600;font-size:13px;color:var(--text);">{{ $p->jadwal->kereta->nama_kereta }}</div>
                    <div style="font-size:12px;color:var(--muted);margin-top:2px;">{{ $p->jadwal->stasiun_asal }} → {{ $p->jadwal->stasiun_tujuan }}</div>
                    <div style="display:flex;align-items:center;justify-content:space-between;margin-top:8px;">
                        <span style="font-size:11px;color:var(--muted);">{{ $p->tanggal_pesan->format('d M Y') }}</span>
                        <span style="font-size:12px;font-weight:600;color:var(--text);">{{ $p->jumlah_tiket }} tiket</span>
                    </div>
                </div>
            </div>
        </a>
        @empty
        <div class="k-card"><div class="k-card-body" style="text-align:center;color:var(--muted);padding:30px;">Belum ada pesanan</div></div>
        @endforelse
    </div>
</div>
@endsection
