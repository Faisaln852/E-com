<ul class="list-group ">
    <a href="{{url('add_category')}}" class="list-group-item  {{Request::is('add_category') ? 'active':''}}">Add Category</a>
    <a href="{{url('categories')}}" class="list-group-item  {{Request::is('categories') ? 'active':''}}">Categories</a>
    <a href="{{url('add_product')}}" class="list-group-item  {{Request::is('add_product') ? 'active':''}}">Add Product</a>
    <a href="{{url('products')}}" class=" list-group-item  {{Request::is('products') ? 'active':''}}">Products</a>
</ul>