<!DOCTYPE html>
<html  lang="ar">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <meta name="author" content="Caremate">
    <title><?php echo $__env->yieldContent('pageTitle',__('site.admin')); ?></title>
    <!-- Favicon -->
    <?php if(!empty(setting('image_icon'))): ?>
        <link rel="shortcut icon" type="image/x-icon" href="<?php echo e(asset(setting('image_icon'))); ?>">
        <?php endif; ?>
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
    <!-- Icons -->
    <link rel="stylesheet" href="<?php echo e(asset('themes/argonpro/assets/vendor/nucleo/css/nucleo.css')); ?>" type="text/css">
    <link rel="stylesheet" href="<?php echo e(asset('themes/argonpro/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css')); ?>" type="text/css">
    <!-- Page plugins -->
    <!-- Argon CSS -->
        <link href="<?php echo e(asset('themes/argon/assets/js/plugins/bootstrap/dist/css/bootstrap.min.css')); ?>" rel="stylesheet" />
    <link rel="stylesheet" href="<?php echo e(asset('themes/argonpro/assets/css/argon.min.css?v=1.1.0')); ?>" type="text/css">


        <link href="<?php echo e(asset('css/admin.css')); ?>" rel="stylesheet" />
    <link href="<?php echo e(asset('css/fix.css')); ?>" rel="stylesheet" />

        <?php echo $__env->yieldContent('header'); ?>
</head>

