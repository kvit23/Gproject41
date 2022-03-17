<?php $__env->startSection('page-title',__('site.applications')); ?>

<?php $__env->startSection('content'); ?>

    <?php echo $__env->make('candidate.home.application-list',['applications'=>$applications,'perPage'=>$perPage], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo e($applications->links()); ?>


<?php $__env->stopSection(); ?>
<?php echo $__env->make($userLayout, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/re3aytk/public_html/dev/resources/views/candidate/home/applications.blade.php ENDPATH**/ ?>