@extends('layout.master')

@push('styles')
{{--    <link rel="stylesheet" href="{!! asset('control-panel/plugins/datatables/jquery.dataTables.css') !!}">--}}
<link rel="stylesheet" href="{!! asset('control-panel/plugins/datatables/dataTables.bootstrap.css') !!}">


<style type="text/css">
    th {
        text-align: center;
    }

    td {
        text-align: center;
        vertical-align: bottom;
    }
</style>
@endpush

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
        {{--<div class="col-md-8">--}}
            {{--<div class="box box-primary">--}}
                {{--<div class="box-header with-border">--}}
                    {{--<h3 class="box-title">Agent List</h3>--}}
                {{--</div>--}}
                {{--<div class="box-body">--}}
                    {{--@include('agents._partials.list')--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    </div>
@endsection
@push('scripts')

<script src="{!! asset('control-panel/plugins/datatables/jquery.dataTables.js') !!}"></script>
<script src="{!! asset('control-panel/plugins/datatables/dataTables.bootstrap.min.js') !!}"></script>

<script>
    $(document).ready(function () {
        $('#myTable').dataTable();
    });
</script>

@endpush



