<?= $this->extend('Layout/Header'); ?>
<?= $this->section('Content'); ?>

<div class="container mt-4">
    <!-- Notifikasi -->
    <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success"> <?= session()->getFlashdata('success'); ?> </div>
    <?php elseif (session()->getFlashdata('error')): ?>
        <div class="alert alert-danger"> <?= session()->getFlashdata('error'); ?> </div>
    <?php endif; ?>

    <!-- Tombol Tambah -->
    <button class="btn btn-primary mb-3" onclick="openModal()">Tambah Pengajuan</button>

    <!-- Tabel Data -->
    <div class="card">
        <div class="card-body">
            <table class="table table-striped table-bordered text-center">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Id Pegawai</th>
                        <th>Lokasi</th>
                        <th>Tgl Pengajuan</th>
                        <th>Tgl Mulai</th>
                        <th>Tgl Selesai</th>
                        <th>Status Pengajuan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    <?php foreach ($Pengajuan as $p): ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= esc($p['Id_Pegawai']); ?></td>
                            <td><?= esc($p['Lokasi']); ?></td>
                            <td><?= esc($p['Tgl_Pengajuan']); ?></td>
                            <td><?= esc($p['Tgl_Mulai']); ?></td>
                            <td><?= esc($p['Tgl_Selesai']); ?></td>
                            <td>
                                <span class="badge <?= $p['Status_Pengajuan'] == 'Disetujui' ? 'bg-success' : 'bg-warning text-dark'; ?>">
                                    <?= esc($p['Status_Pengajuan']); ?>
                                </span>
                            </td>
                            <td>
                                <button class="btn btn-warning btn-sm" 
                                    onclick="editPengajuan(<?= $p['Id_Pengajuan']; ?>, '<?= esc($p['Id_Pegawai']); ?>', '<?= esc($p['Lokasi']); ?>', '<?= esc($p['Tgl_Pengajuan']); ?>', '<?= esc($p['Tgl_Mulai']); ?>', '<?= esc($p['Tgl_Selesai']); ?>', '<?= esc($p['Status_Pengajuan']); ?>')">Edit</button>
                                <button class="btn btn-danger btn-sm" onclick="confirmDelete(<?= $p['Id_Pengajuan']; ?>)">Hapus</button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modalPengajuan">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 id="modalTitle">Tambah Pengajuan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form id="pengajuanForm" action="<?= base_url('/Pengajuan/store'); ?>" method="post">
                <?= csrf_field(); ?>
                <div class="modal-body">
                    <input type="hidden" id="Id_Pengajuan" name="Id_Pengajuan">
                    
                    <div class="mb-3">
                        <label>Id Pegawai</label>
                        <input type="text" class="form-control" id="Id_Pegawai" name="Id_Pegawai" required>
                    </div>

                    <div class="mb-3">
                        <label>Lokasi</label>
                        <input type="text" class="form-control" id="Lokasi" name="Lokasi" required>
                    </div>

                    <div class="mb-3">
                        <label>Tanggal Pengajuan</label>
                        <input type="date" class="form-control" id="Tgl_Pengajuan" name="Tgl_Pengajuan" required>
                    </div>

                    <div class="mb-3">
                        <label>Tanggal Mulai</label>
                        <input type="date" class="form-control" id="Tgl_Mulai" name="Tgl_Mulai" required>
                    </div>

                    <div class="mb-3">
                        <label>Tanggal Selesai</label>
                        <input type="date" class="form-control" id="Tgl_Selesai" name="Tgl_Selesai" required>
                    </div>

                    <div class="mb-3">
                        <label>Status Pengajuan</label>
                        <select class="form-control" id="Status_Pengajuan" name="Status_Pengajuan">
                            <option value="Disetujui">Disetujui</option>
                            <option value="Ditolak">Ditolak</option>
                        </select>
                    </div>
                </div>
                <div class="mb-3">
                    <label>Keterangan</label>
                    <textarea class="form-control" id="Keterangan" name="Keterangan" required></textarea>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Script -->
<script>
    function openModal() {
        document.getElementById('pengajuanForm').reset();
        document.getElementById('modalTitle').innerText = 'Tambah Pengajuan';
        document.getElementById('pengajuanForm').action = '/Pengajuan/store';
        new bootstrap.Modal(document.getElementById('modalPengajuan')).show();
    }

    function editPengajuan(id, idPegawai, lokasi, tglPengajuan, tglMulai, tglSelesai, statusPengajuan) {
        document.getElementById('Id_Pengajuan').value = id;
        document.getElementById('Id_Pegawai').value = idPegawai;
        document.getElementById('Lokasi').value = lokasi;
        document.getElementById('Tgl_Pengajuan').value = tglPengajuan;
        document.getElementById('Tgl_Mulai').value = tglMulai;
        document.getElementById('Tgl_Selesai').value = tglSelesai;
        document.getElementById('Status_Pengajuan').value = statusPengajuan;

        document.getElementById('modalTitle').innerText = 'Edit Pengajuan';
        document.getElementById('pengajuanForm').action = '/Pengajuan/update/' + id;
        
        new bootstrap.Modal(document.getElementById('modalPengajuan')).show();
    }

    function confirmDelete(id) {
        if (confirm('Apakah Anda yakin ingin menghapus data ini?')) {
            location.href = '/Pengajuan/delete/' + id;
        }
    }
</script>

<?= $this->endSection(); ?>
