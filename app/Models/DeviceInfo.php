<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeviceInfo extends Model
{
    use HasFactory;

    protected $fillable = [
        'visitor_id',
        'ip_address',
        'hostname',
        'device_type',
        'browser',
        'browser_version',
        'os',
        'os_version',
    ];


}
