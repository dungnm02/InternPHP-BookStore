<?php

namespace App\Http\Controllers;

use App\Jobs\SendRequestResetPasswordEmail;
use App\Models\User;
use App\Rules\Password;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    /**
     * Handle register request
     * @param Request $request
     */
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => ['required', 'email', 'unique:users'],
            'password' => ['required', 'min:8', 'confirmed', new Password],
            'name' => ['required'],
            'dob' => ['required', 'date']
        ]);

        if ($validator->fails()) {
            return redirect('/auth/register')->withErrors(['message' => 'Wrong input format']);
        }

        $user = User::query()->create([
            'email' => $request->get('email'),
            'password' => Hash::make($request->get('password')),
            'name' => $request->get('name'),
            'dob' => $request->get('dob')
        ]); // Create user

        if ($user) {
            return redirect('/auth/login');
        } // Return token if user created successfully

        return redirect('/auth/register')->withErrors(['message' => 'Error occurred']);
    }

    /**
     * Handle login request
     * @param Request $request
     */
    public function login(Request $request)
    {
        if (Auth::attempt($request->only('email', 'password'))) {
            return redirect('/');
        }

        return redirect('/auth/login')->withErrors(['message' => 'Wrong email or password']);
    }

    /**
     * Handle logout request
     * @param Request $request
     */
    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        return redirect('/auth/login');
    }

    /**
     * Handle request reset password
     * @param Request $request
     * @return RedirectResponse
     */
    public function requestResetPassword(Request $request)
    {
        $request->validate([
            'email' => 'email|required'
        ]);

        $user = DB::table('users')->where('email', $request->email)->first(); // Check if user exists
        if ($user) {
            $request->session()->put('email', $user->email);
            /* Check if user had already requested resetting password before
             * if they did, redirect to the otp confirmation step */
            $hadRequested = DB::table('password_reset_tokens')->where('email', $request->email)->first();
            if (!$hadRequested) {
                // Generate & store OTP
                $otp = rand(100000, 999999);
                DB::table('password_reset_tokens')->insert([
                    'email' => $request->email,
                    'token' => Hash::make($otp),
                    'created_at' => now()
                ]);
                SendRequestResetPasswordEmail::dispatch($user->email, $otp); // Dispatch send email job
            }
            return redirect('auth/reset-password/check-otp');
        }
        return back()->withErrors(['message' => 'Email not found']);
    }

    /**
     * Handle request reset password
     * @param Request $request
     */
    public function resetPasswordCheckOTP(Request $request)
    {
        $email = $request->session()->get('email');
        $otp = $request->validate([
            'otp' => 'required|numeric'
        ]);
        $token = DB::table('password_reset_tokens')->where('email', $email)->first();
        if ($token) {
            if (Hash::check($otp['otp'], $token->token)) {
                DB::table('password_reset_tokens')->where('email', $email)->delete(); // Delete token
                $request->session()->put('isVerified', true);
                return redirect('auth/reset-password/update-password');
            }
            return back()->withErrors(['otp' => 'OTP không chính xác']);
        }
        $request->session()->put('isVerified', false);
        return redirect('/auth/login')->withErrors(['message' => 'Not authorized']);
    }

    /**
     * Handle updating password
     * @param Request $request
     */
    public function resetPasswordUpdate(Request $request)
    {
        if (!$request->session()->get('isVerified')) {
            return redirect('/auth/login')->withErrors(['message' => 'Not authorized']);
        }

        $password = $request->validate([
            'password' => 'required|min:8|confirmed'
        ]);

        $email = $request->session()->get('email');
        $user = DB::table('users')->where('email', $email)->first();
        if ($user) {
            DB::table('users')->where('email', $email)->update([
                'password' => Hash::make($password['password'])
            ]);
            $request->session()->flush();
            return redirect('auth/login');
        }

        return redirect('/auth/login')->withErrors(['message' => 'Error occurred']);
    }

}
