<?php $__env->startSection('page-title',__('site.your-shortlist')); ?>
<?php $__env->startSection('inline-title',__('site.your-shortlist')); ?>

<?php $__env->startSection('crumb'); ?>
    <li><?php echo e(__('site.your-shortlist')); ?></li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <section class="about-area them-2 pb-130 pt-50">
        <div class="container">

            <div class="row">

                <div class="col-md-12">
                    <div class="about-content them-2 int_pt10"  >
                        <?php echo $__env->make('partials.flash_message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <!-- az-dashboard-one-title -->
                        <?php if(Session::has('candidate') && \App\Candidate::find(session()->get('candidate'))): ?>
                            <br/>
                            <p class="alert alert-success">
                                <?php echo app('translator')->get('site.shortlist-add-msg',['name'=>\App\Candidate::find(session()->get('candidate'))->display_name]); ?>

                                <a class="btn btn-primary rounded" href="<?php echo e(route('profiles')); ?>"><?php echo app('translator')->get('site.browse-more-profiles'); ?></a>
                                <a class="btn btn-success rounded" href="<?php echo e(route('order-forms')); ?>?shortlist"><?php echo app('translator')->get('site.complete-order-form'); ?></a>
                            </p>

                        <?php endif; ?>

                        <?php if(!is_array($cart) || count($cart)==0): ?>
                            <?php echo app('translator')->get('site.empty-shortlist'); ?> <br/>
                            <a class="btn btn-primary rounded" href="<?php echo e(route('profiles')); ?>"><?php echo app('translator')->get('site.browse-profiles'); ?></a>
                        <?php else: ?>

                            <div class="row int_mt30px"  >

                                <?php $__currentLoopData = $cart; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                    <?php
                                    $candidate = \App\Candidate::find($item);
                                    ?>

                                    <div class="col-md-4 int_mb50"  >

                                        <div class="card int_wi18re"  >
                                            <a href="<?php echo e(route('profile',['candidate'=>$candidate->id])); ?>">

                                                <?php if(!empty($candidate->picture) && file_exists($candidate->picture)): ?>
                                                    <img class="card-img-top"  src="<?php echo e(asset($candidate->picture)); ?>" >
                                                <?php elseif($candidate->gender=='m'): ?>
                                                    <img  class="card-img-top"    src="<?php echo e(asset('img/man.jpg')); ?>">
                                                <?php else: ?>
                                                    <img  class="card-img-top"   src="<?php echo e(asset('img/woman.jpg')); ?>">
                                                <?php endif; ?>
                                            </a>
                                            <div class="card-body">
                                                <h5 class="card-title"><?php echo e($candidate->display_name); ?></h5>
                                                <p class="card-text"><?php echo e(getAge(\Illuminate\Support\Carbon::parse($candidate->date_of_birth)->timestamp)); ?>/<?php echo e(gender($candidate->gender)); ?></p>
                                                <a onclick="return confirm('<?php echo app('translator')->get('site.confirm-delete'); ?>')" href="<?php echo e(route('shortlist.remove',['candidate'=>$candidate->id])); ?>" class="btn btn-sm  btn-danger rounded"><i class="fa fa-trash"></i> <?php echo app('translator')->get('site.remove'); ?></a>

                                            </div>
                                        </div>


                                        <?php if(false): ?>
                                        <div class="single-team-item-3">
                                            <div class="team-3-bg_ int_txcen"  >
                                                <a href="<?php echo e(route('profile',['candidate'=>$candidate->id])); ?>">
                                                    <?php if(!empty($candidate->picture) && file_exists($candidate->picture)): ?>
                                                        <img src="<?php echo e(asset($candidate->picture)); ?>" >
                                                    <?php elseif($candidate->gender=='m'): ?>
                                                        <img    src="<?php echo e(asset('img/man.jpg')); ?>">
                                                    <?php else: ?>
                                                        <img   src="<?php echo e(asset('img/woman.jpg')); ?>">
                                                    <?php endif; ?>
                                                </a>

                                            </div>
                                            <div class="team-3-content">
                                                <a href="#"><h4><?php echo e($candidate->display_name); ?></h4></a>
                                                <p><?php echo e(getAge(\Illuminate\Support\Carbon::parse($candidate->date_of_birth)->timestamp)); ?>/<?php echo e(gender($candidate->gender)); ?></p>

                                                <div class="az-profile-bio int_pd10"  >
                                                    <a onclick="return confirm('<?php echo app('translator')->get('site.confirm-delete'); ?>')" href="<?php echo e(route('shortlist.remove',['candidate'=>$candidate->id])); ?>" class="btn btn-sm  btn-danger rounded"><i class="fa fa-trash"></i> <?php echo app('translator')->get('site.remove'); ?></a>


                                                </div><!-- az-profile-bio -->

                                            </div>
                                        </div>
                                        <?php endif; ?>





                                    </div>

                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>

                            <div>
                                <hr/>
                                <a   class="int_mb10 btn btn-primary rounded" href="<?php echo e(route('profiles')); ?>"><?php echo app('translator')->get('site.browse-more-profiles'); ?></a>
                                <a class="btn btn-success rounded float-right" href="<?php echo e(route('order-forms')); ?>?shortlist"><?php echo app('translator')->get('site.complete-order-form'); ?></a>
                            </div>


                        <?php endif; ?>



                    </div> <!-- about content -->
                </div>
            </div> <!-- row -->
        </div>
    </section>





















<?php $__env->stopSection(); ?>

<?php echo $__env->make($templateLayout, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/re3aytk/public_html/dev/public/templates/jobportal/views/site/profiles/shortlist.blade.php ENDPATH**/ ?>