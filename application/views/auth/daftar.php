<body>
    <div class="auth-shell">

        <!-- LEFT -->
        <aside class="auth-aside">
            <div class="auth-brand">
                <div class="logo">
                    <svg width="22" height="22" viewBox="0 0 24 24"
                        fill="none"
                        stroke="#fff"
                        stroke-width="2"
                        stroke-linecap="round"
                        stroke-linejoin="round">
                        <path d="M20 7V6a2 2 0 0 0-2-2H5a3 3 0 0 0 0 6h15v8a2 2 0 0 1-2 2H5a3 3 0 0 1-3-3V7" />
                        <path d="M16 13h.01" />
                    </svg>

                </div>

                <div class="name">Kas Keluarga Ceria</div>
            </div>

            <div class="auth-aside-body">
                <span class="auth-aside-eyebrow">KEUANGAN KELUARGA</span>

                <h1>Kelola keuangan keluarga dengan lebih mudah.</h1>

                <p>
                    Catat pemasukan, pengeluaran, dan penarikan uang
                    dalam satu tempat agar kondisi keuangan keluarga
                    lebih mudah dipantau.
                </p>

                <div class="auth-quote">
                    "Pencatatan yang rapi membantu kita mengetahui
                    ke mana uang digunakan."

                    <div class="auth-quote-author">
                        <div class="av">K</div>
                        <div>Kas Keluarga Ceria</div>
                    </div>
                </div>
            </div>

            <div class="auth-aside-footer">
                <span>© 2026</span>
                <span>Kas Keluarga Ceria</span>
            </div>
        </aside>


        <!-- RIGHT -->
        <main class="auth-main">

            <div class="auth-main-top">
                <!-- kosong / bisa dihapus -->
            </div>

            <div class="auth-card">

                <h2>Daftar Akun</h2>

                <p class="sub">
                    Buat akun untuk mengakses dan mengelola keuangan keluarga.
                </p>
                <?php if ($this->session->flashdata('pesan-login')): ?>
                    <div
                        id="auth-alert"
                        data-message="<?= html_escape($this->session->flashdata('pesan-login')); ?>">
                    </div>
                <?php endif; ?>

                <form
                    class="auth-form"
                    action="<?= base_url('auth/daftar'); ?>"
                    method="post">

                    <!-- EMAIL -->
                    <div class="field">
                        <label class="field-label" for="email">
                            Email
                        </label>

                        <div class="input-icon">
                            <span class="ico">
                                <svg viewBox="0 0 24 24">
                                    <rect
                                        x="3"
                                        y="5"
                                        width="18"
                                        height="14"
                                        rx="2" />
                                    <path d="m3 7 9 6 9-6" />
                                </svg>
                            </span>

                            <input
                                id="email"
                                class="input"
                                type="email"
                                name="email"
                                placeholder="Masukkan email"
                                autocomplete="email"
                                value="<?= set_value('email'); ?>" />
                        </div>

                        <?= form_error(
                            'email',
                            '<small class="text-danger">',
                            '</small>'
                        ); ?>
                    </div>

                    <!-- NAMA -->
                    <div class="field">
                        <label class="field-label" for="nama">
                            Nama Lengkap
                        </label>

                        <div class="input-icon">
                            <span class="ico">
                                <svg viewBox="0 0 24 24">
                                    <rect
                                        x="3"
                                        y="5"
                                        width="18"
                                        height="14"
                                        rx="2" />
                                    <path d="m3 7 9 6 9-6" />
                                </svg>
                            </span>

                            <input
                                id="nama"
                                class="input"
                                type="text"
                                name="nama"
                                placeholder="John Doe"
                                value="<?= set_value('nama'); ?>" />
                        </div>

                        <?= form_error(
                            'nama',
                            '<small class="text-danger">',
                            '</small>'
                        ); ?>
                    </div>


                    <!-- PASSWORD 1 -->
                    <div class="field">

                        <div class="field-row">
                            <label class="field-label" for="password1">
                                Password
                            </label>
                        </div>

                        <div class="input-icon">
                            <span class="ico">
                                <svg viewBox="0 0 24 24">
                                    <rect
                                        x="3"
                                        y="11"
                                        width="18"
                                        height="11"
                                        rx="2" />
                                    <path d="M7 11V7a5 5 0 0 1 10 0v4" />
                                </svg>
                            </span>

                            <input
                                id="password1"
                                class="input"
                                type="password"
                                name="password1"
                                placeholder="Masukkan password"
                                autocomplete="current-password" />
                        </div>

                        <?= form_error(
                            'password1',
                            '<small class="text-danger">',
                            '</small>'
                        ); ?>
                    </div>

                    <!-- PASSWORD 2 -->
                    <div class="field">

                        <div class="field-row">
                            <label class="field-label" for="password1">
                                Ulangi Password
                            </label>
                        </div>

                        <div class="input-icon">
                            <span class="ico">
                                <svg viewBox="0 0 24 24">
                                    <rect
                                        x="3"
                                        y="11"
                                        width="18"
                                        height="11"
                                        rx="2" />
                                    <path d="M7 11V7a5 5 0 0 1 10 0v4" />
                                </svg>
                            </span>

                            <input
                                id="password2"
                                class="input"
                                type="password"
                                name="password2"
                                placeholder="Masukkan password"
                                autocomplete="current-password" />
                        </div>
                    </div>

                    <!-- BUTTON -->
                    <button
                        class="btn btn--primary auth-submit"
                        type="submit">

                        Masuk

                        <svg viewBox="0 0 24 24">
                            <path d="M5 12h14M13 5l7 7-7 7" />
                        </svg>
                    </button>

                </form>


                <!-- DAFTAR -->
                <div class="auth-register mt-3 text-center">
                    Sudah punya akun?
                    <a href="<?= base_url('auth'); ?>" class="text-decoration-underline">
                        Login
                    </a>
                </div>

            </div>

        </main>