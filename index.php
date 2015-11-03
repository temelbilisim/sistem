<?php

/*
 * Composer ile gelen paket sınıflarını içe aktar
 */
require "vendor/autoload.php";

/*
 * Önyükleyici
 */
require "onyukleyici.php";

$modul = Veri::kontrol("modul") ? Veri::getir("modul") : "anasayfa";
$dosya = Veri::kontrol("dosya") ? Veri::getir("dosya") : "index";

require __DIR__."/sayfalar/".$modul."/".$dosya.".php";