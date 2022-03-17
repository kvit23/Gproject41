<?php
/**
 * Supply the following arguments to this file:
 * label
 * name
 * value
 */
?>
<div class="form-group">
    <?php if(isset($label)): ?>
    <label><?php echo e($label); ?></label>
    <?php endif; ?>

    <div class="input-group myColorPicker">

        <input type="text" class="form-control colorpicker-full"  name="<?php echo e(@$name); ?>" value="<?php echo e(@${@$name}); ?>">

    </div>
</div><?php /**PATH /home/re3aytk/public_html/dev/resources/views/admin/partials/color-picker.blade.php ENDPATH**/ ?>