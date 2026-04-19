<?php $__env->startSection('title','Data Kereta'); ?>
<?php $__env->startSection('breadcrumb','Kereta'); ?>
<?php $__env->startSection('content'); ?>
<div class="page-header d-flex align-items-center justify-content-between flex-wrap gap-3">
    <div><h1 class="page-title">Armada <span>Kereta</span></h1><p class="page-subtitle">Kelola data kereta dan kelasnya</p></div>
    <a href="<?php echo e(route('admin.kereta.create')); ?>" class="btn-primary">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15"/></svg>
        Tambah Kereta
    </a>
</div>

<div class="k-card mb-4 fade-up">
    <div class="k-card-body" style="padding:14px 18px;">
        <form method="GET" action="<?php echo e(route('admin.kereta.index')); ?>">
            <div class="row g-2 align-items-center">
                <div class="col-md-8"><div class="search-wrap"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z"/></svg><input type="text" name="search" value="<?php echo e($search); ?>" placeholder="Cari nama kereta atau kelas..." class="form-input"></div></div>
                <div class="col-md-2"><button type="submit" class="btn-primary w-100 justify-content-center">Cari</button></div>
                <div class="col-md-2"><a href="<?php echo e(route('admin.kereta.index')); ?>" class="btn-secondary w-100 justify-content-center">Reset</a></div>
            </div>
        </form>
    </div>
</div>

<div class="row g-3 fade-up d1">
    <?php $__empty_1 = true; $__currentLoopData = $kereta; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
    <div class="col-md-6 col-xl-4">
        <div class="k-card h-100" style="transition:transform .2s,border-color .2s;" onmouseover="this.style.transform='translateY(-3px)';this.style.borderColor='rgba(255,255,255,.12)'" onmouseout="this.style.transform='translateY(0)';this.style.borderColor='var(--border)'">
            <div class="k-card-body">
                <div style="display:flex;align-items:flex-start;justify-content:space-between;margin-bottom:16px;">
                    <div style="width:46px;height:46px;border-radius:12px;display:flex;align-items:center;justify-content:center;
                        <?php echo e($k->kelas=='Eksekutif' ? 'background:var(--purple-soft);' : ($k->kelas=='Bisnis' ? 'background:var(--gold-soft);' : 'background:var(--green-soft);')); ?>">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8" style="width:22px;height:22px;<?php echo e($k->kelas=='Eksekutif' ? 'color:#a78bfa;' : ($k->kelas=='Bisnis' ? 'color:var(--gold);' : 'color:#4ade80;')); ?>"><path stroke-linecap="round" stroke-linejoin="round" d="M8.25 18.75a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m3 0h6m-9 0H3.375a1.125 1.125 0 01-1.125-1.125V14.25m16.5 4.5a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m3 0h1.125c.621 0 1.129-.504 1.09-1.124a17.902 17.902 0 00-3.213-9.193 2.056 2.056 0 00-1.58-.86H14.25M16.5 18.75h-2.25m0-11.177v-.958c0-.568-.422-1.048-.987-1.106a48.554 48.554 0 00-10.026 0 1.106 1.106 0 00-.987 1.106v7.635m12-6.677v6.677m0 4.5v-4.5m0 0h-12"/></svg>
                    </div>
                    <span class="badge-kelas <?php echo e(strtolower($k->kelas)); ?>"><?php echo e($k->kelas); ?></span>
                </div>
                <h3 style="font-family:var(--font-display);font-size:16px;font-weight:900;margin-bottom:4px;color:var(--text-primary);"><?php echo e($k->nama_kereta); ?></h3>
                <p style="font-size:12px;color:var(--text-muted);margin-bottom:16px;"><?php echo e($k->jadwal_count); ?> Jadwal Tersedia</p>
                <div style="height:1px;background:var(--border);margin-bottom:14px;"></div>
                <div style="display:flex;gap:7px;">
                    <a href="<?php echo e(route('admin.kereta.show',$k->id_kereta)); ?>" class="btn-icon view"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.964-7.178z"/><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/></svg></a>
                    <a href="<?php echo e(route('admin.kereta.edit',$k->id_kereta)); ?>" class="btn-icon edit"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931z"/></svg></a>
                    <form id="del-k-<?php echo e($k->id_kereta); ?>" action="<?php echo e(route('admin.kereta.destroy',$k->id_kereta)); ?>" method="POST" style="display:inline;">
                        <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                        <button type="button" class="btn-icon delete" onclick="confirmDelete('del-k-<?php echo e($k->id_kereta); ?>')"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0"/></svg></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
    <div class="col-12"><div class="k-card"><div class="k-card-body" style="text-align:center;color:var(--text-muted);padding:52px;">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5" style="width:44px;height:44px;margin:0 auto 14px;display:block;opacity:.3;"><path stroke-linecap="round" stroke-linejoin="round" d="M8.25 18.75a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m3 0h6m-9 0H3.375a1.125 1.125 0 01-1.125-1.125V14.25m16.5 4.5a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m3 0h1.125c.621 0 1.129-.504 1.09-1.124a17.902 17.902 0 00-3.213-9.193 2.056 2.056 0 00-1.58-.86H14.25M16.5 18.75h-2.25m0-11.177v-.958c0-.568-.422-1.048-.987-1.106a48.554 48.554 0 00-10.026 0 1.106 1.106 0 00-.987 1.106v7.635m12-6.677v6.677m0 4.5v-4.5m0 0h-12"/></svg>
        Belum ada data kereta. <a href="<?php echo e(route('admin.kereta.create')); ?>" style="color:var(--accent);font-weight:600;">Tambah Sekarang</a>
    </div></div></div>
    <?php endif; ?>
</div>
<?php if($kereta->hasPages()): ?><div class="k-card mt-3"><div class="k-card-body" style="padding:14px 18px;"><?php echo e($kereta->appends(['search'=>$search])->links()); ?></div></div><?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\rizki\Pictures\INFOKOM-REACT\uji coba\kereta_fixed\resources\views/admin/kereta/index.blade.php ENDPATH**/ ?>