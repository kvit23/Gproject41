<!DOCTYPE html>
<html class="no-js" lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title><?php echo $__env->yieldContent('page-title'); ?></title>
    <meta name="description" content="<?php echo $__env->yieldContent('meta-description'); ?>">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
<?php if(!empty(setting('image_icon'))): ?>
    <!--====== Favicon Icon ======-->
        <link rel="shortcut icon" href="<?php echo e(asset(setting('image_icon'))); ?>" type="image/png">
<?php endif; ?>
    <!-- Place favicon.ico in the root directory -->

    <!-- Web Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap"
          rel="stylesheet">

    <!-- ========================= CSS here ========================= -->
    <link rel="stylesheet" href="<?php echo e(tasset('assets/css/bootstrap.min.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(tasset('assets/css/LineIcons.2.0.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(tasset('assets/css/animate.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(tasset('assets/css/tiny-slider.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(tasset('assets/css/glightbox.min.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(tasset('assets/css/main')); ?>" />


    <?php echo $__env->yieldContent('header'); ?>
    <?php echo setting('general_header_scripts'); ?>


    <?php if(optionActive('navigation')): ?>
        <style>
            <?php if(!empty(toption('navigation','bg_color'))): ?>
                .navbar-area{
                background-color: #<?php echo e(toption('navigation','bg_color')); ?>;
            }
            <?php endif; ?>

                     <?php if(!empty(toption('navigation','font_color'))): ?>
                .navbar-nav .nav-item a:hover, .navbar-nav .nav-item a.active,.navbar-nav .nav-item a,.header .button .login{
                color: #<?php echo e(toption('navigation','font_color')); ?>;
            }
            <?php endif; ?>

        </style>
    <?php endif; ?>
    <style>
        <?php if(optionActive('footer')): ?>

            <?php if(!empty(toption('footer','image'))): ?>

                   .footer .footer-middle {
            background: url(<?php echo e(toption('footer','image')); ?>);
        }

        <?php endif; ?>

            <?php if(!empty(toption('footer','bg_color'))): ?>

            .footer .footer-middle, .footer .footer-bottom {
            background-color: #<?php echo e(toption('footer','bg_color')); ?>;
        }

        <?php endif; ?>

            <?php if(!empty(toption('footer','font_color'))): ?>
        .footer .f-about p, .footer .f-link ul li a, .footer .single-footer h3, .footer .footer-bottom .inner .right ul li a, .footer .footer-bottom .inner p, .footer .footer-bottom a, .footer .f-about .contact-address li span, .footer .f-about .contact-address li, .footer .f-about .contact-address li a{
            color: #<?php echo e(toption('footer','font_color')); ?>;
        }
        <?php endif; ?>

        <?php endif; ?>



            <?php if(optionActive('page-title')): ?>

            <?php if(!empty(toption('page-title','image'))): ?>
                .breadcrumbs{
            background-image: url("<?php echo e(asset(toption('page-title','image'))); ?>");
                }
            <?php endif; ?>

                <?php if(!empty(toption('page-title','bg_color'))): ?>
                        .breadcrumbs, .breadcrumbs.overlay::before {
                background-color: #<?php echo e(toption('page-title','bg_color')); ?> ;
            }
            <?php endif; ?>

                 <?php if(!empty(toption('page-title','font_color'))): ?>
                    .breadcrumbs .breadcrumbs-content .page-title{
            color: #<?php echo e(toption('page-title','font_color')); ?>;
        }
        <?php endif; ?>

        <?php endif; ?>
    </style>
</head>

<body>
<!--[if lte IE 9]>
<p class="browserupgrade">
    <?php echo clean(__t('browser-warning')); ?>

</p>
<![endif]-->

<div id="loading-area"></div>

