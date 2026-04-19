<?php $__env->startSection('title','Laporan'); ?>
<?php $__env->startSection('breadcrumb','Laporan'); ?>
<?php $__env->startSection('content'); ?>
<div class="page-header"><h1 class="page-title">Laporan <span>Analitik</span></h1><p class="page-subtitle">Laporan query sesuai tugas praktik</p></div>

<div class="k-card mb-4 fade-up">
    <div class="k-card-header"><div class="k-card-title"><div style="width:28px;height:28px;border-radius:7px;background:var(--accent-soft);color:var(--accent);display:flex;align-items:center;justify-content:center;font-size:13px;font-weight:700;">1</div>Pemesanan dengan Jumlah Tiket &gt; 2</div><span class="badge-count high"><?php echo e($pemesananLebihDari2->count()); ?> data</span></div>
    <div style="overflow-x:auto;"><table class="k-table">
        <thead><tr><th>#ID</th><th>Penumpang</th><th>Kereta</th><th>Rute</th><th>Tanggal Pesan</th><th>Jumlah Tiket</th></tr></thead>
        <tbody>
            <?php $__empty_1 = true; $__currentLoopData = $pemesananLebihDari2; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <?php
                $photo    = optional($p->user)->photo_profile;
                $initials = strtoupper(substr($p->penumpang->nama_penumpang, 0, 2));
            ?>
            <tr>
                <td style="color:var(--text-muted);font-size:12px;">#<?php echo e($p->id_pemesanan); ?></td>
                <td>
                    <div style="display:flex;align-items:center;gap:10px;">
                        <?php if($photo): ?>
                            <img src="<?php echo e(Storage::disk('public')->url($photo)); ?>" alt="<?php echo e($p->penumpang->nama_penumpang); ?>"
                                 style="width:32px;height:32px;border-radius:8px;object-fit:cover;border:1px solid var(--border);flex-shrink:0;">
                        <?php else: ?>
                            <div style="width:32px;height:32px;border-radius:8px;background:var(--bg-surface3);border:1px solid var(--border);display:flex;align-items:center;justify-content:center;font-size:11px;font-weight:700;color:var(--text-secondary);flex-shrink:0;"><?php echo e($initials); ?></div>
                        <?php endif; ?>
                        <div style="font-weight:600;"><?php echo e($p->penumpang->nama_penumpang); ?></div>
                    </div>
                </td>
                <td><div style="font-weight:600;font-size:13px;"><?php echo e($p->jadwal->kereta->nama_kereta); ?></div><span class="badge-kelas <?php echo e(strtolower($p->jadwal->kereta->kelas)); ?>"><?php echo e($p->jadwal->kereta->kelas); ?></span></td>
                <td><div class="route-wrap"><span class="station" style="font-size:12px;"><?php echo e($p->jadwal->stasiun_asal); ?></span><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"/></svg><span class="station" style="font-size:12px;"><?php echo e($p->jadwal->stasiun_tujuan); ?></span></div></td>
                <td style="font-size:13px;"><?php echo e($p->tanggal_pesan->format('d M Y')); ?></td>
                <td><span class="badge-count high" style="font-size:14px;padding:5px 12px;"><?php echo e($p->jumlah_tiket); ?> Tiket</span></td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <tr><td colspan="6" style="text-align:center;color:var(--text-muted);padding:28px;">Tidak ada data</td></tr>
            <?php endif; ?>
        </tbody>
    </table></div>
    <div style="padding:12px 20px;background:rgba(192,57,43,.04);border-top:1px solid rgba(192,57,43,.1);font-family:var(--font-mono);font-size:11.5px;color:var(--text-muted);">SELECT * FROM pemesanan WHERE jumlah_tiket > 2;</div>
</div>

<div class="k-card mb-4 fade-up d1">
    <div class="k-card-header"><div class="k-card-title"><div style="width:28px;height:28px;border-radius:7px;background:var(--blue-soft);color:#60a5fa;display:flex;align-items:center;justify-content:center;font-size:13px;font-weight:700;">2</div>Jadwal Kereta Tujuan Bandung</div><span class="badge-count low"><?php echo e($jadwalBandung->count()); ?> jadwal</span></div>
    <div style="overflow-x:auto;"><table class="k-table">
        <thead><tr><th>#ID</th><th>Kereta</th><th>Asal</th><th>Tujuan</th><th>Tanggal</th><th>Jam</th></tr></thead>
        <tbody>
            <?php $__empty_1 = true; $__currentLoopData = $jadwalBandung; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $j): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <tr>
                <td style="color:var(--text-muted);font-size:12px;">#<?php echo e($j->id_jadwal); ?></td>
                <td><div style="font-weight:600;"><?php echo e($j->kereta->nama_kereta); ?></div><span class="badge-kelas <?php echo e(strtolower($j->kereta->kelas)); ?>"><?php echo e($j->kereta->kelas); ?></span></td>
                <td><?php echo e($j->stasiun_asal); ?></td>
                <td><span style="background:var(--blue-soft);color:#60a5fa;padding:3px 10px;border-radius:6px;font-weight:600;font-size:13px;"><?php echo e($j->stasiun_tujuan); ?></span></td>
                <td style="font-size:13px;"><?php echo e(\Carbon\Carbon::parse($j->tanggal_berangkat)->format('d M Y')); ?></td>
                <td><div class="time-chip"><?php echo e(\Carbon\Carbon::parse($j->jam_berangkat)->format('H:i')); ?></div></td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <tr><td colspan="6" style="text-align:center;color:var(--text-muted);padding:28px;">Tidak ada jadwal ke Bandung</td></tr>
            <?php endif; ?>
        </tbody>
    </table></div>
    <div style="padding:12px 20px;background:rgba(37,99,176,.04);border-top:1px solid rgba(37,99,176,.1);font-family:var(--font-mono);font-size:11.5px;color:var(--text-muted);">SELECT * FROM jadwal WHERE stasiun_tujuan LIKE '%Bandung%';</div>
