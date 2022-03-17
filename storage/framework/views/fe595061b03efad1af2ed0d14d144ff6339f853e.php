<?php
//when including this file, supply two variables: name and label required
$id = uniqid();
$thumbId = 'thumb_'.$id;
$imgId = 'img_'.$id;
?>
<div class="form-group">
    <label for="file"><?php echo e(@$label); ?></label> <br/>

    <div class="image-box">
        <div>
            <?php if(!empty(@${@$name}) && file_exists(@${@$name})): ?>
                <img src="<?php echo e(asset(@${@$name})); ?>" id="<?php echo e($thumbId); ?>" />
            <?php else: ?>
                <img src="<?php echo e(asset('img/no_image.jpg')); ?>" id="<?php echo e($thumbId); ?>"/>
            <?php endif; ?>
            <input <?php if(isset($required) && $required): ?> required <?php endif; ?> id="<?php echo e($imgId); ?>" type="hidden" name="<?php echo e(@$name); ?>" value="<?php echo e(@${@$name}); ?>"/>
        </div>
        <a class="pointer" onclick="image_upload('<?php echo e($imgId); ?>', '<?php echo e($thumbId); ?>');"><?php echo app('translator')->get('site.browse'); ?></a>&nbsp;&nbsp;|&nbsp;&nbsp;<a class="pointer" onclick="$('#<?php echo e($thumbId); ?>').attr('src', '<?php echo e(asset('img/no_image.jpg')); ?>'); $('#<?php echo e($imgId); ?>').attr('value', '');"><?php echo app('translator')->get('site.clear'); ?></a>

    </div>
</div>
<?php /**PATH /home/re3aytk/public_html/dev/resources/views/admin/partials/image-input.blade.php ENDPATH**/ ?>