<div class="form-group {{$errors->first('name') ? 'has-error' : ''}}">
    <label for="year">Name</label>
    {!! Form::text('name', null,['class'=>'form-control']) !!}
    <span class="help-block">{{$errors->first('name', ':message')}}</span>
</div>

<div class="form-group {{$errors->first('phone') ? 'has-error' : ''}}">
    <label for="year">Phone</label>
    {!! Form::text('phone', null,['class'=>'form-control']) !!}
    <span class="help-block">{{$errors->first('phone', ':message')}}</span>
</div>

<div class="form-group {{$errors->first('pin') ? 'has-error' : ''}}">
    <label for="year">PIN</label>
    {!! Form::text('pin', null,['class'=>'form-control']) !!}
    <span class="help-block">{{$errors->first('pin', ':message')}}</span>
</div>



