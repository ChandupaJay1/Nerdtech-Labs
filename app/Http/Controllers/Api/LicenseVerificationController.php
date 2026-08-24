<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\License;
use Illuminate\Http\Request;

class LicenseVerificationController extends Controller
{
    public function verify(Request $request)
    {
        $request->validate([
            'license_key' => 'required|string',
        ]);

        $license = License::where('license_key', $request->license_key)->first();

        if (!$license || !$license->is_active || ($license->expires_at && $license->expires_at->isPast())) {
            return response()->json([
                'status' => 'error',
                'valid' => false,
                'message' => 'License expired or invalid.'
            ]);
        }

        return response()->json([
            'status' => 'success',
            'valid' => true,
            'message' => 'License is valid.'
        ]);
    }
}
