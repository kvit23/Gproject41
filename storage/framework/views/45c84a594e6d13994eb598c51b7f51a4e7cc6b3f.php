<div class="form-group <?php echo e($errors->has('name') ? 'has-error' : ''); ?>">
    <label for="name" class="control-label"><?php echo e(__('site.name')); ?></label>
    <input required class="form-control" name="name" type="text" id="name" value="<?php echo e(old('name',isset($contracttemplate->name) ? $contracttemplate->name : '')); ?>" >
    <?php echo $errors->first('name', '<p class="help-block">:message</p>'); ?>

</div>
<div class="form-group <?php echo e($errors->has('content') ? 'has-error' : ''); ?>">
    <label for="content" class="control-label"><?php echo e(__('site.content')); ?></label>
    <textarea class="form-control" rows="5" name="content" type="textarea" id="content" ><?php echo e(old('content',isset($contracttemplate->content) ? $contracttemplate->content : '')); ?></textarea>
    <?php echo $errors->first('content', '<p class="help-block">:message</p>'); ?>

</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="<?php echo e($formMode === 'edit' ? __('site.update') : __('site.create')); ?>">
</div>

<?php $__env->startSection('header'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('vendor/summernote/summernote-bs4.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>
    <script src="<?php echo e(asset('vendor/summernote/summernote-bs4.min.js')); ?>"></script>
    <script src="<?php echo e(asset('/js/admin/contract-template.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php /**PATH /home/re3aytk/public_html/dev/resources/views/admin/contract-templates/form.blade.php ENDPATH**/ ?>