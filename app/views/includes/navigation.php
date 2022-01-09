<!-- Navigation-->
<nav class="navbar navbar-expand-lg navbar-light" id="mainNav">
    <div class="container px-4 px-lg-5">
        <a class="navbar-brand" href="index.html">Akhmadov Bog</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            Menu
            <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ms-auto py-4 py-lg-0">
                <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="<?php echo URLROOT; ?>">Home</a></li>
                <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="<?php echo URLROOT; ?>/pages/about">About</a></li>
                <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="<?php echo URLROOT; ?>/posts">Blog</a></li>
                <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="<?php echo URLROOT; ?>/contact">Contact</a></li>
                <?php if (isset($_SESSION['user_id'])) : ?>
                    <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4"><?= $_SESSION['username'] ?></a></li>
                    <li class="btn-login nav-item"><a class="padding nav-link px-lg-3 py-3 py-lg-4" href="<?php echo URLROOT; ?>/users/logout">Logout</a></li>
                <?php else : ?>
                    <li class="btn-login nav-item"><a class="padding nav-link px-lg-3 py-3 py-lg-4" href="<?php echo URLROOT; ?>/users/login">Login</a></li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>