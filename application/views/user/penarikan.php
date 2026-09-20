<body data-active="penarikan" data-crumbs="Workspace | Penarikan">
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

                <!-- Header -->
                <div class="page-header">
                    <h1 class="hero-title">Penarikan ATM</h1>
                    <p>Saldo ATM berkurang, uang tunai bertambah otomatis.</p>
                </div>
                <form action="<?= base_url('penarikan/tambah') ?>" method="post">
                    <div class="row">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="tanggal" class="form-label fw-bold">Tanggal</label>
                                            <input type="date" class="form-control" id="tanggal" name="tanggal" value="<?= set_value('tanggal', date('Y-m-d')) ?>">
                                            <?php echo form_error('tanggal', '<span style="color: red;">', '</span>'); ?>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="nominal" class="form-label fw-bold">Nominal</label>
                                            <input placeholder="10000" type="text" class="form-control" id="nominal" name="nominal" value="<?= set_value('nominal') ?>">
                                            <?php echo form_error('nominal', '<span style="color: red;">', '</span>'); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="keterangan" class="form-label fw-bold">Keterangan</label>
                                    <textarea
                                        placeholder="Tarik tunai untuk belanja"
                                        class="form-control"
                                        id="keterangan"
                                        name="keterangan"
                                        rows="2"><?= set_value('keterangan') ?></textarea>

                                    <?php echo form_error('keterangan', '<span style="color: red;">', '</span>'); ?>
                                </div>

                                <button type="submit" class="btn btn-primary"><i class="fa-solid fa-plus"></i>Tambah</button>
                            </div>
                        </div>
                    </div>
                </form>
            </main>

</body>