<?php $__env->startSection('title','Beranda'); ?>
<?php $__env->startSection('content'); ?>
<div class="mb-4">
    <h1 class="page-title">Selamat datang, <span><?php echo e(Auth::user()->name); ?></span></h1>
    <p class="page-sub">Pesan tiket kereta api dengan mudah dan cepat</p>
</div>

<div class="row g-3 mb-4">
    <div class="col-6 col-md-3">
        <div class="k-card"><div class="k-card-body">
            <div style="font-size:11px;font-weight:600;text-transform:uppercase;letter-spacing:.8px;color:var(--muted);margin-bottom:8px;">Total Pesanan</div>
            <div style="font-family:var(--display);font-size:30px;font-weight:900;"><?php echo e($totalPesanan); ?></div>
        </div></div>
    </div>
    <div class="col-6 col-md-3">
        <div class="k-card"><div class="k-card-body">
            <div style="font-size:11px;font-weight:600;text-transform:uppercase;letter-spacing:.8px;color:var(--muted);margin-bottom:8px;">Total Tiket</div>
            <div style="font-family:var(--display);font-size:30px;font-weight:900;color:var(--accent);"><?php echo e($totalTiket); ?></div>
        </div></div>
    </div>
</div>

<!-- Search Box -->
<div class="k-card mb-4" style="border-color:rgba(192,57,43,.2);background:linear-gradient(135deg,rgba(192,57,43,.06),transparent);">
    <div class="k-card-body">
        <h3 style="font-family:var(--display);font-size:16px;font-weight:900;margin-bottom:14px;">Cari Jadwal Kereta</h3>
        <form method="GET" action="<?php echo e(route('user.jadwal')); ?>">
            <div class="row g-3">
                <div class="col-md-3">
                    <div class="form-group" style="margin-bottom:0;">
                        <label class="form-label">Stasiun Asal</label>
                        <input type="text" name="asal" class="form-input" placeholder="cth: Jakarta">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group" style="margin-bottom:0;">
                        <label class="form-label">Stasiun Tujuan</label>
                        <input type="text" name="tujuan" class="form-input" placeholder="cth: Bandung">
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group" style="margin-bottom:0;">
                        <label class="form-label">Tanggal</label>
                        <input type="date" name="tanggal" class="form-input">
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group" style="margin-bottom:0;">
                        <label class="form-label">Kelas</label>
                        <select name="kelas" class="form-input">
                            <option value="">Semua Kelas</option>
                            <option value="Ekonomi">Ekonomi</option>
                            <option value="Bisnis">Bisnis</option>
                            <option value="Eksekutif">Eksekutif</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-2 d-flex align-items-end">
                    <button type="submit" class="btn-p w-100">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z"/></svg>
                        Cari
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="row g-3">
    <!-- Jadwal Terbaru -->
    <div class="col-lg-7">
        <div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:14px;">
            <h3 style="font-family:var(--display);font-size:16px;font-weight:900;">Jadwal Tersedia</h3>
            <a href="<?php echo e(route('user.jadwal')); ?>" style="font-size:12px;color:var(--accent);text-decoration:none;font-weight:600;">Lihat Semua</a>
        </div>
        <?php $__empty_1 = true; $__currentLoopData = $jadwalTerbaru; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $j): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <div class="jadwal-card mb-3">
            <div class="d-flex align-items-start justify-content-between">
                <div>
                    <div style="display:flex;align-items:center;gap:8px;margin-bottom:10px;">
                        <span style="font-weight:700;font-size:14px;"><?php echo e($j->kereta->nama_kereta); ?></span>
                        <span class="kelas-badge <?php echo e(strtolower($j->kereta->kelas)); ?>"><?php echo e($j->kereta->kelas); ?></span>
                    </div>
                    <div class="route-d">
                        <span class="stn"><?php echo e($j->stasiun_asal); ?></span>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"/></svg>
                        <span class="stn"><?php echo e($j->stasiun_tujuan); ?></span>
                    </div>
                    <div style="font-size:12px;color:var(--muted);margin-top:6px;"><?php echo e(\Carbon\Carbon::parse($j->tanggal_berangkat)->translatedFormat('d F Y')); ?></div>
                </div>
                <div style="text-align:right;">
                    <div class="time-chip mb-2"><?php echo e(\Carbon\Carbon::parse($j->jam_berangkat)->format('H:i')); ?></div>
                    <a href="<?php echo e(route('user.pesan', ['jadwal_id'=>$j->id_jadwal])); ?>" class="btn-p" style="padding:7px 14px;font-size:12px;">Pesan</a>
                </div>
            </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <div class="k-card"><div class="k-card-body" style="text-align:center;color:var(--muted);padding:30px;">Belum ada jadwal tersedia</div></div>
        <?php endif; ?>
    </div>

    <!-- Pesanan Terbaru -->
    <div class="col-lg-5">
        <div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:14px;">
            <h3 style="font-family:var(--display);font-size:16px;font-weight:900;">Pesanan Terbaru</h3>
            <a href="<?php echo e(route('user.tiket')); ?>" style="font-size:12px;color:var(--accent);text-decoration:none;font-weight:600;">Lihat Semua</a>
        </div>
        <?php $__empty_1 = true; $__currentLoopData = $pesananTerbaru; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <a href="<?php echo e(route('user.tiket.show',$p->id_pemesanan)); ?>" style="text-decoration:none;display:block;">
            <div class="k-card mb-3" style="transition:border-color .15s;" onmouseover="this.style.borderColor='rgba(255,255,255,.12)'" onmouseout="this.style.borderColor='var(--border)'">
                <div class="k-card-body">
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <span style="font-size:12px;font-weight:700;color:var(--muted);">#<?php echo e(str_pad($p->id_pemesanan,5,'0',STR_PAD_LEFT)); ?></span>
                        <span class="status-badge <?php echo e($p->status); ?>"><?php echo e($p->status); ?></span>
                    </div>
                    <div style="font-weight:600;font-size:13px;color:var(--text);"><?php echo e($p->jadwal->kereta->nama_kereta); ?></div>
                    <div style="font-size:12px;color:var(--muted);margin-top:2px;"><?php echo e($p->jadwal->stasiun_asal); ?> → <?php echo e($p->jadwal->stasiun_tujuan); ?></div>
                    <div style="display:flex;align-items:center;justify-content:space-between;margin-top:8px;">
                        <span style="font-size:11px;color:var(--muted);"><?php echo e($p->tanggal_pesan->format('d M Y')); ?></span>
                        <span style="font-size:12px;font-weight:600;color:var(--text);"><?php echo e($p->jumlah_tiket); ?> tiket</span>
                    </div>
                </div>
            </div>
        </a>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <div class="k-card"><div class="k-card-body" style="text-align:center;color:var(--muted);padding:30px;">Belum ada pesanan</div></div>
        <?php endif; ?>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.user', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\rizki\Pictures\INFOKOM-REACT\Laravel\kai_project_website\resources\views/user/dashboard.blade.php ENDPATH**/ ?>