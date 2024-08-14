<?= $this->extend($config->viewLayout) ?>
<?= $this->section('main') ?>

<div class="card-body p-0">
    <div class="row">
        <div class="col-lg-6 d-none d-lg-block">
            <div class="p-5">
                <img src="<?= base_url('assets/img/sign_up.svg'); ?>" alt="Sign Up">
            </div>
        </div>
        <div class="col-lg-6">
            <div class="p-5">
                <div class="row mb-4 pe-1">
                    <div class="col">
                        <a class="btn btn-sm btn-outline-secondary rounded-pill fw-bold" href="<?= base_url(); ?>"><i class="bi bi-chevron-left"></i> Back</a>
                    </div>
                    <div class="col">
                        <h4 class="h-4 fw-bold text-end">SIGN UP</h4>
                    </div>
                </div>

                <?= view('Myth\Auth\Views\_message_block') ?>

                <form action="<?= url_to('register') ?>" method="post">
                    <?= csrf_field() ?>
                    <div class="mb-3">
                        <input type="email" class="form-control rounded-pill fs-placeholder <?php if (session('errors.email')) : ?>is-invalid<?php endif ?>" name="email" placeholder="<?= lang('Auth.email') ?>" value="<?= old('email') ?>">
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control rounded-pill fs-placeholder <?php if (session('errors.username')) : ?>is-invalid<?php endif ?>" name="username" placeholder="<?= lang('Auth.username') ?>" value="<?= old('username') ?>">
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <input type="password" class="form-control rounded-pill fs-placeholder <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" name="password" placeholder="<?= lang('Auth.password') ?>" autocomplete="off">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <input type="password" class="form-control rounded-pill fs-placeholder <?php if (session('errors.pass_confirm')) : ?>is-invalid<?php endif ?>" name="pass_confirm" placeholder="<?= lang('Auth.repeatPassword') ?>" autocomplete="off">
                            </div>
                        </div>
                    </div>
                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-block btn-primary rounded-pill">Sign Up</button>
                    </div>
                </form>
                <hr>
                <div class="text-center">
                    <small>Already have an account?</small> <a class="btn btn-sm rounded-pill fw-bold" href="<?= url_to('login') ?>">Sign In</a>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>