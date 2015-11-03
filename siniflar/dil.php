<?php

class Dil {

    private static $diller = [];
    private static $dil;

    public static function baslat() {

        self::$dil = Ayar::getir("site.dil");

        if($klasorac = opendir(__DIR__."/../dil")){
            while(false !== ($dilklasor = readdir($klasorac))){
                if($dilklasor != "." && $dilklasor != "..") {
                    self::$diller[$dilklasor] = [];
                    if($dilklasorac = opendir(__DIR__."/../dil/".$dilklasor)){
                        while(false !== ($dildosya = readdir($dilklasorac))){
                            if($dildosya != "." && $dildosya != ".."){
                                $bol = explode(".", $dildosya);
                                self::$diller[$dilklasor][$bol[0]] = include __DIR__."/../dil/".$dilklasor."/".$dildosya;
                            }
                        }
                        closedir($dilklasorac);
                    }
                }
            }
            closedir($klasorac);
        }

    }

    public static function getir($nesne) {
        $bol = explode(".", $nesne);
        if(self::kontrol($nesne))
            return self::$diller[self::$dil][$bol[0]][$bol[1]];
        else
            return $nesne;
    }

    public static function kontrol($nesne){
        $bol = explode(".", $nesne);

        return isset(self::$diller[self::$dil][$bol[0]][$bol[1]]);
    }

}