<?php $__env->startSection('footer'); ?>
    <script src="<?php echo e(asset('vendor/select2/js/select2.min.js')); ?>"></script>
    <script src="<?php echo e(asset('vendor/pickadate/picker.js')); ?>" type="text/javascript"></script>
    <script src="<?php echo e(asset('vendor/pickadate/picker.date.js')); ?>" type="text/javascript"></script>
    <script src="<?php echo e(asset('vendor/pickadate/picker.time.js')); ?>" type="text/javascript"></script>
    <script src="<?php echo e(asset('vendor/pickadate/legacy.js')); ?>" type="text/javascript"></script>
    <script src="<?php echo e(asset('js/showorder.js')); ?>"></script>
    <script  type="text/javascript">
"use strict";

        $('#user_id').select2({
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

        $('#candidates').select2({
            placeholder: "<?php echo app('translator')->get('site.search-candidates'); ?>...",
            minimumInputLength: 3,
            ajax: {
                url: '<?php echo e(route('admin.candidates.search')); ?>?format=candidate_id',
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
<?php /**PATH /home/re3aytk/public_html/dev/resources/views/admin/interviews/search-script.blade.php ENDPATH**/ ?>