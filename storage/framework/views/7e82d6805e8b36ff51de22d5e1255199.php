<?php $__env->startSection('title','Jadwal Kereta'); ?>
<?php $__env->startSection('breadcrumb','Jadwal'); ?>
<?php $__env->startSection('content'); ?>
<div class="page-header d-flex align-items-center justify-content-between flex-wrap gap-3">
    <div><h1 class="page-title">Jadwal <span>Keberangkatan</span></h1><p class="page-subtitle">Kelola jadwal perjalanan kereta api</p></div>
    <a href="<?php echo e(route('admin.jadwal.create')); ?>" class="btn-primary"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15"/></svg>Tambah Jadwal</a>
</div>
<div class="k-card mb-4 fade-up"><div class="k-card-body" style="padding:14px 18px;">
    <form method="GET" action="<?php echo e(route('admin.jadwal.index')); ?>">
        <div class="row g-2 align-items-center">
            <div class="col-md-5"><div class="search-wrap"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z"/></svg><input type="text" name="search" value="<?php echo e($search); ?>" placeholder="Cari stasiun..." class="form-input"></div></div>
            <div class="col-md-3"><input type="text" name="tujuan" value="<?php echo e($tujuan); ?>" placeholder="Filter tujuan (cth: Bandung)" class="form-input"></div>
            <div class="col-md-2"><button type="submit" class="btn-primary w-100 justify-content-center">Filter</button></div>
            <div class="col-md-2"><a href="<?php echo e(route('admin.jadwal.index')); ?>" class="btn-secondary w-100 justify-content-center">Reset</a></div>
        </div>
    </form>
</div></div>
<div class="k-card fade-up d1">
    <div class="k-card-header"><div class="k-card-title"><div class="icon-wrap" style="background:var(--gold-soft);"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" style="color:var(--gold);"><path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25"/></svg></div>Daftar Jadwal</div>
    <span style="font-size:12px;color:var(--text-muted);"><?php echo e($jadwal->total()); ?> jadwal</span></div>
    <div style="overflow-x:auto;"><table class="k-table">
        <thead><tr><th>#</th><th>Kereta</th><th>Rute</th><th>Tanggal</th><th>Jam</th><th>Pesanan</th><th>Aksi</th></tr></thead>
        <tbody>
            <?php $__empty_1 = true; $__currentLoopData = $jadwal; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $j): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <tr>
                <td style="color:var(--text-muted);font-size:12px;"><?php echo e($jadwal->firstItem()+$i); ?></td>
                <td><div style="font-weight:600;font-size:13px;"><?php echo e($j->kereta->nama_kereta); ?></div><span class="badge-kelas <?php echo e(strtolower($j->kereta->kelas)); ?>"><?php echo e($j->kereta->kelas); ?></span></td>
                <td><div class="route-wrap"><span class="station"><?php echo e($j->stasiun_asal); ?></span><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"/></svg><span class="station"><?php echo e($j->stasiun_tujuan); ?></span></div></td>
                <td style="font-size:13px;"><?php echo e(\Carbon\Carbon::parse($j->tanggal_berangkat)->format('d M Y')); ?></td>
                <td><div class="time-chip"><?php echo e(\Carbon\Carbon::parse($j->jam_berangkat)->format('H:i')); ?></div></td>
                <td><span class="badge-count <?php echo e($j->pemesanan_count>0?'low':'zero'); ?>"><?php echo e($j->pemesanan_count); ?> order</span></td>
                <td><div style="display:flex;gap:5px;">
                    <a href="<?php echo e(route('admin.jadwal.show',$j->id_jadwal)); ?>" class="btn-icon view"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.964-7.178z"/><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/></svg></a>
                    <a href="<?php echo e(route('admin.jadwal.edit',$j->id_jadwal)); ?>" class="btn-icon edit"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931z"/></svg></a>
                    <form id="del-j-<?php echo e($j->id_jadwal); ?>" action="<?php echo e(route('admin.jadwal.destroy',$j->id_jadwal)); ?>" method="POST" style="display:inline;"><?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?><button type="button" class="btn-icon delete" onclick="confirmDelete('del-j-<?php echo e($j->id_jadwal); ?>')"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0"/></svg></button></form>
                </div></td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <tr><td colspan="7" style="text-align:center;color:var(--text-muted);padding:40px;">Belum ada jadwal</td></tr>
            <?php endif; ?>
        </tbody>
    </table></div>
    <?php if($jadwal->hasPages()): ?><div class="k-card-body" style="padding:14px 18px;"><?php echo e($jadwal->appends(['search'=>$search,'tujuan'=>$tujuan])->links()); ?></div><?php endif; ?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\rizki\Pictures\INFOKOM-REACT\kai_new\resources\views/admin/jadwal/index.blade.php ENDPATH**/ ?>