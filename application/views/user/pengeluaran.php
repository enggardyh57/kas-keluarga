<body data-active="pengeluaran" data-crumbs="Menu | Pengeluaran" data-user-name="<?= htmlspecialchars($this->session->userdata('nama'), ENT_QUOTES, 'UTF-8'); ?>">
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
            <?php if ($this->session->flashdata('pesan')) : ?>

                <div class="flash-success">
                    <i class="fa-solid fa-circle-check"></i>
                    <span><?= $this->session->flashdata('pesan'); ?></span>
                </div>

            <?php endif; ?>
            <main class="content">

                <!-- TAMBAH PENGELUARAN-->
                <div class="row">
                    <div class="page-header">
                        <h1 class="hero-title">Pengeluaran</h1>
                        <p>Uang tunai berkurang otomatis saat pengeluaran dicatat.</p>
                    </div>
                    <form action="<?= isset($edit)
                                        ? base_url('pengeluaran/update/' . $edit['id'])
                                        : base_url('pengeluaran/tambah')
                                    ?>" method="post">
                        <div class="row">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="tanggal" class="form-label fw-bold">Tanggal</label>
                                                <input
                                                    type="date"
                                                    class="form-control"
                                                    id="tanggal"
                                                    name="tanggal"
                                                    value="<?= isset($edit) ? $edit['tanggal'] : set_value('tanggal', date('Y-m-d')) ?>">
                                                <?php echo form_error('tanggal', '<span style="color: red;">', '</span>'); ?>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="kategori" class="form-label fw-bold">Kategori</label>
                                                <select class="form-select" id="kategori" name="kategori">
                                                    <option value="Belanja Rumah">Belanja Rumah</option>
                                                    <option value="Saku Bintang">Saku Bintang</option>
                                                    <option value="Saku Keysia">Saku Keysia</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="nominal" class="form-label fw-bold">Nominal</label>
                                                <input
                                                    placeholder="10000"
                                                    type="text"
                                                    class="form-control"
                                                    id="nominal"
                                                    name="nominal"
                                                    value="<?= isset($edit) ? $edit['nominal'] : set_value('nominal') ?>">
                                                <?php echo form_error('nominal', '<span style="color: red;">', '</span>'); ?>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="keterangan" class="form-label fw-bold">Keterangan</label>
                                                <input
                                                    type="text"
                                                    placeholder="Sayur dan lauk"
                                                    class="form-control"
                                                    id="keterangan"
                                                    name="keterangan"
                                                    value="<?= isset($edit) ? $edit['keterangan'] : set_value('keterangan') ?>">
                                                <?php echo form_error('keterangan', '<span style="color: red;">', '</span>'); ?>
                                            </div>
                                        </div>

                                    </div>

                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa-solid <?= isset($edit) ? 'fa-pen' : 'fa-plus' ?>"></i>
                                        <?= isset($edit) ? 'Simpan Perubahan' : 'Tambah' ?>
                                    </button>

                                    <?php if (isset($edit)): ?>
                                        <a href="<?= base_url('pengeluaran') ?>" class="btn btn-secondary">
                                            Batal
                                        </a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

                <!-- RIWAYAT pengeluaran -->
                <div class="row mt-3">
                    <div class="card">
                        <div class="card-body">

                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Tanggal</th>
                                        <th>Kategori</th>
                                        <th>Nominal</th>
                                        <th>Keterangan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $angka = 1; ?>
                                    <?php foreach ($pengeluaran as $p): ?>
                                        <tr>
                                            <td><?= $angka++ ?></td>
                                            <td><?= $p['tanggal'] ?></td>
                                            <td>
                                                <span class="kategori-badge">
                                                    <?= $p['kategori'] ?>
                                                </span>
                                            </td>
                                            <td>Rp <?= number_format($p['nominal'], 0, ',', '.') ?></td>
                                            <td><?= $p['keterangan'] ?></td>
                                            <td>
                                                <a href="<?= base_url('pengeluaran/edit/' . $p['id']) ?>">
                                                    <i class="fa-solid fa-pencil" style="font-size: 18px;"></i>
                                                </a>
                                                <a href="#"
                                                    class="btn-hapus"
                                                    data-url="<?= base_url('pengeluaran/hapus/' . $p['id']) ?>">
                                                    <i class="fa-regular fa-trash-can" style="font-size: 15px; color: red;"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </main>


            <!-- Confirm hapus -->
            <div id="modalHapus" class="modal-hapus">
                <div class="modal-hapus-content">
                    <div class="modal-hapus-icon">
                        <i class="fa-solid fa-triangle-exclamation"></i>
                    </div>

                    <h3>Hapus pengeluaran?</h3>
                    <p>Data pengeluaran ini akan dihapus secara permanen.</p>

                    <div class="modal-hapus-action">
                        <button type="button" id="batalHapus" class="btn-batal">
                            Batal
                        </button>

                        <a href="#" id="konfirmasiHapus" class="btn-konfirmasi">
                            Hapus
                        </a>
                    </div>
                </div>
            </div>
</body>