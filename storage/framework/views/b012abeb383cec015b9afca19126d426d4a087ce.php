<div class="row">
    <?php for($i=1;$i <= 9; $i++): ?>
        <div class="col-md-4">

                    <?php echo $__env->make('admin.partials.image-input',['name'=>'file'.$i,'label'=>__('te.image')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        </div>
    <?php endfor; ?>

</div>

<?php /**PATH /home/re3aytk/public_html/dev/public/templates/jobportal/options/clients/form.blade.php ENDPATH**/ ?>