<body data-active="anggaran" data-crumbs="Menu | Anggaran">

    <div class="shell">

        <div data-shell-sidebar></div>

        <div class="main">

            <div data-shell-topbar></div>

            <?php if ($this->session->flashdata('pesan')) : ?>

                <div class="flash-success">
                    <i class="fa-solid fa-circle-check"></i>
                    <span><?= $this->session->flashdata('pesan'); ?></span>
                </div>

            <?php endif; ?>

            <main class="content">

                <!-- HEADER -->
                <div class="mb-4">
                    <h1 class="hero-title mb-1">
                        Anggaran Bulanan
                    </h1>

                    <p class="text-muted mb-0">
                        Tetapkan target dan pantau realisasi per kategori.
                    </p>
                </div>

                <!-- FILTER -->
                <div class="d-flex gap-2 mb-4">

                    <select class="form-select w-auto">
                        <option>Januari</option>
                        <option>Februari</option>
                        <option>Maret</option>
                        <option>April</option>
                        <option>Mei</option>
                        <option>Juni</option>
                        <option>Juli</option>
                        <option>Agustus</option>
                        <option selected>September</option>
                        <option>Oktober</option>
                        <option>November</option>
                        <option>Desember</option>
                    </select>

                    <select class="form-select w-auto">
                        <option selected>2026</option>
                        <option>2027</option>
                        <option>2028</option>
                    </select>

                </div>

                <!-- ANGGARAN -->
                <div class="row g-3">

                    <?php foreach ($anggaran as $item) : ?>

                        <?php
                        $target = $item['target'];
                        $realisasi = $item['realisasi'];
                        $persentase = $item['persentase'];
                        $sisa = $item['sisa'];

                        $progress = min($persentase, 100);
                        ?>

                        <div class="col-lg-4">

                            <div class="card h-100 shadow-sm border-0 rounded-4">

                                <div class="card-body p-4">

                                    <div class="mb-4">
                                        <h5 class="fw-bold mb-1">
                                            <?= html_escape($item['kategori']); ?>
                                        </h5>

                                        <p class="text-muted mb-0">
                                            Atur target anggaran kategori ini.
                                        </p>
                                    </div>

                                    <form action="<?= site_url('anggaran/update'); ?>" method="post">

                                        <input
                                            type="hidden"
                                            name="kategori"
                                            value="<?= html_escape($item['kategori']); ?>">

                                        <label class="form-label fw-bold">
                                            Target Anggaran
                                        </label>

                                        <input
                                            type="text"
                                            class="form-control rupiah-input"
                                            name="target"
                                            value="Rp <?= number_format($target, 0, ',', '.'); ?>"
                                            placeholder="Rp 0"
                                            onchange="this.form.submit()">

                                    </form>

                                    <div class="d-flex justify-content-between mb-1 mt-3">

                                        <span class="text-muted small">
                                            Realisasi
                                        </span>

                                        <strong class="small">
                                            Rp <?= number_format($realisasi, 0, ',', '.'); ?>
                                        </strong>

                                    </div>

                                    <div
                                        class="progress mb-2"
                                        style="height: 8px;">
                                        <div
                                            class="progress-bar"
                                            style="width: <?= $progress; ?>%;"></div>
                                    </div>

                                    <div class="d-flex justify-content-between">

                                        <span class="text-muted small">
                                            <?= number_format($persentase, 0); ?>% terpakai
                                        </span>

                                        <span class="<?= $sisa < 0 ? 'text-danger' : 'text-success'; ?> small fw-semibold">

                                            <?= $sisa < 0 ? 'Melebihi:' : 'Sisa:' ?>

                                            Rp <?= number_format(abs($sisa), 0, ',', '.'); ?>

                                        </span>

                                    </div>

                                </div>

                            </div>

                        </div>

                    <?php endforeach; ?>

                </div>

            </main>

        </div>
    </div>

</body>