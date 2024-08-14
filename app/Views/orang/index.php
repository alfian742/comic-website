<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container px-4" style="margin-top: 5rem;">
    <div class="row align-items-center">
        <div class="col-md-8">
            <h2 class="fw-bold title-center mb-4"><?= $title; ?></h2>
        </div>
        <div class="col-md-4">
            <div class="d-grid gap-2 col-12 mx-auto mb-4">
                <form action="<?= base_url('orang'); ?>" method="POST">
                    <div class="input-group">
                        <input type="text" class="form-control border-primary" placeholder="Search..." name="keyword" autofocus>
                        <button class="btn btn-primary input-group-text" type="submit" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="Search"><i class="bi bi-search"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="table-responsive mb-4">
        <table class="table table-hover align-middle">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Address</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1 + (10 * ($currentPage - 1)); ?>
                <?php foreach ($orang as $o) : ?>
                    <tr>
                        <th scope="row"><?= $i++; ?></th>
                        <td><?= $o['nama']; ?></td>
                        <td><?= $o['alamat']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <?= $pager->links('orang', 'orang_pagination'); ?>
</div>

<?= $this->endSection(); ?>