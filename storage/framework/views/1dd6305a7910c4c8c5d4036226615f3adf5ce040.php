<?php $__env->startSection('page-title',__('site.candidate-registration')); ?>

<?php $__env->startSection('content'); ?>

    <div class="az-signin-wrapper">

        <div class="az-card-signin">

            <a  href="<?php echo e(route('homepage')); ?>">
                <?php if(!empty(setting('image_logo'))): ?>
                    <img   class="logo"     src="<?php echo e(asset(setting('image_logo'))); ?>"   >
                <?php else: ?>
                    <h1 class="az-logo"><?php echo e(setting('general_site_name')); ?></h1>
                <?php endif; ?>
            </a>


            <div class="az-signin-header">
                <h2><?php echo app('translator')->get('site.candidate-registration'); ?></h2>
                <h4><?php echo app('translator')->get('site.create-candidate-account'); ?></h4>

                <?php echo $__env->make('partials.flash_message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                <form id="register-form" method="post" action="<?php echo e(route('register.save-candidate')); ?>" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>

                    <div class="form-group">
                        <label><?php echo app('translator')->get('site.first-name'); ?></label>
                        <input type="text" class="form-control <?php $__errorArgs = ['first_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"  name="first_name"  required autocomplete="first_name" autofocus placeholder="<?php echo app('translator')->get('site.enter-first-name'); ?>" value="<?php echo e(old('first_name')); ?>">
                        <?php $__errorArgs = ['first_name'];
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
                        <label><?php echo app('translator')->get('site.last-name'); ?></label>
                        <input type="text" class="form-control <?php $__errorArgs = ['last_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"  name="last_name"  required autocomplete="last_name"   placeholder="<?php echo app('translator')->get('site.enter-last-name'); ?>" value="<?php echo e(old('last_name')); ?>">
                        <?php $__errorArgs = ['last_name'];
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

                    <div class="form-group  <?php echo e($errors->has('gender') ? 'has-error' : ''); ?>">
                        <label for="gender" class="control-label"><?php echo app('translator')->get('site.gender'); ?></label>
                        <select  required name="gender" class="form-control" id="gender" >
                            <option></option>
                            <?php $__currentLoopData = json_decode('{"f":"'.__('site.female').'","m":"'.__('site.male').'"}', true); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $optionKey => $optionValue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($optionKey); ?>" <?php echo e((null !== old('gender') && old('gender') == $optionKey) ? 'selected' : ''); ?>><?php echo e($optionValue); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <?php echo clean( $errors->first('gender', '<p class="help-block">:message</p>') ); ?>

                    </div>
                    <div class="form-group  <?php echo e($errors->has('date_of_birth') ? 'has-error' : ''); ?>">
                        <label for="date_of_birth" class="control-label"><?php echo app('translator')->get('site.date-of-birth'); ?></label>

                        <div class="row">
                            <div class="col-md-4">
                                <?php

                                    $byear = null;

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
                                        $bmonth = null;
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
                                        $bday = null;
                                    ?>
                                    <?php $__currentLoopData = range(1,31); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $day): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option <?php echo e(((null !== old('date_of_birth_day',$bday)) && old('date_of_birth_day',$bday) == $day) ? 'selected' : ''); ?>  value="<?php echo e($day); ?>"><?php echo e($day); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>

                        <?php echo clean( $errors->first('date_of_birth', '<p class="help-block">:message</p>') ); ?>

                    </div>


                    <div class="form-group  <?php echo e($errors->has('picture') ? 'has-error' : ''); ?>">
                        <label for="picture" class="control-label"><?php echo app('translator')->get('site.your-profile-picture'); ?> (<?php echo app('translator')->get('site.optional'); ?>)</label>


                        <input class="form-control" name="picture" type="file" id="picture"   >
                        <?php echo clean( $errors->first('picture', '<p class="help-block">:message</p>') ); ?>

                    </div>

                    <div class="form-group<?php echo e($errors->has('cv_path') ? ' has-error' : ''); ?>">
                        <label for="<?php echo e('cv_path'); ?>"><?php echo app('translator')->get('site.cv-resume'); ?> (<?php echo app('translator')->get('site.optional'); ?>)</label>
                        <input type="file" class="form-control" id="<?php echo e('cv_path'); ?>" name="<?php echo e('cv_path'); ?>" >
                        <?php echo clean( $errors->first('cv_path', '<p class="help-block">:message</p>') ); ?>

                    </div>

                    <?php if(\App\Category::count()>0): ?>
                    <div class="form-group ">
                        <label for="categories"><?php echo app('translator')->get('site.categories'); ?></label>

                            <select  multiple name="categories[]" id="categories" class="form-control select2">

                                <?php $__currentLoopData = \App\Category::orderBy('name')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option <?php if(is_array(old('categories')) && in_array(@$category->id,old('categories'))): ?> selected <?php endif; ?> value="<?php echo e($category->id); ?>"><?php echo e($category->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        <p class="help-block"><?php echo app('translator')->get('site.categories-hint'); ?></p>

                    </div>
                    <?php endif; ?>

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

                        <?php $__currentLoopData = $group->candidateFields()->where('enabled',1)->orderBy('sort_order')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $field): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
                                    $selectOptions = [''=>''];
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

                    <?php if(setting('captcha_candidate_captcha')==1 && setting('captcha_type')=='image'): ?>
                        <div class="form-group">
                            <label><?php echo app('translator')->get('site.verification'); ?></label><br/>
                            <label for=""><?php echo clean( captcha_img() ); ?></label>
                            <input class="form-control" type="text" name="captcha" placeholder="<?php echo app('translator')->get('site.verification-hint'); ?>"/>
                        </div>
                    <?php endif; ?>

                    <?php if(setting('captcha_candidate_captcha')==1 && setting('captcha_type')=='google'): ?>
                                <input id="captcha_token" name="captcha_token" type="hidden" class="captcha_token">
                                <?php $__env->startSection('footer'); ?>
                                    ##parent-placeholder-d7eb6b340a11a367a1bec55e4a421d949214759f##
                                    <?php echo $__env->make('partials.recaptcha', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                <?php $__env->stopSection(); ?>
                    <?php endif; ?>




                    <button id="submit-button" type="submit" class="btn btn-az-primary btn-block"><?php echo app('translator')->get('site.sign-up'); ?></button>
                </form>
            </div><!-- az-signin-header -->

            <div class="az-signin-footer"><br/>
                <p><a href="<?php echo e(route('login')); ?>"><?php echo app('translator')->get('site.already-account'); ?></a></p>
            </div><!-- az-signin-footer -->





        </div><!-- az-card-signin -->

    </div><!-- az-signin-wrapper -->

<?php $__env->stopSection(); ?>

<?php $__env->startSection('header'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('css/admin/candidate-auth.css')); ?>">

    <link rel="stylesheet" href="<?php echo e(asset('vendor/select2/css/select2.min.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>
    <script src="<?php echo e(asset('vendor/select2/js/select2.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/select.js')); ?>" type="text/javascript"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/re3aytk/public_html/dev/resources/views/auth/candidate.blade.php ENDPATH**/ ?>