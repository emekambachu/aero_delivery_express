<?php

namespace App\Http\Controllers;

use App\Shipment;
use App\ShipmentHistory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class ShipmentHistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    public function submitCheckpoint(Request $request, $id){

        $input = $request->all();

        $input['shipment_id'] = $id;

        $shipmentHistory = ShipmentHistory::create($input);

        $data = [
            'name' => $shipmentHistory->shipment->userDetail->receiver_name,
            'email' => $shipmentHistory->shipment->userDetail->receiver_email,
            'tracking_id' => $shipmentHistory->shipment->tracking_id,
            'location' => $shipmentHistory->location,
            'description' => $shipmentHistory->description,
            'status' => $shipmentHistory->status,
        ];

        Mail::send('emails.new-checkpoint', $data, static function ($message) use ($data) {
            $message->from('info@aerodeliveryexpress.com', 'Aero Delivery Express');
            $message->to($data['email'], $data['name']);
            $message->replyTo('Info@cargobaselogistics.com', 'Aero Delivery Express');
            $message->subject('Shipment checkpoint at '.$data['location']);
        });

        Session::flash('success', 'Checkpoint has been added');
        return redirect()->back();
    }

    public function shipmentCheckpoints($id)
    {
        $shipment = Shipment::find($id);
        $checkpoints = ShipmentHistory::where('shipment_id', $id)->orderBy('created_at', 'desc')->paginate();

        return view('controlpanel.shipments.shipment-checkpoints', compact('checkpoints', 'shipment'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ShipmentHistory  $shipmentHistory
     * @return \Illuminate\Http\Response
     */
    public function show(ShipmentHistory $shipmentHistory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ShipmentHistory  $shipmentHistory
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $checkpoint = ShipmentHistory::findOrFail($id);
        return view('controlpanel.shipments.edit-checkpoint', compact('checkpoint' ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ShipmentHistory  $shipmentHistory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //get ID
        $checkpoint = ShipmentHistory::findOrFail($id);

        $checkpoint->update($request->all());

        //session notification
        Session::flash('success', 'Updated');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ShipmentHistory  $shipmentHistory
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //find Category and delete
        ShipmentHistory::findOrFail($id)->delete();

        //flash notification
        Session::flash('warning', 'Deleted');

        return redirect()->back();
    }
}
