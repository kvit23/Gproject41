<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-xl-3 col-md-6">
            <div class="card bg-gradient-primary border-0">
                <!-- Card body -->
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <h6 class="card-title text-uppercase text-muted mb-0 text-white"><?php echo app('translator')->get('site.users'); ?></h6>
                            <span class="h2 font-weight-bold mb-0 text-white"><?php echo e($totalUsers); ?><?php if(saas()): ?>/<?php echo e(USER_LIMIT); ?><?php endif; ?></span>

                        </div>
                        <div class="col-auto">
                            <button type="button" class="btn btn-sm btn-neutral mr-0" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-users"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="<?php echo e(route('admin.employers.index')); ?>"><?php echo app('translator')->get('site.employers'); ?> (<?php echo e(\App\User::where('role_id',2)->count()); ?>)</a>
                                <a class="dropdown-item" href="<?php echo e(route('admin.candidates.index')); ?>"><?php echo app('translator')->get('site.candidates'); ?> (<?php echo e(\App\User::where('role_id',3)->count()); ?>)</a>
                                <a class="dropdown-item" href="<?php echo e(route('admin.admins.index')); ?>"><?php echo app('translator')->get('site.administrators'); ?> (<?php echo e(\App\User::where('role_id',1)->count()); ?>)</a>
                            </div>
                        </div>
                    </div>
                    <p class="mt-3 mb-0 text-sm">
                        <a href="#" class="text-nowrap text-white font-weight-600"><?php echo app('translator')->get('site.total-user-count'); ?></a>
                    </p>
                </div>
            </div>
        </div>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('access','view_orders')): ?>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-gradient-info border-0">
                <!-- Card body -->
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <h6 class="card-title text-uppercase text-muted mb-0 text-white"><?php echo app('translator')->get('site.total-orders'); ?></h6>
                            <span class="h2 font-weight-bold mb-0 text-white"><?php echo e($totalSales); ?></span>
                        </div>
                        <div class="col-auto">
                            <button type="button" class="btn btn-sm btn-neutral mr-0">
                                <i class="fas fa-hand-holding-usd"></i>
                            </button>

                        </div>
                    </div>
                    <p class="mt-3 mb-0 text-sm">
                        <a href="#" class="text-nowrap text-white font-weight-600"><?php echo app('translator')->get('site.orders-total'); ?></a>
                    </p>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-gradient-danger border-0">
                <!-- Card body -->
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <h6 class="card-title text-uppercase text-muted mb-0 text-white"><?php echo app('translator')->get('site.month-orders'); ?></h6>
                            <span class="h2 font-weight-bold mb-0 text-white"><?php echo e($monthSales); ?></span>

                        </div>
                        <div class="col-auto">
                            <button type="button" class="btn btn-sm btn-neutral mr-0">
                                <i class="fas fa-file-invoice-dollar"></i>
                            </button>
                        </div>
                    </div>
                    <p class="mt-3 mb-0 text-sm">
                        <a href="#" class="text-nowrap text-white font-weight-600"><?php echo app('translator')->get('site.orders-month'); ?></a>
                    </p>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-gradient-default border-0">
                <!-- Card body -->
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <h6 class="card-title text-uppercase text-muted mb-0 text-white"><?php echo app('translator')->get('site.annual-orders'); ?></h6>
                            <span class="h2 font-weight-bold mb-0 text-white"><?php echo e($yearSales); ?></span>

                        </div>
                        <div class="col-auto">
                            <button type="button" class="btn btn-sm btn-neutral mr-0">
                                <i class="fas fa-search-dollar"></i>
                            </button>

                        </div>
                    </div>
                    <p class="mt-3 mb-0 text-sm">
                        <a href="#" class="text-nowrap text-white font-weight-600"><?php echo app('translator')->get('site.orders-annual'); ?></a>
                    </p>
                </div>
            </div>
        </div>
        <?php endif; ?>
    </div>
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('access','view_invoices')): ?>
    <div class="row">
        <div class="col-xl-7 mb-5 mb-xl-0">
            <div class="card bg-gradient-default shadow">
                <div class="card-header bg-transparent">
                    <div class="row align-items-center">
                        <div class="col">
                            <h6 class="text-uppercase text-light ls-1 mb-1"><?php echo app('translator')->get('site.stats'); ?></h6>
                            <h2 class="text-white mb-0"><?php echo app('translator')->get('site.approved-invoices'); ?></h2>
                        </div>
                        <div class="col">

                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <!-- Chart -->
                    <div class="chart">
                        <!-- Chart wrapper -->
                        <canvas id="chart-sales2" class="chart-canvas"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-5">






            <div class="card shadow">
                <div class="card-header bg-transparent">
                    <div class="row align-items-center">
                        <div class="col">
                            <h6 class="text-uppercase text-muted ls-1 mb-1"><?php echo app('translator')->get('stats'); ?></h6>
                            <h2 class="mb-0"><?php echo app('translator')->get('site.orders'); ?></h2>
                        </div>
                    </div>
                </div>
                <div class="card-body">



                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#home"><?php echo app('translator')->get('site.all'); ?></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#menu1"><?php echo app('translator')->get('site.completed'); ?></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#menu2"><?php echo app('translator')->get('site.cancelled'); ?></a>
                        </li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content int_pt10" >
                        <div class="tab-pane container active" id="home">

                            <!-- Chart -->
                            <div class="chart">
                                <canvas id="chart-orders2" class="chart-canvas"></canvas>
                            </div>

                        </div>
                        <div class="tab-pane container fade" id="menu1">
                            <!-- Chart -->
                            <div class="chart">
                                <canvas id="chart-orders3" class="chart-canvas"></canvas>
                            </div>

                        </div>
                        <div class="tab-pane container fade" id="menu2">
                            <!-- Chart -->
                            <div class="chart">
                                <canvas id="chart-orders4" class="chart-canvas"></canvas>
                            </div>

                        </div>
                    </div>








                </div>
            </div>





        </div>
    </div>
    <?php endif; ?>


    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('access','view_orders')): ?>
    <div class="row mt-5">
        <div class="col-xl-12 mb-5 mb-xl-0">
            <div class="card shadow">
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col">
                            <h3 class="mb-0"><?php echo app('translator')->get('site.recent-orders'); ?></h3>
                        </div>
                        <div class="col text-right">
                            <a href="<?php echo e(url('/admin/orders')); ?>" class="btn btn-sm btn-primary"><?php echo app('translator')->get('site.view-all'); ?></a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <!-- Projects table -->
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th><?php echo app('translator')->get('site.employer'); ?></th>
                                    <th><?php echo app('translator')->get('site.added-on'); ?></th>
                                    <th><?php echo app('translator')->get('site.interview-date'); ?></th>
                                    <th><?php echo app('translator')->get('site.status'); ?></th>
                                    <th><?php echo app('translator')->get('site.shortlist'); ?></th>
                                    <th><?php echo app('translator')->get('site.actions'); ?></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $__currentLoopData = $recentOrders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($item->id); ?></td>
                                        <td><?php echo e($item->user->name); ?></td>
                                        <td><?php echo e(\Illuminate\Support\Carbon::parse($item->created_at)->format('d/M/Y')); ?></td>
                                        <td>
                                            <?php if(!empty($item->interview_date)): ?>
                                                <?php echo e(\Illuminate\Support\Carbon::parse($item->interview_date)->format('d/M/Y')); ?>

                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <?php echo e(orderStatus($item->status)); ?>

                                        </td>
                                        <td>
                                            <?php echo e($item->candidates()->count()); ?>

                                        </td>
                                        <td>

                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('access','view_order_comments')): ?>
                                            <a href="<?php echo e(route('admin.order-comments.index',['order'=>$item->id])); ?>" title="<?php echo app('translator')->get('site.view'); ?>"><button class="btn btn-info btn-sm"><i class="fa fa-comments" aria-hidden="true"></i> <?php echo app('translator')->get('site.comments'); ?>(<?php echo e($item->orderComments()->count()); ?>)</button></a>
                                            <?php endif; ?>

                                            <div class="btn-group dropup">
                                                <button type="button" class="btn btn-sm btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="ni ni-settings"></i> <?php echo app('translator')->get('site.actions'); ?>
                                                </button>
                                                <div class="dropdown-menu">
                                                    <!-- Dropdown menu links -->
                                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('access','view_order')): ?>
                                                    <a class="dropdown-item" href="<?php echo e(url('/admin/orders/' . $item->id)); ?>"><?php echo app('translator')->get('site.view'); ?></a>
                                                    <?php endif; ?>

                                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('access','edit_order')): ?>
                                                    <a class="dropdown-item" href="<?php echo e(url('/admin/orders/' . $item->id . '/edit')); ?>"><?php echo app('translator')->get('site.edit'); ?></a>
                                                    <?php endif; ?>


                                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('access','create_employment')): ?>
                                                    <a class="dropdown-item" href="<?php echo e(route('admin.employments.create',['user'=>$item->user_id])); ?>"><?php echo app('translator')->get('site.create-employment'); ?></a>
                                                    <?php endif; ?>

                                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('access','delete_order')): ?>
                                                    <a class="dropdown-item" href="#" onclick="$('#deleteForm<?php echo e($item->id); ?>').submit()"><?php echo app('translator')->get('site.delete'); ?></a>
                                                    <?php endif; ?>



                                                </div>
                                            </div>

                                            <form  onsubmit="return confirm(&quot;<?php echo app('translator')->get('site.confirm-delete'); ?>&quot;)"   id="deleteForm<?php echo e($item->id); ?>"  method="POST" action="<?php echo e(url('/admin/orders' . '/' . $item->id)); ?>" accept-charset="UTF-8" class="int_inlinedisp">
                                                <?php echo e(method_field('DELETE')); ?>

                                                <?php echo e(csrf_field()); ?>

                                            </form>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>

            </div>
        </div>

    </div>
    <?php endif; ?>

    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('access','view_invoices')): ?>
    <div class="row mt-5">
        <div class="col-xl-12 mb-5 mb-xl-0">
            <div class="card shadow">
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col">
                            <h3 class="mb-0"><?php echo app('translator')->get('site.recent-invoices'); ?></h3>
                        </div>
                        <div class="col text-right">
                            <a href="<?php echo e(url('/admin/invoices')); ?>" class="btn btn-sm btn-primary"><?php echo app('translator')->get('site.view-all'); ?></a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <!-- Projects table -->
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th ><?php echo app('translator')->get('site.user'); ?></th>
                                    <th><?php echo app('translator')->get('site.item'); ?></th>
                                    <th><?php echo app('translator')->get('site.amount'); ?></th>
                                    <th><?php echo app('translator')->get('site.status'); ?></th>
                                    <th><?php echo app('translator')->get('site.created-on'); ?></th>
                                    <th><?php echo app('translator')->get('site.due-date'); ?></th>
                                    <th><?php echo app('translator')->get('site.actions'); ?></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $__currentLoopData = $recentInvoices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($item->id); ?></td>
                                        <td  >

                                            <a <?php if($item->user->role_id==2): ?> href="<?php echo e(url('/admin/employers/' . $item->user_id)); ?>" <?php elseif($item->user->role_id==3): ?>  href="<?php echo e(url('/admin/candidates/' . $item->user_id)); ?>" <?php endif; ?> ><?php echo e($item->user->name); ?> (<?php echo e(roleName($item->user->role_id)); ?>)</a>


                                        </td>
                                        <td  ><?php echo e($item->title); ?> </td>
                                        <td><?php echo clean( check( price($item->amount)) ); ?></td>
                                        <td><?php echo e(($item->paid==1)? __('site.paid'):__('site.unpaid')); ?></td>
                                        <td>
                                            <?php echo e(\Carbon\Carbon::parse($item->created_at)->format('d/M/Y')); ?>

                                        </td>
                                        <td>
                                            <?php if(!empty($item->due_date)): ?>
                                                <?php echo e(\Carbon\Carbon::parse($item->due_date)->format('d/M/Y')); ?>

                                            <?php endif; ?>
                                        </td>
                                        <td>


                                            <div class="btn-group dropup">
                                                <button type="button" class="btn btn-sm btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="ni ni-settings"></i> <?php echo app('translator')->get('site.actions'); ?>
                                                </button>
                                                <div class="dropdown-menu">


                                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('access','approve_invoice')): ?>
                                                    <?php if($item->paid==0): ?>
                                                        <a class="dropdown-item"  onclick="return confirm('<?php echo app('translator')->get('site.confirm-approve'); ?>')"  href="<?php echo e(route('admin.invoices.approve',['invoice'=>$item->id])); ?>"><i class="fa fa-thumbs-up"></i> <?php echo app('translator')->get('site.approve'); ?></a>
                                                        <?php endif; ?>
                                                        <?php endif; ?>



                                                                <!-- Dropdown menu links -->
                                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('access','view_invoice')): ?>
                                                        <a class="dropdown-item" href="<?php echo e(url('/admin/invoices/' . $item->id)); ?>"><i class="fa fa-eye"></i> <?php echo app('translator')->get('site.view'); ?></a>
                                                        <?php endif; ?>

                                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('access','edit_invoice')): ?>
                                                        <a class="dropdown-item" href="<?php echo e(url('/admin/invoices/' . $item->id . '/edit')); ?>"><i class="fa fa-edit"></i> <?php echo app('translator')->get('site.edit'); ?></a>
                                                        <?php endif; ?>




                                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('access','delete_invoice')): ?>
                                                        <a class="dropdown-item" href="#" onclick="$('#deleteForm<?php echo e($item->id); ?>').submit()"><i class="fa fa-trash"></i> <?php echo app('translator')->get('site.delete'); ?></a>
                                                        <?php endif; ?>



                                                </div>
                                            </div>


                                            <form  onsubmit="return confirm(&quot;<?php echo app('translator')->get('site.confirm-delete'); ?>&quot;)"   id="deleteForm<?php echo e($item->id); ?>"  method="POST" action="<?php echo e(url('/admin/invoices' . '/' . $item->id)); ?>" accept-charset="UTF-8" class="int_inlinedisp">
                                                <?php echo e(method_field('DELETE')); ?>

                                                <?php echo e(csrf_field()); ?>

                                            </form>


                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>

            </div>
        </div>

    </div>
    <?php endif; ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('header'); ?>

    <link href="<?php echo e(asset('css/admin/dashboard.css')); ?>"></link>
 <?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>
    <script>
