<?php $__env->startSection('noix-home'); ?>
    <header id="header" class="header d-flex align-items-center fixed-top">
        <?php echo $__env->make('greetingSection@home::components.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </header>

    <main class="main">
        <?php echo $__env->yieldContent('main-content'); ?>
    </main>

    <footer id="footer" class="footer position-relative light-background">
        <?php echo $__env->make('greetingSection@home::components.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </footer>

    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <div id="preloader"></div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('greetingSection@home::home-layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/vagrant/noix/app/Containers/GreetingSection/Home/UI/WEB/Views//index.blade.php ENDPATH**/ ?>