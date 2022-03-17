<div class="form-group <?php echo e($errors->has('name') ? 'has-error' : ''); ?>">
    <label for="name" class="control-label"><?php echo app('translator')->get('site.name'); ?></label>
    <input required class="form-control" name="name" type="text" id="name" value="<?php echo e(old('name',isset($category->name) ? $category->name : '')); ?>" >
    <?php echo clean( $errors->first('name', '<p class="help-block">:message</p>') ); ?>

</div>
<div class="form-group <?php echo e($errors->has('description') ? 'has-error' : ''); ?>">
    <label for="description" class="control-label"><?php echo app('translator')->get('site.description'); ?> (<?php echo app('translator')->get('site.optional'); ?>)</label>
    <textarea class="form-control" rows="5" name="description" type="textarea" id="description" ><?php echo e(old('description',isset($category->description) ? $category->description : '')); ?></textarea>
    <?php echo clean( $errors->first('description', '<p class="help-block">:message</p>') ); ?>

</div>
<div class="form-group <?php echo e($errors->has('sort_order') ? 'has-error' : ''); ?>">
    <label for="sort_order" class="control-label"><?php echo app('translator')->get('site.sort-order'); ?></label>
    <input class="form-control number" name="sort_order" type="text" id="sort_order" value="<?php echo e(old('sort_order',isset($category->sort_order) ? $category->sort_order : '')); ?>" >
    <?php echo clean( $errors->first('sort_order', '<p class="help-block">:message</p>') ); ?>

</div>
<div class="form-group <?php echo e($errors->has('public') ? 'has-error' : ''); ?>">
    <label for="public" class="control-label"><?php echo app('translator')->get('site.public'); ?></label>
    <select name="public" class="form-control" id="public" >
        <?php $__currentLoopData = json_decode('{"1":"'.__('site.yes').'","0":"'.__('site.no').'"}', true); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $optionKey => $optionValue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($optionKey); ?>" <?php echo e(((null !== old('public',@$category->public)) && old('public',@$category->public) == $optionKey) ? 'selected' : ''); ?>><?php echo e($optionValue); ?></option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </select>
    <?php echo clean( $errors->first('public', '<p class="help-block">:message</p>') ); ?>

</div>

<div class="form-group">
    <input class="btn btn-primary" type="submit" value="<?php echo e($formMode === 'edit' ? __('site.update') : __('site.create')); ?>">
</div>
<?php /**PATH /home/re3aytk/public_html/dev/resources/views/admin/categories/form.blade.php ENDPATH**/ ?>