<?php $__env->startSection('title','Detail Pengguna'); ?>
<?php $__env->startSection('breadcrumb','Detail Pengguna'); ?>
<?php $__env->startSection('content'); ?>
<div class="page-header"><div style="display:flex;align-items:center;gap:12px;">
    <a href="<?php echo e(route('admin.users.index')); ?>" class="btn-secondary" style="padding:8px 10px;"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18"/></svg></a>
    <div><h1 class="page-title">Detail <span>Pengguna</span></h1><p class="page-subtitle"><?php echo e($user->name); ?></p></div>
</div></div>
<div class="row g-3">
    <div class="col-lg-4 fade-up">
        <div class="k-card" style="padding:28px;text-align:center;">
            <?php if($user->photo_profile): ?>
                <img src="<?php echo e(Storage::disk('public')->url($user->photo_profile)); ?>" alt="foto <?php echo e($user->name); ?>"
                     style="width:80px;height:80px;border-radius:16px;object-fit:cover;border:2px solid var(--border);margin:0 auto 16px;display:block;">
            <?php else: ?>
                <div style="width:80px;height:80px;border-radius:16px;background:var(--purple-soft);border:1px solid rgba(91,63,166,.25);display:flex;align-items:center;justify-content:center;font-size:26px;font-weight:700;color:#a78bfa;margin:0 auto 16px;"><?php echo e(strtoupper(substr($user->name,0,2))); ?></div>
            <?php endif; ?>
            <h3 style="font-family:var(--font-display);font-size:18px;font-weight:900;margin-bottom:6px;"><?php echo e($user->name); ?></h3>
            <p style="color:var(--text-muted);font-size:12px;margin-bottom:16px;"><?php echo e($user->email); ?></p>
            <div style="background:rgba(200,149,42,.08);border:1px solid rgba(200,149,42,.2);border-radius:9px;padding:10px;font-size:12px;color:var(--muted,var(--text-muted));">Admin tidak dapat mengubah data akun pengguna</div>
        </div>
    </div>
    <div class="col-lg-8 fade-up d1">
        <div class="k-card mb-3">
            <div class="k-card-header"><div class="k-card-title">Informasi Akun</div></div>
            <div class="k-card-body">
                <div class="info-row"><div class="info-lbl">Nama</div><div class="info-val"><?php echo e($user->name); ?></div></div>
                <div class="info-row"><div class="info-lbl">Email</div><div class="info-val"><?php echo e($user->email); ?></div></div>
                <div class="info-row"><div class="info-lbl">NIK</div><div class="info-val"><?php echo e($user->nik ?? '-'); ?></div></div>
                <div class="info-row"><div class="info-lbl">No. HP</div><div class="info-val"><?php echo e($user->no_hp ?? '-'); ?></div></div>
                <div class="info-row"><div class="info-lbl">Foto Profil</div><div class="info-val"><?php echo e($user->photo_profile ? 'Sudah diunggah' : 'Belum ada foto'); ?></div></div>
                <div class="info-row"><div class="info-lbl">Terdaftar</div><div class="info-val"><?php echo e($user->created_at->format('d F Y, H:i')); ?></div></div>
            </div>
        </div>
        <div class="k-card fade-up d2">
            <div class="k-card-header"><div class="k-card-title">Riwayat Pemesanan</div><span style="font-size:11px;font-weight:600;background:var(--bg-surface2);color:var(--text-muted);padding:3px 9px;border-radius:5px;border:1px solid var(--border);"><?php echo e($user->pemesanan->count()); ?> order</span></div>
            <div style="overflow-x:auto;"><table class="k-table">
                <thead><tr><th>Kereta</th><th>Rute</th><th>Tanggal</th><th>Tiket</th><th>Status</th></tr></thead>
                <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $user->pemesanan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $o): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                        <td><div style="font-weight:600;font-size:13px;"><?php echo e($o->jadwal->kereta->nama_kereta); ?></div><span class="badge-kelas <?php echo e(strtolower($o->jadwal->kereta->kelas)); ?>"><?php echo e($o->jadwal->kereta->kelas); ?></span></td>
                        <td><div class="route-wrap"><span class="station" style="font-size:12px;"><?php echo e($o->jadwal->stasiun_asal); ?></span><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"/></svg><span class="station" style="font-size:12px;"><?php echo e($o->jadwal->stasiun_tujuan); ?></span></div></td>
                        <td style="font-size:12px;color:var(--text-muted);"><?php echo e($o->tanggal_pesan->format('d M Y')); ?></td>
                        <td><span class="badge-count <?php echo e($o->jumlah_tiket>2?'high':'low'); ?>"><?php echo e($o->jumlah_tiket); ?> tiket</span></td>
                        <td><span class="badge-count <?php echo e($o->status=='confirmed'?'low':($o->status=='cancelled'?'high':'')); ?>" style="<?php echo e($o->status=='pending'?'background:var(--gold-soft);color:var(--gold);':''); ?>"><?php echo e($o->status); ?></span></td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr><td colspan="5" style="text-align:center;color:var(--text-muted);padding:24px;">Belum ada pemesanan</td></tr>
                    <?php endif; ?>
                </tbody>
            </table></div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\rizki\Pictures\INFOKOM-REACT\kai_new\resources\views/admin/users/show.blade.php ENDPATH**/ ?>