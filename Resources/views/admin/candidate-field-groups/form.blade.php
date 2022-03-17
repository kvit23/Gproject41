<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    <label for="name" class="control-label">@lang('site.name')</label>
    <input class="form-control" name="name" type="text" id="name" value="{{ old('name',isset($candidatefieldgroup->name) ? $candidatefieldgroup->name : '') }}" >
    {!! clean( $errors->first('name', '<p class="help-block">:message</p>') ) !!}
</div>
<div class="form-group {{ $errors->has('sort_order') ? 'has-error' : ''}}">
    <label for="sort_order" class="control-label">@lang('site.sort-order')</label>
    <input class="form-control number" name="sort_order" type="text" id="sort_order" value="{{ old('sort_order',isset($candidatefieldgroup->sort_order) ? $candidatefieldgroup->sort_order : '') }}" >
    {!! clean( $errors->first('sort_order', '<p class="help-block">:message</p>') ) !!}
</div>

<div class="form-group {{ $errors->has('visible') ? 'has-error' : ''}}">
    <label for="visible" class="control-label">@lang('site.show-visible')</label>
    <select name="visible" class="form-control" id="visible" >
        @foreach (json_decode('{"0":"'.__('site.no').'","1":"'.__('site.yes').'"}', true) as $optionKey => $optionValue)
            <option value="{{ $optionKey }}" {{ ((null !== old('visible',@$candidatefieldgroup->visible)) && old('visible',@$candidatefieldgroup->visible) == $optionKey) ? 'selected' : ''}}>{{ $optionValue }}</option>
        @endforeach
    </select>
    {!! clean( $errors->first('visible', '<p class="help-block">:message</p>') ) !!}
</div>


<div class="form-group {{ $errors->has('public') ? 'has-error' : ''}}">
    <label for="public" class="control-label">@lang('site.show-public')</label>
    <select name="public" class="form-control" id="public" >
        @foreach (json_decode('{"0":"'.__('site.no').'","1":"'.__('site.yes').'"}', true) as $optionKey => $optionValue)
            <option value="{{ $optionKey }}" {{ ((null !== old('public',@$candidatefieldgroup->public)) && old('public',@$candidatefieldgroup->public) == $optionKey) ? 'selected' : ''}}>{{ $optionValue }}</option>
        @endforeach
    </select>
    {!! clean( $errors->first('public', '<p class="help-block">:message</p>') ) !!}
</div>


<div id="option-box" class="form-group {{ $errors->has('registration') ? 'has-error' : ''}}">
    <label for="registration" class="control-label">@lang('site.show-registration')</label>
    <select name="registration" class="form-control" id="registration" >
        @foreach (json_decode('{"0":"'.__('site.no').'","1":"'.__('site.yes').'"}', true) as $optionKey => $optionValue)
            <option value="{{ $optionKey }}" {{ ((null !== old('registration',@$candidatefieldgroup->registration)) && old('registration',@$candidatefieldgroup->registration) == $optionKey) ? 'selected' : ''}}>{{ $optionValue }}</option>
        @endforeach
    </select>
    {!! clean( $errors->first('registration', '<p class="help-block">:message</p>') ) !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? __('site.update') : __('site.create') }}">
</div>
