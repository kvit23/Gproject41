<?php $__env->startSection('page-title',__('site.interviews')); ?>
<?php $__env->startSection('content'); ?>
<?php echo $__env->make('employer.interview.interview-list',['interviews'=>$interviews], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <br/>
    <?php echo e($interviews->links()); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('header'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('css/interview.css')); ?>">

<?php $__env->stopSection(); ?>

<?php echo $__env->make($userLayout, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/re3aytk/public_html/dev/resources/views/employer/interview/interviews.blade.php ENDPATH**/ ?>