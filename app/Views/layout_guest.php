<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="">
    <meta name="author" content="">

    <title>SMP Pelita Nusantara | <?= $title ?></title>

    <!-- CSS FILES -->
    <link href="<?= base_url() ?>assets/guest/css/bootstrap.min.css" rel="stylesheet">

    <link href="<?= base_url() ?>assets/guest/css/bootstrap-icons.css" rel="stylesheet">

    <link href="<?= base_url() ?>assets/guest/css/templatemo-kind-heart-charity.css" rel="stylesheet">

    <link rel="shortcut icon" href="<?= base_url() ?>assets/guest/images/penuss.jpg" type="image/x-icon">

    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.3/css/dataTables.bootstrap5.css">
    <style>
        .my-text {
            color: var(--primary-color);
        }

        .my-button, .my-bg {
            background-color: var(--primary-color);
        }

        .my-button {
            border-color: var(--primary-color);
        }

        .my-button:hover {
            background-color: #4ead9a;
            border-color: #4ead9a;
        }
    </style>
</head>

<body id="section_1">

    <?= $this->include('components/guest/_header'); ?>

    <main>
        <?= $this->renderSection('content'); ?>
    </main>

    <?= $this->include('components/guest/_footer'); ?>

    <!-- JAVASCRIPT FILES -->
    <script src="<?= base_url() ?>assets/guest/js/jquery.min.js"></script>
    <script src="<?= base_url() ?>assets/guest/js/bootstrap.min.js"></script>
    <script src="<?= base_url() ?>assets/guest/js/jquery.sticky.js"></script>
    <script src="<?= base_url() ?>assets/guest/js/click-scroll.js"></script>
    <script src="<?= base_url() ?>assets/guest/js/counter.js"></script>
    <script src="<?= base_url() ?>assets/guest/js/custom.js"></script>

    <script src="https://cdn.datatables.net/2.0.3/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.0.3/js/dataTables.bootstrap5.js"></script>

    <?= $this->renderSection('script'); ?>

</body>

</html>