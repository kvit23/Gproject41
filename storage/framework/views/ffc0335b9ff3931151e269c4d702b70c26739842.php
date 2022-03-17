<?php $__env->startSection('pageTitle',__('site.employments')); ?>
<?php $__env->startSection('page-title',__('site.create-new').' '.__('site.employment-record')); ?>

<?php $__env->startSection('page-content'); ?>
    <div class="container-fluid">
        <div class="row">


            <div class="col-md-12">
                <div  >
                    <div >
                        <a href="<?php echo e(route('admin.employments.browse')); ?>" title="<?php echo app('translator')->get('site.back'); ?>"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> <?php echo app('translator')->get('site.back'); ?></button></a>
                        <br />
                        <br />


                        <form method="POST" action="<?php echo e(route('admin.employments.store-employment')); ?>" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                            <?php echo e(csrf_field()); ?>


                            <div class="form-group <?php echo e($errors->has('employer_user_id') ? 'has-error' : ''); ?>">
                                <label for="employer_user_id" class="control-label"><?php echo app('translator')->get('site.employer'); ?></label>

                                <select required  name="employer_user_id" id="employer_user_id" class="form-control">
                                    <?php
                                    $userId = old('employer_user_id');
                                    ?>
                                    <?php if($userId): ?>
                                        <option selected value="<?php echo e($userId); ?>"><?php echo e(\App\User::find($userId)->name); ?> &lt;<?php echo e(\App\User::find($userId)->email); ?>&gt; </option>
                                    <?php endif; ?>
                                </select>

                                <?php echo clean( $errors->first('employer_user_id', '<p class="help-block">:message</p>') ); ?>

                            </div>

                            <div class="form-group <?php echo e($errors->has('user_id') ? 'has-error' : ''); ?>">
                                <label for="user_id" class="control-label"><?php echo app('translator')->get('site.candidate'); ?></label>

                                <select required  name="user_id" id="user_id" class="form-control">
                                    <?php
                                    $userId = old('user_id');
                                    ?>
                                    <?php if($userId): ?>
                                        <option selected value="<?php echo e($userId); ?>"><?php echo e(\App\User::find($userId)->name); ?> &lt;<?php echo e(\App\User::find($userId)->email); ?>&gt; </option>
                                    <?php endif; ?>
                                </select>

                                <?php echo clean( $errors->first('user_id', '<p class="help-block">:message</p>') ); ?>

                            </div>

                            <div class="form-group <?php echo e($errors->has('start_date') ? 'has-error' : ''); ?>">
                                <label for="start_date" class="control-label"><?php echo app('translator')->get('site.start-date'); ?></label>
                                <input required class="form-control date" name="start_date" type="text" id="start_date" value="<?php echo e(old('start_date',isset($employment->start_date) ? $employment->start_date : '')); ?>" >
                                <?php echo clean( $errors->first('start_date', '<p class="help-block">:message</p>') ); ?>

                            </div>
                            <div class="form-group <?php echo e($errors->has('end_date') ? 'has-error' : ''); ?>">
                                <label for="end_date" class="control-label"><?php echo app('translator')->get('site.end-date'); ?> (<?php echo app('translator')->get('site.optional'); ?>)</label>
                                <input class="form-control date" name="end_date" type="text" id="end_date" value="<?php echo e(old('end_date',isset($employment->end_date) ? $employment->end_date : '')); ?>" >
                                <?php echo clean( $errors->first('end_date', '<p class="help-block">:message</p>') ); ?>

                            </div>
                            <div class="form-group <?php echo e($errors->has('active') ? 'has-error' : ''); ?>">
                                <label for="active" class="control-label"><?php echo app('translator')->get('site.active'); ?></label>
                                <select  required name="active" class="form-control" id="active" >
                                    <?php $__currentLoopData = json_decode('{"1":"Yes","0":"No"}', true); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $optionKey => $optionValue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($optionKey); ?>" <?php echo e(((null !== old('active',@$employment->active)) && old('active',@$employment->active) == $optionKey) ? 'selected' : ''); ?>><?php echo e($optionValue); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <?php echo clean( $errors->first('active', '<p class="help-block">:message</p>') ); ?>

                            </div>
                            <div class="form-group">
                                <label for="salary" class="control-label"><?php echo app('translator')->get('site.salary'); ?> (<?php echo app('translator')->get('site.optional'); ?>)</label>
                                <div class="row">
                                    <div class="col-md-6 <?php echo e($errors->has('salary') ? 'has-error' : ''); ?>">
                                        <input class="form-control digit" name="salary" type="text" id="salary" value="<?php echo e(old('salary',isset($employment->salary) ? $employment->salary : '')); ?>" >
                                        <?php echo clean( $errors->first('salary', '<p class="help-block">:message</p>') ); ?>

                                    </div>
                                    <div class="col-md-6 <?php echo e($errors->has('salary_type') ? 'has-error' : ''); ?>">
                                        <select  required name="salary_type" class="form-control" id="salary_type" >
                                            <?php $__currentLoopData = json_decode('{"m":"'.__('site.per-month').'","a":"'.__('site.per-annum').'"}', true); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $optionKey => $optionValue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($optionKey); ?>" <?php echo e(((null !== old('salary_type',@$employment->salary_type)) && old('salary_type',@$employment->salary_type) == $optionKey) ? 'selected' : ''); ?>><?php echo e($optionValue); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                        <?php echo clean( $errors->first('salary_type', '<p class="help-block">:message</p>') ); ?>

                                    </div>
                                </div>

                            </div>



                            <div class="form-group">
                                <input class="btn btn-primary" type="submit" value="<?php echo e(__('site.create')); ?>">
                            </div>


                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>
    <script src="<?php echo e(asset('vendor/select2/js/select2.min.js')); ?>"></script>
    <script src="<?php echo e(asset('vendor/pickadate/picker.js')); ?>" type="text/javascript"></script>
    <script src="<?php echo e(asset('vendor/pickadate/picker.date.js')); ?>" type="text/javascript"></script>
    <script src="<?php echo e(asset('vendor/pickadate/picker.time.js')); ?>" type="text/javascript"></script>
    <script src="<?php echo e(asset('vendor/pickadate/legacy.js')); ?>" type="text/javascript"></script>
    <script src="<?php echo e(asset('js/order-search.js')); ?>"></script>
    <script  type="text/javascript">
