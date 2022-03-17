@extends($templateLayout)

@section('page-title',__('site.order-complete'))

@section('content')

@section('header')
    <style>
        .card {
            padding-top: 80px;
        }
    </style>
@endsection

<div class="card bd-0">
            <div class="card-header tx-medium bd-0 tx-white bg-orange">
                <i class="fa fa-info-circle"></i>  معلومات            </div><!-- card-header -->
            <div class="card-body bd bd-t-0">
         <p>
            @lang('site.order-complete-text')
        </p>

            </div><!-- card-body -->

        </div>
@endsection
