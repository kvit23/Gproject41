<!DOCTYPE html>
<html lang="ar">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Meta -->
    <meta name="description" content="<?php echo $__env->yieldContent('meta-description'); ?>">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <meta name="author" content="">

    <title><?php echo $__env->yieldContent('page-title',__('site.candidate-dashboard')); ?></title>
    <?php if(!empty(setting('image_icon'))): ?>
        <link rel="shortcut icon" type="image/x-icon" href="<?php echo e(asset(setting('image_icon'))); ?>">
        <?php endif; ?>

                <!-- vendor css -->
        <link href="<?php echo e(asset('themes/azia/lib/fontawesome-free/css/all.min.css')); ?>" rel="stylesheet">
        <link href="<?php echo e(asset('themes/azia/lib/ionicons/css/ionicons.min.css')); ?>" rel="stylesheet">
        <link href="<?php echo e(asset('themes/azia/lib/typicons.font/typicons.css')); ?>" rel="stylesheet">
        <link href="<?php echo e(asset('themes/azia/lib/morris.js/morris.css')); ?>" rel="stylesheet">
        <link href="<?php echo e(asset('themes/azia/lib/flag-icon-css/css/flag-icon.min.css')); ?>" rel="stylesheet">
        <link href="<?php echo e(asset('themes/azia/lib/jqvmap/jqvmap.min.css')); ?>" rel="stylesheet">

        <!-- azia CSS -->
        <link rel="stylesheet" href="<?php echo e(asset('themes/azia/css/azia.css')); ?>">
    <link href="<?php echo e(asset('css/fix.css')); ?>" rel="stylesheet" />

    <?php echo $__env->yieldContent('header'); ?>
        <?php echo setting('general_header_scripts'); ?>

</head>
<body class="az-body az-body-sidebar">

<div class="az-sidebar">
    <div class="az-sidebar-header">
        <a href="<?php echo e(url('/')); ?>" class="az-logo"><span></span>
            <?php if(!empty(setting('image_logo'))): ?>
                <img src="<?php echo e(asset(setting('image_logo'))); ?>" class="navbar-brand-img" >
            <?php else: ?>
                <?php echo e(setting('general_site_name')); ?>

            <?php endif; ?>
        </a>


    </div><!-- az-sidebar-header -->
    <div class="az-sidebar-loggedin">
        <div class="az-img-user online"><img src="<?php echo e(userPic(Auth::user()->id)); ?>" alt=""></div>
        <div class="media-body">
            <h6><?php echo e(Auth::user()->name); ?></h6>
            <span><?php echo e(roleName(Auth::user()->role_id)); ?></span>
        </div><!-- media-body -->
    </div><!-- az-sidebar-loggedin -->
    <div class="az-sidebar-body">
        <ul class="nav">
            <li class="nav-label"><?php echo app('translator')->get('site.main-menu'); ?></li>
            <li class="nav-item">
                <a href="<?php echo e(route('candidate.dashboard')); ?>" class="nav-link"><i class="fa fa-tachometer-alt"></i>&nbsp; <?php echo app('translator')->get('site.dashboard'); ?></a>
            </li><!-- nav-item -->
            <li class="nav-item">
                <a href="<?php echo e(route('vacancies')); ?>" class="nav-link"><i class="fa fa-clipboard-list"></i>&nbsp; <?php echo app('translator')->get('site.vacancies'); ?></a>
            </li><!-- nav-item -->
            <li class="nav-item">
                <a href="<?php echo e(route('candidate.applications')); ?>" class="nav-link"><i class="fa fa-clipboard"></i>&nbsp; <?php echo app('translator')->get('site.applications'); ?></a>
            </li><!-- nav-item -->
            <li class="nav-item">
                <a href="<?php echo e(route('candidate.placements')); ?>" class="nav-link"><i class="fa fa-user-friends"></i>&nbsp; <?php echo app('translator')->get('site.placements'); ?></a>
            </li><!-- nav-item -->
            <li class="nav-item">
                <a href="<?php echo e(route('candidate.tests')); ?>" class="nav-link"><i class="fa fa-question-circle"></i>&nbsp; <?php echo app('translator')->get('site.tests'); ?></a>
            </li><!-- nav-item -->
            <li class="nav-item">
                <a href="<?php echo e(route('user.billing.invoices')); ?>" class="nav-link"><i class="fa fa-file-invoice-dollar"></i>&nbsp; <?php echo app('translator')->get('site.invoices'); ?></a>
            </li><!-- nav-item -->
            <li class="nav-item">
                <a href="<?php echo e(route('user.contract.index')); ?>" class="nav-link"><i class="fa fa-handshake"></i>&nbsp; <?php echo app('translator')->get('site.contracts'); ?></a>
            </li><!-- nav-item -->
            <li class="nav-item">
                <a href="#" class="nav-link with-sub"><i class="fa fa-id-card-alt"></i>&nbsp; <?php echo app('translator')->get('site.profile'); ?></a>
                <ul class="nav-sub">
                    <li class="nav-sub-item"><a href="<?php echo e(route('candidate.profile')); ?>" class="nav-sub-link"><?php echo app('translator')->get('site.account-details'); ?></a></li>
                    <li class="nav-sub-item"><a href="<?php echo e(route('user.password')); ?>" class="nav-sub-link"><?php echo app('translator')->get('site.change-password'); ?></a></li>
                    <li class="nav-sub-item"><a href="<?php echo e(route('user.billing-address.index')); ?>" class="nav-sub-link"><?php echo app('translator')->get('site.billing-addresses'); ?></a></li>

                </ul>
            </li><!-- nav-item -->


        </ul><!-- nav -->
    </div><!-- az-sidebar-body -->
