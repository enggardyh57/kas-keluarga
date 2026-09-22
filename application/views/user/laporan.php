<body data-active="laporan" data-crumbs="Menu | Laporan">

    <div class="shell">

        <div data-shell-sidebar></div>

        <div class="main">

            <div data-shell-topbar></div>

            <main class="content">

                <div class="mb-4">
                    <h1 class="hero-title mb-1">Laporan Bulanan</h1>
                    <p class="text-muted mb-0">
                        Ringkasan keuangan per bulan.
                    </p>
                </div>

                <form method="get" action="<?= site_url('laporan'); ?>" class="d-flex gap-2 mb-4">

                    <select name="bulan" class="form-select" style="max-width: 175px;" onchange="this.form.submit()">
                        <?php
                        $nama_bulan = [
                            1 => 'Januari',
                            2 => 'Februari',
                            3 => 'Maret',
                            4 => 'April',
                            5 => 'Mei',
                            6 => 'Juni',
                            7 => 'Juli',
                            8 => 'Agustus',
                            9 => 'September',
                            10 => 'Oktober',
                            11 => 'November',
                            12 => 'Desember'
                        ];
                        ?>

                        <?php foreach ($nama_bulan as $nomor => $nama) : ?>
                            <option value="<?= $nomor; ?>"
                                <?= $bulan == $nomor ? 'selected' : ''; ?>>
                                <?= $nama; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>

                    <select name="tahun" class="form-select" style="max-width: 125px;" onchange="this.form.submit()">
                        <?php for ($tahun_option = date('Y') - 2; $tahun_option <= date('Y') + 2; $tahun_option++) : ?>
                            <option value="<?= $tahun_option; ?>"
                                <?= $tahun == $tahun_option ? 'selected' : ''; ?>>
                                <?= $tahun_option; ?>
                            </option>
                        <?php endfor; ?>
                    </select>

                </form>

                <div class="row g-3 mb-3">

                    <div class="col-lg-4">
                        <div class="card border-0 shadow-sm rounded-4 h-80 justify-content-center">
                            <div class="card-body p-2">
                                <p class="text-muted mb-4">
                                    Total Belanja Rumah
                                </p>

                                <h3 class="fw-bold mb-0">
                                    Rp <?= number_format(
                                            $laporan['kategori']['Belanja Rumah'],
                                            0,
                                            ',',
                                            '.'
                                        ); ?>
                                </h3>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="card border-0 shadow-sm rounded-4 h-80 justify-content-center">
                            <div class="card-body p-2">
                                <p class="text-muted mb-4">
                                    Total Saku Bintang
                                </p>

                                <h3 class="fw-bold mb-0">
                                    Rp <?= number_format(
                                            $laporan['kategori']['Saku Bintang'],
                                            0,
                                            ',',
                                            '.'
                                        ); ?>
                                </h3>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="card border-0 shadow-sm rounded-4 h-80 justify-content-center">
                            <div class="card-body p-2">
                                <p class="text-muted mb-4">
                                    Total Saku Keysia
                                </p>

                                <h3 class="fw-bold mb-0">
                                    Rp <?= number_format(
                                            $laporan['kategori']['Saku Keysia'],
                                            0,
                                            ',',
                                            '.'
                                        ); ?>
                                </h3>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="row g-3 mb-4">

                    <div class="col-lg-4">
                        <div class="card border-0 shadow-sm rounded-4 h-80 justify-content-center">
                            <div class="card-body p-2">
                                <p class="text-muted mb-4">
                                    Total Pengeluaran Bulanan
                                </p>

                                <h3 class="fw-bold text-danger mb-0">
                                    Rp <?= number_format(
                                            $laporan['total_pengeluaran'],
                                            0,
                                            ',',
                                            '.'
                                        ); ?>
                                </h3>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="card border-0 shadow-sm rounded-4 h-80 justify-content-center">
                            <div class="card-body p-2">
                                <p class="text-muted mb-4">
                                    Total Penarikan ATM
                                </p>

                                <h3 class="fw-bold text-warning mb-0">
                                    Rp <?= number_format(
                                            $laporan['total_penarikan'],
                                            0,
                                            ',',
                                            '.'
                                        ); ?>
                                </h3>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="card border-0 shadow-sm rounded-4 h-80 justify-content-center">
                            <div class="card-body p-2">
                                <p class="text-muted mb-4">
                                    Sisa Saldo Saat Ini
                                </p>

                                <h3 class="fw-bold text-success mb-0">
                                    Rp <?= number_format(
                                            $saldo,
                                            0,
                                            ',',
                                            '.'
                                        ); ?>
                                </h3>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="card border-0 shadow-sm rounded-4">
                    <div class="card-body p-4">

                        <h5 class="fw-bold mb-4">
                            Grafik Pengeluaran per Kategori
                        </h5>

                        <div style="height: 350px;">
                            <canvas id="laporanChart"></canvas>
                        </div>

                    </div>
                </div>

            </main>

        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    const ctx = document.getElementById('laporanChart');

    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: [
                'Belanja Rumah',
                'Saku Bintang',
                'Saku Keysia'
            ],
            datasets: [{
                label: 'Pengeluaran',
                data: [
                    <?= $laporan['kategori']['Belanja Rumah']; ?>,
                    <?= $laporan['kategori']['Saku Bintang']; ?>,
                    <?= $laporan['kategori']['Saku Keysia']; ?>
                ],
                borderRadius: 8,
                borderSkipped: false,
                barThickness: 55
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,

            plugins: {
                legend: {
                    display: false
                },

                tooltip: {
                    callbacks: {
                        label: function(context) {
                            return 'Rp ' + new Intl.NumberFormat('id-ID').format(context.raw);
                        }
                    }
                }
            },

            scales: {
                x: {
                    grid: {
                        display: false
                    },
                    ticks: {
                        font: {
                            size: 13
                        }
                    }
                },

                y: {
                    beginAtZero: true,
                    grid: {
                        color: 'rgba(0, 0, 0, 0.06)'
                    },
                    border: {
                        display: false
                    },
                    ticks: {
                        padding: 8,
                        callback: function(value) {
                            return 'Rp ' + new Intl.NumberFormat('id-ID', {
                                notation: 'compact',
                                maximumFractionDigits: 1
                            }).format(value);
                        }
                    }
                }
            }
        }
    });
</script>

</body>