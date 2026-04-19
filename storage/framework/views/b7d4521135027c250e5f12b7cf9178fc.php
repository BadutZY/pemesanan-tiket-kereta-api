<?php $__env->startSection('title','Edit Jadwal'); ?>
<?php $__env->startSection('breadcrumb','Edit Jadwal'); ?>
<?php $__env->startSection('content'); ?>
<div class="page-header"><div style="display:flex;align-items:center;gap:12px;">
    <a href="<?php echo e(route('admin.jadwal.index')); ?>" class="btn-secondary" style="padding:8px 10px;"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18"/></svg></a>
    <div><h1 class="page-title">Edit <span>Jadwal</span></h1><p class="page-subtitle">Perbarui jadwal keberangkatan</p></div>
</div></div>
<div class="row justify-content-center"><div class="col-lg-7">
    <div class="k-card fade-up"><div class="k-card-header"><div class="k-card-title"><div class="icon-wrap" style="background:var(--gold-soft);"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" style="color:var(--gold);"><path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931z"/></svg></div>Edit Jadwal</div></div>
        <div class="k-card-body">
            <form action="<?php echo e(route('admin.jadwal.update',$jadwal->id_jadwal)); ?>" method="POST"><?php echo csrf_field(); ?> <?php echo method_field('PUT'); ?>
                <div class="form-group"><label class="form-label">Kereta <span style="color:var(--accent)">*</span></label>
                    <select name="id_kereta" class="form-input"><?php $__currentLoopData = $kereta; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><option value="<?php echo e($k->id_kereta); ?>" <?php echo e(old('id_kereta',$jadwal->id_kereta)==$k->id_kereta?'selected':''); ?>><?php echo e($k->nama_kereta); ?> (<?php echo e($k->kelas); ?>)</option><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></select></div>
                <div class="row g-3">
                    <div class="col-md-6"><div class="form-group"><label class="form-label">Stasiun Asal</label><input type="text" name="stasiun_asal" value="<?php echo e(old('stasiun_asal',$jadwal->stasiun_asal)); ?>" class="form-input"></div></div>
                    <div class="col-md-6"><div class="form-group"><label class="form-label">Stasiun Tujuan</label><input type="text" name="stasiun_tujuan" value="<?php echo e(old('stasiun_tujuan',$jadwal->stasiun_tujuan)); ?>" class="form-input"></div></div>
                    <div class="col-md-6"><div class="form-group"><label class="form-label">Tanggal</label><input type="date" name="tanggal_berangkat" value="<?php echo e(old('tanggal_berangkat',$jadwal->tanggal_berangkat->format('Y-m-d'))); ?>" class="form-input"></div></div>
                    <div class="col-md-6"><div class="form-group"><label class="form-label">Jam</label><input type="time" name="jam_berangkat" value="<?php echo e(old('jam_berangkat',\Carbon\Carbon::parse($jadwal->jam_berangkat)->format('H:i'))); ?>" class="form-input"></div></div>
                </div>
                <div style="display:flex;gap:10px;margin-top:20px;">
                    <button type="submit" class="btn-primary"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>Perbarui</button>
                    <a href="<?php echo e(route('admin.jadwal.index')); ?>" class="btn-secondary">Batal</a>
                </div>
            </form>
        </div>
    </div>
</div></div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\rizki\Pictures\INFOKOM-REACT\uji coba\kereta_fixed\resources\views/admin/jadwal/edit.blade.php ENDPATH**/ ?>