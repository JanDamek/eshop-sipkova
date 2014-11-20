<?php

class UserHelper {

    private static
            $instance = null,
            $zakaznik_id = '', // id prihlaseneho zakaznika
            $zakaznik = null, // prihlaseny uzivatel

            $skupina = null, // patri do skupiny
            $skupina_id = '', // id prihlasene skupiny

            $kosik = null, // ma v kosiku

            $prepocet = null, // kurz posledniho prepoctu
            $prep_bufer = null,
            $ceny_buff = null,
            $mena = null,
            $webpay = null,
            $ePlatba = null;       // pouziva menu
            
    public static $je_sleva = false;
    
    public static function getZakaznik() {
        return self::$zakaznik;
    }

    public static function getInstance() {
        if (is_null(self::$instance)) {
            self::$instance = new UserHelper;
        }
        return self::$instance;
    }

    public static function addZbozi(sfWebRequest $request) {
        //pridani zbozi do kosiku
        self::getData();

        $zbozi = Doctrine::getTable('Zbozi')
                ->findOneBySlug($request->getParameter('slug'));

        $kos = Doctrine::getTable('Kosik')
                ->createQuery('Kosik k')
                ->where('k.zakaznik_id = ?', self::$zakaznik_id)
                ->andWhere('k.zbozi_id = ?', $zbozi->getZboziId())
                ->fetchOne();
        if ($kos && $kos->count() > 0) {
            $kos->setMno($kos->getMno() + 1);
            $kos->save();
            $kos->free(true);
        } elseif ($zbozi && $zbozi->count() > 0) {
            $item = new Kosik();
            $item->setZakaznikId(self::$zakaznik_id);
            $item->setMno(1);
            $item->setZboziId($zbozi->getZboziId());
            $item->save();
            $item->free(true);
        }
    }

    public static function doLogin(sfWebRequest $request) {
        self::getData();
        //provedeni prihlaseni
        $login = $request->getParameter('login');
        $zakaznik = Doctrine::getTable('Zakaznik')
                ->createQuery('Zakaznik z')
                ->where('z.username = ?', $login['username'])
                ->andWhere('z.password = ?', $login['password'])
                ->andWhere('z.skupina_id <> ?', NavigationHelper::getSetting()->getSkupinaVelId())
                ->execute();
        if ($zakaznik && $zakaznik->count() == 1) {
            self::$zakaznik = $zakaznik[0];
            self::$zakaznik_id = $zakaznik[0]->getId();
            setcookie('adgjlpiyrw', self::$zakaznik_id, time() + 3600, '/');
//            var_dump(self::$zakaznik_id);
        } else {
            self::$zakaznik = null;
            self::$zakaznik_id = '';
        }
    }

    public static function doLogin_vel(sfWebRequest $request) {
        self::getData();
        //provedeni prihlaseni
        $login = $request->getParameter('login');
        $zakaznik = Doctrine::getTable('Zakaznik')
                ->createQuery('Zakaznik z')
                ->where('z.username = ?', $login['username'])
                ->andWhere('z.password = ?', $login['password'])
                ->andWhere('z.skupina_id = ?', NavigationHelper::getSetting()->getSkupinaVelId())
                ->execute();
        if ($zakaznik && $zakaznik->count() == 1) {
            self::$zakaznik = $zakaznik[0];
            self::$zakaznik_id = $zakaznik[0]->getId();
            setcookie('adgjlpiyrw', self::$zakaznik_id, time() + 3600, '/');
//            var_dump(self::$zakaznik_id);
        } else {
            self::$zakaznik = null;
            self::$zakaznik_id = '';
        }
    }

    public static function doLogOut(sfWebRequest $request) {
        setcookie('adgjlpiyrw', null, time(), '/');
    }

    public static function getCena($zbozi) {

        self::$je_sleva = false;

        $mena_zbozi = $zbozi->getMenaId();

        if (isset(self::$ceny_buff[$zbozi->getZboziId()][self::$skupina_id][self::$zakaznik_id])) {
            $cena = self::$ceny_buff[$zbozi->getZboziId()][self::$skupina_id][self::$zakaznik_id];
        } else {
            $cena = Doctrine::getTable('Ceny')
                    ->createQuery('Ceny c')
                    ->where('c.zbozi_id=?', $zbozi->getZboziId())
                    ->andWhere('(c.skupina_id=? AND c.dle="Skupina") or (c.zakaznik_id=? AND c.dle="Zakaznik")', array(self::$skupina_id, self::$zakaznik_id))
                    ->execute();

            if ($cena && $cena->count() != 0) {
                $cena = $cena[0];
                self::$ceny_buff[$zbozi->getZboziId()][self::$skupina_id][self::$zakaznik_id] = $cena;
            }
        }
        //var_dump($cena);
        if ($cena && $cena->count()) {
            if ($cena->gettyp() == "Cena") {
                $cena_zbozi = $cena->getCena();
            } else {
                if ($cena->getTypSlevy() == "Cena") {
                    $cena_zbozi = $cena->getSleva();
                } else {
                    $cena_zbozi = $zbozi->getCena() * (1 - ($cena->getSleva() / 100));
                }
            }
            self::$je_sleva = true;
        }
        else
            $cena_zbozi = $zbozi->getCena();

        return self::cena_zbozi($cena_zbozi, $mena_zbozi);
    }

