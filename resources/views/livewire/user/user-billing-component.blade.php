<div>
    <div class="tab-pane" id="account-addresses">
        <div class="icon-box icon-box-side icon-box-light">
            <span class="icon-box-icon icon-map-marker">
                <i class="w-icon-map-marker"></i>
            </span>
            <div class="icon-box-content">
                <h4 class="icon-box-title mb-0 ls-normal">Addresses</h4>
            </div>
        </div>
        <p>The following addresses will be used on the checkout page
            by default.</p>
          
        <div class="row">
            <div class="col-sm-6 mb-6">
                <div class="ecommerce-address billing-address pr-lg-8">
                    <h4 class="title title-underline ls-25 font-weight-bold">Billing Address</h4>
                    <address class="mb-4">
                        @if (empty($billing))
                        <div class="container">
                           <h3 class="text-info"> You have not added any address yet</h3> click <a href="">here</a> to add
                        </div>
                        @else
                        <table class="address-table">
                        
                            <tbody>
                             <tr>
                                 <th>Name:</th>
                                 <td>{{ $billing->firstname ?? '' }} {{ $billing->lastname ?? '' }}</td>
                             </tr>
                             <tr>
                                <th>Email:</th>
                                <td>{{ $billing->email ?? '' }}</td>
                             </tr>
                             <tr>
                                 <th>Line1:</th>
                                 <td>{{ $billing->line1 ?? '' }}</td>
                             </tr>
                             <tr>
                                 <th>state:</th>
                                 <td>{{ $billing->province ?? '' }}</td>
                             </tr>
                             <tr>
                                 <th>City:</th>
                                 <td>{{ $billing->city ?? ''}}</td>
                             </tr>
                             <tr>
                                 <th>Country:</th>
                                 <td>{{ $billing->country ?? '' }}</td>
                             </tr>
                             <tr>
                                 <th>Phone:</th>
                                 <td>{{ $billing->mobile ?? '' }}</td>
                             </tr>
                         </tbody>
                        
                      </table>
                  </address>
                  <a href="{{ route('user.editbilling') }}"
                      class="btn-underline btn-icon-right text-primary">Edit
                      your billing address<i class="w-icon-long-arrow-right"></i></a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
