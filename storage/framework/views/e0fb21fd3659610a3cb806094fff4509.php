<?php $__env->startSection('title','Detail Pemesanan'); ?>
<?php $__env->startSection('breadcrumb','Detail Pemesanan'); ?>
<?php $__env->startSection('content'); ?>
<div class="page-header"><div style="display:flex;align-items:center;gap:12px;">
    <a href="<?php echo e(route('admin.pemesanan.index')); ?>" class="btn-secondary" style="padding:8px 10px;"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18"/></svg></a>
    <div><h1 class="page-title">Detail <span>Pemesanan</span></h1><p class="page-subtitle">#<?php echo e($pemesanan->id_pemesanan); ?></p></div>
</div></div>
<div class="row justify-content-center"><div class="col-lg-7">
    <div class="k-card fade-up" style="border-color:rgba(192,57,43,.15);">
        <div style="background:var(--accent);padding:22px 26px;">
            <div style="font-size:10px;text-transform:uppercase;letter-spacing:1.5px;color:rgba(255,255,255,.7);margin-bottom:4px;">E-Ticket Admin View</div>
            <div style="font-family:var(--font-display);font-size:20px;font-weight:900;color:#fff;">#<?php echo e(str_pad($pemesanan->id_pemesanan,5,'0',STR_PAD_LEFT)); ?></div>
            <div style="margin-top:8px;"><span class="badge-count <?php echo e($pemesanan->status=='confirmed'?'low':($pemesanan->status=='cancelled'?'high':'')); ?>" style="<?php echo e($pemesanan->status=='pending'?'background:rgba(200,149,42,.2);color:var(--gold);':''); ?>"><?php echo e(strtoupper($pemesanan->status)); ?></span></div>
        </div>
        <div class="k-card-body">
            <div class="info-row"><div class="info-lbl">Penumpang</div><div class="info-val" style="font-weight:700;"><?php echo e($pemesanan->penumpang->nama_penumpang); ?></div></div>
            <div class="info-row"><div class="info-lbl">User Akun</div><div class="info-val"><?php echo e($pemesanan->user->name ?? 'Guest'); ?> <span style="color:var(--text-muted);font-size:12px;">(<?php echo e($pemesanan->user->email ?? '-'); ?>)</span></div></div>
            <div class="info-row"><div class="info-lbl">Kereta</div><div class="info-val"><?php echo e($pemesanan->jadwal->kereta->nama_kereta); ?> — <span class="badge-kelas <?php echo e(strtolower($pemesanan->jadwal->kereta->kelas)); ?>"><?php echo e($pemesanan->jadwal->kereta->kelas); ?></span></div></div>
            <div class="info-row"><div class="info-lbl">Rute</div><div class="info-val"><div class="route-wrap"><span class="station"><?php echo e($pemesanan->jadwal->stasiun_asal); ?></span><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"/></svg><span class="station"><?php echo e($pemesanan->jadwal->stasiun_tujuan); ?></span></div></div></div>
            <div class="info-row"><div class="info-lbl">Tanggal Berangkat</div><div class="info-val"><?php echo e(\Carbon\Carbon::parse($pemesanan->jadwal->tanggal_berangkat)->format('d F Y')); ?> <div class="time-chip" style="display:inline-flex;margin-left:8px;"><?php echo e(\Carbon\Carbon::parse($pemesanan->jadwal->jam_berangkat)->format('H:i')); ?></div></div></div>
            <div class="info-row"><div class="info-lbl">Tanggal Pesan</div><div class="info-val"><?php echo e($pemesanan->tanggal_pesan->format('d F Y')); ?></div></div>
            <div class="info-row"><div class="info-lbl">Jumlah Tiket</div><div class="info-val" style="font-family:var(--font-display);font-size:22px;font-weight:900;"><?php echo e($pemesanan->jumlah_tiket); ?>x</div></div>
        </div>
    </div>
</div></div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\rizki\Pictures\INFOKOM-REACT\uji coba\kereta_api_updated\kereta_fixed\resources\views/admin/pemesanan/show.blade.php ENDPATH**/ ?>