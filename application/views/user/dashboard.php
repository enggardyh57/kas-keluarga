    
<body data-active="dashboard" data-crumbs="Menu | Dashboard"  data-user-name="<?= htmlspecialchars($this->session->userdata('nama'), ENT_QUOTES, 'UTF-8'); ?>"
>
    <div class="shell">
        <div data-shell-sidebar></div>
        <div class="main">
            <div data-shell-topbar></div>
            <?php if ($this->session->flashdata('pesan-success')): ?>
                <div
                    id="success-alert"
                    data-message="<?= html_escape($this->session->flashdata('pesan-success')); ?>">
                </div>
            <?php endif; ?>
            <main class="content">
                <section class="hero">
                    <div class="hero-text">
                        <span class="eyebrow" id="heroDate">Thursday · April 23 · 2026</span>
                        <h1 class="hero-title">
                            Welcome back, <span class="accent"><?= $this->session->userdata('nama') ?></span>
                        </h1>
                    </div>
                </section>
                <section class="kpi-grid" aria-label="Ringkasan Keuangan">

                    <!-- Saldo ATM Saat Ini -->
                    <article class="kpi-card c-primary">
                        <div class="kpi-top">
                            <div class="kpi-identity">
                                <div class="kpi-icon primary">
                                    <svg viewBox="0 0 24 24">
                                        <rect x="3" y="6" width="18" height="12" rx="2" />
                                        <path d="M3 10h18" />
                                        <path d="M16 14h2" />
                                    </svg>
                                </div>
                                <div class="kpi-label">Saldo ATM Saat Ini</div>
                            </div>
                        </div>

                        <div class="kpi-value">Rp 960.270</div>

                        <div class="kpi-compare">
                            Saldo rekening saat ini
                        </div>
                    </article>


                    <!-- Uang Tunai Saat Ini -->
                    <article class="kpi-card c-success">
                        <div class="kpi-top">
                            <div class="kpi-identity">
                                <div class="kpi-icon success">
                                    <svg viewBox="0 0 24 24">
                                        <rect x="3" y="6" width="18" height="12" rx="2" />
                                        <circle cx="12" cy="12" r="3" />
                                        <path d="M7 9h.01M17 15h.01" />
                                    </svg>
                                </div>
                                <div class="kpi-label">Uang Tunai Saat Ini</div>
                            </div>
                        </div>

                        <div class="kpi-value">Rp 47.000</div>

                        <div class="kpi-compare">
                            Uang tunai yang tersedia
                        </div>
                    </article>


                    <!-- Total Saldo Keseluruhan -->
                    <article class="kpi-card c-primary">
                        <div class="kpi-top">
                            <div class="kpi-identity">
                                <div class="kpi-icon primary">
                                    <svg viewBox="0 0 24 24">
                                        <path d="M12 3v18" />
                                        <path d="M17 7c0-2-2-3-5-3S7 5 7 7s2 3 5 3 5 1 5 3-2 3-5 3-5-1-5-3" />
                                    </svg>
                                </div>
                                <div class="kpi-label">Total Saldo Keseluruhan</div>
                            </div>
                        </div>

                        <div class="kpi-value">Rp 1.007.270</div>

                        <div class="kpi-compare">
                            ATM + Tunai
                        </div>
                    </article>


                    <!-- Pengeluaran Bulan Ini -->
                    <article class="kpi-card c-danger">
                        <div class="kpi-top">
                            <div class="kpi-identity">
                                <div class="kpi-icon danger">
                                    <svg viewBox="0 0 24 24">
                                        <path d="M5 5l14 14" />
                                        <path d="M19 5v14" />
                                        <path d="M19 19H5" />
                                    </svg>
                                </div>
                                <div class="kpi-label">Pengeluaran Bulan Ini</div>
                            </div>
                        </div>

                        <div class="kpi-value">Rp 612.730</div>

                        <div class="kpi-compare">
                            Total pengeluaran bulan ini
                        </div>
                    </article>


                    <!-- Penarikan ATM Bulan Ini -->
                    <article class="kpi-card c-purple">
                        <div class="kpi-top">
                            <div class="kpi-identity">
                                <div class="kpi-icon purple">
                                    <svg viewBox="0 0 24 24">
                                        <path d="M4 17 10 11l4 4 6-8" />
                                        <path d="M15 7h5v5" />
                                    </svg>
                                </div>
                                <div class="kpi-label">Penarikan ATM Bulan Ini</div>
                            </div>
                        </div>

                        <div class="kpi-value">Rp 659.730</div>

                        <div class="kpi-compare">
                            Total penarikan ATM bulan ini
                        </div>
                    </article>


                    <!-- Saldo Awal ATM -->
                    <article class="kpi-card c-primary">
                        <div class="kpi-top">
                            <div class="kpi-identity">
                                <div class="kpi-icon primary">
                                    <svg viewBox="0 0 24 24">
                                        <rect x="3" y="6" width="18" height="12" rx="2" />
                                        <path d="M3 10h18" />
                                        <path d="M16 14h2" />
                                    </svg>
                                </div>
                                <div class="kpi-label">Saldo Awal ATM</div>
                            </div>
                        </div>

                        <div class="kpi-value">Rp 1.620.000</div>

                        <div class="kpi-compare">
                            Awal Tunai: <strong>Rp 0</strong>
                        </div>
                    </article>

                </section>