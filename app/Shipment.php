<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shipment extends Model
{
    protected $fillable = [

        'parcel',
        'user_details_id',
        'tracking_id',
        'origin',
        'destination',
        'is_active',

    ];

    public function userDetails(){
        return $this->belongsTo(UserDetails::class);
    }

    public function shipmentHistories(){
        return $this->hasMany(ShipmentHistory::class);
    }
}
