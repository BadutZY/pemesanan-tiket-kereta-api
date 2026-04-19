<?php $__env->startSection('title','Dashboard Admin'); ?>
<?php $__env->startSection('breadcrumb','Dashboard'); ?>

<?php $__env->startSection('content'); ?>
<div class="page-header">
    <h1 class="page-title">Dashboard <span>Admin</span></h1>
    <p class="page-subtitle">Panel administrasi sistem pemesanan tiket</p>
</div>

<div class="row g-3 mb-4">
    <div class="col-6 col-xl-3 fade-up">
        <div class="stat-card">
            <div class="stat-icon-wrap" style="background:var(--accent-soft);">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8" style="color:var(--accent);"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0"/></svg>
            </div>
            <div class="stat-value" data-count="<?php echo e($totalPenumpang); ?>"><?php echo e($totalPenumpang); ?></div>
            <div class="stat-label">Total Penumpang</div>
        </div>
    </div>
    <div class="col-6 col-xl-3 fade-up d1">
        <div class="stat-card">
            <div class="stat-icon-wrap" style="background:var(--blue-soft);">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8" style="color:#60a5fa;"><path stroke-linecap="round" stroke-linejoin="round" d="M8.25 18.75a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m3 0h6m-9 0H3.375a1.125 1.125 0 01-1.125-1.125V14.25m16.5 4.5a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m3 0h1.125c.621 0 1.129-.504 1.09-1.124a17.902 17.902 0 00-3.213-9.193 2.056 2.056 0 00-1.58-.86H14.25M16.5 18.75h-2.25m0-11.177v-.958c0-.568-.422-1.048-.987-1.106a48.554 48.554 0 00-10.026 0 1.106 1.106 0 00-.987 1.106v7.635m12-6.677v6.677m0 4.5v-4.5m0 0h-12"/></svg>
            </div>
            <div class="stat-value" data-count="<?php echo e($totalKereta); ?>"><?php echo e($totalKereta); ?></div>
            <div class="stat-label">Armada Kereta</div>
        </div>
    </div>
    <div class="col-6 col-xl-3 fade-up d2">
        <div class="stat-card">
            <div class="stat-icon-wrap" style="background:var(--gold-soft);">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8" style="color:var(--gold);"><path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75"/></svg>
            </div>
            <div class="stat-value" data-count="<?php echo e($totalJadwal); ?>"><?php echo e($totalJadwal); ?></div>
            <div class="stat-label">Jadwal Aktif</div>
        </div>
    </div>
    <div class="col-6 col-xl-3 fade-up d3">
        <div class="stat-card">
            <div class="stat-icon-wrap" style="background:var(--green-soft);">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8" style="color:#4ade80;"><path stroke-linecap="round" stroke-linejoin="round" d="M16.5 6v.75m0 3v.75m0 3v.75m0 3V18m-9-5.25h5.25M7.5 15h3M3.375 5.25c-.621 0-1.125.504-1.125 1.125v3.026a2.999 2.999 0 010 5.198v3.026c0 .621.504 1.125 1.125 1.125h17.25c.621 0 1.125-.504 1.125-1.125v-3.026a2.999 2.999 0 010-5.198V6.375c0-.621-.504-1.125-1.125-1.125H3.375z"/></svg>
            </div>
            <div class="stat-value" data-count="<?php echo e($totalTiket); ?>"><?php echo e($totalTiket); ?></div>
            <div class="stat-label">Total Tiket Terjual</div>
        </div>
    </div>
</div>

