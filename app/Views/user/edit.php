<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container px-4" style="margin-top: 5rem;">
    <h2 class="fw-bold title-center">Edit Profile</h2>
    <form action="<?= base_url('user/update'); ?>" method="POST" enctype="multipart/form-data">
        <?= csrf_field(); ?>
        <input type="hidden" name="id" value="<?= user()->id; ?>">
        <input type="hidden" name="oldUserImage" value="<?= user()->user_img; ?>">

        <div class="row">
            <div class="col-md-10">
                <div class="form-group row my-3">
                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control bg-light <?= session('errors.email') ? 'is-invalid' : ''; ?>" id="email" name="email" value="<?= old('email') ? old('email') : user()->email; ?>" readonly>
                        <div class="invalid-feedback">
                            <?= session('errors.email') ?>
                        </div>
                    </div>
                </div>

                <div class="form-group row my-3">
                    <label for="username" class="col-sm-2 col-form-label">Username</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control bg-light <?= session('errors.username') ? 'is-invalid' : ''; ?>" id="username" name="username" value="<?= old('username') ? old('username') : user()->username; ?>" readonly>
                        <div class="invalid-feedback">
                            <?= session('errors.username') ?>
                        </div>
                    </div>
                </div>

                <div class="form-group row my-3">
                    <label for="fullname" class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= session('errors.fullname') ? 'is-invalid' : ''; ?>" id="fullname" name="fullname" value="<?= old('fullname') ? old('fullname') : user()->fullname; ?>">
                        <div class="invalid-feedback">
                            <?= session('errors.fullname') ?>
                        </div>
                    </div>
                </div>

                <div class="form-group row my-3">
                    <label for="user_img" class="col-sm-2 col-form-label">Profile Picture</label>
                    <div class="col-sm-10">
                        <div class="custom-file">
                            <input type="file" class="form-control custom-file-input <?= session('errors.user_img') ? 'is-invalid' : ''; ?>" id="user_img" name="user_img" onchange="previewImage()">
                            <div class="invalid-feedback">
                                <?= session('errors.user_img') ?>
                            </div>
                            <div>
                                <small>File name:</small>
                                <label class="custom-file-label d-inline" for="user_img"><?= user()->user_img; ?></label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-2">
                <img src="<?= base_url('img/user_img/' . user()->user_img); ?>" class="img-profile rounded-circle shadow-sm img-preview my-3 mx-auto object-fit-cover" height="150" width="150">
            </div>
        </div>

        <div class="row my-3">
            <div class="col-md-12 element-center">
                <button type="submit" class="btn btn-primary me-2" style="width: 100px;">Save</button>
                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#editProfileModal" style="width: 100px;">Cancel</button>
            </div>
        </div>
    </form>

    <!-- Modal -->
    <div class="modal fade" id="editProfileModal" tabindex="-1" aria-labelledby="editProfileModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <h5 class="modal-title fw-bold mb-2">Cancel</h5>
                    Data not saved, continue?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" style="width: 100px;">No</button>
                    <a href="<?= base_url('user'); ?>" class="btn btn-primary" style="width: 100px;">Yes</a>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>