<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Salon extends Model
{
    protected $fillable = [
        'name',
        'type',
        'address',
        'qr_code'
    ];

    public function services()
    {
        return $this->hasMany(Service::class);
    }
}


