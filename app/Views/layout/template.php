<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">

    <!-- My style -->
    <link href="<?= base_url('assets/css/style.css'); ?>" rel="stylesheet">

    <title><?= $title; ?></title>
</head>

<body>
    <!-- Navbar -->
    <?= $this->include('layout/navbar'); ?>
    <!-- End navbar -->

    <!-- Content -->
    <?= $this->renderSection('content'); ?>
    <!-- End content -->

    <!-- Modal Log Out -->
    <?php if (logged_in()) : ?>
        <div class="modal fade" id="profileModal" tabindex="-1" aria-labelledby="profileModal" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body">
                        <h5 class="modal-title fw-bold mb-2"><?= user()->fullname; ?></h5>
                        Are you sure you want to logout from the system?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" style="width: 100px;">No</button>
                        <a href="<?= base_url('logout'); ?>" class="btn btn-primary" style="width: 100px;">Yes</a>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <!-- Bootstrap js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    <!-- My script -->
    <script src="<?= base_url('assets/js/script.js'); ?>"></script>
</body>

</html>