<?php echo app('translator')->get('site.interview-mail-intro',['name'=>$interview->user->name]); ?><br/>

<strong><?php echo app('translator')->get('site.date'); ?>:</strong> <?php echo e(\Illuminate\Support\Carbon::parse($interview->interview_date)->format('d/M/Y')); ?><br/>
<?php if(!empty($interview->interview_time)): ?>
<strong><?php echo app('translator')->get('site.time'); ?>:</strong> <?php echo e($interview->interview_time); ?> <br/>
<?php endif; ?>
<?php if(!empty($interview->venue)): ?>
<strong><?php echo app('translator')->get('site.venue'); ?>:</strong> <?php echo e($interview->venue); ?> <br/>
<?php endif; ?>

<br/>
<?php if($interview->candidates()->count()>0): ?>
    <?php echo app('translator')->get('site.interview-mail-candidates'); ?><br/>
    <ul>
        <?php $__currentLoopData = $interview->candidates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $candidate): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <li><?php echo e($candidate->display_name); ?> (<?php echo e(gender($candidate->gender)); ?>,<?php echo e(getAge(\Illuminate\Support\Carbon::parse($candidate->date_of_birth)->timestamp)); ?>)</li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>

<?php endif; ?>

<?php if(!empty($interview->employer_comment)): ?>
    <strong><?php echo app('translator')->get('site.comment'); ?></strong><br/>
    <?php echo clean( nl2br(clean($interview->employer_comment)) ); ?>


<?php endif; ?>
<?php /**PATH /home/re3aytk/public_html/dev/resources/views/mails/interview.blade.php ENDPATH**/ ?>