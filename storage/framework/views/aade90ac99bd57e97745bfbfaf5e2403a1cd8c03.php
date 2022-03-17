<?php $__env->startSection('page-title',$title); ?>
<?php $__env->startSection('inline-title',$title); ?>
<?php $__env->startSection('crumb'); ?>
    <li><?php echo e($title); ?></li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>


    <section class="job-category style2 section">
        <div class="container">
            <a href="javascript:" data-toggle="modal" data-target="#login"  class="blue-button mb-2 btn btn-lg "><i class="lni lni-sort-alpha-asc"></i> <?php echo app('translator')->get('site.filter'); ?></a>

            <div class="cat-head">
                <?php if($candidates->count()==0): ?>
                    <?php echo app('translator')->get('site.no-records'); ?>
                <?php endif; ?>
                <div class="row">

                                     <?php $__currentLoopData = $candidates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-lg-3 col-md-6 col-12">
                            <a href="<?php echo e(route('profile',['candidate'=>$item->candidate->id])); ?>" class="single-cat wow fadeInUp" data-wow-delay=".2s">
                                <div class="top-side">
                                    <?php if(!empty($item->candidate->picture) && file_exists($item->candidate->picture)): ?>
                                        <img  class=" img-fluid"    src="<?php echo e(asset($item->candidate->picture)); ?>" >
                                    <?php elseif($item->candidate->gender=='m'): ?>
                                        <img class="img-fluid" src="<?php echo e(asset('img/man.jpg')); ?>">
                                    <?php else: ?>
                                        <img class="img-fluid" src="<?php echo e(asset('img/woman.jpg')); ?>">
                                    <?php endif; ?>
                                </div>
                                <div class="bottom-side">
                                    <span class="available-job"><?php echo e(getAge(\Illuminate\Support\Carbon::parse($item->candidate->date_of_birth)->timestamp)); ?>/<?php echo e(gender($item->candidate->gender)); ?></span>
                                    <h3><?php echo e($item->candidate->display_name); ?></h3>

                                </div>

                            </a>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>

                    <div class="pagination center">
                        <?php echo $candidates->appends(request()->input())->links('jobportal.views.partials.paginator'); ?>

                    </div>
            </div>
        </div>
    </section>

    <!-- Login Modal -->
    <div class="modal fade form-modal" id="login" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog max-width-px-840 position-relative">
            <button type="button"
                    class="circle-32 btn-reset bg-white pos-abs-tr mt-md-n6 mr-lg-n6 focus-reset z-index-supper"
                    data-dismiss="modal"><i class="lni lni-close"></i></button>
            <div class="login-modal-main">
                <div class="row no-gutters">
                    <div class="col-12">
                        <div class="row">
                            <div class="heading">
                                <h3><?php echo app('translator')->get('site.filter'); ?></h3>
                            </div>

                            <form method="get" action="<?php echo e(route('profiles')); ?>">
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
                                <div class="form-group mb-8 button">
                                    <button class="btn "><?php echo app('translator')->get('site.filter'); ?>
                                    </button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Login Modal -->




<?php $__env->stopSection(); ?>


<?php echo $__env->make($templateLayout, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/re3aytk/public_html/dev/public/templates/jobportal/views/site/profiles/index.blade.php ENDPATH**/ ?>