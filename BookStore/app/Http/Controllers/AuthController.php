<?php

namespace App\Http\Controllers;

use App\Jobs\SendRequestResetPasswordEmail;
use App\Models\Customer;
use App\Models\User;
use App\Rules\Password;
use App\Services\AuthService;
use App\Services\ServiceImpl\AuthServiceImpl;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    private Customer $customerRepo;
    private User $userRepo;

    private AuthService $authService;

    public function __construct(Customer $customerRepo, User $userRepo, AuthServiceImpl $authService)
    {
        $this->customerRepo = $customerRepo;
        $this->userRepo = $userRepo;
        $this->authService = $authService;
    }

    /**
     * Handle register request
     * @param Request $request
     * @return RedirectResponse
     */
    public function register(Request $request): RedirectResponse
    {

        $validator = Validator::make($request->all(), [
            'full_name' => ['required'],
            'username' => ['required', 'unique:users'],
            'password' => ['required', 'min:8', 'confirmed', new Password],
            'email' => ['required', 'email', 'unique:users'],
            'dob' => ['required', 'date'],
            'phone_number' => ['required', 'numeric', 'unique:customers']
        ]);

        // If validation fails, return back with error message
        if ($validator->fails()) {
            $errors = $validator->errors();
            return back()->withErrors([
                'full_name' => $errors->first('fullName', 'Full name is required.'),
                'username' => $errors->first('username', 'Username is required and must be unique.'),
                'password' => $errors->first('password', 'Password is required, must be at least 8 characters, and confirmed.'),
                'email' => $errors->first('email', 'Email is required, must be a valid email, and unique.'),
                'dob' => $errors->first('dob', 'Date of birth is required and must be a valid date.'),
                'phone_number' => $errors->first('phoneNumber', 'Phone number is required, must be a number, and unique.')
            ]);
        }

        // If registration is successful, redirect to login page
        if ($this->authService->registerCustomer($request->all())) {
            return redirect()->route('login.get')->with([
                'message' => 'Registered successfully, please login'
            ]);
        }

        // If registration failed, return back with error message
        return back()->with([
            'message' => 'Error occurred when registering, please try again'
        ]);
    }

    /**
     * Handle login a request
     * @param Request $request
     * @return RedirectResponse
     */
    public function login(Request $request): RedirectResponse
    {
        // Check login
        if (Auth::attempt(['email' => $request->input('emailOrUsername'), 'password' => $request->input('password')]) ||
            Auth::attempt(['username' => $request->input('emailOrUsername'), 'password' => $request->input('password')])) {
            return redirect()->route('home');
        }

        return back()->with([
            'message' => 'Invalid email/username or password'
        ]);
    }

    /**
     * Handle logout request
     * @return RedirectResponse
     */
    public function logout(): RedirectResponse
    {
        // TODO: Find a way to save cart before logging out
        Auth::logout();
        return redirect()->route('home');
    }

    /**
     * Handle request reset password
     * @param Request $request
     * @return RedirectResponse
     */
    public function requestResetPassword(Request $request): RedirectResponse
    {
        $request->validate([
            'email' => 'email|required'
        ]);
        $email = $request->email;

        // Check if user with this email exist
        $user = $this->userRepo->findByEmail($email);
        if (!$user) {
            // If user does not exist, return back with error message
            return back()->with([
                'message' => 'User with this email does not exist'
            ]);
        }

        $request->session()->put('resetPasswordEmail', $email);
        // Check if user had already requested resetting password before, if they did redirect to check OTP page
        if ($this->authService->hasRequestedResetPassword($email)) {
            return redirect()->route('reset-password-check-otp.get');
        }

        // If user has not requested resetting password before, handle the request
        if ($this->authService->handleResetPasswordRequest($email)) {
            return redirect()->route('reset-password-check-otp.get');
        }

        // If an error occurred when handling the request, return back with error message
        return back()->with([
            'message' => 'Error occurred when requesting to reset password, please try again'
        ]);
    }

    /**
     * Handle request reset password
     * @param Request $request
     * @return RedirectResponse
     */
    public function resetPasswordCheckOTP(Request $request): RedirectResponse
    {
        // Set isVerified to false
        $request->session()->put('isVerified', false);

        // Check if email is stored in session
        $email = $request->session()->get('resetPasswordEmail');
        if (!$email) {
            return redirect()->route('login.get')->with(['message' => 'Error occurred, please try again']);
        }

        // TODO package as a service
        $otpByEmail = DB::table('password_reset_tokens')->where('email', $email)->first();
        if ($otpByEmail) {
            // Check if OTP is valid
            if (Hash::check($request->otp, $otpByEmail->token)) {
                DB::table('password_reset_tokens')->where('email', $email)->delete(); // Delete OTP after verified
                $request->session()->put('isVerified', true);
                return redirect()->route('reset-password-update-password.get');
            }
            // If OTP is invalid
            return back()->with([
                'message' => 'Invalid OTP'
            ]);
        }

        // If OTP by email is not found
        return redirect()->route('login.get')->with(['message' => 'Not authorized']);
    }

    /**
     * Handle updating password
     * @param Request $request
     */
    public function resetPasswordUpdate(Request $request)
    {
        // Check if isVerified is true
        if (!$request->session()->get('isVerified')) {
            return redirect()->route('login.get')->with(['message' => 'Not authorized']);
        }

        // Validate password
        $validator = Validator::make($request->all(), [
            'password' => ['required', 'min:8', 'confirmed', new Password]
        ]);
        if ($validator->fails()) {
            $errors = $validator->errors();
            return back()->withErrors([
                'password' => $errors->first('password', 'Password is required, must be at least 8 characters, and confirmed.')
            ]);
        }

        // TODO package as a service
        // Update password
        $email = $request->session()->get('email');
        $user = DB::table('users')->where('email', $email)->first();
        if ($user) {
            DB::table('users')->where('email', $email)->update([
                'password' => Hash::make($request->password)
            ]);
            $request->session()->flush(); // Delete the reset password session
            return redirect()->route('login.get')->with([
                'message' => 'Password updated successfully, please login'
            ]);
        }

        return redirect()->route('login.get')->with(['message' => 'Error occurred when resetting password, please try again']);
    }

}
