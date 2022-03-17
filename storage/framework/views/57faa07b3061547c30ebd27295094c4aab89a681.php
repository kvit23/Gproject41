<!DOCTYPE html>
<html lang="ar">
<head>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php if(!empty(setting('image_icon'))): ?>
        <link rel="shortcut icon" type="image/x-icon" href="<?php echo e(asset(setting('image_icon'))); ?>">
    <?php endif; ?>

    <title><?php echo $__env->yieldContent('page-title',__('site.login-register')); ?></title>

    <!-- vendor css -->
    <link href="<?php echo e(asset('themes/azia/lib/fontawesome-free/css/all.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('themes/azia/lib/ionicons/css/ionicons.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('themes/azia/lib/typicons.font/typicons.css')); ?>" rel="stylesheet">

    <!-- azia CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('themes/azia/css/azia.css')); ?>">
    <link href="<?php echo e(asset('css/fix.css')); ?>" rel="stylesheet" />

    <link rel="stylesheet" href="<?php echo e(asset('css/auth.css')); ?>">
    <?php echo $__env->yieldContent('header'); ?>

    <?php echo setting('general_header_scripts'); ?>

</head>
<body class="az-body">


<?php echo $__env->yieldContent('content'); ?>


<script src="<?php echo e(asset('themes/azia/lib/jquery/jquery.min.js')); ?>"></script>
<script src="<?php echo e(asset('themes/azia/lib/bootstrap/js/bootstrap.bundle.min.js')); ?>"></script>
<script src="<?php echo e(asset('themes/azia/lib/ionicons/ionicons.js')); ?>"></script>

<script src="<?php echo e(asset('themes/azia/js/azia.js')); ?>"></script>

<?php echo $__env->yieldContent('footer'); ?>


<?php echo setting('general_footer_scripts'); ?>

</body>

</html>
<?php /**PATH /home/re3aytk/public_html/dev/resources/views/layouts/auth.blade.php ENDPATH**/ ?>