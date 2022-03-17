<?php $__env->startSection('pageTitle',__('site.templates')); ?>
<?php $__env->startSection('page-title',__('site.customize').': '.$template->name); ?>

<?php $__env->startSection('breadcrumb'); ?>
    <?php echo $__env->make('partials.breadcrumb',['crumbs'=>[
            [
                'link'=> route('admin.templates'),
                'page'=>__('site.templates')
            ],
            [
                'link'=>'#',
                'page'=>__('site.customize')
            ],
    ]], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('page-content'); ?>





    <a href="<?php echo e(route('admin.templates')); ?>" title="<?php echo app('translator')->get('site.back'); ?>"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> <?php echo app('translator')->get('site.back'); ?></button></a>
    <br/><br/>

    <div class="accordion" id="accordionExample">
       <?php $__currentLoopData = $settings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="card int_overvis"  >
            <div class="card-header" id="heading<?php echo e($key); ?>">
                <h2 class="mb-0">
                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapse<?php echo e($key); ?>" aria-expanded="false" aria-controls="collapse<?php echo e($key); ?>">
                        <?php echo e($option['name']); ?>

                    </button>
                </h2>
            </div>
            <div id="collapse<?php echo e($key); ?>" class="collapse" aria-labelledby="heading<?php echo e($key); ?>" data-parent="#accordionExample">
                <div class="card-body">
                   <p><?php echo e($option['description']); ?></p>

                    <form class="option-form" action="<?php echo e(route('admin.templates.save-options',['option'=>$key])); ?>" method="post" enctype="multipart/form-data">
                      <?php echo csrf_field(); ?>
                        <div class="row">
                            <div class="col-md-3">
                                <?php echo e(Form::select('enabled', ['1'=>__('site.enabled'),'0'=>__('site.disabled')], $option['enabled'], ['class'=>'form-control'])); ?>

                            </div>
                            <div class="col-md-9">
                                <button class="btn btn-primary float-right" type="submit"><?php echo app('translator')->get('site.save-changes'); ?></button>

                            </div>
                        </div>
                        <hr/>
                    <?php if(file_exists('./templates/'.currentTemplate()->directory.'/assets/previews/'.$key.'.png')): ?>

                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs">

                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#home-<?php echo e($key); ?>"><?php echo app('translator')->get('site.settings'); ?></a>
                            </li>
                           <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#menu1-<?php echo e($key); ?>"><?php echo app('translator')->get('site.demo'); ?></a>
                            </li>

                        </ul>
                    <?php endif; ?>
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div class="tab-pane active container px-2 pt-4" id="home-<?php echo e($key); ?>">


                                <?php echo $__env->make($option['form'],$option['values'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                            </div>
                            <?php if(file_exists('./templates/'.currentTemplate()->directory.'/assets/previews/'.$key.'.png')): ?>

                            <div class="tab-pane container px-2 pt-4" id="menu1-<?php echo e($key); ?>">
                               <img src="<?php echo e(tasset('previews/'.$key.'.png')); ?>" class="img-fluid">


                            </div>
                            <?php endif; ?>

                        </div>






                    </form>
                </div>
            </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('header'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('vendor/summernote/summernote-bs4.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('vendor/jquery-toast-plugin/dist/jquery.toast.min.css')); ?>">

    <link href="<?php echo e(asset('vendor/jquery-ui-1.11.4/jquery-ui.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('vendor/colorpicker/jquery.colorpicker.css')); ?>" rel="stylesheet">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>
    <script src="<?php echo e(asset('vendor/summernote/summernote-bs4.min.js')); ?>"></script>
    <script src="<?php echo e(asset('vendor/jquery-toast-plugin/dist/jquery.toast.min.js')); ?>"></script>
    <script src="<?php echo e(asset('vendor/jquery-ui-1.11.4/jquery-ui.min.js')); ?>"></script>
    <script src="<?php echo e(asset('vendor/colorpicker/jquery.colorpicker.js')); ?>"></script>

    <script src="<?php echo e(asset('js/admin/textrte.js')); ?>"></script>

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


        $('.option-form').on('submit',function(e){
                e.preventDefault();
                /*Ajax Request Header setup*/
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.toast('<?php echo app('translator')->get('site.saving'); ?>');

                /* Submit form data using ajax*/
                $.ajax({
                    url: $(this).attr('action'),
                    method: 'post',
                    data: $(this).serialize(),
                    success: function(response){
                        //------------------------
                        $.toast('<?php echo app('translator')->get('site.changes-saved'); ?>');
                        //--------------------------
                    }});
            });
        });



    </script>

    <?php echo $__env->make('admin.partials.image-browser', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin-page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/re3aytk/public_html/dev/resources/views/admin/templates/settings.blade.php ENDPATH**/ ?>