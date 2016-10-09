<div class="table-responsive">
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>#</th>
            <th>Areas</th>
            <th>Controls</th>
        </tr>
        </thead>
        <tbody>
        @if(!empty($areas))
            @foreach($areas as $area)
                <tr>
                    <td>{!! $area->id !!}</td>
                    <td>{!! $area->city->city !!}</td>
                    <td>{!! $area->area !!}</td>
                    <td>
                        <div class="btn-group">
                            {!! Form::open(['route'=>['areas.destroy', $area->id], 'method'=>'delete']) !!}
                            <a class="btn btn-sm btn-primary"
                               href="{!! route('areas.edit', $area->id) !!}">
                                <span class="glyphicon glyphicon-edit"></span>
                            </a>
                            <button class="btn btn-sm btn-danger" type="submit">
                                <span class="glyphicon glyphicon-trash delete"></span>
                            </button>
                            {!! Form::close() !!}
                        </div>
                    </td>
                </tr>

            @endforeach
        @endif
        </tbody>
    </table>
</div>
@section('scripts')

@endsection

