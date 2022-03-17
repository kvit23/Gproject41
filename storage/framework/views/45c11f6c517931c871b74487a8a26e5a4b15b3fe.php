<?php $__env->startSection('page-title',$orderForm->name); ?>
<?php $__env->startSection('breadcrumb'); ?>
    <li  class="breadcrumb-item"><a href="<?php echo e(route('order-forms')); ?>"><?php echo app('translator')->get('site.order-forms'); ?></a></li>
    <li class="breadcrumb-item"><?php echo app('translator')->get('site.form'); ?></li>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>

    <form id="wizardform" method="post" action="<?php echo e(route('order.save-form',['orderForm'=>$orderForm->id])); ?>" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <div id="form-container">

            <?php if(!empty($orderForm->description) && !request()->exists('nodesc')): ?>
                <h3><?php echo app('translator')->get('site.description'); ?></h3>
                <section>
                    <p><?php echo clean( $orderForm->description ); ?></p>
                </section>

           <?php endif; ?>



            <?php if($orderForm->shortlist==1 && setting('order_enable_shortlist')==1): ?>
                <h3><?php echo app('translator')->get('site.shortlist'); ?>(<?php echo e(strtolower(__('site.optional'))); ?>)</h3>
                <section>

                    <?php if(!is_array($cart) || count($cart)==0): ?>
                        <?php echo app('translator')->get('site.order-shortlist-text'); ?> <br/>
                        <a class="btn btn-primary rounded" href="<?php echo e(route('profiles')); ?>"><?php echo app('translator')->get('site.browse-profiles'); ?></a>
                    <?php else: ?>
                        <div class="row">
                            <?php $__currentLoopData = $cart; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                <?php
                                $candidate = \App\Candidate::find($item);
                                ?>

                                <div class="card col-md-3 bd-0 rounded">

                                    <?php if(!empty($candidate->picture) && file_exists($candidate->picture)): ?>
                                        <img  class="img-fluid"   src="<?php echo e(asset($candidate->picture)); ?>">
                                    <?php elseif($candidate->gender=='m'): ?>
                                        <img  class="img-fluid"   src="<?php echo e(asset('img/man.jpg')); ?>">
                                    <?php else: ?>
                                        <img  class="img-fluid"   src="<?php echo e(asset('img/woman.jpg')); ?>">
                                    <?php endif; ?>
                                    <div class="card-body bd bd-t-0">
                                        <h5 class="card-title"><?php echo e($candidate->display_name); ?></h5>
                                        <p class="card-text">
                                            <strong><?php echo app('translator')->get('site.age'); ?>:</strong> <?php echo e(getAge(\Illuminate\Support\Carbon::parse($candidate->date_of_birth)->timestamp)); ?>

                                            <br/>
                                            <strong><?php echo app('translator')->get('site.gender'); ?>:</strong> <?php echo e(gender($candidate->gender)); ?>

                                        </p>
                                        <a target="_blank" href="<?php echo e(route('profile',['candidate'=>$candidate->id])); ?>" class="card-link  btn btn-sm btn-primary rounded"><?php echo app('translator')->get('site.view-profile'); ?></a>
                                    </div>
                                </div><!-- card -->


                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                        <div class="int_mt30px"><a class="btn btn-success" href="<?php echo e(route('shortlist')); ?>"><i class="fa fa-edit"></i> <?php echo app('translator')->get('site.modify-shortlist'); ?></a></div>
                    <?php endif; ?>
                </section>
            <?php endif; ?>



            <?php $__currentLoopData = $orderForm->orderFieldGroups()->orderBy('sort_order')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                        if($group->layout=='v'){
                            $col = '12';
                        }
                    else{
                        $col = $group->columns;
                    }
                        ?>
            <h3><?php echo e($group->name); ?></h3>

            <section>

                <?php if(!empty($group->description)): ?>
                    <p>
                        <?php echo clean( $group->description ); ?>

                    </p>
                    <hr/>
                <?php endif; ?>
                <div class="row">
                <?php $__currentLoopData = $group->orderFields()->orderBy('sort_order')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $field): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                            $value='';
                        ?>

                            <?php if($field->type=='text'): ?>
                                <div class="form-group col-md-<?php echo e($col); ?><?php echo e($errors->has('field_'.$field->id) ? ' has-error' : ''); ?>">
                                    <label for="<?php echo e('field_'.$field->id); ?>"><?php if(!empty($field->required)): ?><?php endif; ?><?php echo e($field->name); ?></label>
                                    <input placeholder="<?php echo e($field->placeholder); ?>" <?php if(!empty($field->required)): ?>required <?php endif; ?>  type="text" class="form-control" id="<?php echo e('field_'.$field->id); ?>" name="<?php echo e('field_'.$field->id); ?>" value="<?php echo e($value); ?>">
                                    <?php if($errors->has('field_'.$field->id)): ?>
                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('field_'.$field->id)); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            <?php elseif($field->type=='label'): ?>
                                <div class="col-md-12">
                                    <h4><?php echo e($field->name); ?></h4>
                                </div>

                            <?php elseif($field->type=='select'): ?>
                                <div class="form-group col-md-<?php echo e($col); ?><?php echo e($errors->has('field_'.$field->id) ? ' has-error' : ''); ?>">
                                    <label for="<?php echo e('field_'.$field->id); ?>"><?php if(!empty($field->required)): ?><?php endif; ?><?php echo e($field->name); ?></label>
                                    <?php
                                    $options = nl2br($field->options);
                                    $values = explode('<br />',$options);
                                    $selectOptions = [];
                                    foreach($values as $value2){
                                        $selectOptions[trim($value2)]=trim($value2);
                                    }
                                    ?>
                                    <?php echo e(Form::select('field_'.$field->id, $selectOptions,$value,['placeholder' => $field->placeholder,'class'=>'form-control'])); ?>

                                    <?php if($errors->has('field_'.$field->id)): ?>
                                        <span class="help-block">
                                                                                        <strong><?php echo e($errors->first('field_'.$field->id)); ?></strong>
                                                                                    </span>

                                    <?php endif; ?>
                                </div>
                            <?php elseif($field->type=='textarea'): ?>
                                <div class="form-group col-md-<?php echo e($col); ?><?php echo e($errors->has('field_'.$field->id) ? ' has-error' : ''); ?>">
                                    <label for="<?php echo e('field_'.$field->id); ?>"><?php echo e($field->name); ?></label>
                                    <textarea placeholder="<?php echo e($field->placeholder); ?>" class="form-control" name="<?php echo e('field_'.$field->id); ?>" id="<?php echo e('field_'.$field->id); ?>" <?php if(!empty($field->required)): ?>required <?php endif; ?>  ><?php echo e($value); ?></textarea>
                                    <?php if($errors->has('field_'.$field->id)): ?>
                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('field_'.$field->id)); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            <?php elseif($field->type=='checkbox'): ?>
                                <div class="checkbox col-md-<?php echo e($col); ?>">
                                    <label>
                                        <input name="<?php echo e('field_'.$field->id); ?>" type="checkbox" value="1" <?php if($value==1): ?> checked <?php endif; ?>> <?php echo e($field->name); ?>

                                    </label>
                                </div>

                            <?php elseif($field->type=='radio'): ?>
                                <?php
                                $options = nl2br($field->options);
                                $values = explode('<br />',$options);
                                $radioOptions = [];
                                foreach($values as $value3){
                                    $radioOptions[$value3]=trim($value3);
                                }
                                ?>
                                <h5><strong><?php echo e($field->name); ?></strong></h5>
                                <?php $__currentLoopData = $radioOptions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="radio  col-md-<?php echo e($col); ?>">
                                        <label>
                                            <input type="radio" <?php if($value==$value2): ?> checked <?php endif; ?>  name="<?php echo e('field_'.$field->id); ?>" id="<?php echo e('field_'.$field->id); ?>-<?php echo e($value2); ?>" value="<?php echo e($value2); ?>" >
                                            <?php echo e($value2); ?>

                                        </label>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php elseif($field->type=='file'): ?>
                                <?php

                                    $value='';
                                ?>


                                    <div class="col-md-<?php echo e($col); ?> form-group<?php echo e($errors->has('field_'.$field->id) ? ' has-error' : ''); ?>">
                                        <label for="<?php echo e('field_'.$field->id); ?>"><?php if(!empty($field->required)): ?><?php endif; ?><?php echo e($field->name); ?></label>
                                        <input placeholder="<?php echo e($field->placeholder); ?>" <?php if(!empty($field->required)): ?>required <?php endif; ?>  type="file" class="form-control" id="<?php echo e('field_'.$field->id); ?>" name="<?php echo e('field_'.$field->id); ?>" >
                                        <?php if($errors->has('field_'.$field->id)): ?>
                                            <span class="help-block">
                                            <strong><?php echo e($errors->first('field_'.$field->id)); ?></strong>
                                        </span>
                                        <?php endif; ?>
                                    </div>






                            <?php endif; ?>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </section>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                <h3>
                    <?php if($orderForm->interview==1): ?>
                        <?php echo app('translator')->get('site.interview-details'); ?>
                    <?php else: ?>
                        <?php echo app('translator')->get('site.comments'); ?>
                    <?php endif; ?>

                </h3>
                <section>

                    <?php if($orderForm->interview==1): ?>

                        <div class="row">

                            <div class="form-group col-md-6">
                                <label for="interview_date" class="control-label"><?php echo app('translator')->get('site.preferred-interview-date'); ?></label>
                                <input class="form-control date" name="interview_date" type="text" id="interview_date" value="<?php echo e(old('interview_date')); ?>" >
                                <?php echo clean( $errors->first('interview_date', '<p class="help-block">:message</p>') ); ?>

                            </div>

                            <div class="form-group col-md-6">
                                <label for="interview_location" class="control-label"><?php echo app('translator')->get('site.interview-location'); ?></label>

                                <textarea placeholder="<?php echo app('translator')->get('site.interview-location-placeholder'); ?>" class="form-control" name="interview_location" id="interview_location" ><?php echo e(old('interview_location')); ?></textarea>
                                <?php echo clean( $errors->first('interview_location', '<p class="help-block">:message</p>') ); ?>

                            </div>

                        </div>



                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="interview_time" class="control-label"><?php echo app('translator')->get('site.interview-time'); ?></label>
                                <input placeholder="e.g. 3pm" class="form-control" name="interview_time" type="text" id="interview_time" value="<?php echo e(old('interview_time')); ?>" >
                                <?php echo clean( $errors->first('interview_time', '<p class="help-block">:message</p>') ); ?>

                            </div>

                        </div>

                    <?php endif; ?>

                    <div class="row">

                        <div class="form-group col-md-12">
                            <label for="comments" class="control-label"><?php echo app('translator')->get('site.comments'); ?></label>
                            <textarea class="form-control" id="comments"  name="comments"><?php echo e(old('comments')); ?></textarea>
                            <?php echo clean( $errors->first('comments', '<p class="help-block">:message</p>') ); ?>

                        </div>

                    </div>




                </section>


        </div>


    </form>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('header'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('vendor/jquery.steps/wizard.css')); ?>"/>
    <link href="<?php echo e(asset('vendor/pickadate/themes/default.date.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('vendor/pickadate/themes/default.css')); ?>" rel="stylesheet">

    <link rel="stylesheet" href="<?php echo e(asset('css/wizard.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>
    <script type="text/javascript" src="<?php echo e(asset('vendor/jquery.steps/jquery.steps.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('vendor/jquery.steps/jquery.form.js')); ?>"></script>
    <script src="<?php echo e(asset('vendor/pickadate/picker.js')); ?>" type="text/javascript"></script>
    <script src="<?php echo e(asset('vendor/pickadate/picker.date.js')); ?>" type="text/javascript"></script>
    <script src="<?php echo e(asset('vendor/pickadate/legacy.js')); ?>" type="text/javascript"></script>
    <script src="<?php echo e(asset('js/emporder.js')); ?>" type="text/javascript"></script>

<?php $__env->stopSection(); ?>


<?php echo $__env->make($templateLayout, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/re3aytk/public_html/dev/resources/views/employer/order/form.blade.php ENDPATH**/ ?>