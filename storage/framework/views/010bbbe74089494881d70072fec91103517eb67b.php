<?php for($i=1;$i <= 10; $i++): ?>

<div class="card">
    <div class="card-header">
        <?php echo app('translator')->get('te.image'); ?> <?php echo e($i); ?>

    </div>
    <div class="card-body">
        <?php echo $__env->make('admin.partials.image-input',['name'=>'file'.$i,'label'=>__('te.image')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="row">
            <div class="col-md-6">
                <?php echo $__env->make('admin.partials.text-input',['name'=>'slide_heading'.$i,'label'=>__('te.slide-heading')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
            <div class="col-md-6">
                <?php echo $__env->make('admin.partials.color-picker',['name'=>'heading_font_color'.$i,'label'=>__t('heading-color')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
        </div>


        <div class="row">
            <div class="col-md-6">
                <?php echo $__env->make('admin.partials.textarea',['name'=>'slide_text'.$i,'label'=>__('te.slide-text')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
            <div class="col-md-6">
                <?php echo $__env->make('admin.partials.color-picker',['name'=>'text_font_color'.$i,'label'=>__t('text-color')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <h4><?php echo e(__t('button')); ?> 1</h4>
                <?php echo $__env->make('admin.partials.text-input',['name'=>'button_1_text_'.$i,'label'=>__t('button-text')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php echo $__env->make('admin.partials.text-input',['name'=>'url_1_'.$i,'label'=>__t('link')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
            <div class="col-md-6">
                <h4><?php echo e(__t('button')); ?> 2</h4>
                <?php echo $__env->make('admin.partials.text-input',['name'=>'button_2_text_'.$i,'label'=>__t('button-text')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php echo $__env->make('admin.partials.text-input',['name'=>'url_2_'.$i,'label'=>__t('link')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
        </div>


    </div>
</div>
<hr/>
<br/>

<?php endfor; ?>
<?php /**PATH /home/re3aytk/public_html/dev/public/templates/jobportal/options/slideshow/form.blade.php ENDPATH**/ ?>