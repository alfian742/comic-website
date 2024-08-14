<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<section id="heroSection">
    <div class="container" style="margin-top: 5rem;">
        <div class="row align-items-center">
            <div class="col-md-6 order-to-bottom">
                <h2>Welcome to My Website</h2>
                <div class="my-5">
                    <h5>My name is</h5>
                    <h1 class="fw-bold">Alfian Hidayatullah</h1>
                    <h5 class="fst-italic">Just a programmer passing through</h5>
                </div>
                <?php if (!logged_in()) : ?>
                    <a class="btn btn-lg btn-primary shadow-sm rounded-pill" href="<?= url_to('login') ?>">
                        Sign In
                    </a>
                <?php endif; ?>
            </div>
            <div class="col-md-6 order-to-top">
                <img class="d-block m-auto mb-4" src="<?= base_url('assets/img/website.svg'); ?>" alt="My Website">
            </div>
        </div>
    </div>
</section>

<?= $this->endSection(); ?>