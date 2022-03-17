@extends('layouts.admin-page')

@section('pageTitle',__('site.create-new').' '.__('site.text-message'))
@section('page-title',__('site.create-new').' '.__('site.text-message'))

@section('page-content')
    <div class="container-fluid">
        <div class="row">


            <div class="col-md-12">
                <div  >
                    <div >
                        <a href="{{ url('/admin/sms') }}" title="@lang('site.back')"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> @lang('site.back')</button></a>
                        <br />
                        <br />


                        <form method="POST" action="{{ url('/admin/sms') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                            {{ csrf_field() }}

                            @include ('admin.sms.form', ['formMode' => 'create'])

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@include('admin.sms.form-include', ['formMode' => 'create'])