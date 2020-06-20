@extends('layouts.controlpanel')

@section('title')
    Insert Checkpoint
@endsection


@section('contents')
    <div class="row">
        <div class="col-sm-6 text-left p-5">

            @include('includes.alerts')

            <h3>Insert checkpoint</h3>
            <p><strong>Shipment Details:</strong></p>
            <p>
                <strong>Tracking ID:</strong> {{ $shipment->tracking_id }}<br>
                <strong>Origin:</strong> {{ $shipment->userDetail ? $shipment->userDetail->sender_country : 'Not Assigned' }}<br>
                <strong>Destination:</strong> {{ $shipment->userDetail ? $shipment->userDetail->receiver_country : 'Not Assigned' }}<br>
                <strong>Sender:</strong> {{ $shipment->userDetail ? $shipment->userDetail->sender_name : 'Not Assigned' }}<br>
                <strong>Receiver:</strong> {{ $shipment->userDetail ? $shipment->userDetail->receiver_name : 'Not Assigned' }}<br>
            </p>

            <form method="post" action="{{ action('ShipmentHistoryController@submitCheckpoint', $shipment->id) }}">
                @csrf
                <div class="form-group">
                    <label>Current Location</label>
                    <input name="location" class="form-control" type="text" placeholder="Current Location" required>
                </div>

                <div class="form-group">
                    <label>Status</label>
                    <select class="form-control" name="status" required>
                        <option>Pending</option>
                        <option>On Hold</option>
                        <option>Ceased</option>
                        <option>Clarification</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Description</label>
                    <textarea class="form-control" name="description" placeholder="Status of Shipment in this location" required>
                    </textarea>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>

        </div>

    </div>
@endsection
