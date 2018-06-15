@include('layouts.datatable')
<table class="table" id="products-table">
    <thead>
        <tr>
            <th>Action</th>
            <th>Category Id</th>
            <th>Company</th>
            <th>Name</th>
            <th>Url</th>
            <th>Images</th>
            {{-- <th>Inspection Reports</th>
            <th>Inspection Date</th> --}}
        </tr>
    </thead>
    <tbody>
        @foreach($products as $product)
        <tr>
            <td>
                {!! Form::open(['route' => ['admin.products.destroy', $product->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('admin.products.show', [$product->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('admin.products.edit', [$product->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a> {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' =>
                    'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
            <td>{!! $product->category_id !!}</td>
            <td>{!! $product->company !!}</td>
            <td>{!! $product->name !!}</td>
            <td>{!! $product->url !!}</td>
            <td>{!! $product->images !!}</td>
            {{-- <td>{!! $product->inspection_reports !!}</td>
            <td>{!! $product->inspection_date !!}</td> --}}

        </tr>
        @endforeach
    </tbody>
</table>
