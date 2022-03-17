<?php $__env->startSection('page-title',__('site.order').' #'.$order->id); ?>
<?php $__env->startSection('breadcrumb'); ?>
    <li  class="breadcrumb-item"><a href="<?php echo e(route('employer.orders')); ?>"><?php echo app('translator')->get('site.orders'); ?></a></li>
    <li class="breadcrumb-item"><?php echo app('translator')->get('site.view'); ?></li>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>

    <div class="card bd-0">
        <div class="card-header bg-gray-400 bd-b-0-f pd-b-0">
            <nav class="nav nav-tabs">
                <a class="nav-link active" data-toggle="tab" href="#tabCont1"><?php echo app('translator')->get('site.order-details'); ?></a>
                <a class="nav-link" data-toggle="tab" href="#tabCont2"><?php echo app('translator')->get('site.shortlist'); ?></a>
                <a class="nav-link" data-toggle="tab" href="#tabCont3"><?php echo app('translator')->get('site.invoices'); ?></a>
                <a id="commentTab" class="nav-link" data-toggle="tab" href="#tabCont4"><?php echo app('translator')->get('site.comments'); ?> (<?php echo e($order->orderComments()->count()); ?>)</a>

            </nav>
        </div><!-- card-header -->
        <div class="card-body bd bd-t-0 tab-content">
            <div id="tabCont1" class="tab-pane active show">
                <div id="accordion2" class="accordion accordion-dark" role="tablist" aria-multiselectable="true">
                    <div class="card">
                        <div class="card-header" role="tab" id="headingOne2">
                            <a data-toggle="collapse" href="#collapseOne2" aria-expanded="false" aria-controls="collapseOne2">
                                <?php echo app('translator')->get('site.general-details'); ?>
                            </a>
                        </div><!-- card-header -->

                        <div id="collapseOne2" data-parent="#accordion2" class="collapse show" role="tabpanel" aria-labelledby="headingOne2">
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-md-6 <?php echo e($errors->has('user_id') ? 'has-error' : ''); ?>">
                                        <label for="user_id" class="control-label"><?php echo app('translator')->get('site.id'); ?></label>

                                        <div><?php echo e($order->id); ?></div>

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
                        <div class="card-header" role="tab" id="heading<?php echo e($group->id); ?>">
                            <a class="collapsed" data-toggle="collapse" href="#collapse<?php echo e($group->id); ?>" aria-expanded="true" aria-controls="collapse<?php echo e($group->id); ?>">
                                <?php echo e($group->name); ?>

                            </a>
                        </div>
                        <div id="collapse<?php echo e($group->id); ?>" class="collapse" data-parent="#accordion2" role="tabpanel" aria-labelledby="heading<?php echo e($group->id); ?>">
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
                                                        <div><img  data-toggle="modal" data-target="#pictureModal<?php echo e($field->id); ?>" src="<?php echo e(route('employer.image')); ?>?file=<?php echo e($value); ?>"  class="int_w330cur" /></div> <br/>


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
                                                                        <img src="<?php echo e(route('employer.image')); ?>?file=<?php echo e($value); ?>" class="int_txcen" />
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-primary" data-dismiss="modal"><?php echo app('translator')->get('site.close'); ?></button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>



                                                    <?php endif; ?>
                                                    <a class="btn btn-success" href="<?php echo e(route('employer.download')); ?>?file=<?php echo e($value); ?>"><i class="fa fa-download"></i> <?php echo app('translator')->get('site.download'); ?></a>
                                                <?php endif; ?>
                                            </div>


                                        <?php endif; ?>


                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>

                            </div>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                </div><!-- accordion -->

            </div><!-- tab-pane -->
            <div id="tabCont2" class="tab-pane">

                <div class="row">
                    <?php $__currentLoopData = $order->candidates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                        <div class="card col-md-3 bd-0 rounded">

                            <?php if(!empty($item->picture) && file_exists($item->picture)): ?>
                                <img  class="img-fluid"   src="<?php echo e(asset($item->picture)); ?>">
                            <?php elseif($item->gender=='m'): ?>
                                <img  class="img-fluid"   src="<?php echo e(asset('img/man.jpg')); ?>">
                            <?php else: ?>
                                <img  class="img-fluid"   src="<?php echo e(asset('img/woman.jpg')); ?>">
                            <?php endif; ?>
                            <div class="card-body bd bd-t-0">
                                <h5 class="card-title"><?php echo e($item->display_name); ?></h5>
                                <p class="card-text">
                                    <strong><?php echo app('translator')->get('site.age'); ?>:</strong> <?php echo e(getAge(\Illuminate\Support\Carbon::parse($item->date_of_birth)->timestamp)); ?>

                                    <br/>
                                    <strong><?php echo app('translator')->get('site.gender'); ?>:</strong> <?php echo e(gender($item->gender)); ?>

                                </p>
                                <a target="_blank" href="<?php echo e(route('profile',['candidate'=>$item->id])); ?>" class="card-link  btn btn-sm btn-primary rounded"><?php echo app('translator')->get('site.view-profile'); ?></a>
                            </div>
                        </div><!-- card -->


                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>


            </div>
            <div id="tabCont3" class="tab-pane">

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



                                    <?php if($item->paid==0): ?>
                                        <a class="btn btn-success" href="<?php echo e(route('user.billing.pay',['invoice'=>$item->id])); ?>"><i class="fa fa-money-check"></i> <?php echo app('translator')->get('site.pay-now'); ?></a>  &nbsp;
                                    <?php endif; ?>
                                    <a class="btn btn-primary" href="<?php echo e(route('user.billing.invoice',['invoice'=>$item->id])); ?>"><i class="fa fa-eye"></i> <?php echo app('translator')->get('site.view'); ?></a>


                                </td>
                            </tr>


                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>


            </div>

            <div id="tabCont4" class="tab-pane">

                <form action="<?php echo e(route('employer.orders.add-comment',['order'=>$order->id])); ?>" method="post">
                    <?php echo csrf_field(); ?>
                    <div class="form-group">
                        <label for="content"><?php echo app('translator')->get('site.add-comment'); ?></label>
                        <textarea autofocus required="required" class="form-control" name="content" id="content"></textarea>
                    </div>
                        <button type="submit" class="btn btn-primary"><?php echo app('translator')->get('site.submit'); ?></button>
                </form>

                <div id="comment-box" class="int_mt30px">

                </div>

            </div>

        </div><!-- card-body -->
    </div><!-- card -->





<?php $__env->stopSection(); ?>

<?php $__env->startSection('header'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('css/admin/boldheader.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/boldlabel.css')); ?>">
    <?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>
    <script>
"use strict";
        $('#comment-box').load('<?php echo e(route('employer.orders.comments',['order'=>$order->id])); ?>');

        $(document).on('click','.comment-links a',function(e){
            e.preventDefault();
            var url = $(this).attr('href');
            $('#comment-box').text('<?php echo app('translator')->get('site.loading'); ?>');
            $('#comment-box').load(url,function(){
                $('html, body').animate({
                    scrollTop: ($('#comment-box').offset().top)
                },500);
            });

        });
        <?php if(request()->has('comment')): ?>

        $(function(){
            $('#commentTab').trigger('click');
            $('textarea#content').focus();
        });


        <?php endif; ?>


    </script>


    <?php $__env->stopSection(); ?>

<?php echo $__env->make($userLayout, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/re3aytk/public_html/dev/resources/views/employer/order/view.blade.php ENDPATH**/ ?>