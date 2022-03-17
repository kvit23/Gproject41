<?php $__env->startSection('page-title',__('site.placements')); ?>

<?php $__env->startSection('content'); ?>

    <?php echo $__env->make('candidate.home.placement-list',['employments'=>$employments,'perPage'=>$perPage], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo e($employments->links()); ?>


<?php $__env->stopSection(); ?>
<?php echo $__env->make($userLayout, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/re3aytk/public_html/dev/resources/views/candidate/home/placements.blade.php ENDPATH**/ ?>