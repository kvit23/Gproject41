<?php $__env->startSection('pageTitle',__('site.profile')); ?>
<?php $__env->startSection('page-title',__('site.profile')); ?>

<?php $__env->startSection('page-content'); ?>
    <div class="container-fluid">
        <div class="row">


            <div class="col-md-12">
                <div  >
                    <div  >

                        <form method="POST" action="<?php echo e(route('admin.save-profile')); ?>" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">

                            <?php echo e(csrf_field()); ?>


                            <div class="form-group <?php echo e($errors->has('name') ? 'has-error' : ''); ?>">
                                <label for="name" class="control-label"><?php echo app('translator')->get('site.name'); ?></label>
                                <input class="form-control" name="name" type="text" id="name" value="<?php echo e(old('name',isset($user->name) ? $user->name : '')); ?>" >
                                <?php echo clean( check( $errors->first('name', '<p class="help-block">:message</p>')) ); ?>

                            </div>
                            <div class="form-group <?php echo e($errors->has('email') ? 'has-error' : ''); ?>">
                                <label for="email" class="control-label"><?php echo app('translator')->get('site.email'); ?></label>
                                <input class="form-control" name="email" type="text" id="email" value="<?php echo e(old('email',isset($user->email) ? $user->email : '')); ?>" >
                                <?php echo clean( check( $errors->first('email', '<p class="help-block">:message</p>')) ); ?>

                            </div>
                            <div class="form-group <?php echo e($errors->has('password') ? 'has-error' : ''); ?>">
                                <label for="password" class="control-label"> <?php echo app('translator')->get('site.change'); ?> <?php echo app('translator')->get('site.password'); ?></label>
                                <input class="form-control" name="password" type="text" id="password" value="<?php echo e(old('password')); ?>" >
                                <?php echo clean( check( $errors->first('password', '<p class="help-block">:message</p>')) ); ?>

                            </div>



                            <div class="form-group">
                                <input class="btn btn-primary" type="submit" value="<?php echo app('translator')->get('site.save'); ?>">
                            </div>


                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin-page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/re3aytk/public_html/dev/resources/views/admin/settings/profile.blade.php ENDPATH**/ ?>