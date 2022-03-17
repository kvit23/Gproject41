<?php $__env->startSection('page-title',__('site.account-details')); ?>

<?php $__env->startSection('content'); ?>
    <form action="<?php echo e(route('candidate.save-profile')); ?>" method="post" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>

            <div class="card">
                <div class="card-header" id="headingOne">
                    <h5 class="mb-0">
                            <?php echo app('translator')->get('site.general-details'); ?>

                    </h5>
                </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-md-6 <?php echo e($errors->has('name') ? 'has-error' : ''); ?>">
                                <label for="name" class="control-label"><span class="req">*</span><?php echo app('translator')->get('site.name'); ?></label>
                                <input required class="form-control" name="name" type="text" id="name" value="<?php echo e(old('name',isset($candidate->name) ? $candidate->name : '')); ?>" >
                                <?php echo clean( $errors->first('name', '<p class="help-block">:message</p>') ); ?>

                            </div>
                            <div class="form-group col-md-6 <?php echo e($errors->has('display_name') ? 'has-error' : ''); ?>">
                                <label for="display_name" class="control-label"><span class="req">*</span><?php echo app('translator')->get('site.display-name'); ?></label>
                                <input required  class="form-control" name="display_name" type="text" id="display_name" value="<?php echo e(old('display_name',isset($candidate->candidate->display_name) ? $candidate->candidate->display_name : '')); ?>" >
                                <?php echo clean( $errors->first('display_name', '<p class="help-block">:message</p>') ); ?>

                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6 <?php echo e($errors->has('email') ? 'has-error' : ''); ?>">
                                <label for="email" class="control-label"><span class="req">*</span><?php echo app('translator')->get('site.email'); ?></label>
                                <input required  class="form-control" name="email" type="text" id="email" value="<?php echo e(old('email',isset($candidate->email) ? $candidate->email : '')); ?>" >
                                <?php echo clean( $errors->first('email', '<p class="help-block">:message</p>') ); ?>

                            </div>
                            <div class="form-group col-md-6 <?php echo e($errors->has('telephone') ? 'has-error' : ''); ?>">
                                <label for="telephone" class="control-label"><?php echo app('translator')->get('site.telephone'); ?></label>
                                <input class="form-control" name="telephone" type="text" id="telephone" value="<?php echo e(old('telephone',isset($candidate->telephone) ? $candidate->telephone : '')); ?>" >
                                <?php echo clean( $errors->first('telephone', '<p class="help-block">:message</p>') ); ?>

                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6 <?php echo e($errors->has('gender') ? 'has-error' : ''); ?>">
                                <label for="gender" class="control-label"><span class="req">*</span><?php echo app('translator')->get('site.gender'); ?></label>
                                <select  required name="gender" class="form-control" id="gender" >
                                    <?php $__currentLoopData = json_decode('{"f":"'.__('site.female').'","m":"'.__('site.male').'"}', true); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $optionKey => $optionValue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($optionKey); ?>" <?php echo e(((null !== old('gender',@$candidate->candidate->gender)) && old('gender',@$candidate->candidate->gender) == $optionKey) ? 'selected' : ''); ?>><?php echo e($optionValue); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <?php echo clean( $errors->first('gender', '<p class="help-block">:message</p>') ); ?>

                            </div>
                            <div class="form-group col-md-6  <?php echo e($errors->has('date_of_birth') ? 'has-error' : ''); ?>">
                                <label for="date_of_birth" class="control-label"><span class="req">*</span><?php echo app('translator')->get('site.date-of-birth'); ?></label>

                                <div class="row">
                                    <div class="col-md-4">
                                        <?php
                                        if(isset($candidate)){
                                            $byear = \Illuminate\Support\Carbon::parse($candidate->candidate->date_of_birth)->year;
                                        }
                                        else{
                                            $byear = null;
                                        }
                                        ?>
                                        <select  required  class="form-control" name="date_of_birth_year" id="date_of_birth_year">
                                            <option  >YYYY</option>

                                            <?php $__currentLoopData = array_reverse(range(1930,date('Y'))); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $year): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($year); ?>"   <?php echo e(((null !== old('date_of_birth_year',$byear)) && old('date_of_birth_year',$byear) == $year) ? 'selected' : ''); ?>   ><?php echo e($year); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <select  required  class="form-control" name="date_of_birth_month" id="date_of_birth_month">
                                            <option  >MM</option>
                                            <?php
                                            if(isset($candidate)){
                                                $bmonth = \Illuminate\Support\Carbon::parse($candidate->candidate->date_of_birth)->month;
                                            }
                                            else{
                                                $bmonth = null;
                                            }
                                            ?>
                                            <?php $__currentLoopData = range(1,12); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $month): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option <?php echo e(((null !== old('date_of_birth_month',$bmonth)) && old('date_of_birth_month',$bmonth) == $month) ? 'selected' : ''); ?> value="<?php echo e($month); ?>"><?php echo e($month); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <select  required  class="form-control" name="date_of_birth_day" id="date_of_birth_day">
                                            <option >DD</option>
                                            <?php
                                            if(isset($candidate)){
                                                $bday = \Illuminate\Support\Carbon::parse($candidate->candidate->date_of_birth)->day;
                                            }
                                            else{
                                                $bday = null;
                                            }
                                            ?>
                                            <?php $__currentLoopData = range(1,31); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $day): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option <?php echo e(((null !== old('date_of_birth_day',$bday)) && old('date_of_birth_day',$bday) == $day) ? 'selected' : ''); ?>  value="<?php echo e($day); ?>"><?php echo e($day); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                </div>

                                <?php echo clean( $errors->first('date_of_birth', '<p class="help-block">:message</p>') ); ?>

                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group  <?php echo e($errors->has('picture') ? 'has-error' : ''); ?>">
                                    <label for="picture" class="control-label"><?php echo app('translator')->get('site.change'); ?>  <?php echo app('translator')->get('site.picture'); ?></label>


                                    <input class="form-control" name="picture" type="file" id="picture" value="<?php echo e(isset($candidate->candidate->picture) ? $candidate->candidate->picture : ''); ?>" >
                                    <?php echo clean( $errors->first('picture', '<p class="help-block">:message</p>') ); ?>

                                </div>

                                <?php if(!empty($candidate->candidate->picture)): ?>

                                    <div ><img   data-toggle="modal" data-target="#pictureModal" src="<?php echo e(asset($candidate->candidate->picture)); ?>"  class="int_w330cur" /></div> <br/>
                                    <a  onclick="return confirm('<?php echo app('translator')->get('site.delete-prompt'); ?>')" class="int_tpmb btn btn-danger" href="<?php echo e(route('candidate.remove-picture')); ?>"><i class="fa fa-trash"></i> <?php echo app('translator')->get('site.delete'); ?> <?php echo app('translator')->get('site.picture'); ?></a>



                                    <div class="modal fade" id="pictureModal" tabindex="-1" role="dialog" aria-labelledby="pictureModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="pictureModalLabel"><?php echo app('translator')->get('site.picture'); ?></h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body int_txcen"  >
                                                    <img src="<?php echo e(asset($candidate->candidate->picture)); ?>" class="int_txcen" />
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-primary" data-dismiss="modal"><?php echo app('translator')->get('site.close'); ?></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                <?php endif; ?>

                            </div>

                        </div>
                        <div class="row">
                            <?php

                                $value = old('cv_path',$candidate->candidate->cv_path);


                            ?>

                            <div class="col-md-12 row">
                                <div class="col-md-6 form-group<?php echo e($errors->has('cv_path') ? ' has-error' : ''); ?>">
                                    <label for="<?php echo e('cv_path'); ?>"><?php echo app('translator')->get('site.cv-resume'); ?></label>
                                    <input type="file" class="form-control" id="<?php echo e('cv_path'); ?>" name="<?php echo e('cv_path'); ?>" >
                                    <?php if($errors->has('cv_path')): ?>
                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('cv_path')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>

                                <div class="col-md-6">


                                    <?php if(!empty($value)): ?>
                                        <h3><?php echo e(basename($value)); ?></h3>
                                        <?php if(isImage($value)): ?>
                                            <div><img  data-toggle="modal" data-target="#pictureModalcv" src="<?php echo e(route('candidate.image')); ?>?file=<?php echo e($value); ?>"  class="int_w330cur" /></div> <br/>


                                            <div class="modal fade" id="pictureModalcv" tabindex="-1" role="dialog" aria-labelledby="pictureModalcvLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-lg" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="pictureModalcvLabel"><?php echo app('translator')->get('site.picture'); ?></h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body int_txcen"  >
                                                            <img src="<?php echo e(route('candidate.image')); ?>?file=<?php echo e($value); ?>" class="int_txcen" />
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-primary" data-dismiss="modal"><?php echo app('translator')->get('site.close'); ?></button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>



                                        <?php endif; ?>
                                        <a onclick="return confirm('<?php echo app('translator')->get('site.delete-prompt'); ?>')" class="btn btn-danger" href="<?php echo e(route('candidate.remove-cv',['id'=>$candidate->id])); ?>"><i class="fa fa-trash"></i> <?php echo app('translator')->get('site.delete-file'); ?></a>
                                        <a class="btn btn-success" href="<?php echo e(route('candidate.download')); ?>?file=<?php echo e($value); ?>"><i class="fa fa-download"></i> <?php echo app('translator')->get('site.download'); ?></a>
                                    <?php endif; ?>
                                </div>


                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-12">
                                <label for="categories"><?php echo app('translator')->get('site.categories'); ?></label>

                                    <select multiple name="categories[]" id="categories" class="form-control select2">
                                        <option></option>
                                        <?php $__currentLoopData = \App\Category::orderBy('name')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option  <?php if( (is_array(old('categories')) && in_array(@$category->id,old('categories')))  || (null === old('categories')  && $candidate->candidate->categories()->where('id',$category->id)->first() )): ?>
                                                selected
                                                <?php endif; ?>
                                                value="<?php echo e($category->id); ?>"><?php echo e($category->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>

                            </div>
                        </div>





                    </div>

            </div>
        <br/>
            <?php $__currentLoopData = \App\CandidateFieldGroup::where('public',1)->orderBy('sort_order')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="card">
                    <div class="card-header" id="heading<?php echo e($group->id); ?>">
                        <h5 class="mb-0">
                               <?php echo e($group->name); ?>


                        </h5>
                    </div>
                        <div class="card-body row">
                            <?php $__currentLoopData = $group->candidateFields()->orderBy('sort_order')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $field): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php
                                  $value = old('field_'.$field->id,($candidate->candidateFields()->where('id',$field->id)->first()) ? $candidate->candidateFields()->where('id',$field->id)->first()->pivot->value:'');


                                ?>
                                <?php if($field->type=='text'): ?>
                                    <div class="form-group col-md-6<?php echo e($errors->has('field_'.$field->id) ? ' has-error' : ''); ?>">
                                        <label for="<?php echo e('field_'.$field->id); ?>"><?php if(!empty($field->required)): ?><span class="req">*</span><?php endif; ?><?php echo e($field->name); ?>:</label>
                                        <input placeholder="<?php echo e($field->placeholder); ?>" <?php if(!empty($field->required)): ?>required <?php endif; ?>  type="text" class="form-control" id="<?php echo e('field_'.$field->id); ?>" name="<?php echo e('field_'.$field->id); ?>" value="<?php echo e($value); ?>">
                                        <?php if($errors->has('field_'.$field->id)): ?>
                                            <span class="help-block">
                                            <strong><?php echo e($errors->first('field_'.$field->id)); ?></strong>
                                        </span>
                                        <?php endif; ?>
                                    </div>
                                <?php elseif($field->type=='select'): ?>
                                    <div class="form-group col-md-6<?php echo e($errors->has('field_'.$field->id) ? ' has-error' : ''); ?>">
                                        <label for="<?php echo e('field_'.$field->id); ?>"><?php if(!empty($field->required)): ?><span class="req">*</span><?php endif; ?><?php echo e($field->name); ?>:</label>
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
                                    <div class="form-group col-md-6<?php echo e($errors->has('field_'.$field->id) ? ' has-error' : ''); ?>">
                                        <label for="<?php echo e('field_'.$field->id); ?>"><?php if(!empty($field->required)): ?><span class="req">*</span><?php endif; ?><?php echo e($field->name); ?>:</label>
                                        <textarea placeholder="<?php echo e($field->placeholder); ?>" class="form-control" name="<?php echo e('field_'.$field->id); ?>" id="<?php echo e('field_'.$field->id); ?>" <?php if(!empty($field->required)): ?>required <?php endif; ?>  ><?php echo e($value); ?></textarea>
                                        <?php if($errors->has('field_'.$field->id)): ?>
                                            <span class="help-block">
                                            <strong><?php echo e($errors->first('field_'.$field->id)); ?></strong>
                                        </span>
                                        <?php endif; ?>
                                    </div>
                                <?php elseif($field->type=='checkbox'): ?>
                                    <div class="checkbox col-md-6">
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
                                        <div class="radio  col-md-6">
                                            <label>
                                                <input type="radio" <?php if($value==$value2): ?> checked <?php endif; ?>  name="<?php echo e('field_'.$field->id); ?>" id="<?php echo e('field_'.$field->id); ?>-<?php echo e($value2); ?>" value="<?php echo e($value2); ?>" >
                                                <?php echo e($value2); ?>

                                            </label>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php elseif($field->type=='file'): ?>
                                    <?php
                                      $value = old('field_'.$field->id,($candidate->candidateFields()->where('id',$field->id)->first()) ? $candidate->candidateFields()->where('id',$field->id)->first()->pivot->value:'');


                                    ?>

                                    <div class="col-md-12 row">
                                        <div class="col-md-6 form-group<?php echo e($errors->has('field_'.$field->id) ? ' has-error' : ''); ?>">
                                            <label for="<?php echo e('field_'.$field->id); ?>"><?php if(!empty($field->required)): ?><span class="req">*</span><?php endif; ?><?php echo e($field->name); ?>:</label>
                                            <input placeholder="<?php echo e($field->placeholder); ?>" <?php if(!empty($field->required)): ?>required <?php endif; ?>  type="file" class="form-control" id="<?php echo e('field_'.$field->id); ?>" name="<?php echo e('field_'.$field->id); ?>" >
                                            <?php if($errors->has('field_'.$field->id)): ?>
                                                <span class="help-block">
                                            <strong><?php echo e($errors->first('field_'.$field->id)); ?></strong>
                                        </span>
                                            <?php endif; ?>
                                        </div>

                                        <div class="col-md-6">


                                            <?php if(!empty($value)): ?>
                                                <h3><?php echo e(basename($value)); ?></h3>
                                                <?php if(isImage($value)): ?>
                                                    <div><img  data-toggle="modal" data-target="#pictureModal<?php echo e($field->id); ?>" src="<?php echo e(route('candidate.image')); ?>?file=<?php echo e($value); ?>"  class="int_w330cur" /></div> <br/>


                                                    <div class="modal fade" id="pictureModal<?php echo e($field->id); ?>" tabindex="-1" role="dialog" aria-labelledby="pictureModal<?php echo e($field->id); ?>Label" aria-hidden="true">
                                                        <div class="modal-dialog modal-lg" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="pictureModal<?php echo e($field->id); ?>Label"><?php echo app('translator')->get('site.picture'); ?></h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body int_txcen"  >
                                                                    <img src="<?php echo e(route('candidate.image')); ?>?file=<?php echo e($value); ?>" class="int_txcen" />
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-primary" data-dismiss="modal"><?php echo app('translator')->get('site.close'); ?></button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>



                                                <?php endif; ?>
                                                <a onclick="return confirm('<?php echo app('translator')->get('site.delete-prompt'); ?>')" class="btn btn-danger" href="<?php echo e(route('candidate.remove-file',['fieldId'=>$field->id,'userId'=>$candidate->id])); ?>"><i class="fa fa-trash"></i> <?php echo app('translator')->get('site.delete-file'); ?></a>
                                                <a class="btn btn-success" href="<?php echo e(route('candidate.download')); ?>?file=<?php echo e($value); ?>"><i class="fa fa-download"></i> <?php echo app('translator')->get('site.download'); ?></a>
                                            <?php endif; ?>
                                        </div>


                                    </div>



                                <?php endif; ?>


                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                        </div>

                </div>
            <br/>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



        <br/>

    <div class="form-group col-md-6">
        <input class="btn btn-primary" type="submit" value="<?php echo e(__('site.save-changes')); ?>">
    </div>

    </form>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('header'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('css/admin/candidate-auth.css')); ?>">


    <link rel="stylesheet" href="<?php echo e(asset('vendor/select2/css/select2.min.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>
    <script src="<?php echo e(asset('vendor/select2/js/select2.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/select.js')); ?>"></script>


<?php $__env->stopSection(); ?>

<?php echo $__env->make($userLayout, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/re3aytk/public_html/dev/resources/views/candidate/profile/profile.blade.php ENDPATH**/ ?>