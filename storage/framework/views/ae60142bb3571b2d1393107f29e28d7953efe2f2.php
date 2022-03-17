<div class="form-group <?php echo e($errors->has('name') ? 'has-error' : ''); ?>">
    <label for="name" class="control-label"><?php echo app('translator')->get('site.name'); ?></label>
    <input required class="form-control" name="name" type="text" id="name" value="<?php echo e(old('name',isset($orderform->name) ? $orderform->name : '')); ?>" >
    <?php echo clean( $errors->first('name', '<p class="help-block">:message</p>') ); ?>

</div>
<div class="form-group <?php echo e($errors->has('description') ? 'has-error' : ''); ?>">
    <label for="description" class="control-label"><?php echo app('translator')->get('site.description'); ?></label>
    <textarea class="form-control" rows="5" name="description" type="textarea" id="description" ><?php echo e(old('description',isset($orderform->description) ? $orderform->description : '')); ?></textarea>
    <?php echo clean( $errors->first('description', '<p class="help-block">:message</p>') ); ?>

</div>
<div class="form-group <?php echo e($errors->has('enabled') ? 'has-error' : ''); ?>">
    <label for="enabled" class="control-label"><?php echo app('translator')->get('site.enabled'); ?></label>
    <select name="enabled" class="form-control" id="enabled" >
    <?php $__currentLoopData = json_decode('{"1":"Yes","0":"No"}', true); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $optionKey => $optionValue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <option value="<?php echo e($optionKey); ?>" <?php echo e(((null !== old('enabled',@$orderform->enabled)) && old('enabled',@$orderform->enabled) == $optionKey) ? 'selected' : ''); ?>><?php echo e($optionValue); ?></option>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</select>
    <?php echo clean( $errors->first('enabled', '<p class="help-block">:message</p>') ); ?>

</div>

<div class="form-group <?php echo e($errors->has('shortlist') ? 'has-error' : ''); ?>">
    <label for="shortlist" class="control-label"><?php echo app('translator')->get('site.show-shortlist'); ?></label>
    <select name="shortlist" class="form-control" id="shortlist" >
        <?php $__currentLoopData = json_decode('{"1":"Yes","0":"No"}', true); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $optionKey => $optionValue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($optionKey); ?>" <?php echo e(((null !== old('shortlist',@$orderform->shortlist)) && old('shortlist',@$orderform->shortlist) == $optionKey) ? 'selected' : ''); ?>><?php echo e($optionValue); ?></option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </select>
    <?php echo clean( $errors->first('shortlist', '<p class="help-block">:message</p>') ); ?>

</div>
<div class="form-group <?php echo e($errors->has('interview') ? 'has-error' : ''); ?>">
    <label for="interview" class="control-label"><?php echo app('translator')->get('site.show-interview'); ?></label>
    <select name="interview" class="form-control" id="interview" >
        <?php $__currentLoopData = json_decode('{"1":"Yes","0":"No"}', true); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $optionKey => $optionValue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($optionKey); ?>" <?php echo e(((null !== old('interview',@$orderform->interview)) && old('interview',@$orderform->interview) == $optionKey) ? 'selected' : ''); ?>><?php echo e($optionValue); ?></option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </select>
    <?php echo clean( $errors->first('interview', '<p class="help-block">:message</p>') ); ?>

</div>
<div class="form-group <?php echo e($errors->has('sort_order') ? 'has-error' : ''); ?>">
    <label for="sort_order" class="control-label"><?php echo app('translator')->get('site.sort-order'); ?></label>
    <input class="form-control number" name="sort_order" type="text" id="sort_order" value="<?php echo e(old('sort_order',isset($orderform->sort_order) ? $orderform->sort_order : '')); ?>" >
    <?php echo clean( $errors->first('sort_order', '<p class="help-block">:message</p>') ); ?>

</div>


<div class="form-group <?php echo e($errors->has('auto_invoice') ? 'has-error' : ''); ?>">
    <label for="auto_invoice" class="control-label"><?php echo app('translator')->get('site.enable-auto-invoice'); ?></label>
    <select name="auto_invoice" class="form-control" id="auto_invoice" >
        <?php $__currentLoopData = json_decode('{"0":"No","1":"Yes"}', true); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $optionKey => $optionValue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($optionKey); ?>" <?php echo e(((null !== old('auto_invoice',@$orderform->auto_invoice)) && old('auto_invoice',@$orderform->auto_invoice) == $optionKey) ? 'selected' : ''); ?>><?php echo e($optionValue); ?></option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </select>
    <?php echo clean( $errors->first('auto_invoice', '<p class="help-block">:message</p>') ); ?>

</div>


<div id="invoice-group">


    <div class="form-group <?php echo e($errors->has('invoice_amount') ? 'has-error' : ''); ?>">
        <label for="invoice_amount" class="control-label"><?php echo app('translator')->get('site.invoice-amount'); ?></label>
        <input class="form-control number" name="invoice_amount" type="text" id="invoice_amount" value="<?php echo e(old('invoice_amount',isset($orderform->invoice_amount) ? $orderform->invoice_amount : '')); ?>" >
        <?php echo clean( $errors->first('invoice_amount', '<p class="help-block">:message</p>') ); ?>

    </div>


    <div class="form-group <?php echo e($errors->has('invoice_title') ? 'has-error' : ''); ?>">
        <label for="invoice_title" class="control-label"><?php echo app('translator')->get('site.invoice-title'); ?></label>
        <input class="form-control" name="invoice_title" type="text" id="invoice_title" value="<?php echo e(old('invoice_title',isset($orderform->invoice_title) ? $orderform->invoice_title : '')); ?>" >
        <?php echo clean( $errors->first('invoice_title', '<p class="help-block">:message</p>') ); ?>

    </div>



    <div class="form-group <?php echo e($errors->has('invoice_description') ? 'has-error' : ''); ?>">
        <label for="invoice_description" class="control-label"><?php echo app('translator')->get('site.invoice-description'); ?></label>
        <textarea class="form-control" name="invoice_description" id="invoice_description"  rows="3"><?php echo e(old('invoice_description',isset($orderform->invoice_description) ? $orderform->invoice_description : '')); ?></textarea>
        <?php echo clean( $errors->first('invoice_description', '<p class="help-block">:message</p>') ); ?>

    </div>




    <div class="form-group <?php echo e($errors->has('invoice_category_id') ? 'has-error' : ''); ?>">
        <label for="invoice_category_id" class="control-label"><?php echo app('translator')->get('site.invoice-category'); ?></label>
        <select  class="form-control" name="invoice_category_id" id="invoice_category_id">
            <option value=""></option>
            <?php $__currentLoopData = \App\InvoiceCategory::get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $invoiceCategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option <?php if(old('invoice_category_id',isset($orderform->invoice_category_id) ? $orderform->invoice_category_id : '')==$invoiceCategory->id): ?> selected <?php endif; ?> value="<?php echo e($invoiceCategory->id); ?>"><?php echo e($invoiceCategory->name); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
    </div>



</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="<?php echo e($formMode === 'edit' ? __('site.update') : __('site.create')); ?>">
</div>
<?php $__env->startSection('footer'); ?>
    ##parent-placeholder-d7eb6b340a11a367a1bec55e4a421d949214759f##
    <script src="<?php echo e(asset('js/admin/order-form.js')); ?>"></script>

    <?php $__env->stopSection(); ?>
<?php /**PATH /home/re3aytk/public_html/dev/resources/views/admin/order-forms/form.blade.php ENDPATH**/ ?>