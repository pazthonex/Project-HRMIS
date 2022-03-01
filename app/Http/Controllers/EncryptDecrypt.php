<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EncryptDecrypt extends Controller
{
    private static $OPENSSL_CIPHER_NAME = "aes-128-cbc"; //Name of OpenSSL Cipher 
    private static $CIPHER_KEY_LEN = 16; //128 bits
    private static $key = "-=)(*&^%()!@#ffs";
    private static $iv = "!)@(#*f&%^123456";
    /**
     * Encrypt data using AES Cipher (CBC) with 128 bit key
     * 
     * @param type $key - key to use should be 16 bytes long (128 bits)
     * @param type $iv - initialization vector
     * @param type $data - data to encrypt
     * @return encrypted data in base64 encoding with iv attached at end after a :
     */

    public function encrypt($data) {
        if (strlen(EncryptDecrypt::$key) < EncryptDecrypt::$CIPHER_KEY_LEN) {
            EncryptDecrypt::$key = str_pad(EncryptDecrypt::$key, EncryptDecrypt::$CIPHER_KEY_LEN, "0"); //0 pad to len 16
        } else if (strlen(EncryptDecrypt::$key) > EncryptDecrypt::$CIPHER_KEY_LEN) {
            EncryptDecrypt::$key = substr(EncryptDecrypt::$key, 0, EncryptDecrypt::$CIPHER_KEY_LEN); //truncate to 16 bytes
        }
        
        $encodedEncryptedData = base64_encode(openssl_encrypt((string)$data, EncryptDecrypt::$OPENSSL_CIPHER_NAME, EncryptDecrypt::$key, OPENSSL_RAW_DATA, EncryptDecrypt::$iv));
        $encodedIV = base64_encode(EncryptDecrypt::$iv);
        $encryptedPayload = $encodedEncryptedData.":".$encodedIV;
        
        return $encryptedPayload;
    }

    /**
     * Decrypt data using AES Cipher (CBC) with 128 bit key
     * 
     * @param type $key - key to use should be 16 bytes long (128 bits)
     * @param type $data - data to be decrypted in base64 encoding with iv attached at the end after a :
     * @return decrypted data
     */
    public function decrypt($data) {
        if (strlen(EncryptDecrypt::$key) < EncryptDecrypt::$CIPHER_KEY_LEN) {
            EncryptDecrypt::$key = str_pad(EncryptDecrypt::$key, EncryptDecrypt::$CIPHER_KEY_LEN, "0"); //0 pad to len 16
        } else if (strlen(EncryptDecrypt::$key) > EncryptDecrypt::$CIPHER_KEY_LEN) {
            EncryptDecrypt::$key = substr(EncryptDecrypt::$key, 0, EncryptDecrypt::$CIPHER_KEY_LEN); //truncate to 16 bytes
        }
        
        $parts = explode(':', (string)$data); //Separate Encrypted data from iv.
        $decryptedData = openssl_decrypt(base64_decode($parts[0]), EncryptDecrypt::$OPENSSL_CIPHER_NAME, EncryptDecrypt::$key, OPENSSL_RAW_DATA, base64_decode($parts[1]));
        
        return $decryptedData;
    }
}
