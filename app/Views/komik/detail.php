<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container px-4" style="margin-top: 5rem;">
    <div class="row align-items-center mb-4">
        <div class="col-10">
            <div class="d-flex gap-2">
                <a href="<?= base_url('komik/'); ?>" class="btn fw-bold" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="Back">
                    <i class="bi bi-chevron-left"></i>
                </a>
                <h2 class="fw-bold my-auto"><?= $title; ?></h2>
            </div>
        </div>
        <div class="col-2">
            <div class="d-flex justify-content-end">
                <form action="<?= base_url('komik' . $komik['id']); ?>" method="POST">
                    <?= csrf_field(); ?>
                    <input type="hidden" name="_method" value="DELETE">

                    <div class="d-lg-none d-xl-none">
                        <div class="dropdown">
                            <button class="btn btn-primary dropdown-toggle no-caret" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-three-dots-vertical"></i>
                            </button>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="<?= base_url('komik/edit/' . $komik['slug']); ?>" class="dropdown-item" style="width: 100px;"><i class="bi bi-pencil-square"></i> Edit</a>
                                </li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li>
                                    <!-- Button trigger modal -->
                                    <button type="button" class="dropdown-item text-danger" data-bs-toggle="modal" data-bs-target="#deleteDataModal">
                                        <i class="bi bi-trash"></i> Delete
                                    </button>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class=" d-none d-lg-block d-xl-block">
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <a href="<?= base_url('komik/edit/' . $komik['slug']); ?>" class="btn btn-primary" style="width: 100px;"><i class="bi bi-pencil-square"></i> Edit</a>

                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteDataModal" style="width: 100px;">
                                <i class="bi bi-trash"></i> Delete
                            </button>
                        </div>
                    </div>

                    <!-- Modal -->
                    <div class="modal fade" id="deleteDataModal" tabindex="-1" aria-labelledby="deleteDataModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <h5 class="modal-title fw-bold mb-2">Delete</h5>
                                    Data will be deleted, continue?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary rounded-pill" data-bs-dismiss="modal" style="width: 100px;">No</button>
                                    <button type="submit" class="btn btn-danger rounded-pill" style="width: 100px;">Yes</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-3">
            <img src="<?= base_url('img/uploads/' . $komik['sampul']); ?>" class="mx-auto d-block img-detail rounded-4 shadow-sm object-fit-fill mb-4" alt="<?= $komik['judul']; ?>">
        </div>
        <div class="col-md-9">
            <h5 class="fw-bold mb-4"><?= $komik['judul']; ?></h5>

            <div class="table-responsive mb-4">
                <table class="table table-borderless align-middle">
                    <tr>
                        <td class="fw-bold">Author</td>
                        <td>:</td>
                        <td><?= $komik['penulis']; ?></td>
                    </tr>
                    <tr>
                        <td class="fw-bold">Publisher</td>
                        <td>:</td>
                        <td><?= $komik['penerbit']; ?></td>
                    </tr>
                    <tr>
                        <td class="fw-bold">Added on</td>
                        <td>:</td>
                        <td><?= date('l, d F Y', strtotime($komik['created_at'])); ?></td>
                    </tr>
                    <tr>
                        <td class="fw-bold">Modified on</td>
                        <td>:</td>
                        <td><?= date('l, d F Y', strtotime($komik['updated_at'])); ?></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>