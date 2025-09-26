<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class PreRegistrationController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function showForm()
    {
        return view('auth.pre_register');
    }

    public function store(Request $request)
    {
        $rules = [
            'email' => 'required|email|max:255|unique:users,email',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $email = $request->input('email');
        $token = Str::random(64);

        // upsert into pre_registrations
        $existing = DB::table('pre_registrations')->where('email', $email)->first();
        if ($existing) {
            DB::table('pre_registrations')->where('email', $email)->update([
                'token' => $token,
                'updated_at' => now(),
            ]);
        } else {
            DB::table('pre_registrations')->insert([
                'email' => $email,
                'token' => $token,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        // TODO: send confirmation email with token link

        return view('auth.pre_register_done', ['email' => $email]);
    }
}
