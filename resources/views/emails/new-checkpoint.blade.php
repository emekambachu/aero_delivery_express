<img src="{{ asset('aero_delivery_logo2.png') }}" width="120">

<h3>Hello {{ $name }}</h3>

<p>Your Parcel just arrived at {{ $country }}, {{ $location }}<br>
    <strong>Tracking ID:</strong> {{ $tracking_id }} <br><br>

    Track your shipment here <a href="{{ url('track-shipment') }}"><strong>here</strong></a>
</p><br><br>

<p align="center">
    For more info, contact <i>info@aerodeliveryexpress.com</i>
</p>
