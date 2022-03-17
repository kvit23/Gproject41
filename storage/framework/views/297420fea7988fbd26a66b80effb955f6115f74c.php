<div class="accordion" id="accordionExample">
    <div class="card">
        <div class="card-header" id="headingOne">
            <h2 class="mb-0">
                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    <?php echo app('translator')->get('site.general-details'); ?>
                </button>
            </h2>
        </div>

        <div id="collapseOne" aria-labelledby="headingOne" >
            <div class="card-body">
                <div class="row">
                    <div class="form-group col-md-6 <?php echo e($errors->has('user_id') ? 'has-error' : ''); ?>">
                        <label for="user_id" class="control-label"><span class="req">*</span><?php echo app('translator')->get('site.employer'); ?></label>

                        <select required  name="user_id" id="user_id" class="form-control">
                            <?php
                            $userId = old('user_id',@$order->user_id);
                            ?>
                            <?php if($userId): ?>
                                <option selected value="<?php echo e($userId); ?>"><?php echo e(\App\User::find($userId)->name); ?> &lt;<?php echo e(\App\User::find($userId)->email); ?>&gt; </option>
                            <?php endif; ?>
                        </select>

                        <?php echo clean( $errors->first('user_id', '<p class="help-block">:message</p>') ); ?>


                    </div>
                    <div class="form-group col-md-6 <?php echo e($errors->has('interview_date') ? 'has-error' : ''); ?>">
                        <label for="interview_date" class="control-label"><?php echo app('translator')->get('site.interview-date'); ?></label>
                        <input class="form-control date" name="interview_date" type="text" id="interview_date" value="<?php echo e(old('interview_date',isset($order->interview_date) ? $order->interview_date : '')); ?>" >
                        <?php echo clean( $errors->first('interview_date', '<p class="help-block">:message</p>') ); ?>

                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-6 <?php echo e($errors->has('interview_location') ? 'has-error' : ''); ?>">
                        <label for="interview_location" class="control-label"><?php echo app('translator')->get('site.interview-location'); ?></label>

                        <textarea class="form-control" name="interview_location" id="interview_location" ><?php echo e(old('interview_location',isset($order->interview_location) ? $order->interview_location : '')); ?></textarea>
                        <?php echo clean( $errors->first('interview_location', '<p class="help-block">:message</p>') ); ?>

                    </div>

                    <div class="form-group col-md-6 <?php echo e($errors->has('interview_time') ? 'has-error' : ''); ?>">
                        <label for="interview_time" class="control-label"><?php echo app('translator')->get('site.interview-time'); ?></label>
                        <input class="form-control" name="interview_time" type="text" id="interview_time" value="<?php echo e(old('interview_time',isset($order->interview_time) ? $order->interview_time : '')); ?>" >
                        <?php echo clean( $errors->first('interview_time', '<p class="help-block">:message</p>') ); ?>

                    </div>
                </div>

                <div class="row">

                    <div class="form-group col-md-12 <?php echo e($errors->has('candidates') ? 'has-error' : ''); ?>">

                            <label for="candidates"><?php echo app('translator')->get('site.candidates'); ?></label>
                            <?php if($formMode === 'edit'): ?>
                                <select multiple name="candidates[]" id="candidates" class="form-control select2">
                                    <?php $__currentLoopData = $order->candidates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $candidate): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option  <?php if( (is_array(old('candidates')) && in_array(@$candidate->id,old('candidates')))  || (null === old('candidates'))): ?>
                                            selected
                                            <?php endif; ?>
                                            value="<?php echo e($candidate->id); ?>"><?php echo e($candidate->user->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            <?php else: ?>
                                <select  multiple name="candidates[]" id="candidates" class="form-control select2">
                                    <option></option>
                                </select>
                            <?php endif; ?>

                        <?php echo clean( $errors->first('candidates', '<p class="help-block">:message</p>') ); ?>

                    </div>


                </div>



                <div class="row">


                    <div class="form-group col-md-6 <?php echo e($errors->has('status') ? 'has-error' : ''); ?>">
                        <label for="status" class="control-label"><span class="req">*</span><?php echo app('translator')->get('site.status'); ?></label>
                        <select required name="status" class="form-control" id="status" >
                            <option value=""></option>
                            <?php $__currentLoopData = json_decode('{"p":"'.__('site.pending').'","i":"'.__('site.in-progress').'","c":"'.__('site.completed').'","x":"'.__('site.cancelled').'"}', true); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $optionKey => $optionValue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($optionKey); ?>" <?php echo e(((null !== old('status',@$order->status)) && old('status',@$order->status) == $optionKey) ? 'selected' : ''); ?>><?php echo e($optionValue); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <?php echo clean( $errors->first('status', '<p class="help-block">:message</p>') ); ?>

                    </div>

                    <div class="form-group col-md-6 <?php echo e($errors->has('comments') ? 'has-error' : ''); ?>">
                        <label for="comments" class="control-label"><?php echo app('translator')->get('site.comments'); ?></label>
                       <textarea class="form-control" id="comments"  name="comments"><?php echo e(old('comments',isset($order->comments) ? $order->comments : '')); ?></textarea>
                         <?php echo clean( $errors->first('comments', '<p class="help-block">:message</p>') ); ?>

                    </div>

                </div>


                <?php if($formMode=='create'): ?>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-check">
                                <input class="form-check-input" checked type="checkbox" value="1" id="invoice" name="invoice">
                                <label class="form-check-label" for="invoice">
                                    <?php echo app('translator')->get('site.create-invoice'); ?>
                                </label>
                            </div>
                        </div>
                    </div>
                <?php elseif($formMode=='edit'): ?>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-check">
                                <input class="form-check-input" checked  type="checkbox" value="1" id="notify" name="notify">
                                <label class="form-check-label" for="notify">
                                    <?php echo app('translator')->get('site.notify-employer'); ?>
                                </label>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>

            </div>
        </div>
    </div>
    <?php $__currentLoopData = $orderForm->orderFieldGroups()->orderBy('sort_order')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="card">
            <div class="card-header" id="heading<?php echo e($group->id); ?>">
                <h2 class="mb-0">
                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapse<?php echo e($group->id); ?>" aria-expanded="false" aria-controls="collapse<?php echo e($group->id); ?>">
                        <?php echo e($group->name); ?>

                    </button>
                </h2>
            </div>
            <div id="collapse<?php echo e($group->id); ?>"  aria-labelledby="heading<?php echo e($group->id); ?>"  >
                <div class="card-body row">
                    <?php $__currentLoopData = $group->orderFields()->orderBy('sort_order')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $field): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                        if($formMode=='edit' && isset($order)){
                            $value = old('field_'.$field->id,($order->orderFields()->where('id',$field->id)->first()) ? $order->orderFields()->where('id',$field->id)->first()->pivot->value:'');

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
                            <?php elseif($field->type=='label'): ?>
                                <div class="col-md-12">
                                    <h4><?php echo e($field->name); ?></h4>
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
                            if($formMode=='edit' && isset($order)){
                                $value = old('field_'.$field->id,($order->orderFields()->where('id',$field->id)->first()) ? $order->orderFields()->where('id',$field->id)->first()->pivot->value:'');

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
                                        <a onclick="return confirm('<?php echo app('translator')->get('site.delete-prompt'); ?>')" class="btn btn-danger" href="<?php echo e(route('admin.order.remove-file',['fieldId'=>$field->id,'userId'=>$order->id])); ?>"><i class="fa fa-trash"></i> <?php echo app('translator')->get('site.delete-file'); ?></a>
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





<?php /**PATH /home/re3aytk/public_html/dev/resources/views/admin/orders/form.blade.php ENDPATH**/ ?>