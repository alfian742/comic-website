<?= $this->extend($config->viewLayout) ?>
<?= $this->section('main') ?>

<div class="card-body p-0">
	<div class="row">
		<div class="col-lg-6 d-none d-lg-block">
			<div class="p-5">
				<img src="<?= base_url('assets/img/sign_in.svg'); ?>" alt="Sign In">
			</div>
		</div>
		<div class="col-lg-6">
			<div class="p-5">
				<div class="row mb-4 pe-1">
					<div class="col">
						<a class="btn btn-sm btn-outline-secondary rounded-pill fw-bold" href="<?= base_url(); ?>"><i class="bi bi-chevron-left"></i> Back</a>
					</div>
					<div class="col">
						<h4 class="h-4 fw-bold text-end">SIGN IN</h4>
					</div>
				</div>

				<?= view('Myth\Auth\Views\_message_block') ?>

				<form action="<?= url_to('login') ?>" method="post">
					<?= csrf_field() ?>

					<?php if ($config->validFields === ['email']) : ?>

						<div class="mb-3">
							<input type="email" class="form-control rounded-pill fs-placeholder <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>" name="login" placeholder="<?= lang('Auth.email') ?>">
							<div class="invalid-feedback">
								<?= session('errors.login') ?>
							</div>
						</div>

					<?php else : ?>

						<div class="mb-3">
							<input type="text" class="form-control rounded-pill fs-placeholder <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>" name="login" placeholder="<?= lang('Auth.emailOrUsername') ?>">
							<div class="invalid-feedback">
								<?= session('errors.login') ?>
							</div>
						</div>

					<?php endif; ?>

					<div class="mb-3">
						<input type="password" name="password" class="form-control rounded-pill fs-placeholder <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" placeholder="<?= lang('Auth.password') ?>">
						<div class="invalid-feedback">
							<?= session('errors.password') ?>
						</div>
					</div>

					<?php if ($config->allowRemembering) : ?>
						<div class="mb-3 form-check">
							<input type="checkbox" class="form-check-input" name="remember" <?php if (old('remember')) : ?> checked <?php endif ?> id="exampleCheck">
							<label class="form-check-label" for="exampleCheck"><?= lang('Auth.rememberMe') ?></label>
						</div>
					<?php endif; ?>

					<div class="d-grid gap-2">
						<button type="submit" class="btn btn-block btn-primary rounded-pill">Sign In</button>
					</div>
				</form>

				<hr>

				<?php if ($config->allowRegistration) : ?>
					<div class="text-center">
						<small>Don't have an account?</small> <a class="btn btn-sm rounded-pill fw-bold" href="<?= url_to('register') ?>">Sing Up</a>
					</div>
				<?php endif; ?>

			</div>
		</div>
	</div>
</div>

<?= $this->endSection() ?>