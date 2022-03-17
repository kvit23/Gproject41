<?php $__env->startSection('pageTitle',$title); ?>
<?php $__env->startSection('page-title',$title); ?>

<?php $__env->startSection('page-content'); ?>
    <div class="container-fluid">
        <div class="row">


            <div class="col-md-12">
                <div  >
                    <div  >
                        <a href="<?php echo e(route('admin.payment-methods')); ?>" title="<?php echo app('translator')->get('site.back'); ?>"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> <?php echo app('translator')->get('site.back'); ?></button></a>
                        <br />
                        <br />



                        <form method="POST" action="<?php echo e(route('admin.payment-methods.update',['paymentMethod'=>$paymentMethod->id])); ?>" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">

                            <?php echo e(csrf_field()); ?>

                            <?php echo $__env->make($form,$settings, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                            <div class="form-group">
                                <label for="method_label"><?php echo app('translator')->get('site.label'); ?></label>
                                <input class="form-control" type="text" name="method_label" value="<?php echo e(old('method_label',$paymentMethod->method_label)); ?>"/>
                            </div>

                            <div class="form-group">
                                <label for="sort_order"><?php echo app('translator')->get('site.sort-order'); ?></label>
                                <input class="form-control" type="text" name="sort_order" value="<?php echo e(old('sort_order',$paymentMethod->sort_order)); ?>"/>
                            </div>



                            <button class="btn btn-primary btn-block" type="submit"><?php echo app('translator')->get('site.save'); ?></button>
                        </form>

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
    <script>
        "use strict";
        $('.select2').select2();
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin-page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/re3aytk/public_html/dev/resources/views/admin/payment-methods/edit.blade.php ENDPATH**/ ?>