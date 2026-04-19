<?php $__env->startSection('title','Edit Kereta'); ?>
<?php $__env->startSection('breadcrumb','Edit Kereta'); ?>
<?php $__env->startSection('content'); ?>
<div class="page-header"><div style="display:flex;align-items:center;gap:12px;">
    <a href="<?php echo e(route('admin.kereta.index')); ?>" class="btn-secondary" style="padding:8px 10px;"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18"/></svg></a>
    <div><h1 class="page-title">Edit <span>Kereta</span></h1><p class="page-subtitle"><?php echo e($kereta->nama_kereta); ?></p></div>
</div></div>
<div class="row justify-content-center"><div class="col-lg-6">
    <div class="k-card fade-up">
        <div class="k-card-header"><div class="k-card-title"><div class="icon-wrap" style="background:var(--gold-soft);"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" style="color:var(--gold);"><path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931z"/></svg></div>Edit Data Kereta</div></div>
        <div class="k-card-body">
            <form action="<?php echo e(route('admin.kereta.update',$kereta->id_kereta)); ?>" method="POST"><?php echo csrf_field(); ?> <?php echo method_field('PUT'); ?>
                <div class="form-group"><label class="form-label">Nama Kereta <span style="color:var(--accent)">*</span></label><input type="text" name="nama_kereta" value="<?php echo e(old('nama_kereta',$kereta->nama_kereta)); ?>" class="form-input" placeholder="cth: Argo Bromo Anggrek"></div>
                <div class="form-group"><label class="form-label">Kelas <span style="color:var(--accent)">*</span></label>
                    <select name="kelas" class="form-input">
                        <option value="Ekonomi" <?php echo e(old('kelas',$kereta->kelas)=='Ekonomi'?'selected':''); ?>>Ekonomi</option>
                        <option value="Bisnis" <?php echo e(old('kelas',$kereta->kelas)=='Bisnis'?'selected':''); ?>>Bisnis</option>
                        <option value="Eksekutif" <?php echo e(old('kelas',$kereta->kelas)=='Eksekutif'?'selected':''); ?>>Eksekutif</option>
                    </select></div>
                <div style="display:flex;gap:10px;margin-top:24px;">
                    <button type="submit" class="btn-primary"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>Perbarui</button>
                    <a href="<?php echo e(route('admin.kereta.index')); ?>" class="btn-secondary">Batal</a>
                </div>
            </form>
        </div>
    </div>
</div></div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\rizki\Pictures\INFOKOM-REACT\uji coba\kereta_fixed\resources\views/admin/kereta/edit.blade.php ENDPATH**/ ?>