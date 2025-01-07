<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <title><?php echo e(config('app.name', 'NOIX')); ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#ffc107">
    <meta name="secret-value" content="<?php echo e(csrf_token()); ?>">

    <link rel="shortcut icon" href="<?php echo e(asset('storage/img/favicon.ico')); ?>">

    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Index - QuickStart</title>
    <!-- Favicons -->
    <link href="<?php echo e(asset('storage/img/favicon.png')); ?>" rel="icon">
    <link href="<?php echo e(asset('storage/img/apple-touch-icon.png')); ?>" rel="apple-touch-icon">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <!-- Vendor CSS Files -->
    <link href="<?php echo e(asset('assets/vendor/bootstrap/css/bootstrap.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('assets/vendor/bootstrap-icons/bootstrap-icons.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('assets/vendor/aos/aos.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('assets/vendor/glightbox/css/glightbox.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('assets/vendor/swiper/swiper-bundle.min.css')); ?>" rel="stylesheet">
    <!-- Main CSS File -->
    <link href="<?php echo e(asset('assets/css/main.css')); ?>" rel="stylesheet">
</head>
<body class="index-page">
<noscript>
    <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-TW336KP" height="0" width="0"
            style="display:none;visibility:hidden"></iframe>
</noscript>

<?php echo $__env->yieldContent('noix-home'); ?>
<!-- Vendor JS Files -->
<script src="<?php echo e(asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/vendor/aos/aos.js')); ?>"></script>
<script src="<?php echo e(asset('assets/vendor/glightbox/js/glightbox.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/vendor/swiper/swiper-bundle.min.js')); ?>"></script>
<!-- Main JS File -->
<script src="<?php echo e(asset('assets/js/main.js')); ?>"></script>


</body>
</html>
<?php /**PATH /home/vagrant/noix/app/Containers/GreetingSection/Home/UI/WEB/Views//home-layout.blade.php ENDPATH**/ ?>