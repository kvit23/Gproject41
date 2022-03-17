@extends('layouts.admin-page')



@section('pageTitle',__('site.order-forms'))
@section('page-title',__('site.order-forms'))

@section('page-content')
    <div class="container-fluid">
        <div class="row">


            <div class="col-md-12">
                <div >
                    <div  >
                        <a href="{{ url('/admin/order-forms/create') }}" class="btn btn-success btn-sm" title="@lang('site.add-new')">
                            <i class="fa fa-plus" aria-hidden="true"></i> @lang('site.add-new')
                        </a>



                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th><th>@lang('site.name')</th><th>@lang('site.sections')</th><th>@lang('site.orders')</th><th>@lang('site.enabled')</th><th>@lang('site.actions')</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($orderforms as $item)
                                    <tr>
                                        <td>{{ $loop->iteration + ( (Request::get('page',1)-1) *$perPage) }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->orderFieldGroups()->count() }}</td>
                                        <td>{{ $item->orders()->count() }}</td><td>{{ boolToString($item->enabled) }}</td>
                                        <td>

                                            <a class="btn btn-sm btn-success" href="{{ route('admin.order-field-groups.index',['orderForm'=>$item->id]) }}"><i class="fa fa-boxes"></i> @lang('site.manage-sections')</a>

                                            <div class="btn-group dropup">
                                                <button type="button" class="btn btn-sm btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="ni ni-settings"></i> @lang('site.actions')
                                                </button>
                                                <div class="dropdown-menu">
                                                    <!-- Dropdown menu links -->

                                                    <a class="dropdown-item" href="{{ url('/admin/order-forms/' . $item->id) }}">@lang('site.view')</a>



                                                    <a class="dropdown-item" href="{{ url('/admin/order-forms/' . $item->id . '/edit') }}">@lang('site.edit')</a>



                                                    <a class="dropdown-item" href="#" onclick="$('#deleteForm{{ $item->id }}').submit()">@lang('site.delete')</a>




                                                </div>
                                            </div>

                                            <form  onsubmit="return confirm(&quot;@lang('site.confirm-delete')&quot;)"   id="deleteForm{{ $item->id }}"  method="POST" action="{{ url('/admin/order-forms' . '/' . $item->id) }}" accept-charset="UTF-8" class="int_inlinedisp">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! clean( $orderforms->appends(request()->input())->render() ) !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
