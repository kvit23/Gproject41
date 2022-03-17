<?php $__env->startSection('page-title',__('site.email-confirmation')); ?>

<?php $__env->startSection('content'); ?>

    <div class="az-signin-wrapper">

        <div class="az-card-signin">

            <a  href="<?php echo e(route('homepage')); ?>">
                <?php if(!empty(setting('image_logo'))): ?>
                    <img    class="logo"    src="<?php echo e(asset(setting('image_logo'))); ?>"   >
                <?php else: ?>
                    <h1 class="az-logo"><?php echo e(setting('general_site_name')); ?></h1>
                <?php endif; ?>
            </a>


            <div class="az-signin-header">
                <h2><?php echo app('translator')->get('site.email-confirmation'); ?></h2>
                <h4><?php echo app('translator')->get('site.confirm-your-email'); ?></h4>
                <?php echo $__env->make('partials.flash_message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <p><?php echo app('translator')->get('site.email-confirmation-text'); ?></p>
            </div><!-- az-signin-header -->

            <div class="az-signin-footer"><br/>
                <p><a class="btn btn-primary" href="<?php echo e(route('homepage')); ?>"><i class="fa fa-home"></i> <?php echo app('translator')->get('site.home'); ?></a></p>
            </div><!-- az-signin-footer -->

        </div><!-- az-card-signin -->

    </div><!-- az-signin-wrapper -->

<?php $__env->stopSection(); ?>

<?php $__env->startSection('header'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('css/admin/confirm.css')); ?>">
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/re3aytk/public_html/dev/resources/views/auth/confirm.blade.php ENDPATH**/ ?>