"use strict";

        //
        // Orders chart
        //

        var OrdersChart = (function() {

            //
            // Variables
            //

            var $chart = $('#chart-orders2');
            var $ordersSelect = $('[name="ordersSelect"]');


            //
            // Methods
            //

            // Init chart
            function initChart($chart) {

                // Create chart
                var ordersChart = new Chart($chart, {
                    type: 'bar',
                    options: {
                        scales: {
                            yAxes: [{
                                gridLines: {
                                    lineWidth: 1,
                                    color: '#dfe2e6',
                                    zeroLineColor: '#dfe2e6'
                                },
                                ticks: {
                                    callback: function(value) {
                                        if (!(value % 10)) {
                                            //return '$' + value + 'k'
                                            return value
                                        }
                                    }
                                }
                            }]
                        },
                        tooltips: {
                            callbacks: {
                                label: function(item, data) {
                                    var label = data.datasets[item.datasetIndex].label || '';
                                    var yLabel = item.yLabel;
                                    var content = '';

                                    if (data.datasets.length > 1) {
                                        content += '' + label + '';
                                    }

                                    content += '' + yLabel + '';

                                    return content;
                                }
                            }
                        }
                    },
                    data: {
                        labels: <?php echo clean($monthList); ?>,
                        datasets: [{
                            label: '<?php echo app('translator')->get('site.sales'); ?>',
                            data: <?php echo clean($monthSaleCount); ?>

                    }]
        }
        });

        // Save to jQuery object
        $chart.data('chart', ordersChart);
        }


        // Init chart
        if ($chart.length) {
            initChart($chart);
        }

        })();



        //
        // Orders chart
        //

        var OrdersChart2 = (function() {

            //
            // Variables
            //

            var $chart2 = $('#chart-orders3');
            var $ordersSelect2 = $('[name="ordersSelect"]');


            //
            // Methods
            //

            // Init chart
            function initChart($chart2) {

                // Create chart
                var ordersChart2 = new Chart($chart2, {
                    type: 'bar',
                    options: {
                        scales: {
                            yAxes: [{
                                gridLines: {
                                    lineWidth: 1,
                                    color: '#dfe2e6',
                                    zeroLineColor: '#dfe2e6'
                                },
                                ticks: {
                                    callback: function(value) {
                                        if (!(value % 10)) {
                                            //return '$' + value + 'k'
                                            return value
                                        }
                                    }
                                }
                            }]
                        },
                        tooltips: {
                            callbacks: {
                                label: function(item, data) {
                                    var label = data.datasets[item.datasetIndex].label || '';
                                    var yLabel = item.yLabel;
                                    var content = '';

                                    if (data.datasets.length > 1) {
                                        content += '' + label + '';
                                    }

                                    content += '' + yLabel + '';

                                    return content;
                                }
                            }
                        }
                    },
                    data: {
                        labels: <?php echo clean($monthList); ?>,
            datasets: [{
                label: '<?php echo app('translator')->get('site.sales'); ?>',
                data: <?php echo clean($monthSaleCompCount); ?>

        }]
        }
        });

        // Save to jQuery object
        $chart2.data('chart', ordersChart2);
        }


        // Init chart
        if ($chart2.length) {
            initChart($chart2);
        }

        })();



        //
        // Orders chart
        //

        var OrdersChart3 = (function() {

            //
            // Variables
            //

            var $chart3 = $('#chart-orders4');
            var $ordersSelect3 = $('[name="ordersSelect"]');


            //
            // Methods
            //

            // Init chart
            function initChart($chart3) {

                // Create chart
                var ordersChart3 = new Chart($chart3, {
                    type: 'bar',
                    options: {
                        scales: {
                            yAxes: [{
                                gridLines: {
                                    lineWidth: 1,
                                    color: '#dfe2e6',
                                    zeroLineColor: '#dfe2e6'
                                },
                                ticks: {
                                    callback: function(value) {
                                        if (!(value % 10)) {
                                            //return '$' + value + 'k'
                                            return value
                                        }
                                    }
                                }
                            }]
                        },
                        tooltips: {
                            callbacks: {
                                label: function(item, data) {
                                    var label = data.datasets[item.datasetIndex].label || '';
                                    var yLabel = item.yLabel;
                                    var content = '';

                                    if (data.datasets.length > 1) {
                                        content += '' + label + '';
                                    }

                                    content += '' + yLabel + '';

                                    return content;
                                }
                            }
                        }
                    },
                    data: {
                        labels: <?php echo clean($monthList); ?>,
            datasets: [{
                label: '<?php echo app('translator')->get('site.sales'); ?>',
                data: <?php echo clean($monthSaleCanCount); ?>

        }]
        }
        });

        // Save to jQuery object
        $chart3.data('chart', ordersChart3);
        }


        // Init chart
        if ($chart3.length) {
            initChart($chart3);
        }

        })();


        //
        // Charts
        //

        'use strict';

        //
        // Sales chart
        //

        var SalesChart = (function() {

            // Variables

            var $chart = $('#chart-sales2');


            // Methods

            function init($chart) {

                var salesChart = new Chart($chart, {
                    type: 'line',
                    options: {
                        scales: {
                            yAxes: [{
                                gridLines: {
                                    lineWidth: 1,
                                    color: Charts.colors.gray[900],
                                    zeroLineColor: Charts.colors.gray[900]
                                },
                                ticks: {
                                    callback: function(value) {
                                        if (!(value % 10)) {
                                            return '<?php echo e($currency); ?>' + value ;
                                        }
                                    }
                                }
                            }]
                        },
                        tooltips: {
                            callbacks: {
                                label: function(item, data) {
                                    var label = data.datasets[item.datasetIndex].label || '';
                                    var yLabel = item.yLabel;
                                    var content = '';

                                    if (data.datasets.length > 1) {
                                        content += '' + label + '';
                                    }

                                    content += '<?php echo e($currency); ?>' + yLabel + '';
                                    return content;
                                }
                            }
                        }
                    },
                    data: {
                        labels: <?php echo clean($monthList); ?>,
            datasets: [{
                label: '<?php echo app('translator')->get('site.sales'); ?>',
                data: <?php echo clean($monthSaleData); ?>

        }]
        }
        });

        // Save to jQuery object

        $chart.data('chart', salesChart);

        };


        // Events

        if ($chart.length) {
            init($chart);
        }

        })();
    </script>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/re3aytk/public_html/resources/views/admin/home/index.blade.php ENDPATH**/ ?>