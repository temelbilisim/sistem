<?php

/**
 * Yukleyici Sınıfı
 * ----------------
 *
 * Bir sınıf çağrıldığında otomatik olarak içe aktarma işlemini
 * gerçekleştirir.
 */
class Yukleyici {

    /**
     * @param $sinif Sınıf ismi
     */
    public static function otoYukle($sinif)
    {
        $dosya = __DIR__."/".strtolower($sinif).".php";

        if(is_readable($dosya)){
            require_once $dosya;
        } else {
            trigger_error($sinif." sınıfının dosyası okunamadı", E_USER_ERROR);
        }
    }

}