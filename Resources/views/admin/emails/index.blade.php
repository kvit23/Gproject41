@extends('layouts.admin-page-wide')

@section('search-form',url('/admin/emails'))

@section('pageTitle',__('site.emails'))

@section('page-title')
    {{ __('site.emails') }}

    @if(!isset(request()->sent))
        : @lang('site.all-messages')
        @endif

    @if(request()->sent==1)
       : @lang('site.sent-messages')
        @elseif(request()->sent==0 && request()->sent != '')
        : @lang('site.pending-messages')
        @endif

    @if(Request::get('search'))
        : {{ Request::get('search') }}
    @endif

({{ $emails->count() }})
@endsection


@section('page-content')
    <div class="container-fluid">
        <div class="row">


            <div class="col-md-12">
                <div >
                    <div>
                        @if(!empty($filterParams))
                            <ul  class="list-inline">
                                <li class="list-inline-item" ><strong>@lang('site.filter'):</strong></li>
                                @foreach($filterParams as $param)
                                    @if(null !== request()->get($param)  && request()->get($param) != '')
                                        <li class="list-inline-item" >{{ ucwords(str_ireplace('_',' ',$param)) }}</li>
                                    @endif
                                @endforeach

                            </ul>
                        @endif
                    </div>
                    <div  >
                        @can('access','create_email')
                        <a href="{{ url('/admin/emails/create') }}" class="btn btn-success btn-sm" title="@lang('site.add-new')">
                            <i class="fa fa-plus" aria-hidden="true"></i> @lang('site.add-new')
                        </a>
                        @endcan

                        <a data-toggle="collapse" href="#filterCollapse" role="button" aria-expanded="false" aria-controls="filterCollapse" class="btn btn-primary btn-sm" title="@lang('site.filter')">
                            <i class="fa fa-filter" aria-hidden="true"></i> @lang('site.filter')
                        </a>

                        <a  href="{{ route('admin.emails.index') }}?sent={{ request()->sent }}" class="btn btn-info btn-sm" title="@lang('site.reset')">
                            <i class="fa fa-sync" aria-hidden="true"></i> @lang('site.reset')
                        </a>

                        <div class="collapse int_margintb20p" id="filterCollapse" >
                            <div  >
                                <form action="{{ route('admin.emails.index') }}" method="get">

                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="search" class="control-label">@lang('site.search')</label>
                                                <input class="form-control" type="text" value="{{ request()->search  }}" name="search"/>
                                            </div>
                                        </div>


                                        <div class="form-group  col-md-2{{ $errors->has('sent') ? 'has-error' : ''}}">
                                            <label for="sent" class="control-label">@lang('site.status')</label>
                                            <select name="sent" class="form-control" id="sent" >
                                                <option></option>
                                                @foreach (json_decode('{"1":"'.__('site.sent').'","0":"'.__('site.unsent').'"}', true) as $optionKey => $optionValue)
                                                    <option value="{{ $optionKey }}" {{ ((null !== old('sent',@request()->sent)) && old('sent',@request()->sent) == $optionKey) ? 'selected' : ''}}>{{ $optionValue }}</option>
                                                @endforeach
                                            </select>
                                            {!! clean( $errors->first('sent', '<p class="help-block">:message</p>') ) !!}
                                        </div>


                                        <div class="col-md-2">

                                            <div class="form-group">
                                                <label for="min_date" class="control-label">@lang('site.min-date')</label>
                                                <input class="form-control date" type="text" value="{{ request()->min_date  }}" name="min_date"/>
                                            </div>

                                        </div>
                                        <div class="col-md-2">

                                            <div class="form-group">
                                                <label for="max_date" class="control-label">@lang('site.max-date')</label>
                                                <input class="form-control date" type="text" value="{{ request()->max_date  }}" name="max_date"/>
                                            </div>

                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group {{ $errors->has('user') ? 'has-error' : ''}}">
                                                <label for="user" class="control-label">@lang('site.user')</label>
                                                <div>
                                                    <select   name="user" id="user" class="form-control">
                                                        <?php
                                                        $userId = request()->user;
                                                        ?>
                                                        @if($userId)
                                                            <option selected value="{{ $userId }}">{{ \App\User::find($userId)->name }} &lt;{{ \App\User::find($userId)->email }}&gt; </option>
                                                        @endif
                                                    </select>
                                                </div>


                                                {!! clean( $errors->first('user', '<p class="help-block">:message</p>') ) !!}
                                            </div>
                                        </div>




                                    </div>

                                    <div>
                                        <button type="submit" class="btn btn-primary btn-block">@lang('site.filter')</button>
                                    </div>

                                </form>
                            </div>
                        </div>
                        <form id="msg-list" action="{{ route('admin.email.delete-multiple') }}" method="post">
                            @csrf
                        <div class="btn-toolbar float-right" role="toolbar" aria-label="Toolbar with button groups">

                            <div class="btn-group mr-2" role="group" aria-label="First group">
                                <button type="button"  onclick="document.location.replace('{{ selfURL() }}')" class="btn btn-primary btn-sm"><i class="fa fa-refresh"></i> @lang('site.refresh')</button>
                               @can('access','delete_email')
                                <button onclick="return confirm('@lang('site.delete-prompt')')" title="@lang('site.delete')" type="submit" class="btn btn-default btn-sm"><i class="fa fa-trash"></i></button>
                                <button  type="button" class="check btn btn-success btn-sm"><i class="fa fa-check"></i></button>
                                @endcan

                            </div>
                            <div class="btn-group mr-2" role="group" aria-label="Second group">
                                @if($emails->previousPageUrl() != null)
                                    <a href="{{ $emails->previousPageUrl() }}" class="btn btn-default btn-sm"><i class="fa fa-arrow-left"></i></a>
                                @endif

                                @if($emails->nextPageUrl() != null)
                                    <a  href="{{ $emails->nextPageUrl() }}" class="btn btn-default btn-sm"><i class="fa fa-arrow-right"></i></a>
                                @endif

                            </div>
                        </div>


                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>@lang('site.recipient')</th>
                                        <th>@lang('site.subject')</th>
                                        <th>@lang('site.send-date')</th>
                                        <th>@lang('site.sent')</th>
                                        <th>@lang('site.actions')</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($emails as $item)
                                    <tr>
                                        <td>
                                            <div class="checkbox">
                                                <input name="{{ $item->id }}" value="{{ $item->id }}" type="checkbox" class="int_ml0">
                                                <label></label>
                                            </div>
                                        </td>
                                        <td>{{ $item->user->name }} ({{ roleName($item->user->role_id) }})</td>
                                        <td>{{ $item->subject }}
                                        @if($item->emailAttachments()->exists() || $item->invoices()->exists() || $item->emailResources()->exists() || $item->candidates()->exists() )
                                             &nbsp;   <i class="fa fa-paperclip"></i>
                                        @endif
                                        </td>
                                        <td>{{ \Illuminate\Support\Carbon::parse($item->send_date)->format('d/M/Y') }}</td>
                                        <td>
                                            {{ boolToString($item->sent) }}
                                        </td>
                                        <td>

                                            <div class="btn-group dropup">
                                                <button type="button" class="btn btn-sm btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="ni ni-settings"></i> @lang('site.actions')
                                                </button>
                                                <div class="dropdown-menu">
                                                    <!-- Dropdown menu links -->

                                                    @can('access','view_email')
                                                    <a class="dropdown-item" href="{{ url('/admin/emails/' . $item->id) }}">@lang('site.view')</a>
                                                    @endcan

                                                    @can('access','edit_email')
                                                    @if($item->sent==0)
                                                    <a class="dropdown-item" href="{{ url('/admin/emails/' . $item->id . '/edit') }}">@lang('site.edit')</a>
                                                    @endif
                                                    @endcan

                                                    @can('access','delete_email')
                                                    <a class="dropdown-item" href="{{ route('admin.email.delete',['id'=>$item->id]) }}" onclick="return confirm(&quot;@lang('site.confirm-delete')&quot;)"   >@lang('site.delete')</a>
                                                    @endcan

                                                    @can('access','create_email')
                                                    @if($item->sent==0)
                                                    <a onclick="return confirm('@lang('site.send-confirm')')" class="dropdown-item" href="{{ route('admin.emails.send-now',['email'=>$item->id]) }}">@lang('site.send-now')</a>
                                                   @endif
                                                    @endcan

                                                </div>
                                            </div>


                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! clean( $emails->appends(request()->input())->render() ) !!} </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer')
    <script src="{{ asset('vendor/pickadate/picker.js') }}" type="text/javascript"></script>
    <script src="{{ asset('vendor/pickadate/picker.date.js') }}" type="text/javascript"></script>
    <script src="{{ asset('vendor/pickadate/picker.time.js') }}" type="text/javascript"></script>
    <script src="{{ asset('vendor/pickadate/legacy.js') }}" type="text/javascript"></script>
    <script src="{{ asset('vendor/select2/js/select2.min.js') }}"></script>
    <script src="{{ asset('js/order-search.js') }}"></script>

    <script  type="text/javascript">
    "use strict";

        $('#user').select2({
            placeholder: "@lang('site.search-users')...",
            minimumInputLength: 3,
            ajax: {
                url: '{{ route('admin.users.search') }}',
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

    <script src="{{ asset('js/email.js') }}" type="text/javascript" ></script>

@endsection


@section('header')
    @parent
    <link href="{{ asset('vendor/pickadate/themes/default.date.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/pickadate/themes/default.time.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/pickadate/themes/default.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('vendor/select2/css/select2.min.css') }}">


@endsection
