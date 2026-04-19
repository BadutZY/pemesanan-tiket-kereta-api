<?php $__env->startSection('title','Profil'); ?>
<?php $__env->startPush('styles'); ?>
<style>
.photo-wrap{position:relative;width:100px;height:100px;margin:0 auto 20px;}
.photo-wrap img,.photo-init{width:100px;height:100px;border-radius:18px;object-fit:cover;border:2px solid var(--border);}
.photo-init{background:var(--accent);display:flex;align-items:center;justify-content:center;font-size:32px;font-weight:700;color:#fff;}
.photo-edit-btn{position:absolute;bottom:-8px;right:-8px;width:30px;height:30px;border-radius:8px;background:var(--surface3);border:1px solid var(--border);display:flex;align-items:center;justify-content:center;cursor:pointer;transition:background .15s;}
.photo-edit-btn:hover{background:var(--accent);}
.photo-edit-btn svg{width:14px;height:14px;color:var(--text);}
/* Password toggle */
.pw-wrap{position:relative;}
.pw-wrap .form-input{padding-right:42px;}
.pw-toggle{position:absolute;right:12px;top:50%;transform:translateY(-50%);background:none;border:none;cursor:pointer;color:var(--muted);padding:0;display:flex;align-items:center;transition:color .15s;}
.pw-toggle:hover{color:var(--text);}
.pw-toggle svg{width:16px;height:16px;}
/* Crop modal */
.crop-overlay{display:none;position:fixed;inset:0;background:rgba(0,0,0,.75);z-index:9999;align-items:center;justify-content:center;}
.crop-overlay.show{display:flex;}
.crop-modal{background:var(--surface);border:1px solid var(--border);border-radius:16px;padding:24px;width:400px;max-width:95vw;}
.crop-modal h4{font-family:var(--display);font-size:16px;font-weight:900;margin-bottom:16px;}
.crop-container{position:relative;width:100%;height:300px;background:#000;border-radius:10px;overflow:hidden;}
.crop-actions{display:flex;gap:8px;margin-top:16px;justify-content:flex-end;}
.remove-photo-btn{display:inline-flex;align-items:center;gap:6px;font-size:12px;color:var(--muted);background:none;border:none;cursor:pointer;font-family:var(--font);padding:0;margin-top:8px;transition:color .15s;}
.remove-photo-btn:hover{color:#f87171;}
.remove-photo-btn svg{width:13px;height:13px;}
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.6.1/cropper.min.css">
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
<div class="mb-4"><h1 class="page-title">Profil <span>Saya</span></h1><p class="page-sub">Kelola informasi akun Anda</p></div>
<div class="row g-3">
    <!-- LEFT: Photo card -->
    <div class="col-lg-4">
        <div class="k-card mb-3">
            <div class="k-card-body" style="text-align:center;padding:28px 20px;">
                <div class="photo-wrap">
                    <?php if($user->photo_profile): ?>
                        <img id="profilePhotoPreview" src="<?php echo e(Storage::url($user->photo_profile)); ?>?v=<?php echo e($user->updated_at->timestamp); ?>" alt="foto profil">
                    <?php else: ?>
                        <div class="photo-init" id="profilePhotoInit"><?php echo e(strtoupper(substr($user->name,0,2))); ?></div>
                        <img id="profilePhotoPreview" src="" alt="foto profil" style="display:none;width:100px;height:100px;border-radius:18px;object-fit:cover;border:2px solid var(--border);">
                    <?php endif; ?>
                    <div class="photo-edit-btn" title="Ganti Foto" onclick="document.getElementById('photoFileInput').click()">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M6.827 6.175A2.31 2.31 0 015.186 7.23c-.38.054-.757.112-1.134.175C2.999 7.58 2.25 8.507 2.25 9.574V18a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18V9.574c0-1.067-.75-1.994-1.802-2.169a47.865 47.865 0 00-1.134-.175 2.31 2.31 0 01-1.64-1.055l-.822-1.316a2.192 2.192 0 00-1.736-1.039 48.774 48.774 0 00-5.232 0 2.192 2.192 0 00-1.736 1.039l-.821 1.316z"/><path stroke-linecap="round" stroke-linejoin="round" d="M16.5 12.75a4.5 4.5 0 11-9 0 4.5 4.5 0 019 0zM18.75 10.5h.008v.008h-.008V10.5z"/></svg>
                    </div>
                </div>
                <div style="font-family:var(--display);font-size:17px;font-weight:900;margin-bottom:4px;"><?php echo e($user->name); ?></div>
                <div style="font-size:12px;color:var(--muted);margin-bottom:16px;"><?php echo e($user->email); ?></div>
                <?php if($user->photo_profile): ?>
                <form method="POST" action="<?php echo e(route('user.profil.remove-photo')); ?>">
                    <?php echo csrf_field(); ?>
                    <button type="submit" class="remove-photo-btn" onclick="return confirm('Hapus foto profil?')">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0"/></svg>
                        Hapus Foto
                    </button>
                </form>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <!-- RIGHT: Forms -->
    <div class="col-lg-8">
        <!-- Info form -->
        <div class="k-card mb-3">
            <div class="k-card-body">
                <h3 style="font-family:var(--display);font-size:15px;font-weight:900;margin-bottom:18px;">Informasi Pribadi</h3>
                
                <form method="POST" action="<?php echo e(route('user.profil.update')); ?>" enctype="multipart/form-data" id="profileForm">
                    <?php echo csrf_field(); ?>
                    <input type="file" id="photoFileInput" name="photo_profile" accept="image/jpeg,image/png,image/webp" style="display:none;">
                    <div class="form-group"><label class="form-label">Nama Lengkap</label><input type="text" name="name" value="<?php echo e($user->name); ?>" class="form-input" required></div>
                    <div class="form-group"><label class="form-label">Email</label><input type="email" value="<?php echo e($user->email); ?>" class="form-input" disabled style="opacity:.5;cursor:not-allowed;"><div style="font-size:11px;color:var(--muted);margin-top:5px;">Email tidak dapat diubah</div></div>
                    <div class="form-group"><label class="form-label">NIK</label><input type="text" name="nik" value="<?php echo e($user->nik); ?>" class="form-input" maxlength="16" placeholder="3201XXXXXXXXXXXX"></div>
                    <div class="form-group"><label class="form-label">No. HP</label><input type="text" name="no_hp" value="<?php echo e($user->no_hp); ?>" class="form-input"></div>
                    <button type="submit" class="btn-p"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>Simpan Perubahan</button>
                </form>
            </div>
        </div>
        <!-- Password form -->
        <div class="k-card">
            <div class="k-card-body">
                <h3 style="font-family:var(--display);font-size:15px;font-weight:900;margin-bottom:18px;">Ubah Password</h3>
                <form method="POST" action="<?php echo e(route('user.profil.password')); ?>">
                    <?php echo csrf_field(); ?>
                    <div class="form-group">
                        <label class="form-label">Password Saat Ini</label>
                        <div class="pw-wrap">
                            <input type="password" name="current_password" class="form-input" required>
                            <button type="button" class="pw-toggle" onclick="togglePw(this)"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z"/><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/></svg></button>
                        </div>
                        <?php $__errorArgs = ['current_password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div style="font-size:12px;color:#f87171;margin-top:4px;"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Password Baru</label>
                        <div class="pw-wrap">
                            <input type="password" name="password" class="form-input" required placeholder="Min. 8 karakter">
                            <button type="button" class="pw-toggle" onclick="togglePw(this)"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z"/><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/></svg></button>
                        </div>
                        <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div style="font-size:12px;color:#f87171;margin-top:4px;"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Konfirmasi Password Baru</label>
                        <div class="pw-wrap">
                            <input type="password" name="password_confirmation" class="form-input" required>
                            <button type="button" class="pw-toggle" onclick="togglePw(this)"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z"/><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/></svg></button>
                        </div>
                    </div>
                    <button type="submit" class="btn-s">Ubah Password</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Crop Modal -->
<div class="crop-overlay" id="cropOverlay">
    <div class="crop-modal">
        <h4>Sesuaikan Foto Profil</h4>
        <div class="crop-container">
            <img id="cropImage" src="" alt="crop">
        </div>
        <div style="font-size:11px;color:var(--muted);margin-top:8px;">Geser &amp; zoom untuk menyesuaikan foto</div>
        <div class="crop-actions">
            <button type="button" class="btn-s" onclick="cancelCrop()">Batal</button>
            <button type="button" class="btn-p" id="applyBtn" onclick="applyCrop()">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5"/></svg>
                Gunakan Foto
            </button>
        </div>
    </div>
</div>

<!-- Hidden form to upload cropped photo -->
<form method="POST" action="<?php echo e(route('user.profil.update')); ?>" enctype="multipart/form-data" id="photoUploadForm" style="display:none;">
    <?php echo csrf_field(); ?>
    <input type="hidden" name="name" value="<?php echo e($user->name); ?>">
    <input type="hidden" name="no_hp" value="<?php echo e($user->no_hp); ?>">
    <input type="hidden" name="nik" value="<?php echo e($user->nik); ?>">
    <input type="file" name="photo_profile" id="hiddenPhotoInput">
</form>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts'); ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.6.1/cropper.min.js"></script>
<script>
let cropper = null;
let originalFile = null;

// Password toggle
function togglePw(btn) {
    const input = btn.previousElementSibling;
    const isHidden = input.type === 'password';
    input.type = isHidden ? 'text' : 'password';
    btn.innerHTML = isHidden
        ? '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M3.98 8.223A10.477 10.477 0 001.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.45 10.45 0 0112 4.5c4.756 0 8.773 3.162 10.065 7.498a10.523 10.523 0 01-4.293 5.774M6.228 6.228L3 3m3.228 3.228l3.65 3.65m7.894 7.894L21 21m-3.228-3.228l-3.65-3.65m0 0a3 3 0 10-4.243-4.243m4.242 4.242L9.88 9.88"/></svg>'
        : '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z"/><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/></svg>';
}

// Photo crop
document.getElementById('photoFileInput').addEventListener('change', function(e) {
    const file = e.target.files[0];
    if (!file) return;
    originalFile = file;
    const reader = new FileReader();
    reader.onload = function(ev) {
        const img = document.getElementById('cropImage');
        img.src = ev.target.result;
        document.getElementById('cropOverlay').classList.add('show');
        if (cropper) { cropper.destroy(); cropper = null; }
        setTimeout(() => {
            cropper = new Cropper(img, {
                aspectRatio: 1,
                viewMode: 1,
                dragMode: 'move',
                autoCropArea: 1,
                restore: false,
                guides: false,
                center: false,
                highlight: false,
                cropBoxMovable: false,
                cropBoxResizable: false,
                toggleDragModeOnDblclick: false,
            });
        }, 100);
    };
    reader.readAsDataURL(file);
    this.value = '';
});

function applyCrop() {
    if (!cropper) return;
    document.getElementById('applyBtn').textContent = 'Memproses...';
    const canvas = cropper.getCroppedCanvas({ width: 400, height: 400 });
    canvas.toBlob(function(blob) {
        // Show preview immediately
        const preview = document.getElementById('profilePhotoPreview');
        const init = document.getElementById('profilePhotoInit');
        preview.src = URL.createObjectURL(blob);
        preview.style.display = '';
        if (init) init.style.display = 'none';

        // Transfer blob to hidden form's file input via DataTransfer
        const dt = new DataTransfer();
        dt.items.add(new File([blob], 'photo_profile.jpg', { type: 'image/jpeg' }));
        document.getElementById('hiddenPhotoInput').files = dt.files;

        // Submit hidden form
        document.getElementById('photoUploadForm').submit();
    }, 'image/jpeg', 0.88);
}

function cancelCrop() {
    document.getElementById('cropOverlay').classList.remove('show');
    if (cropper) { cropper.destroy(); cropper = null; }
}
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.user', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\rizki\Pictures\INFOKOM-REACT\uji coba\kereta_fixed\resources\views/user/profile.blade.php ENDPATH**/ ?>