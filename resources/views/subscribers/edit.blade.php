@extends('layout.master')

@section('styles')

@endsection

@section('title')
    Subscribers
@endsection

@section('sub-title')
    Edit
@endsection

@section('project-types')
    active
@endsection

@section('content')
    <div class="row">
        <div class="col-md-4">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Edit Subscriber</h3>
                </div>
                <div class="box-body">
                    {!! Form::model($subscriber, ['route'=> ['subscribers.update', $subscriber->id], 'method'=>'patch', 'files'=>'true']) !!}

                    @include('subscribers._partials.form')

                    <div class="form-group">
                        <div class="btn-group">
                            <button class="btn btn-primary" type="submit">Update</button>
                            <a class="btn btn-warning" href="{!! route('subscribers.index') !!}">Cancel</a>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Subscriber Type List</h3>
                </div>
                <div class="box-body">
                    @include('subscribers._partials.list')
                </div>
            </div>
        </div>
    </div>
@endsection




