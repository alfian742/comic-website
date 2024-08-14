<nav class="navbar navbar-expand-lg navbar-dark fixed-top text-primary py-0">
    <div class="container py-2 px-4 rounded-bottom-4 bg-primary">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand fw-medium" href="<?= base_url(); ?>">My Website</a>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav text-center">
                <li class="nav-item">
                    <a class="nav-link <?= ($_SERVER['REQUEST_URI'] == '/') ? 'active' : ''; ?>" href="<?= base_url(); ?>">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= ($_SERVER['REQUEST_URI'] == '/home/about') ? 'active' : ''; ?>" href="<?= base_url('home/about'); ?>">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= ($_SERVER['REQUEST_URI'] == '/home/contact') ? 'active' : ''; ?>" href="<?= base_url('home/contact'); ?>">Contact</a>
                </li>
                <?php if (logged_in()) : ?>
                    <li class="nav-item">
                        <a class="nav-link <?= ($_SERVER['REQUEST_URI'] == '/komik') ? 'active' : ''; ?>" href="<?= base_url('komik'); ?>">Comic</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= ($_SERVER['REQUEST_URI'] == '/orang') ? 'active' : ''; ?>" href="<?= base_url('orang'); ?>">People</a>
                    </li>
                <?php endif; ?>
            </ul>
            <?php if (logged_in()) : ?>
                <ul class="navbar-nav ms-auto text-center">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle rounded-pill bg-white text-dark no-caret px-2 mb-1" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <span class="small"><?= user()->fullname; ?></span>
                            <img class="rounded-circle object-fit-cover" src="<?= base_url('img/user_img/' . user()->user_img); ?>" width="24" height="24">
                        </a>
                        <ul class="dropdown-menu border-0 shadow-sm">
                            <li><a class="dropdown-item" href="<?= base_url('user'); ?>"><i class="bi bi-person-fill"></i> Profile</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item text-danger" href="#" role="button" data-bs-toggle="modal" data-bs-target="#profileModal"><i class="bi bi-chevron-left"></i> Sign Out</a></li>
                        </ul>
                    </li>
                </ul>
            <?php else : ?>
                <ul class="navbar-nav ms-auto text-center">
                    <li class="nav-item">
                        <a class="btn btn-outline-light rounded-pill" href="<?= url_to('login') ?>">Sign In</a>
                    </li>
                </ul>
            <?php endif; ?>
        </div>
    </div>
</nav>