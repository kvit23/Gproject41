<?php $__env->startSection('page-title',setting('general_homepage_title')); ?>
<?php $__env->startSection('meta-description',setting('general_homepage_meta_desc')); ?>

<?php $__env->startSection('content'); ?>
    <?php if(optionActive('slideshow')): ?>
        <?php
        $count=0;
        ?>
    <!-- slider Area Start-->
    <div class="slider-area ">
        <!-- Mobile Menu -->
        <div class="slider-active">
            <?php for($i=1;$i<=10;$i++): ?>
                <?php if(!empty(toption('slideshow','file'.$i))): ?>

                <div class="single-slider slider-height d-flex align-items-center" data-background="<?php echo e(asset(toption('slideshow','file'.$i))); ?>">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-8">
                            <div class="hero__caption">
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
                                <?php if(!empty(toption('slideshow','slide_heading'.$i))): ?>
                                <p  <?php if(!empty(toption('slideshow','heading_font_color'.$i))): ?> class="slhc<?php echo e($i); ?>" <?php endif; ?> data-animation="fadeInLeft" data-delay=".4s"><?php echo e(toption('slideshow','slide_heading'.$i)); ?></p>
                                <?php endif; ?>

                                <?php if(!empty(toption('slideshow','slide_text'.$i))): ?>
                                <h1 <?php if(!empty(toption('slideshow','text_font_color'.$i))): ?> class="sltx<?php echo e($i); ?>" <?php endif; ?>  data-animation="fadeInLeft" data-delay=".6s" ><?php echo e(toption('slideshow','slide_text'.$i)); ?></h1>
                                <?php endif; ?>

                                <?php if(!empty(toption('slideshow','button_text'.$i))): ?>
                                <!-- Hero-btn -->
                                <div class="hero__btn" data-animation="fadeInLeft" data-delay=".8s">
                                    <a  href="<?php echo e(toption('slideshow','url'.$i)); ?>" class="btn hero-btn"><?php echo e(toption('slideshow','button_text'.$i)); ?></a>
                                </div>
                                    <?php endif; ?>
                            </div>
                        </div>
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
    <!-- slider Area End-->
    <?php endif; ?>


    <?php if(optionActive('homepage-services')): ?>
    <!-- Team-profile Start -->
    <div class="team-profile team-padding">
        <div class="container">
            <div class="row">

                <?php
                $count=0;
                ?>

                    <?php for($i=1;$i<=2;$i++): ?>
                        <?php if(!empty(toption('homepage-services','file'.$i))): ?>
                <div class="col-xl-4 col-lg-4 col-md-6">
                    <div class="single-profile mb-30">
                        <!-- Front -->
                        <div class="single-profile-front">
                            <div class="profile-img">
                                <img src="<?php echo e(asset(toption('homepage-services','file'.$i))); ?>" alt="">
                            </div>
                            <div class="profile-caption">
                                <h4><a href="#"><?php echo e(toption('homepage-services','heading'.$i)); ?></a></h4>
                                <p>
                                    <?php echo clean( toption('homepage-services','text'.$i) ); ?>

                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                        <?php endif; ?>
                    <?php endfor; ?>

                <div class="col-xl-4 col-lg-4 col-md-6">
                    <div class="single-profile mb-30">
                        <!-- Back -->
                        <div class="single-profile-back-last">
                            <h2><?php echo e(toption('homepage-services','info_heading')); ?></h2>
                            <p><?php echo clean( toption('homepage-services','info_text') ); ?></p>
                            <a href="<?php echo e(toption('homepage-services','url')); ?>"><?php echo e(toption('homepage-services','button_text')); ?> »</a>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
    <!-- Team-profile End-->
    <?php endif; ?>

    <?php if(optionActive('homepage-about')): ?>
    <!-- We Trusted Start-->
    <div class="we-trusted-area trusted-padding">
        <div class="container">
            <div class="row d-flex align-items-end">
                <?php if(!empty(toption('homepage-about','image'))): ?>
                <div class="col-xl-7 col-lg-7">
                    <div class="trusted-img">
                        <img src="<?php echo e(asset(toption('homepage-about','image'))); ?>" alt="">
                    </div>
                </div>
                <?php endif; ?>

                <div class="col-xl-5 col-lg-5">
                    <div class="trusted-caption">
                        <h2><?php echo e(toption('homepage-about','heading')); ?></h2>
                        <p><?php echo clean( toption('homepage-about','text') ); ?></p>
                        <a href="<?php echo e(toption('homepage-about','button_url')); ?>" class="btn trusted-btn"><?php echo e(toption('homepage-about','button_text')); ?></a>
                    </div>
                </div>


            </div>
        </div>

    </div>
    <!-- We Trusted End-->
    <?php endif; ?>

    <?php if(optionActive('candidates')): ?>

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



        <!-- Testimonial Start -->
        <div class="testimonial-area fix blue-bg" >
            <div class="container">
                <div class="row mt-60 mb-20">
                    <div class="col-lg-12">
                        <div class="section-tittle text-center">
                            <h2><?php echo e(toption('candidates','heading')); ?></h2>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-md-9">
                        <div class="h1-testimonial-active" id="candidateslide">

                        <?php $__currentLoopData = $candidates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <!-- Single Testimonial -->
                            <div class="single-testimonial pt-40 int_mrl50"  >
                                <!-- Testimonial tittle -->
                                <div class="testimonial-icon mb-30">
                                    <a href="<?php echo e(route('profile',['candidate'=>$item->candidate->id])); ?>">
                                    <?php if(!empty($item->candidate->picture) && file_exists($item->candidate->picture)): ?>
                                        <img  class=" ani-btn img-fluid"    src="<?php echo e(asset($item->candidate->picture)); ?>">
                                    <?php elseif($item->candidate->gender=='m'): ?>
                                        <img      class=" ani-btn img-fluid"     src="<?php echo e(asset('img/man.jpg')); ?>">
                                    <?php else: ?>
                                        <img      class=" ani-btn img-fluid"        src="<?php echo e(asset('img/woman.jpg')); ?>">
                                    <?php endif; ?>
                                    </a>
                                </div>
                                <!-- Testimonial Content -->
                                <div class="testimonial-caption_ text-center">

                                    <div class="rattiong-caption">
                                        <span><?php echo e($item->candidate->display_name); ?><span> <br/> <?php echo e(getAge(\Illuminate\Support\Carbon::parse($item->candidate->date_of_birth)->timestamp)); ?>/<?php echo e(gender($item->candidate->gender)); ?></span> </span>
                                    </div>
                                    <?php if(false): ?>
                                    <p>
                                        <a href="<?php echo e(route('profile',['candidate'=>$item->candidate->id])); ?>" class="btn btn-sm  btn-success rounded"><i class="fa fa-user"></i> <?php echo app('translator')->get('site.view-profile'); ?></a>

                                    </p>
                                        <?php endif; ?>
                                </div>
                            </div>
                            <!-- Single Testimonial -->
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Testimonial End -->




