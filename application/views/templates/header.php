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
    <link href="<?= base_url('assets/css/style.css') ?>" rel="stylesheet" />
</head>

<body data-active="dashboard" data-crumbs="Workspace | Dashboard">