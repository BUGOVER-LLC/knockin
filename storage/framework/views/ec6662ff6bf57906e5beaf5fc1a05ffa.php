<div class="container-fluid container-xl position-relative d-flex align-items-center">
    <a href="/" class="logo d-flex align-items-center me-auto">
        <img src="<?php echo e(asset('storage/img/logo.png')); ?>" alt="">
        <h1 class="sitename">QuickStart</h1>
    </a>

    <nav id="navmenu" class="navmenu">
        <ul>
            <li class="dropdown"><a href="#"><span>Features</span> <i
                        class="bi bi-chevron-down toggle-dropdown"></i></a>
                <ul>
                    <li><a href="#">Dropdown 1</a></li>
                    <li class="dropdown"><a href="#"><span>Deep Dropdown</span> <i
                                class="bi bi-chevron-down toggle-dropdown"></i></a>
                        <ul>
                            <li><a href="#">Deep Dropdown 1</a></li>
                            <li><a href="#">Deep Dropdown 2</a></li>
                            <li><a href="#">Deep Dropdown 3</a></li>
                            <li><a href="#">Deep Dropdown 4</a></li>
                            <li><a href="#">Deep Dropdown 5</a></li>
                        </ul>
                    </li>
                    <li><a href="#">Dropdown 2</a></li>
                    <li><a href="#">Dropdown 3</a></li>
                    <li><a href="#">Dropdown 4</a></li>
                </ul>
            </li>
            <li><a href="/pricing">Pricing</a></li>
            <li><a href="/contact">Contact</a></li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
    </nav>

    <a class="btn-getstarted" href="#about">Get Started</a>
</div>
<?php /**PATH /home/vagrant/noix/app/Containers/GreetingSection/Home/UI/WEB/Views//components/header.blade.php ENDPATH**/ ?>