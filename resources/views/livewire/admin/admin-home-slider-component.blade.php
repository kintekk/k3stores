<div>
    <div class="container" style="padding: 30px 0;">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6">
                                <h3>All Slides</h3>
                            </div>
                            <div class="col-md-6 text-right">
                                <a href="{{ route('admin.addhomeslider') }}" class="btn btn-success">Add Slider</a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        @if (Session::has('message'))
                            <div class="alert alert-success">{{ Session::get('message') }}</div>
                        @endif
                        <div style="overflow-x:auto;">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Image</th>
                                        <th>Title</th>
                                        <th>Subtitle</th>
                                        <th>Price</th>
                                        <th>Link</th>
                                        <th>Status</th>
                                        <th>Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($sliders as $slider)
                                        <tr>
                                            <td>{{ $slider->id }}</td>
                                            <td><img src="{{ asset('storage/sliders/'.$slider->image) }}" alt="{{ $slider->title }}" width="120"></td>
                                            <td>{{ $slider->title }}</td>
                                            <td>{{ $slider->subtitle }}</td>
                                            <td>{{ $slider->price }}</td>
                                            <td>{{ $slider->link }}</td>
                                            <td>{{ $slider->status == 1 ? 'Active' : 'Inactive' }}</td>
                                            <td>{{ $slider->created_at->format('Y-m-d H:i') }}</td>
                                            <td>
                                                <a href="{{ route('admin.edithomeslider', ['slide_id' => $slider->id]) }}" class="text-info" title="Edit">
                                                    <i class="fa fa-edit fa-2x"></i>
                                                </a>
                                                <a href="#" onclick="confirm('Are you sure you want to delete this HomeSlider?') || event.stopImmediatePropagation()" wire:click.prevent="deleteSlider({{ $slider->id }})" class="text-danger" title="Delete">
                                                    <i class="fa fa-times fa-2x"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    @section('title', 'Admin - Sliders')
    
</div>
