<?= $this->extend('Layout/Header'); ?>
<?= $this->section('Content'); ?>

<div class="container mt-4">
    <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success"> <?= session()->getFlashdata('success'); ?> </div>
    <?php elseif (session()->getFlashdata('error')): ?>
        <div class="alert alert-danger"> <?= session()->getFlashdata('error'); ?> </div>
    <?php endif; ?>

    <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#modalTambah">Tambah Akun</button>

    <div class="card">
        <div class="card-body">
            <table class="table table-striped table-bordered text-center">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>ID Akun</th>
                        <th>Username</th>
                        <th>Password</th>
                        <th>Role</th> <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    <?php if (!empty($akun) && is_array($akun)) : ?>
                        <?php foreach ($akun as $row): ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= esc($row['Id_Akun']); ?></td>
                                <td><span class="truncate"><?= esc($row['Username']); ?></span></td>
                                <td>******</td>
                                <td><?= esc($row['Role']); ?></td> <td>
                                    <button class="btn btn-sm btn-warning" onclick="editAkun(<?= $row['Id_Akun']; ?>, '<?= esc($row['Username']); ?>', '<?= esc($row['Role']); ?>')">Edit</button>
                                    <button class="btn btn-sm btn-danger" onclick="confirmDelete(<?= $row['Id_Akun']; ?>)">Hapus</button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <tr>
                            <td colspan="6" class="text-center">Tidak ada data akun.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="modal fade" id="modalTambah" tabindex="-1" aria-labelledby="modalTambahLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTambahLabel">Tambah Akun</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('/akun/save'); ?>" method="post">
                <?= csrf_field(); ?>
                <div class="modal-body">
                    <input type="hidden" id="Id_Akun" name="Id_Akun">
                    <div class="mb-3">
                        <label for="Username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="Username" name="Username" required>
                    </div>
                    <div class="mb-3">
                        <label for="Password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="Password" name="Password">
                        <small class="text-muted d-none" id="passwordHelp">Kosongkan jika tidak ingin mengubah password.</small>
                    </div>
                    <div class="mb-3">
                        <label for="Role" class="form-label">Role</label>
                        <select class="form-select" id="Role" name="Role" required>
                            <option value="pegawai">Pegawai</option>
                            <option value="atasan">Atasan</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function confirmDelete(id) {
        if (confirm('Apakah Anda yakin ingin menghapus data ini?')) {
            location.href = '/akun/delete/' + id;
        }
    }

    function editAkun(id, username, role) { // Tambahkan role
        document.getElementById('Id_Akun').value = id;
        document.getElementById('Username').value = username;
        document.getElementById('Password').value = '';
        document.getElementById('Role').value = role; // set role value
        document.getElementById('passwordHelp').classList.remove('d-none');
        document.querySelector('form').action = '/akun/save/' + id;
        document.getElementById('modalTambahLabel').innerText = 'Edit Akun';
        new bootstrap.Modal(document.getElementById('modalTambah')).show();
    }
</script>

<?= $this->endSection(); ?>