<?php

namespace App\Services;

interface AuthService
{
    /**
     * Register a new customer, return true if the registration is successful
     * @param array $data
     * @return bool
     */
    public function registerCustomer(array $data): bool;

    /**
     * Get the otp from the database, return null if the otp does not exist
     * @param string $email
     * @return array|null
     */
    public function getResetPasswordOTPByEmail(string $email): ?string;

    /**
     * Handle the request to reset password, generate OTP and send email
     * @param string $email
     * @return bool
     */
    public function handleResetPasswordRequest(string $email): bool;

    /**
     * Check if the OTP is valid
     * @param string $email
     * @param string $requestOTP
     * @return bool
     */
    public function checkResetPasswordOTP(string $email, string $requestOTP): bool;
}
