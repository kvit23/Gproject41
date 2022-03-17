<?php $__env->startSection('pageTitle',__('site.templates')); ?>

<?php $__env->startSection('content'); ?>

    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <?php echo app('translator')->get('site.active-template'); ?>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <img src="<?php echo e(asset('templates/'.$currentTemplate->directory.'/preview.png')); ?>"  class="img-fluid rounded mx-auto d-block" />
                        </div>
                        <div class="col-md-6">
                            <h3><?php echo e($currentTemplate->name); ?></h3>
                            <p>
                                <?php echo app('translator')->get(tlang($currentTemplate->directory,'app-description')); ?>
                            </p>
                            <!-- Default dropup button -->
                            <div class="btn-group dropup">
                                <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-cogs"></i> <?php echo app('translator')->get('site.customize'); ?>
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="<?php echo e(route('admin.templates.settings')); ?>"><?php echo app('translator')->get('site.settings'); ?></a>
                                    <a class="dropdown-item" href="<?php echo e(route('admin.templates.colors')); ?>"><?php echo app('translator')->get('site.colors'); ?></a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>


    <div class="card">
        <div class="card-header"><?php echo app('translator')->get('site.all-templates'); ?></div>
        <div class="card-body">
            <div class="row">

                <?php $__currentLoopData = $templates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $template): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-md-6 int_mb60"  >
                        <div class="row">
                            <div class="col-md-6">
                                <a href="#"  data-toggle="modal" data-target="#<?php echo e($template); ?>Modal" ><img src="<?php echo e(asset('templates/'.$template.'/preview.png')); ?>"  class="img-fluid rounded mx-auto d-block" /></a>

                                <!-- Modal -->
                                <div class="modal fade" id="<?php echo e($template); ?>Modal" tabindex="-1" role="dialog" aria-labelledby="<?php echo e($template); ?>ModalLabel" aria-hidden="true">
                                    <div class="modal-dialog  modal-xl" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="<?php echo e($template); ?>ModalLabel"><?php echo e(templateInfo($template)['name']); ?></h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <img src="<?php echo e(asset('templates/'.$template.'/preview.png')); ?>"  class="img-fluid" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <h3><?php echo e(templateInfo($template)['name']); ?></h3>
                                <p>
                                    <?php echo app('translator')->get(tlang($template,'app-description')); ?>
                                </p>
                                <!-- Default dropup button -->
                                <?php if($currentTemplate->directory ==$template): ?>
                                <div class="btn-group dropup">
                                    <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fa fa-cogs"></i> <?php echo app('translator')->get('site.customize'); ?>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="<?php echo e(route('admin.templates.settings')); ?>"><?php echo app('translator')->get('site.settings'); ?></a>
                                        <a class="dropdown-item" href="<?php echo e(route('admin.templates.colors')); ?>"><?php echo app('translator')->get('site.colors'); ?></a>
                                    </div>
                                </div>
                                    <?php else: ?>
                                    <a class="btn btn-primary" href="<?php echo e(route('admin.templates.install',['templateDir'=>$template])); ?>"><i class="fa fa-tools"></i> <?php echo app('translator')->get('site.install'); ?></a>
                                <?php endif; ?>

                            </div>
                        </div>

                    </div>


                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </div>


        </div>
    </div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/re3aytk/public_html/dev/resources/views/admin/templates/index.blade.php ENDPATH**/ ?>