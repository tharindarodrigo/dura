@extends('layout.master')

@section('styles')

@endsection

@section('title')
    Cities
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
                    <h3 class="box-title">Edit Project</h3>
                </div>
                <div class="box-body">
                    {!! Form::model($city, ['route'=> ['cities.update', $city->id], 'method'=>'patch', 'files'=>'true']) !!}

                    @include('cities._partials.form')

                    <div class="form-group">
                        <div class="btn-group">
                            <button class="btn btn-primary" type="submit">Update</button>
                            <a class="btn btn-warning" href="{!! route('cities.index') !!}">Cancel</a>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Project Type List</h3>
                </div>
                <div class="box-body">
                    @include('cities._partials.list')
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')

@endsection



