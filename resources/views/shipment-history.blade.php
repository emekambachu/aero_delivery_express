@extends('layouts.main')

@section('title')
    Shipment History
@endsection

@section('top-assets')
    <style>
        .shipment-header{
            background-color: #352D66;
            color: #FFFFFF;
            padding: 10px;
            border-radius: 7px;
        }
    </style>
@endsection

@section('contents')
    <div class="breadcrumb-area  margin-bottom-20" style="background-image:url({{ asset('assets/img/breadcrumb/01.png') }});">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-inner">
                        <h2 class="page-title">Shipment History</h2>
                        <ul class="page-list">
                            <li><a href="{{ url('/') }}">Home</a></li>
                            <li><a href="{{ url('track-shipment') }}">Track Shipment</a></li>
                            <li><a>Shipment History</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-sm-12 col-md-12 col-lg-12" style="padding-bottom: 50px;">

{{--        <table class="table table-dark">--}}
{{--            <tbody>--}}
{{--            <tr>--}}
{{--                <td><strong>Recipient Name:</strong> {{ $shipment->userDetail->receiver_name }} </td>--}}
{{--                <td><strong>Recipient Email:</strong> {{ $shipment->userDetail->receiver_email }}</td>--}}
{{--                <td><strong>Destination:</strong> {{ $shipment->userDetail->receiver_country }}</td>--}}
{{--            </tr>--}}
{{--            <tr>--}}
{{--                <td><strong>Sender Name:</strong> {{ $shipment->userDetail->sender_name }} </td>--}}
{{--                <td><strong>Sender Email:</strong> {{ $shipment->userDetail->sender_email }}</td>--}}
{{--                <td><strong>Sender Mobile:</strong> {{ $shipment->userDetail->sender_mobile }}</td>--}}
{{--            </tr>--}}
{{--            <tr>--}}
{{--                <td><strong>Tracking ID:</strong> {{ $shipment->tracking_id }}</td>--}}
{{--                <td><strong>Shipment Origin:</strong> {{ $shipment->userDetail->sender_country }}</td>--}}
{{--                <td><strong>Shipment Destination:</strong> {{ $shipment->destination }}</td>--}}
{{--            </tr>--}}
{{--            <tr>--}}
{{--                <td><strong>Shipment Date:</strong> {{date('jS \of F Y', strtotime($shipment->created_at))}}</td>--}}
{{--                <td><strong>Last Shipment Date:</strong>--}}
{{--                    @if(!empty($lastCheckpoint->created_at))--}}
{{--                        {{date('jS \of F Y', strtotime($lastCheckpoint->created_at))}}--}}
{{--                    @else--}}
{{--                        <i>Awaiting Shipment</i>--}}
{{--                    @endif--}}
{{--                </td>--}}
{{--                <td><strong>Last Location:</strong>--}}
{{--                    @if(!empty($lastCheckpoint->location))--}}
{{--                        {{$lastCheckpoint->location}}--}}
{{--                    @else--}}
{{--                        <i>Awaiting Shipment</i>--}}
{{--                    @endif--}}
{{--                </td>--}}
{{--            </tr>--}}
{{--            </tbody>--}}
{{--        </table>--}}

        <div class="row shipment-header">
            <div class="col-md-12"><h3 class="text-white text-center">Shipment Details</h3></div>
            <div class="col-md-4">
                <p class="text-white"><strong>Shipment ID:</strong> {{ $shipment->tracking_id }}</p>
                <p class="text-white"><strong>Origin:</strong> {{ $shipment->userDetail->sender_country }}</p>
                <p class="text-white"><strong>Destination:</strong> {{ $shipment->userDetail->receiver_country }}</p>
                <p class="text-white"><strong>Parcel Type:</strong> {{ $shipment->parcel }}</p>
                <p class="text-white"><strong>Parcel Weight:</strong> {{ $shipment->parcel_weight }}KG</p>
                <p class="text-white"><strong>Shipment Date:</strong> {{ $shipment->created_at }}</p>
            </div>

            <div class="col-md-4">
                <p class="text-white"><strong>Sender Information</strong></p>
                <p class="text-white"><strong>Name:</strong> {{ $shipment->userDetail->sender_name }}</p>
                <p class="text-white"><strong>Mobile:</strong> {{ $shipment->userDetail->sender_mobile }}</p>
                <p class="text-white"><strong>Address:</strong> {{ $shipment->userDetail->sender_address }}</p>
            </div>

            <div class="col-md-4">
                <p class="text-white"><strong>Receiver Information</strong></p>
                <p class="text-white"><strong>Name:</strong> {{ $shipment->userDetail->receiver_name }}</p>
                <p class="text-white"><strong>Mobile:</strong> {{ $shipment->userDetail->receiver_mobile }}</p>
                <p class="text-white"><strong>Address:</strong> {{ $shipment->userDetail->receiver_address }}</p>
            </div>
        </div>

        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Country</th>
                <th scope="col">Location</th>
                <th scope="col">Description</th>
                <th scope="col">Status</th>
                <th scope="col">Date</th>
            </tr>
            </thead>
            <tbody>

            @if($checkpoints)
                @foreach($checkpoints as $checkpoint)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $checkpoint->country }}</td>
                        <td>{{ $checkpoint->location }}</td>
                        <td>{{ $checkpoint->description }}</td>
                        <td>{{ $checkpoint->status }}</td>
                        <td>{{ $checkpoint->created_at }}</td>
                    </tr>
                @endforeach
            @else
                <p>Awaiting Shipment</p>
            @endif
            </tbody>
        </table>

    </div><!-- /.col-lg-8 -->
@endsection
