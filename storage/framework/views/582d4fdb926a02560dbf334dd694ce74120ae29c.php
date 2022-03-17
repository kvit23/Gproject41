<div class="form-group <?php echo e($errors->has('name') ? 'has-error' : ''); ?>">
    <label for="name" class="control-label"><?php echo app('translator')->get('site.name'); ?></label>
    <input class="form-control" name="name" type="text" id="name" value="<?php echo e(old('name',isset($admin->name) ? $admin->name : '')); ?>" >
    <?php echo clean( check( $errors->first('name', '<p class="help-block">:message</p>')) ); ?>

</div>
<div class="form-group <?php echo e($errors->has('email') ? 'has-error' : ''); ?>">
    <label for="email" class="control-label"><?php echo app('translator')->get('site.email'); ?></label>
    <input class="form-control" name="email" type="text" id="email" value="<?php echo e(old('email',isset($admin->email) ? $admin->email : '')); ?>" >
    <?php echo clean( check( $errors->first('email', '<p class="help-block">:message</p>')) ); ?>

</div>
<div class="form-group <?php echo e($errors->has('password') ? 'has-error' : ''); ?>">
    <label for="password" class="control-label"><?php if($formMode=='edit'): ?> <?php echo app('translator')->get('site.change'); ?>  <?php endif; ?> <?php echo app('translator')->get('site.password'); ?></label>
    <input class="form-control" name="password" type="password" id="password" value="<?php echo e(old('password')); ?>" >
    <?php echo clean( check( $errors->first('password', '<p class="help-block">:message</p>')) ); ?>

</div>
<div class="row">
    <div class="form-group col-md-12">
        <label for="roles"><?php echo app('translator')->get('site.roles'); ?></label>
        <?php if($formMode === 'edit'): ?>
            <select required multiple name="roles[]" id="roles" class="form-control select2">
                <option></option>
                <?php $__currentLoopData = \App\AdminRole::get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option  <?php if( (is_array(old('roles')) && in_array(@$role->id,old('roles')))  || (null === old('roles')  && $admin->adminRoles()->where('id',$role->id)->first() )): ?>
                        selected
                        <?php endif; ?>
                        value="<?php echo e($role->id); ?>"><?php echo e($role->name); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        <?php else: ?>
            <select required multiple name="roles[]" id="roles" class="form-control select2">
                <option></option>
                <?php $__currentLoopData = \App\AdminRole::get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option <?php if(is_array(old('roles')) && in_array(@$role->id,old('roles'))): ?> selected <?php endif; ?> value="<?php echo e($role->id); ?>"><?php echo e($role->name); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        <?php endif; ?>
    </div>
</div>
<div class="form-group <?php echo e($errors->has('status') ? 'has-error' : ''); ?>">
    <label for="status" class="control-label"><?php echo app('translator')->get('site.enabled'); ?></label>
    <select name="status" class="form-control" id="status" >
    <?php $__currentLoopData = json_decode('{"1":"'.__('site.yes').'","0":"'.__('site.no').'"}', true); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $optionKey => $optionValue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <option value="<?php echo e($optionKey); ?>" <?php echo e(((null !== old('status',@$admin->status)) && old('admin',@$admin->status) == $optionKey) ? 'selected' : ''); ?>><?php echo e($optionValue); ?></option>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</select>
    <?php echo clean( check( $errors->first('status', '<p class="help-block">:message</p>')) ); ?>

</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="<?php echo e($formMode === 'edit' ? __('site.update') : __('site.create')); ?>">
</div>
<?php /**PATH /home/re3aytk/public_html/dev/resources/views/admin/admins/form.blade.php ENDPATH**/ ?>