<?php $__env->startSection('header'); ?>
    <link href="<?php echo e(asset('vendor/pickadate/themes/default.date.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('vendor/pickadate/themes/default.time.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('vendor/pickadate/themes/default.css')); ?>" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo e(asset('vendor/select2/css/select2.min.css')); ?>">

<?php $__env->stopSection(); ?>


<?php $__env->startSection('footer'); ?>
    <script src="<?php echo e(asset('vendor/pickadate/picker.js')); ?>" type="text/javascript"></script>
    <script src="<?php echo e(asset('vendor/pickadate/picker.date.js')); ?>" type="text/javascript"></script>
    <script src="<?php echo e(asset('vendor/pickadate/picker.time.js')); ?>" type="text/javascript"></script>
    <script src="<?php echo e(asset('vendor/pickadate/legacy.js')); ?>" type="text/javascript"></script>
    <script src="<?php echo e(asset('vendor/select2/js/select2.min.js')); ?>"></script>

    <script  type="text/javascript">
"use strict";

        $('#user_id').select2({
            placeholder: "<?php echo app('translator')->get('site.search-users'); ?>...",
            minimumInputLength: 3,
            ajax: {
                url: '<?php echo e(route('admin.users.search')); ?>',
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

        $('.date').pickadate({
            format: 'yyyy-mm-dd'
        });


    </script>
<?php $__env->stopSection(); ?>
<?php /**PATH /home/re3aytk/public_html/dev/resources/views/admin/invoices/form-logic.blade.php ENDPATH**/ ?>