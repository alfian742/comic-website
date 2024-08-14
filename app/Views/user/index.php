<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container px-4" style="margin-top: 5rem;">
    <div class="row align-items-center mb-4">
        <div class="col-10">
            <div class="d-flex gap-2">
                <a href="<?= base_url(); ?>" class="btn fw-bold" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="Back">
                    <i class="bi bi-chevron-left"></i>
                </a>
                <h2 class="fw-bold my-auto"><?= $title; ?></h2>
            </div>
        </div>
        <div class="col-2">
            <div class="d-flex justify-content-end">
                <a href="<?= base_url('user/edit/' . user()->id); ?>" class="btn btn-primary" style="width: 100px;" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="Edit Profile">
                    <i class="bi bi-pencil-square"></i>
                    <span class="ps-2 d-none d-lg-inline d-xl-inline">Edit</span>
                </a>
            </div>
        </div>
    </div>

    <?php if (session()->getFlashdata('pesan')) : ?>
        <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
            <?= session()->getFlashdata('pesan') ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif ?>

    <div class="row">
        <div class="col-md-3">
            <img src="<?= base_url('img/user_img/' . user()->user_img); ?>" class="mx-auto d-block img-profile rounded-4 rounded-circle shadow-sm object-fit-cover mb-4" alt="<?= user()->username; ?>">
        </div>
        <div class="col-md-9">
            <div class="table-responsive mb-4">
                <table class="table table-borderless align-middle">
                    <tr>
                        <td class="fw-bold">Name</td>
                        <td>:</td>
                        <td><?= user()->fullname; ?></td>
                    </tr>
                    <tr>
                        <td class="fw-bold">Email</td>
                        <td>:</td>
                        <td><?= user()->email; ?></td>
                    </tr>
                    <tr>
                        <td class="fw-bold">Username</td>
                        <td>:</td>
                        <td><?= user()->username; ?></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>