<?php $__env->startSection('pageTitle',__('site.candidates')); ?>
<?php $__env->startSection('page-title',__('site.profile').': '.$candidate->name); ?>

<?php $__env->startSection('page-content'); ?>
    <div class="container-fluid">
        <div class="row">


            <div class="col-md-12">
                <div  >
                    <div  >
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('access','view_candidates')): ?>
                        <a href="<?php echo e(url('/admin/candidates')); ?>" title="<?php echo app('translator')->get('site.back'); ?>"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> <?php echo app('translator')->get('site.back'); ?></button></a>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('access','edit_candidate')): ?>
                        <a href="<?php echo e(url('/admin/candidates/' . $candidate->id . '/edit')); ?>" title="<?php echo app('translator')->get('site.edit'); ?>"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> <?php echo app('translator')->get('site.edit'); ?></button></a>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('access','delete_candidate')): ?>
                        <form method="POST" action="<?php echo e(url('admin/candidates' . '/' . $candidate->id)); ?>" accept-charset="UTF-8" class="int_inlinedisp">
                            <?php echo e(method_field('DELETE')); ?>

                            <?php echo e(csrf_field()); ?>

                            <button type="submit" class="btn btn-danger btn-sm" title="<?php echo app('translator')->get('site.delete'); ?>" onclick="return confirm(&quot;<?php echo app('translator')->get('site.confirm-delete'); ?>?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> <?php echo app('translator')->get('site.delete'); ?></button>
                        </form>
                        <?php endif; ?>

                        <br/>
                        <br/>

                        <div class="accordion" id="accordionExample">
                            <div class="card">
                                <div class="card-header" id="headingOne">
                                    <h2 class="mb-0">
                                        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                            <?php echo app('translator')->get('site.general-details'); ?>
                                        </button>
                                    </h2>
                                </div>

                                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                                    <div class="card-body">

                                        <div class="row">
                                        <div class=" col-md-6 <?php echo e($errors->has('name') ? 'has-error' : ''); ?>">
                                            <label for="name" class="control-label"><?php echo app('translator')->get('site.name'); ?></label>
                                           <div><?php echo e($candidate->name); ?></div>
                                        </div>
                                        <div class="col-md-6 <?php echo e($errors->has('display_name') ? 'has-error' : ''); ?>">
                                            <label for="display_name" class="control-label"><?php echo app('translator')->get('site.display-name'); ?></label>
                                            <div><?php echo e($candidate->candidate->display_name); ?></div>
                                        </div>
                                    </div>

                                        <div class="row">
                                        <div class="col-md-6 <?php echo e($errors->has('email') ? 'has-error' : ''); ?>">
                                            <label for="email" class="control-label"><?php echo app('translator')->get('site.email'); ?></label>
                                            <div><?php echo e($candidate->email); ?></div>
                                        </div>
                                        <div class="col-md-6 <?php echo e($errors->has('telephone') ? 'has-error' : ''); ?>">
                                            <label for="telephone" class="control-label"><?php echo app('translator')->get('site.telephone'); ?></label>
                                            <div><?php echo e($candidate->telephone); ?></div>
                                        </div>
                                        </div>
                                        <div class="row">
                                        <div class="col-md-6 <?php echo e($errors->has('gender') ? 'has-error' : ''); ?>">
                                            <label for="gender" class="control-label"><?php echo app('translator')->get('site.gender'); ?></label>
                                            <div><?php echo e(gender($candidate->candidate->gender)); ?></div>
                                        </div>
                                        <div class="col-md-6 <?php echo e($errors->has('date_of_birth') ? 'has-error' : ''); ?>">
                                            <label for="date_of_birth" class="control-label"><?php echo app('translator')->get('site.date-of-birth'); ?> (DD/MM/YYYY)</label>
                                            <div><?php echo e(\Illuminate\Support\Carbon::parse($candidate->candidate->date_of_birth)->day); ?>/<?php echo e(\Illuminate\Support\Carbon::parse($candidate->candidate->date_of_birth)->month); ?>/<?php echo e(\Illuminate\Support\Carbon::parse($candidate->candidate->date_of_birth)->year); ?> (<?php echo e(getAge(\Illuminate\Support\Carbon::parse($candidate->candidate->date_of_birth)->timestamp)); ?>)</div>

                                        </div>
                                        </div>


                                        <div class="row">

                                            <div class="col-md-6">
                                                <?php if(!empty($candidate->candidate->picture)): ?>
                                                    <label for="date_of_birth" class="control-label"><?php echo app('translator')->get('site.picture'); ?></label>

                                                    <div><img   data-toggle="modal" data-target="#pictureModal" src="<?php echo e(asset($candidate->candidate->picture)); ?>" class="int_thmwpoin" /></div> <br/>



                                                    <div class="modal fade" id="pictureModal" tabindex="-1" role="dialog" aria-labelledby="pictureModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog modal-lg" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="pictureModalLabel"><?php echo app('translator')->get('site.picture'); ?></h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body int_txcen" >
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

                                            <div class="col-md-6">
                                                <label for="video_code"><?php echo app('translator')->get('site.video'); ?></label>
                                                <?php if(!empty($candidate->candidate->video_code)): ?>
                                                    <?php echo clean( $candidate->candidate->video_code ); ?>

                                                <?php endif; ?>
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="<?php echo e('cv_path'); ?>"><?php echo app('translator')->get('site.cv-resume'); ?>:</label>


                                                <?php if(!empty($candidate->candidate->cv_path)): ?>
                                                    <h3><?php echo e(basename($candidate->candidate->cv_path)); ?></h3>
                                                    <?php if(isImage($candidate->candidate->cv_path)): ?>
                                                        <div><img  data-toggle="modal" data-target="#pictureModalcv" src="<?php echo e(route('admin.image')); ?>?file=<?php echo e($candidate->candidate->cv_path); ?>"  class="int_w330cur" /></div> <br/>


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
                                                                        <img src="<?php echo e(route('admin.image')); ?>?file=<?php echo e($candidate->candidate->cv_path); ?>" class="int_txcen" />
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-primary" data-dismiss="modal"><?php echo app('translator')->get('site.close'); ?></button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>



                                                    <?php endif; ?>
                                                    <a class="btn btn-success" href="<?php echo e(route('admin.download')); ?>?file=<?php echo e($candidate->candidate->cv_path); ?>"><i class="fa fa-download"></i> <?php echo app('translator')->get('site.download'); ?></a>
                                                <?php endif; ?>
                                            </div>




                                        </div>

                                                <div class="row">
                                                        <div class="col-md-6 <?php echo e($errors->has('employed') ? 'has-error' : ''); ?>">
                                                            <label for="employed" class="control-label"><?php echo app('translator')->get('site.employed'); ?></label>
                                                            <div><?php echo e(boolToString($candidate->candidate->employed)); ?></div>
                                                        </div>
                                                        <div class="col-md-6 <?php echo e($errors->has('shortlisted') ? 'has-error' : ''); ?>">
                                                            <label for="shortlisted" class="control-label"><?php echo app('translator')->get('site.shortlisted'); ?></label>
                                                            <div><?php echo e(boolToString($candidate->candidate->shortlisted)); ?></div>
                                                        </div>
                                                </div>

                                        <div class="row">
                                                        <div class="col-md-6 <?php echo e($errors->has('locked') ? 'has-error' : ''); ?>">
                                                            <label for="locked" class="control-label"><?php echo app('translator')->get('site.locked'); ?></label>
                                                            <div><?php echo e(boolToString($candidate->candidate->locked)); ?></div>

                                                        </div>
                                                        <div class="col-md-6 <?php echo e($errors->has('status') ? 'has-error' : ''); ?>">
                                                            <label for="status" class="control-label"><?php echo app('translator')->get('site.enabled'); ?></label>
                                                            <div><?php echo e(boolToString($candidate->status)); ?></div>
                                                        </div>
                                        </div>
                                        <div class="row">
                                                        <div class="col-md-6 <?php echo e($errors->has('public') ? 'has-error' : ''); ?>">
                                                            <label for="public" class="control-label"><?php echo app('translator')->get('site.public'); ?></label>
                                                            <div><?php echo e(boolToString($candidate->candidate->public)); ?></div>
                                                        </div>

                                        </div>

                                    </div>
                                </div>
                            </div>
                            <?php $__currentLoopData = \App\CandidateFieldGroup::get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="card">
                                    <div class="card-header" id="heading<?php echo e($group->id); ?>">
                                        <h2 class="mb-0">
                                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapse<?php echo e($group->id); ?>" aria-expanded="false" aria-controls="collapse<?php echo e($group->id); ?>">
                                                <?php echo e($group->name); ?>

                                            </button>
                                        </h2>
                                    </div>
                                    <div id="collapse<?php echo e($group->id); ?>" class="collapse" aria-labelledby="heading<?php echo e($group->id); ?>" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <div class="row">
                                            <?php $__currentLoopData = $group->candidateFields()->orderBy('sort_order')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $field): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php


                                                    $value = ($candidate->candidateFields()->where('id',$field->id)->first()) ? $candidate->candidateFields()->where('id',$field->id)->first()->pivot->value:'';
                                            ?>

                                                <?php if($field->type=='text'): ?>
                                                    <div class="col-md-6<?php echo e($errors->has('field_'.$field->id) ? ' has-error' : ''); ?>">
                                                        <label for="<?php echo e('field_'.$field->id); ?>"><?php echo e($field->name); ?>:</label>
                                                        <div><?php echo e($value); ?></div>
                                                    </div>
                                                <?php elseif($field->type=='select'): ?>
                                                    <div class="col-md-6<?php echo e($errors->has('field_'.$field->id) ? ' has-error' : ''); ?>">
                                                        <label for="<?php echo e('field_'.$field->id); ?>"><?php echo e($field->name); ?>:</label>
                                                        <div><?php echo e($value); ?></div>

                                                    </div>
                                                <?php elseif($field->type=='textarea'): ?>
                                                    <div class="col-md-6<?php echo e($errors->has('field_'.$field->id) ? ' has-error' : ''); ?>">
                                                        <label for="<?php echo e('field_'.$field->id); ?>"><?php echo e($field->name); ?>:</label>
                                                      <div><?php echo e($value); ?></div>
                                                    </div>
                                                <?php elseif($field->type=='checkbox'): ?>
                                                        <div class="col-md-6<?php echo e($errors->has('field_'.$field->id) ? ' has-error' : ''); ?>">
                                                            <label for="<?php echo e('field_'.$field->id); ?>"><?php echo e($field->name); ?>:</label>
                                                            <div><?php echo e(boolToString($value)); ?></div>
                                                        </div>

                                                <?php elseif($field->type=='radio'): ?>
                                                        <div class="col-md-6<?php echo e($errors->has('field_'.$field->id) ? ' has-error' : ''); ?>">
                                                            <label for="<?php echo e('field_'.$field->id); ?>"><?php echo e($field->name); ?>:</label>
                                                            <div><?php echo e($value); ?></div>

                                                        </div>
                                                <?php elseif($field->type=='file'): ?>


                                                        <div class="col-md-6">
                                                            <label for="<?php echo e('field_'.$field->id); ?>"><?php echo e($field->name); ?>:</label>


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
                                                                 <a class="btn btn-success" href="<?php echo e(route('admin.download')); ?>?file=<?php echo e($value); ?>"><i class="fa fa-download"></i> <?php echo app('translator')->get('site.download'); ?></a>
                                                            <?php endif; ?>
                                                        </div>


                                                <?php endif; ?>


                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('header'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('css/admin/candidateshow.css')); ?>">

    <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin-page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/re3aytk/public_html/dev/resources/views/admin/candidates/show.blade.php ENDPATH**/ ?>