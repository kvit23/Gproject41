
<?php echo $__env->make('admin.partials.textarea',['name'=>'text','label'=>__('te.text')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('admin.partials.text-input',['name'=>'credits','label'=>__('te.credits')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('admin.partials.color-picker',['name'=>'bg_color','label'=>__('te.background-color')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('admin.partials.color-picker',['name'=>'font_color','label'=>__('te.font-color')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('admin.partials.image-input',['name'=>'image','label'=>__('te.background-image')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<h5><?php echo app('translator')->get('te.social'); ?></h5>
<?php $__currentLoopData = ['facebook','twitter','instagram','youtube','linkedin']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php echo $__env->make('admin.partials.text-input',['name'=>'social_'.$value,'label'=>ucfirst($value)], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



<?php /**PATH /home/re3aytk/public_html/dev/public/templates/jobportal/options/footer/form.blade.php ENDPATH**/ ?>