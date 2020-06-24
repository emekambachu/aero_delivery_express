<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserDetails extends Model
{
    protected $fillable = [
        'sender_name',
        'sender_mobile',
        'sender_country',
        'sender_address',
        'receiver_name',
        'receiver_email',
        'receiver_mobile',
        'receiver_country',
        'receiver_address',
    ];
}
