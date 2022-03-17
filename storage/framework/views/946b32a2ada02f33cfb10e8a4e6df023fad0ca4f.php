
<?php $__env->startSection('pageTitle',__('site.invoices')); ?>
<?php $__env->startSection('page-title',__('site.invoices')); ?>

<?php $__env->startSection('content'); ?>

<div class="card-box">
    <?php echo $__env->make('account.billing.invoice-list',['invoices'=>$invoices], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo e($invoices->links()); ?>

</div>

        <?php $__env->stopSection(); ?>
<?php echo $__env->make($userLayout, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/re3aytk/public_html/dev/resources/views/account/billing/invoices.blade.php ENDPATH**/ ?>