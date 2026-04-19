<?php $__env->startSection('title','Detail Penumpang'); ?>
<?php $__env->startSection('breadcrumb','Detail Penumpang'); ?>
<?php $__env->startSection('content'); ?>
<div class="page-header"><div style="display:flex;align-items:center;gap:12px;">
    <a href="<?php echo e(route('admin.penumpang.index')); ?>" class="btn-secondary" style="padding:8px 10px;"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18"/></svg></a>
    <div><h1 class="page-title">Detail <span>Penumpang</span></h1><p class="page-subtitle"><?php echo e($penumpang->nama_penumpang); ?></p></div>
</div></div>
<?php
    $userPhoto = optional($penumpang->pemesanan->first()?->user)->photo_profile;
    $initials  = strtoupper(substr($penumpang->nama_penumpang, 0, 2));
?>
<div class="row g-3">
    <div class="col-lg-4 fade-up">
        <div class="k-card" style="padding:28px;text-align:center;">
            <?php if($userPhoto): ?>
                <img src="<?php echo e(Storage::disk('public')->url($userPhoto)); ?>" alt="<?php echo e($penumpang->nama_penumpang); ?>"
                     style="width:80px;height:80px;border-radius:16px;object-fit:cover;border:2px solid var(--border);margin:0 auto 16px;display:block;">
            <?php else: ?>
                <div style="width:80px;height:80px;border-radius:16px;background:var(--bg-surface3);border:1px solid var(--border);display:flex;align-items:center;justify-content:center;font-size:26px;font-weight:700;color:var(--text-secondary);margin:0 auto 16px;"><?php echo e($initials); ?></div>
            <?php endif; ?>
            <h3 style="font-family:var(--font-display);font-size:18px;font-weight:900;margin-bottom:4px;"><?php echo e($penumpang->nama_penumpang); ?></h3>
            <p style="color:var(--text-muted);font-size:12px;">ID #<?php echo e($penumpang->id_penumpang); ?></p>
            <div class="info-row" style="margin-top:20px;text-align:left;"><div class="info-lbl">NIK</div><div class="info-val"><span class="mono" style="font-size:11px;"><?php echo e($penumpang->nik); ?></span></div></div>
            <div class="info-row" style="text-align:left;"><div class="info-lbl">No. HP</div><div class="info-val"><?php echo e($penumpang->no_hp); ?></div></div>
        </div>
    </div>
    <div class="col-lg-8 fade-up d1">
        <div class="k-card">
            <div class="k-card-header"><div class="k-card-title">Riwayat Pemesanan</div><span style="font-size:11px;font-weight:600;background:var(--bg-surface2);color:var(--text-muted);padding:3px 9px;border-radius:5px;border:1px solid var(--border);"><?php echo e($penumpang->pemesanan->count()); ?></span></div>
            <div style="overflow-x:auto;"><table class="k-table">
                <thead><tr><th>Kereta</th><th>Rute</th><th>Tanggal</th><th>Tiket</th></tr></thead>
                <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $penumpang->pemesanan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $o): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                        <td><div style="font-weight:600;font-size:13px;"><?php echo e($o->jadwal->kereta->nama_kereta); ?></div><span class="badge-kelas <?php echo e(strtolower($o->jadwal->kereta->kelas)); ?>"><?php echo e($o->jadwal->kereta->kelas); ?></span></td>
                        <td><div class="route-wrap"><span class="station" style="font-size:12px;"><?php echo e($o->jadwal->stasiun_asal); ?></span><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"/></svg><span class="station" style="font-size:12px;"><?php echo e($o->jadwal->stasiun_tujuan); ?></span></div></td>
                        <td style="font-size:12px;color:var(--text-muted);"><?php echo e($o->tanggal_pesan->format('d M Y')); ?></td>
                        <td><span class="badge-count <?php echo e($o->jumlah_tiket>2?'high':'low'); ?>"><?php echo e($o->jumlah_tiket); ?> tiket</span></td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr><td colspan="4" style="text-align:center;color:var(--text-muted);padding:24px;">Belum ada pemesanan</td></tr>
                    <?php endif; ?>
                </tbody>
            </table></div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\rizki\Pictures\INFOKOM-REACT\kai_website_laravel\resources\views/admin/penumpang/show.blade.php ENDPATH**/ ?>