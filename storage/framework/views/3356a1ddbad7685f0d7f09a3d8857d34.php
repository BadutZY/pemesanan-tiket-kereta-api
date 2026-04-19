<?php $__env->startSection('title','Pengguna'); ?>
<?php $__env->startSection('breadcrumb','Pengguna'); ?>
<?php $__env->startSection('content'); ?>
<div class="page-header d-flex align-items-center justify-content-between flex-wrap gap-3">
    <div><h1 class="page-title">Data <span>Pengguna</span></h1><p class="page-subtitle">Daftar akun pengguna yang terdaftar. Admin tidak dapat mengubah data akun pengguna.</p></div>
</div>
<div style="background:rgba(200,149,42,.08);border:1px solid rgba(200,149,42,.2);border-radius:10px;padding:12px 16px;margin-bottom:20px;display:flex;align-items:center;gap:10px;font-size:13px;color:var(--gold);">
    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" style="width:16px;height:16px;flex-shrink:0;"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z"/></svg>
    Halaman ini hanya untuk melihat data pengguna. Admin tidak dapat mengubah password, email, atau data akun pengguna.
</div>
<div class="k-card mb-4 fade-up"><div class="k-card-body" style="padding:14px 18px;">
    <form method="GET" action="<?php echo e(route('admin.users.index')); ?>">
        <div class="row g-2 align-items-center">
            <div class="col-md-8"><div class="search-wrap"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z"/></svg><input type="text" name="search" value="<?php echo e($search); ?>" placeholder="Cari nama atau email..." class="form-input"></div></div>
            <div class="col-md-2"><button type="submit" class="btn-primary w-100 justify-content-center">Cari</button></div>
            <div class="col-md-2"><a href="<?php echo e(route('admin.users.index')); ?>" class="btn-secondary w-100 justify-content-center">Reset</a></div>
        </div>
    </form>
</div></div>
<div class="k-card fade-up d1">
    <div class="k-card-header"><div class="k-card-title"><div class="icon-wrap" style="background:var(--purple-soft);"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" style="color:#a78bfa;"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z"/></svg></div>Daftar Pengguna</div>
    <span style="font-size:12px;color:var(--text-muted);"><?php echo e($users->total()); ?> pengguna</span></div>
    <div style="overflow-x:auto;"><table class="k-table">
        <thead><tr><th>#</th><th>Pengguna</th><th>NIK</th><th>No. HP</th><th>Pemesanan</th><th>Detail</th></tr></thead>
        <tbody>
            <?php $__empty_1 = true; $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $u): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <tr>
                <td style="color:var(--text-muted);font-size:12px;"><?php echo e($users->firstItem()+$i); ?></td>
                <td>
                    <div style="display:flex;align-items:center;gap:10px;">
                        <?php if($u->photo_profile): ?>
                            <img src="<?php echo e(Storage::url($u->photo_profile)); ?>" alt="<?php echo e($u->name); ?>"
                                 style="width:36px;height:36px;border-radius:9px;object-fit:cover;border:1px solid rgba(91,63,166,.25);flex-shrink:0;">
                        <?php else: ?>
                            <div style="width:36px;height:36px;border-radius:9px;background:var(--purple-soft);border:1px solid rgba(91,63,166,.25);display:flex;align-items:center;justify-content:center;font-size:12px;font-weight:700;color:#a78bfa;flex-shrink:0;"><?php echo e(strtoupper(substr($u->name,0,2))); ?></div>
                        <?php endif; ?>
                        <div>
                            <div style="font-weight:600;"><?php echo e($u->name); ?></div>
                            <div style="font-size:11px;color:var(--text-muted);"><?php echo e($u->email); ?></div>
                        </div>
                    </div>
                </td>
                <td><span class="mono" style="background:var(--bg-surface2);padding:3px 8px;border-radius:5px;border:1px solid var(--border);font-size:11px;"><?php echo e($u->nik ?? '-'); ?></span></td>
                <td style="color:var(--text-secondary);font-size:13px;"><?php echo e($u->no_hp ?? '-'); ?></td>
                <td><span class="badge-count <?php echo e($u->pemesanan_count>0?'low':'zero'); ?>"><?php echo e($u->pemesanan_count); ?> order</span></td>
                <td><a href="<?php echo e(route('admin.users.show',$u->id)); ?>" class="btn-icon view"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.964-7.178z"/><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/></svg></a></td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <tr><td colspan="6" style="text-align:center;color:var(--text-muted);padding:40px;">Belum ada pengguna</td></tr>
            <?php endif; ?>
        </tbody>
    </table></div>
    <?php if($users->hasPages()): ?><div class="k-card-body" style="padding:14px 18px;"><?php echo e($users->appends(['search'=>$search])->links()); ?></div><?php endif; ?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\rizki\Pictures\INFOKOM-REACT\pemesanan-tiket-kereta-laravel\resources\views/admin/users/index.blade.php ENDPATH**/ ?>