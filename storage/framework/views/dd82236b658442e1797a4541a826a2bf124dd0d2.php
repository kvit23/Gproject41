<?php $__env->startSection('page-title',__('site.order-complete')); ?>

<?php $__env->startSection('content'); ?>

<?php $__env->startSection('header'); ?>
    <style>
        .card {
            padding-top: 80px;
        }
    </style>
<?php $__env->stopSection(); ?>

<div class="card bd-0">
            <div class="card-header tx-medium bd-0 tx-white bg-orange">
                <i class="fa fa-info-circle"></i>  معلومات            </div><!-- card-header -->
            <div class="card-body bd bd-t-0">
         <p>
            <?php echo app('translator')->get('site.order-complete-text'); ?>
        </p>

            </div><!-- card-body -->

        </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make($templateLayout, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/re3aytk/public_html/dev/resources/views/employer/order/complete.blade.php ENDPATH**/ ?>