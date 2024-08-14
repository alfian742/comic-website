<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container px-4" style="margin-top: 5rem;">
    <h2 class="mb-4 text-center fw-bold">Contact</h2>
    <div class="row align-items-center">
        <div class="col-md-6">
            <img class="d-block m-auto img-section mb-4" src="<?= base_url('assets/img/contact.svg'); ?>" alt="Contact">
        </div>
        <div class="col-md-6">
            <div class="mb-4">
                <h6>Address</h6>
                <a class="col-12 btn btn-outline-primary rounded-pill" href="https://goo.gl/maps/XALHknDNPxQA2QCdA?coh=178573&entry=tt" target="_blank">
                    <div class="d-flex align-items-center">
                        <i class="bi bi-geo-alt fs-3"></i>
                        <span style="margin-left: 10px;">West Nusa Tenggara</span>
                    </div>
                </a>
            </div>
            <div class="mb-4">
                <h6>Email</h6>
                <a class="col-12 btn btn-outline-primary rounded-pill" href="mailto:alhidayat742@gmail.com" target="_blank">
                    <div class="d-flex align-items-center">
                        <i class="bi bi-envelope fs-3"></i>
                        <span style="margin-left: 10px;">alfianh274@gmail.com</span>
                    </div>
                </a>
            </div>
            <div class="mb-4">
                <h6>Instagram</h6>
                <a class="col-12 btn btn-outline-primary rounded-pill" href="https://www.instagram.com/alfian_742/" target="_blank">
                    <div class="d-flex align-items-center">
                        <i class="bi bi-instagram fs-3"></i>
                        <span style="margin-left: 10px;">@alfian_742</span>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>