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
        }
        .sclist li {
            line-height: 33px;
            border-bottom: 1px solid #ccc;
        }
        .slink i {
            font-size: 16px;
            margin-left: 12px;
        }
    </style>
    
    <div class="container" style="padding: 30px 0">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6">
                                <h2>All Attributes</h2>
                            </div>
                            <div class="col-md-6">
                                <a href="{{ route('admin.addattribute') }}" class="btn btn-success pull-right">Add Attribute</a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        @if (Session::has('message'))
                            <div class="alert alert-success">
                                {{ Session::get('message') }}
                            </div>
                        @endif
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Created At</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pattributes as $pattribute)
                                    <tr>
                                        <td>{{ $pattribute->id }}</td>
                                        <td>{{ $pattribute->name }}</td>
                                        <td>{{ $pattribute->created_at->format('Y-m-d H:i') }}</td>
                                        <td>
                                            <a href="{{ route('admin.editattribute', ['attribute_id' => $pattribute->id]) }}" aria-label="Edit">
                                                <i class="fa fa-edit fa-2x" title="Edit"></i>
                                            </a>
                                            <a href="#" onclick="confirm('Are you sure you want to delete this attribute?') && @this.deleteAttribute({{ $pattribute->id }})" aria-label="Delete">
                                                <i class="fa fa-times fa-2x text-danger" title="Delete" style="margin-left: 10px"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $pattributes->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    @section('title', 'Admin-Attributes')
    
</div>