<!-- Start Header Area -->
<header class="header">
    <div class="navbar-area">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <nav class="navbar navbar-expand-lg">
                        <a class="navbar-brand logo" href="<?php echo e(url('/')); ?>">
                            <?php if(!empty(setting('image_logo'))): ?>
                            <img class="logo1" src="<?php echo e(asset(setting('image_logo'))); ?>" alt="<?php echo e(setting('general_site_name')); ?>" />
                            <?php else: ?>
                                <?php echo e(setting('general_site_name')); ?>

                            <?php endif; ?>

                        </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                                data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                aria-expanded="false" aria-label="Toggle navigation">
                            <span class="toggler-icon"></span>
                            <span class="toggler-icon"></span>
                            <span class="toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent">
                            <ul id="nav" class="navbar-nav ml-auto">


                                <?php $__currentLoopData = headerMenu(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li class="nav-item">
                                        <a  <?php if(url()->full()==$menu['url']): ?>  class="active"  <?php endif; ?>   href="<?php echo e($menu['url']); ?>" ><?php echo e($menu['label']); ?></a>
                                        <?php if($menu['children']): ?>
                                            <ul class="sub-menu">
                                                <?php $__currentLoopData = $menu['children']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $childMenu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <li><a href="<?php echo e($childMenu['url']); ?>" ><?php echo e($childMenu['label']); ?></a></li>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </ul>
                                        <?php endif; ?>
                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            </ul>
                        </div>
                        <!-- navbar collapse -->
                        <div class="button">

                            <?php if(auth()->guard()->guest()): ?>
                                <a href="<?php echo e(route('login')); ?>"  class="login"><i
                                    class="lni lni-lock-alt"></i> <?php echo e(__lang('login')); ?></a>
                            <?php else: ?>
                                <a href="<?php echo e(route('home')); ?>"  class="login"><i
                                        class="lni lni-user"></i> <?php echo e(__t('account')); ?></a>
                            <?php endif; ?>

                            <?php if(toption('navigation','order_button')==1): ?>
                            <a href="<?php echo e(route('order-forms')); ?>" class="btn"> <i
                                    class="lni lni-add-files "></i> <span class="d-none d-md-inline-block"><?php echo e(__t('order-now')); ?></span> <span class="d-md-none"><?php echo e(__lang('order')); ?></span></a>
                            <?php endif; ?>

                        </div>
                    </nav>
                    <!-- navbar -->
                </div>
            </div>
            <!-- row -->
        </div>
        <!-- container -->
    </div>
    <!-- navbar area -->
</header>
<!-- End Header Area -->

<?php if (! empty(trim($__env->yieldContent('inline-title')))): ?>
    <!-- Start Breadcrumbs -->
    <div class="breadcrumbs overlay">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumbs-content">
                        <h1 class="page-title"><?php echo $__env->yieldContent('inline-title'); ?></h1>
                    </div>
                    <?php if (! empty(trim($__env->yieldContent('crumb')))): ?>
                    <ul class="breadcrumb-nav">
                        <li><a href="<?php echo route('homepage'); ?>"><?php echo app('translator')->get('site.home'); ?></a></li>
                        <?php echo $__env->yieldContent('crumb'); ?>
                    </ul>
                        <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumbs -->
<?php endif; ?>



<?php echo $__env->yieldContent('content'); ?>


<!-- Start Footer Area -->
<footer class="footer">

    <?php if(optionActive('footer-top')): ?>
    <div class="footer-top">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-lg-6 col-12">
                    <div class="download-text">
                        <h3><?php echo e(toption('footer-top','heading')); ?></h3>
                        <p><?php echo clean(toption('footer-top','text')); ?></p>
                    </div>
                </div>
                <div class="col-lg-6 col-12">
                    <div class="download-button">
                        <div class="button">
                            <?php if(toption('footer-top','profile_button')==1): ?>
                            <a class="btn" href="<?php echo e(route('profiles')); ?>"><i class="lni lni-users"></i> <?php echo e(__t('browse-profiles')); ?></a>
                            <?php endif; ?>

                            <?php if(toption('footer-top','order_button')==1): ?>
                            <a class="btn" href="<?php echo e(route('order-forms')); ?>"><i class="lni lni-add-files"></i> <?php echo e(__t('place-order')); ?></a>
                            <?php endif; ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>
    <!-- Start Middle Top -->
    <div class="footer-middle">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-12">
                    <!-- Single Widget -->
                    <div class="f-about single-footer">
                        <div class="logo">
                            <a href="<?php echo e(url('/')); ?>">

                                <?php if(!empty(setting('image_logo'))): ?>
                                    <img  src="<?php echo e(asset(setting('image_logo'))); ?>" alt="<?php echo e(setting('general_site_name')); ?>" />
                                <?php else: ?>
                                    <?php echo e(setting('general_site_name')); ?>

                                <?php endif; ?>

                            </a>
                        </div>
                        <p><?php echo e(toption('footer','text')); ?></p>

                        <div class="footer-social">
                            <ul>
                                <?php if(!empty(toption('footer','social_facebook'))): ?>
                                <li><a href="<?php echo e(toption('footer','social_facebook')); ?>"><i class="lni lni-facebook-original"></i></a></li>
                                <?php endif; ?>
                                <?php if(!empty(toption('footer','social_twitter'))): ?>
                                <li><a href="<?php echo e(toption('footer','social_twitter')); ?>"><i class="lni lni-twitter-original"></i></a></li>
                                <?php endif; ?>
                                <?php if(!empty(toption('footer','social_linkedin'))): ?>
                                <li><a href="<?php echo e(toption('footer','social_linkedin')); ?>"><i class="lni lni-linkedin-original"></i></a></li>
                                <?php endif; ?>
                                <?php if(!empty(toption('footer','social_youtube'))): ?>
                                <li><a href="<?php echo e(toption('footer','social_youtube')); ?>"><i class="lni lni-youtube"></i></a></li>
                                <?php endif; ?>
                                <?php if(!empty(toption('footer','social_instagram'))): ?>
                                <li><a href="<?php echo e(toption('footer','social_instagram')); ?>"><i class="lni lni-instagram-original"></i></a></li>
                                <?php endif; ?>

                            </ul>
                        </div>
                    </div>
                    <!-- End Single Widget -->
                </div>
                <div class="col-lg-8 col-12">
                    <div class="row">
                        <?php $__currentLoopData = footerMenu(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-lg-4 col-md-6 col-12">
                            <!-- Single Widget -->
                            <div class="single-footer f-link">
                                <h3><?php echo e($menu['label']); ?></h3>
                                <?php if($menu['children']): ?>
                                <ul>
                                    <?php $__currentLoopData = $menu['children']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $childMenu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li><a href="<?php echo e($childMenu['url']); ?>"><?php echo e($childMenu['label']); ?></a></li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                                <?php endif; ?>
                            </div>
                            <!-- End Single Widget -->
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        <div class="col-lg-4 col-md-6 col-12">
                            <!-- Single Widget -->
                            <div class="single-footer newsletter">
                                <h3><?php echo app('translator')->get('site.contact-us'); ?></h3>
                                <div class="f-about single-footer">
                                    <ul class="contact-address">
                                        <?php if(!empty(setting('general_address'))): ?>
                                        <li><span><i class="lni lni-map-marker"></i></span> <?php echo e(setting('general_address')); ?></li>
                                        <?php endif; ?>
                                        <?php if(!empty(setting('general_contact_email'))): ?>
                                        <li><span><i class="lni lni-envelope"></i></span> <a href="mailto:<?php echo clean( setting('general_contact_email') ); ?>"><?php echo clean( setting('general_contact_email') ); ?></a></li>
                                        <?php endif; ?>
                                        <?php if(!empty(setting('general_tel'))): ?>
                                        <li><span><i class="lni lni-phone"></i></span> <?php echo e(setting('general_tel')); ?></li>
                                        <?php endif; ?>


                                    </ul>
                                </div>
                            </div>
                            <!-- End Single Widget -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ End Footer Middle -->
    <!-- Start Footer Bottom -->
    <div class="footer-bottom">
        <div class="container">
            <div class="inner">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="left">
                            <p><?php echo clean( toption('footer','credits') ); ?> </p>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-12">
                        <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST"  class="int_hide">
                            <?php echo csrf_field(); ?>
                        </form>
                        <div class="right">
                            <ul>
                                <?php if(auth()->guard()->guest()): ?>
                                <li><a href="<?php echo e(route('login')); ?>"><?php echo app('translator')->get('site.login-register'); ?></a></li>
                                <?php else: ?>
                                    <li>
                                        <a href="<?php echo e(route('home')); ?>"><?php echo app('translator')->get('site.my-account'); ?></a>
                                    </li>
                                    <li>
                                        <a  href="<?php echo e(route('logout')); ?>"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" ><?php echo app('translator')->get('site.logout'); ?></a>
                                    </li>
                                <?php endif; ?>

                                <li><a href="<?php echo e(route('contact')); ?>"><?php echo e(__lang('contact')); ?></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Footer Middle -->
</footer>
<!--/ End Footer Area -->


<!-- ========================= scroll-top ========================= -->
<a href="#" class="scroll-top btn-hover">
    <i class="lni lni-chevron-up"></i>
</a>

<!-- ========================= JS here ========================= -->
<script src="<?php echo e(tasset('assets/js/bootstrap.min.js')); ?>"></script>
<script src="<?php echo e(tasset('assets/js/wow.min.js')); ?>"></script>
<script src="<?php echo e(tasset('assets/js/tiny-slider.js')); ?>"></script>
<script src="<?php echo e(tasset('assets/js/glightbox.min.js')); ?>"></script>
<script src="<?php echo e(tasset('assets/js/main.js')); ?>"></script>

<?php echo $__env->yieldContent('footer'); ?>
<?php echo setting('general_footer_scripts'); ?>





<!--Start of Tawk.to Script-->
<script type="text/javascript">
    var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
    (function(){
        var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
        s1.async=true;
        s1.src='https://embed.tawk.to/62323e32a34c2456412b69f7/1fua45tja';
        s1.charset='UTF-8';
        s1.setAttribute('crossorigin','*');
        s0.parentNode.insertBefore(s1,s0);
    })();
</script>
<!--End of Tawk.to Script-->




</body>

</html>
<?php /**PATH /home/re3aytk/public_html/public/templates/jobportal/views/layouts/layout.blade.php ENDPATH**/ ?>