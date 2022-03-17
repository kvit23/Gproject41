<div class="form-group <?php echo e($errors->has('question') ? 'has-error' : ''); ?>">
    <label for="question" class="control-label required"><?php echo app('translator')->get('site.question'); ?></label>
    <textarea required class="form-control" rows="5" name="question" type="textarea" id="question" ><?php echo e(old('question',isset($testquestion->question) ? $testquestion->question : '')); ?></textarea>
    <?php echo clean( $errors->first('question', '<p class="help-block">:message</p>') ); ?>

</div>
<div class="form-group <?php echo e($errors->has('sort_order') ? 'has-error' : ''); ?>">
    <label for="sort_order" class="control-label"><?php echo e('Sort Order'); ?></label>
    <input class="form-control number" name="sort_order" type="text" id="sort_order" value="<?php echo e(old('sort_order',isset($testquestion->sort_order) ? $testquestion->sort_order : '')); ?>" >
    <?php echo clean( $errors->first('sort_order', '<p class="help-block">:message</p>') ); ?>

</div>



<?php /**PATH /home/re3aytk/public_html/dev/resources/views/admin/test-questions/form.blade.php ENDPATH**/ ?>