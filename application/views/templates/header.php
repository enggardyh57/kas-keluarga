<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <title>Dashboard · 2026 Redesign Preview</title>
    <script>
        !(function() {
            try {
                var t = localStorage.getItem("dash26-theme"),
                    e = window.matchMedia("(prefers-color-scheme: dark)").matches;
                document.documentElement.setAttribute(
                    "data-theme",
                    t || (e ? "dark" : "light"),
                );
            } catch (t) {
                document.documentElement.setAttribute("data-theme", "light");
            }
        })();
    </script>
    <script defer="defer" src="<?= base_url('assets/js/runtime.js') ?>"></script>
    <script defer="defer" src="<?= base_url('assets/js/vendor-fullcalendar.js') ?>"></script>
    <script defer="defer" src="<?= base_url('assets/js/vendor-chartjs.js') ?>"></script>
    <script defer="defer" src="<?= base_url('assets/js/vendors.js') ?>"></script>
    <script defer="defer" src="<?= base_url('assets/js/2026.js') ?>"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet">
    <link href="<?= base_url('assets/css/style.css') ?>" rel="stylesheet" />
    <link href="<?= base_url('assets/css/mystyle.css') ?>" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>