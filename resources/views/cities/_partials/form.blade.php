<div class="form-group {{$errors->first('city') ? 'has-error' : ''}}">
    <label for="year">City</label>
    {!! Form::text('city', null, ['class'=>'form-control']) !!}
    <span class="help-block">{{$errors->first('city', ':message')}}</span>
</div>

