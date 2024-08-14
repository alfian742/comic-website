<!doctype html>
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

    <?= $this->renderSection('pageStyles') ?>
</head>

<body class="auth-layout bg-light">
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-xl-10 col-lg-12 col-md-9">
                <div class="card overflow-hidden border-0 rounded-4 shadow-lg my-5">

                    <?= $this->renderSection('main') ?>

                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    <!-- My script -->
    <script src="<?= base_url('assets/js/script.js'); ?>"></script>

    <?= $this->renderSection('pageScripts') ?>
</body>

</html>