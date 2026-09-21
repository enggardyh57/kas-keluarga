<body data-active="pengaturan" data-crumbs="Menu | Pengaturan">
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

                <div class="row">

                    <!-- PAGE HEADER -->
                    <div class="page-header">
                        <h1 class="hero-title">Pengaturan</h1>
                        <p>Atur saldo awal untuk mendukung pencatatan keuangan.</p>
                    </div>

                    <!-- FORM PENGATURAN -->
                    <form action="" method="post">

                        <div class="card">
                            <div class="card-body">

                                <!-- CARD HEADER -->
                                <div class="mb-4">
                                    <h5 class="fw-bold mb-1">
                                        <i class="fa-solid fa-wallet me-2"></i>
                                        Saldo Awal
                                    </h5>

                                    <p class="text-muted mb-0">
                                        Atur saldo awal ATM dan tunai yang digunakan
                                        sebagai dasar perhitungan keuangan.
                                    </p>
                                </div>

                                <!-- INPUT SALDO -->
                                <div class="row">

                                    <!-- SALDO ATM -->
                                    <div class="col-md-6">
                                        <div class="mb-3">

                                            <label
                                                for="saldo_atm"
                                                class="form-label fw-bold"
                                            >
                                                Saldo Awal ATM
                                            </label>

                                            <input
                                                type="text"
                                                class="form-control rupiah-input"
                                                id="saldo_atm"
                                                name="saldo_atm"
                                                placeholder="Rp 0"
                                                value="<?= isset($pengaturan)
                                                    ? 'Rp ' . number_format(
                                                        $pengaturan['saldo_awal_atm'],
                                                        0,
                                                        ',',
                                                        '.'
                                                    )
                                                    : set_value('saldo_atm') ?>"
                                            >

                                            <?php
                                            echo form_error(
                                                'saldo_atm',
                                                '<span style="color:red;">',
                                                '</span>'
                                            );
                                            ?>

                                            <small class="text-muted">
                                                Saldo yang tersedia pada rekening ATM.
                                            </small>

                                        </div>
                                    </div>

                                    <!-- SALDO TUNAI -->
                                    <div class="col-md-6">
                                        <div class="mb-3">

                                            <label
                                                for="saldo_tunai"
                                                class="form-label fw-bold"
                                            >
                                                Saldo Awal Tunai
                                            </label>

                                            <input
                                                type="text"
                                                class="form-control rupiah-input"
                                                id="saldo_tunai"
                                                name="saldo_tunai"
                                                placeholder="Rp 0"
                                                value="<?= isset($pengaturan)
                                                    ? 'Rp ' . number_format(
                                                        $pengaturan['saldo_awal_tunai'],
                                                        0,
                                                        ',',
                                                        '.'
                                                    )
                                                    : set_value('saldo_tunai') ?>"
                                            >

                                            <?php
                                            echo form_error(
                                                'saldo_tunai',
                                                '<span style="color:red;">',
                                                '</span>'
                                            );
                                            ?>

                                            <small class="text-muted">
                                                Jumlah uang tunai yang tersedia.
                                            </small>

                                        </div>
                                    </div>

                                </div>

                                <!-- LAST UPDATED -->
                                <div class="mt-3 mb-3">
                                    <small class="text-muted">
                                        <i class="fa-solid fa-clock me-1"></i>
                                        Terakhir diperbarui:
                                    </small>

                                    <span class="fw-semibold">
                                        <?= isset($pengaturan['updated_at'])
                                            ? date(
                                                'd M Y, H:i',
                                                strtotime($pengaturan['updated_at'])
                                            )
                                            : 'Belum diatur' ?>
                                    </span>
                                </div>

                                <!-- ACTION -->
                                <div class="mt-3">
                                    <button
                                        type="submit"
                                        class="btn btn-primary"
                                    >
                                        <i class="fa-solid fa-floppy-disk me-1"></i>
                                        Simpan Pengaturan
                                    </button>
                                </div>

                            </div>
                        </div>

                    </form>

                </div>

            </main>

        </div>
    </div>
</body>