<body>
<!-- Sidenav -->
<nav class="sidenav navbar navbar-vertical fixed-right navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner_ scrollerbox">
        <!-- Brand -->
        <div class="sidenav-header d-flex align-items-center">
            <a class="navbar-brand" href="<?php echo e(url('/')); ?>">
                <?php if(!empty(setting('image_logo'))): ?>
                    <img src="<?php echo e(asset(setting('image_logo'))); ?>" class="navbar-brand-img" >
                <?php else: ?>
                    <h1><?php echo e(setting('general_site_name')); ?></h1>
                <?php endif; ?>
            </a>
            <div class="ml-auto">
                <!-- Sidenav toggler -->
                <div class="sidenav-toggler d-none d-xl-block" data-action="sidenav-unpin" data-target="#sidenav-main">
                    <div class="sidenav-toggler-inner">
                        <i class="sidenav-toggler-line"></i>
                        <i class="sidenav-toggler-line"></i>
                        <i class="sidenav-toggler-line"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="navbar-inner">
            <!-- Collapse -->
            <div class="collapse navbar-collapse" id="sidenav-collapse-main">
                <!-- Nav items -->
                <ul class="navbar-nav">
                    <li class="nav-item" >
                        <a class=" nav-link" href="<?php echo e(route('admin.dashboard')); ?>"> <i class="ni ni-tv-2 text-primary"></i>   <span class="nav-link-text"><?php echo app('translator')->get('amenu.dashboard'); ?></span>
                        </a>
                    </li>

                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('access-group','orders')): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="#nav-orders" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="orders">
                            <i class="ni ni-delivery-fast text-orange"></i>
                            <span class="nav-link-text"><?php echo app('translator')->get('amenu.orders'); ?></span>
                        </a>
                        <div class="collapse" id="nav-orders">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="<?php echo e(url('/admin/orders')); ?>?create" class="nav-link"><?php echo app('translator')->get('amenu.create-order'); ?></a>
                                </li>

                                <li class="nav-item">
                                    <a href="<?php echo e(url('/admin/orders')); ?>" class="nav-link"><?php echo app('translator')->get('amenu.all-orders'); ?></a>
                                </li>

                                <li class="nav-item">
                                    <a href="<?php echo e(url('/admin/orders')); ?>?status=p" class="nav-link"><?php echo app('translator')->get('amenu.pending-orders'); ?></a>
                                </li>

                                <li class="nav-item">
                                    <a href="<?php echo e(url('/admin/orders')); ?>?status=i" class="nav-link"><?php echo app('translator')->get('amenu.in-progress-orders'); ?></a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo e(url('/admin/orders')); ?>?status=c" class="nav-link"><?php echo app('translator')->get('amenu.completed-orders'); ?></a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo e(url('/admin/orders')); ?>?status=x" class="nav-link"><?php echo app('translator')->get('amenu.cancelled-orders'); ?></a>
                                </li>

                            </ul>
                        </div>
                    </li>
                    <?php endif; ?>

                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('access-group','employers')): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="#nav-employers" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="nav-employers">
                            <i class="ni ni-circle-08 text-yellow"></i>
                            <span class="nav-link-text"><?php echo app('translator')->get('amenu.employers'); ?></span>
                        </a>
                        <div class="collapse" id="nav-employers">
                            <ul class="nav nav-sm flex-column">
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('access','create_employer')): ?>
                                <li class="nav-item">
                                    <a href="<?php echo e(route('admin.employers.create')); ?>" class="nav-link"><?php echo app('translator')->get('amenu.create-employer'); ?></a>
                                </li>
                                <?php endif; ?>

                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('access','view_employers')): ?>
                                <li class="nav-item">
                                    <a href="<?php echo e(route('admin.employers.index')); ?>" class="nav-link"><?php echo app('translator')->get('amenu.all-employers'); ?></a>
                                </li>
                                <?php endif; ?>
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('access','view_employers')): ?>
                                <li class="nav-item">
                                    <a href="<?php echo e(route('admin.employers.index')); ?>?active=1" class="nav-link"><?php echo app('translator')->get('amenu.active-employers'); ?></a>
                                </li>
                                <?php endif; ?>
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('access','view_employers')): ?>
                                <li class="nav-item">
                                    <a href="<?php echo e(route('admin.employers.index')); ?>?active=0" class="nav-link"><?php echo app('translator')->get('amenu.inactive-employers'); ?></a>
                                </li>
                                <?php endif; ?>
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('access','create_employer')): ?>
                                <li class="nav-item">
                                    <a href="<?php echo e(route('admin.employers.import-1')); ?>" class="nav-link"><?php echo app('translator')->get('site.import'); ?></a>
                                </li>
                                <?php endif; ?>


                            </ul>
                        </div>
                    </li>
                    <?php endif; ?>

                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('access-group','candidates')): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="#nav-candidates" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="nav-candidates">
                            <i class="ni ni-single-02 text-blue"></i>
                            <span class="nav-link-text"><?php echo app('translator')->get('amenu.candidates'); ?></span>
                        </a>
                        <div class="collapse" id="nav-candidates">
                            <ul class="nav nav-sm flex-column">
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('access','create_candidate')): ?>
                                <li class="nav-item">
                                    <a href="<?php echo e(route('admin.candidates.create')); ?>" class="nav-link"><?php echo app('translator')->get('amenu.create-candidate'); ?></a>
                                </li>
                                <?php endif; ?>

                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('access','view_candidates')): ?>
                                <li class="nav-item">
                                    <a href="<?php echo e(route('admin.candidates.index')); ?>" class="nav-link"><?php echo app('translator')->get('amenu.all-candidates'); ?></a>
                                </li>
                                <?php endif; ?>
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('access','view_candidates')): ?>
                                <li class="nav-item">
                                    <a href="<?php echo e(route('admin.candidates.index')); ?>?shortlisted=1" class="nav-link"><?php echo app('translator')->get('amenu.shortlisted-candidates'); ?></a>
                                </li>
                                <?php endif; ?>
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('access','view_candidates')): ?>
                                <li class="nav-item">
                                    <a href="<?php echo e(route('admin.candidates.index')); ?>?employed=1" class="nav-link"><?php echo app('translator')->get('amenu.employed-candidates'); ?></a>
                                </li>
                                <?php endif; ?>
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('access','view_candidates')): ?>
                                <li class="nav-item">
                                    <a href="<?php echo e(route('admin.candidates.index')); ?>?public=1" class="nav-link"><?php echo app('translator')->get('amenu.public-candidates'); ?></a>
                                </li>
                                <?php endif; ?>

                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('access','view_categories')): ?>
                                <li class="nav-item">
                                    <a href="<?php echo e(route('admin.categories.index')); ?>" class="nav-link"><?php echo app('translator')->get('amenu.categories'); ?></a>
                                </li>
                                <?php endif; ?>

                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('access','create_candidate')): ?>
                                <li class="nav-item">
                                    <a href="<?php echo e(route('admin.candidates.import-1')); ?>" class="nav-link"><?php echo app('translator')->get('site.import'); ?></a>
                                </li>
                                <?php endif; ?>


                            </ul>
                        </div>
                    </li>
                    <?php endif; ?>

                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('access','view_employments')): ?>
                    <li class="nav-item" >
                        <a class=" nav-link" href="<?php echo e(route('admin.employments.browse')); ?>"> <i class="fa fa-user-friends text-primary"></i>   <span class="nav-link-text"><?php echo app('translator')->get('amenu.employments'); ?></span>
                        </a>
                    </li>
                    <?php endif; ?>

                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('access-group','interviews')): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="#nav-interviews" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="nav-invoices">
                            <i class="ni ni-calendar-grid-58 text-orange"></i>
                            <span class="nav-link-text"><?php echo app('translator')->get('site.interviews'); ?></span>
                        </a>
                        <div class="collapse" id="nav-interviews">
                            <ul class="nav nav-sm flex-column">
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('access','create_interview')): ?>
                                <li class="nav-item">
                                    <a href="<?php echo e(url('/admin/interviews/create')); ?>" class="nav-link"><?php echo app('translator')->get('site.create-interview'); ?></a>
                                </li>
                                <?php endif; ?>

                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('access','view_interviews')): ?>
                                <li class="nav-item">
                                    <a href="<?php echo e(url('/admin/interviews')); ?>" class="nav-link"><?php echo app('translator')->get('site.all-interviews'); ?></a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo e(url('/admin/interviews')); ?>?type=u" class="nav-link"><?php echo app('translator')->get('site.upcoming-interviews'); ?></a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo e(url('/admin/interviews')); ?>?type=p" class="nav-link"><?php echo app('translator')->get('site.past-interviews'); ?></a>
                                </li>

                                <?php endif; ?>



                            </ul>
                        </div>
                    </li>
                    <?php endif; ?>

                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('access-group','invoices')): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="#nav-invoices" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="nav-invoices">
                            <i class="ni ni-money-coins text-cyan"></i>
                            <span class="nav-link-text"><?php echo app('translator')->get('amenu.invoices'); ?></span>
                        </a>
                        <div class="collapse" id="nav-invoices">
                            <ul class="nav nav-sm flex-column">
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('access','view_invoices')): ?>
                                <li class="nav-item">
                                    <a href="<?php echo e(url('/admin/invoices')); ?>" class="nav-link"><?php echo app('translator')->get('site.view-invoices'); ?></a>
                                </li>
                                <?php endif; ?>

                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('access','create_invoice')): ?>
                                <li class="nav-item">
                                    <a href="<?php echo e(url('/admin/invoices/create')); ?>" class="nav-link"><?php echo app('translator')->get('site.create-invoice'); ?></a>
                                </li>
                                <?php endif; ?>



                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('access','view_invoice_categories')): ?>
                                <li class="nav-item">
                                    <a href="<?php echo e(route('admin.invoice-categories.index')); ?>" class="nav-link"><?php echo app('translator')->get('amenu.categories'); ?></a>
                                </li>
                                <?php endif; ?>

                            </ul>
                        </div>
                    </li>
                    <?php endif; ?>

                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('access-group','vacancies')): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="#nav-vacancies" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="nav-vacancies">
                            <i class="fa fa-clipboard text-red"></i>
                            <span class="nav-link-text"><?php echo app('translator')->get('amenu.vacancies'); ?></span>
                        </a>
                        <div class="collapse" id="nav-vacancies">
                            <ul class="nav nav-sm flex-column">
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('access','view_vacancies')): ?>
                                <li class="nav-item">
                                    <a href="<?php echo e(route('admin.vacancies.index')); ?>" class="nav-link"><?php echo app('translator')->get('site.view-vacancies'); ?></a>
                                </li>
                                <?php endif; ?>

                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('access','create_vacancy')): ?>
                                <li class="nav-item">
                                    <a href="<?php echo e(route('admin.vacancies.create')); ?>" class="nav-link"><?php echo app('translator')->get('site.create-vacancy'); ?></a>
                                </li>
                                <?php endif; ?>

                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('access','view_vacancy_categories')): ?>
                                <li class="nav-item">
                                    <a href="<?php echo e(route('admin.job-categories.index')); ?>" class="nav-link"><?php echo app('translator')->get('amenu.categories'); ?></a>
                                </li>
                                <?php endif; ?>

                            </ul>
                        </div>
                    </li>
                    <?php endif; ?>

                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('access-group','contracts')): ?>
                        <li class="nav-item">
                            <a class="nav-link" href="#nav-contracts" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="nav-contracts">
                                <i class="fa fa-handshake text-primary"></i>
                                <span class="nav-link-text"><?php echo app('translator')->get('site.contracts'); ?></span>
                            </a>
                            <div class="collapse" id="nav-contracts">
                                <ul class="nav nav-sm flex-column">
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('access','view_contracts')): ?>
                                        <li class="nav-item">
                                            <a href="<?php echo e(route('admin.contracts.index')); ?>" class="nav-link"><?php echo app('translator')->get('site.manage-contracts'); ?></a>
                                        </li>
                                    <?php endif; ?>

                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('access','manage_contract_templates')): ?>
                                        <li class="nav-item">
                                            <a href="<?php echo e(route('admin.contract-templates.index')); ?>" class="nav-link"><?php echo app('translator')->get('site.contract-templates'); ?></a>
                                        </li>
                                    <?php endif; ?>

                                </ul>
                            </div>
                        </li>
                    <?php endif; ?>


                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('access-group','tests')): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="#navbar-tests" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-tests">
                            <i class="fa fa-question-circle text-orange"></i>
                            <span class="nav-link-text"><?php echo app('translator')->get('site.tests'); ?></span>
                        </a>
                        <div class="collapse" id="navbar-tests">
                            <ul class="nav nav-sm flex-column">
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('access','create_test')): ?>
                                <li class="nav-item">
                                    <a href="<?php echo e(route('admin.tests.create')); ?>" class="nav-link"><?php echo app('translator')->get('site.create-test'); ?></a>
                                </li>
                                <?php endif; ?>

                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('access','view_tests')): ?>
                                <li class="nav-item">
                                    <a href="<?php echo e(route('admin.tests.index')); ?>" class="nav-link"><?php echo app('translator')->get('site.all-tests'); ?></a>
                                </li>
                                <?php endif; ?>

                            </ul>
                        </div>
                    </li>
                    <?php endif; ?>

                    <li class="nav-item">
                        <a class="nav-link" href="#navbar-components" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-components">
                            <i class="ni ni-email-83 text-info"></i>
                            <span class="nav-link-text"><?php echo app('translator')->get('site.messaging'); ?></span>
                        </a>
                        <div class="collapse" id="navbar-components">
                            <ul class="nav nav-sm flex-column">
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('access-group','emails')): ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="#nav-messaging" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="nav-messaging">

                                        <?php echo app('translator')->get('amenu.email'); ?>
                                    </a>
                                    <div class="collapse" id="nav-messaging">
                                        <ul class="nav nav-sm flex-column">
                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('access','create_email')): ?>
                                            <li class="nav-item">
                                                <a href="<?php echo e(route('admin.emails.create')); ?>" class="nav-link"><?php echo app('translator')->get('site.create-message'); ?></a>
                                            </li>
                                            <?php endif; ?>

                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('access','view_emails')): ?>
                                            <li class="nav-item">
                                                <a href="<?php echo e(route('admin.emails.index')); ?>" class="nav-link"><?php echo app('translator')->get('site.all-messages'); ?></a>
                                            </li>

                                            <li class="nav-item">
                                                <a href="<?php echo e(route('admin.emails.index')); ?>?sent=1" class="nav-link"><?php echo app('translator')->get('site.sent-messages'); ?></a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="<?php echo e(route('admin.emails.index')); ?>?sent=0" class="nav-link"><?php echo app('translator')->get('site.pending-messages'); ?></a>
                                            </li>
                                            <?php endif; ?>

                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('access','view_email_resources')): ?>
                                            <li class="nav-item">
                                                <a href="<?php echo e(route('admin.email-resources.index')); ?>" class="nav-link"><?php echo app('translator')->get('site.email-resources'); ?></a>
                                            </li>
                                            <?php endif; ?>

                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('access','view_email_templates')): ?>
                                            <li class="nav-item">
                                                <a href="<?php echo e(route('admin.email-templates.index')); ?>" class="nav-link"><?php echo app('translator')->get('site.email-templates'); ?></a>
                                            </li>
                                            <?php endif; ?>


                                        </ul>
                                    </div>
                                </li>
                                <?php endif; ?>

                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('access-group','text_messaging')): ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="#nav-sms" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="nav-sms">

                                        <?php echo app('translator')->get('site.text-messaging'); ?>
                                    </a>
                                    <div class="collapse" id="nav-sms">
                                        <ul class="nav nav-sm flex-column">
                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('access','create_text_message')): ?>
                                            <li class="nav-item">
                                                <a href="<?php echo e(route('admin.sms.create')); ?>" class="nav-link"><?php echo app('translator')->get('site.create-message'); ?></a>
                                            </li>
                                            <?php endif; ?>

                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('access','view_text_message')): ?>
                                            <li class="nav-item">
                                                <a href="<?php echo e(route('admin.sms.index')); ?>" class="nav-link"><?php echo app('translator')->get('site.all-messages'); ?></a>
                                            </li>

                                            <li class="nav-item">
                                                <a href="<?php echo e(route('admin.sms.index')); ?>?sent=1" class="nav-link"><?php echo app('translator')->get('site.sent-messages'); ?></a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="<?php echo e(route('admin.sms.index')); ?>?sent=0" class="nav-link"><?php echo app('translator')->get('site.pending-messages'); ?></a>
                                            </li>
                                            <?php endif; ?>

                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('access','view_sms_templates')): ?>
                                            <li class="nav-item">
                                                <a href="<?php echo e(route('admin.sms-templates.index')); ?>" class="nav-link"><?php echo app('translator')->get('site.sms-templates'); ?></a>
                                            </li>
                                            <?php endif; ?>



                                        </ul>
                                    </div>
                                </li>
                                <?php endif; ?>
                            </ul>
                        </div>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#navbar-content" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-content">
                            <i class="ni ni-books text-info"></i>
                            <span class="nav-link-text"><?php echo app('translator')->get('site.content'); ?></span>
                        </a>
                        <div class="collapse" id="navbar-content">
                            <ul class="nav nav-sm flex-column">

                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('access-group','articles')): ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="#nav-articles" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="nav-articles">
                                        <?php echo app('translator')->get('amenu.articles'); ?>
                                    </a>
                                    <div class="collapse" id="nav-articles">
                                        <ul class="nav nav-sm flex-column">
                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('access','view_articles')): ?>
                                            <li class="nav-item">
                                                <a href="<?php echo e(route('admin.articles.index')); ?>" class="nav-link"><?php echo app('translator')->get('site.manage-articles'); ?></a>
                                            </li>
                                            <?php endif; ?>
                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('access','create_article')): ?>
                                            <li class="nav-item">
                                                <a href="<?php echo e(route('admin.articles.create')); ?>" class="nav-link"><?php echo app('translator')->get('site.create-post'); ?></a>
                                            </li>
                                            <?php endif; ?>
                                        </ul>
                                    </div>
                                </li>
                                <?php endif; ?>

                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('access-group','blog')): ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="#nav-blog" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="nav-blog">
                                        <?php echo app('translator')->get('amenu.blog'); ?>
                                    </a>
                                    <div class="collapse" id="nav-blog">
                                        <ul class="nav nav-sm flex-column">
                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('access','view_blogs')): ?>
                                            <li class="nav-item">
                                                <a href="<?php echo e(route('admin.blog-posts.index')); ?>" class="nav-link"><?php echo app('translator')->get('site.manage-posts'); ?></a>
                                            </li>
                                            <?php endif; ?>

                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('access','create_blog')): ?>
                                            <li class="nav-item">
                                                <a href="<?php echo e(route('admin.blog-posts.create')); ?>" class="nav-link"><?php echo app('translator')->get('site.create-post'); ?></a>
                                            </li>
                                            <?php endif; ?>

                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('access','manage_blog_categories')): ?>
                                            <li class="nav-item">
                                                <a href="<?php echo e(route('admin.blog-categories.index')); ?>" class="nav-link"><?php echo app('translator')->get('site.manage-categories'); ?></a>
                                            </li>
                                            <?php endif; ?>

                                        </ul>
                                    </div>
                                </li>
                                <?php endif; ?>





                            </ul>
                        </div>
                    </li>






                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('access-group','settings')): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="#nav-settings" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="nav-settings">
                            <i class="ni ni-settings text-default"></i>
                            <span class="nav-link-text"><?php echo app('translator')->get('amenu.settings'); ?></span>
                        </a>
                        <div class="collapse" id="nav-settings">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="<?php echo e(route('admin.settings',['group'=>'general'])); ?>" class="nav-link"><?php echo app('translator')->get('amenu.general'); ?></a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo e(route('admin.payment-methods')); ?>" class="nav-link"><?php echo app('translator')->get('amenu.payment-methods'); ?></a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo e(route('admin.templates')); ?>" class="nav-link"><?php echo app('translator')->get('site.templates'); ?></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#nav-menus" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="nav-menus">

                                        <?php echo app('translator')->get('site.menus'); ?>
                                    </a>
                                    <div class="collapse" id="nav-menus">
                                        <ul class="nav nav-sm flex-column">
                                            <li class="nav-item">
                                                <a href="<?php echo e(route('admin.menus.header')); ?>" class="nav-link"><?php echo app('translator')->get('site.header-menu'); ?></a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="<?php echo e(route('admin.menus.footer')); ?>" class="nav-link"><?php echo app('translator')->get('site.footer-menu'); ?></a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo e(route('admin.sms-gateways')); ?>" class="nav-link"><?php echo app('translator')->get('site.sms-gateways'); ?></a>
                                </li>

                                <li class="nav-item">
                                    <a href="<?php echo e(route('admin.settings',['group'=>'captcha'])); ?>" class="nav-link"><?php echo app('translator')->get('site.setting-captcha'); ?></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#nav-forms" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="nav-forms">

                                         <?php echo app('translator')->get('amenu.forms'); ?>
                                    </a>
                                    <div class="collapse" id="nav-forms">
                                        <ul class="nav nav-sm flex-column">
                                            <li class="nav-item">
                                                <a href="<?php echo e(route('admin.order-forms.index')); ?>" class="nav-link"><?php echo app('translator')->get('site.order-forms'); ?></a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="<?php echo e(route('admin.employer-field-groups.index')); ?>" class="nav-link"><?php echo app('translator')->get('amenu.employer-profile'); ?></a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="<?php echo e(route('admin.candidate-field-groups.index')); ?>" class="nav-link"><?php echo app('translator')->get('amenu.candidate-profile'); ?></a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>

                                <li class="nav-item">
                                    <a href="<?php echo e(route('admin.language')); ?>" class="nav-link"><?php echo app('translator')->get('amenu.language'); ?></a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo e(route('admin.settings',['group'=>'order'])); ?>" class="nav-link"><?php echo app('translator')->get('amenu.order-settings'); ?></a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo e(route('admin.settings',['group'=>'mail'])); ?>" class="nav-link"><?php echo app('translator')->get('amenu.email-settings'); ?></a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo e(route('admin.settings',['group'=>'social'])); ?>" class="nav-link"><?php echo app('translator')->get('amenu.social-login'); ?></a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo e(route('admin.settings',['group'=>'image'])); ?>" class="nav-link"><?php echo app('translator')->get('amenu.logo-icon'); ?></a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo e(route('admin.admins.index')); ?>" class="nav-link"><?php echo app('translator')->get('amenu.administrators'); ?></a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo e(route('admin.users.index')); ?>" class="nav-link"><?php echo app('translator')->get('site.manage-users'); ?></a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo e(route('admin.roles.index')); ?>" class="nav-link"><?php echo app('translator')->get('site.roles'); ?></a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo e(route('admin.frontend')); ?>" class="nav-link"><?php echo app('translator')->get('site.disable-frontend'); ?></a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo e(route('admin.api-tokens.index')); ?>" class="nav-link"><?php echo app('translator')->get('site.api-tokens'); ?></a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <?php endif; ?>



                </ul>

            </div>
        </div>
    </div>
