<?php

class DB {

    private static $pdo;

    private static $stmt;

    public static function baslat() {
        try {
            self::$pdo = new PDO("mysql:host=".Ayar::getir("veritabani.adres").";dbname=".Ayar::getir("veritabani.adi"), Ayar::getir("veritabani.kullanici"), Ayar::getir("veritabani.sifre"));
        } catch (PDOException $e) {
            trigger_error("SQL Bağlantı Hatası!", E_USER_ERROR);
        }
    }

    public static function sorgu($sorgu) {
        self::$stmt = self::$pdo->prepare($sorgu);
    }

    public static function tut($parametre, $deger, $tur = null) {
        if(is_null($tur)){
            $tur = PDO::PARAM_STR;
            if(is_int($deger)){
                $tur = PDO::PARAM_INT;
            }

            if(is_bool($deger)){
                $tur = PDO::PARAM_BOOL;
            }

            if(is_null($deger)){
                $tur = PDO::PARAM_NULL;
            }
        }

        self::$stmt->bindValue($parametre, $deger, $tur);
    }

    public static function calistir() {
        return self::$stmt->execute();
    }

    public static function sec() {
        self::calistir();
        return self::$stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public static function satir() {
        self::calistir();

        return self::$stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function satirSayisi() {
        return self::$stmt->rowCount();
    }

    public static function sonId() {
        self::$pdo->lastInsertId();
    }

}