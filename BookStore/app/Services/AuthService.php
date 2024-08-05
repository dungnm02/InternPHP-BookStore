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
    public function getResetPasswordRecordByEmail(string $email): ?array;

    /**
     * Handle the request to reset password, generate OTP and send email
     * @param string $email
     * @return bool
     */
    public function handleResetPasswordRequest(string $email): bool;

    /**
     * Check if the OTP is valid
     * @param string $email
     * @param string $otp
     * @return bool
     */
    public function checkOTP(string $email, string $otp): bool;
}
