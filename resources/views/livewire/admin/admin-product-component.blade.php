<div>
    <div class="container" style="padding: 30px 0;">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6">
                                <h2>All Products</h2>
                            </div>
                            <div class="col-md-6">
                                <a href="{{ route('admin.addproduct') }}" class="btn btn-success pull-right">Add Product</a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        @if (Session::has('message'))
                            <div class="alert alert-success" role="alert">
                                {{ Session::get('message') }}
                            </div>
                        @endif
                        <div style="overflow-x:auto;">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Image</th>
                                        <th>Product Name</th>
                                        <th>Stock</th>
                                        <th>Price</th>
                                        <th>Sale Price</th>
                                        <th>Category</th>
                                        <th>Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($products as $product)
                                        <tr>
                                            <td>{{ $product->id }}</td>
                                            <td>
                                                <img src="{{ asset('storage/shop/' . $product->image) }}" alt="{{ $product->name }}" width="60" height="38">
                                            </td>
                                            <td>{{ $product->name }}</td>
                                            <td>{{ $product->stock_status }}</td>
                                            <td>{{ number_format($product->regular_price, 2) }}</td>
                                            <td>{{ number_format($product->sale_price, 2) }}</td>
                                            <td>{{ $product->category->name }}</td>
                                            <td>{{ $product->created_at->format('Y-m-d') }}</td>
                                            <td>
                                                <a href="{{ route('admin.editproduct', ['product_slug' => $product->slug]) }}" title="Edit">
                                                    <i class="fa fa-edit text-success"></i>
                                                </a>
                                                <a href="#" style="margin-left: 10px;" onclick="return confirm('Are you sure you want to delete this Product?') || event.stopImmediatePropagation();" wire:click.prevent="deleteProduct({{ $product->id }})" title="Delete">
                                                    <i class="fa fa-times fa-2x text-danger"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $products->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    @section('title', 'Admin - Products')
    
</div>
