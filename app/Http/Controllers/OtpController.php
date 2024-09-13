<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Carbon;
use App\Models\Otp;

class OtpController extends Controller
{
    public function generateOtp(Request $request)
    {
       $validator = Validator::make($request->all(),[
           'phone'=>'required|string|max:15'
       ]);

       if ($validator->fails()) {
        return response()->json([
            'error'=>$validator->errors(),
        ],422);
       }

       $phone = $request->input('phone');
       $otpCode = random_int(100000, 999999);
       $expiresAt = Carbon::now()->addMinutes(5);

       Otp::updateOrCreate(
        ['phone'=>$phone],
        [
            'otp'=>$otpCode,
            'expires_at'=>$expiresAt,
        ]
       );
       return response()->json([
        'success'=>'true',
        'message'=>'generated successfully',
        'otp'=>$otpCode,
       ]);

    }

    public function verifyOtp(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'phone' => 'required|string|max:15',
            'otp' => 'required|string|max:6',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 422);
        }

        $phone = $request->input('phone');
        $otpCode = $request->input('otp');

        $otpRecord = Otp::where('phone',$phone)->where('otp',$otpCode)->first();

        if (!$otpRecord) {
           return response()->json([
            'success'=>'false',
            'message'=>'error with phone or otp'
           ],400);
        }

        if ($otpRecord->isExpired()) {
            return response()->json([
                'success'=>'false',
                'message'=>'otp is expired'
            ],400);
        }
        return response()->json([
            'success'=>'true',
            'message'=>'otp successfully verified',
        ]);
    }
}
