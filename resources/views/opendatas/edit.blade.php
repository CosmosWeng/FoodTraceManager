@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Opendata
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($opendata, ['route' => ['admin.opendatas.update', $opendata->id], 'method' => 'patch']) !!}

                        @include('opendatas.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection