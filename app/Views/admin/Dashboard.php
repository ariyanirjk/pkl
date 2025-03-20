<?=$this->extend('Layout/Header'); ?>
<?=$this->section('Content'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="path/to/your/css/styles.css"> <!-- Ganti dengan path CSS Anda -->
</head>
<body>
    <h1>Dashboard Perjalanan Dinas United Tractors</h1>
    <p>Anda sudah berhasil Log In <?= session()->get('username'); ?></p>
    <div class="row g-4 mb-4">
        <!-- Total Perjalanan -->
        <div class="col-6 col-lg-3">
            <div class="app-card app-card-stat shadow-sm h-100">
                <div class="app-card-body p-3 p-lg-4">
                    <h4 class="stats-type mb-1">Total Perjalanan</h4>
                    <div class="stats-figure">15</div>
                </div>
            </div>
        </div>

        <!-- Perjalanan Aktif -->
        <div class="col-6 col-lg-3">
            <div class="app-card app-card-stat shadow-sm h-100">
                <div class="app-card-body p-3 p-lg-4">
                    <h4 class="stats-type mb-1">Perjalanan Aktif</h4>
                    <div class="stats-figure">5</div>
                </div>
            </div>
        </div>

        <!-- Perjalanan Selesai -->
        <div class="col-6 col-lg-3">
            <div class="app-card app-card-stat shadow-sm h-100">
                <div class="app-card-body p-3 p-lg-4">
                    <h4 class="stats-type mb-1">Perjalanan Selesai</h4>
                    <div class="stats-figure">3</div>
                </div>
            </div>
        </div>

        <!-- Pengajuan Menunggu Persetujuan -->
        <div class="col-6 col-lg-3">
            <div class="app-card app-card-stat shadow-sm h-100">
                <div class="app-card-body p-3 p-lg-4">
                    <h4 class="stats-type mb-1">Pengajuan Menunggu</h4>
                    <div class="stats-figure">4</div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

<?= $this->endSection(); ?>
