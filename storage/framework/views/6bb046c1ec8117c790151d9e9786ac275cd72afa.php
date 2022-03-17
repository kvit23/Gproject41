<?php $__env->startSection('pageTitle',__('site.language')); ?>

<?php $__env->startSection('page-title'); ?>
    <?php echo app('translator')->get('site.set-language'); ?>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('page-content'); ?>

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="product-payment-inner-st">

                    <div  >
                        <div  >



                            <form class="form-inline_" method="post" action="<?php echo e(route('admin.save-language')); ?>">
                                <?php echo csrf_field(); ?>
                                <div class="form-group">
                                    <label for="config_language"><?php echo app('translator')->get('site.language'); ?></label>
                                    <select class="form-control" name="config_language" id="sms_max_pages">
                                        <?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option <?php if(old('config_language',setting('config_language'))==$value): ?> selected <?php endif; ?> value="<?php echo e($value); ?>"><?php echo e($controller->languageName($value)); ?> (<?php echo e($value); ?>)</option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary"><?php echo app('translator')->get('site.save'); ?></button>
                            </form>


                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('header'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('vendor/select2/css/select2.min.css')); ?>">

<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>
    <script src="<?php echo e(asset('vendor/select2/js/select2.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/changeseelect.js')); ?>"></script>


<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.admin-page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/re3aytk/public_html/dev/resources/views/admin/settings/language.blade.php ENDPATH**/ ?>