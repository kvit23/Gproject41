<?php echo $__env->make('admin.partials.text-input',['name'=>'heading','label'=>__('te.heading')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('admin.partials.textarea',['name'=>'text','label'=>__('te.text')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="mb-5">
    <div class="card">
        <div class="card-header">
            <?php echo e(__t('google-map')); ?>

        </div>
        <div class="card-body">
            <?php echo $__env->make('admin.partials.select',['name'=>'google_map','label'=>__t('google-map'),'options'=>array('1'=>__('site.enabled'),'0'=>__('site.disabled'))], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php echo $__env->make('admin.partials.text-input',['name'=>'map_address','label'=>__t('map-address')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    </div>

</div>

<div class="card mb-5">
 <div class="card-header">
     <?php echo app('translator')->get('te.social'); ?>
</div>
<div class="card-body">
    <?php $__currentLoopData = ['facebook','twitter','instagram','youtube','linkedin']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php echo $__env->make('admin.partials.text-input',['name'=>'social_'.$value,'label'=>ucfirst($value)], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
</div>





<?php /**PATH /home/re3aytk/public_html/dev/public/templates/jobportal/options/contact-page/form.blade.php ENDPATH**/ ?>