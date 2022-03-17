<?php $__env->startSection('page-title',__('site.upload-file')); ?>

    <?php $__env->startSection('form-content'); ?>

        <form enctype="multipart/form-data" action="<?php echo e(route('admin.candidates.import-upload')); ?>" method="post">
            <p><?php echo app('translator')->get('site.import-help-text'); ?></p>
            <?php echo csrf_field(); ?>
            <div class="form-group">
                <label for="file"><?php echo app('translator')->get('site.file'); ?></label>
                <input required="" type="file" name="file"/>
            </div>

            <button type="submit" class="btn btn-primary"><?php echo app('translator')->get('site.upload'); ?></button>
        </form>

        <?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.candidates.import-layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/re3aytk/public_html/dev/resources/views/admin/candidates/import1.blade.php ENDPATH**/ ?>