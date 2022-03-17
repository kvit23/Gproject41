<div class="form-group <?php echo e($errors->has('name') ? 'has-error' : ''); ?>">
    <label for="name" class="control-label required"><?php echo app('translator')->get('site.name'); ?></label>
    <input required class="form-control" name="name" type="text" id="name" value="<?php echo e(old('name',isset($test->name) ? $test->name : '')); ?>" >
    <?php echo clean( $errors->first('name', '<p class="help-block">:message</p>') ); ?>

</div>
<div class="form-group <?php echo e($errors->has('description') ? 'has-error' : ''); ?>">
    <label for="description" class="control-label"><?php echo app('translator')->get('site.description'); ?>/<?php echo app('translator')->get('site.instructions'); ?></label>
    <textarea class="form-control" rows="5" name="description" type="textarea" id="description" ><?php echo e(old('description',isset($test->description) ? $test->description : '')); ?></textarea>
    <?php echo clean( $errors->first('description', '<p class="help-block">:message</p>') ); ?>

</div>
<div class="form-group <?php echo e($errors->has('status') ? 'has-error' : ''); ?>">
    <label for="status" class="control-label"><?php echo app('translator')->get('site.status'); ?></label>
    <select name="status" class="form-control" id="status" >
    <?php $__currentLoopData = json_decode('{"0":"Disabled","1":"Enabled"}', true); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $optionKey => $optionValue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <option value="<?php echo e($optionKey); ?>" <?php echo e(((null !== old('status',@$test->status)) && old('status',@$test->status) == $optionKey) ? 'selected' : ''); ?>><?php echo e($optionValue); ?></option>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</select>
    <?php echo clean( $errors->first('status', '<p class="help-block">:message</p>') ); ?>

</div>
<div class="form-group <?php echo e($errors->has('minutes') ? 'has-error' : ''); ?>">
    <label for="minutes" class="control-label"><?php echo app('translator')->get('site.minutes-allowed'); ?></label>
    <input class="form-control digit" name="minutes" type="text" id="minutes" value="<?php echo e(old('minutes',isset($test->minutes) ? $test->minutes : '')); ?>" >
    <?php echo clean( $errors->first('minutes', '<p class="help-block">:message</p>') ); ?>

    <p class="minutes"><?php echo app('translator')->get('site.minutes-hint'); ?></p>
</div>
<div class="form-group <?php echo e($errors->has('passmark') ? 'has-error' : ''); ?>">
    <label for="passmark" class="control-label"><?php echo app('translator')->get('site.passmark'); ?> (%)</label>
    <input class="form-control digit" name="passmark" type="text" id="passmark" value="<?php echo e(old('passmark',isset($test->passmark) ? $test->passmark : '')); ?>" >
    <?php echo clean( $errors->first('passmark', '<p class="help-block">:message</p>') ); ?>

    <p class="help-block"><?php echo app('translator')->get('site.passmark-hint'); ?></p>
</div>
<div class="form-group <?php echo e($errors->has('allow_multiple') ? 'has-error' : ''); ?>">
    <label for="allow_multiple" class="control-label"><?php echo app('translator')->get('site.allow-multiple'); ?></label>
    <select name="allow_multiple" class="form-control" id="allow_multiple" >
    <?php $__currentLoopData = json_decode('{"0":"No","1":"Yes"}', true); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $optionKey => $optionValue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <option value="<?php echo e($optionKey); ?>" <?php echo e(((null !== old('allow_multiple',@$test->allow_multiple)) && old('allow_multiple',@$test->allow_multiple) == $optionKey) ? 'selected' : ''); ?>><?php echo e($optionValue); ?></option>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</select>
    <?php echo clean( $errors->first('allow_multiple', '<p class="help-block">:message</p>') ); ?>

</div>
<div class="form-group <?php echo e($errors->has('show_result') ? 'has-error' : ''); ?>">
    <label for="show_result" class="control-label"><?php echo app('translator')->get('site.show-result'); ?></label>
    <select name="show_result" class="form-control" id="show_result" >
    <?php $__currentLoopData = json_decode('{"0":"No","1":"Yes"}', true); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $optionKey => $optionValue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <option value="<?php echo e($optionKey); ?>" <?php echo e(((null !== old('show_result',@$test->show_result)) && old('show_result',@$test->show_result) == $optionKey) ? 'selected' : ''); ?>><?php echo e($optionValue); ?></option>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</select>
    <?php echo clean( $errors->first('show_result', '<p class="help-block">:message</p>') ); ?>

</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="<?php echo e($formMode === 'edit' ? __('site.update') : __('site.create')); ?>">
</div>
<?php /**PATH /home/re3aytk/public_html/dev/resources/views/admin/tests/form.blade.php ENDPATH**/ ?>