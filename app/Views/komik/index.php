<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container px-4" style="margin-top: 5rem;">
    <div class="row align-items-center">
        <div class="col-md-8">
            <h2 class="fw-bold title-center mb-4"><?= $title; ?></h2>
        </div>
        <div class="col-md-4">
            <div class="row mb-4">
                <div class="col-3">
                    <a href="<?= base_url('komik/create'); ?>" class="btn btn-primary" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="Add new comic">
                        <div class="d-flex justify-content-center">
                            <i class="bi bi-plus-circle-fill"></i>
                            <span class="ps-2 d-none d-lg-block d-xl-block">New</span>
                        </div>
                    </a>
                </div>
                <div class="col-9">
                    <form action="<?= base_url('komik'); ?>" method="POST">
                        <div class="input-group">
                            <input type="text" class="form-control border-primary" placeholder="Search..." name="keyword" autofocus>
                            <button class="btn btn-primary input-group-text" type="submit" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="Search"><i class="bi bi-search"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php if (session()->getFlashdata('pesan')) : ?>
        <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
            <?= session()->getFlashdata('pesan'); ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>

    <div class="table-responsive mb-4">
        <table class="table table-hover align-middle">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Cover</th>
                    <th scope="col">Title</th>
                    <th scope="col">Detail</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1 + (10 * ($currentPage - 1)); ?>
                <?php foreach ($komik as $k) : ?>
                    <tr>
                        <th scope="row"><?= $i++; ?></th>
                        <td>
                            <img src="<?= base_url('img/uploads/' . $k['sampul']); ?>" alt="<?= $k['judul']; ?>" class="img-cover rounded-2 shadow-sm object-fit-fill" loading="lazy">
                        </td>
                        <td><?= $k['judul']; ?></td>
                        <td>
                            <a href="<?= base_url('komik/' . $k['slug']); ?>" class="btn btn-success" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="Detail">
                                <div class="d-flex justify-content-center">
                                    <i class="bi bi-info-circle-fill"></i>
                                    <span class="ps-2 d-none d-lg-block d-xl-block">Detail</span>
                                </div>
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <?= $pager->links('komik', 'komik_pagination'); ?>
</div>

<?= $this->endSection(); ?>