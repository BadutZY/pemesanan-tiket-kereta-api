@extends('layouts.app')
@section('title', 'Detail Pemesanan')
@section('breadcrumb', 'Detail Pemesanan')

@section('content')
<div class="page-header">
    <div style="display:flex;align-items:center;gap:12px;">
        <a href="{{ route('pemesanan.index') }}" class="btn-secondary" style="padding:9px 12px;"><i class="bi bi-arrow-left"></i></a>
        <div>
            <h1 class="page-title">E-Ticket <span style="color:var(--kai-red)">#{{ $pemesanan->id_pemesanan }}</span></h1>
            <p class="page-subtitle">Detail pemesanan tiket kereta api</p>
        </div>
    </div>
</div>

<div class="row justify-content-center">
    <div class="col-lg-8">
        <!-- E-Ticket Style Card -->
        <div class="fade-up" style="background:var(--kai-surface);border:1px solid var(--kai-border);border-radius:20px;overflow:hidden;">
            <!-- Header -->
            <div style="background:linear-gradient(135deg,var(--kai-blue) 0%,var(--kai-red) 100%);padding:28px 32px;position:relative;overflow:hidden;">
                <div style="position:absolute;top:-40px;right:-40px;width:160px;height:160px;border-radius:50%;background:rgba(255,255,255,.05);"></div>
                <div style="position:absolute;bottom:-60px;left:50%;width:200px;height:200px;border-radius:50%;background:rgba(255,255,255,.03);"></div>
                <div style="display:flex;align-items:center;justify-content:space-between;position:relative;z-index:1;">
                    <div>
                        <div style="font-size:11px;text-transform:uppercase;letter-spacing:2px;color:rgba(255,255,255,.7);margin-bottom:6px;">E-Ticket KAI Express</div>
                        <div style="font-family:'Syne',sans-serif;font-size:28px;font-weight:800;color:#fff;">#{{ str_pad($pemesanan->id_pemesanan, 6, '0', STR_PAD_LEFT) }}</div>
                    </div>
                    <div style="font-size:48px;"></div>
                </div>
            </div>

            <!-- Route Section -->
            <div style="padding:28px 32px;border-bottom:2px dashed var(--kai-border);">
                <div style="display:flex;align-items:center;justify-content:space-between;">
                    <div style="text-align:center;">
                        <div style="font-size:11px;color:var(--kai-muted);text-transform:uppercase;letter-spacing:1px;margin-bottom:6px;">Dari</div>
                        <div style="font-family:'Syne',sans-serif;font-size:20px;font-weight:800;">{{ $pemesanan->jadwal->stasiun_asal }}</div>
                    </div>
                    <div style="text-align:center;flex:1;">
                        <div style="color:var(--kai-red);font-size:28px;"></div>
                        <div style="height:2px;background:linear-gradient(90deg,var(--kai-red),var(--kai-gold));border-radius:1px;margin:6px 20px;"></div>
                        <div style="font-size:12px;color:var(--kai-gold);font-weight:700;">{{ $pemesanan->jadwal->kereta->nama_kereta }}</div>
                    </div>
                    <div style="text-align:center;">
                        <div style="font-size:11px;color:var(--kai-muted);text-transform:uppercase;letter-spacing:1px;margin-bottom:6px;">Ke</div>
                        <div style="font-family:'Syne',sans-serif;font-size:20px;font-weight:800;">{{ $pemesanan->jadwal->stasiun_tujuan }}</div>
                    </div>
                </div>
            </div>

            <!-- Details -->
            <div style="padding:24px 32px;">
                <div class="row g-4">
                    <div class="col-6 col-md-3">
                        <div style="font-size:10px;color:var(--kai-muted);text-transform:uppercase;letter-spacing:1px;margin-bottom:6px;">Tanggal</div>
                        <div style="font-weight:700;font-size:14px;">{{ \Carbon\Carbon::parse($pemesanan->jadwal->tanggal_berangkat)->format('d M Y') }}</div>
                    </div>
                    <div class="col-6 col-md-3">
                        <div style="font-size:10px;color:var(--kai-muted);text-transform:uppercase;letter-spacing:1px;margin-bottom:6px;">Jam</div>
                        <div style="font-weight:800;font-size:18px;color:var(--kai-gold);">{{ \Carbon\Carbon::parse($pemesanan->jadwal->jam_berangkat)->format('H:i') }}</div>
                    </div>
                    <div class="col-6 col-md-3">
                        <div style="font-size:10px;color:var(--kai-muted);text-transform:uppercase;letter-spacing:1px;margin-bottom:6px;">Kelas</div>
                        <span class="badge-kelas {{ strtolower($pemesanan->jadwal->kereta->kelas) }}">{{ $pemesanan->jadwal->kereta->kelas }}</span>
                    </div>
                    <div class="col-6 col-md-3">
                        <div style="font-size:10px;color:var(--kai-muted);text-transform:uppercase;letter-spacing:1px;margin-bottom:6px;">Jumlah Tiket</div>
                        <span class="badge-tiket {{ $pemesanan->jumlah_tiket > 2 ? 'high' : 'low' }}" style="font-size:16px;padding:6px 14px;">{{ $pemesanan->jumlah_tiket }}</span>
                    </div>
                </div>

                <div style="height:1px;background:var(--kai-border);margin:24px 0;"></div>

                <!-- Passenger Info -->
                <div style="display:flex;align-items:center;gap:16px;">
                    <div style="width:52px;height:52px;border-radius:14px;background:linear-gradient(135deg,var(--kai-blue),var(--kai-red));display:flex;align-items:center;justify-content:center;font-size:20px;font-weight:800;color:#fff;flex-shrink:0;">
                        {{ strtoupper(substr($pemesanan->penumpang->nama_penumpang,0,1)) }}
                    </div>
                    <div>
                        <div style="font-size:11px;color:var(--kai-muted);text-transform:uppercase;letter-spacing:1px;margin-bottom:4px;">Penumpang</div>
                        <div style="font-weight:700;font-size:16px;">{{ $pemesanan->penumpang->nama_penumpang }}</div>
                        <div style="font-size:12px;color:var(--kai-muted);">NIK: {{ $pemesanan->penumpang->nik }} | HP: {{ $pemesanan->penumpang->no_hp }}</div>
                    </div>
                    <div style="margin-left:auto;text-align:right;">
                        <div style="font-size:11px;color:var(--kai-muted);margin-bottom:4px;">Dipesan</div>
                        <div style="font-size:13px;font-weight:600;">{{ $pemesanan->tanggal_pesan->format('d M Y') }}</div>
                    </div>
                </div>

                <div style="display:flex;gap:10px;margin-top:24px;">
                    <a href="{{ route('pemesanan.edit', $pemesanan->id_pemesanan) }}" class="btn-primary"><i class="bi bi-pencil-fill"></i> Edit</a>
                    <a href="{{ route('pemesanan.index') }}" class="btn-secondary"><i class="bi bi-arrow-left"></i> Kembali</a>
                    <form id="del-show" action="{{ route('pemesanan.destroy', $pemesanan->id_pemesanan) }}" method="POST" style="margin-left:auto;">
                        @csrf @method('DELETE')
                        <button type="button" class="btn-secondary" onclick="confirmDelete('del-show')" style="border-color:rgba(227,30,36,.3);color:#f87171;">
                            <i class="bi bi-trash-fill"></i> Hapus
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
