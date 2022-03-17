<?php $__env->startSection('pageTitle',__('site.templates')); ?>
<?php $__env->startSection('page-title',__('site.colors').': '.$template->name); ?>

<?php $__env->startSection('breadcrumb'); ?>
    <?php echo $__env->make('partials.breadcrumb',['crumbs'=>[
            [
                'link'=> route('admin.templates'),
                'page'=>__('site.templates')
            ],
            [
                'link'=>'#',
                'page'=>__('site.colors')
            ],
    ]], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('page-content'); ?>

    <form action="<?php echo e(route('admin.templates.save-colors')); ?>" method="post">
        <?php echo csrf_field(); ?>

        <table class="table">
            <thead>
                <tr>
                    <th class="int_txcen"><?php echo app('translator')->get('site.original-color'); ?></th>
                    <th><?php echo app('translator')->get('site.new-color'); ?></th>
                </tr>
            </thead>
            <tbody>

            <?php $__currentLoopData = $colorList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $color): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td class="int_txcen">
                        <?php $__env->startSection('header'); ?>
                            ##parent-placeholder-594fd1615a341c77829e83ed988f137e1ba96231##
                        <style>
                            .cls<?php echo e($loop->index); ?>{
                                background-color: #<?php echo e($color); ?>

                            }
                        </style>
                        <?php $__env->stopSection(); ?>
                        <div class="int_colorstyle" class="cls<?php echo e($loop->index); ?>"></div>
                    #<?php echo e($color); ?>

                    </td>
                    <td>
                        <div class="input-group myColorPicker">
                        <input type="text" class="form-control colorpicker-full"  name="<?php echo e($color); ?>_new" <?php if($template->templateColors()->where('original_color',$color)->first()): ?> value="<?php echo e($template->templateColors()->where('original_color',$color)->first()->user_color); ?>" <?php endif; ?>>
                        </div>

                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </tbody>

        </table>
        <button class="btn btn-primary btn-block"><?php echo app('translator')->get('site.save-changes'); ?></button>
    </form>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('header'); ?>

    <link href="<?php echo e(asset('vendor/jquery-ui-1.11.4/jquery-ui.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('vendor/colorpicker/jquery.colorpicker.css')); ?>" rel="stylesheet">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>
    <script src="<?php echo e(asset('vendor/jquery-ui-1.11.4/jquery-ui.min.js')); ?>"></script>
    <script src="<?php echo e(asset('vendor/colorpicker/jquery.colorpicker.js')); ?>"></script>



    <script>
"use strict";
        $(document).ready(function(){


            $('.colorpicker-full').colorpicker({
                parts:          'full',
                showOn:         'both',
                buttonColorize: true,
                showNoneButton: true,
                buttonImage : '<?php echo e(asset('vendor/colorpicker/images/ui-colorpicker.png')); ?>'
            });

        });
    </script>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin-page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/re3aytk/public_html/dev/resources/views/admin/templates/colors.blade.php ENDPATH**/ ?>