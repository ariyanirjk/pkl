<?= $this->extend('Layout/Header'); ?>
<?= $this->section('Content'); ?>

<div class="container mt-4">
    <!-- Notifikasi -->
    <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success"> <?= session()->getFlashdata('success'); ?> </div>
    <?php elseif (session()->getFlashdata('error')): ?>
        <div class="alert alert-danger"> <?= session()->getFlashdata('error'); ?> </div>
    <?php endif; ?>

    <!-- Tombol Tambah Biaya -->
    <button class="btn btn-primary mb-3" onclick="openModal()">Tambah Biaya</button>

    <!-- Tabel Data Biaya -->
    <div class="card">
        <div class="card-body">
            <table class="table table-striped table-bordered text-center">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Jenis Biaya</th>
                        <th>Jumlah Biaya</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
    <?php $no = 1; ?>
    <?php foreach ($Biaya as $row): ?>
        <tr>
            <td><?= $no++; ?></td>
            <td><?= esc($row['Jenis_Biaya']); ?></td>
            <td>Rp <?= number_format($row['Jumlah_Biaya'], 0, ',', '.'); ?></td>
            <td>
                <button class="btn btn-sm btn-warning" 
                    onclick="editBiaya(<?= $row['Id_Biaya']; ?>, 
                        '<?= esc($row['Jenis_Biaya']); ?>', 
                        <?= $row['Jumlah_Biaya']; ?>)">
                    Edit
                </button>
                <button class="btn btn-sm btn-danger" 
                    onclick="confirmDelete(<?= $row['Id_Biaya']; ?>)">
                    Hapus
                </button>
            </td>
        </tr>
    <?php endforeach; ?>
</tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal Tambah/Edit Biaya -->
<div class="modal fade" id="modalBiaya" tabindex="-1" aria-labelledby="modalBiayaLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalBiayaLabel">Tambah Biaya</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="biayaForm" action="<?= site_url('Biaya/update') ?>" method="post">

                <?= csrf_field(); ?>
                <div class="modal-body">
                    <input type="hidden" id="Id_Biaya" name="Id_Biaya">
                    
                    <div class="mb-3">
                        <label class="form-label">Jenis Biaya</label>
                        <input type="text" class="form-control" id="Jenis_Biaya" name="Jenis_Biaya" required>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Jumlah Biaya</label>
                        <input type="number" class="form-control" id="Jumlah_Biaya" name="Jumlah_Biaya" required>
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
        document.getElementById('biayaForm').reset();
        document.getElementById('modalBiayaLabel').innerText = 'Tambah Biaya';
        document.getElementById('biayaForm').action = '/Biaya/store';
        new bootstrap.Modal(document.getElementById('modalBiaya')).show();
    }

    function editBiaya(id, jenis, jumlah) {
        document.getElementById('Id_Biaya').value = id;
        document.getElementById('Jenis_Biaya').value = jenis;
        document.getElementById('Jumlah_Biaya').value = jumlah;

        document.getElementById('modalBiayaLabel').innerText = 'Edit Biaya';
        document.getElementById('biayaForm').action = '/Biaya/update/' + id;
        
        new bootstrap.Modal(document.getElementById('modalBiaya')).show();
    }

    function confirmDelete(id) {
        if (confirm('Apakah Anda yakin ingin menghapus data ini?')) {
            location.href = '/Biaya/delete/' + id;
        }
    }
</script>

<?= $this->endSection(); ?>
