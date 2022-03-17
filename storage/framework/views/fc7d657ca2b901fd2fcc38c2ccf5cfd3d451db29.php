<table class="table">
    <thead>
    <tr>
        <th><?php echo app('translator')->get('site.interview-date'); ?></th>
        <th><?php echo app('translator')->get('site.interview-time'); ?></th>
        <th><?php echo app('translator')->get('site.candidates'); ?></th>
        <th></th>
    </tr>
    </thead>
    <tbody>
    <?php $__currentLoopData = $interviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $interview): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e(\Illuminate\Support\Carbon::parse($interview->interview_date)->format('d/M/Y')); ?> (<?php echo e(\Illuminate\Support\Carbon::parse($interview->interview_date)->diffForHumans()); ?>)</td>
            <td><?php echo e($interview->interview_time); ?></td>
            <td><?php echo e($interview->candidates()->count()); ?></td>
            <td><a class="btn btn-primary rounded" href="<?php echo e(route('employer.view-interview',['interview'=>$interview->id])); ?>"><i class="fa fa-eye"></i> <?php echo app('translator')->get('site.view'); ?></a></td>
        </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table><?php /**PATH /home/re3aytk/public_html/dev/resources/views/employer/interview/interview-list.blade.php ENDPATH**/ ?>