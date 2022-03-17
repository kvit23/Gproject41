<div class="form-group <?php echo e($errors->has('name') ? 'has-error' : ''); ?>">
    <label for="name" class="control-label"><?php echo app('translator')->get('site.name'); ?></label>
    <input class="form-control" name="name" type="text" id="name" value="<?php echo e(old('name',isset($candidatefieldgroup->name) ? $candidatefieldgroup->name : '')); ?>" >
    <?php echo clean( $errors->first('name', '<p class="help-block">:message</p>') ); ?>

</div>
<div class="form-group <?php echo e($errors->has('sort_order') ? 'has-error' : ''); ?>">
    <label for="sort_order" class="control-label"><?php echo app('translator')->get('site.sort-order'); ?></label>
    <input class="form-control number" name="sort_order" type="text" id="sort_order" value="<?php echo e(old('sort_order',isset($candidatefieldgroup->sort_order) ? $candidatefieldgroup->sort_order : '')); ?>" >
    <?php echo clean( $errors->first('sort_order', '<p class="help-block">:message</p>') ); ?>

</div>

<div class="form-group <?php echo e($errors->has('visible') ? 'has-error' : ''); ?>">
    <label for="visible" class="control-label"><?php echo app('translator')->get('site.show-visible'); ?></label>
    <select name="visible" class="form-control" id="visible" >
        <?php $__currentLoopData = json_decode('{"0":"'.__('site.no').'","1":"'.__('site.yes').'"}', true); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $optionKey => $optionValue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($optionKey); ?>" <?php echo e(((null !== old('visible',@$candidatefieldgroup->visible)) && old('visible',@$candidatefieldgroup->visible) == $optionKey) ? 'selected' : ''); ?>><?php echo e($optionValue); ?></option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </select>
    <?php echo clean( $errors->first('visible', '<p class="help-block">:message</p>') ); ?>

</div>


<div class="form-group <?php echo e($errors->has('public') ? 'has-error' : ''); ?>">
    <label for="public" class="control-label"><?php echo app('translator')->get('site.show-public'); ?></label>
    <select name="public" class="form-control" id="public" >
        <?php $__currentLoopData = json_decode('{"0":"'.__('site.no').'","1":"'.__('site.yes').'"}', true); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $optionKey => $optionValue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($optionKey); ?>" <?php echo e(((null !== old('public',@$candidatefieldgroup->public)) && old('public',@$candidatefieldgroup->public) == $optionKey) ? 'selected' : ''); ?>><?php echo e($optionValue); ?></option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </select>
    <?php echo clean( $errors->first('public', '<p class="help-block">:message</p>') ); ?>

</div>


<div id="option-box" class="form-group <?php echo e($errors->has('registration') ? 'has-error' : ''); ?>">
    <label for="registration" class="control-label"><?php echo app('translator')->get('site.show-registration'); ?></label>
    <select name="registration" class="form-control" id="registration" >
        <?php $__currentLoopData = json_decode('{"0":"'.__('site.no').'","1":"'.__('site.yes').'"}', true); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $optionKey => $optionValue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($optionKey); ?>" <?php echo e(((null !== old('registration',@$candidatefieldgroup->registration)) && old('registration',@$candidatefieldgroup->registration) == $optionKey) ? 'selected' : ''); ?>><?php echo e($optionValue); ?></option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </select>
    <?php echo clean( $errors->first('registration', '<p class="help-block">:message</p>') ); ?>

</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="<?php echo e($formMode === 'edit' ? __('site.update') : __('site.create')); ?>">
</div>
<?php /**PATH /home/re3aytk/public_html/dev/resources/views/admin/candidate-field-groups/form.blade.php ENDPATH**/ ?>