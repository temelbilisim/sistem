<?php

class Veri {

    private static $veriler = [];

    public static function baslat() {

        foreach($_GET as $anahtar => $deger) {
            self::$veriler[$anahtar] = $deger;
        }

        foreach($_POST as $anahtar => $deger) {
            self::$veriler[$anahtar] = $deger;
        }

    }

    public static function getir($anahtar) {
        if(isset(self::$veriler[$anahtar]))
            return self::$veriler[$anahtar];
        else
            return null;
    }

    public static function belirle($anahtar, $deger) {
        self::$veriler[$anahtar] = $deger;
    }

    public static function sil($anahtar) {
        unset(self::$veriler[$anahtar]);
    }

    public static function kontrol($anahtar) {
        return isset(self::$veriler[$anahtar]);
    }

}