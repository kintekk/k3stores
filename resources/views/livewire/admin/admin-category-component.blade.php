<div>
    <style>
        nav svg {
            height: 20px;
        }
        nav .hidden {
            display: block !important;
        }
        .sclist {
            list-style: none;
            padding: 0;
            margin: 0;
        }
        .sclist li {
            line-height: 33px;
            border-bottom: 1px solid #ccc;
            padding: 5px 0;
        }
        .slink i {
            font-size: 16px;
            margin-left: 12px;
        }
        .table img {
            max-width: 100px;
            height: auto;
        }
    </style>
    
    <div class="container" style="padding: 30px 0;">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6">
                                <h2>All Categories</h2>
                            </div>
                            <div class="col-md-6">
                                <a href="{{ route('admin.addcategory') }}" class="btn btn-success pull-right">Add Category</a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        @if (Session::has('message'))
                            <div class="alert alert-success">
                                {{ Session::get('message') }}
                            </div>
                        @endif
                        <div style="overflow-x:auto;">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Category Name</th>
                                        <th>Slug</th>
                                        <th>Subcategories</th>
                                        <th>Image</th>
                                        <th>Banner</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody wire:ignore>
                                    @foreach ($categories as $category)
                                        <tr>
                                            <td>{{ $category->id }}</td>
                                            <td>{{ $category->name }}</td>
                                            <td>{{ $category->slug }}</td>
                                            <td>
                                                <ul class="sclist">
                                                    @foreach ($category->subCategories as $scategory)
                                                        <li>
                                                            <i class="fa fa-caret-right"></i> {{ $scategory->name }}
                                                            <a href="{{ route('admin.editcategory', ['category_slug' => $category->slug, 'scategory_slug' => $scategory->slug]) }}" class="slink">
                                                                <i class="fa fa-edit"></i>
                                                            </a>
                                                            <a href="#" onclick="event.preventDefault(); if (confirm('Are you sure you want to delete this subcategory?')) { @this.call('deleteSubcategory', {{ $scategory->id }}); }" class="slink">
                                                                <i class="fa fa-times text-danger"></i>
                                                            </a>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </td>
                                            <td><img src="{{ asset('storage/categories/' . $category->image) }}" alt="Category Image"></td>
                                            <td><img src="{{ asset('storage/banners/' . $category->banner) }}" alt="Category Banner"></td>
                                            <td>
                                                <a href="{{ route('admin.editcategory', ['category_slug' => $category->slug]) }}">
                                                    <i class="fa fa-edit fa-2x" title="Edit"></i>
                                                </a>
                                                <a href="#" style="margin-left: 10px;" onclick="event.preventDefault(); if (confirm('Are you sure you want to delete this category?')) { @this.call('deleteCategory', {{ $category->id }}); }">
                                                    <i class="fa fa-times fa-2x text-danger" title="Delete"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $categories->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @section('title', 'Admin - Categories')
</div>
