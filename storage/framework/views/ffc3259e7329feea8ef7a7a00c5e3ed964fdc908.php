<!doctype html>
<html class="no-js" lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title><?php echo $__env->yieldContent('page-title'); ?></title>
    <meta name="description" content="<?php echo $__env->yieldContent('meta-description'); ?>">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">

<?php if(!empty(setting('image_icon'))): ?>
    <!--====== Favicon Icon ======-->
        <link rel="shortcut icon" href="<?php echo e(asset(setting('image_icon'))); ?>" type="image/png">
<?php endif; ?>
    <!-- CSS here -->
    <link rel="stylesheet" href="<?php echo e(tasset('assets/css/bootstrap.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(tasset('assets/css/owl.carousel.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(tasset('assets/css/flaticon.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(tasset('assets/css/slicknav.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(tasset('assets/css/animate.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(tasset('assets/css/magnific-popup.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(tasset('assets/css/fontawesome-all.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(tasset('assets/css/themify-icons.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(tasset('assets/css/slick.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(tasset('assets/css/nice-select.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(tasset('assets/css/style')); ?>">
    <link href="<?php echo e(asset('css/fix.css')); ?>" rel="stylesheet" />

    <?php echo $__env->yieldContent('header'); ?>
    <?php echo setting('general_header_scripts'); ?>


    <?php if(optionActive('top-bar')): ?>
        <style>
            <?php if(!empty(toption('top-bar','bg_color'))): ?>
                div.top-bg{
                background-color: #<?php echo e(toption('top-bar','bg_color')); ?>;
            }
            <?php endif; ?>

                     <?php if(!empty(toption('top-bar','font_color'))): ?>
                .header-area .header-top .header-info-left ul li,.header-area .header-top .header-info-right .header-social li a, .header-area .header-top a, .header-area .header-top button{
                color: #<?php echo e(toption('top-bar','font_color')); ?>;
            }
            <?php endif; ?>

        </style>
    <?php endif; ?>


    <?php if(optionActive('navigation')): ?>
        <style>
            <?php if(!empty(toption('navigation','bg_color'))): ?>
                div.header-bottom{
                background-color: #<?php echo e(toption('navigation','bg_color')); ?>;
            }
            <?php endif; ?>

                     <?php if(!empty(toption('navigation','font_color'))): ?>
                .main-header .main-menu ul li a{
                color: #<?php echo e(toption('navigation','font_color')); ?>;
            }
            <?php endif; ?>

        </style>
    <?php endif; ?>
    <style>
        <?php if(optionActive('footer')): ?>

            <?php if(!empty(toption('footer','image'))): ?>

                    .footer-bg::before {
            background: url(<?php echo e(toption('footer','image')); ?>);
        }

        <?php endif; ?>

            <?php if(!empty(toption('footer','bg_color'))): ?>

            .footer-area,.footer-bottom-area {
            background-color: #<?php echo e(toption('footer','bg_color')); ?>;
            }

        <?php endif; ?>

            <?php if(!empty(toption('footer','font_color'))): ?>
        .footer-area .footer-tittle ul li a,.footer-area .footer-tittle h4,.footer-area .footer-social a i,.footer-bottom-area .footer-copy-right p,.footer-bottom-area .footer-copy-right p a{
            color: #<?php echo e(toption('footer','font_color')); ?>;
        }
        <?php endif; ?>

        <?php endif; ?>

            <?php if(optionActive('contact-form')): ?>
                        <?php if(!empty(toption('contact-form','bg_color'))): ?>

                                                .request-back-area {
                            background-color: #<?php echo e(toption('contact-form','bg_color')); ?>;
                        }

                        <?php endif; ?>

                       <?php if(!empty(toption('contact-form','font_color'))): ?>
                          .request-back-area .request-content p, .request-back-area, .request-back-area .request-content h3,.request-back-area,.request-back-area label{
                                            color: #<?php echo e(toption('contact-form','font_color')); ?>;
                                        }
                        <?php endif; ?>

            <?php endif; ?>

            <?php if(optionActive('page-title')): ?>
                <?php if(!empty(toption('page-title','bg_color'))): ?>
                    .slider-area{
                            background-color: #<?php echo e(toption('page-title','bg_color')); ?> ;
                        }
                <?php endif; ?>

                 <?php if(!empty(toption('page-title','font_color'))): ?>
                    .slider-area .hero-cap h2,  .slider-area a,.slider-area,.slider-area .crumb{
                        color: #<?php echo e(toption('page-title','font_color')); ?>;
                    }
                <?php endif; ?>

            <?php endif; ?>
    </style>








