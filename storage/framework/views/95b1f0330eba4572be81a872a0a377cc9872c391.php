<div class="form-group <?php echo e($errors->has('title') ? 'has-error' : ''); ?>">
    <label for="title" class="control-label required"><?php echo app('translator')->get('site.title'); ?></label>
    <input required class="form-control" name="title" type="text" id="title" value="<?php echo e(old('title',isset($vacancy->title) ? $vacancy->title : '')); ?>" >
    <?php echo clean( $errors->first('title', '<p class="help-block">:message</p>') ); ?>

</div>
<div class="form-group <?php echo e($errors->has('description') ? 'has-error' : ''); ?>">
    <label for="description" class="control-label required"><?php echo app('translator')->get('site.job-description'); ?></label>
    <textarea required  class="form-control" rows="5" name="description" type="textarea" id="description" ><?php echo e(old('description',isset($vacancy->description) ? $vacancy->description : '')); ?></textarea>
    <?php echo clean( $errors->first('description', '<p class="help-block">:message</p>') ); ?>

</div>
<div class="form-group <?php echo e($errors->has('closes_at') ? 'has-error' : ''); ?>">
    <label for="closes_at" class="control-label"><?php echo app('translator')->get('site.closing-date'); ?></label>
    <input class="form-control date" name="closes_at" type="text" id="closes_at" value="<?php echo e(old('closes_at',isset($vacancy->closes_at) ? $vacancy->closes_at : '')); ?>" >
    <?php echo clean( $errors->first('closes_at', '<p class="help-block">:message</p>') ); ?>

</div>

<div class="form-group <?php echo e($errors->has('location') ? 'has-error' : ''); ?>">
    <label for="location" class="control-label"><?php echo app('translator')->get('site.location'); ?></label>
    <input  class="form-control" name="location" type="text" id="location" value="<?php echo e(old('location',isset($vacancy->location) ? $vacancy->location : '')); ?>" >
    <?php echo clean( $errors->first('location', '<p class="help-block">:message</p>') ); ?>

</div>

<div class="form-group <?php echo e($errors->has('salary') ? 'has-error' : ''); ?>">
    <label for="salary" class="control-label"><?php echo app('translator')->get('site.salary'); ?></label>
    <input  class="form-control" name="salary" type="text" id="salary" value="<?php echo e(old('salary',isset($vacancy->salary) ? $vacancy->salary : '')); ?>" >
    <?php echo clean( $errors->first('salary', '<p class="help-block">:message</p>') ); ?>

</div>

<div class="form-group <?php echo e($errors->has('categories') ? 'has-error' : ''); ?>">
    <label for="categories"><?php echo app('translator')->get('site.job-categories'); ?></label>
    <?php if($formMode === 'edit'): ?>
        <select multiple name="categories[]" id="categories" class="form-control select2">
            <option></option>
            <?php $__currentLoopData = \App\JobCategory::orderBy('name')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option  <?php if( (is_array(old('categories')) && in_array(@$category->id,old('categories')))  || (null === old('categories')  && $vacancy->jobCategories()->where('id',$category->id)->first() )): ?>
                    selected
                    <?php endif; ?>
                    value="<?php echo e($category->id); ?>"><?php echo e($category->name); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
    <?php else: ?>
        <select  multiple name="categories[]" id="categories" class="form-control select2">
            <option></option>
            <?php $__currentLoopData = \App\JobCategory::orderBy('name')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option <?php if(is_array(old('categories')) && in_array(@$category->id,old('categories'))): ?> selected <?php endif; ?> value="<?php echo e($category->id); ?>"><?php echo e($category->name); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
    <?php endif; ?>
    <?php echo clean( $errors->first('categories', '<p class="help-block">:message</p>') ); ?>

</div>





<div class="form-group <?php echo e($errors->has('active') ? 'has-error' : ''); ?>">
    <label for="active" class="control-label required"><?php echo app('translator')->get('site.enabled'); ?></label>
    <select  required  name="active" class="form-control" id="active" >
        <?php $__currentLoopData = json_decode('{"1":"Yes","0":"No"}', true); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $optionKey => $optionValue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($optionKey); ?>" <?php echo e(((null !== old('active',@$vacancy->active)) && old('active',@$vacancy->active) == $optionKey) ? 'selected' : ''); ?>><?php echo e($optionValue); ?></option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </select>
    <?php echo clean( $errors->first('active', '<p class="help-block">:message</p>') ); ?>

</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="<?php echo e($formMode === 'edit' ? __('site.update') : __('site.create')); ?>">
</div>
<?php /**PATH /home/re3aytk/public_html/dev/resources/views/admin/vacancies/form.blade.php ENDPATH**/ ?>