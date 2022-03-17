<?php $__env->startSection('content'); ?>
    <a href="<?php echo e(url('/account/billing-address')); ?>" title="<?php echo app('translator')->get('site.back'); ?>"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> <?php echo app('translator')->get('site.back'); ?></button></a>
    <br />
    <br />
    <div class="card-box">

        <form method="post" class="form"  action="<?php echo $__env->yieldContent('route'); ?>">
            <?php echo e(csrf_field()); ?>

            <?php echo $__env->yieldContent('method'); ?>

            <div class="form-group">
                <label for="name"><?php echo app('translator')->get('site.name'); ?></label>
                <input name="name" required="required" type="text"  class="form-control" value="<?php echo e(old('name',@$name)); ?>"/>
            </div>
            <div class="form-group">
                <label for="phone"><?php echo app('translator')->get('site.telephone'); ?></label>
                <input placeholder="<?php echo app('translator')->get('site.max-tel'); ?>" name="phone" required="required" type="text"  class="form-control" value="<?php echo e(old('name',@$phone)); ?>"/>
            </div>

            <div class="form-group">
                <label for="address"><?php echo app('translator')->get('site.address'); ?></label>
                <input name="address" required="required"  class="form-control" type="text" value="<?php echo e(old('address',@$address)); ?>"/>
            </div>
            <div class="form-group">
                <label for="address2"><?php echo app('translator')->get('site.address_2'); ?></label>
                <input name="address2"   class="form-control" type="text" value="<?php echo e(old('address2',@$address2)); ?>"/>
            </div>

            <div class="form-group">
                <label for="city"><?php echo app('translator')->get('site.city'); ?></label>
                <input name="city" required="required" type="text"  class="form-control" value="<?php echo e(old('city',@$city)); ?>"/>
            </div>

            <div class="form-group">
                <label for="state"><?php echo app('translator')->get('site.state'); ?></label>
                <input name="state" required="required" type="text"  class="form-control" value="<?php echo e(old('state',@$state)); ?>"/>
            </div>
            <div class="form-group">
                <label for="zip"><?php echo app('translator')->get('site.zip'); ?></label>
                <input name="zip" type="text"  class="form-control" value="<?php echo e(old('zip',@$zip)); ?>"/>
            </div>
            <div class="form-group">
                <label for="country_id"><?php echo app('translator')->get('site.country'); ?></label>
                <?php echo e(Form::select('country_id', $countries,@$country_id,['placeholder' => 'Select an option...','class'=>'form-control','required'=>'required','id'=>'country_id'])); ?>


            </div>

            <div class="form-group">
                <label for="default"><?php echo app('translator')->get('site.default'); ?></label>
                <?php echo e(Form::select('is_default', [1=>'Yes',0=>'No'],@$default,['class'=>'form-control','required'=>'required','id'=>'default'])); ?>


            </div>

            <button type="submit" class="btn btn-primary"><?php echo app('translator')->get('site.submit'); ?></button>
        </form>

    </div>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('header'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('vendor/select2/css/select2.min.css')); ?>">

<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>
    <script src="<?php echo e(asset('vendor/select2/js/select2.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/country.js')); ?>" type="text/javascript"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make($userLayout, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/re3aytk/public_html/dev/resources/views/account/forms/addressform.blade.php ENDPATH**/ ?>