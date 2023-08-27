<?php

declare(strict_types=1);

namespace Containers\Vendor\Additional;

use function function_exists;
use function ord;
use function strlen;

/**
 * Encryptor SSL
 */
final class SSLEncrypter
{
    /**
     * @param string $pure_string
     * @param string $encryption_key
     * @return string
     */
    public static function encrypt(string $pure_string, string $encryption_key = ''): string
    {
        $cipher = 'AES-256-CBC';
        $options = OPENSSL_RAW_DATA;
        $hash_algo = 'sha256';
        $ivlen = openssl_cipher_iv_length($cipher);
        $strong = true;
        do {
            $iv_bytes = openssl_random_pseudo_bytes($ivlen, $strong);
        } while (!$iv_bytes || !$strong);
        $ciphertext_raw = openssl_encrypt($pure_string, $cipher, $encryption_key, $options, $iv_bytes);
        $hmac = hash_hmac($hash_algo, $ciphertext_raw, $encryption_key, true);

        return base64_encode($iv_bytes . $hmac . $ciphertext_raw);
    }

    /**
     * @param string $encrypted_string
     * @param string $encryption_key
     * @return false|string|void
     */
    public static function decrypt(string $encrypted_string, string $encryption_key = '')
    {
        $cipher = 'AES-256-CBC';
        $options = OPENSSL_RAW_DATA;
        $hash_algo = 'sha256';
        $sha2len = 32;
        $ivlen = openssl_cipher_iv_length($cipher);
        $encrypted_string = base64_decode($encrypted_string);
        $iv = substr($encrypted_string, 0, $ivlen);
        $hmac = substr($encrypted_string, $ivlen, $sha2len);
        $ciphertext_raw = substr($encrypted_string, $ivlen + $sha2len);
        $original_plaintext = openssl_decrypt($ciphertext_raw, $cipher, $encryption_key, $options, $iv);
        $calcmac = hash_hmac($hash_algo, $ciphertext_raw, $encryption_key, true);

        if (function_exists('hash_equals')) {
            if (hash_equals($hmac, $calcmac)) {
                return $original_plaintext;
            }
        } elseif (self::hash_equals_custom($hmac, $calcmac)) {
            return $original_plaintext;
        }
    }

    /**
     * @param string $known_string
     * @param string $user_string
     * @return bool
     */
    private static function hash_equals_custom(string $known_string, string $user_string): bool
    {
        if (function_exists('mb_strlen')) {
            $k_len = mb_strlen($known_string, '8bit');
            $u_len = mb_strlen($user_string, '8bit');
        } else {
            $k_len = strlen($known_string);
            $u_len = strlen($user_string);
        }

        if ($k_len !== $u_len) {
            return false;
        }

        $result = 0;
        for ($i = 0; $i < $k_len; $i++) {
            $result |= (ord($known_string[$i]) ^ ord($user_string[$i]));
        }

        return 0 === $result;
    }
}
