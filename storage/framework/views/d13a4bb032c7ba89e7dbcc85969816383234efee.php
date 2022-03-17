<?php $__env->startSection('page-title',setting('general_homepage_title')); ?>
<?php $__env->startSection('meta-description',setting('general_homepage_meta_desc')); ?>

<?php $__env->startSection('content'); ?>

    <?php if(optionActive('slideshow')): ?>
        <?php
        $count=0;
        ?>
    <!-- Start Hero Area -->
    <section class="hero-area style2">
        <!-- Single Slider -->
        <div class="hero-inner">
            <div class="home-slider">
                <?php for($i=1;$i<=10;$i++): ?>
                    <?php if(!empty(toption('slideshow','file'.$i))): ?>

                    <?php $__env->startSection('header'); ?>
                        ##parent-placeholder-594fd1615a341c77829e83ed988f137e1ba96231##

                        <style>
                            <?php if(!empty(toption('slideshow','heading_font_color'.$i))): ?>

                                            .slhc<?php echo e($i); ?>{
                                color: #<?php echo e(toption('slideshow','heading_font_color'.$i)); ?> !important;
                            }

                            <?php endif; ?>

                                        <?php if(!empty(toption('slideshow','text_font_color'.$i))): ?>
                                        .sltx<?php echo e($i); ?>{
                                color: #<?php echo e(toption('slideshow','text_font_color'.$i)); ?> !important;
                            }
                            <?php endif; ?>

                        </style>



                    <?php $__env->stopSection(); ?>


                    <div class="single-slider">
                    <div class="container">
                        <div class="row ">
                            <div class="col-lg-6 co-12">
                                <div class="inner-content">
                                    <div class="hero-text">
                                        <?php if(!empty(toption('slideshow','slide_heading'.$i))): ?>
                                        <h1 class="wow fadeInUp slhc<?php echo e($i); ?>" data-wow-delay=".3s"><?php echo clean(toption('slideshow','slide_heading'.$i)); ?>

                                        </h1>
                                        <?php endif; ?>

                                        <?php if(!empty(toption('slideshow','slide_text'.$i))): ?>
                                        <p class="wow fadeInUp sltx<?php echo e($i); ?>" data-wow-delay=".5s"><?php echo clean(toption('slideshow','slide_text'.$i)); ?></p>
                                        <?php endif; ?>

                                        <div class="button wow fadeInUp" data-wow-delay=".7s">

                                            <?php if(!empty(toption('slideshow','button_1_text_'.$i))): ?>
                                            <a href="<?php echo e(url(toption('slideshow','url_1_'.$i))); ?>" class="btn"><?php echo e(toption('slideshow','button_1_text_'.$i)); ?></a>
                                           <?php endif; ?>

                                            <?php if(!empty(toption('slideshow','button_2_text_'.$i))): ?>
                                            <a href="<?php echo e(url(toption('slideshow','url_2_'.$i))); ?>" class="btn btn-alt"><?php echo e(toption('slideshow','button_2_text_'.$i)); ?></a>
                                            <?php endif; ?>
                                        </div>


                                    </div>
                                </div>
                            </div>
                            <?php if(!empty(toption('slideshow','file'.$i))): ?>
                            <div class="col-lg-6 co-12">
                                <div class="hero-image wow fadeInRight" data-wow-delay=".4s">
                                    <img src="<?php echo e(asset(toption('slideshow','file'.$i))); ?>" alt="#">
                                </div>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

                        <?php
                        $count++;
                        ?>
                    <?php endif; ?>
                <?php endfor; ?>
            </div>
        </div>
        <!--/ End Single Slider -->
    </section>
    <!--/ End Hero Area -->

        <?php $__env->startSection('footer'); ?>
            ##parent-placeholder-d7eb6b340a11a367a1bec55e4a421d949214759f##
            <script>
                //======== Home Slider
                var slider = new tns({
                    container: '.home-slider',
                    slideBy: 'page',
                    autoplay: true,
                    autoplayButtonOutput: false,
                    mouseDrag: true,
                    gutter: 0,
                    items: 1,
                    nav: false,
                    controls: true,
                    controlsText: [
                        '<i class="lni lni-arrow-left prev"></i>',
                        '<i class="lni lni-arrow-right next"></i>'
                    ],
                    responsive: {
                        1200: {
                            items: 1,
                        },
                        992: {
                            items: 1,
                        },
                        0: {
                            items: 1,
                        }

                    }
                });
            </script>
        <?php $__env->stopSection(); ?>

    <?php endif; ?>

    <?php if(optionActive('order-prompt')): ?>
    <!-- Start Call Action Area -->
    <section class="call-action style2">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8 col-md-8 col-12">
                    <div class="text">
                        <h2><?php echo e(toption('order-prompt','text')); ?></h2>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-12">
                    <div class="button">
                        <a href="<?php echo e(route('order-forms')); ?>" class="btn"><i class="lni lni-add-files"></i> <?php echo e(__t('place-order')); ?></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /End Call Action Area -->
    <?php endif; ?>

    <?php if(optionActive('homepage-about')): ?>
    <!-- Start About Area -->
    <section class="about-us section">
        <div class="container">
            <div class="row align-items-center_ justify-content-center">
                <div class="col-lg-6 col-md-10 col-12">
                    <div class="content-left wow fadeInLeft" data-wow-delay=".3s">
                        <div calss="row">
                            <div calss="col-lg-6 col-12">
                                <div class="row">
                                    <?php if(!empty(toption('homepage-about','image_1'))): ?>
                                    <div class="col-lg-6 col-md-6 col-6">
                                        <img class="single-img" src="<?php echo e(toption('homepage-about','image_1')); ?>" alt="#">
                                    </div>
                                    <?php endif; ?>

                                    <?php if(!empty(toption('homepage-about','image_2'))): ?>
                                    <div class="col-lg-6 col-md-6 col-6">
                                        <img class="single-img mt-50" src="<?php echo e(toption('homepage-about','image_2')); ?>" alt="#">
                                    </div>
                                    <?php endif; ?>

                                </div>
                            </div>
                            <div calss="col-lg-6 col-12">
                                <div class="row">

                                    <?php if(!empty(toption('homepage-about','image_3'))): ?>
                                    <div class="col-lg-6 col-md-6 col-6">
                                        <img class="single-img" src="<?php echo e(toption('homepage-about','image_3')); ?>" alt="#">
                                    </div>
                                    <?php endif; ?>

                                    <?php if(!empty(toption('homepage-about','image_4'))): ?>
                                    <div class="col-lg-6 col-md-6 col-6">
                                        <img class="single-img mt-50" src="<?php echo e(toption('homepage-about','image_4')); ?>" alt="#">
                                    </div>
                                    <?php endif; ?>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-10 col-12">
                    <!-- content-1 start -->
                    <div class="content-right wow fadeInRight" data-wow-delay=".5s">
                        <!-- Heading -->
                        <h2><?php echo e(toption('homepage-about','heading')); ?></h2>
                        <p><?php echo toption('homepage-about','text'); ?></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End About Area -->
    <?php endif; ?>

    <?php if(optionActive('candidates')): ?>
    <!-- Start Job Category Area -->
    <section class="job-category style2 section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <span class="wow fadeInDown" data-wow-delay=".2s"><?php echo e(toption('candidates','sub_heading')); ?></span>
                        <h2 class="wow fadeInUp" data-wow-delay=".4s"><?php echo e(toption('candidates','heading')); ?></h2>
                        <p class="wow fadeInUp" data-wow-delay=".6s"><?php echo e(toption('candidates','text')); ?></p>
                    </div>
                </div>
            </div>
            <div class="cat-head">
                <div class="row">
                    <?php

                    if(toption('candidates','order')=='r'){
                        $candidates = \App\User::where('role_id',3)->inRandomOrder();
                    }
                    else{
                        $candidates = \App\User::where('role_id',3)->latest();
                    }


                    $candidates = $candidates->limit((toption('candidates','candidate_limit')==0? 5:toption('candidates','candidate_limit')));
                    $candidates = $candidates->whereHas('candidate',function($query){
                        $query->where('public',1);
                    });
                    $candidates = $candidates->get();
                    ?>
                    <?php $__currentLoopData = $candidates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-lg-3 col-md-6 col-12">
                        <a href="<?php echo e(route('profile',['candidate'=>$item->candidate->id])); ?>" class="single-cat wow fadeInUp" data-wow-delay=".2s">
                            <div class="top-side">
                                <?php if(!empty($item->candidate->picture) && file_exists($item->candidate->picture)): ?>
                                    <img  class=" img-fluid"    src="<?php echo e(asset($item->candidate->picture)); ?>" >
                                <?php elseif($item->candidate->gender=='m'): ?>
                                    <img class="img-fluid" src="<?php echo e(asset('img/man.jpg')); ?>">
                                <?php else: ?>
                                    <img class="img-fluid" src="<?php echo e(asset('img/woman.jpg')); ?>">
                                <?php endif; ?>
                            </div>
                            <div class="bottom-side">
                                <span class="available-job"><?php echo e(getAge(\Illuminate\Support\Carbon::parse($item->candidate->date_of_birth)->timestamp)); ?>/<?php echo e(gender($item->candidate->gender)); ?></span>
                                <h3><?php echo e($item->candidate->display_name); ?></h3>
                            </div>
                        </a>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </section>
    <!-- /End Job Category Area -->
    <?php endif; ?>

    <?php if(optionActive('candidate-prompt')): ?>
        <?php if(!empty(toption('candidate-prompt','bg_color'))): ?>
            <?php $__env->startSection('header'); ?>
                ##parent-placeholder-594fd1615a341c77829e83ed988f137e1ba96231##
                <style>
                    .call-action.overlay::before {
                        background-color: #<?php echo e(toption('candidate-prompt','bg_color')); ?>;
                    }
                </style>
            <?php $__env->stopSection(); ?>
        <?php endif; ?>
    <!-- Start Call Action Area -->
    <section class="call-action overlay section">
        <div class="container">
            <div class="row ">
                <div class="col-lg-8 offset-lg-2 col-12">
                    <div class="inner">
                        <div class="section-title">
                            <span class="wow fadeInDown" data-wow-delay=".2s"><?php echo e(toption('candidate-prompt','sub_heading')); ?></span>
                            <h2 class="wow fadeInUp" data-wow-delay=".4s"><?php echo e(toption('candidate-prompt','heading')); ?></h2>
                            <p class="wow fadeInUp" data-wow-delay=".6s"><?php echo e(toption('candidate-prompt','text')); ?></p>
                            <div class="button wow fadeInUp" data-wow-delay=".8s">
                                <a href="<?php echo e(route('register.candidate')); ?>" class="btn"><i class="lni lni-user"></i> <?php echo e(__t('create-profile')); ?></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /End Call Action Area -->
    <?php endif; ?>

    <?php if(optionActive('vacancies')): ?>
    <!-- Start Find Job Area -->
    <section class="find-job section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <span class="wow fadeInDown" data-wow-delay=".2s"><?php echo e(toption('vacancies','sub_heading')); ?></span>
                        <h2 class="wow fadeInUp" data-wow-delay=".4s"><?php echo e(toption('vacancies','heading')); ?></h2>
                        <p class="wow fadeInUp" data-wow-delay=".6s"><?php echo e(toption('vacancies','text')); ?></p>
                    </div>
                </div>
            </div>
            <div class="single-head">
                <div class="row">



                        <?php
                            $vacancies = \App\Vacancy::limit((toption('vacancies','limit')==0? 5:toption('vacancies','limit')));
                           $vacancies = $vacancies->where('active',1)->where(function($q){
            $q->where('closes_at','>',\Illuminate\Support\Carbon::now()->toDateTimeString())->orWhere('closes_at','');
        })->get();


                        ?>
                         <?php $__currentLoopData = $vacancies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vacancy): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                            <div class="col-lg-6 col-12">


                        <!-- Single Job -->
                        <div class="single-job wow fadeInUp pl-4 pr-4" data-wow-delay=".3s">
                            <div class="job-content">
                                <h4><a href="<?php echo e(route('view-vacancy',['vacancy'=>$vacancy->id])); ?>"><?php echo e($vacancy->title); ?></a></h4>
                                <p><?php echo e(limitLength(strip_tags($vacancy->description),200)); ?></p>
                                <ul>
                                    <li><i class="lni lni-money-protection"></i> <?php echo e($vacancy->salary); ?></li>
                                    <li><i class="lni lni-map-marker"></i> <?php echo e($vacancy->location); ?></li>
                                    <li><i class="lni lni-calendar"></i> <?php echo app('translator')->get('site.closes-on'); ?> <?php echo e(\Illuminate\Support\Carbon::parse($vacancy->closes_at)->format('d/M/Y')); ?></li>
                                </ul>
                            </div>
                            <div class="job-button">
                                <ul>
                                    <li><a href="<?php echo e(route('view-vacancy',['vacancy'=>$vacancy->id])); ?>"><?php echo e(__lang('details')); ?></a></li>
                                    <li><a class="apply_button" href="<?php echo e(route('candidate.vacancy.apply',['vacancy'=>$vacancy->id])); ?>"><?php echo e(__t('apply')); ?></a></li>
                                </ul>
                            </div>
                        </div>
                        <!-- End Single Job -->
                    </div>

                             <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>




                </div>
                <!-- Pagination -->
                <div class="row">
                    <div class="col-12 text-center mt-5">
                        <div class="button" data-wow-delay=".3s">
                            <a href="<?php echo e(route('vacancies')); ?>" class="btn"><?php echo e(__t('view-jobs')); ?></a>
                        </div>
                    </div>
                </div>
                <!--/ End Pagination -->
            </div>
        </div>
    </section>
    <!-- /End Find Job Area -->
    <?php endif; ?>

    <?php if(optionActive('testimonials')): ?>
    <!-- Start Testimonials Section -->
    <section class=" testimonials">
        <img class="patern1 wow fadeInRight" data-wow-delay=".3s" src="<?php echo e(tasset('assets/images/testimonial/patern1.png')); ?>" alt="#">
        <img class="patern2 wow fadeInLeft" data-wow-delay=".5s" src="<?php echo e(tasset('assets/images/testimonial/patern1.png')); ?>" alt="#">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-12">
                    <div class="section-title align-left wow fadeInLeft" data-wow-delay=".3s">
                        <span><?php echo e(toption('testimonials','sub_heading')); ?></span>
                        <h2><?php echo e(toption('testimonials','heading')); ?></h2>
                    </div>
                    <div class=" testimonial-inner-head wow fadeInLeft" data-wow-delay=".3s">
                        <div class=" testimonial-inner">
                            <div class="testimonial-slider">
                            <?php for($i=1;$i <= 6; $i++): ?>
                                <?php if(!empty(toption('testimonials','name'.$i))): ?>
                                <!-- Single Testimonial -->
                                <div class="single-testimonial">
                                    <div class="quote">
                                        <i class="lni lni-quotation"></i>
                                    </div>
                                    <p>"<?php echo e(toption('testimonials','text'.$i)); ?>" </p>
                                    <div class="bottom">
                                        <div class="clien-image">
                                            <?php if(!empty(toption('testimonials','image'.$i))): ?>
                                                <img  src="<?php echo e(asset(toption('testimonials','image'.$i))); ?>" >
                                            <?php else: ?>
                                                <img   src="<?php echo e(asset('img/man.jpg')); ?>">
                                            <?php endif; ?>

                                        </div>
                                        <h4 class="name"><?php echo e(toption('testimonials','name'.$i)); ?> <span><?php echo e(toption('testimonials','role'.$i)); ?></span></h4>
                                    </div>
                                </div>
                                <!--/ End Single Testimonial -->

                                    <?php endif; ?>
                                <?php endfor; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <?php if(!empty(toption('testimonials','image'))): ?>
                <div class="col-lg-6 col-12">
                    <div class="testimonial-right wow fadeInRight" data-wow-delay=".5s">
                        <img src="<?php echo e(asset(toption('testimonials','image'))); ?>" alt="#">
                    </div>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </section>
    <!-- /End Testimonials Section -->
        <?php $__env->startSection('footer'); ?>
            ##parent-placeholder-d7eb6b340a11a367a1bec55e4a421d949214759f##
            <script>
                //========= testimonial
                tns({
                    container: '.testimonial-slider',
                    items: 1,
                    slideBy: 'page',
                    autoplayButtonOutput: false,
                    autoplay: true,
                    mouseDrag: true,
                    gutter: 0,
                    nav: false,
                    controls: true,
                    controlsText: [ '<i class="lni lni-arrow-left"></i>','<i class="lni lni-arrow-right"></i>'],
                    responsive: {
                        0: {
                            items: 1,
                        },
                        540: {
                            items: 1,
                        },
                        768: {
                            items: 1,
                        },
                        992: {
                            items: 1,
                        },
                        1170: {
                            items: 1,
                        }
                    }
                });
            </script>
        <?php $__env->stopSection(); ?>
    <?php endif; ?>

    <?php if(optionActive('blog')): ?>
    <!-- Start Latest News Area -->
    <div class="latest-news-area section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <span class="wow fadeInDown" data-wow-delay=".2s"><?php echo e(toption('blog','sub_heading')); ?></span>
                        <h2 class="wow fadeInUp" data-wow-delay=".4s"><?php echo e(toption('blog','heading')); ?></h2>
                        <p class="wow fadeInUp" data-wow-delay=".6s"><?php echo e(toption('blog','text')); ?></p>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php $__currentLoopData = \App\BlogPost::whereDate('publish_date','<=',\Illuminate\Support\Carbon::now()->toDateTimeString())->where('status',1)->orderBy('publish_date','desc')->limit(intval(toption('blog','limit')))->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                <div class="col-lg-4 col-md-6 col-12">
                    <!-- Single News -->
                    <div class="single-news wow fadeInUp" data-wow-delay=".3s">
                        <?php if(!empty($post->cover_photo)): ?>
                        <div class="image">
                            <img class="thumb" src="<?php echo e(asset($post->cover_photo)); ?>" alt="#">
                        </div>
                        <?php endif; ?>
                        <div class="content-body">
                            <h4 class="title"><a href="<?php echo e(route('blog.post',['blogPost'=>$post->id])); ?>"><?php echo e($post->title); ?></a></h4>
                            <div class="meta-details">
                                <ul>
                                    <li><a href="#"><i class="lni lni-calendar"></i> <?php echo e(\Carbon\Carbon::parse($post->publish_date)->format('F d, Y')); ?></a></li>
                                    <?php if($post->user): ?>
                                    <li><a href="#"><i class="lni lni-user"></i> <?php echo e($post->user->name); ?></a></li>
                                    <?php endif; ?>
                                </ul>
                            </div>
                            <p><?php echo e(limitLength(strip_tags($post->content),200)); ?></p>
                            <div class="button">
                                <a href="<?php echo e(route('blog.post',['blogPost'=>$post->id])); ?>" class="btn"><?php echo e(__t('read-more')); ?></a>
                            </div>
                        </div>
                    </div>
                    <!-- End Single News -->
                </div>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
    <!-- End Latest News Area -->
    <?php endif; ?>

    <?php if(optionActive('clients')): ?>
    <!-- Start Clients Area -->
    <div class="client-logo-section">
        <div class="container">
            <div class="client-logo-wrapper">
                <div class="client-logo-carousel d-flex align-items-center justify-content-between">
                    <?php for($i=1;$i <= 9; $i++): ?>
                    <?php if(!empty(toption('clients','file'.$i))): ?>
                    <div class="client-logo">
                        <img src="<?php echo e(toption('clients','file'.$i)); ?>" alt="#">
                    </div>
                        <?php endif; ?>
               <?php endfor; ?>
                </div>
            </div>
        </div>
    </div>
    <!-- End Clients Area -->
        <?php $__env->startSection('footer'); ?>
            ##parent-placeholder-d7eb6b340a11a367a1bec55e4a421d949214759f##
            <script>
                //====== Clients Logo Slider
                tns({
                    container: '.client-logo-carousel',
                    slideBy: 'page',
                    autoplay: true,
                    autoplayButtonOutput: false,
                    mouseDrag: true,
                    gutter: 15,
                    nav: false,
                    controls: false,
                    responsive: {
                        0: {
                            items: 1,
                        },
                        540: {
                            items: 2,
                        },
                        768: {
                            items: 3,
                        },
                        992: {
                            items: 4,
                        },
                        1170: {
                            items: 6,
                        }
                    }
                });
            </script>
        <?php $__env->stopSection(); ?>

    <?php endif; ?>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('header'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('css/templates/bhome.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>


<?php $__env->stopSection(); ?>

<?php echo $__env->make($templateLayout, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/re3aytk/public_html/dev/public/templates/jobportal/views/site/home/index.blade.php ENDPATH**/ ?>