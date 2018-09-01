<li class="{{ Request::is('opendatas*') ? 'active' : '' }}">
  <a href="{!! route('admin.opendatas.index') !!}"><i class="fa fa-edit"></i><span>Opendatas</span></a>
</li>

<li class="{{ Request::is('categories*') ? 'active' : '' }}">
    <a href="{!! route('admin.categories.index') !!}"><i class="fa fa-edit"></i><span>Categories</span></a>
</li>
<li class="{{ Request::is('products*') ? 'active' : '' }}">
    <a href="{!! route('admin.products.index') !!}"><i class="fa fa-edit"></i><span>Products</span></a>
</li>

<li class="{{ Request::is('knowledge*') ? 'active' : '' }}">
    <a href="{!! route('knowledge.index') !!}"><i class="fa fa-edit"></i><span>Knowledge</span></a>
</li>

