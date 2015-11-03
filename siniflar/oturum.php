<?php

/**
 * Oturum Sınıfı
 * -------------
 *
 * Session işlemlerini kontrol eder.
 */
class Oturum {

    private static $oturumlar = [];

    public static function baslat() {
        session_start();

        foreach($_SESSION as $anahtar => $deger){
            self::$oturumlar[$anahtar] = $deger;
        }
    }

    public static function getir($anahtar) {
        if(isset(self::$oturumlar[$anahtar]))
            return self::$oturumlar[$anahtar];
        else
            return null;
    }

    public static function belirle($anahtar, $deger) {
        $_SESSION[$anahtar] = $deger;

        self::$oturumlar[$anahtar] = $deger;

        return self::$oturumlar[$anahtar];
    }

    public static function hepsiniSil() {
        session_destroy();
        self::$oturumlar = [];
    }

    public static function sil($anahtar) {
        unset($_SESSION[$anahtar]);
        unset(self::$oturumlar[$anahtar]);
    }

    public static function kontrol($anahtar) {
        return isset(self::$oturumlar[$anahtar]);
    }

}