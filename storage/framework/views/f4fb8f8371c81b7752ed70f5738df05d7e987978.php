<?php $__env->startSection('page-title',__('site.change-password')); ?>

<?php $__env->startSection('content'); ?>
    <form action="<?php echo e(route('user.save-password')); ?>" method="post">
        <?php echo csrf_field(); ?>
        <div class="form-group <?php echo e($errors->has('password') ? 'has-error' : ''); ?>">
            <label for="password" class="control-label"><?php echo app('translator')->get('site.new-password'); ?></label>
            <input class="form-control" name="password" type="password" id="password"  >
            <?php echo clean( $errors->first('password', '<p class="help-block">:message</p>') ); ?>

        </div>
        <div class="form-group <?php echo e($errors->has('password') ? 'has-error' : ''); ?>">
            <label for="password_confirmation" class="control-label"><?php echo app('translator')->get('site.confirm-password'); ?></label>
            <input class="form-control" name="password_confirmation" type="password" id="password_confirmation"   >
            <?php echo clean( $errors->first('password_confirmation', '<p class="help-block">:message</p>') ); ?>

        </div>

        <input class="btn btn-primary" type="submit" value="<?php echo e(__('site.save-changes')); ?>">
    </form>


<?php $__env->stopSection(); ?>

<?php echo $__env->make($userLayout, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/re3aytk/public_html/dev/resources/views/account/profile/password.blade.php ENDPATH**/ ?>