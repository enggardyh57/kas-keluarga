<body data-active="riwayat" data-crumbs="Menu | Riwayat" data-user-name="<?= htmlspecialchars($this->session->userdata('nama'), ENT_QUOTES, 'UTF-8'); ?>">

    <div class="shell">

        <div data-shell-sidebar></div>
        <?php if ($this->session->flashdata('pesan-success')): ?>
            <div
                id="success-alert"
                data-message="<?= html_escape($this->session->flashdata('pesan-success')); ?>">
            </div>
        <?php endif; ?>

        <div class="main">

            <div data-shell-topbar></div>

            <main class="content">

                <!-- HEADER -->
                <div class="mb-4">

                    <h1 class="hero-title mb-1">
                        Riwayat Transaksi
                    </h1>

                    <p class="text-muted mb-0">
                        Semua penarikan dan pengeluaran, dari terbaru.
                    </p>

                </div>


                <!-- FILTER -->
                <div class="card border-0 shadow-sm rounded-4 mb-4">

                    <div class="card-body p-4">

                        <h6 class="fw-bold mb-3">
                            Filter
                        </h6>

                        <form
                            method="get"
                            action="<?= site_url('riwayat'); ?>"
                            class="row g-2">

                            <!-- SEARCH -->
                            <div class="col-lg-4">

                                <div class="input-group">

                                    <span class="input-group-text bg-white">
                                        <i class="fa-solid fa-magnifying-glass"></i>
                                    </span>

                                    <input
                                        type="text"
                                        name="keyword"
                                        class="form-control"
                                        placeholder="Cari keterangan..."
                                        value="<?= html_escape($keyword); ?>">

                                </div>

                            </div>


                            <!-- KATEGORI -->
                            <div class="col-lg-4">

                                <select name="kategori" class="form-select" onchange="this.form.submit()">

                                    <option value="">
                                        Semua kategori
                                    </option>

                                    <option
                                        value="Belanja Rumah"
                                        <?= $kategori === 'Belanja Rumah' ? 'selected' : ''; ?>>
                                        Belanja Rumah
                                    </option>

                                    <option
                                        value="Saku Bintang"
                                        <?= $kategori === 'Saku Bintang' ? 'selected' : ''; ?>>
                                        Saku Bintang
                                    </option>

                                    <option
                                        value="Saku Keysia"
                                        <?= $kategori === 'Saku Keysia' ? 'selected' : ''; ?>>
                                        Saku Keysia
                                    </option>

                                </select>

                            </div>


                            <!-- BULAN -->
                            <div class="col-lg-4">

                                <select name="bulan" class="form-select" onchange="this.form.submit()">

                                    <option value="">
                                        Semua bulan
                                    </option>

                                    <?php
                                    $nama_bulan = [
                                        1  => 'Januari',
                                        2  => 'Februari',
                                        3  => 'Maret',
                                        4  => 'April',
                                        5  => 'Mei',
                                        6  => 'Juni',
                                        7  => 'Juli',
                                        8  => 'Agustus',
                                        9  => 'September',
                                        10 => 'Oktober',
                                        11 => 'November',
                                        12 => 'Desember'
                                    ];
                                    ?>

                                    <?php foreach ($nama_bulan as $nomor => $nama) : ?>

                                        <option
                                            value="<?= $nomor; ?>"
                                            <?= ((int) $bulan === $nomor) ? 'selected' : ''; ?>>
                                            <?= $nama; ?>
                                        </option>

                                    <?php endforeach; ?>

                                </select>

                            </div>

                        </form>

                    </div>

                </div>


                <!-- TABLE -->
                <div class="card border-0 shadow-sm rounded-4">

                    <div class="table-responsive">

                        <table class="table align-middle mb-0">

                            <thead>

                                <tr>

                                    <th class="px-3 py-3">
                                        Tanggal
                                    </th>

                                    <th class="py-3">
                                        Jenis
                                    </th>

                                    <th class="py-3">
                                        Kategori
                                    </th>

                                    <th class="py-3">
                                        Keterangan
                                    </th>

                                    <th class="text-end px-3 py-3">
                                        Nominal
                                    </th>

                                </tr>

                            </thead>

                            <tbody>

                                <?php if (empty($riwayat)) : ?>

                                    <tr>

                                        <td
                                            colspan="5"
                                            class="text-center py-5 text-muted">

                                            <i class="fa-solid fa-clock-rotate-left fa-2x mb-3"></i>

                                            <div>
                                                Tidak ada transaksi.
                                            </div>

                                        </td>

                                    </tr>

                                <?php else : ?>

                                    <?php foreach ($riwayat as $item) : ?>

                                        <tr>

                                            <!-- TANGGAL -->
                                            <td class="px-3">

                                                <?= date(
                                                    'd M Y',
                                                    strtotime($item['tanggal'])
                                                ); ?>

                                            </td>


                                            <!-- JENIS -->
                                            <td>

                                                <?php if ($item['jenis'] === 'Penarikan') : ?>


                                                    <span class="kategori-badge bg-primary text-white px-4 py-2">
                                                        Penarikan
                                                    </span>

                                                <?php else : ?>

                                                    <span class="kategori-badge bg-light text-dark px-3 py-2">
                                                        Pengeluaran
                                                    </span>

                                                <?php endif; ?>

                                            </td>


                                            <!-- KATEGORI -->
                                            <td>

                                                <?= html_escape($item['kategori']); ?>

                                            </td>


                                            <!-- KETERANGAN -->
                                            <td>

                                                <?= html_escape($item['keterangan']); ?>

                                            </td>


                                            <!-- NOMINAL -->
                                            <td class="text-end px-3">

                                                <?php if ($item['jenis'] === 'Pengeluaran') : ?>

                                                    <span class="text-danger fw-semibold">
                                                        -Rp <?= number_format(
                                                                $item['nominal'],
                                                                0,
                                                                ',',
                                                                '.'
                                                            ); ?>
                                                    </span>

                                                <?php else : ?>

                                                    <span class="fw-semibold">
                                                        Rp <?= number_format(
                                                                $item['nominal'],
                                                                0,
                                                                ',',
                                                                '.'
                                                            ); ?>
                                                    </span>

                                                <?php endif; ?>

                                            </td>

                                        </tr>

                                    <?php endforeach; ?>

                                <?php endif; ?>

                            </tbody>

                        </table>

                    </div>

                </div>

            </main>

        </div>

    </div>

</body>