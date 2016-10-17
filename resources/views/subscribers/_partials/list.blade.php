<div class="table-responsive">
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Agent</th>
            <th>PIN</th>
            <th>Controls</th>
        </tr>
        </thead>
        <tbody>
        @if(!empty($subscribers))
            @foreach($subscribers as $subscriber)
                <tr>
                    <td>{!! $subscriber->id !!}</td>
                    <td>{!! $subscriber->name!!}</td>
                    <td>{!! $subscriber->agent->name!!}</td>
                    <td>{!! $subscriber->pin !!}</td>
                    <td>
                        <div class="btn-group">
                            {!! Form::open(['route'=>['subscribers.destroy', $subscriber->id], 'method'=>'delete']) !!}
                            <a class="btn btn-sm btn-primary"
                               href="{!! route('subscribers.edit', $subscriber->id) !!}">
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
@push('scripts')

@endpush
