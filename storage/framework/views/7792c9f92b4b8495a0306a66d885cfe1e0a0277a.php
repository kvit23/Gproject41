<?php $__env->startSection('pageTitle',__('site.order').': '.$order->user->name); ?>
<?php $__env->startSection('page-title',__('site.order').': '.$order->user->name); ?>

<?php $__env->startSection('page-content'); ?>
    <div class="container-fluid">
        <div class="row">


            <div class="col-md-12">
                <div  >
                    <div  >
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('access','view_orders')): ?>
                        <a href="<?php echo e(url('/admin/orders')); ?>" title="<?php echo app('translator')->get('site.back'); ?>"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> <?php echo app('translator')->get('site.back'); ?></button></a>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('access','edit_order')): ?>
                        <a href="<?php echo e(url('/admin/orders/' . $order->id . '/edit')); ?>" ><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> <?php echo app('translator')->get('site.edit'); ?></button></a>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('access','delete_order')): ?>
                        <form method="POST" action="<?php echo e(url('admin/orders' . '/' . $order->id)); ?>" accept-charset="UTF-8" class="int_inlinedisp">
                            <?php echo e(method_field('DELETE')); ?>

                            <?php echo e(csrf_field()); ?>

                            <button type="submit" class="btn btn-danger btn-sm" title="<?php echo app('translator')->get('site.delete'); ?>" onclick="return confirm(&quot;<?php echo app('translator')->get('site.confirm-delete'); ?>?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> <?php echo app('translator')->get('site.delete'); ?></button>
                        </form>
                        <?php endif; ?>


                        <br/>
                        <br/>

                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#home"><?php echo app('translator')->get('site.order-details'); ?></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#menu1"><?php echo app('translator')->get('site.employer-details'); ?></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#menu2"><?php echo app('translator')->get('site.shortlist'); ?></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#menu3"><?php echo app('translator')->get('site.invoices'); ?></a>
                            </li>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('access','create_interview')): ?>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#menu4"><?php echo app('translator')->get('site.create-interview'); ?></a>
                            </li>
                            <?php endif; ?>
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div class="tab-pane container active" id="home">


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
                                                    <div class="form-group col-md-6 <?php echo e($errors->has('user_id') ? 'has-error' : ''); ?>">
                                                        <label for="user_id" class="control-label"><?php echo app('translator')->get('site.employer'); ?></label>

                                                        <div><a href="<?php echo e(route('admin.employers.show',['employer'=>$order->user_id])); ?>"><?php echo e($order->user->name); ?></a></div>

                                                    </div>
                                                    <div class="form-group col-md-6  ">
                                                        <label for="added" class="control-label"><?php echo app('translator')->get('site.added-on'); ?></label>
                                                            <div><?php echo e(\Illuminate\Support\Carbon::parse($order->created_at)->format('d/M/Y')); ?></div>


                                                    </div>
                                                </div>



                                                <div class="row">


                                                    <div class="form-group col-md-6 <?php echo e($errors->has('status') ? 'has-error' : ''); ?>">
                                                        <label for="status" class="control-label"><?php echo app('translator')->get('site.status'); ?></label>
                                                        <div><?php echo e(orderStatus($order->status)); ?></div>

                                                    </div>

                                                    <div class="form-group col-md-6 <?php echo e($errors->has('interview_date') ? 'has-error' : ''); ?>">
                                                        <label for="interview_date" class="control-label"><?php echo app('translator')->get('site.interview-date'); ?></label>
                                                        <?php if(!empty($order->interview_date)): ?>
                                                            <div><?php echo e(\Illuminate\Support\Carbon::parse($order->interview_date)->format('d/M/Y')); ?></div>
                                                        <?php endif; ?>

                                                    </div>

                                                </div>


                                                <div class="row">
                                                    <div class="form-group col-md-6">
                                                        <label><?php echo app('translator')->get('site.interview-location'); ?></label>
                                                        <div><?php echo clean( nl2br(clean($order->interview_location)) ); ?></div>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label><?php echo app('translator')->get('site.interview-time'); ?></label>
                                                        <div><?php echo e($order->interview_time); ?></div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="form-group col-md-12">
                                                        <label><?php echo app('translator')->get('site.comments'); ?></label>
                                                        <div><?php echo clean( nl2br(clean($order->comments)) ); ?></div>
                                                    </div>
                                                </div>





                                            </div>
                                        </div>


                                    </div>
                                    <?php $__currentLoopData = \App\OrderFieldGroup::where('order_form_id',$order->order_form_id)->orderBy('sort_order')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
                                                        <?php $__currentLoopData = $group->orderFields()->orderBy('sort_order')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $field): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <?php


                                                            $value = ($order->orderFields()->where('id',$field->id)->first()) ? $order->orderFields()->where('id',$field->id)->first()->pivot->value:'';
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
                            <div class="tab-pane container fade" id="menu1">
                                <div class="accordion" id="e-accordionExample">
                                    <div class="card">
                                        <div class="card-header" id="e-headingOne">
                                            <h2 class="mb-0">
                                                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#e-collapseOne" aria-expanded="true" aria-controls="e-collapseOne">
                                                    <?php echo app('translator')->get('site.general-details'); ?>
                                                </button>
                                            </h2>
                                        </div>

                                        <div id="e-collapseOne" class="collapse show" aria-labelledby="e-headingOne" data-parent="#e-accordionExample">
                                            <div class="card-body">

                                                <div class="row">
                                                    <div class=" col-md-6 <?php echo e($errors->has('name') ? 'has-error' : ''); ?>">
                                                        <label for="name" class="control-label"><?php echo app('translator')->get('site.name'); ?></label>
                                                        <div><?php echo e($employer->name); ?></div>
                                                    </div>
                                                    <div class="col-md-6 <?php echo e($errors->has('gender') ? 'has-error' : ''); ?>">
                                                        <label for="gender" class="control-label"><?php echo app('translator')->get('site.gender'); ?></label>
                                                        <div><?php echo e(gender($employer->employer->gender)); ?></div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-6 <?php echo e($errors->has('email') ? 'has-error' : ''); ?>">
                                                        <label for="email" class="control-label"><?php echo app('translator')->get('site.email'); ?></label>
                                                        <div><?php echo e($employer->email); ?></div>
                                                    </div>
                                                    <div class="col-md-6 <?php echo e($errors->has('telephone') ? 'has-error' : ''); ?>">
                                                        <label for="telephone" class="control-label"><?php echo app('translator')->get('site.telephone'); ?></label>
                                                        <div><?php echo e($employer->telephone); ?></div>
                                                    </div>
                                                </div>


                                                <div class="row">
                                                    <div class="col-md-6 <?php echo e($errors->has('gender') ? 'has-error' : ''); ?>">
                                                        <label for="gender" class="control-label"><?php echo app('translator')->get('site.gender'); ?></label>
                                                        <div><?php echo e(gender($employer->employer->gender)); ?></div>
                                                    </div>
                                                    <div class="col-md-6 <?php echo e($errors->has('active') ? 'has-error' : ''); ?>">
                                                        <label for="active" class="control-label"><?php echo app('translator')->get('site.active'); ?></label>
                                                        <div><?php echo e(boolToString($employer->employer->active)); ?></div>
                                                    </div>

                                                </div>




                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label  class="control-label"><?php echo app('translator')->get('site.registered-on'); ?></label>
                                                        <div><?php echo e(\Illuminate\Support\Carbon::parse($employer->created_at)->format('d/M/Y')); ?></div>
                                                    </div>

                                                </div>


                                            </div>
                                        </div>
                                    </div>
                                    <?php $__currentLoopData = \App\EmployerFieldGroup::get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="card">
                                            <div class="card-header" id="e-heading<?php echo e($group->id); ?>">
                                                <h2 class="mb-0">
                                                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#e-collapse<?php echo e($group->id); ?>" aria-expanded="false" aria-controls="e-collapse<?php echo e($group->id); ?>">
                                                        <?php echo e($group->name); ?>

                                                    </button>
                                                </h2>
                                            </div>
                                            <div id="e-collapse<?php echo e($group->id); ?>" class="collapse" aria-labelledby="e-heading<?php echo e($group->id); ?>" data-parent="#e-accordionExample">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <?php $__currentLoopData = $group->employerFields()->orderBy('sort_order')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $field): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <?php


                                                            $value = ($employer->employerFields()->where('id',$field->id)->first()) ? $employer->employerFields()->where('id',$field->id)->first()->pivot->value:'';
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
                            <div class="tab-pane container fade" id="menu2">

                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th><?php echo app('translator')->get('site.picture'); ?></th>
                                            <th><?php echo app('translator')->get('site.name'); ?></th>
                                            <th><?php echo app('translator')->get('site.age'); ?></th>
                                            <th><?php echo app('translator')->get('site.telephone'); ?></th>
                                            <th><?php echo app('translator')->get('site.email'); ?></th>
                                            <th><?php echo app('translator')->get('site.actions'); ?></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php $__currentLoopData = $order->candidates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><?php echo e($loop->iteration); ?></td>
                                                <td>
                                                    <div class="media align-items-center">
              <span class="avatar avatar-sm rounded-circle">
                  <?php if(!empty($item->picture) && file_exists($item->picture)): ?>
                      <img   src="<?php echo e(asset($item->picture)); ?>">
                  <?php else: ?>
                      <img   src="<?php echo e(asset('img/man.jpg')); ?>">
                  <?php endif; ?>

              </span>
                                                    </div>


                                                </td>
                                                <td><?php echo e($item->user->name); ?></td>
                                                <td><?php echo e(getAge(\Illuminate\Support\Carbon::parse($item->date_of_birth)->timestamp)); ?></td>
                                                <td><?php echo e($item->user->telephone); ?></td>
                                                <td><?php echo e($item->user->email); ?></td>
                                                <td>
                                                    <div class="btn-group dropup">
                                                        <button type="button" class="btn btn-sm btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <i class="ni ni-settings"></i> <?php echo app('translator')->get('site.actions'); ?>
                                                        </button>
                                                        <div class="dropdown-menu">
                                                            <!-- Dropdown menu links -->
                                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('access','view_candidate')): ?>
                                                            <a class="dropdown-item" href="<?php echo e(url('/admin/candidates/' . $item->user->id)); ?>"><?php echo app('translator')->get('site.view'); ?></a>
                                                            <?php endif; ?>



                                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('access','view_candidate')): ?>
                                                            <div class="dropdown-divider"></div>
                                                            <h6 class="dropdown-header"><?php echo app('translator')->get('site.download-profile'); ?></h6>
                                                            <a class="dropdown-item" href="<?php echo e(route('admin.candidate.download',['id'=>$item->user->id,'full'=>1])); ?>"><?php echo app('translator')->get('site.full-profile'); ?></a>
                                                            <a class="dropdown-item" href="<?php echo e(route('admin.candidate.download',['id'=>$item->user->id,'full'=>0])); ?>"><?php echo app('translator')->get('site.partial-profile'); ?></a>
                                                            <?php endif; ?>


                                                        </div>
                                                    </div>

                                                    <div class="btn-group dropup">
                                                        <button type="button" class="btn btn-sm btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <i class="fa fa-book"></i> <?php echo app('translator')->get('site.records'); ?>
                                                        </button>
                                                        <div class="dropdown-menu">
                                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('access','view_candidate_notes')): ?>
                                                            <a class="dropdown-item" href="<?php echo e(route('admin.notes.index',['user'=>$item->user->id])); ?>"><?php echo app('translator')->get('site.notes'); ?> (<?php echo e($item->user->userNotes()->count()); ?>)</a>
                                                            <?php endif; ?>

                                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('access','view_candidate_attachments')): ?>
                                                            <a class="dropdown-item" href="<?php echo e(route('admin.attachments.index',['user'=>$item->user->id])); ?>"><?php echo app('translator')->get('site.attachments'); ?> (<?php echo e($item->user->userAttachments()->count()); ?>)</a>
                                                            <?php endif; ?>



                                                        </div>
                                                    </div>

                                                </td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tbody>
                                    </table>

                                </div>


                            </div>
                            <div class="tab-pane container fade" id="menu3">
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('access','create_invoice')): ?>
                                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal">
                                    <i class="fa fa-plus"></i> <?php echo app('translator')->get('site.create-new'); ?>
                                </button>
                                <?php endif; ?>

                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <form action="<?php echo e(route('admin.order.create-invoice',['order'=>$order->id])); ?>" method="post">
                                        <?php echo csrf_field(); ?>
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel"><?php echo app('translator')->get('site.create-invoice'); ?></h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label for="title"><span class="req">*</span><?php echo app('translator')->get('site.item'); ?></label>
                                                    <input class="form-control" type="text" name="title" required />
                                                </div>
                                                <div class="form-group">
                                                    <label for="amount"><span class="req">*</span><?php echo app('translator')->get('site.amount'); ?></label>
                                                    <input class="form-control digit" type="text" name="amount" required />
                                                </div>
                                                <div class="form-group">
                                                    <label for="description"><?php echo app('translator')->get('site.description'); ?></label>
                                                    <textarea class="form-control" name="description" id="description" ></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label for="paid"><span class="req">*</span><?php echo app('translator')->get('site.status'); ?></label>
                                                    <select class="form-control" name="paid" id="paid">
                                                        <option value="0"><?php echo app('translator')->get('site.unpaid'); ?></option>
                                                        <option value="1"><?php echo app('translator')->get('site.paid'); ?></option>
                                                    </select>
                                                </div>
                                                <div class="form-group <?php echo e($errors->has('invoice_category_id') ? 'has-error' : ''); ?>">
                                                    <label for="invoice_category_id" class="control-label"><?php echo app('translator')->get('site.invoice-category'); ?></label>
                                                    <select  class="form-control" name="invoice_category_id" id="invoice_category_id">
                                                        <option value=""></option>
                                                        <?php $__currentLoopData = \App\InvoiceCategory::get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $invoiceCategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <option <?php if(old('invoice_category_id',isset($invoice->invoice_category_id) ? $invoice->invoice_category_id : '')==$invoiceCategory->id): ?> selected <?php endif; ?> value="<?php echo e($invoiceCategory->id); ?>"><?php echo e($invoiceCategory->name); ?></option>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </select>

                                                    <?php echo clean( check( $errors->first('invoice_category_id', '<p class="help-block">:message</p>')) ); ?>

                                                </div>
                                                <div class="form-group <?php echo e($errors->has('payment_method_id') ? 'has-error' : ''); ?>">
                                                    <label for="payment_method_id" class="control-label"><?php echo app('translator')->get('site.payment-method'); ?></label>
                                                    <select  class="form-control" name="payment_method_id" id="payment_method_id">
                                                        <option value=""></option>
                                                        <?php $__currentLoopData = \App\PaymentMethod::get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $paymentMethod): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <option <?php if(old('payment_method_id',isset($invoice->payment_method_id) ? $invoice->payment_method_id : '')==$paymentMethod->id): ?> selected <?php endif; ?> value="<?php echo e($paymentMethod->id); ?>"><?php echo e($paymentMethod->name); ?></option>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </select>

                                                    <?php echo clean( check( $errors->first('payment_method_id', '<p class="help-block">:message</p>')) ); ?>

                                                </div>



                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo app('translator')->get('site.close'); ?></button>
                                                <button type="submit" class="btn btn-primary"><?php echo app('translator')->get('site.save'); ?></button>
                                            </div>
                                        </div>
                                    </div>
                                    </form>
                                </div>


                                <div class="table-responsive int_mt10"  >
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th><?php echo app('translator')->get('site.item'); ?></th>
                                            <th><?php echo app('translator')->get('site.amount'); ?></th>
                                            <th><?php echo app('translator')->get('site.status'); ?></th>
                                            <th><?php echo app('translator')->get('site.created-on'); ?></th>
                                            <th><?php echo app('translator')->get('site.actions'); ?></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php $__currentLoopData = $order->invoices()->latest()->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><?php echo e($item->id); ?></td>
                                                <td><?php echo e($item->title); ?> </td>
                                                <td><?php echo clean( check( price($item->amount)) ); ?></td>
                                                <td><?php echo e(($item->paid==1)? __('site.paid'):__('site.unpaid')); ?></td>
                                                <td>
                                                    <?php echo e(\Carbon\Carbon::parse($item->created_at)->format('d/M/Y')); ?>

                                                </td>
                                                <td>
                                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('access','approve_invoice')): ?>
                                                    <?php if($item->paid==0): ?>
                                                        <a onclick="return confirm('<?php echo app('translator')->get('site.confirm-approve'); ?>')" class="btn btn-success btn-sm" href="<?php echo e(route('admin.invoices.approve',['invoice'=>$item->id])); ?>"><i class="fa fa-thumbs-up"></i> <?php echo app('translator')->get('site.approve'); ?></a>
                                                    <?php endif; ?>
                                                    <?php endif; ?>

                                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('access','view_invoice')): ?>
                                                    <a href="<?php echo e(url('/admin/invoices/' . $item->id)); ?>" title="<?php echo app('translator')->get('site.view'); ?>"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> <?php echo app('translator')->get('site.view'); ?></button></a>
                                                    <?php endif; ?>
                                                    &nbsp;
                                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('access','delete_invoice')): ?>
                                                    <form method="POST" action="<?php echo e(url('/admin/invoices' . '/' . $item->id)); ?>?back=true" accept-charset="UTF-8" class="int_inlinedisp">
                                                        <?php echo e(method_field('DELETE')); ?>

                                                        <?php echo e(csrf_field()); ?>

                                                        <button type="submit" class="btn btn-danger btn-sm" title="<?php echo app('translator')->get('site.delete'); ?>" onclick="return confirm(&quot;<?php echo app('translator')->get('site.confirm-delete'); ?>&quot;)"><i class="fa fa-trash" aria-hidden="true"></i> <?php echo app('translator')->get('site.delete'); ?></button>
                                                    </form>
                                                    <?php endif; ?>
                                                </td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tbody>
                                    </table>
                                 </div>

                            </div>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('access','create_interview')): ?>
                            <div class="tab-pane container fade" id="menu4">

                                    <form method="POST" action="<?php echo e(url('/admin/interviews')); ?>" >
                                        <?php echo csrf_field(); ?>
                                        <div class="modal-body">


                                            <input type="hidden" name="user_id" value="<?php echo e($order->user_id); ?>"/>

                                            <div class="form-group  <?php echo e($errors->has('candidates') ? 'has-error' : ''); ?>">

                                                <label for="candidates"><?php echo app('translator')->get('site.candidates'); ?></label>

                                                <select  multiple name="candidates[]" id="candidates" class="form-control select2">
                                                    <option></option>
                                                </select>

                                                <?php echo clean( $errors->first('candidates', '<p class="help-block">:message</p>') ); ?>

                                            </div>

                                            <div class="form-group <?php echo e($errors->has('interview_date') ? 'has-error' : ''); ?>">
                                                <label for="interview_date" class="control-label required"><?php echo app('translator')->get('site.interview-date'); ?></label>
                                                <input required class="form-control date" name="interview_date" type="text" id="interview_date" value="<?php echo e(old('interview_date',isset($order->interview_date) ? $order->interview_date : '')); ?>" >
                                                <?php echo clean( $errors->first('interview_date', '<p class="help-block">:message</p>') ); ?>

                                            </div>
                                            <div class="form-group <?php echo e($errors->has('interview_time') ? 'has-error' : ''); ?>">
                                                <label for="interview_time" class="control-label\"><?php echo app('translator')->get('site.time'); ?></label>
                                                <input  class="form-control time" name="interview_time" type="text" id="interview_time" value="<?php echo e(old('interview_time',isset($order->interview_time) ? $order->interview_time : '')); ?>" >
                                                <?php echo clean( $errors->first('interview_time', '<p class="help-block">:message</p>') ); ?>

                                            </div>
                                            <div class="form-group <?php echo e($errors->has('venue') ? 'has-error' : ''); ?>">
                                                <label for="venue" class="control-label"><?php echo app('translator')->get('site.venue'); ?></label>
                                                <textarea class="form-control" rows="5" name="venue" type="textarea" id="venue" ><?php echo e(old('venue',isset($order->interview_location) ? $order->interview_location : '')); ?></textarea>
                                                <?php echo clean( $errors->first('venue', '<p class="help-block">:message</p>') ); ?>

                                            </div>
                                            <div class="form-group <?php echo e($errors->has('internal_note') ? 'has-error' : ''); ?>">
                                                <label for="internal_note" class="control-label"><?php echo app('translator')->get('site.internal-note'); ?></label>
                                                <textarea class="form-control" rows="5" name="internal_note" type="textarea" id="internal_note" ><?php echo e(old('internal_note')); ?></textarea>
                                                <?php echo clean( $errors->first('internal_note', '<p class="help-block">:message</p>') ); ?>

                                            </div>
                                            <div class="form-group <?php echo e($errors->has('employer_comment') ? 'has-error' : ''); ?>">
                                                <label for="employer_comment" class="control-label"><?php echo app('translator')->get('site.employer-comment'); ?></label>
                                                <textarea class="form-control" rows="5" name="employer_comment" type="textarea" id="employer_comment" ><?php echo e(old('employer_comment')); ?></textarea>
                                                <?php echo clean( $errors->first('employer_comment', '<p class="help-block">:message</p>') ); ?>

                                            </div>
                                            <div class="form-group <?php echo e($errors->has('reminder') ? 'has-error' : ''); ?>">
                                                <label for="reminder" class="control-label"><?php echo app('translator')->get('site.send-reminder'); ?></label>
                                                <select name="reminder" class="form-control" id="reminder" >
                                                    <?php $__currentLoopData = json_decode('{"1":"Yes","0":"No"}', true); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $optionKey => $optionValue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($optionKey); ?>" <?php echo e(((null !== old('reminder',@$order->reminder)) && old('reminder',@$order->reminder) == $optionKey) ? 'selected' : ''); ?>><?php echo e($optionValue); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                                <?php echo clean( $errors->first('reminder', '<p class="help-block">:message</p>') ); ?>

                                            </div>
                                            <div class="form-group <?php echo e($errors->has('feedback') ? 'has-error' : ''); ?>">
                                                <label for="feedback" class="control-label"><?php echo app('translator')->get('site.request-feedback'); ?></label>
                                                <select name="feedback" class="form-control" id="feedback" >
                                                    <?php $__currentLoopData = json_decode('{"1":"Yes","0":"No"}', true); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $optionKey => $optionValue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($optionKey); ?>" <?php echo e(((null !== old('feedback',@$order->feedback)) && old('feedback',@$order->feedback) == $optionKey) ? 'selected' : ''); ?>><?php echo e($optionValue); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                                <?php echo clean( $errors->first('feedback', '<p class="help-block">:message</p>') ); ?>

                                            </div>




                                        </div>
                                            <button type="submit" class="btn btn-primary btn-block"><?php echo app('translator')->get('site.save-changes'); ?></button>

                                    </form>

                            </div>
                            <?php endif; ?>
                        </div>













                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('footer'); ?>
    <script src="<?php echo e(asset('vendor/select2/js/select2.min.js')); ?>"></script>
    <script src="<?php echo e(asset('vendor/pickadate/picker.js')); ?>" type="text/javascript"></script>
    <script src="<?php echo e(asset('vendor/pickadate/picker.date.js')); ?>" type="text/javascript"></script>
    <script src="<?php echo e(asset('vendor/pickadate/picker.time.js')); ?>" type="text/javascript"></script>
    <script src="<?php echo e(asset('vendor/pickadate/legacy.js')); ?>" type="text/javascript"></script>
    <script src="<?php echo e(asset('public/js/showorder.js')); ?>"></script>
    <script  type="text/javascript">
