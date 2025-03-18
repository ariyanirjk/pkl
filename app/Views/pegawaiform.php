<h2><?= isset($Pegawai) ? 'Edit Pegawai' : 'Tambah Pegawai' ?></h2>

<form action="<?= isset($Pegawai) ? base_url('/pegawai/update/' . $Pegawai['Id_Pegawai']) : base_url('/pegawai/store'); ?>" method="post">
    <input type="hidden" name="Id_Pegawai" value="<?= isset($Pegawai) ? esc($Pegawai['Id_Pegawai']) : ''; ?>">

    <label>Nama:</label>
    <input type="text" name="Nama" value="<?= isset($Pegawai) ? esc($Pegawai['Nama']) : ''; ?>" required>

    <label>Jabatan:</label>
    <input type="text" name="Jabatan" value="<?= isset($Pegawai) ? esc($Pegawai['Jabatan']) : ''; ?>" required>

    <label>No Telepon:</label>
    <input type="text" name="No_Tlp" value="<?= isset($Pegawai) ? esc($Pegawai['No_Tlp']) : ''; ?>" required>

    <label>Status Pengajuan:</label>
    <select name="Status_Pengajuan" required>
        <option value="Diproses" <?= (isset($Pegawai) && $Pegawai['Status_Pengajuan'] == 'Diproses') ? 'selected' : ''; ?>>Diproses</option>
        <option value="Ditolak" <?= (isset($Pegawai) && $Pegawai['Status_Pengajuan'] == 'Ditolak') ? 'selected' : ''; ?>>Ditolak</option>
        <option value="Disetujui" <?= (isset($Pegawai) && $Pegawai['Status_Pengajuan'] == 'Disetujui') ? 'selected' : ''; ?>>Disetujui</option>
    </select>

    <button type="submit"><?= isset($Pegawai) ? 'Update' : 'Simpan' ?></button>
</form>
