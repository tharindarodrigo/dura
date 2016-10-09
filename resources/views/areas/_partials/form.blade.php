<div class="form-group {{$errors->first('city_id') ? 'has-error' : ''}}">
    <label for="year">City</label>
    {!! Form::select('city_id',App\City::orderby('city')->pluck('city','id'), null,['class'=>'form-control']) !!}
    <span class="help-block">{{$errors->first('city_id', ':message')}}</span>
</div>
<div class="form-group {{$errors->first('area') ? 'has-error' : ''}}">
    <label for="year">Area</label>
    {!! Form::text('area', null, ['class'=>'form-control']) !!}
    <span class="help-block">{{$errors->first('area', ':message')}}</span>
</div>


