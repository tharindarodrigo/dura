@extends('layout.master')

@section('styles')
    <style src="../../../../public/plugins/datatables/dataTables.bootstrap.css"></style>

    <style src="../../../../public/plugins/datatables/jquery.dataTables.css"></style>

    <style type="text/css">
        th {
            text-align: center;
        }

        td {
            text-align: center;
            vertical-align: bottom;
        }
    </style>
@endsection

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
                    {!! Form::open(['route'=> ['agents.store']]) !!}

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

@endpush






