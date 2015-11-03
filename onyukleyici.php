<?php

/*
 |------------
 | Önyükleyici
 |------------
 */

/**
 * Yukleyici sınıfını içe aktar
 */
require __DIR__."/siniflar/yukleyici.php";

/**
 * Otomatik yükleme işlemini Yükleyici sınıfına ver.
 */
spl_autoload_register('Yukleyici::otoYukle');

/**
 * Sınıfları başlat.
 */
Oturum::baslat();
Veri::baslat();
Ayar::baslat();
Dil::baslat();
DB::baslat();