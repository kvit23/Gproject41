<div class="form-group <?php echo e($errors->has('name') ? 'has-error' : ''); ?>">
    <label for="name" class="control-label"><?php echo app('translator')->get('site.name'); ?></label>
    <input required class="form-control" name="name" type="text" id="name" value="<?php echo e(old('name',isset($jobcategory->name) ? $jobcategory->name : '')); ?>" >
    <?php echo clean( $errors->first('name', '<p class="help-block">:message</p>') ); ?>

</div>
<div class="form-group <?php echo e($errors->has('sort_order') ? 'has-error' : ''); ?>">
    <label for="sort_order" class="control-label"><?php echo app('translator')->get('site.sort-order'); ?></label>
    <input class="form-control" name="sort_order" type="text" id="sort_order" value="<?php echo e(old('sort_order',isset($jobcategory->sort_order) ? $jobcategory->sort_order : '')); ?>" >
    <?php echo clean( $errors->first('sort_order', '<p class="help-block">:message</p>') ); ?>

</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="<?php echo e($formMode === 'edit' ? __('site.update') : __('site.create')); ?>">
</div>
<?php /**PATH /home/re3aytk/public_html/dev/resources/views/admin/job-categories/form.blade.php ENDPATH**/ ?>