<?php

class Ayar {

    private static $ayarlar = [];

    public static function baslat() {

        if($klasorac = opendir(__DIR__."/../ayar")){
            while(false !== ($dosya = readdir($klasorac))){
                if($dosya != "." && $dosya != "..") {
                    $bol = explode(".", $dosya);
                    $isim = $bol[0];
                    self::$ayarlar[$isim] = include __DIR__."/../ayar/".$dosya;
                }
            }
            closedir($klasorac);
        }

    }

    public static function getir($nesne) {
        $bol = explode(".", $nesne);

        $dosya = $bol[0];
        $anahtar = $bol[1];

        if(self::kontrol($nesne))
            return self::$ayarlar[$dosya][$anahtar];
        else
            return null;
    }

    public static function belirle($nesne, $deger) {
        $bol = explode(".", $nesne);

        $dosya = $bol[0];
        $anahtar = $bol[1];

        self::$ayarlar[$dosya][$anahtar] = $deger;
    }

    public static function kontrol($nesne){

        $bol = explode(".", $nesne);
        $dosya = $bol[0];
        $anahtar = $bol[1];

        return isset(self::$ayarlar[$dosya]) && isset(self::$ayarlar[$dosya][$anahtar]);
    }

}