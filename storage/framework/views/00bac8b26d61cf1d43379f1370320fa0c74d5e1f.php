<div class="form-group <?php echo e($errors->has('name') ? 'has-error' : ''); ?>">
    <label for="name" class="control-label required"><?php echo e('Name'); ?></label>
    <input required class="form-control" name="name" type="text" id="name" value="<?php echo e(old('name',isset($emailtemplate->name) ? $emailtemplate->name : '')); ?>" >
    <?php echo clean( $errors->first('name', '<p class="help-block">:message</p>') ); ?>

</div>
<div class="form-group <?php echo e($errors->has('subject') ? 'has-error' : ''); ?>">
    <label for="subject" class="control-label"><?php echo e('Subject'); ?></label>
    <input class="form-control" name="subject" type="text" id="subject" value="<?php echo e(old('subject',isset($emailtemplate->subject) ? $emailtemplate->subject : '')); ?>" >
    <?php echo clean( $errors->first('subject', '<p class="help-block">:message</p>') ); ?>

</div>
<div class="form-group <?php echo e($errors->has('message') ? 'has-error' : ''); ?>">
    <label for="message" class="control-label"><?php echo e('Message'); ?></label>
    <textarea class="form-control" rows="5" name="message" type="textarea" id="message" ><?php echo e(old('message',isset($emailtemplate->message) ? $emailtemplate->message : '')); ?></textarea>
    <?php echo clean( $errors->first('message', '<p class="help-block">:message</p>') ); ?>

</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="<?php echo e($formMode === 'edit' ? __('site.update') : __('site.create')); ?>">
</div>
<?php /**PATH /home/re3aytk/public_html/dev/resources/views/admin/email-templates/form.blade.php ENDPATH**/ ?>