<?php $__env->startSection('footer'); ?>
    <script src="<?php echo e(asset('js/templates/bushome.js')); ?>"></script>


<?php $__env->stopSection(); ?>





   <?php endif; ?>

<?php if(optionActive('testimonials')): ?>
    <!-- Testimonial Start -->
    <div class="testimonial-area fix">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-9 col-lg-9 col-md-9">
                    <div class="h1-testimonial-active" id="testimonials">

                    <?php for($i=1;$i <= 6; $i++): ?>
                        <?php if(!empty(toption('testimonials','name'.$i))): ?>

                                <!-- Single Testimonial -->
                                <div class="single-testimonial pt-65">
                                    <!-- Testimonial tittle -->
                                    <div class="testimonial-icon mb-45">
                                        <?php if(!empty(toption('testimonials','image'.$i))): ?>
                                            <img   class="int_imgmaxwh ani-btn " src="<?php echo e(asset(toption('testimonials','image'.$i))); ?>" >
                                        <?php else: ?>
                                            <img   class="int_imgmaxwh ani-btn "    src="<?php echo e(asset('img/man.jpg')); ?>">
                                        <?php endif; ?>

                                    </div>
                                    <!-- Testimonial Content -->
                                    <div class="testimonial-caption text-center">
                                        <p><?php echo e(toption('testimonials','text'.$i)); ?></p>
                                        <!-- Rattion -->
                                        <div class="testimonial-ratting">
                                            <?php for($j=1;$j <= toption('testimonials','stars'.$i); $j++): ?>
                                            <i class="fas fa-star"></i>
                                            <?php endfor; ?>
                                        </div>
                                        <div class="rattiong-caption">
                                            <span><?php echo e(toption('testimonials','name'.$i)); ?><span> - <?php echo e(toption('testimonials','role'.$i)); ?></span> </span>
                                        </div>
                                    </div>
                                </div>

                            <?php endif; ?>
                        <?php endfor; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Testimonial End -->
<?php endif; ?>
<?php if(optionActive('blog')): ?>
    <!-- Recent Area Start -->
    <div class="recent-area section-paddingt">
        <div class="container">
            <!-- section tittle -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-tittle text-center">
                        <h2><?php echo e(toption('blog','heading')); ?></h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php $__currentLoopData = \App\BlogPost::whereDate('publish_date','<=',\Illuminate\Support\Carbon::now()->toDateTimeString())->where('status',1)->orderBy('publish_date','desc')->limit(intval(toption('blog','limit')))->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                <div class="col-xl-4 col-lg-4 col-md-6">
                    <div class="single-recent-cap mb-30">
                        <div class="recent-img">
                            <?php if(!empty($post->cover_photo)): ?>
                            <img src="<?php echo e(asset($post->cover_photo)); ?>" alt="">
                            <?php endif; ?>

                        </div>
                        <div class="recent-cap">
                            <span><?php echo e($post->title); ?></span>
                            <h4><a href="<?php echo e(route('blog.post',['blogPost'=>$post->id])); ?>"><?php echo e($post->title); ?></a></h4>
                            <p><?php echo e(\Carbon\Carbon::parse($post->publish_date)->format('F d, Y')); ?></p>
                        </div>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
    <!-- Recent Area End-->
<?php endif; ?>



<?php $__env->stopSection(); ?>

<?php $__env->startSection('header'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('css/templates/bhome.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>


<?php $__env->stopSection(); ?>

<?php echo $__env->make($templateLayout, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/re3aytk/public_html/dev/public/templates/buson/views/site/home/index.blade.php ENDPATH**/ ?>