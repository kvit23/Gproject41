<div class="table-responsive">
    <table class="table">
        <thead>
        <tr>
            <th>#</th>
            <th><?php echo app('translator')->get('site.employer'); ?></th>
            <th><?php echo app('translator')->get('site.start-date'); ?></th><th><?php echo app('translator')->get('site.end-date'); ?></th>
            <th><?php echo app('translator')->get('site.salary'); ?></th>
            <th><?php echo app('translator')->get('site.active'); ?></th>
        </tr>
        </thead>
        <tbody>
        <?php $__currentLoopData = $employments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($loop->iteration + ( (Request::get('page',1)-1) * $perPage)); ?></td>
                <td><?php echo e($item->employer->user->name); ?></td>
                <td><?php echo e(\Illuminate\Support\Carbon::parse($item->start_date)->format('d/M/Y')); ?></td><td>
                    <?php if(!empty($item->end_date)): ?>
                        <?php echo e(\Illuminate\Support\Carbon::parse($item->end_date)->format('d/M/Y')); ?>

                    <?php endif; ?>
                </td>
                <td><?php echo e(price($item->salary)); ?></td>
                <td><?php echo e(boolToString($item->active)); ?></td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>

</div>
<?php /**PATH /home/re3aytk/public_html/dev/resources/views/candidate/home/placement-list.blade.php ENDPATH**/ ?>