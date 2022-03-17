<div class="form-group <?php echo e($errors->has('user_id') ? 'has-error' : ''); ?>">
    <label for="user_id" class="control-label"><span class="req">*</span><?php echo app('translator')->get('site.employer'); ?></label>

    <select required  name="user_id" id="user_id" class="form-control">
        <?php
        $userId = old('user_id',@$interview->user_id);
        ?>
        <?php if($userId): ?>
            <option selected value="<?php echo e($userId); ?>"><?php echo e(\App\User::find($userId)->name); ?> &lt;<?php echo e(\App\User::find($userId)->email); ?>&gt; </option>
        <?php endif; ?>
    </select>

    <?php echo clean( $errors->first('user_id', '<p class="help-block">:message</p>') ); ?>


</div>

<div class="form-group  <?php echo e($errors->has('candidates') ? 'has-error' : ''); ?>">

    <label for="candidates"><?php echo app('translator')->get('site.candidates'); ?></label>
    <?php if($formMode === 'edit'): ?>
        <select multiple name="candidates[]" id="candidates" class="form-control select2">
            <?php $__currentLoopData = $interview->candidates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $candidate): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option  <?php if( (is_array(old('candidates')) && in_array(@$candidate->id,old('candidates')))  || (null === old('candidates'))): ?>
                    selected
                    <?php endif; ?>
                    value="<?php echo e($candidate->id); ?>"><?php echo e($candidate->user->name); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
    <?php else: ?>
        <select  multiple name="candidates[]" id="candidates" class="form-control select2">
            <option></option>
        </select>
    <?php endif; ?>

    <?php echo clean( $errors->first('candidates', '<p class="help-block">:message</p>') ); ?>

</div>

<div class="form-group <?php echo e($errors->has('interview_date') ? 'has-error' : ''); ?>">
    <label for="interview_date" class="control-label required"><?php echo app('translator')->get('site.interview-date'); ?></label>
    <input required class="form-control date" name="interview_date" type="text" id="interview_date" value="<?php echo e(old('interview_date',isset($interview->interview_date) ? $interview->interview_date : '')); ?>" >
    <?php echo clean( $errors->first('interview_date', '<p class="help-block">:message</p>') ); ?>

</div>
<div class="form-group <?php echo e($errors->has('interview_time') ? 'has-error' : ''); ?>">
    <label for="interview_time" class="control-label\"><?php echo app('translator')->get('site.time'); ?></label>
    <input  class="form-control time" name="interview_time" type="text" id="interview_time" value="<?php echo e(old('interview_time',isset($interview->interview_time) ? $interview->interview_time : '')); ?>" >
    <?php echo clean( $errors->first('interview_time', '<p class="help-block">:message</p>') ); ?>

</div>
<div class="form-group <?php echo e($errors->has('venue') ? 'has-error' : ''); ?>">
    <label for="venue" class="control-label"><?php echo app('translator')->get('site.venue'); ?></label>
    <textarea class="form-control" rows="5" name="venue" type="textarea" id="venue" ><?php echo e(old('venue',isset($interview->venue) ? $interview->venue : '')); ?></textarea>
    <?php echo clean( $errors->first('venue', '<p class="help-block">:message</p>') ); ?>

</div>
<div class="form-group <?php echo e($errors->has('internal_note') ? 'has-error' : ''); ?>">
    <label for="internal_note" class="control-label"><?php echo app('translator')->get('site.internal-note'); ?></label>
    <textarea class="form-control" rows="5" name="internal_note" type="textarea" id="internal_note" ><?php echo e(old('internal_note',isset($interview->internal_note) ? $interview->internal_note : '')); ?></textarea>
    <?php echo clean( $errors->first('internal_note', '<p class="help-block">:message</p>') ); ?>

</div>
<div class="form-group <?php echo e($errors->has('employer_comment') ? 'has-error' : ''); ?>">
    <label for="employer_comment" class="control-label"><?php echo app('translator')->get('site.employer-comment'); ?></label>
    <textarea class="form-control" rows="5" name="employer_comment" type="textarea" id="employer_comment" ><?php echo e(old('employer_comment',isset($interview->employer_comment) ? $interview->employer_comment : '')); ?></textarea>
    <?php echo clean( $errors->first('employer_comment', '<p class="help-block">:message</p>') ); ?>

</div>
<div class="form-group <?php echo e($errors->has('reminder') ? 'has-error' : ''); ?>">
    <label for="reminder" class="control-label"><?php echo app('translator')->get('site.send-reminder'); ?></label>
    <select name="reminder" class="form-control" id="reminder" >
    <?php $__currentLoopData = json_decode('{"1":"Yes","0":"No"}', true); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $optionKey => $optionValue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <option value="<?php echo e($optionKey); ?>" <?php echo e(((null !== old('reminder',@$interview->reminder)) && old('reminder',@$interview->reminder) == $optionKey) ? 'selected' : ''); ?>><?php echo e($optionValue); ?></option>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</select>
    <?php echo clean( $errors->first('reminder', '<p class="help-block">:message</p>') ); ?>

</div>
<div class="form-group <?php echo e($errors->has('feedback') ? 'has-error' : ''); ?>">
    <label for="feedback" class="control-label"><?php echo app('translator')->get('site.request-feedback'); ?></label>
    <select name="feedback" class="form-control" id="feedback" >
    <?php $__currentLoopData = json_decode('{"1":"Yes","0":"No"}', true); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $optionKey => $optionValue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <option value="<?php echo e($optionKey); ?>" <?php echo e(((null !== old('feedback',@$interview->feedback)) && old('feedback',@$interview->feedback) == $optionKey) ? 'selected' : ''); ?>><?php echo e($optionValue); ?></option>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</select>
    <?php echo clean( $errors->first('feedback', '<p class="help-block">:message</p>') ); ?>

</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="<?php echo e($formMode === 'edit' ? __('site.update') : __('site.create')); ?>">
</div>
<?php /**PATH /home/re3aytk/public_html/dev/resources/views/admin/interviews/form.blade.php ENDPATH**/ ?>