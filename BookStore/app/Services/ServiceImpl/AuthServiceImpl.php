<?php

namespace App\Services\ServiceImpl;

use App\Jobs\SendRequestResetPasswordEmail;
use App\Models\Customer;
use App\Models\User;
use App\Services\AuthService;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AuthServiceImpl implements AuthService
{
    public function registerCustomer(array $data): bool
    {
        try {
            // Create a new user
            $user = new User([
                'full_name' => $data['full_name'],
                'username' => $data['username'],
                'email' => $data['email'],
                'dob' => $data['dob'],
            ]);
            $user->password = Hash::make($data['password']);
            $user->save();

            // Create a new customer with the user id
            $customer = new Customer([
                'phone_number' => $data['phone_number'],
            ]);
            $customer->id = $user->id;
            $customer->save();

            return true;
        } catch (Exception $e) {
            // TODO handle exception
            return false;
        }
    }

    public function getResetPasswordRecordByEmail(string $email)
    {
        return DB::table('password_reset_tokens')->where('email', $email)->first();
    }

    public function handleResetPasswordRequest(string $email): bool
    {
        try {
            // Generate & store OTP
            $otp = rand(100000, 999999);
            DB::table('password_reset_tokens')->insert([
                'email' => $email,
                'token' => Hash::make($otp),
                'created_at' => now()
            ]);
            // Send email
            SendRequestResetPasswordEmail::dispatch($email, $otp);

            return true;
        } catch (Exception $e) {
            // TODO handle exception
            return false;
        }
    }

    public function checkOTP(string $email, string $otp): bool
    {

    }
}
