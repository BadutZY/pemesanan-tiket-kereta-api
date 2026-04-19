@extends('layouts.app')
@section('title', 'Laporan')
@section('breadcrumb', 'Laporan')

@section('content')
<div class="page-header">
    <h1 class="page-title">Laporan <span style="color:var(--kai-red)">Analitik</span></h1>
    <p class="page-subtitle">Laporan data pemesanan tiket kereta api berdasarkan query yang ditentukan</p>
</div>

<!-- Section 1: Pemesanan > 2 tiket -->
<div class="kai-card mb-4 fade-up">
    <div class="k-card-header">
        <div class="k-card-title">
            <span style="background:rgba(227,30,36,.12);color:var(--kai-red);width:36px;height:36px;border-radius:10px;display:flex;align-items:center;justify-content:center;font-size:18px;">1</span>
            Pemesanan dengan Jumlah Tiket > 2
        </div>
        <span class="nav-badge" style="font-size:13px;padding:4px 12px;">{{ $pemesananLebihDari2->count() }} data</span>
    </div>
    <div style="overflow-x:auto;">
        <table class="k-table">
            <thead>
                <tr>
                    <th>#ID</th>
                    <th>Penumpang</th>
                    <th>Kereta</th>
                    <th>Rute</th>
                    <th>Tanggal Pesan</th>
                    <th>Jumlah Tiket</th>
                </tr>
            </thead>
            <tbody>
                @forelse($pemesananLebihDari2 as $p)
                <tr>
                    <td style="color:var(--kai-muted);font-size:12px;">#{{ $p->id_pemesanan }}</td>
                    <td>
                        <div style="display:flex;align-items:center;gap:10px;">
                            <div style="width:36px;height:36px;border-radius:10px;background:linear-gradient(135deg,var(--kai-blue),var(--kai-red));display:flex;align-items:center;justify-content:center;font-size:13px;font-weight:700;color:#fff;">
                                {{ strtoupper(substr($p->penumpang->nama_penumpang,0,1)) }}
                            </div>
                            <div style="font-weight:600;">{{ $p->penumpang->nama_penumpang }}</div>
                        </div>
                    </td>
                    <td>
                        <div style="font-weight:600;font-size:13px;">{{ $p->jadwal->kereta->nama_kereta }}</div>
                        <span class="badge-kelas {{ strtolower($p->jadwal->kereta->kelas) }}">{{ $p->jadwal->kereta->kelas }}</span>
                    </td>
                    <td>
                        <div class="route-wrap">
                            <span class="station" style="font-size:12px;">{{ $p->jadwal->stasiun_asal }}</span>
                            <span class="arrow"><i class="bi bi-arrow-right"></i></span>
                            <span class="station" style="font-size:12px;">{{ $p->jadwal->stasiun_tujuan }}</span>
                        </div>
                    </td>
                    <td style="font-size:13px;">{{ $p->tanggal_pesan->format('d M Y') }}</td>
                    <td>
                        <span class="badge-tiket high" style="font-size:14px;padding:6px 14px;">{{ $p->jumlah_tiket }} Tiket</span>
                    </td>
                </tr>
                @empty
                <tr><td colspan="6"><div class="empty-state" style="padding:30px;"><i class="bi bi-inbox"></i><p>Tidak ada data</p></div></td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div style="padding:16px 24px;background:rgba(227,30,36,.05);border-top:1px solid rgba(227,30,36,.1);">
        <code style="font-size:12px;color:var(--kai-muted);">
            SELECT * FROM pemesanan WHERE jumlah_tiket > 2;
        </code>
    </div>
</div>

<!-- Section 2: Jadwal ke Bandung -->
<div class="kai-card mb-4 fade-up delay-1">
    <div class="k-card-header">
        <div class="k-card-title">
            <span style="background:rgba(96,165,250,.12);color:#60a5fa;width:36px;height:36px;border-radius:10px;display:flex;align-items:center;justify-content:center;font-size:18px;">2</span>
            Jadwal Kereta dengan Tujuan Bandung
        </div>
        <span class="nav-badge" style="background:var(--kai-blue-mid);font-size:13px;padding:4px 12px;">{{ $jadwalBandung->count() }} jadwal</span>
    </div>
    <div style="overflow-x:auto;">
        <table class="k-table">
            <thead>
                <tr>
                    <th>#ID</th>
                    <th>Kereta</th>
                    <th>Stasiun Asal</th>
                    <th>Stasiun Tujuan</th>
                    <th>Tanggal</th>
                    <th>Jam</th>
                </tr>
            </thead>
            <tbody>
                @forelse($jadwalBandung as $j)
                <tr>
                    <td style="color:var(--kai-muted);font-size:12px;">#{{ $j->id_jadwal }}</td>
                    <td>
                        <div style="font-weight:600;">{{ $j->kereta->nama_kereta }}</div>
                        <span class="badge-kelas {{ strtolower($j->kereta->kelas) }}">{{ $j->kereta->kelas }}</span>
                    </td>
                    <td style="font-weight:500;">{{ $j->stasiun_asal }}</td>
                    <td>
                        <span style="background:rgba(96,165,250,.12);color:#60a5fa;padding:4px 12px;border-radius:8px;font-weight:600;font-size:13px;">
                            {{ $j->stasiun_tujuan }}
                        </span>
                    </td>
                    <td style="font-size:13px;">{{ \Carbon\Carbon::parse($j->tanggal_berangkat)->format('d M Y') }}</td>
                    <td>
                        <span style="background:rgba(245,166,35,.1);color:var(--kai-gold);padding:4px 10px;border-radius:6px;font-weight:700;">
                            {{ \Carbon\Carbon::parse($j->jam_berangkat)->format('H:i') }}
                        </span>
                    </td>
                </tr>
                @empty
                <tr><td colspan="6"><div class="empty-state" style="padding:30px;"><i class="bi bi-calendar-x"></i><p>Tidak ada jadwal ke Bandung</p></div></td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div style="padding:16px 24px;background:rgba(96,165,250,.05);border-top:1px solid rgba(96,165,250,.1);">
        <code style="font-size:12px;color:var(--kai-muted);">
            SELECT * FROM jadwal WHERE stasiun_tujuan LIKE '%Bandung%';
        </code>
    </div>
