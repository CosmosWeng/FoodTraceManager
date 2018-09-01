<table class="table table-responsive" id="knowledge-table">
    <thead>
        <tr>
            <th>Title</th>
        <th>Image</th>
        <th>Url</th>
        <th>Date</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($knowledge as $knowledge)
        <tr>
            <td>{!! $knowledge->title !!}</td>
            <td>{!! $knowledge->image !!}</td>
            <td>{!! $knowledge->url !!}</td>
            <td>{!! $knowledge->date !!}</td>
            <td>
                {!! Form::open(['route' => ['knowledge.destroy', $knowledge->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('knowledge.show', [$knowledge->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('knowledge.edit', [$knowledge->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>