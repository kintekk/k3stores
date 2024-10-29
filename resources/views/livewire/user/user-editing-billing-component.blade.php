<div>
    <div class="container" style="padding: 30px 0;">
        <div class="row">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h2>Shipping/Billing Address</h2>
                </div>
                <div class="panel-body">
                    @if (session()->has('message'))
                        <div class="alert alert-success">{{ session('message') }}</div>
                    @endif

                    <div class="panel-heading mb-4">
                        <span class="text-white bg-info p-2">Please update your shipping address</span>
                    </div>

                    <form wire:submit.prevent="editBilling">
                        <div class="row">
                            <div class="col-md-8">

                                <div class="form-group">
                                    <label for="firstname">Firstname:</label>
                                    <input type="text" id="firstname" class="form-control" wire:model="firstname" placeholder="Enter your firstname">
                                    @error('firstname')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="lastname">Lastname:</label>
                                    <input type="text" id="lastname" class="form-control" wire:model="lastname" placeholder="Enter your lastname">
                                    @error('lastname')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="phone">Phone:</label>
                                    <input type="text" id="phone" class="form-control" wire:model="phone" placeholder="Enter your phone number">
                                    @error('phone')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <hr>

                                <div class="form-group">
                                    <label for="line1">Address:</label>
                                    <input type="text" id="line1" class="form-control" wire:model="line1" placeholder="Enter your address line 1">
                                    @error('line1')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="city">City:</label>
                                    <input type="text" id="city" class="form-control" wire:model="city" placeholder="Enter your city">
                                    @error('city')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="province">State:</label>
                                    <select id="province" class="form-control" wire:model="province">
                                        <option value="">--Select a state--</option>
                                        @foreach(['Abia', 'Adamawa', 'Akwa Ibom', 'Anambra', 'Bauchi', 'Bayelsa', 'Benue', 'Borno', 'Cross River', 'Delta', 'Ebonyi', 'Edo', 'Ekiti', 'Enugu', 'Gombe', 'Imo', 'Jigawa', 'Kaduna', 'Kano', 'Katsina', 'Kebbi', 'Kogi', 'Kwara', 'Lagos', 'Nasarawa', 'Niger', 'Ogun', 'Ondo', 'Osun', 'Oyo', 'Plateau', 'Rivers', 'Sokoto', 'Taraba', 'Yobe', 'Abuja'] as $state)
                                            <option value="{{ $state }}">{{ $state }}</option>
                                        @endforeach
                                    </select>
                                    @error('province')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @section('title', 'User Billing Address Edit')
</div>