"use strict";


        $('#employer_user_id').select2({
            placeholder: "<?php echo app('translator')->get('site.search-employers'); ?>...",
            minimumInputLength: 3,
            ajax: {
                url: '<?php echo e(route('admin.employers.search')); ?>',
                dataType: 'json',
                data: function (params) {
                    return {
                        term: $.trim(params.term)
                    };
                },
                processResults: function (data) {
                    return {
                        results: data
                    };
                },
                cache: true
            }

        });

        $('#user_id').select2({
            placeholder: "<?php echo app('translator')->get('site.search-candidates'); ?>...",
            minimumInputLength: 3,
            ajax: {
                url: '<?php echo e(route('admin.candidates.search')); ?>',
                dataType: 'json',
                data: function (params) {
                    return {
                        term: $.trim(params.term)
                    };
                },
                processResults: function (data) {
                    return {
                        results: data
                    };
                },
                cache: true
            }

        });

    </script>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('header'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('vendor/select2/css/select2.min.css')); ?>">
    <link href="<?php echo e(asset('vendor/pickadate/themes/default.date.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('vendor/pickadate/themes/default.time.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('vendor/pickadate/themes/default.css')); ?>" rel="stylesheet">


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin-page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/re3aytk/public_html/dev/resources/views/admin/employments/create-employment.blade.php ENDPATH**/ ?>