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
                    <h3 class="box-title">Create Agent</h3>
                </div>
                <div class="box-body">

                    <div class="row">
                        <div class="col-lg-12">
                            {!! Form::open(['route'=> ['agents.search'], 'method'=>'post']) !!}
                            @include('agents._partials.form')
                            <div class="form-group">
                                <div class="btn-group">
                                    <button class="btn btn-primary" type="submit">Save</button>
                                </div>
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-md-12">
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

@push('scripts')
<script type="text/javascript">
    //    $(document).ready(function () {
    //        $('#city').change(function () {
    //
    //            var city = $(this).val();
    //
    //            $.ajax({
    //                method: 'GET',
    //                url: 'http://' + window.location.host + '/cities/' + city + '/get-area-list',
    //                cache: false,
    //                dataType: 'json',
    //                success: function (data) {
    //                    var options = '<option></option>';
    //                    $.each(data, function (id, item) {
    //                        options += '<option value="' + id + '">' + item + '</option>'
    //                    });
    //
    //                    $('#areas').html(options);
    //                },
    //                error: function () {
    //                    alert('error');
    //                }
    //            });
    //        });
    //    });


</script>

<script src="{!! asset('control-panel/plugins/datatables/jquery.dataTables.js') !!}"></script>
<script src="{!! asset('control-panel/plugins/datatables/dataTables.bootstrap.min.js') !!}"></script>

<script>
    $(document).ready(function () {
        $('#myTable').dataTable({
            pagination: false
        });
    });
</script>

@endpush