    public static function cena_zbozi($cena, $mena) {
        // prepocet ceny z ceny zbozi z meny zbozi na menu nastavenou
        self::getData();
        self::aktMena();
        if ($mena) {
            if ($mena == self::$mena->getId()) {
                return $cena;
            } else {

                if (isset(self::$prep_bufer[$mena][self::$mena->getId()])) {
                    self::$prepocet = self::$prep_bufer[$mena][self::$mena->getId()];
                }

                if (!self::$prepocet || self::$prepocet->getVychoziMena() != $mena || self::$prepocet->getCilovaMena() != self::$mena->getId()) {
                    self::$prepocet = Doctrine::getTable('MenaKurz')
                            ->createQuery('MenaKurz k')
//                            ->leftJoin('k.Zaokrouhleni z')
                            ->where('k.vychozi_mena = ?', $mena)
                            ->andWhere('k.cilova_mena = ?', self::$mena->getId())
                            ->execute();

                    if (self::$prepocet && self::$prepocet->count() > 0) {
                        self::$prepocet = self::$prepocet[0];
                        self::$prep_bufer[$mena][self::$mena->getId()] = self::$prepocet;
                    }
                }
                return $cena * (self::$prepocet->getKurz());
            }
        } else
            return $cena;
    }

    private static function getData() {
        //natazeni dat ze session a cookies
        if (isset($_COOKIE['adgjlpiyrw'])) {
            self::$zakaznik_id = $_COOKIE['adgjlpiyrw'];
        }
        if (isset(self::$zakaznik_id) && !self::$kosik) {
            self::$kosik = Doctrine::getTable('Kosik')
                    ->createQuery('Kosik k')
                    ->leftJoin('k.Zbozi z')
                    ->leftJoin('z.Mena m')
                    ->leftJoin('z.DPH d')
                    ->where('k.zakaznik_id = ?', self::$zakaznik_id)
                    ->execute();
        }
    }

    public static function celkemKosik() {
        $celkem = 0;

        foreach (self::$kosik as $item) {
            $celkem += self::getCena($item->getZbozi()) * $item->getMno();
        }

        return $celkem;
    }

    public static function getKosik() {
        self::getData();
        return self::$kosik;
    }
    
    public static function getMena(){
        if (self::aktUserName() == "") {
            if (self::$mena) {
                return self::$mena;
            } elseif (self::aktUserId() != NULL) {
                if (!isset(self::$mena)) {
                    $mena = Doctrine::getTable('Mena')
                            ->createQuery('Mena m')
//                            ->leftJoin('m.Zaokrouhleni z')
                            ->where('m.id = ?', self::$zakaznik->getMenaId())
                            ->limit(1)
                            ->execute();
                    if ($mena && $mena->count() == 1) {
                        self::$mena = $mena[0];
                    }
                }

                if (self::$mena) {
                    return self::$mena;
                } else {
                    return null;
                }
            } else {
                if (!isset(self::$mena)) {
                    $mena = Doctrine::getTable('Mena')
                            ->createQuery('Mena m')
//                            ->leftJoin('m.Zaokrouhleni z')
                            ->where('m.id = ?', NavigationHelper::getSetting()->getHlavniMena())
                            ->limit(1)
                            ->execute();
                    if ($mena && $mena->count() == 1) {
                        self::$mena = $mena[0];
                    }
                }
                if (self::$mena) {
                    return self::$mena;
                } else {
                    return NULL;
                }
            }
        } else {
            if (!isset(self::$mena)) {
                $mena = Doctrine::getTable('Mena')
                        ->createQuery('Mena m')
//                        ->leftJoin('m.Zaokrouhleni z')
                        ->where('m.id = ?', self::$zakaznik->getMenaId())
                        ->limit(1)
                        ->execute();
                if ($mena && $mena->count() == 1) {
                    self::$mena = $mena[0];
                }
            }
            return self::$mena;
        }
        
    }

    public static function aktMena() {
        $mena = self::getMena();
        if (isset($mena) && $mena != NULL) {
            return $mena->getOznaceni();
        }
        else
            return 'N/A';
        
    }

    public static function aktUserName() {
        self::getData();
        if (!self::$zakaznik) {
            if (self::$zakaznik_id) {
                $z = Doctrine::getTable('Zakaznik')
                        ->createQuery('Zakaznik z')
                        ->where('z.id = ?', self::$zakaznik_id)
                        ->leftJoin('z.Skupina')
                        ->execute();
                if ($z && $z->count()) {
                    self::$zakaznik = $z[0];
                    $s = self::$zakaznik->getSkupina();
                    if ($s && $s->count()) {
                        self::$skupina = $s;
                        self::$skupina_id = $s->getId();
                    }
                }
            }else
                return null;
        }
        return self::$zakaznik->getUsername();
    }

    public static function aktUserId() {
        self::getData();
        return self::$zakaznik_id;
    }

    public static function aktUserDoruceni() {
        self::getData();
        if (self::$zakaznik) {
            return self::$zakaznik->getDorucitId();
        }else
            return - 1;
    }

    public static function getWebPay() {
        if (self::$webpay) {
            return self::$webpay;
        } else {
            self::$webpay = Doctrine::getTable('Webpay')
                    ->createQuery('webpay w')
                    ->leftJoin('w.Mena m')
                    ->where('w.zeme_urceni_id = ?', self::$zakaznik->getDorucitId())
                    ->andWhere('w.enabled = ?', true)
                    ->execute();

            return self::$webpay;
        }
    }

    public static function getEPlatba() {
        if (self::$ePlatba) {
            return self::$ePlatba;
        } else {
            self::$ePlatba = Doctrine::getTable('ePlatba')->createQuery('ePlatba e')
                    ->leftJoin('e.Mena m')
                    ->where('e.zeme_urceni_id = ?', self::$zakaznik->getDorucitId())
                    ->andWhere('e.enabled = ?', true)
                    ->execute();

            return self::$ePlatba;
        }
    }

}