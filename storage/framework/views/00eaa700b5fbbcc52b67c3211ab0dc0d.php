<?php $__env->startSection('title','Data Penumpang'); ?>
<?php $__env->startSection('breadcrumb','Penumpang'); ?>
<?php $__env->startSection('content'); ?>
<div class="page-header d-flex align-items-center justify-content-between flex-wrap gap-3">
    <div><h1 class="page-title">Data <span>Penumpang</span></h1><p class="page-subtitle">Daftar penumpang yang pernah memesan tiket</p></div>
</div>
<div class="k-card mb-4 fade-up"><div class="k-card-body" style="padding:14px 18px;">
    <form method="GET" action="<?php echo e(route('admin.penumpang.index')); ?>">
        <div class="row g-2 align-items-center">
            <div class="col-md-8"><div class="search-wrap"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z"/></svg><input type="text" name="search" value="<?php echo e($search); ?>" placeholder="Cari nama, NIK, atau HP..." class="form-input"></div></div>
            <div class="col-md-2"><button type="submit" class="btn-primary w-100 justify-content-center">Cari</button></div>
            <div class="col-md-2"><a href="<?php echo e(route('admin.penumpang.index')); ?>" class="btn-secondary w-100 justify-content-center">Reset</a></div>
        </div>
    </form>
</div></div>
<div class="k-card fade-up d1">
    <div class="k-card-header"><div class="k-card-title"><div class="icon-wrap" style="background:var(--accent-soft);"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" style="color:var(--accent);"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0"/></svg></div>Daftar Penumpang</div>
    <span style="font-size:12px;color:var(--text-muted);"><?php echo e($penumpang->total()); ?> data</span></div>
    <div style="overflow-x:auto;"><table class="k-table">
        <thead><tr><th>#</th><th>Penumpang</th><th>NIK</th><th>No. HP</th><th>Pemesanan</th><th>Aksi</th></tr></thead>
        <tbody>
            <?php $__empty_1 = true; $__currentLoopData = $penumpang; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <?php
                $userPhoto = optional($p->pemesanan->first()?->user)->photo_profile;
                $initials  = strtoupper(substr($p->nama_penumpang, 0, 2));
            ?>
            <tr>
                <td style="color:var(--text-muted);font-size:12px;"><?php echo e($penumpang->firstItem()+$i); ?></td>
                <td>
                    <div style="display:flex;align-items:center;gap:10px;">
                        <?php if($userPhoto): ?>
                            <img src="<?php echo e(Storage::url($userPhoto)); ?>" alt="<?php echo e($p->nama_penumpang); ?>"
                                 style="width:36px;height:36px;border-radius:9px;object-fit:cover;border:1px solid var(--border);flex-shrink:0;">
                        <?php else: ?>
                            <div style="width:36px;height:36px;border-radius:9px;background:var(--bg-surface3);border:1px solid var(--border);display:flex;align-items:center;justify-content:center;font-size:12px;font-weight:700;color:var(--text-secondary);flex-shrink:0;"><?php echo e($initials); ?></div>
                        <?php endif; ?>
                        <div>
                            <div style="font-weight:600;"><?php echo e($p->nama_penumpang); ?></div>
                            <div style="font-size:11px;color:var(--text-muted);">ID #<?php echo e($p->id_penumpang); ?></div>
                        </div>
                    </div>
                </td>
                <td><span class="mono" style="background:var(--bg-surface2);padding:3px 8px;border-radius:5px;border:1px solid var(--border);font-size:12px;"><?php echo e($p->nik); ?></span></td>
                <td style="color:var(--text-secondary);"><?php echo e($p->no_hp); ?></td>
                <td><span class="badge-count <?php echo e($p->pemesanan_count>0?'low':'zero'); ?>"><?php echo e($p->pemesanan_count); ?> order</span></td>
                <td><div style="display:flex;gap:5px;">
                    <a href="<?php echo e(route('admin.penumpang.show',$p->id_penumpang)); ?>" class="btn-icon view"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.964-7.178z"/><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/></svg></a>
                </div></td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <tr><td colspan="6" style="text-align:center;color:var(--text-muted);padding:40px;">Belum ada data penumpang</td></tr>
            <?php endif; ?>
        </tbody>
    </table></div>
    <?php if($penumpang->hasPages()): ?><div class="k-card-body" style="padding:14px 18px;"><?php echo e($penumpang->appends(['search'=>$search])->links()); ?></div><?php endif; ?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\rizki\Pictures\INFOKOM-REACT\pemesanan-tiket-kereta-laravel\resources\views/admin/penumpang/index.blade.php ENDPATH**/ ?>