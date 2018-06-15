<div class="form-group">
    @foreach ($images as  $image)
      {{ Html::image($image) }}
      {!! Form::file('images[]') !!}
    @endforeach
</div>
