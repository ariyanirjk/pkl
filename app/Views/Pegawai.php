<?= $this->extend('Layout/Header'); ?>
<?= $this->section('Content'); ?>

<div class="container mt-4">
    <!-- Notifikasi -->
    <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success"> <?= session()->getFlashdata('success'); ?> </div>
    <?php elseif (session()->getFlashdata('error')): ?>
        <div class="alert alert-danger"> <?= session()->getFlashdata('error'); ?> </div>
    <?php endif; ?>

    <!-- Tombol Tambah Data -->
    <button class="btn btn-primary mb-3" onclick="openModal()">Tambah Pegawai</button>

    <!-- Tabel Data Pegawai -->
    <div class="card">
        <div class="card-body">
            <table class="table table-striped table-bordered text-center">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Jabatan</th>
                        <th>No Telepon</th>
                        <th>Status Pengajuan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    <?php foreach ($Pegawai as $peg): ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= esc($peg['Nama']); ?></td>
                            <td><?= esc($peg['Jabatan']); ?></td>
                            <td><?= esc($peg['No_Tlp']); ?></td>
                            <td>
                                <span class="badge <?= $peg['Status_Pengajuan'] == 'Ditolak' ? 'bg-danger' : ($peg['Status_Pengajuan'] == 'Diproses' ? 'bg-warning text-dark' : 'bg-success'); ?>">
                                    <?= esc($peg['Status_Pengajuan']); ?>
                                </span>
                            </td>
                            <td>
                                <button class="btn btn-sm btn-warning" onclick="editPegawai(<?= $peg['Id_Pegawai']; ?>, '<?= esc($peg['Nama']); ?>', '<?= esc($peg['Jabatan']); ?>', '<?= esc($peg['No_Tlp']); ?>', '<?= esc($peg['Status_Pengajuan']); ?>')">Edit</button>
                                <button class="btn btn-sm btn-danger" onclick="confirmDelete(<?= $peg['Id_Pegawai']; ?>)">Hapus</button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal Tambah/Edit Pegawai -->
<div class="modal fade" id="modalPegawai" tabindex="-1" aria-labelledby="modalPegawaiLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalPegawaiLabel">Tambah Pegawai</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="pegawaiForm" action="<?= base_url('/pegawai/store'); ?>" method="post">
                <?= csrf_field(); ?>
                <div class="modal-body">
                    <input type="hidden" id="Id_Pegawai" name="Id_Pegawai">
                    
                    <div class="mb-3">
                        <label class="form-label">Nama</label>
                        <input type="text" class="form-control" id="Nama" name="Nama" required>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Jabatan</label>
                        <input type="text" class="form-control" id="Jabatan" name="Jabatan" required>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">No Telepon</label>
                        <input type="text" class="form-control" id="No_Tlp" name="No_Tlp" required>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Status Pengajuan</label>
                        <select class="form-control" id="Status_Pengajuan" name="Status_Pengajuan">
                            <option value="Diproses">Diproses</option>
                            <option value="Disetujui">Disetujui</option>
                            <option value="Ditolak">Ditolak</option>
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
        document.getElementById('pegawaiForm').reset();
        document.getElementById('modalPegawaiLabel').innerText = 'Tambah Pegawai';
        document.getElementById('pegawaiForm').action = '/pegawai/store';
        new bootstrap.Modal(document.getElementById('modalPegawai')).show();
    }

    function editPegawai(id, nama, jabatan, no_tlp, status_pengajuan) {
        document.getElementById('Id_Pegawai').value = id;
        document.getElementById('Nama').value = nama;
        document.getElementById('Jabatan').value = jabatan;
        document.getElementById('No_Tlp').value = no_tlp;
        document.getElementById('Status_Pengajuan').value = status_pengajuan;

        document.getElementById('modalPegawaiLabel').innerText = 'Edit Pegawai';
        document.getElementById('pegawaiForm').action = '/pegawai/update/' + id;
        
        new bootstrap.Modal(document.getElementById('modalPegawai')).show();
    }

    function confirmDelete(id) {
        if (confirm('Apakah Anda yakin ingin menghapus data ini?')) {
            location.href = '/pegawai/delete/' + id;
        }
    }
</script>

<?= $this->endSection(); ?>
