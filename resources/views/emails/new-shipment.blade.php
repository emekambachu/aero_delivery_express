<img src="{{ asset('aero_delivery_logo2.png') }}" width="120">

<h3>Hello {{ $receiver_name }}</h3>

<p>Your Shipment has been initialized<br>
    Below is your tracking code<br>
    <strong>{{ $tracking_id }}</strong><br><br><br>

    <strong>Sender Name:</strong> {{ $sender_name }}<br>
    <strong>Sender Email:</strong> {{ $sender_email }}<br>
    <strong>Origin:</strong> {{ $sender_country }}<br>
    <strong>Destination:</strong> {{ $receiver_country }}<br>

    Use this code to track your shipment <a href="{{ url('track-shipment') }}"><strong>here</strong></a>
</p><br><br>

<p align="center">
    For more info, contact <i>info@aerodeliveryexpress.com</i>
</p>
