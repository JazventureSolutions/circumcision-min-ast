<?php

namespace App\Helpers;

class TotpHelper
{
    public static function generateSecret(int $length = 16): string
    {
        $validChars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ234567';
        $secret = '';

        for ($i = 0; $i < $length; $i++) {
            $secret .= $validChars[random_int(0, strlen($validChars) - 1)];
        }

        return $secret;
    }

    public static function getQrCodeInlineUrl(string $label, string $secret, string $issuer = 'Circumcision Clinic'): string
    {
        $label = rawurlencode($label);
        $issuer = rawurlencode($issuer);
        $otpauth = sprintf('otpauth://totp/%s:%s?secret=%s&issuer=%s&algorithm=SHA1&digits=6&period=30', $issuer, $label, $secret, $issuer);

        return 'https://api.qrserver.com/v1/create-qr-code/?size=200x200&data=' . rawurlencode($otpauth);
    }

    public static function getOtpAuthUrl(string $label, string $secret, string $issuer = 'Circumcision Clinic'): string
    {
        $label = rawurlencode($label);
        $issuer = rawurlencode($issuer);

        return sprintf('otpauth://totp/%s:%s?secret=%s&issuer=%s&algorithm=SHA1&digits=6&period=30', $issuer, $label, $secret, $issuer);
    }

    public static function verifyCode(string $secret, string $code, int $discrepancy = 2): bool
    {
        $code = trim($code);
        if ($code === '') {
            return false;
        }

        for ($i = -$discrepancy; $i <= $discrepancy; $i++) {
            if (hash_equals(self::getCode($secret, $i), $code)) {
                return true;
            }
        }

        return false;
    }

    public static function getCode(string $secret, int $discrepancy = 0): string
    {
        $timeSlice = floor(time() / 30) + $discrepancy;
        $secretKey = self::base32Decode($secret);
        $time = pack('N', 0) . pack('N', $timeSlice);
        $hash = hash_hmac('sha1', $time, $secretKey, true);
        $offset = ord(substr($hash, -1)) & 0x0F;
        $truncatedHash = substr($hash, $offset, 4);
        $value = unpack('N', $truncatedHash)[1] & 0x7FFFFFFF;

        return str_pad($value % 1000000, 6, '0', STR_PAD_LEFT);
    }

    protected static function base32Decode(string $secret): string
    {
        $base32Chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ234567';
        $secret = strtoupper(preg_replace('/[^A-Z2-7]/', '', $secret));
        $binary = '';
        $decoded = '';

        foreach (str_split($secret) as $char) {
            $value = strpos($base32Chars, $char);
            if ($value === false) {
                continue;
            }

            $binary .= str_pad(decbin($value), 5, '0', STR_PAD_LEFT);

            while (strlen($binary) >= 8) {
                $decoded .= chr(bindec(substr($binary, 0, 8)));
                $binary = substr($binary, 8);
            }
        }

        return $decoded;
    }
}
