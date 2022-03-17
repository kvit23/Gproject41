
<?php $__env->startSection('pageTitle',__('site.add-address')); ?>
<?php $__env->startSection('page-title',__('site.add-address')); ?>
<?php $__env->startSection('route',route('user.billing-address.store')); ?>

<?php echo $__env->make('account.forms.addressform', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/re3aytk/public_html/dev/resources/views/account/account/add-address.blade.php ENDPATH**/ ?>