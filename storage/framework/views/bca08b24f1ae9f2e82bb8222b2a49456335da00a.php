<div class="form-group <?php echo e($errors->has('title') ? 'has-error' : ''); ?>">
    <label for="title" class="control-label required"><?php echo app('translator')->get('site.title'); ?></label>
    <input required class="form-control" name="title" type="text" id="title" value="<?php echo e(old('title',isset($article->title) ? $article->title : '')); ?>" >
    <?php echo clean( $errors->first('title', '<p class="help-block">:message</p>') ); ?>

</div>

<div class="form-group <?php echo e($errors->has('content') ? 'has-error' : ''); ?>">
    <label for="content" class="control-label"><?php echo app('translator')->get('site.content'); ?></label>
    <textarea class="form-control" rows="5" name="content" type="textarea" id="content" ><?php echo old('content',isset($article->content) ? $article->content : ''); ?></textarea>
    <?php echo clean( $errors->first('content', '<p class="help-block">:message</p>') ); ?>

</div>

<div class="form-group <?php echo e($errors->has('slug') ? 'has-error' : ''); ?>">
    <label for="slug" class="control-label"><?php echo app('translator')->get('site.slug'); ?></label>
    <input class="form-control" name="slug" type="text" id="slug" value="<?php echo e(old('slug',isset($article->slug) ? $article->slug : '')); ?>" >
    <?php echo clean( check( $errors->first('slug', '<p class="help-block">:message</p>')) ); ?>

</div>

<div class="form-group <?php echo e($errors->has('meta_title') ? 'has-error' : ''); ?>">
    <label for="meta_title" class="control-label"><?php echo app('translator')->get('site.meta-title'); ?></label>
    <input class="form-control" name="meta_title" type="text" id="meta_title" value="<?php echo e(old('meta_title',isset($article->meta_title) ? $article->meta_title : '')); ?>" >
    <?php echo clean( check( $errors->first('meta_title', '<p class="help-block">:message</p>')) ); ?>

</div>
<div class="form-group <?php echo e($errors->has('meta_description') ? 'has-error' : ''); ?>">
    <label for="meta_description" class="control-label"><?php echo app('translator')->get('site.meta-description'); ?></label>
    <textarea class="form-control" rows="5" name="meta_description" type="textarea" id="meta_description" ><?php echo e(old('meta_description',isset($article->meta_description) ? $article->meta_description : '')); ?></textarea>
    <?php echo clean( check( $errors->first('meta_description', '<p class="help-block">:message</p>')) ); ?>

</div>

<div class="form-group <?php echo e($errors->has('status') ? 'has-error' : ''); ?>">
    <label for="status" class="control-label"><?php echo app('translator')->get('site.enabled'); ?></label>
    <select name="status" class="form-control" id="status" >
        <?php $__currentLoopData = json_decode('{"1":"Yes","0":"No"}', true); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $optionKey => $optionValue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($optionKey); ?>" <?php echo e(((null !== old('status',@$article->status)) && old('article',@$article->status) == $optionKey) ? 'selected' : ''); ?>><?php echo e($optionValue); ?></option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </select>
    <?php echo clean( check( $errors->first('status', '<p class="help-block">:message</p>')) ); ?>

</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="<?php echo e($formMode === 'edit' ? __('site.update') : __('site.create')); ?>">
</div>
<?php /**PATH /home/re3aytk/public_html/dev/resources/views/admin/articles/form.blade.php ENDPATH**/ ?>