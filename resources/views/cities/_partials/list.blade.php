<div class="table-responsive">
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>#</th>
            <th>City</th>
            <th>Controls</th>
        </tr>
        </thead>
        <tbody>
        @if(!empty($cities))
            @foreach($cities as $city)
                <tr>
                    <td>{!! $city->id !!}</td>
                    <td>{!! $city->city !!}</td>
                    <td>
                        <div class="btn-group">
                            {!! Form::open(['route'=>['cities.destroy', $city->id], 'method'=>'delete']) !!}
                            <a class="btn btn-sm btn-primary"
                               href="{!! route('cities.edit', $city->id) !!}">
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