</div><!-- az-sidebar -->

<div class="az-content az-content-dashboard-two">
    <div class="az-header">
        <div class="container-fluid">
            <div class="az-header-left">
                <a href="#" id="azSidebarToggle" class="az-header-menu-icon"><span></span></a>
            </div><!-- az-header-left -->


            <div class="az-header-right">

                <?php if(session()->has('invoice') && \App\Invoice::find(session()->get('invoice'))): ?>
                    <div class="az-header-message">
                        <a href="<?php echo e(route('user.invoice.cart')); ?>"><i class="fa fa-cart-plus"></i> <small><?php echo e(price(\App\Invoice::find(session()->get('invoice'))->amount)); ?></small></a>
                    </div>
                <?php endif; ?>
                <div class="dropdown az-profile-menu">
                    <a href="#" class="az-img-user"><img src="<?php echo e(userPic(Auth::user()->id)); ?>" alt=""></a>
                    <div class="dropdown-menu">
                        <div class="az-dropdown-header d-sm-none">
                            <a href="#" class="az-header-arrow"><i class="icon ion-md-arrow-back"></i></a>
                        </div>
                        <div class="az-header-profile">
                            <div class="az-img-user">
                                <img src="<?php echo e(userPic(Auth::user()->id)); ?>" alt="">
                            </div><!-- az-img-user -->
                            <h6><?php echo e(Auth::user()->name); ?></h6>
                            <span><?php echo e(roleName(Auth::user()->role_id)); ?></span>
                        </div><!-- az-header-profile -->

                        <a href="<?php echo e(route('home')); ?>" class="dropdown-item"><i class="fa fa-sign-in-alt"></i> <?php echo app('translator')->get('site.dashboard'); ?></a>
                        <a href="<?php echo e(route('user.profile')); ?>" class="dropdown-item"><i class="fa fa-user"></i> <?php echo app('translator')->get('site.my-profile'); ?></a>
                        <a href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" class="dropdown-item"><i class="typcn typcn-power-outline"></i> <?php echo app('translator')->get('site.sign-out'); ?></a>

                        <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="int_hide">
                            <?php echo csrf_field(); ?>
                        </form>
                    </div><!-- dropdown-menu -->
                </div>
            </div><!-- az-header-right -->
        </div><!-- container -->
    </div><!-- az-header -->
    <div class="az-content-header d-block d-md-flex">
        <div>
            <h2 class="az-content-title tx-24 mg-b-5 mg-b-lg-8"><?php echo $__env->yieldContent('page-title'); ?></h2>
            <p class="mg-b-0"><?php echo $__env->yieldContent('page-subtile'); ?></p>
        </div>
        <?php if (! empty(trim($__env->yieldContent('breadcrumb')))): ?>
        <div class="az-dashboard-header-right">

            <ol class="breadcrumb breadcrumb-style1 mg-b-0">
                <li class="breadcrumb-item"><a href="<?php echo e(route('candidate.dashboard')); ?>"><i class="fas fa-home"></i></a></li>
                <?php echo $__env->yieldContent('breadcrumb'); ?>
            </ol>

        </div><!-- az-dashboard-header-right -->
        <?php endif; ?>


    </div><!-- az-content-header -->
    <div class="az-content-body <?php echo $__env->yieldContent('content-class'); ?>">
        <?php echo $__env->make('partials.flash_message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->yieldContent('content'); ?>
    </div><!-- az-content-body -->
    <div class="az-footer ht-40">
        <div class="container-fluid pd-t-0-f ht-100p">
            <span>&copy; <?php echo e(date('Y')); ?> <?php echo e(setting('general_site_name')); ?></span>
        </div><!-- container -->
    </div><!-- az-footer -->
</div><!-- az-content -->


<script src="<?php echo e(asset('themes/azia/lib/jquery/jquery.min.js')); ?>"></script>
<script src="<?php echo e(asset('themes/azia/lib/bootstrap/js/bootstrap.bundle.min.js')); ?>"></script>
<script src="<?php echo e(asset('themes/azia/lib/ionicons/ionicons.js')); ?>"></script>
<script src="<?php echo e(asset('themes/azia/lib/jquery-sparkline/jquery.sparkline.min.js')); ?>"></script>
<script src="<?php echo e(asset('themes/azia/lib/raphael/raphael.min.js')); ?>"></script>
<script src="<?php echo e(asset('themes/azia/lib/morris.js/morris.min.js_')); ?>"></script>
<script src="<?php echo e(asset('themes/azia/lib/jqvmap/jquery.vmap.min.js')); ?>"></script>
<script src="<?php echo e(asset('themes/azia/lib/jqvmap/maps/jquery.vmap.usa.js')); ?>"></script>

<script src="<?php echo e(asset('themes/azia/js/azia.js')); ?>"></script>

<script src="<?php echo e(asset('js/candidate.js')); ?>"></script>


<?php echo $__env->yieldContent('footer'); ?>
<?php echo setting('general_footer_scripts'); ?>

</body>

</html>
<?php /**PATH /home/re3aytk/public_html/dev/resources/views/layouts/candidate.blade.php ENDPATH**/ ?>