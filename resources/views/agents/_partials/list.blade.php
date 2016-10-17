<div class="table-responsive">
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Code</th>
            <th>NIC</th>
            <th>Gender</th>
            <th>Phone</th>
            <th>Area</th>
            <th>Controls</th>
        </tr>
        </thead>
        <tbody>
        @if(!empty($agents))
            @foreach($agents as $agent)
                <tr>
                    <td>{!! $agent->id !!}</td>
                    <td>{!! $agent->name !!}</td>
                    <td>{!! $agent->agent_code !!}</td>
                    <td>{!! $agent->nic !!}</td>
                    <td>{!! $agent->gender == 1 ? 'M' : 'F' !!}</td>
                    <td>{!! $agent->phone !!}</td>
                    <td>{!! $agent->city->city !!}</td>
                    <td>
                        <div class="btn-group">
{{--                            {!! Form::open(['route'=>['agents.destroy', $agent->id], 'method'=>'delete']) !!}--}}
                            <a class="btn btn-sm btn-primary"
                               href="{!! route('agents.edit', $agent->id) !!}">
                                <span class="glyphicon glyphicon-edit"></span>
                            </a>
                            {{--<button class="btn btn-sm btn-danger" type="submit">--}}
                                {{--<span class="glyphicon glyphicon-trash delete"></span>--}}
                            {{--</button>--}}
                            {{--{!! Form::close() !!}--}}
                        </div>
                    </td>
                </tr>

            @endforeach
        @endif
        </tbody>
    </table>
</div>
@push('scripts')

@endpush