</nav>
<!-- Main content -->
<div class="main-content" id="panel">
    <!-- Topnav -->
    <nav class="navbar navbar-top navbar-expand navbar-dark bg-primary border-bottom">
        <div class="container-fluid">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Search form -->
                <?php if (! empty(trim($__env->yieldContent('search-form')))): ?>
                <form  method="GET" action="<?php echo $__env->yieldContent('search-form'); ?>"  class="navbar-search navbar-search-light form-inline mr-sm-3" id="navbar-search-main">
                   <?php echo $__env->yieldContent('search-form-extras'); ?>
                    <div class="form-group mb-0">
                        <div class="input-group input-group-alternative">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-search"></i></span>
                            </div>
                            <input value="<?php echo e(request('search')); ?>" name="search"  class="form-control" placeholder="<?php echo app('translator')->get('site.search'); ?>" type="text">
                        </div>
                    </div>
                    <button type="button" class="close" data-action="search-close" data-target="#navbar-search-main" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </form>
                <?php else: ?>
                        <strong class="text-white d-none d-sm-none d-md-block"><?php echo $__env->yieldContent('pageTitle',__('site.admin')); ?></strong>
                <?php endif; ?>
                <!-- Navbar links -->
                <ul class="navbar-nav align-items-center ml-md-auto">
                    <li class="nav-item d-xl-none">
                        <!-- Sidenav toggler -->
                        <div class="pr-3 sidenav-toggler sidenav-toggler-dark" data-action="sidenav-pin" data-target="#sidenav-main">
                            <div class="sidenav-toggler-inner">
                                <i class="sidenav-toggler-line"></i>
                                <i class="sidenav-toggler-line"></i>
                                <i class="sidenav-toggler-line"></i>
                            </div>
                        </div>
                    </li>
                    <?php if (! empty(trim($__env->yieldContent('search-form')))): ?>
                    <li class="nav-item d-sm-none">
                        <a class="nav-link" href="#" data-action="search-show" data-target="#navbar-search-main">
                            <i class="ni ni-zoom-split-in"></i>
                        </a>
                    </li>
                    <?php endif; ?>


                </ul>
                    <?php if(empty($__env->yieldContent('search-form'))): ?>
                    <strong class="text-white d-block d-sm-none"><?php echo $__env->yieldContent('pageTitle',__('site.admin')); ?></strong>
                    <?php endif; ?>
                <ul class="navbar-nav align-items-center ml-auto ml-md-0">
                    <li class="nav-item">

                    </li>

                    <li class="nav-item dropdown">

                        <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <div class="media align-items-center">
                  <span class="avatar avatar-sm rounded-circle">
                   <img   src="<?php echo e(asset('img/man.jpg')); ?>">
                  </span>
                                <div class="media-body ml-2 d-none d-lg-block">
                                    <span class="mb-0 text-sm  font-weight-bold"><?php echo e(\Illuminate\Support\Facades\Auth::user()->name); ?></span>
                                </div>
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <div class="dropdown-header noti-title">
                                <h6 class="text-overflow m-0"><?php echo app('translator')->get('site.welcome'); ?>!</h6>
                            </div>
                            <a href="<?php echo e(route('admin.profile')); ?>" class="dropdown-item">
                                <i class="ni ni-single-02"></i>
                                <span><?php echo app('translator')->get('site.my-profile'); ?></span>
                            </a>

                            <div class="dropdown-divider"></div>
                            <a  href="#"
                                onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" class="dropdown-item">
                                <i class="ni ni-user-run"></i>
                                <span><?php echo app('translator')->get('site.logout'); ?></span>
                                <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="int_hide">
                                    <?php echo csrf_field(); ?>
                                </form>
                            </a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Header -->
    <!-- Header -->
    <div class="header  bg-primary  pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="<?php if (! empty(trim($__env->yieldContent('top-buttons')))): ?> col-lg-8 <?php else: ?> col-lg-12 <?php endif; ?> col-7">
                        <h6 class="h2 text-white d-inline-block mb-0">

                            <?php if (! empty(trim($__env->yieldContent('page-title')))): ?>
                             <?php echo $__env->yieldContent('page-title'); ?>
                            <?php else: ?>
                                <?php if (! empty(trim($__env->yieldContent('search-form')))): ?>
                                    <?php echo $__env->yieldContent('pageTitle',__('site.admin')); ?>
                                <?php endif; ?>
                            <?php endif; ?>
                        </h6>
                        <?php if (! empty(trim($__env->yieldContent('breadcrumb')))): ?>
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard')); ?>"><i class="fas fa-home"></i></a></li>
                                <?php echo $__env->yieldContent('breadcrumb'); ?>
                            </ol>
                        </nav>
                        <?php endif; ?>

                    </div>
                    <?php if (! empty(trim($__env->yieldContent('top-buttons')))): ?>
                    <div class="col-lg-4 col-5 text-right">
                        <?php echo $__env->yieldContent('top-buttons'); ?>
                    </div>
                    <?php endif; ?>

                </div>
                <div class="row">
                    <div class="col-md-12">
                        <?php if(count($errors) > 0): ?>
                            <div class="int_pldpr50">
                                <div class="alert alert-danger">
                                    <ul>
                                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <li><?php echo e($error); ?></li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul>
                                </div>
                            </div>
                        <?php endif; ?>


                        <div class="flash-message int_pldpr50"  >
                            <?php $__currentLoopData = ['danger', 'warning', 'success', 'info']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $msg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if(Session::has('alert-' . $msg)): ?>

                                    <p class="alert alert-<?php echo e($msg); ?>"><?php echo e(Session::get('alert-' . $msg)); ?> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php if(Session::has('flash_message')): ?>

                                <p class="alert alert-success"><?php echo e(Session::get('flash_message')); ?> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
                            <?php endif; ?>
                        </div> <!-- end .flash-message -->
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--6">
       <?php echo $__env->yieldContent('content'); ?>

        <!-- Footer -->
        <footer class="footer pt-0">
            <div class="row align-items-center justify-content-lg-between">
                <div class="col-lg-6">
                    <div class="copyright text-center text-lg-rtight text-muted">
                        &copy; <?php echo e(date('Y')); ?> <?php echo e(config('app.name')); ?>

                    </div>
                </div>
                <div class="col-lg-6">

                </div>
            </div>
        </footer>
    </div>