"use strict";

        $('#user_id').select2({
            placeholder: "<?php echo app('translator')->get('site.search-employers'); ?>...",
            minimumInputLength: 3,
            ajax: {
                url: '<?php echo e(route('admin.employers.search')); ?>',
                dataType: 'json',
                data: function (params) {
                    return {
                        term: $.trim(params.term)
                    };
                },
                processResults: function (data) {
                    return {
                        results: data
                    };
                },
                cache: true
            }

        });

        $('#candidates').select2({
            placeholder: "<?php echo app('translator')->get('site.search-candidates'); ?>...",
            minimumInputLength: 3,
            ajax: {
                url: '<?php echo e(route('admin.candidates.search')); ?>?format=candidate_id',
                dataType: 'json',
                data: function (params) {
                    return {
                        term: $.trim(params.term)
                    };
                },
                processResults: function (data) {
                    return {
                        results: data
                    };
                },
                cache: true
            }

        });

    </script>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('header'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('vendor/select2/css/select2.min.css')); ?>">
    <link href="<?php echo e(asset('vendor/pickadate/themes/default.date.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('vendor/pickadate/themes/default.time.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('vendor/pickadate/themes/default.css')); ?>" rel="stylesheet">


    ##parent-placeholder-594fd1615a341c77829e83ed988f137e1ba96231##
    <link rel="stylesheet" href="<?php echo e(asset('css/admin/showorder.css')); ?>">


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin-page-wide', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/re3aytk/public_html/dev/resources/views/admin/orders/show.blade.php ENDPATH**/ ?>