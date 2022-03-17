<?php $__env->startSection('pageTitle',__('site.menus')); ?>
<?php $__env->startSection('page-title',__('site.header-menu')); ?>

<?php $__env->startSection('breadcrumb'); ?>
    <?php echo $__env->make('partials.breadcrumb',['crumbs'=>[
            [
                'link'=>'#',
                'page'=>__('site.header-menu')
            ],
    ]], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('page-content'); ?>

    <div class="row">

        <div class="col-md-4">
            <h4><?php echo app('translator')->get('site.add-links'); ?></h4>
            <div class="accordion" id="accordionExample">
                <div class="card">
                    <div class="card-header" id="headingOne">
                        <h2 class="mb-0">
                            <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                               <?php echo app('translator')->get('site.pages'); ?>
                            </button>
                        </h2>
                    </div>

                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                        <div class="card-body">
                            <ul class="list-group">
                                <?php $__currentLoopData = $pages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                <li class="list-group-item"><?php echo e($page['name']); ?>

                                    <form method="post" class="menuform int_inlinedisp" action="<?php echo e(route('admin.menus.save-header')); ?>">
                                        <?php echo csrf_field(); ?>
                                        <input type="hidden" name="name" value="<?php echo e($page['name']); ?>"/>
                                        <input type="hidden" name="label" value="<?php echo e($page['name']); ?>"/>
                                        <input type="hidden" name="url" value="<?php echo e($page['url']); ?>"/>
                                        <input type="hidden" name="type" value="p"/>
                                    <span onclick="$(this).parent().submit()"  class="int_curpoin badge badge-primary badge-pill float-right"><?php echo app('translator')->get('site.add'); ?></span>
                                    </form>
                                </li>

                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>

                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingTwo">
                        <h2 class="mb-0">
                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                <?php echo app('translator')->get('site.articles'); ?>
                            </button>
                        </h2>
                    </div>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                        <div class="card-body">
                            <ul class="list-group">
                                <?php $__currentLoopData = $articles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                    <li class="list-group-item"><?php echo e($page['name']); ?>

                                        <form method="post" class="menuform int_inlinedisp" action="<?php echo e(route('admin.menus.save-header')); ?>">
                                            <?php echo csrf_field(); ?>
                                            <input type="hidden" name="name" value="<?php echo app('translator')->get('site.article'); ?>: <?php echo e($page['name']); ?>"/>
                                            <input type="hidden" name="label" value="<?php echo e($page['name']); ?>"/>
                                            <input type="hidden" name="url" value="<?php echo e($page['url']); ?>"/>
                                            <input type="hidden" name="type" value="a"/>
                                            <span onclick="$(this).parent().submit()"  class="int_curpoin badge badge-primary badge-pill float-right"><?php echo app('translator')->get('site.add'); ?></span>
                                        </form>
                                    </li>

                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header" id="headingFour">
                        <h2 class="mb-0">
                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                <?php echo app('translator')->get('site.candidate-categories'); ?>
                            </button>
                        </h2>
                    </div>
                    <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionExample">
                        <div class="card-body">
                            <ul class="list-group">
                                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                    <li class="list-group-item"><?php echo e($page['name']); ?>

                                        <form method="post" class="menuform int_inlinedisp" action="<?php echo e(route('admin.menus.save-header')); ?>">
                                            <?php echo csrf_field(); ?>
                                            <input type="hidden" name="name" value="<?php echo app('translator')->get('site.category'); ?>: <?php echo e($page['name']); ?>"/>
                                            <input type="hidden" name="label" value="<?php echo e($page['name']); ?>"/>
                                            <input type="hidden" name="url" value="<?php echo e($page['url']); ?>"/>
                                            <input type="hidden" name="type" value="g"/>
                                            <span onclick="$(this).parent().submit()"  class="int_curpoin badge badge-primary badge-pill float-right"><?php echo app('translator')->get('site.add'); ?></span>
                                        </form>
                                    </li>

                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingFive">
                        <h2 class="mb-0">
                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                <?php echo app('translator')->get('site.job-categories'); ?>
                            </button>
                        </h2>
                    </div>
                    <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordionExample">
                        <div class="card-body">
                            <ul class="list-group">
                                <?php $__currentLoopData = $jobCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                    <li class="list-group-item"><?php echo e($page['name']); ?>

                                        <form method="post" class="menuform int_inlinedisp" action="<?php echo e(route('admin.menus.save-header')); ?>">
                                            <?php echo csrf_field(); ?>
                                            <input type="hidden" name="name" value="<?php echo app('translator')->get('site.job-category'); ?>: <?php echo e($page['name']); ?>"/>
                                            <input type="hidden" name="label" value="<?php echo e($page['name']); ?>"/>
                                            <input type="hidden" name="url" value="<?php echo e($page['url']); ?>"/>
                                            <input type="hidden" name="type" value="v"/>
                                            <span onclick="$(this).parent().submit()"  class="int_curpoin badge badge-primary badge-pill float-right"><?php echo app('translator')->get('site.add'); ?></span>
                                        </form>
                                    </li>

                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingSeven">
                        <h2 class="mb-0">
                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
                                <?php echo app('translator')->get('site.order-forms'); ?>
                            </button>
                        </h2>
                    </div>
                    <div id="collapseSeven" class="collapse" aria-labelledby="headingSeven" data-parent="#accordionExample">
                        <div class="card-body">
                            <ul class="list-group">
                                <?php $__currentLoopData = $orderForms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                    <li class="list-group-item"><?php echo e($page['name']); ?>

                                        <form method="post" class="menuform int_inlinedisp" action="<?php echo e(route('admin.menus.save-header')); ?>">
                                            <?php echo csrf_field(); ?>
                                            <input type="hidden" name="name" value="<?php echo app('translator')->get('site.order-form'); ?>: <?php echo e($page['name']); ?>"/>
                                            <input type="hidden" name="label" value="<?php echo e($page['name']); ?>"/>
                                            <input type="hidden" name="url" value="<?php echo e($page['url']); ?>"/>
                                            <input type="hidden" name="type" value="f"/>
                                            <span onclick="$(this).parent().submit()"  class="int_curpoin badge badge-primary badge-pill float-right"><?php echo app('translator')->get('site.add'); ?></span>
                                        </form>
                                    </li>

                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingThree">
                        <h2 class="mb-0">
                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                <?php echo app('translator')->get('site.custom'); ?>
                            </button>
                        </h2>
                    </div>
                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                        <div class="card-body">

                            <form method="post" id="customForm" class="menuform resetform" action="<?php echo e(route('admin.menus.save-header')); ?>">
                                <?php echo csrf_field(); ?>
                                <input type="hidden" name="name" value="<?php echo app('translator')->get('site.custom'); ?>" />
                                <input type="hidden" name="type" value="c"/>
                                <div class="form-group">
                                    <label for="label"><?php echo app('translator')->get('site.label'); ?></label>
                                    <input required class="form-control" type="text" name="label" value=""/>
                                </div>

                                    <div class="form-group">
                                        <label for="url">URL</label>
                                        <input required  class="form-control" type="text" name="url" value=""/>
                                    </div>


                                <div class="form-group">
                                    <label for="sort_order"><?php echo app('translator')->get('site.sort-order'); ?></label>
                                    <input class="form-control number" type="text" name="sort_order" value=""/>
                                </div>

                                <div class="form-group">
                                    <label for="parent_id"><?php echo app('translator')->get('site.parent'); ?></label>
                                    <select class="form-control" name="parent_id" id="parent_id">
                                        <option value="0"><?php echo app('translator')->get('site.none'); ?></option>
                                        <?php $__currentLoopData = \App\HeaderMenu::where('parent_id',0)->orderBy('sort_order')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($option->id); ?>"><?php echo e($option->label); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" name="new_window" type="checkbox" value="1" id="new_windowc">
                                    <label class="form-check-label" for="new_windowc">
                                        <?php echo app('translator')->get('site.new-window'); ?>
                                    </label>
                                </div>
                                <br/>


                                <button class="btn btn-primary float-right"><?php echo app('translator')->get('site.add'); ?></button>

                            </form>


                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="col-md-8" >
        <h4><?php echo app('translator')->get('site.menu'); ?></h4>
            <div>
                <img src="<?php echo e(asset('img/loader.gif')); ?>" id="loaderImg" class="int_hide"/>
            </div>
            <div id="menubox" class="accordion">

            </div>

        </div>


    </div>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('header'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('vendor/jquery-toast-plugin/dist/jquery.toast.min.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>
    <script src="<?php echo e(asset('vendor/jquery-toast-plugin/dist/jquery.toast.min.js')); ?>"></script>
    <script src="<?php echo e(asset('vendor/jquery/jquery.form.min.js')); ?>" type="text/javascript"></script>
<script>
"use strict";

    function loadMenu(){
        $('#loaderImg').show();
        $('#menubox').load('<?php echo e(route('admin.menus.load-header')); ?>',function(){
            $('#loaderImg').hide();
        });

    }

    loadMenu();

    $(document).on('submit','.menuform',function(e){
        e.preventDefault();
        $.toast('<?php echo app('translator')->get('site.saving'); ?>');

        var formId = $(this).attr('id');
        $(this).ajaxSubmit({
            success: function(responseText, statusText, xhr, $form){
                if(responseText.status){
                    $.toast('<?php echo app('translator')->get('site.changes-saved'); ?>');
                    loadMenu();

                    if(formId=='customForm'){
                        document. getElementById("customForm").reset();
                    }
                }
                else{
                    $.toast(responseText.error);
                }
            },
            error: function(jqXHR,textStatus,errorThrown){
                $.toast('<?php echo app('translator')->get('site.error-occurred'); ?>');
            }
        });
    });

    $(document).on('click','.deletemenu',function(e){
        e.preventDefault();
        $.toast('<?php echo app('translator')->get('site.removing'); ?>');
        $.get($(this).attr('href'),function(data){
            loadMenu();
        });
    });




</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin-page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/re3aytk/public_html/dev/resources/views/admin/menu/header_menu.blade.php ENDPATH**/ ?>