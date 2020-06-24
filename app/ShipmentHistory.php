<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShipmentHistory extends Model
{
    protected $fillable = [

        'shipment_id',
        'country',
        'location',
        'description',
        'status',
        'is_active',

    ];

    public function shipment(){
        return $this->belongsTo(Shipment::class);
    }
}
