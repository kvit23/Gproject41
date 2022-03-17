<?php $__env->startSection('page-title',__('site.employer-registration')); ?>

<?php $__env->startSection('content'); ?>

    <div class="az-signin-wrapper">

        <div class="az-card-signin">

                    <a  href="<?php echo e(route('homepage')); ?>">
                        <?php if(!empty(setting('image_logo'))): ?>
                            <img  class="logo"      src="<?php echo e(asset(setting('image_logo'))); ?>"   >
                        <?php else: ?>
                            <h1 class="az-logo"><?php echo e(setting('general_site_name')); ?></h1>
                        <?php endif; ?>
                    </a>


                    <div class="az-signin-header">
                        <h2><?php echo app('translator')->get('site.employer-registration'); ?></h2>
                        <h4><?php echo app('translator')->get('site.create-employer-account'); ?></h4>

                        <?php echo $__env->make('partials.flash_message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                        <form  id="register-form"  method="post" action="<?php echo e(route('register.save-employer')); ?>"  enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>

                            <div class="form-group">
                                <label><?php echo app('translator')->get('site.name'); ?></label>
                                <input type="text" class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"  name="name"  required autocomplete="name" autofocus placeholder="<?php echo app('translator')->get('site.enter-name'); ?>" value="<?php echo e(old('name')); ?>">
                                <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div><!-- form-group -->


                            <div class="form-group">
                                <label><?php echo app('translator')->get('site.email'); ?></label>
                                <input type="text" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"  name="email"  required autocomplete="email" autofocus placeholder="<?php echo app('translator')->get('site.enter-email'); ?>" value="<?php echo e(old('email')); ?>">
                                <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div><!-- form-group -->

                            <div class="form-group">
                                <label><?php echo app('translator')->get('site.telephone'); ?></label>
                                <input type="text" class="form-control <?php $__errorArgs = ['telephone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"  name="telephone"  required autocomplete="telephone" autofocus placeholder="<?php echo app('translator')->get('site.enter-telephone'); ?>" value="<?php echo e(old('telephone')); ?>">
                                <?php $__errorArgs = ['telephone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div><!-- form-group -->

                            <div class="form-group">
                                <label><?php echo app('translator')->get('site.password'); ?></label>
                                <input id="password" type="password" class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="password" required autocomplete="current-password" placeholder="<?php echo app('translator')->get('site.enter-password'); ?>">
                                <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                            </div><!-- form-group -->

                            <div class="form-group">
                                <label><?php echo app('translator')->get('site.confirm-password'); ?></label>
                                <input placeholder="<?php echo app('translator')->get('site.confirm-your-password'); ?>" type="password" class="form-control <?php $__errorArgs = ['password_confirmation'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"  name="password_confirmation"  required  value="<?php echo e(old('password_confirmation')); ?>">
                                <?php $__errorArgs = ['password_confirmation'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div><!-- form-group -->


                            <?php $__currentLoopData = $groups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <h5><?php echo e($group->name); ?></h5>

                                <?php $__currentLoopData = $group->employerFields()->where('enabled',1)->orderBy('sort_order')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $field): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php

                                        $value= old('field_'.$field->id);
                                    ?>
                                    <?php if($field->type=='text'): ?>
                                        <div class="form-group<?php echo e($errors->has('field_'.$field->id) ? ' has-error' : ''); ?>">
                                            <label for="<?php echo e('field_'.$field->id); ?>"><?php echo e($field->name); ?> <?php if(empty($field->required)): ?>(<?php echo app('translator')->get('site.optional'); ?>)<?php endif; ?></label>
                                            <input placeholder="<?php echo e($field->placeholder); ?>" <?php if(!empty($field->required)): ?>required <?php endif; ?>  type="text" class="form-control" id="<?php echo e('field_'.$field->id); ?>" name="<?php echo e('field_'.$field->id); ?>" value="<?php echo e($value); ?>">
                                            <?php if($errors->has('field_'.$field->id)): ?>
                                                <span class="help-block">
                                            <strong><?php echo e($errors->first('field_'.$field->id)); ?></strong>
                                        </span>
                                            <?php endif; ?>
                                        </div>
                                    <?php elseif($field->type=='select'): ?>
                                        <div class="form-group<?php echo e($errors->has('field_'.$field->id) ? ' has-error' : ''); ?>">
                                            <label for="<?php echo e('field_'.$field->id); ?>"><?php echo e($field->name); ?> <?php if(empty($field->required)): ?>(<?php echo app('translator')->get('site.optional'); ?>)<?php endif; ?></label>
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
                                        <div class="form-group<?php echo e($errors->has('field_'.$field->id) ? ' has-error' : ''); ?>">
                                            <label for="<?php echo e('field_'.$field->id); ?>"><?php echo e($field->name); ?> <?php if(empty($field->required)): ?>(<?php echo app('translator')->get('site.optional'); ?>)<?php endif; ?></label>
                                            <textarea placeholder="<?php echo e($field->placeholder); ?>" class="form-control" name="<?php echo e('field_'.$field->id); ?>" id="<?php echo e('field_'.$field->id); ?>" <?php if(!empty($field->required)): ?>required <?php endif; ?>  ><?php echo e($value); ?></textarea>
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
                                    <?php elseif($field->type=='file'): ?>
                                        <?php

                                            $value='';
                                        ?>


                                            <div class="form-group<?php echo e($errors->has('field_'.$field->id) ? ' has-error' : ''); ?>">
                                                <label for="<?php echo e('field_'.$field->id); ?>"><?php echo e($field->name); ?> <?php if(empty($field->required)): ?>(<?php echo app('translator')->get('site.optional'); ?>)<?php endif; ?></label>
                                                <input placeholder="<?php echo e($field->placeholder); ?>" <?php if(!empty($field->required)): ?>required <?php endif; ?>  type="file" class="form-control" id="<?php echo e('field_'.$field->id); ?>" name="<?php echo e('field_'.$field->id); ?>" >
                                                <?php if($errors->has('field_'.$field->id)): ?>
                                                    <span class="help-block">
                                            <strong><?php echo e($errors->first('field_'.$field->id)); ?></strong>
                                        </span>
                                                <?php endif; ?>
                                            </div>







                                    <?php endif; ?>


                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            <?php if(setting('captcha_employer_captcha')==1 && setting('captcha_type')=='image'): ?>
                            <div class="form-group">
                                <label><?php echo app('translator')->get('site.verification'); ?></label><br/>
                                <label for=""><?php echo clean( captcha_img() ); ?></label>
                                <input class="form-control" type="text" name="captcha" placeholder="<?php echo app('translator')->get('site.verification-hint'); ?>"/>
                            </div>
                            <?php endif; ?>
                            <?php if(setting('captcha_employer_captcha')==1 && setting('captcha_type')=='google'): ?>
                                <input  id="captcha_token" name="captcha_token" type="hidden" class="captcha_token">
                                <?php $__env->startSection('footer'); ?>
                                    ##parent-placeholder-d7eb6b340a11a367a1bec55e4a421d949214759f##
                                    <?php echo $__env->make('partials.recaptcha', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                <?php $__env->stopSection(); ?>
                            <?php endif; ?>



                            <button  id="submit-button"  type="submit" class="btn btn-az-primary btn-block"><?php echo app('translator')->get('site.sign-up'); ?></button>
                        </form>
                    </div><!-- az-signin-header -->

                        <div class="az-signin-footer"><br/>
                            <p><a href="<?php echo e(route('login')); ?>"><?php echo app('translator')->get('site.already-account'); ?></a></p>
                        </div><!-- az-signin-footer -->





        </div><!-- az-card-signin -->

    </div><!-- az-signin-wrapper -->

<?php $__env->stopSection(); ?>

<?php $__env->startSection('header'); ?>

    <link rel="stylesheet" href="<?php echo e(asset('css/admin/confirm.css')); ?>">
    <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/re3aytk/public_html/dev/resources/views/auth/employer.blade.php ENDPATH**/ ?>