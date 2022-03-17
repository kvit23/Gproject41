<?php $__env->startSection('page-title',$title); ?>
<?php $__env->startSection('inline-title',$title); ?>
<?php $__env->startSection('content'); ?>
    <section class="about-area them-2 pb-130 pt-50">
        <div class="container">

            <div class="row">

                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-3">


                            <div id="accordion" class="accordion_ modified-accordion int_tpmb" role="tablist" aria-multiselectable="true" >

                                <div class="card">
                                    <div class="card-header" role="tab" id="headingTwo">
                                        <a class="collapsed" data-toggle="collapse" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                            <?php echo app('translator')->get('site.filter'); ?>
                                        </a>
                                    </div>
                                    <div id="collapseTwo" class="collapse" data-parent="#accordion" role="tabpanel" aria-labelledby="headingTwo">
                                        <div class="card-body int_pttwenty"  >
                                            <form method="get" action="<?php echo e(route('profiles')); ?>">

                                                <div class="form-group">
                                                    <input value="<?php echo e(request()->search); ?>" class="form-control" type="text" name="search" placeholder="<?php echo app('translator')->get('site.search'); ?>"/>
                                                </div>
                                                <?php if(\App\Category::count()>0): ?>
                                                    <div class="form-group">
                                                        <label for="category"><?php echo app('translator')->get('site.category'); ?></label>

                                                            <select    name="category" id="category" class="form-control">
                                                                <option></option>
                                                                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <option   <?php echo e(((null !== old('category',@request()->category)) && old('category',@request()->category) == @$category->id) ? 'selected' : ''); ?>  value="<?php echo e($category->id); ?>"><?php echo e($category->name); ?></option>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            </select>


                                                    </div>
                                                <?php endif; ?>


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

                                                <button type="submit" class="btn btn-primary btn-block filter rounded"><i class="fa fa-search"></i> <?php echo app('translator')->get('site.filter'); ?></button>
                                                <br/>
                                                <a class="btn btn-success btn-block rounded" href="<?php echo e(route('profiles')); ?>"><i class="fa fa-sync"></i> <?php echo app('translator')->get('site.reset'); ?></a>
                                            </form>

                                        </div>
                                    </div>
                                </div>
                            </div><!-- accordion -->



                        </div>
                        <div class="col-md-9">

                            <div class="row row-sm">

                                <?php if($candidates->count()==0): ?>
                                    <?php echo app('translator')->get('site.no-records'); ?>
                                <?php endif; ?>

                                <?php $__currentLoopData = $candidates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="col-lg-4 col-md-6 pb-30">

                                            <div class="card" ">

                                                <a href="<?php echo e(route('profile',['candidate'=>$item->candidate->id])); ?>">
                                                    <?php if(!empty($item->candidate->picture) && file_exists($item->candidate->picture)): ?>
                                                        <img class="card-img-top"  src="<?php echo e(asset($item->candidate->picture)); ?>" >
                                                    <?php elseif($item->candidate->gender=='m'): ?>
                                                        <img   class="card-img-top"   src="<?php echo e(asset('img/man.jpg')); ?>">
                                                    <?php else: ?>
                                                        <img  class="card-img-top"   src="<?php echo e(asset('img/woman.jpg')); ?>">
                                                    <?php endif; ?>
                                                </a>


                                                <div class="card-body">
                                                    <h5 class="card-title"><?php echo e($item->candidate->display_name); ?></h5>
                                                    <p class="card-text"><?php echo e(getAge(\Illuminate\Support\Carbon::parse($item->candidate->date_of_birth)->timestamp)); ?>/<?php echo e(gender($item->candidate->gender)); ?></p>
                                                    <a href="<?php echo e(route('profile',['candidate'=>$item->candidate->id])); ?>" class="btn btn-sm  btn-success rounded"><i class="fa fa-user"></i> <?php echo app('translator')->get('site.view-profile'); ?></a>

                                                    <a href="<?php echo e(route('shortlist-candidate',['candidate'=>$item->candidate->id])); ?>" class="btn btn-sm btn-primary   rounded"><i class="fa fa-plus"></i> <?php echo app('translator')->get('site.shortlist'); ?></a>
                                                </div>
                                            </div>



                                        </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            </div>

                            <?php echo clean( $candidates->appends(request()->input())->render() ); ?>


                        </div>
                    </div>

                </div>
            </div> <!-- row -->
        </div>
    </section>




<?php $__env->stopSection(); ?>

<?php $__env->startSection('header'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('css/templates/accordion.css')); ?>">


    <?php $__env->stopSection(); ?>

<?php echo $__env->make($templateLayout, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/re3aytk/public_html/dev/public/templates/buson/views/site/profiles/index.blade.php ENDPATH**/ ?>