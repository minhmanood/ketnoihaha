<header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center">
        <a href="<?php echo base_url(); ?>" class="logo d-flex align-items-center me-auto">
            <!-- Uncomment the line below if you also wish to use an image logo -->

            <h1 class="sitename">Sports Zone</h1>
        </a>

        <nav id="navmenu" class="navmenu">
            <ul>
                <?php echo isset($html_menu_main) ? $html_menu_main : ''; ?>
            </ul>
            <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
        </nav>

        <a href="tel:<?php echo isset($info_hotline_none['content']) ? str_replace('.', '', strip_tags($info_hotline_none['content'])) : ''; ?>" class="btn-getstarted flex-md-shrink-0">
            Call center
        </a>

    </div>
</header>