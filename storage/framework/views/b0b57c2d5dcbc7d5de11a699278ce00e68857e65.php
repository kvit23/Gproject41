<?php echo $__env->make('admin.partials.text-input',['name'=>'heading','label'=>__('te.heading')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('admin.partials.rte',['name'=>'text','label'=>__('te.text')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="row">
    <div class="col-md-6"><?php echo $__env->make('admin.partials.image-input',['name'=>'image_1','label'=>__('te.image').' 1'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?></div>
    <div class="col-md-6"><?php echo $__env->make('admin.partials.image-input',['name'=>'image_2','label'=>__('te.image').' 2'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?></div>
</div>
<div class="row">
    <div class="col-md-6"><?php echo $__env->make('admin.partials.image-input',['name'=>'image_3','label'=>__('te.image').' 3'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?></div>
    <div class="col-md-6"><?php echo $__env->make('admin.partials.image-input',['name'=>'image_4','label'=>__('te.image').' 4'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?></div>
</div>




<?php /**PATH /home/re3aytk/public_html/dev/public/templates/jobportal/options/homepage-about/form.blade.php ENDPATH**/ ?>