</div>
<!-- Argon Scripts -->
<!-- Core -->
<script src="<?php echo e(asset('themes/argonpro/assets/vendor/jquery/dist/jquery.min.js')); ?>"></script>
<script src="<?php echo e(asset('themes/argonpro/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js')); ?>"></script>
<script src="<?php echo e(asset('themes/argonpro/assets/vendor/js-cookie/js.cookie.js')); ?>"></script>
<script src="<?php echo e(asset('themes/argonpro/assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js')); ?>"></script>
<script src="<?php echo e(asset('themes/argonpro/assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js')); ?>"></script>
<!-- Optional JS -->
<script src="<?php echo e(asset('themes/argonpro/assets/vendor/chart.js/dist/Chart.min.js')); ?>"></script>
<script src="<?php echo e(asset('themes/argonpro/assets/vendor/chart.js/dist/Chart.extension.js')); ?>"></script>
<script src="<?php echo e(asset('themes/argonpro/assets/vendor/jvectormap-next/jquery-jvectormap.min.js')); ?>"></script>
<script src="<?php echo e(asset('themes/argonpro/assets/js/vendor/jvectormap/jquery-jvectormap-world-mill.js')); ?>"></script>
<!-- Argon JS -->
<script src="<?php echo e(asset('themes/argonpro/assets/js/argon.js?v=1.1.0')); ?>"></script>
<!-- Demo JS - remove this in your project -->
<?php if(false): ?>
<script src="<?php echo e(asset('themes/argonpro/assets/js/demo.min.js')); ?>"></script>
<?php endif; ?>
<script src="<?php echo e(asset('js/lib.js')); ?>" type="text/javascript"></script>
<?php echo $__env->yieldContent('footer'); ?>
</body>

</html>
<?php /**PATH /home/re3aytk/public_html/resources/views/layouts/admin.blade.php ENDPATH**/ ?>