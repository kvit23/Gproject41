<div class="table-responsive">
<table class="table">
    <thead>
    <tr>
        <th>#</th>
        <th><?php echo app('translator')->get('site.added-on'); ?></th>
        <th><?php echo app('translator')->get('site.interview-date'); ?></th>
        <th><?php echo app('translator')->get('site.status'); ?></th>
        <th><?php echo app('translator')->get('site.shortlist'); ?></th>
        <th><?php echo app('translator')->get('site.comments'); ?></th>
        <th><?php echo app('translator')->get('site.actions'); ?></th>
    </tr>
    </thead>
    <tbody>
    <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e($item->id); ?></td>
            <td><?php echo e(\Illuminate\Support\Carbon::parse($item->created_at)->format('d/M/Y')); ?></td>
            <td>
                <?php if(!empty($item->interview_date)): ?>
                    <?php echo e(\Illuminate\Support\Carbon::parse($item->interview_date)->format('d/M/Y')); ?>

                <?php endif; ?>
            </td>
            <td>
                <?php echo e(orderStatus($item->status)); ?>

            </td>
            <td>
                <?php echo e($item->candidates()->count()); ?>

            </td>
            <td>
                <?php echo e($item->orderComments()->count()); ?>

            </td>
            <td>

                <a class="btn btn-primary rounded  btn-sm" href="<?php echo e(route('employer.view-order',['order'=>$item->id])); ?>"><i class="fa fa-eye"></i> <?php echo app('translator')->get('site.view'); ?></a>

            </td>
        </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>
    </div><?php /**PATH /home/re3aytk/public_html/dev/resources/views/employer/order/order-list.blade.php ENDPATH**/ ?>