<div class="row g-3 mb-4">
    <div class="col-lg-7 fade-up d1">
        <div class="k-card h-100">
            <div class="k-card-header">
                <div class="k-card-title">
                    <div class="icon-wrap" style="background:var(--accent-soft);"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" style="color:var(--accent);"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z"/></svg></div>
                    Pemesanan Terbaru
                </div>
                <a href="<?php echo e(route('admin.pemesanan.index')); ?>" class="btn-secondary" style="padding:6px 12px;font-size:12px;">Lihat Semua</a>
            </div>
            <div style="overflow-x:auto;">
                <table class="k-table">
                    <thead><tr><th>Penumpang</th><th>Rute</th><th>Tiket</th><th>Status</th></tr></thead>
                    <tbody>
                        <?php $__empty_1 = true; $__currentLoopData = $recentPemesanan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            <td>
                                <div style="display:flex;align-items:center;gap:10px;">
                                    <div style="width:34px;height:34px;border-radius:9px;background:var(--bg-surface3);border:1px solid var(--border);display:flex;align-items:center;justify-content:center;font-size:12px;font-weight:700;color:var(--text-secondary);flex-shrink:0;"><?php echo e(strtoupper(substr($p->penumpang->nama_penumpang,0,2))); ?></div>
                                    <div>
                                        <div style="font-weight:600;font-size:13px;"><?php echo e($p->penumpang->nama_penumpang); ?></div>
                                        <div style="font-size:11px;color:var(--text-muted);"><?php echo e($p->user->name ?? 'Guest'); ?></div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="route-wrap">
                                    <span class="station" style="font-size:12px;"><?php echo e(Str::limit($p->jadwal->stasiun_asal,10)); ?></span>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"/></svg>
                                    <span class="station" style="font-size:12px;"><?php echo e(Str::limit($p->jadwal->stasiun_tujuan,10)); ?></span>
                                </div>
                            </td>
                            <td><span class="badge-count <?php echo e($p->jumlah_tiket > 2 ? 'high' : 'low'); ?>"><?php echo e($p->jumlah_tiket); ?> tiket</span></td>
                            <td>
                                <?php $sc = ['confirmed'=>'low','pending'=>'','cancelled'=>'high']; ?>
                                <span class="badge-count <?php echo e($sc[$p->status] ?? ''); ?>" style="<?php echo e($p->status=='pending' ? 'background:var(--gold-soft);color:var(--gold);border:1px solid rgba(200,149,42,.25);' : ''); ?>"><?php echo e($p->status); ?></span>
                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr><td colspan="4" style="text-align:center;color:var(--text-muted);padding:28px;">Belum ada pemesanan</td></tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="col-lg-5 fade-up d2">
        <div class="k-card mb-3">
            <div class="k-card-header">
                <div class="k-card-title">
                    <div class="icon-wrap" style="background:var(--gold-soft);"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" style="color:var(--gold);"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z"/></svg></div>
                    Tiket &gt; 2 Kursi
                </div>
                <span style="font-size:11px;font-weight:600;background:var(--accent-soft);color:var(--accent);padding:3px 9px;border-radius:5px;border:1px solid var(--accent-border);"><?php echo e($pemesananLebihDari2->count()); ?></span>
            </div>
            <div class="k-card-body" style="padding:10px 16px;">
                <?php $__empty_1 = true; $__currentLoopData = $pemesananLebihDari2; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <div style="display:flex;align-items:center;justify-content:space-between;padding:9px 0;border-bottom:1px solid var(--border);">
                    <div>
                        <div style="font-size:13px;font-weight:600;"><?php echo e($p->penumpang->nama_penumpang); ?></div>
                        <div style="font-size:11px;color:var(--text-muted);"><?php echo e($p->jadwal->stasiun_tujuan); ?></div>
                    </div>
                    <span class="badge-count high"><?php echo e($p->jumlah_tiket); ?> tiket</span>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <p style="color:var(--text-muted);font-size:13px;text-align:center;padding:12px 0;">Tidak ada data</p>
                <?php endif; ?>
            </div>
        </div>

        <div class="k-card">
            <div class="k-card-header">
                <div class="k-card-title">
                    <div class="icon-wrap" style="background:var(--blue-soft);"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" style="color:#60a5fa;"><path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z"/></svg></div>
                    Jadwal ke Bandung
                </div>
                <span style="font-size:11px;font-weight:600;background:var(--blue-soft);color:#60a5fa;padding:3px 9px;border-radius:5px;border:1px solid rgba(37,99,176,.25);"><?php echo e($jadwalBandung->count()); ?></span>
            </div>
            <div class="k-card-body" style="padding:10px 16px;">
                <?php $__empty_1 = true; $__currentLoopData = $jadwalBandung; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $j): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <div style="display:flex;align-items:center;justify-content:space-between;padding:9px 0;border-bottom:1px solid var(--border);">
                    <div>
                        <div style="font-size:13px;font-weight:600;"><?php echo e($j->kereta->nama_kereta); ?></div>
                        <div style="font-size:11px;color:var(--text-muted);"><?php echo e($j->stasiun_asal); ?></div>
                    </div>
                    <div class="time-chip"><?php echo e(\Carbon\Carbon::parse($j->jam_berangkat)->format('H:i')); ?></div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <p style="color:var(--text-muted);font-size:13px;text-align:center;padding:12px 0;">Tidak ada jadwal</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<div class="k-card fade-up d3">
    <div class="k-card-header">
        <div class="k-card-title">
            <div class="icon-wrap" style="background:var(--purple-soft);"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" style="color:#a78bfa;"><path stroke-linecap="round" stroke-linejoin="round" d="M3.75 13.5l10.5-11.25L12 10.5h8.25L9.75 21.75 12 13.5H3.75z"/></svg></div>
            Aksi Cepat
        </div>
    </div>
    <div class="k-card-body">
        <div class="row g-2">
            <div class="col-6 col-md-3"><a href="<?php echo e(route('admin.kereta.create')); ?>" class="btn-secondary w-100 justify-content-center"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15"/></svg>Tambah Kereta</a></div>
            <div class="col-6 col-md-3"><a href="<?php echo e(route('admin.jadwal.create')); ?>" class="btn-primary w-100 justify-content-center"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15"/></svg>Buat Jadwal</a></div>
            <div class="col-6 col-md-3"><a href="<?php echo e(route('admin.pemesanan.index')); ?>" class="btn-secondary w-100 justify-content-center"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M16.5 6v.75m0 3v.75m0 3v.75m0 3V18m-9-5.25h5.25M7.5 15h3M3.375 5.25c-.621 0-1.125.504-1.125 1.125v3.026a2.999 2.999 0 010 5.198v3.026c0 .621.504 1.125 1.125 1.125h17.25c.621 0 1.125-.504 1.125-1.125v-3.026a2.999 2.999 0 010-5.198V6.375c0-.621-.504-1.125-1.125-1.125H3.375z"/></svg>Semua Pesanan</a></div>
            <div class="col-6 col-md-3"><a href="<?php echo e(route('admin.laporan')); ?>" class="btn-secondary w-100 justify-content-center"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M3 13.125C3 12.504 3.504 12 4.125 12h2.25c.621 0 1.125.504 1.125 1.125v6.75C7.5 20.496 6.996 21 6.375 21h-2.25A1.125 1.125 0 013 19.875v-6.75zM9.75 8.625c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v11.25c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V8.625zM16.5 4.125c0-.621.504-1.125 1.125-1.125h2.25C20.496 3 21 3.504 21 4.125v15.75c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V4.125z"/></svg>Laporan</a></div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\rizki\Pictures\INFOKOM-REACT\kai_new\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>