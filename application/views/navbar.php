<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <i class="navbar-brand">
            <img src="<?= base_url('assets/img/logo.svg') ?>" alt="Logo" width="30px" />
        </i>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link <?= ($title == 'Dashboard') ? 'active' : ''; ?>" aria-current="page" href="<?= base_url('dashboard'); ?>">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= ($title == 'Barang') ? 'active' : ''; ?>" href="<?= base_url('barang'); ?>">Barang</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= ($title == 'Customer') ? 'active' : ''; ?>" href="<?= base_url('customer'); ?>">Customer</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= ($title == 'Transaksi') ? 'active' : ''; ?>" href="<?= base_url('transaksi'); ?>">Transaksi</a>
                </li>
            </ul>
            <span class="navbar-text">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link <?= ($title == 'Profile') ? 'active' : ''; ?>" aria-current="page" href="<?= base_url('profile'); ?>">Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('auth/logout'); ?>">Log out</a>
                    </li>
                </ul>
            </span>
        </div>
    </div>
</nav>