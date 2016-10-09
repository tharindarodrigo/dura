<div class="form-group {{$errors->first('name') ? 'has-error' : ''}}">
    <label for="year">Name</label>
    {!! Form::text('name', null,['class'=>'form-control']) !!}
    <span class="help-block">{{$errors->first('name', ':message')}}</span>
</div>
<div class="form-group {{$errors->first('gender') ? 'has-error' : ''}}">
    <label for="geneder">Gender</label>
    <div class="radio">
        <label>
            {!! Form::radio('gender', 1 , '1') !!}
            Male
        </label>
    </div>
    <div class="radio">
        <label>
            {!! Form::radio('gender', 0, '0') !!}
            Female
        </label>
    </div>
    <span class="help-block">{{$errors->first('gender', ':message')}}</span>
</div>
<div class="form-group {{$errors->first('nic') ? 'has-error' : ''}}">
    <label for="year">NIC</label>
    {!! Form::text('nic', null,['class'=>'form-control']) !!}
    <span class="help-block">{{$errors->first('nic', ':message')}}</span>
</div>
<div class="form-group {{$errors->first('phone') ? 'has-error' : ''}}">
    <label for="year">Phone</label>
    {!! Form::text('phone', null,['class'=>'form-control']) !!}
    <span class="help-block">{{$errors->first('phone', ':message')}}</span>
</div>
<div class="form-group {{$errors->first('city_id') ? 'has-error' : ''}}">
    <label for="year">City</label>
    {!! Form::select('city_id',[''=>''] + App\City::orderby('city')->pluck('city','id')->toArray(), null,['class'=>'form-control', 'id'=>'city']) !!}
    <span class="help-block">{{$errors->first('city_id', ':message')}}</span>
</div>
{{--<div class="form-group {{$errors->first('area') ? 'has-error' : ''}}">--}}
{{--<label for="year">Area</label>--}}
{{--{!! Form::select('area', [''=>''], null, ['class'=>'form-control', 'id'=>'areas']) !!}--}}
{{--<span class="help-block">{{$errors->first('area', ':message')}}</span>--}}
{{--</div>--}}


