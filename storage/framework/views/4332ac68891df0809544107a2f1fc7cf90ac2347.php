<?php echo $__env->make('admin.partials.text-input',['name'=>'heading','label'=>__('te.heading')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('admin.partials.text-input',['name'=>'text','label'=>__('te.text')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php echo $__env->make('admin.partials.select',['name'=>'order_button','label'=>__t('order-button'),'options'=>array('1'=>__('site.enabled'),'0'=>__('site.disabled'))], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('admin.partials.select',['name'=>'profile_button','label'=>__t('profile-button'),'options'=>array('1'=>__('site.enabled'),'0'=>__('site.disabled'))], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


<?php /**PATH /home/re3aytk/public_html/dev/public/templates/jobportal/options/footer-top/form.blade.php ENDPATH**/ ?>