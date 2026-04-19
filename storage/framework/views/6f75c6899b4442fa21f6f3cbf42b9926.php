<?php $__env->startSection('title','Semua Pemesanan'); ?>
<?php $__env->startSection('breadcrumb','Pemesanan'); ?>
<?php $__env->startSection('content'); ?>
<div class="page-header d-flex align-items-center justify-content-between flex-wrap gap-3">
    <div><h1 class="page-title">Semua <span>Pemesanan</span></h1><p class="page-subtitle">Kelola transaksi pemesanan tiket</p></div>
    <a href="<?php echo e(route('admin.laporan')); ?>" class="btn-secondary"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M3 13.125C3 12.504 3.504 12 4.125 12h2.25c.621 0 1.125.504 1.125 1.125v6.75C7.5 20.496 6.996 21 6.375 21h-2.25A1.125 1.125 0 013 19.875v-6.75z"/><path stroke-linecap="round" stroke-linejoin="round" d="M9.75 8.625c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v11.25c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V8.625z"/><path stroke-linecap="round" stroke-linejoin="round" d="M16.5 4.125c0-.621.504-1.125 1.125-1.125h2.25C20.496 3 21 3.504 21 4.125v15.75c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V4.125z"/></svg>Laporan</a>
</div>
<div class="row g-3 mb-4"><div class="col-md-3"><div class="stat-card"><div class="stat-icon-wrap" style="background:var(--green-soft);"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8" style="color:#4ade80;"><path stroke-linecap="round" stroke-linejoin="round" d="M16.5 6v.75m0 3v.75m0 3v.75m0 3V18m-9-5.25h5.25M7.5 15h3M3.375 5.25c-.621 0-1.125.504-1.125 1.125v3.026a2.999 2.999 0 010 5.198v3.026c0 .621.504 1.125 1.125 1.125h17.25c.621 0 1.125-.504 1.125-1.125v-3.026a2.999 2.999 0 010-5.198V6.375c0-.621-.504-1.125-1.125-1.125H3.375z"/></svg></div><div class="stat-value"><?php echo e($totalTiket); ?></div><div class="stat-label">Total Tiket Terjual</div></div></div></div>
<div class="k-card mb-4 fade-up"><div class="k-card-body" style="padding:14px 18px;">
    <form method="GET" action="<?php echo e(route('admin.pemesanan.index')); ?>">
        <div class="row g-2 align-items-center">
            <div class="col-md-5"><div class="search-wrap"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z"/></svg><input type="text" name="search" value="<?php echo e($search); ?>" placeholder="Cari nama penumpang..." class="form-input"></div></div>
            <div class="col-md-3"><select name="filter_tiket" class="form-input"><option value="">Semua Pemesanan</option><option value="lebih2" <?php echo e($filterTiket=='lebih2'?'selected':''); ?>>Tiket lebih dari 2</option></select></div>
            <div class="col-md-2"><button type="submit" class="btn-primary w-100 justify-content-center">Filter</button></div>
            <div class="col-md-2"><a href="<?php echo e(route('admin.pemesanan.index')); ?>" class="btn-secondary w-100 justify-content-center">Reset</a></div>
        </div>
    </form>
</div></div>
<div class="k-card fade-up d1">
    <div class="k-card-header"><div class="k-card-title"><div class="icon-wrap" style="background:var(--accent-soft);"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" style="color:var(--accent);"><path stroke-linecap="round" stroke-linejoin="round" d="M16.5 6v.75m0 3v.75m0 3v.75m0 3V18m-9-5.25h5.25M7.5 15h3M3.375 5.25c-.621 0-1.125.504-1.125 1.125v3.026a2.999 2.999 0 010 5.198v3.026c0 .621.504 1.125 1.125 1.125h17.25c.621 0 1.125-.504 1.125-1.125v-3.026a2.999 2.999 0 010-5.198V6.375c0-.621-.504-1.125-1.125-1.125H3.375z"/></svg></div>Daftar Pemesanan</div>
    <span style="font-size:12px;color:var(--text-muted);"><?php echo e($pemesanan->total()); ?> transaksi</span></div>
    <div style="overflow-x:auto;"><table class="k-table">
        <thead><tr><th>#ID</th><th>Penumpang</th><th>Kereta & Rute</th><th>Tanggal</th><th>Tiket</th><th>Status</th><th>Aksi</th></tr></thead>
        <tbody>
            <?php $__empty_1 = true; $__currentLoopData = $pemesanan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
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
                                 style="width:34px;height:34px;border-radius:9px;object-fit:cover;border:1px solid var(--border);flex-shrink:0;">
                        <?php else: ?>
                            <div style="width:34px;height:34px;border-radius:9px;background:var(--bg-surface3);border:1px solid var(--border);display:flex;align-items:center;justify-content:center;font-size:12px;font-weight:700;color:var(--text-secondary);flex-shrink:0;"><?php echo e($initials); ?></div>
                        <?php endif; ?>
                        <div>
                            <div style="font-weight:600;font-size:13px;"><?php echo e($p->penumpang->nama_penumpang); ?></div>
                            <div style="font-size:11px;color:var(--text-muted);"><?php echo e($p->user->name ?? '-'); ?></div>
                        </div>
                    </div>
                </td>
                <td><div style="font-weight:600;font-size:13px;"><?php echo e($p->jadwal->kereta->nama_kereta); ?></div><div class="route-wrap" style="margin-top:2px;"><span style="font-size:11px;color:var(--text-muted);"><?php echo e($p->jadwal->stasiun_asal); ?></span><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" style="width:11px;height:11px;"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"/></svg><span style="font-size:11px;color:var(--text-muted);"><?php echo e($p->jadwal->stasiun_tujuan); ?></span></div></td>
                <td style="font-size:13px;"><?php echo e($p->tanggal_pesan->format('d M Y')); ?></td>
                <td><span class="badge-count <?php echo e($p->jumlah_tiket>2?'high':'low'); ?>"><?php echo e($p->jumlah_tiket); ?> tiket</span></td>
                <td><span class="badge-count <?php echo e($p->status=='confirmed'?'low':($p->status=='cancelled'?'high':'')); ?>" style="<?php echo e($p->status=='pending'?'background:var(--gold-soft);color:var(--gold);border:1px solid rgba(200,149,42,.25);':''); ?>"><?php echo e($p->status); ?></span></td>
                <td><div style="display:flex;gap:5px;">
                    <a href="<?php echo e(route('admin.pemesanan.show',$p->id_pemesanan)); ?>" class="btn-icon view"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.964-7.178z"/><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/></svg></a>
                    <form id="del-pm-<?php echo e($p->id_pemesanan); ?>" action="<?php echo e(route('admin.pemesanan.destroy',$p->id_pemesanan)); ?>" method="POST" style="display:inline;"><?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?><button type="button" class="btn-icon delete" onclick="confirmDelete('del-pm-<?php echo e($p->id_pemesanan); ?>')"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0"/></svg></button></form>
                </div></td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <tr><td colspan="7" style="text-align:center;color:var(--text-muted);padding:40px;">Belum ada pemesanan</td></tr>
            <?php endif; ?>
        </tbody>
    </table></div>
    <?php if($pemesanan->hasPages()): ?><div class="k-card-body" style="padding:14px 18px;"><?php echo e($pemesanan->appends(['search'=>$search,'filter_tiket'=>$filterTiket])->links()); ?></div><?php endif; ?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\rizki\Pictures\INFOKOM-REACT\Laravel\kai_project_website\resources\views/admin/pemesanan/index.blade.php ENDPATH**/ ?>