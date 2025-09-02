<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Email;

class AuthenticationController extends Controller
{
public function auth(Request $request)
{
        $email = $request->input('email');
        $rumahSakit = \App\Models\RumahSakit::where('email', $email)->first();
        // $email = 'r@gmail.com';
        // $rumahSakit = \App\Models\RumahSakit::where('email', $email)->first();

        if (!$rumahSakit) {
            return response()->json([
                'success' => false,
                'message' => 'Email tidak ditemukan'
            ], 422);
        }

        Auth::login($rumahSakit); // ✅ ini valid karena $rumahSakit extend Authenticatable
        $request->session()->regenerate();
        return redirect('/rumah-sakit');

}


}
