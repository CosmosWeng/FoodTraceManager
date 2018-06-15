@include('layouts.datatable')
<table class="table" id="opendatas-table" style="width:100%">
    <thead>
        <tr>
            <th>Action</th>
            <th>Categories</th>
            <th>Company</th>
            <th>Name</th>
            <th>Specifications</th>
            <th>Trace Code</th>
            <th>Warning Words</th>
            <th>Features</th>
            <th>Image Start At</th>
            <th>Photo Front</th>
            <th>Photo Back</th>
            <th>Photo Side</th>
            <th>Start At</th>
            <th>Amount</th>
            <th>Contains</th>
            <th>Calorie</th>
            <th>Protein</th>
            <th>Fat</th>
            <th>Fat Saturated</th>
            <th>Fat Trans</th>
            <th>Carbohydrates</th>
            <th>Sugar</th>
            <th>Sodium</th>
            <th>G100 Calorie</th>
            <th>G100 Protein</th>
            <th>G100 Fat</th>
            <th>G100 Fat Saturated</th>
            <th>G100 Fat Trans</th>
            <th>G100 Carbohydrates</th>
            <th>G100 Sugar</th>
            <th>G100 Sodium</th>
            <th>Ml100 Calorie</th>
            <th>Ml100 Protein</th>
            <th>Ml100 Fat</th>
            <th>Ml100 Fat Saturated</th>
            <th>Ml100 Fat Trans</th>
            <th>Ml100 Carbohydrates</th>
            <th>Ml100 Sugar</th>
            <th>Ml100 Sodium</th>
            <th>Dr Calorie</th>
            <th>Dr Protein</th>
            <th>Dr Fat</th>
            <th>Dr Fat Saturated</th>
            <th>Dr Fat Trans</th>
            <th>Dr Carbohydrates</th>
            <th>Dr Sugar</th>
            <th>Dr Sodium</th>
            <th>Nutrition Label Picture</th>
            <th>Content Label</th>
            <th>Content Label Picture</th>
            <th>Inspection Date</th>
            <th>Inspection Item</th>
            <th>Inspection Report 1</th>
            <th>Inspection Report 2</th>
            <th>Inspection Report 3</th>

        </tr>
    </thead>
    <tbody>
        @foreach($opendatas as $opendata)
        <tr>
            <td>
                {!! Form::open(['route' => ['admin.opendatas.destroy', $opendata->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('admin.opendatas.show', [$opendata->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('admin.opendatas.edit', [$opendata->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a> {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class'
                    => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}

            </td>
            <td>{!! $opendata->categories !!}</td>
            <td>{!! $opendata->company !!}</td>
            <td>{!! $opendata->name !!}</td>
            <td>{!! $opendata->specifications !!}</td>
            <td>{!! $opendata->trace_code !!}</td>
            <td>{!! $opendata->warning_words !!}</td>
            <td>{!! $opendata->features !!}</td>
            <td>{!! $opendata->image_start_at !!}</td>
            <td>{!! $opendata->photo_front !!}</td>
            <td>{!! $opendata->photo_back !!}</td>
            <td>{!! $opendata->photo_side !!}</td>
            <td>{!! $opendata->start_at !!}</td>
            <td>{!! $opendata->amount !!}</td>
            <td>{!! $opendata->contains !!}</td>
            <td>{!! $opendata->calorie !!}</td>
            <td>{!! $opendata->protein !!}</td>
            <td>{!! $opendata->fat !!}</td>
            <td>{!! $opendata->fat_saturated !!}</td>
            <td>{!! $opendata->fat_trans !!}</td>
            <td>{!! $opendata->carbohydrates !!}</td>
            <td>{!! $opendata->sugar !!}</td>
            <td>{!! $opendata->sodium !!}</td>
            <td>{!! $opendata->g100_calorie !!}</td>
            <td>{!! $opendata->g100_protein !!}</td>
            <td>{!! $opendata->g100_fat !!}</td>
            <td>{!! $opendata->g100_fat_saturated !!}</td>
            <td>{!! $opendata->g100_fat_trans !!}</td>
            <td>{!! $opendata->g100_carbohydrates !!}</td>
            <td>{!! $opendata->g100_sugar !!}</td>
            <td>{!! $opendata->g100_sodium !!}</td>
            <td>{!! $opendata->ml100_calorie !!}</td>
            <td>{!! $opendata->ml100_protein !!}</td>
            <td>{!! $opendata->ml100_fat !!}</td>
            <td>{!! $opendata->ml100_fat_saturated !!}</td>
            <td>{!! $opendata->ml100_fat_trans !!}</td>
            <td>{!! $opendata->ml100_carbohydrates !!}</td>
            <td>{!! $opendata->ml100_sugar !!}</td>
            <td>{!! $opendata->ml100_sodium !!}</td>
            <td>{!! $opendata->dr_calorie !!}</td>
            <td>{!! $opendata->dr_protein !!}</td>
            <td>{!! $opendata->dr_fat !!}</td>
            <td>{!! $opendata->dr_fat_saturated !!}</td>
            <td>{!! $opendata->dr_fat_trans !!}</td>
            <td>{!! $opendata->dr_carbohydrates !!}</td>
            <td>{!! $opendata->dr_sugar !!}</td>
            <td>{!! $opendata->dr_sodium !!}</td>
            <td>{!! $opendata->nutrition_label_picture !!}</td>
            <td>{!! $opendata->content_label !!}</td>
            <td>{!! $opendata->content_label_picture !!}</td>
            <td>{!! $opendata->inspection_date !!}</td>
            <td>{!! $opendata->inspection_item !!}</td>
            <td>{!! $opendata->inspection_report_1 !!}</td>
            <td>{!! $opendata->inspection_report_2 !!}</td>
            <td>{!! $opendata->inspection_report_3 !!}</td>
        </tr>
        @endforeach
    </tbody>
</table>
