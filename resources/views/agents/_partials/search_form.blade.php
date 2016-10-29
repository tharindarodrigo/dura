<div class="row">
    <div class="col-sm-offset-1 col-sm-4">
        <div class="form-group">
            {!! Form::input('date','from',!empty($from)? $from: null, ['class'=>'form-control']) !!}
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group">
            {!! Form::input('date','to',!empty($to)? $to: null, ['class'=>'form-control']) !!}
        </div>
    </div>
    <div class="col-md-2">
        <button class="btn btn-block btn-primary" type="submit">Search</button>
    </div>
</div>