</div>

<!-- Section 3: Total tiket per penumpang -->
<div class="kai-card fade-up delay-2">
    <div class="k-card-header">
        <div class="k-card-title">
            <span style="background:rgba(46,160,67,.12);color:#4ade80;width:36px;height:36px;border-radius:10px;display:flex;align-items:center;justify-content:center;font-size:18px;">3</span>
            Total Tiket yang Dipesan per Penumpang
        </div>
        <div style="display:flex;align-items:center;gap:12px;">
            <span style="font-size:13px;color:var(--kai-muted);">Grand Total:</span>
            <span style="font-family:'Syne',sans-serif;font-size:22px;font-weight:800;color:var(--kai-gold);">{{ $grandTotalTiket }} Tiket</span>
        </div>
    </div>
    <div style="overflow-x:auto;">
        <table class="k-table">
            <thead>
                <tr>
                    <th>Penumpang</th>
                    <th>NIK</th>
                    <th>No. HP</th>
                    <th>Total Tiket Dipesan</th>
                    <th>Proporsi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($totalTiketPerPenumpang as $p)
                @php $pct = $grandTotalTiket > 0 ? round(($p->pemesanan_sum_jumlah_tiket / $grandTotalTiket) * 100) : 0; @endphp
                <tr>
                    <td>
                        <div style="display:flex;align-items:center;gap:10px;">
                            <div style="width:36px;height:36px;border-radius:10px;background:linear-gradient(135deg,var(--kai-blue),var(--kai-red));display:flex;align-items:center;justify-content:center;font-size:13px;font-weight:700;color:#fff;">
                                {{ strtoupper(substr($p->nama_penumpang,0,1)) }}
                            </div>
                            <div style="font-weight:600;">{{ $p->nama_penumpang }}</div>
                        </div>
                    </td>
                    <td><span style="font-family:monospace;font-size:12px;background:var(--kai-surface2);padding:3px 8px;border-radius:5px;">{{ $p->nik }}</span></td>
                    <td style="font-size:13px;color:var(--kai-gold);">{{ $p->no_hp }}</td>
                    <td>
                        <span style="font-family:'Syne',sans-serif;font-size:22px;font-weight:800;color:var(--kai-text);">{{ $p->pemesanan_sum_jumlah_tiket }}</span>
                        <span style="font-size:12px;color:var(--kai-muted);margin-left:4px;">tiket</span>
                    </td>
                    <td style="width:160px;">
                        <div style="display:flex;align-items:center;gap:10px;">
                            <div style="flex:1;height:6px;background:var(--kai-border);border-radius:3px;overflow:hidden;">
                                <div style="width:{{ $pct }}%;height:100%;background:linear-gradient(90deg,var(--kai-red),var(--kai-gold));border-radius:3px;transition:width .6s ease;"></div>
                            </div>
                            <span style="font-size:11px;color:var(--kai-muted);font-weight:600;width:32px;text-align:right;">{{ $pct }}%</span>
                        </div>
                    </td>
                </tr>
                @empty
                <tr><td colspan="5"><div class="empty-state" style="padding:30px;"><i class="bi bi-people"></i><p>Tidak ada data</p></div></td></tr>
                @endforelse
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="3" style="padding:16px;text-align:right;font-weight:700;font-size:14px;border-top:2px solid var(--kai-border);">GRAND TOTAL</td>
                    <td style="padding:16px;border-top:2px solid var(--kai-border);">
                        <span style="font-family:'Syne',sans-serif;font-size:26px;font-weight:800;color:var(--kai-gold);">{{ $grandTotalTiket }}</span>
                        <span style="font-size:13px;color:var(--kai-muted);margin-left:4px;">tiket</span>
                    </td>
                    <td style="border-top:2px solid var(--kai-border);"></td>
                </tr>
            </tfoot>
        </table>
    </div>
    <div style="padding:16px 24px;background:rgba(46,160,67,.05);border-top:1px solid rgba(46,160,67,.1);">
        <code style="font-size:12px;color:var(--kai-muted);">
            SELECT p.nama_penumpang, SUM(pm.jumlah_tiket) AS total_tiket FROM penumpang p JOIN pemesanan pm ON p.id_penumpang = pm.id_penumpang GROUP BY p.id_penumpang;
        </code>
    </div>
</div>
@endsection
