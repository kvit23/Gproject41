<?php $__env->startSection('pageTitle',__('site.import-employer')); ?>
<?php $__env->startSection('page-title',__('site.import-employer')); ?>

<?php $__env->startSection('page-content'); ?>

    <div class="container-fluid" >
        <div class="row justify-content-center mt-0">
            <div class="text-center p-0 mt-3 mb-2 int_hpw" >
                <div class="px-0 pt-4 pb-0 mt-3 mb-3">
                    <div class="row">
                        <div class="col-md-12 mx-0">

                                <!-- progressbar -->
                                <ul id="progressbar">
                                    <li <?php if($active==1): ?> class="active" <?php endif; ?> id="account"><a href="<?php echo e(route('admin.employers.import-1')); ?>"><strong><?php echo app('translator')->get('site.upload-file'); ?></strong></a></li>
                                    <li <?php if($active==2): ?> class="active" <?php endif; ?>   id="personal"><a href="<?php echo e(route('admin.employers.import-2')); ?>"><strong><?php echo app('translator')->get('site.set-fields'); ?></strong></a></li>
                                    <li <?php if($active==3): ?> class="active" <?php endif; ?>  id="payment"><a href="<?php echo e(route('admin.employers.import-preview')); ?>"><strong><?php echo app('translator')->get('site.preview'); ?></strong></a></li>
                                    <li <?php if($active==4): ?> class="active" <?php endif; ?>  id="confirm"><a href="<?php echo e(route('admin.employers.import-complete')); ?>"><strong><?php echo app('translator')->get('site.complete'); ?></strong></a></li>
                                </ul> <!-- fieldsets -->

                                <?php echo $__env->yieldContent('form-content'); ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('header'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('css/admin/importlayout.css')); ?>">

    <?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.admin-page-wide', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/re3aytk/public_html/dev/resources/views/admin/employers/import-layout.blade.php ENDPATH**/ ?>