<?php $__env->startSection('page-title',__('site.my-placements')); ?>
<?php $__env->startSection('content'); ?>

    <?php echo $__env->make('employer.placement.placement-list',compact('employments'), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="pagination-wrapper"> <?php echo clean( $employments->appends(request()->input())->render() ); ?> </div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make($userLayout, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/re3aytk/public_html/dev/resources/views/employer/placement/placements.blade.php ENDPATH**/ ?>