@extends('layouts.app') @section('content')
<section class="content-header">
    <h1 class="pull-left">Opendatas</h1>
    <h1 class="pull-right">
        <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('admin.opendatas.create') !!}">Add New</a>
    </h1>
</section>
<div class="content">
    <div class="clearfix"></div>

    @include('flash::message')

    <div class="clearfix"></div>
    <div class="box box-primary">
        <div class="box-body">
            <div class="table-responsive">
                @include('opendatas.table')
            </div>
        </div>
    </div>
    <div class="text-center">

        @include('adminlte-templates::common.paginate', ['records' => $opendatas])

    </div>
</div>
@endsection @section('scripts')
<script type="text/javascript">
    $(document).ready(function() {
        $('.table').DataTable({
            responsive: true,
            searching: false,
            paging: false,
            info: false,
            dom: '<"search">t',
            columnDefs: [{
                className: 'control',
                orderable: false,
                targets: -1
            }]
        })

        // Search
        // Category
        $catefory = $('<input/>', {
            placeholder: 'Categories',
            name: 'categories',
            class: 'search_input'
        })
        $('.search').append($catefory)

        $(document).on('change', '.search_input', function() {
            var search = ''
            var searchFields = ''
            $this = $(this);
            $this.each(function() {
                $inputs = $(this)
                search += $this.attr('name') + ':' + $inputs.val() + ';'
                searchFields += $this.attr('name') + ':' + 'like'
            });
            params = {
                search: search,
                searchFields: searchFields
            }
            url = $.param(params)
            window.location.replace(window.location.pathname + '?' + url);
        });

    });
</script>
@endsection
