<?php echo $__env->make('admin.partials.text-input',['name'=>'sub_heading','label'=>__('te.sub-heading')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('admin.partials.text-input',['name'=>'heading','label'=>__('te.heading')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('admin.partials.text-input',['name'=>'text','label'=>__('te.text')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php echo $__env->make('admin.partials.text-input',['name'=>'candidate_limit','label'=>__('te.candidate-limit'),'class'=>'number'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('admin.partials.select',['name'=>'order','label'=>__('te.sort-order'),'options'=>['l'=>__('te.latest-profiles'),'r'=>__('te.random')]], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php /**PATH /home/re3aytk/public_html/dev/public/templates/jobportal/options/candidates/form.blade.php ENDPATH**/ ?>