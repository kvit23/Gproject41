<div class="accordion" id="accordionExample">
    <div class="card">
        <div class="card-header" id="headingOne">
            <h2 class="mb-0">
                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    <?php echo app('translator')->get('site.general-details'); ?>
                </button>
            </h2>
        </div>

        <div id="collapseOne"   aria-labelledby="headingOne" >
            <div class="card-body">
                <div class="row">
                    <div class="form-group col-md-6 <?php echo e($errors->has('name') ? 'has-error' : ''); ?>">
                        <label for="name" class="control-label"><span class="req">*</span><?php echo app('translator')->get('site.name'); ?></label>
                        <input required class="form-control" name="name" type="text" id="name" value="<?php echo e(old('name',isset($employer->name) ? $employer->name : '')); ?>" >
                        <?php echo clean( $errors->first('name', '<p class="help-block">:message</p>') ); ?>

                    </div>
                    <div class="form-group col-md-6 <?php echo e($errors->has('email') ? 'has-error' : ''); ?>">
                        <label for="email" class="control-label"><span class="req">*</span><?php echo app('translator')->get('site.email'); ?></label>
                        <input required class="form-control" name="email" type="text" id="email" value="<?php echo e(old('email',isset($employer->email) ? $employer->email : '')); ?>" >
                        <?php echo clean( $errors->first('email', '<p class="help-block">:message</p>') ); ?>

                    </div>
                </div>
                <div class="row">

                    <div class="form-group col-md-6 <?php echo e($errors->has('telephone') ? 'has-error' : ''); ?>">
                        <label for="telephone" class="control-label"><?php echo app('translator')->get('site.telephone'); ?></label>
                        <input class="form-control" name="telephone" type="text" id="telephone" value="<?php echo e(old('telephone',isset($employer->telephone) ? $employer->telephone : '')); ?>" >
                        <?php echo clean( $errors->first('telephone', '<p class="help-block">:message</p>') ); ?>

                    </div>

                    <div class="form-group col-md-6 <?php echo e($errors->has('gender') ? 'has-error' : ''); ?>">
                        <label for="gender" class="control-label"><span class="req">*</span><?php echo app('translator')->get('site.gender'); ?></label>
                        <select required name="gender" class="form-control" id="gender" >
                            <?php $__currentLoopData = json_decode('{"f":"'.__('site.female').'","m":"'.__('site.male').'"}', true); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $optionKey => $optionValue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($optionKey); ?>" <?php echo e(((null !== old('gender',@$employer->employer->gender)) && old('gender',@$employer->employer->gender) == $optionKey) ? 'selected' : ''); ?>><?php echo e($optionValue); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <?php echo clean( $errors->first('gender', '<p class="help-block">:message</p>') ); ?>

                    </div>


                </div>



                <div class="row">

                    <div class="form-group col-md-6 <?php echo e($errors->has('active') ? 'has-error' : ''); ?>">
                        <label for="active" class="control-label"><span class="req">*</span><?php echo app('translator')->get('site.active'); ?></label>
                        <select required name="active" class="form-control" id="active" >
                            <?php $__currentLoopData = json_decode('{"0":"'.__('site.no').'","1":"'.__('site.yes').'"}', true); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $optionKey => $optionValue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($optionKey); ?>" <?php echo e(((null !== old('active',@$employer->employer->active)) && old('active',@$employer->employer->active) == $optionKey) ? 'selected' : ''); ?>><?php echo e($optionValue); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <?php echo clean( $errors->first('active', '<p class="help-block">:message</p>') ); ?>

                    </div>

                    <div class="form-group col-md-6 <?php echo e($errors->has('status') ? 'has-error' : ''); ?>">
                        <label for="status" class="control-label"><span class="req">*</span><?php echo app('translator')->get('site.enabled'); ?></label>
                        <select required name="status" class="form-control" id="status" >
                            <?php $__currentLoopData = json_decode('{"1":"'.__('site.yes').'","0":"'.__('site.no').'"}', true); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $optionKey => $optionValue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($optionKey); ?>" <?php echo e(((null !== old('status',@$employer->employer->status)) && old('status',@$employer->employer->status) == $optionKey) ? 'selected' : ''); ?>><?php echo e($optionValue); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <?php echo clean( $errors->first('status', '<p class="help-block">:message</p>') ); ?>

                    </div>

                </div>

                <div class="row">

                        <div class="form-group col-md-6 <?php echo e($errors->has('password') ? 'has-error' : ''); ?>">
                            <label for="password" class="control-label"><?php echo app('translator')->get('site.password'); ?></label>
                            <input class="form-control" name="password" type="password" id="password" value="<?php echo e(old('password',isset($employer->employer->password) ? $employer->employer->password : '')); ?>" >
                            <?php echo clean( $errors->first('password', '<p class="help-block">:message</p>') ); ?>

                        </div>
                </div>
                <?php if($formMode=='create'): ?>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-check">
                                <input class="form-check-input" checked type="checkbox" value="1" id="notify" name="notify">
                                <label class="form-check-label" for="notify">
                                    <?php echo app('translator')->get('site.notify-user'); ?>
                                </label>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>

            </div>
        </div>
    </div>
    <?php $__currentLoopData = \App\EmployerFieldGroup::get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="card">
        <div class="card-header" id="heading<?php echo e($group->id); ?>">
            <h2 class="mb-0">
                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapse<?php echo e($group->id); ?>" aria-expanded="false" aria-controls="collapse<?php echo e($group->id); ?>">
                    <?php echo e($group->name); ?>

                </button>
            </h2>
        </div>
        <div id="collapse<?php echo e($group->id); ?>"   aria-labelledby="heading<?php echo e($group->id); ?>" data-parent="#accordionExample">
            <div class="card-body row">
                <?php $__currentLoopData = $group->employerFields()->orderBy('sort_order')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $field): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                    if($formMode=='edit' && isset($employer)){
                     $value = old('field_'.$field->id,($employer->employerFields()->where('id',$field->id)->first()) ? $employer->employerFields()->where('id',$field->id)->first()->pivot->value:'');

                    }
                    else{
                    $value='';
                    }
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
                            if($formMode=='edit' && isset($employer)){
                                $value = old('field_'.$field->id,($employer->employerFields()->where('id',$field->id)->first()) ? $employer->employerFields()->where('id',$field->id)->first()->pivot->value:'');

                            }
                            else{
                                $value='';
                            }
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
                                            <div><img  data-toggle="modal" data-target="#pictureModal<?php echo e($field->id); ?>" src="<?php echo e(route('admin.image')); ?>?file=<?php echo e($value); ?>"  class="int_w330cur" /></div> <br/>


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
                                                            <img src="<?php echo e(route('admin.image')); ?>?file=<?php echo e($value); ?>" class="int_txcen" />
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-primary" data-dismiss="modal"><?php echo app('translator')->get('site.close'); ?></button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>



                                        <?php endif; ?>
                                        <a onclick="return confirm('<?php echo app('translator')->get('site.delete-prompt'); ?>')" class="btn btn-danger" href="<?php echo e(route('admin.employer.remove-file',['fieldId'=>$field->id,'userId'=>$employer->id])); ?>"><i class="fa fa-trash"></i> <?php echo app('translator')->get('site.delete-file'); ?></a>
                                        <a class="btn btn-success" href="<?php echo e(route('admin.download')); ?>?file=<?php echo e($value); ?>"><i class="fa fa-download"></i> <?php echo app('translator')->get('site.download'); ?></a>
                                    <?php endif; ?>
                                </div>


                            </div>



                    <?php endif; ?>


                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


            </div>
        </div>
    </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

</div>

<br/>

<div class="form-group col-md-6">
    <input class="btn btn-primary" type="submit" value="<?php echo e($formMode === 'edit' ? __('site.update') : __('site.create')); ?>">
</div>
<?php /**PATH /home/re3aytk/public_html/dev/resources/views/admin/employers/form.blade.php ENDPATH**/ ?>