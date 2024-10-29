<div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="heading heading-default">
                    List of Subscribers
                </div>
                <div class="body">
                    @if (Session::has('message'))
                        <div class="alert alert-success">{{ Session::get('message') }}</div>
                    @endif
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Email</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($subscribers as $index => $subscriber)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $subscriber->email }}</td>
                                    <td>
                                        <a href="#" 
                                           onclick="event.preventDefault(); if (confirm('Are you sure you want to delete this Subscriber?')) { Livewire.emit('remove', {{ $subscriber->id }}); }" 
                                           class="text-danger">Remove</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    
    @section('title', 'Admin - Subscribers List')
    
</div>