</head>

<body>

<!-- Preloader Start -->
<div id="preloader-active">
    <div class="preloader d-flex align-items-center justify-content-center">
        <div class="preloader-inner position-relative">
            <div class="preloader-circle"></div>
            <div class="preloader-img pere-text">
                <?php if(!empty(setting('image_logo'))): ?>
                    <img src="<?php echo e(asset(setting('image_logo'))); ?>" >
                <?php else: ?>
                    <?php echo e(setting('general_site_name')); ?>

                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<!-- Preloader Start -->

<header>
    <!-- Header Start -->
    <div class="header-area">
        <div class="main-header ">
            <?php if(optionActive('top-bar')): ?>
            <div class="header-top top-bg d-none_ d-lg-block">
                <div class="container-fluid">
                    <div class="col-xl-12">
                        <div class="row d-flex justify-content-between align-items-center">
                            <div class="header-info-left">
                                <ul>
                                    <li>


                                        <?php if(auth()->guard()->guest()): ?>

                                            <i class="fas fa-sign-in-alt"></i><a href="<?php echo e(route('login')); ?>"><?php echo app('translator')->get('site.login-register'); ?></a>

                                        <?php else: ?>

                                            <i class="fa fa-user-circle"></i><a href="<?php echo e(route('home')); ?>"><?php echo app('translator')->get('site.my-account'); ?></a> &nbsp;
                                            &nbsp; &nbsp; <i class="fa fa-sign-out-alt"></i><a  href="<?php echo e(route('logout')); ?>"
                                                                              onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" ><?php echo app('translator')->get('site.logout'); ?></a>
                                            <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST"  class="int_hide">
                                                <?php echo csrf_field(); ?>
                                            </form>
                                        <?php endif; ?>
                                    </li>
                                    <?php if(!empty(toption('top-bar','office_address'))): ?>
                                    <li class="hide-mobile"><i class="fas fa-map-marker-alt"></i><?php echo e(toption('top-bar','office_address')); ?></li>
                                    <?php endif; ?>

                                    <?php if(!empty(toption('top-bar','email'))): ?>
                                    <li class="hide-mobile"><i class="fas fa-envelope"></i><?php echo e(toption('top-bar','email')); ?></li>
                                    <?php endif; ?>

                                </ul>
                            </div>
                            <div class="header-info-right d-none d-md-block">
                                <ul class="header-social">
                                    <?php if(!empty(toption('top-bar','social_facebook'))): ?>
                                        <li><a href="<?php echo e(toption('top-bar','social_facebook')); ?>"><i class="fab fa-facebook-f"></i></a></li>
                                    <?php endif; ?>
                                    <?php if(!empty(toption('top-bar','social_twitter'))): ?>
                                        <li><a href="<?php echo e(toption('top-bar','social_twitter')); ?>"><i class="fab fa-twitter"></i></a></li>
                                    <?php endif; ?>
                                    <?php if(!empty(toption('top-bar','social_instagram'))): ?>
                                        <li><a href="<?php echo e(toption('top-bar','social_instagram')); ?>"><i class="fab fa-instagram"></i></a></li>
                                    <?php endif; ?>
                                    <?php if(!empty(toption('top-bar','social_youtube'))): ?>
                                        <li><a href="<?php echo e(toption('top-bar','social_youtube')); ?>"><i class="fab fa-youtube"></i></a></li>
                                    <?php endif; ?>
                                    <?php if(!empty(toption('top-bar','social_linkedin'))): ?>
                                        <li><a href="<?php echo e(toption('top-bar','social_linkedin')); ?>"><i class="fab fa-linkedin"></i></a></li>
                                    <?php endif; ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php endif; ?>

            <div class="header-bottom  header-sticky">
                <div class="container-fluid">
                    <div class="row align-items-center">
                        <!-- Logo -->
                        <div class="col-xl-2 col-lg-1 col-md-1">
                            <div class="logo">
                                <a href="<?php echo e(url('/')); ?>">
                                    <?php if(!empty(setting('image_logo'))): ?>
                                        <img src="<?php echo e(asset(setting('image_logo'))); ?>" >
                                    <?php else: ?>
                                        <?php echo e(setting('general_site_name')); ?>

                                    <?php endif; ?>

                                </a>
                            </div>
                        </div>
                        <div class="col-xl-8 col-lg-8 col-md-8">
                            <!-- Main-menu -->
                            <div class="main-menu f-right d-none d-lg-block">
                                <nav>
                                    <ul id="navigation">
                                        <?php $__currentLoopData = headerMenu(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <li>
                                                <a href="<?php echo e($menu['url']); ?>" ><?php echo e($menu['label']); ?></a>
                                                <?php if($menu['children']): ?>
                                                    <ul class="submenu">
                                                        <?php $__currentLoopData = $menu['children']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $childMenu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <li><a href="<?php echo e($childMenu['url']); ?>" ><?php echo e($childMenu['label']); ?></a></li>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </ul>
                                                <?php endif; ?>
                                            </li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <?php if(toption('navigation','order_button')==1): ?>
                        <div class="col-xl-2 col-lg-3 col-md-3">
                            <div class="header-right-btn f-right d-none d-lg-block">
                                <a href="<?php echo e(route('order-forms')); ?>" class="tbtn header-btn"><?php echo e(__t('place-order')); ?></a>
                            </div>
                        </div>
                    <?php endif; ?>

                        <!-- Mobile Menu -->
                        <div class="col-12">
                            <div class="mobile_menu d-block d-lg-none"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->
</header>

<main>

    <?php if (! empty(trim($__env->yieldContent('inline-title')))): ?>
        <!-- slider Area Start-->
            <div class="slider-area ">
                <!-- Mobile Menu -->
                <div class="single-slider slider-height2 d-flex align-items-center"
                     <?php if(!empty(toption('page-title','image'))): ?>
                     data-background="<?php echo e(asset(toption('page-title','image'))); ?>"
                     <?php elseif(empty(toption('page-title','bg_color'))): ?>
                     data-background="<?php echo e(tasset('assets/img/hero/contact_hero.jpg')); ?>"
                    <?php endif; ?>
                >
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="hero-cap text-center">
                                    <h2><?php echo $__env->yieldContent('inline-title'); ?></h2>
                                    <?php if (! empty(trim($__env->yieldContent('crumb')))): ?>
                                    <p class="crumb">
                                        <span><a href="<?php echo route('homepage'); ?>"><?php echo app('translator')->get('site.home'); ?></a></span>
                                        <span>/</span>
                                        <?php echo $__env->yieldContent('crumb'); ?>
                                    </p>
                                        <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- slider Area End-->
    <?php endif; ?>
<?php echo $__env->yieldContent('content'); ?>

    <!-- Request Back Start -->
    <div class="request-back-area section-padding30">
        <?php if(optionActive('contact-form')): ?>
        <div class="container">

            <div class="row d-flex justify-content-between">
                <div class="col-xl-4 col-lg-5 col-md-5">
                    <div class="request-content">
                        <h3><?php echo e(toption('contact-form','heading')); ?></h3>
                        <p><?php echo clean( toption('contact-form','text') ); ?></p>
                    </div>
                </div>
                <div class="col-xl-7 col-lg-7 col-md-7">
                    <!-- Contact form Start -->
                    <div class="form-wrapper">
                        <form id="contact-form" action="<?php echo e(route('contact.send-mail')); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-box  mb-30">
                                        <input required type="text" name="name" placeholder="<?php echo app('translator')->get('site.name'); ?>">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-box mb-30">
                                        <input required type="text" name="email" placeholder="<?php echo app('translator')->get('site.email'); ?>">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 mb-30">
                                    <div class="form-box">
                                        <textarea rows="5"   name="message" class="form-control int_btxa" required placeholder="<?php echo app('translator')->get('site.message'); ?>"><?php echo e(old('message')); ?></textarea>

                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-box mb-10">
                                        <label><?php echo app('translator')->get('site.verification'); ?></label><br/>
                                        <label for=""><?php echo clean( captcha_img() ); ?></label>
                                        <input type="text" name="captcha" placeholder="<?php echo app('translator')->get('site.verification-hint'); ?>"/>


                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <button type="submit" class="tbtn"><?php echo e(__t('send')); ?></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>     <!-- Contact form End -->
            </div>

        </div>
        <?php endif; ?>
    </div>
    <!-- Request Back End -->

</main>

<footer>
    <!-- Footer Start-->
    <div class="footer-area footer-padding">
        <div class="container">
            <div class="row d-flex justify-content-between">
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6">
                    <div class="single-footer-caption mb-50">
                        <div class="single-footer-caption mb-30">
                            <!-- logo -->
                            <div class="footer-logo">
                                <a href="<?php echo e(url('/')); ?>">
                                    <?php if(!empty(setting('image_logo'))): ?>
                                        <img src="<?php echo e(asset(setting('image_logo'))); ?>" >
                                    <?php else: ?>
                                        <?php echo e(setting('general_site_name')); ?>

                                    <?php endif; ?>
                                </a>
                            </div>
                            <div class="footer-tittle">
                                <div class="footer-pera">
                                    <p><?php echo e(toption('footer','text')); ?></p>
                                </div>
                            </div>
                            <!-- social -->
                            <div class="footer-social">

                                <?php if(!empty(toption('footer','social_facebook'))): ?>
                                  <a href="<?php echo e(toption('footer','social_facebook')); ?>"><i class="fab fa-facebook-square"></i></a>
                                <?php endif; ?>
                                <?php if(!empty(toption('footer','social_twitter'))): ?>
                                    <a href="<?php echo e(toption('footer','social_twitter')); ?>"><i class="fab fa-twitter-square"></i></a>
                                <?php endif; ?>
                                <?php if(!empty(toption('footer','social_instagram'))): ?>
                                    <a href="<?php echo e(toption('footer','social_instagram')); ?>"><i class="fab fa-instagram"></i></a>
                                <?php endif; ?>
                                <?php if(!empty(toption('footer','social_youtube'))): ?>
                                    <a href="<?php echo e(toption('footer','social_youtube')); ?>"><i class="fab fa-youtube"></i></a>
                                <?php endif; ?>
                                <?php if(!empty(toption('footer','social_linkedin'))): ?>
                                    <a href="<?php echo e(toption('footer','social_linkedin')); ?>"><i class="fab fa-linkedin"></i></a>
                                <?php endif; ?>



                            </div>
                        </div>
                    </div>
                </div>
                <?php $__currentLoopData = footerMenu(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-xl-2 col-lg-2 col-md-4 col-sm-5">
                    <div class="single-footer-caption mb-50">
                        <div class="footer-tittle">
                            <h4><?php echo e($menu['label']); ?></h4>
                            <?php if($menu['children']): ?>
                            <ul>
                                <?php $__currentLoopData = $menu['children']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $childMenu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li><a href="<?php echo e($childMenu['url']); ?>"><?php echo e($childMenu['label']); ?></a></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-5">
                    <div class="single-footer-caption mb-50">
                        <div class="footer-tittle">
                            <h4><?php echo app('translator')->get('site.contact-us'); ?></h4>
                            <ul>
                                <?php if(!empty(setting('general_tel'))): ?>
                                <li><a href="#"><?php echo e(setting('general_tel')); ?></a></li>
                                <?php endif; ?>
                                    <?php if(!empty(setting('general_contact_email'))): ?>

                                <li><a href="mailto:<?php echo clean( setting('general_contact_email') ); ?>"><?php echo clean( setting('general_contact_email') ); ?></a></li>
                                    <?php endif; ?>

                                <?php if(!empty(setting('general_address'))): ?>
                                <li><a href="#"><?php echo e(setting('general_address')); ?></a></li>
                                <?php endif; ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- footer-bottom aera -->
    <div class="footer-bottom-area footer-bg">
        <div class="container">
            <div class="footer-border">
                <div class="row d-flex align-items-center">
                    <div class="col-xl-12 ">
                        <div class="footer-copy-right text-center">
                            <p><?php echo clean( fullstop(toption('footer','credits')) ); ?> <?php echo clean( credits() ); ?>

                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End-->
</footer>

<!-- JS here -->

<!-- All JS Custom Plugins Link Here here -->
<script src="<?php echo e(tasset('assets/js/vendor/modernizr-3.5.0.min.js')); ?>"></script>
<!-- Jquery, Popper, Bootstrap -->
<script src="<?php echo e(tasset('assets/js/vendor/jquery-1.12.4.min.js')); ?>"></script>
<script src="<?php echo e(tasset('assets/js/popper.min.js')); ?>"></script>
<script src="<?php echo e(tasset('assets/js/bootstrap.min.js')); ?>"></script>
<!-- Jquery Mobile Menu -->
<script src="<?php echo e(tasset('assets/js/jquery.slicknav.min.js')); ?>"></script>

<!-- Jquery Slick , Owl-Carousel Plugins -->
<script src="<?php echo e(tasset('assets/js/owl.carousel.min.js')); ?>"></script>
<script src="<?php echo e(tasset('assets/js/slick.min.js')); ?>"></script>
<!-- Date Picker -->
<script src="<?php echo e(tasset('assets/js/gijgo.min.js')); ?>"></script>
<!-- One Page, Animated-HeadLin -->
<script src="<?php echo e(tasset('assets/js/wow.min.js')); ?>"></script>
<script src="<?php echo e(tasset('assets/js/animated.headline.js')); ?>"></script>
<script src="<?php echo e(tasset('assets/js/jquery.magnific-popup.js')); ?>"></script>

<!-- Scrollup, nice-select, sticky -->
<script src="<?php echo e(tasset('assets/js/jquery.scrollUp.min.js')); ?>"></script>
<script src="<?php echo e(tasset('assets/js/jquery.nice-select.min.js')); ?>"></script>
<script src="<?php echo e(tasset('assets/js/jquery.sticky.js')); ?>"></script>

<!-- contact js -->
<script src="<?php echo e(tasset('assets/js/contact.js')); ?>"></script>
<script src="<?php echo e(tasset('assets/js/jquery.form.js')); ?>"></script>
<script src="<?php echo e(tasset('assets/js/jquery.validate.min.js')); ?>"></script>
<script src="<?php echo e(tasset('assets/js/mail-script.js')); ?>"></script>
<script src="<?php echo e(tasset('assets/js/jquery.ajaxchimp.min.js')); ?>"></script>

<!-- Jquery Plugins, main Jquery -->
<script src="<?php echo e(tasset('assets/js/plugins.js')); ?>"></script>
<script src="<?php echo e(tasset('assets/js/main.js')); ?>"></script>
<?php echo $__env->yieldContent('footer'); ?>
<?php echo setting('general_footer_scripts'); ?>

</body>
</html>
<?php /**PATH /home/re3aytk/public_html/dev/public/templates/buson/views/layouts/layout.blade.php ENDPATH**/ ?>