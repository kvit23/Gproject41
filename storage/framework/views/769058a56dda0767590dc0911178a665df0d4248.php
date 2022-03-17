<div class="table-responsive">
    <table class="table">
        <thead>
        <tr>
            <th>#</th>
            <th><?php echo app('translator')->get('site.candidate'); ?></th>
            <th><?php echo app('translator')->get('site.start-date'); ?></th><th><?php echo app('translator')->get('site.end-date'); ?></th>
            <th><?php echo app('translator')->get('site.comments'); ?></th>
            <th><?php echo app('translator')->get('site.active'); ?></th><th><?php echo app('translator')->get('site.actions'); ?></th>
        </tr>
        </thead>
        <tbody>
        <?php $__currentLoopData = $employments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($loop->iteration + ( (Request::get('page',1)-1) * $perPage)); ?></td>
                <td><?php echo e($item->candidate->user->name); ?></td>
                <td><?php echo e(\Illuminate\Support\Carbon::parse($item->start_date)->format('d/M/Y')); ?></td><td>
                    <?php if(!empty($item->end_date)): ?>
                        <?php echo e(\Illuminate\Support\Carbon::parse($item->end_date)->format('d/M/Y')); ?>

                    <?php endif; ?>
                </td>
                <td><?php echo e($item->employmentComments()->count()); ?></td>
                <td><?php echo e(boolToString($item->active)); ?></td>
                <td>

                    <a class="btn btn-primary rounded" href="<?php echo e(route('employer.view-placement',['employment'=>$item->id])); ?>"><i class="fa fa-eye"></i> <?php echo app('translator')->get('site.view'); ?></a>


                </td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>

</div><?php /**PATH /home/re3aytk/public_html/dev/resources/views/employer/placement/placement-list.blade.php ENDPATH**/ ?>