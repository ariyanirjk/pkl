<?= $this->extend('Layout/Header'); ?>
<?= $this->section('Content'); ?>

<div class="container mt-4">

    <!-- Notifikasi -->
    <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success"><?= session()->getFlashdata('success'); ?></div>
    <?php elseif (session()->getFlashdata('error')): ?>
        <div class="alert alert-danger"><?= session()->getFlashdata('error'); ?></div>
    <?php endif; ?>

    <!-- Tombol Tambah Data -->
    <button class="btn btn-primary mb-3" onclick="openModal()">Tambah Perjalanan</button>

    <!-- Tabel Data Perjalanan Dinas -->
    <div class="card">
        <div class="card-body">
            <table class="table table-striped table-bordered text-center">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Lokasi</th>
                        <th>Tgl Mulai</th>
                        <th>Tgl Selesai</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    <?php foreach ($perjalanan as $p): ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= esc($p['Lokasi']); ?></td>
                            <td><?= esc($p['Tgl_Mulai']); ?></td>
                            <td><?= esc($p['Tgl_Selesai']); ?></td>
                            <td>
                                <span class="badge <?= $p['status'] == 'Selesai' ? 'bg-success' : ($p['status'] == 'Proses' ? 'bg-warning text-dark' : 'bg-danger'); ?>">
                                    <?= esc($p['status']); ?>
                                </span>
                            </td>
                            <td>
                                <button class="btn btn-sm btn-warning" onclick="editPerjalanan(<?= $p['Id_Perjalanan']; ?>, '<?= esc($p['Lokasi']); ?>', '<?= esc($p['Tgl_Mulai']); ?>', '<?= esc($p['Tgl_Selesai']); ?>', '<?= esc($p['status']); ?>')">Edit</button>
                                <button class="btn btn-sm btn-danger" onclick="confirmDelete(<?= $p['Id_Perjalanan']; ?>)">Hapus</button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal Tambah/Edit Perjalanan -->
<div class="modal fade" id="modalPerjalanan" tabindex="-1" aria-labelledby="modalPerjalananLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalPerjalananLabel">Tambah Perjalanan Dinas</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="perjalananForm" action="<?= base_url('/PerjalananDinas/store'); ?>" method="post">
                <?= csrf_field(); ?>
                <div class="modal-body">
                    <input type="hidden" id="Id_Perjalanan" name="Id_Perjalanan">

                    <div class="mb-3">
                        <label class="form-label">Lokasi</label>
                        <input type="text" class="form-control" id="Lokasi" name="Lokasi" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Tanggal Mulai</label>
                        <input type="date" class="form-control" id="Tgl_Mulai" name="Tgl_Mulai" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Tanggal Selesai</label>
                        <input type="date" class="form-control" id="Tgl_Selesai" name="Tgl_Selesai" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Status</label>
                        <select class="form-control" id="Status" name="status">
                            <option value="Belum Diserahkan">Belum Diserahkan</option>
                            <option value="Proses">Proses</option>
                            <option value="Selesai">Selesai</option>
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
    function openModal() {
        document.getElementById('perjalananForm').reset();
        document.getElementById('modalPerjalananLabel').innerText = 'Tambah Perjalanan Dinas';
        document.getElementById('perjalananForm').action = '/PerjalananDinas/store';
        new bootstrap.Modal(document.getElementById('modalPerjalanan')).show();
    }

    function editPerjalanan(id, lokasi, tglMulai, tglSelesai, status) {
        document.getElementById('Id_Perjalanan').value = id;
        document.getElementById('Lokasi').value = lokasi;
        document.getElementById('Tgl_Mulai').value = tglMulai;
        document.getElementById('Tgl_Selesai').value = tglSelesai;
        document.getElementById('Status').value = status;

        document.getElementById('modalPerjalananLabel').innerText = 'Edit Perjalanan Dinas';
        document.getElementById('perjalananForm').action = '/PerjalananDinas/update/' + id;
        
        new bootstrap.Modal(document.getElementById('modalPerjalanan')).show();
    }

    function confirmDelete(id) {
        if (confirm('Apakah Anda yakin ingin menghapus data ini?')) {
            location.href = '/PerjalananDinas/delete/' + id;
        }
    }
</script>

<?= $this->endSection(); ?>
