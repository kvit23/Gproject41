<?php $__env->startSection('page-title',$title); ?>
<?php $__env->startSection('inline-title',$title); ?>
<?php $__env->startSection('crumb'); ?>
    <li><?php echo e($title); ?></li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="pb-2">
        <a href="javascript:" data-toggle="modal" data-target="#login"  class=" btn btn-primary   btn-rounded "><i class="fa fa-filter"></i> <?php echo app('translator')->get('site.filter'); ?></a>

    </div>

    <section class="job-category style2 section">
        <div class="container_">

            <div class="cat-head">
                <?php if($candidates->count()==0): ?>
                    <?php echo app('translator')->get('site.no-records'); ?>
                <?php endif; ?>
                <div class="row">

                                     <?php $__currentLoopData = $candidates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>


                        <div class="card col-md-3 bd-0 rounded mb-3">

                            <?php if(!empty($item->candidate->picture) && file_exists($item->candidate->picture)): ?>
                                <img  class="img-fluid"   src="<?php echo e(asset($item->candidate->picture)); ?>">
                            <?php elseif($item->candidate->gender=='m'): ?>
                                <img  class="img-fluid"   src="<?php echo e(asset('img/man.jpg')); ?>">
                            <?php else: ?>
                                <img  class="img-fluid"   src="<?php echo e(asset('img/woman.jpg')); ?>">
                            <?php endif; ?>
                            <div class="card-body bd bd-t-0">
                                <h5 class="card-title"><?php echo e($item->candidate->display_name); ?></h5>
                                <p class="card-text">
                                    <strong><?php echo app('translator')->get('site.age'); ?>:</strong> <?php echo e(getAge(\Illuminate\Support\Carbon::parse($item->candidate->date_of_birth)->timestamp)); ?>

                                    <br/>
                                    <strong><?php echo app('translator')->get('site.gender'); ?>:</strong> <?php echo e(gender($item->candidate->gender)); ?>

                                </p>
                                <a  href="<?php echo e(route('profile',['candidate'=>$item->candidate->id])); ?>" class="card-link  btn btn-sm btn-primary rounded"><?php echo app('translator')->get('site.view-profile'); ?></a>
                            </div>
                        </div><!-- card -->


                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>


            </div>
        </div>
            <?php echo $candidates->appends(request()->input())->links(); ?>


    </section>






<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>
    ##parent-placeholder-d7eb6b340a11a367a1bec55e4a421d949214759f##
    <!-- Login Modal -->
    <div class="modal fade form-modal" id="login" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content modal-content-demo">



                <div class="modal-header">
                    <h6 class="modal-title"><?php echo app('translator')->get('site.filter'); ?></h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <div class="row no-gutters">
                        <div class="col-12">
                            <div  >


                                <form method="get" action="<?php echo e(route('profiles')); ?>" id="filterform">
                                    <div class="form-group">
                                        <input value="<?php echo e(request()->search); ?>" class="form-control" type="text" name="search" placeholder="<?php echo app('translator')->get('site.search'); ?>"/>
                                    </div>
                                    <div class="form-group">
                                        <label for="category" class="label"><?php echo app('translator')->get('site.category'); ?></label>
                                        <div class="position-relative">
                                            <select    name="category" id="category" class="form-control">
                                                <option></option>
                                                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option   <?php echo e(((null !== old('category',@request()->category)) && old('category',@request()->category) == @$category->id) ? 'selected' : ''); ?>  value="<?php echo e($category->id); ?>"><?php echo e($category->name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>

                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label for="search" class="control-label"><?php echo app('translator')->get('site.min-age'); ?></label>
                                            <select class="form-control" name="min_age" id="min_age">
                                                <option></option>
                                                <?php $__currentLoopData = range(1,100); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option <?php if(request()->min_age==$value): ?> selected  <?php endif; ?> value="<?php echo e($value); ?>"><?php echo e($value); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for="search" class="control-label"><?php echo app('translator')->get('site.max-age'); ?></label>
                                            <select class="form-control" name="max_age" id="max_age">
                                                <option></option>
                                                <?php $__currentLoopData = range(1,100); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option <?php if(request()->max_age==$value): ?> selected  <?php endif; ?> value="<?php echo e($value); ?>"><?php echo e($value); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="gender" class="control-label"><?php echo app('translator')->get('site.gender'); ?></label>
                                        <select name="gender" class="form-control" id="gender" >
                                            <option></option>
                                            <?php $__currentLoopData = json_decode('{"f":"'.__('site.female').'","m":"'.__('site.male').'"}', true); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $optionKey => $optionValue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($optionKey); ?>" <?php echo e(((null !== old('gender',@request()->gender)) && old('gender',@request()->gender) == $optionKey) ? 'selected' : ''); ?>><?php echo e($optionValue); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                        <?php echo clean( $errors->first('gender', '<p class="help-block">:message</p>') ); ?>

                                    </div>

                                    <?php $__currentLoopData = $fields; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $field): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                        <?php

                                        $value= request()->get('field_'.$field->id);

                                        ?>
                                        <?php if($field->type=='text' || $field->type=='textarea'): ?>
                                            <div class="form-group <?php echo e($errors->has('field_'.$field->id) ? ' has-error' : ''); ?>">
                                                <label for="<?php echo e('field_'.$field->id); ?>"><?php echo e($field->name); ?></label>
                                                <input placeholder="<?php echo e($field->placeholder); ?>"   type="text" class="form-control" id="<?php echo e('field_'.$field->id); ?>" name="<?php echo e('field_'.$field->id); ?>" value="<?php echo e($value); ?>">
                                                <?php if($errors->has('field_'.$field->id)): ?>
                                                    <span class="help-block">
                                            <strong><?php echo e($errors->first('field_'.$field->id)); ?></strong>
                                        </span>
                                                <?php endif; ?>
                                            </div>
                                        <?php elseif($field->type=='select'): ?>
                                            <div class="form-group <?php echo e($errors->has('field_'.$field->id) ? ' has-error' : ''); ?>">
                                                <label for="<?php echo e('field_'.$field->id); ?>"><?php echo e($field->name); ?></label>
                                                <?php
                                                $options = nl2br($field->options);
                                                $values = explode('<br />',$options);
                                                $selectOptions = [''=>''];
                                                foreach($values as $value2){
                                                    $selectOptions[$value2]=trim($value2);
                                                }
                                                ?>
                                                <?php echo e(Form::select('field_'.$field->id, $selectOptions,$value,['placeholder' => $field->placeholder,'class'=>'form-control'])); ?>

                                                <?php if($errors->has('field_'.$field->id)): ?>
                                                    <span class="help-block">
                                                                                        <strong><?php echo e($errors->first('field_'.$field->id)); ?></strong>
                                                                                    </span>

                                                <?php endif; ?>
                                            </div>
                                        <?php elseif($field->type=='checkbox'): ?>
                                            <div class="checkbox">
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
                                                <div class="radio">
                                                    <label>
                                                        <input type="radio" <?php if($value==$value2): ?> checked <?php endif; ?>  name="<?php echo e('field_'.$field->id); ?>" id="<?php echo e('field_'.$field->id); ?>-<?php echo e($value2); ?>" value="<?php echo e($value2); ?>" >
                                                        <?php echo e($value2); ?>

                                                    </label>
                                                </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>

                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button onclick="$('#filterform').submit()" type="button" class="btn btn-indigo"><?php echo app('translator')->get('site.filter'); ?></button>
                </div>


            </div>

        </div>
    </div>
    <!-- End Login Modal -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make($userLayout, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/re3aytk/public_html/dev/resources/views/site/profiles/index.blade.php ENDPATH**/ ?>