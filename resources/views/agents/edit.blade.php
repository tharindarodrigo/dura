@extends('layout.master')

@section('styles')

@endsection

@section('title')
    Agents
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
                    <h3 class="box-title">Edit Agent</h3>
                </div>
                <div class="box-body">
                    {!! Form::model($agent, ['route'=> ['agents.update', $agent->id], 'method'=>'patch', 'files'=>'true']) !!}

                    @include('agents._partials.form')

                    <div class="form-group">
                        <div class="btn-group">
                            <button class="btn btn-primary" type="submit">Update</button>
                            <a class="btn btn-warning" href="{!! route('agents.index') !!}">Cancel</a>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Agent List</h3>
                </div>
                <div class="box-body">
                    @include('agents._partials.list')
                </div>
            </div>
        </div>
    </div>
@endsection




