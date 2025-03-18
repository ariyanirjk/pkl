<div class="container mt-5">
    <h1 class="mb-4"><?= $id_akun ? 'Edit Akun' : 'Tambah Akun' ?></h1>
    <form action="<?= site_url('akun/save' . ($id_akun ? '/' . $id_akun : '')) ?>" method="post">


        <div class="mb-3">
            <label for="Username" class="form-label">Username</label>
            <input type="text" class="form-control" id="Username" name="Username" value="<?= esc($akun['Username'] ?? '') ?>" required>
        </div>
        <div class="mb-3">
            <label for="Password" class="form-label">Password</label>
            <input type="password" class="form-control" id="Password" name="Password" <?= !$id_akun ? 'required' : '' ?>>
            <?php if ($id_akun): ?>
                <small class="text-muted">Kosongkan jika tidak ingin mengubah password.</small>
            <?php endif; ?>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="<?= site_url('akun') ?>" class="btn btn-secondary">Batal</a>
    </form>
</div>
