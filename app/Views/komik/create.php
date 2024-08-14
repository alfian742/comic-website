<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container px-4" style="margin-top: 5rem;">
    <h2 class="fw-bold title-center mb-4"><?= $title; ?></h2>
    <form action="<?= base_url('komik/save'); ?>" method="POST" enctype="multipart/form-data">
        <?= csrf_field(); ?>
        <div class="row">
            <div class="col-md-10">
                <div class="form-group row mb-4">
                    <label for="judul" class="col-sm-2 col-form-label">Title</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= session('errors.judul') ? 'is-invalid' : ''; ?>" id="judul" name="judul" autofocus value="<?= old('judul'); ?>">
                        <div class="invalid-feedback">
                            <?= session('errors.judul') ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row mb-4">
                    <label for="penulis" class="col-sm-2 col-form-label">Author</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= session('errors.penulis') ? 'is-invalid' : ''; ?>" id="penulis" name="penulis" value="<?= old('penulis'); ?>">
                        <div class="invalid-feedback">
                            <?= session('errors.penulis') ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row mb-4">
                    <label for="penerbit" class="col-sm-2 col-form-label">Publisher</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= session('errors.penerbit') ? 'is-invalid' : ''; ?>" id="penerbit" name="penerbit" value="<?= old('penerbit'); ?>">
                        <div class="invalid-feedback">
                            <?= session('errors.penerbit') ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row mb-4">
                    <label for="sampul" class="col-sm-2 col-form-label">Cover</label>
                    <div class="col-sm-10">
                        <div class="custom-file">
                            <input type="file" class="form-control custom-file-input  <?= session('errors.sampul') ? 'is-invalid' : ''; ?>" id="sampul" name="sampul" onchange="previewImage()">
                            <div class="invalid-feedback">
                                <?= session('errors.sampul') ?>
                            </div>
                            <div>
                                <small>File name: </small>
                                <label class="custom-file-label d-inline" for="sampul"></label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <img src="<?= base_url('img/uploads/default.png'); ?>" class="img-form img-thumbnail img-preview mb-4 mx-auto">
            </div>
        </div>

        <div class="row mb-4">
            <div class="col-md-12 element-center">
                <button type="submit" class="btn btn-primary me-2" style="width: 100px;">Save</button>
                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#formModal" style="width: 100px;">Cancel</button>
            </div>
        </div>
    </form>

    <!-- Modal -->
    <div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="formModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <h5 class="modal-title fw-bold mb-2">Cancel</h5>
                    Data not saved, continue?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" style="width: 100px;">No</button>
                    <a href="<?= base_url('komik'); ?>" class="btn btn-primary" style="width: 100px;">Yes</a>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>