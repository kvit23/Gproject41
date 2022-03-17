<div class="form-group <?php echo e($errors->has('user_id') ? 'has-error' : ''); ?>">
    <label for="user_id" class="control-label required"><?php echo app('translator')->get('site.user'); ?></label>

    <select required  name="user_id" id="user_id" class="form-control">
        <?php
        $userId = old('user_id',isset($invoice->user_id) ? $invoice->user_id : '');
        ?>

        <?php if($userId): ?>
            <option selected value="<?php echo e($userId); ?>"><?php echo e(\App\User::find($userId)->name); ?> (<?php echo e(\App\User::find($userId)->email); ?>) </option>
        <?php endif; ?>
    </select>

    <?php echo clean( check( $errors->first('user_id', '<p class="help-block">:message</p>')) ); ?>

</div>

<div class="form-group <?php echo e($errors->has('title') ? 'has-error' : ''); ?>">
    <label for="title" class="control-label required"><?php echo app('translator')->get('site.title'); ?></label>
    <input required class="form-control" name="title" type="text" id="title" value="<?php echo e(old('title',isset($invoice->title) ? $invoice->title : '')); ?>" >
    <?php echo clean( check( $errors->first('title', '<p class="help-block">:message</p>')) ); ?>

</div>


<div class="form-group <?php echo e($errors->has('description') ? 'has-error' : ''); ?>">
    <label for="description" class="control-label"><?php echo app('translator')->get('site.description'); ?></label>
     <textarea class="form-control" name="description" id="description" ><?php echo e(old('description',isset($invoice->description) ? $invoice->description : '')); ?></textarea>
    <?php echo clean( check( $errors->first('description', '<p class="help-block">:message</p>')) ); ?>

</div>



<div class="form-group <?php echo e($errors->has('amount') ? 'has-error' : ''); ?>">
    <label for="amount" class="control-label required"><?php echo app('translator')->get('site.amount'); ?></label>
    <input required class="form-control digit" name="amount" type="text" id="amount" value="<?php echo e(old('amount',isset($invoice->amount) ? $invoice->amount : '')); ?>" >
    <?php echo clean( check( $errors->first('amount', '<p class="help-block">:message</p>')) ); ?>

</div>




<div class="form-group <?php echo e($errors->has('paid') ? 'has-error' : ''); ?>">
    <label for="paid" class="control-label required"><?php echo app('translator')->get('site.paid'); ?></label>
    <select required name="paid" class="form-control" id="paid" >
    <?php $__currentLoopData = json_decode('{"0":"No","1":"Yes"}', true); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $optionKey => $optionValue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <option value="<?php echo e($optionKey); ?>" <?php echo e(((null !== old('paid',@$invoice->paid)) && old('invoice',@$invoice->paid) == $optionKey) ? 'selected' : ''); ?>><?php echo e($optionValue); ?></option>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</select>
    <?php echo clean( check( $errors->first('paid', '<p class="help-block">:message</p>')) ); ?>

</div>

<div class="form-group <?php echo e($errors->has('payment_method_id') ? 'has-error' : ''); ?>">
    <label for="payment_method_id" class="control-label"><?php echo app('translator')->get('site.payment-method'); ?></label>
    <select  class="form-control" name="payment_method_id" id="payment_method_id">
        <option value=""></option>
        <?php $__currentLoopData = \App\PaymentMethod::get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $paymentMethod): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option <?php if(old('payment_method_id',isset($invoice->payment_method_id) ? $invoice->payment_method_id : '')==$paymentMethod->id): ?> selected <?php endif; ?> value="<?php echo e($paymentMethod->id); ?>"><?php echo e($paymentMethod->name); ?></option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </select>

    <?php echo clean( check( $errors->first('payment_method_id', '<p class="help-block">:message</p>')) ); ?>

</div>



<div class="form-group <?php echo e($errors->has('due_date') ? 'has-error' : ''); ?>">
    <label for="due_date" class="control-label required"><?php echo app('translator')->get('site.due-date'); ?></label>
    <input required class="form-control date" name="due_date" type="text" id="due_date" value="<?php echo e(old('due_date',isset($invoice->due_date) ? $invoice->due_date : \Illuminate\Support\Carbon::now()->toDateString())); ?>" >
    <?php echo clean( check( $errors->first('due_date', '<p class="help-block">:message</p>')) ); ?>

</div>

<div class="form-group <?php echo e($errors->has('invoice_category_id') ? 'has-error' : ''); ?>">
    <label for="invoice_category_id" class="control-label"><?php echo app('translator')->get('site.invoice-category'); ?></label>
    <select  class="form-control" name="invoice_category_id" id="invoice_category_id">
        <option value=""></option>
        <?php $__currentLoopData = \App\InvoiceCategory::get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $invoiceCategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option <?php if(old('invoice_category_id',isset($invoice->invoice_category_id) ? $invoice->invoice_category_id : '')==$invoiceCategory->id): ?> selected <?php endif; ?> value="<?php echo e($invoiceCategory->id); ?>"><?php echo e($invoiceCategory->name); ?></option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </select>

    <?php echo clean( check( $errors->first('invoice_category_id', '<p class="help-block">:message</p>')) ); ?>

</div>

<?php if($formMode=='create'): ?>
    <div class="row">
        <div class="col-md-6">
            <div class="form-check">
                <input class="form-check-input" checked  type="checkbox" value="1" id="notify" name="notify">
                <label class="form-check-label" for="notify">
                    <?php echo app('translator')->get('site.notify-user'); ?>
                </label>
            </div>
        </div>
    </div>
    <br/>
<?php endif; ?>

<div class="form-group">
    <input class="btn btn-primary" type="submit" value="<?php echo e($formMode === 'edit' ? __('site.update') : __('site.create')); ?>">
</div>
<?php /**PATH /home/re3aytk/public_html/dev/resources/views/admin/invoices/form.blade.php ENDPATH**/ ?>