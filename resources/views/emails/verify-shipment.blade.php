<img src="{{ asset('aero_delivery_logo2.png') }}" width="100">

<h3>Dear {{ $name }},</h3>

@if($is_active)
    <p>
        <strong>Your Shipment has been activated.</strong><br>
        <strong>Tracking ID:</strong> {{ $tracking_id }}
    </p>
    <p>go to our <a href="{{ url('track-shipment') }}"><strong>Track Shipment Page</strong></a> to track your parcel</p>
@else
    <p>
        <strong>Your Shipment has been deactivated.</strong><br>
    </p>
@endif

<p>contact <i>info@aerodeliveryexpress.com</i> for more info.</p>