</div>

<div class="k-card fade-up d2">
    <div class="k-card-header"><div class="k-card-title"><div style="width:28px;height:28px;border-radius:7px;background:var(--green-soft);color:#4ade80;display:flex;align-items:center;justify-content:center;font-size:13px;font-weight:700;">3</div>Total Tiket Dipesan per Penumpang</div>
    <div style="display:flex;align-items:center;gap:8px;"><span style="font-size:12px;color:var(--text-muted);">Grand Total:</span><span style="font-family:var(--font-display);font-size:20px;font-weight:900;color:var(--gold);"><?php echo e($grandTotalTiket); ?></span></div></div>
    <div style="overflow-x:auto;"><table class="k-table">
        <thead><tr><th>Penumpang</th><th>NIK</th><th>No. HP</th><th>Total Tiket</th><th>Proporsi</th></tr></thead>
        <tbody>
            <?php $__empty_1 = true; $__currentLoopData = $totalTiketPerPenumpang; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <?php
                $pct      = $grandTotalTiket>0 ? round(($p->pemesanan_sum_jumlah_tiket/$grandTotalTiket)*100) : 0;
                $photo    = optional($p->pemesanan->first()?->user)->photo_profile;
                $initials = strtoupper(substr($p->nama_penumpang, 0, 2));
            ?>
            <tr>
                <td>
                    <div style="display:flex;align-items:center;gap:10px;">
                        <?php if($photo): ?>
                            <img src="<?php echo e(Storage::disk('public')->url($photo)); ?>" alt="<?php echo e($p->nama_penumpang); ?>"
                                 style="width:34px;height:34px;border-radius:9px;object-fit:cover;border:1px solid var(--border);flex-shrink:0;">
                        <?php else: ?>
                            <div style="width:34px;height:34px;border-radius:9px;background:var(--bg-surface3);border:1px solid var(--border);display:flex;align-items:center;justify-content:center;font-size:12px;font-weight:700;color:var(--text-secondary);flex-shrink:0;"><?php echo e($initials); ?></div>
                        <?php endif; ?>
                        <span style="font-weight:600;"><?php echo e($p->nama_penumpang); ?></span>
                    </div>
                </td>
                <td><span class="mono" style="font-size:11px;background:var(--bg-surface2);padding:3px 7px;border-radius:4px;border:1px solid var(--border);"><?php echo e($p->nik); ?></span></td>
                <td style="font-size:13px;color:var(--text-secondary);"><?php echo e($p->no_hp); ?></td>
                <td><span style="font-family:var(--font-display);font-size:20px;font-weight:900;"><?php echo e($p->pemesanan_sum_jumlah_tiket); ?></span><span style="font-size:12px;color:var(--text-muted);margin-left:4px;">tiket</span></td>
                <td style="width:160px;"><div style="display:flex;align-items:center;gap:8px;"><div style="flex:1;height:5px;background:var(--border);border-radius:3px;overflow:hidden;"><div style="width:<?php echo e($pct); ?>%;height:100%;background:var(--accent);border-radius:3px;"></div></div><span style="font-size:11px;color:var(--text-muted);font-weight:600;width:30px;text-align:right;"><?php echo e($pct); ?>%</span></div></td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <tr><td colspan="5" style="text-align:center;color:var(--text-muted);padding:28px;">Tidak ada data</td></tr>
            <?php endif; ?>
        </tbody>
        <tfoot><tr><td colspan="3" style="padding:14px 16px;text-align:right;font-weight:700;border-top:2px solid var(--border);">GRAND TOTAL</td><td style="padding:14px 16px;border-top:2px solid var(--border);"><span style="font-family:var(--font-display);font-size:24px;font-weight:900;color:var(--gold);"><?php echo e($grandTotalTiket); ?></span> <span style="color:var(--text-muted);font-size:12px;">tiket</span></td><td style="border-top:2px solid var(--border);"></td></tr></tfoot>
    </table></div>
    <div style="padding:12px 20px;background:rgba(31,122,74,.04);border-top:1px solid rgba(31,122,74,.1);font-family:var(--font-mono);font-size:11.5px;color:var(--text-muted);">SELECT p.nama_penumpang, SUM(pm.jumlah_tiket) AS total_tiket FROM penumpang p JOIN pemesanan pm ON p.id_penumpang = pm.id_penumpang GROUP BY p.id_penumpang;</div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\rizki\Pictures\INFOKOM-REACT\Laravel\kai_project_website\resources\views/admin/pemesanan/laporan.blade.php ENDPATH**/ ?>