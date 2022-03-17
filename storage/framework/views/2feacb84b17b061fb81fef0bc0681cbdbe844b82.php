<?php $__env->startSection('page-title',__('site.contact-us')); ?>
<?php $__env->startSection('inline-title',__('site.contact-us')); ?>
<?php $__env->startSection('crumb'); ?>
    <li><?php echo e(__('site.contact-us')); ?></li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>


    <!-- Start Contact Area -->
    <section id="contact-us" class="contact-us section">
        <div class="container">
            <div class="contact-head wow fadeInUp" data-wow-delay=".4s">
                <div class="row">
                    <div class="col-lg-7 col-12">
                        <div class="form-main">
                            <form class="form"  action="<?php echo e(route('contact.send-mail')); ?>" method="post" >
                                <?php echo csrf_field(); ?>
                                <div class="row">
                                    <div class="col-lg-6 col-12">
                                        <div class="form-group">
                                            <input name="name" type="text" placeholder="<?php echo e(__t('enter-your-name')); ?>" required="required">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-12">
                                        <div class="form-group">
                                            <input name="email" type="email" placeholder="<?php echo e(__t('enter-email')); ?>"
                                                   required="required">
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-12">
                                        <div class="form-group">
                                            <input name="subject" type="text" placeholder="<?php echo e(__t('enter-subject')); ?>"
                                                   required="required">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group message">
                                            <textarea name="message" placeholder="<?php echo e(__t('enter-message')); ?>"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <label><?php echo app('translator')->get('site.verification'); ?></label><br/>
                                        <label class="mb-3"><?php echo clean( captcha_img() ); ?></label> <br>
                                        <div class="form-group">
                                        <input  type="text" name="captcha" placeholder="<?php echo app('translator')->get('site.verification-hint'); ?>"/>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group button">
                                            <button type="submit" class="btn "><?php echo e(__t('send')); ?></button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-5 col-12">
                        <div class="single-head">
                            <div class="contant-inner-title">
                                <h4><?php echo e(toption('contact-page','heading')); ?></h4>
                                <p><?php echo e(toption('contact-page','text')); ?></p>
                            </div>
                            <?php if(!empty(setting('general_tel'))): ?>
                            <div class="single-info">
                                <i class="lni lni-phone"></i>
                                <ul>
                                    <li><?php echo e(setting('general_tel')); ?></li>
                                </ul>
                            </div>
                            <?php endif; ?>
                            <?php if(!empty(setting('general_contact_email'))): ?>
                            <div class="single-info">
                                <i class="lni lni-envelope"></i>
                                <ul>
                                    <li><a href="mailto:<?php echo clean( setting('general_contact_email') ); ?>"><?php echo clean( setting('general_contact_email') ); ?></a></li>
                                </ul>
                            </div>
                            <?php endif; ?>
                            <?php if(!empty(setting('general_address'))): ?>
                            <div class="single-info">
                                <i class="lni lni-map"></i>
                                <ul>
                                    <li><?php echo e(setting('general_address')); ?></li>
                                </ul>
                            </div>
                            <?php endif; ?>
                            <div class="contact-social">
                                <h5><?php echo e(__t('follow-us')); ?></h5>
                                <ul>
                                    <?php if(!empty(toption('contact-page','social_facebook'))): ?>
                                        <li><a href="<?php echo e(toption('contact-page','social_facebook')); ?>"><i class="lni lni-facebook-original"></i></a></li>
                                    <?php endif; ?>
                                    <?php if(!empty(toption('contact-page','social_twitter'))): ?>
                                        <li><a href="<?php echo e(toption('contact-page','social_twitter')); ?>"><i class="lni lni-twitter-original"></i></a></li>
                                    <?php endif; ?>
                                    <?php if(!empty(toption('contact-page','social_linkedin'))): ?>
                                        <li><a href="<?php echo e(toption('contact-page','social_linkedin')); ?>"><i class="lni lni-linkedin-original"></i></a></li>
                                    <?php endif; ?>
                                    <?php if(!empty(toption('contact-page','social_youtube'))): ?>
                                        <li><a href="<?php echo e(toption('contact-page','social_youtube')); ?>"><i class="lni lni-youtube"></i></a></li>
                                    <?php endif; ?>
                                    <?php if(!empty(toption('contact-page','social_instagram'))): ?>
                                        <li><a href="<?php echo e(toption('contact-page','social_instagram')); ?>"><i class="lni lni-instagram-original"></i></a></li>
                                    <?php endif; ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php if(toption('contact-page','google_map')==1): ?>
        <!-- Start Google-map Area -->
        <div class="map-section">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="map-container">
                            <div class="mapouter">
                                <div class="gmap_canvas"><iframe width="100%" height="400" id="gmap_canvas"
                                                                 src="https://maps.google.com/maps?q=<?php echo urlencode(toption('contact-page','map_address')); ?>&ie=UTF8&iwloc=&output=embed"
                                                                 frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
                                    <style>
                                        .mapouter {
                                            position: relative;
                                            text-align: right;
                                            height: 400px;
                                            width: 100%;
                                        }

                                        .gmap_canvas {
                                            overflow: hidden;
                                            background: none !important;
                                            height: 400px;
                                            width: 100%;
                                        }
                                    </style>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Google-map Area -->
            <?php endif; ?>

    </section>
    <!--/ End Contact Area -->


    <?php if(false): ?>
    <!-- ================ contact section start ================= -->
    <section class="contact-section">
        <div class="container">

            <div class="row">
                <div class="col-12">
                    <h2 class="contact-title"><?php echo app('translator')->get('site.get-in-touch-text'); ?></h2>
                </div>
                <div class="col-lg-8">
                    <form class="form-contact contact_form_" action="<?php echo e(route('contact.send-mail')); ?>" method="post" >
                        <?php echo csrf_field(); ?>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <textarea required class="form-control w-100" name="message" id="message" cols="30" rows="9" onfocus="this.placeholder = ''" onblur="this.placeholder = '<?php echo e(addslashes(__t('enter-message'))); ?>'" placeholder=" <?php echo e(__t('enter-message')); ?>"></textarea>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input required  class="form-control valid" name="name" id="name" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = '<?php echo e(addslashes(__t('enter-your-name'))); ?>'" placeholder="<?php echo e(__t('enter-your-name')); ?>">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input required  class="form-control valid" name="email" id="email" type="email" onfocus="this.placeholder = ''" onblur="this.placeholder = '<?php echo e(addslashes(__t('enter-email'))); ?>'" placeholder="<?php echo e(__t('enter-email')); ?>">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <input class="form-control" name="subject" id="subject" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = '<?php echo e(addslashes(__t('enter-subject'))); ?>'" placeholder="<?php echo e(__t('enter-subject')); ?>">
                                </div>
                            </div>

                            <div class="col-12">
                                <label><?php echo app('translator')->get('site.verification'); ?></label><br/>
                                <label for=""><?php echo clean( captcha_img() ); ?></label>
                                <input class="form-control" type="text" name="captcha" placeholder="<?php echo app('translator')->get('site.verification-hint'); ?>"/>

                            </div>
                        </div>
                        <div class="form-group mt-3">
                            <button type="submit" class="button button-contactForm boxed-btn"><?php echo e(__t('send')); ?></button>
                        </div>
                    </form>
                </div>
                <div class="col-lg-3 offset-lg-1">
                    <div class="media contact-info">
                        <span class="contact-info__icon"><i class="ti-home"></i></span>
                        <div class="media-body">
                            <h3><?php echo app('translator')->get('site.address'); ?></h3>
                            <p><?php echo e(setting('general_address')); ?></p>
                        </div>
                    </div>
                    <div class="media contact-info">
                        <span class="contact-info__icon"><i class="ti-tablet"></i></span>
                        <div class="media-body">
                            <h3><?php echo app('translator')->get('site.telephone'); ?></h3>
                            <p><?php echo e(setting('general_tel')); ?></p>
                        </div>
                    </div>
                    <div class="media contact-info">
                        <span class="contact-info__icon"><i class="ti-email"></i></span>
                        <div class="media-body">
                            <h3><?php echo app('translator')->get('site.email'); ?></h3>
                            <p><?php echo clean( setting('general_contact_email') ); ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ================ contact section end ================= -->

    <?php endif; ?>






<?php $__env->stopSection(); ?>

<?php echo $__env->make($templateLayout, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/re3aytk/public_html/dev/public/templates/jobportal/views/site/home/contact.blade.php ENDPATH**/ ?>