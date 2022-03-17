<div class="table-responsive">
    <table class="table">
        <thead>
        <tr>
            <th>#</th>
            <th><?php echo app('translator')->get('site.position'); ?></th>
            <th><?php echo app('translator')->get('site.application-date'); ?></th>
        </tr>
        </thead>
        <tbody>
        <?php $__currentLoopData = $applications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $application): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <th><?php echo e($loop->iteration + ( (Request::get('page',1)-1) * $perPage)); ?></th>
                <td><?php echo e($application->vacancy->title); ?></td>
                <td><?php echo e($application->created_at->format('d/M/Y')); ?></td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</div>
<?php /**PATH /home/re3aytk/public_html/dev/resources/views/candidate/home/application-list.blade.php ENDPATH**/ ?>