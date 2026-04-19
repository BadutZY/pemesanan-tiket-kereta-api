<?php $__env->startSection('title','Detail Jadwal'); ?>
<?php $__env->startSection('breadcrumb','Detail Jadwal'); ?>
<?php $__env->startSection('content'); ?>
<div class="page-header"><div style="display:flex;align-items:center;gap:12px;">
    <a href="<?php echo e(route('admin.jadwal.index')); ?>" class="btn-secondary" style="padding:8px 10px;"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18"/></svg></a>
    <div><h1 class="page-title">Detail <span>Jadwal</span></h1><p class="page-subtitle">Info keberangkatan #<?php echo e($jadwal->id_jadwal); ?></p></div>
</div></div>
<div class="row g-3">
    <div class="col-lg-4 fade-up">
        <div class="k-card" style="padding:24px;">
            <div class="info-row"><div class="info-lbl">Kereta</div><div class="info-val" style="font-weight:700;"><?php echo e($jadwal->kereta->nama_kereta); ?></div></div>
            <div class="info-row"><div class="info-lbl">Kelas</div><div class="info-val"><span class="badge-kelas <?php echo e(strtolower($jadwal->kereta->kelas)); ?>"><?php echo e($jadwal->kereta->kelas); ?></span></div></div>
            <div class="info-row"><div class="info-lbl">Asal</div><div class="info-val"><?php echo e($jadwal->stasiun_asal); ?></div></div>
            <div class="info-row"><div class="info-lbl">Tujuan</div><div class="info-val"><?php echo e($jadwal->stasiun_tujuan); ?></div></div>
            <div class="info-row"><div class="info-lbl">Tanggal</div><div class="info-val"><?php echo e(\Carbon\Carbon::parse($jadwal->tanggal_berangkat)->format('d F Y')); ?></div></div>
            <div class="info-row"><div class="info-lbl">Jam</div><div class="info-val"><div class="time-chip" style="display:inline-flex;"><?php echo e(\Carbon\Carbon::parse($jadwal->jam_berangkat)->format('H:i')); ?> WIB</div></div></div>
        </div>
    </div>
    <div class="col-lg-8 fade-up d1">
        <div class="k-card">
            <div class="k-card-header"><div class="k-card-title">Daftar Pemesanan</div><span style="font-size:11px;font-weight:600;background:var(--bg-surface2);color:var(--text-muted);padding:3px 9px;border-radius:5px;border:1px solid var(--border);"><?php echo e($jadwal->pemesanan->count()); ?></span></div>
            <div style="overflow-x:auto;"><table class="k-table">
                <thead><tr><th>Penumpang</th><th>Tanggal Pesan</th><th>Tiket</th><th>Status</th></tr></thead>
                <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $jadwal->pemesanan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                        <td><div style="font-weight:600;font-size:13px;"><?php echo e($p->penumpang->nama_penumpang); ?></div><div style="font-size:11px;color:var(--text-muted);"><?php echo e($p->penumpang->no_hp); ?></div></td>
                        <td style="font-size:13px;"><?php echo e($p->tanggal_pesan->format('d M Y')); ?></td>
                        <td><span class="badge-count <?php echo e($p->jumlah_tiket>2?'high':'low'); ?>"><?php echo e($p->jumlah_tiket); ?> tiket</span></td>
                        <td><span class="badge-count <?php echo e($p->status=='confirmed'?'low':($p->status=='cancelled'?'high':'')); ?>" style="<?php echo e($p->status=='pending'?'background:var(--gold-soft);color:var(--gold);border:1px solid rgba(200,149,42,.25);':''); ?>"><?php echo e($p->status); ?></span></td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr><td colspan="4" style="text-align:center;color:var(--text-muted);padding:28px;">Belum ada pemesanan</td></tr>
                    <?php endif; ?>
                </tbody>
            </table></div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\rizki\Pictures\INFOKOM-REACT\uji coba\kereta_api_updated\kereta_fixed\resources\views/admin/jadwal/show.blade.php ENDPATH**/ ?>