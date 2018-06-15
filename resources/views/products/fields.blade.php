<!-- Category Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('category_id', 'Category Id:') !!}
    {!! Form::select('category_id', $categories) !!}
</div>

<!-- Company Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('company', 'Company:') !!}
    {!! Form::textarea('company', null, ['class' => 'form-control']) !!}
</div>

<!-- Name Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::textarea('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Url Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('url', 'Url:') !!}
    {!! Form::textarea('url', null, ['class' => 'form-control']) !!}
</div>

<!-- Images Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('images', 'Images:') !!}
    {!! Form::bsImage('images[]',$product->images??[])!!}
</div>

<!-- Inspection Reports Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('inspection_reports', 'Inspection Reports:') !!}
    {!! Form::textarea('inspection_reports', null, ['class' => 'form-control']) !!}
</div>

<!-- Inspection Date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('inspection_date', 'Inspection Date:') !!}
    {!! Form::date('inspection_date', $product->inspection_date??'', ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('admin.products.index') !!}" class="btn btn-default">Cancel</a>
</div>
