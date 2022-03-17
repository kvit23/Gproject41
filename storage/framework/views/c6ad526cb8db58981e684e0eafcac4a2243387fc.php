<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

    <title>One Page Resume</title>
    <link rel="stylesheet" href="<?php echo e(asset('css/admin/profile.css')); ?>">

</head>

<body >
<?php if(!empty(setting('image_logo'))): ?>
    <div class="int_mt20pl30">
        <img src="<?php echo e(asset(setting('image_logo'))); ?>" class="mxmh" />
    </div>
<?php else: ?>
    <div class="sn"><?php echo e(setting('general_site_name')); ?></div>
<?php endif; ?>

<div class="mpt"><?php echo app('translator')->get('site.candidate-profile'); ?></div>

<div id="page-wrap" >
    <?php if(!empty($user->candidate->picture)): ?>
    <img class="imgsize" src="<?php echo e(asset($user->candidate->picture)); ?>"  id="pic" />
    <?php endif; ?>
    <div id="contact-info" class="vcard pdl"  >

        <!-- Microformats! -->

        <h1 class="fn"><?php echo e($user->candidate->display_name); ?></h1>
        <?php if($full): ?>
        <p>
            <?php echo app('translator')->get('site.telephone'); ?>: <span class="tel"><?=$user->telephone?></span><br />
            <?php echo app('translator')->get('site.email'); ?>: <a class="email" href="mailto:<?php echo e($user->email); ?>"><?php echo e($user->email); ?></a>
        </p>
        <?php endif; ?>
    </div>

    <div id="objective" class="pdl">
        <p>

        <?php if($full): ?>
            <div><strong><?php echo app('translator')->get('site.name'); ?>:</strong> <?=$user->name?></div>
        <?php endif; ?>
            <div><strong><?php echo app('translator')->get('site.gender'); ?>:</strong> <?php echo e(gender($user->candidate->gender)); ?></div>
        <div><strong><?php echo app('translator')->get('site.age'); ?>:</strong> <?php echo e(getAge(\Illuminate\Support\Carbon::parse($user->candidate->date_of_birth)->timestamp)); ?></div>
        </p>
    </div>

    <div class="clear"></div>

    <dl  class="pdl10">
        <dd class="clear"></dd>
        <?php $__currentLoopData = $groups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <dt><?php echo e($group->name); ?></dt>
        <dd>
            <?php $__currentLoopData = $group->candidateFields()->orderBy('sort_order')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $field): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                $value = ($user->candidateFields()->where('id',$field->id)->first()) ? $user->candidateFields()->where('id',$field->id)->first()->pivot->value:'';
                ?>
                    <?php if($field->type=='checkbox'): ?>
                        <p><strong><?php echo e($field->name); ?>:</strong> <?php echo e(boolToString($value)); ?></p>
                    <?php elseif($field->type=='file'): ?>
                        <?php if(isImage($value)): ?>
                            <h2><?php echo e($field->name); ?></h2>
                            <p>
                                <img src="<?php echo e(asset($value)); ?>" class="imw700"/>
                            </p>
                        <?php endif; ?>

                    <?php else: ?>
                        <p><strong><?php echo e($field->name); ?>:</strong> <?php echo e($value); ?></p>

                    <?php endif; ?>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </dd>

        <dd class="clear"></dd>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


    </dl>

    <div class="clear"></div>

</div>

</body>

</html>
<?php /**PATH /home/re3aytk/public_html/dev/resources/views/admin/pdf/profile.blade.php ENDPATH**/ ?>