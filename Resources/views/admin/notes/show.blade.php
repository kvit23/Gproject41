@extends('layouts.admin-page')

@section('pageTitle',__('site.note').': '.$note->title)
@section('page-title',__('site.note').': '.$note->title)

@section('page-content')
    <div class="container-fluid">
        <div class="row">


            <div class="col-md-12">
                <div  >
                    <div  >

                        <a href="{{ route('admin.notes.index',['user'=>$note->user_id]) }}"  ><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> @lang('site.back')</button></a>
                        <a href="{{ url('/admin/notes/' . $note->id . '/edit') }}"  ><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> @lang('site.edit')</button></a>

                        <form method="POST" action="{{ url('admin/notes' . '/' . $note->id) }}" accept-charset="UTF-8" class="int_inlinedisp">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="@lang('site.delete')" onclick="return confirm(&quot;@lang('site.confirm-delete')?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> @lang('site.delete')</button>
                        </form>
                        <br/>
                        <br/>


                        <ul class="list-group">
                            <li class="list-group-item active">@lang('site.id')</li>
                            <li class="list-group-item">{{ $note->id }}</li>
                            <li class="list-group-item active">@lang('site.title')</li>
                            <li class="list-group-item">{{ $note->title }}</li>
                            <li class="list-group-item active">@lang('site.content')</li>
                            <li class="list-group-item">{!! clean( check($note->content) ) !!}</li>

                        </ul>



                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
