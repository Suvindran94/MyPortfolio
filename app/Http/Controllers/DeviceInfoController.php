<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DeviceInfo;
use Illuminate\Support\Facades\Request as HttpRequest;

class DeviceInfoController extends Controller
{
    public function store(Request $request)
    {
        // Create a new DeviceInfo instance
        $deviceInfo = new DeviceInfo();

        // Assign values from request to the model attributes
        $deviceInfo->visitor_id = $request->input('visitor_id');
        $deviceInfo->device_type = $request->input('device_type');
        $deviceInfo->browser = $request->input('browser');
        $deviceInfo->browser_version = $request->input('browser_version');
        $deviceInfo->os = $request->input('os');
        $deviceInfo->os_version = $request->input('os_version');
        
        // Automatically capture IP address and hostname
        $deviceInfo->ip_address = $request->ip();
        $deviceInfo->hostname = gethostbyaddr($request->ip());

        // Save the model instance to the database
        $deviceInfo->save();

        // Return a JSON response with success message and data
        return response()->json(['message' => 'Device information'], 201);
    }
}
