<?php $__env->startSection('content'); ?>

    <div class="az-signin-wrapper">

        <div class="az-card-signin">

            <div class="row">
                <div    <?php if($enableRegistration): ?> class="col-md-6" <?php else: ?> class="col-md-12"  <?php endif; ?>>
                    <a  href="<?php echo e(route('homepage')); ?>">
                        <?php if(!empty(setting('image_logo'))): ?>
                            <img  class="logo"   src="<?php echo e(asset(setting('image_logo'))); ?>"   >
                        <?php else: ?>
                            <h1 class="az-logo"><?php echo e(setting('general_site_name')); ?></h1>
                        <?php endif; ?>
                    </a>

                    <div class="az-signin-header">
                        <h2><?php echo app('translator')->get('site.login'); ?></h2>
                        <h4><?php echo app('translator')->get('site.please-login'); ?></h4>
                        <?php echo $__env->make('partials.flash_message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                        <div class="row"  >
                            <?php if(setting('social_enable_facebook')==1): ?>
                            <div class="col-md-6 int_tpmb" >
                                <a  class="int_mt0p btn btn-az-primary btn-sm btn-block  rounded" href="<?php echo e(route('social.login',['network'=>'facebook'])); ?>"><i class="fab fa-facebook-square"></i> <?php echo app('translator')->get('site.login-facebook'); ?></a>
                            </div>
                            <?php endif; ?>

                            <?php if(setting('social_enable_google')==1): ?>
                            <div class="col-md-6">
                                <a  class="int_mt0p btn btn-danger  btn-sm  btn-block rounded" href="<?php echo e(route('social.login',['network'=>'google'])); ?>"><i class="fab fa-google"></i> <?php echo app('translator')->get('site.login-google'); ?></a>

                            </div>
                            <?php endif; ?>

                        </div>

                        <form method="post" action="<?php echo e(route('login')); ?>">
                            <?php echo csrf_field(); ?>
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
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" <?php echo e(old('remember') ? 'checked' : ''); ?>>

                                <label class="form-check-label" for="remember" >
                                    <?php echo app('translator')->get('site.remember-me'); ?>
                                </label>
                            </div>

                            <button class="btn btn-az-primary btn-block"><?php echo app('translator')->get('site.sign-in'); ?></button>
                        </form>
                    </div><!-- az-signin-header -->
                    <?php if(Route::has('password.request')): ?>
                    <div class="az-signin-footer"><br/>
                        <p><a href="<?php echo e(route('password.request')); ?>"><?php echo app('translator')->get('site.forgot-password'); ?></a></p>
                    </div><!-- az-signin-footer -->
                    <?php endif; ?>



                </div>
                <?php if($enableRegistration): ?>
                <div class="col-md-6">




                    <div class="az-signin-header">
                        <h2 class="int_mt60"><?php echo app('translator')->get('site.register'); ?></h2>
                        <h4><?php echo app('translator')->get('site.register-help-text'); ?></h4>

                        <div class="row">
                            <?php if(setting('general_enable_employer_registration')==1): ?>
                            <div class="col-md-6 int_tcmb" >
                                 <i   class="int_fs80 fa fa-user"></i> <br/>
                                <a class="btn btn-primary rounded" href="<?php echo e(route('register.employer')); ?>"><?php echo app('translator')->get('site.i-employer'); ?></a>

                            </div>
                            <?php endif; ?>
                            <?php if(setting('general_enable_candidate_registration')==1): ?>
                            <div class="col-md-6 int_tcmb" >
                                 <i  class="int_fs80 fa fa-user-tie"></i> <br/>
                                <a class="btn btn-success rounded" href="<?php echo e(route('register.candidate')); ?>"><?php echo app('translator')->get('site.i-candidate'); ?></a>



                            </div>
                                <?php endif; ?>

                        </div>
                    </div><!-- az-signin-header -->



                </div>
                    <?php endif; ?>
            </div>



        </div><!-- az-card-signin -->

    </div><!-- az-signin-wrapper -->

<?php $__env->stopSection(); ?>

<?php $__env->startSection('header'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('css/admin/confirm.css')); ?>">
    <?php if($enableRegistration): ?>
        <link rel="stylesheet" href="<?php echo e(asset('css/admin/registration.css')); ?>">

    <?php endif; ?>

    <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/re3aytk/public_html/resources/views/auth/login.blade.php ENDPATH**/ ?>