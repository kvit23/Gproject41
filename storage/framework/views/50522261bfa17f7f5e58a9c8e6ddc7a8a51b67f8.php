<?php $__env->startSection('page-title',__('site.tests')); ?>

<?php $__env->startSection('content'); ?>

    <?php echo $__env->make('candidate.test.test-list',['tests'=>$tests], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo e($tests->links()); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make($userLayout, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/re3aytk/public_html/dev/resources/views/candidate/test/index.blade.php ENDPATH**/ ?>