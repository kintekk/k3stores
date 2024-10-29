<div>
    <div class="container" style="padding: 30px 0;">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Settings
                    </div>
                    <div class="panel-body">
                        @if (Session::has('message'))
                            <div class="alert alert-success">{{ Session::get('message') }}</div>
                        @endif
                        <form class="form-horizontal" wire:submit.prevent="saveSettings">
                            @csrf
                            @php
                                $fields = [
                                    'email' => 'Email',
                                    'phone' => 'Phone',
                                    'phone2' => 'Phone 2',
                                    'address' => 'Address',
                                    'map' => 'Map',
                                    'twitter' => 'Twitter',
                                    'facebook' => 'Facebook',
                                    'pinterest' => 'Pinterest',
                                    'instagram' => 'Instagram',
                                    'youtube' => 'Youtube'
                                ];
                            @endphp
    
                            @foreach ($fields as $key => $label)
                                <div class="form-group">
                                    <label for="{{ $key }}" class="col-md-4 control-label">{{ $label }}</label>
                                    <div class="col-md-8">
                                        <input type="text" id="{{ $key }}" placeholder="{{ $label }}" class="form-control input-md" wire:model="{{ $key }}">
                                        @error($key)
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            @endforeach
    
                            <div class="form-group">
                                <div class="col-md-8 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    @section('title', 'Admin - Settings')
    
</div>
