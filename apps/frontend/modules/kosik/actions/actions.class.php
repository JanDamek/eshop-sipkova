<?php

/**
 * kosik actions.
 *
 * @package    Sipkova E Shop
 * @subpackage kosik
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class kosikActions extends sfActions {

    /**
     * Executes index action
     *
     * @param sfRequest $request A request object
     */
    public function executeForgoton(sfWebRequest $request) {
        
    }

    public function executePokladna(sfWebRequest $request) {

        //generovani formu
        $this->kosik = UserHelper::getInstance()->getKosik();
        $this->mena = UserHelper::getInstance()->aktMena();

        $this->doruceni = Doctrine::getTable('Doprava')
                ->createQuery('Doprava d')
                ->leftJoin('d.Mena m')
                ->leftJoin('d.PobockyDoprava p')
                ->where('d.zeme_urceni_id = ?', UserHelper::getInstance()->aktUserDoruceni())
                ->execute();

        if (isset($_COOKIE['doruceni'])) {
            $this->dor = $_COOKIE['doruceni'];
        }else
            $this->dor = '';

        if (isset($_COOKIE['pobo'])) {
            $this->do_po = $_COOKIE['pobo'];
        }else
            $this->do_po = '';

        if (isset($_COOKIE['pl'])) {
            $this->pl = $_COOKIE['pl'];
        }else
            $this->pl = '';

        $doprava_id = Doctrine::getTable('Doprava')
                ->findOneBySlug($this->dor);
        if ($doprava_id && $doprava_id->count() > 0) {
            $doprava_id = $doprava_id->getDopravaId();
        } else {
            $doprava_id = '';
        }

        $this->platba = Doctrine::getTable('Platba')
                ->findByDopravaId($doprava_id);

        $zakaznik = Doctrine::getTable('Zakaznik')
                ->findOneById(UserHelper::getInstance()->aktUSerId());
        $this->form = new ZakaznikForm($zakaznik);


        if ($request->isMethod('post')) {
            $d = $request->getParameter('zakaznik');
            $this->form = new ZakaznikForm(Doctrine::getTable('Zakaznik')->findOneById($d['id']));

            $this->form->bind($d);
            if ($this->form->isValid()) {
                if ($this->form->save()) {
                    $this->redirect('@pokladna');
                }
            }
        }
    }

    public function executeZmena(sfWebRequest $request) {
        $kosik = UserHelper::getInstance()->getKosik();
        foreach ($kosik as $value) {
            if (isset($_POST['remove'][$value->getId()]) || $_POST['mno'][$value->getId()] == 0) {
                $value->delete();
                $value->free(true);
            } else {
                $value->setMno($_POST['mno'][$value->getId()]);
                $value->save();
                $value->free(true);
            }
        }
        $this->redirect('@kosik');
    }

    public function executeZmena_dor(sfWebRequest $request) {

        setcookie('doruceni', $request->getParameter('doruceni'), time() + 3600, '/');
        setcookie('pobo', $request->getParameter('pobo'), time() + 3600, '/');

        $this->redirect('@pokladna');
    }

    public function executePlatba_div(sfWebRequest $request) {
        $doprava_id = Doctrine::getTable('Doprava')
                ->findOneBySlug($request->getParameter('id'));

        setcookie('doruceni', $doprava_id->getSlug(), time() + 3600, '/');

        $doprava_id = $doprava_id->getDopravaId();

        $this->platba = Doctrine::getTable('Platba')
                ->findByDopravaId($doprava_id);

        if (isset($_COOKIE['pl'])) {
            $this->pl = $_COOKIE['pl'];
        }else
            $this->pl = '';
    }

    public function executePobo_div(sfWebRequest $request) {
        setcookie('pobo', $request->getParameter('id'), time() + 3600, '/');

        if (isset($_COOKIE['doruceni'])) {
            $dor = $_COOKIE['doruceni'];
        }else
            $dor = '';

        $doprava_id = Doctrine::getTable('Doprava')
                ->findOneBySlug($dor)
                ->getDopravaId();

        $this->platba = Doctrine::getTable('Platba')
                ->findByDopravaId($doprava_id);

        if (isset($_COOKIE['pl'])) {
            $this->pl = $_COOKIE['pl'];
        }else
            $this->pl = '';

        $this->setTemplate('platba_div');
    }

    public function executeSet_pl_div(sfWebRequest $request) {

        setcookie('pl', $request->getParameter('id'), time() + 3600, '/');

        if (isset($_COOKIE['doruceni'])) {
            $dor = $_COOKIE['doruceni'];
        }else
            $dor = '';

        $doprava_id = Doctrine::getTable('Doprava')
                        ->findOneBySlug($dor)->getDopravaId();

        $this->platba = Doctrine::getTable('Platba')
                ->findByDopravaId($doprava_id);

        $this->pl = $request->getParameter('id');

        $this->setTemplate('platba_div');
    }

    public function executeZmena_pok(sfWebRequest $request) {
        $kosik = UserHelper::getInstance()->getKosik();
        foreach ($kosik as $value) {
            if (isset($_POST['remove'][$value->getId()]) || $_POST['mno'][$value->getId()] == 0) {
                $value->delete();
                $value->free(true);
            } else {
                $value->setMno($_POST['mno'][$value->getId()]);
                $value->save();
                $value->free(true);
            }
        }

        $this->redirect('@pokladna');
    }

    public function executeIndex(sfWebRequest $request) {
        $this->kosik = UserHelper::getInstance()->getKosik();
        $this->mena = UserHelper::getInstance()->aktMena();
    }

    public function executeLogin(sfWebRequest $request) {

        if (UserHelper::getInstance()->aktUserName() != "") {
            $this->forward('kosik', 'username');
        } else {
            UserHelper::getInstance()->doLogin($request);
            if (UserHelper::getInstance()->aktUserName() != "") {
                $this->redirect($request->getReferer());
            }
        }
    }

    public function executeLogin_vel(sfWebRequest $request) {

        if (UserHelper::getInstance()->aktUserName() != "") {
            $this->forward('kosik', 'username');
        } else {
            UserHelper::getInstance()->doLogin_vel($request);
            if (UserHelper::getInstance()->aktUserName() != "") {
                $this->redirect('homepage');
            }
        }
    }

    public function executeLogout(sfWebRequest $request) {
        UserHelper::getInstance()->doLogout($request);

        $this->redirect('homepage');
    }

    public function executeRegister(sfWebRequest $request) {

        if ($request->isMethod('post')) {

            $d = $request->getParameter('zakaznik');
            $this->form = new ZakaznikForm(Doctrine::getTable('Zakaznik')->findOneById($d['id']));

            if (!$d['mena_id']) {
                $d['mena_id'] = NavigationHelper::getSetting()->getHlavniMena();
            }
            //$d['skupina_id'] = NavigationHelper::getSetting()->getVychoziSkupinaId();

            $this->form->bind($d);
            $author = false;
            if ($this->form->isValid()) {
                $author = $this->form->save();
            }
            if ($author) {
                $zak = Doctrine::getTable('Zakaznik')->findOneByUsername($d['username']);
                $zak->setSkupinaId(NavigationHelper::getSetting()->getVychoziSkupinaId());
                $zak->save();

                setcookie('adgjlpiyrw', $zak->getId(), time() + 3600, '/');
                $this->redirect('homepage');
            }
        } else {
            $this->form = new ZakaznikForm();
        }
    }

    public function executeAdd(sfWebRequest $request) {
        //provedeni zaposu do kosiku produktu ktery prisel ve slug
        if (UserHelper::aktUserId() == NULL) {
            $this->redirect('@login');
        } else {

            UserHelper::getInstance()->addZbozi($request);
            $this->redirect($request->getReferer());
        }
    }

    public function executeUsername(sfWebRequest $request) {
        //vypis nasatveni usizvatele, senam objednavek a jejih stav
        if (UserHelper::getInstance()->aktUserName() == "") {
            $this->forward('kosik', 'login');
        } else {
            if ($request->isMethod('post')) {
                $this->forward('kosik', 'update');
            } else {
                $zakaznik = Doctrine::getTable('Zakaznik')
                        ->findOneById(UserHelper::getInstance()->aktUSerId());
                $this->form = new ZakaznikForm($zakaznik);
            }
        }
    }

    public function executeO_user(sfWebRequest $request) {
        //vypis objednavek a jejih stav, link na zmenu nastaveni
        if (UserHelper::getInstance()->aktUserName() == "") {
            $this->forward('kosik', 'login');
        } else {

            $this->zakaznik = Doctrine::getTable('Zakaznik')
                    ->findOneById(UserHelper::getInstance()->aktUSerId());

            $q = Doctrine_Manager::getInstance()->getCurrentConnection();
            $q->execute("UPDATE objednavky a SET a.Celkem = (SELECT sum(b.mno*b.cena) FROM polozky_obj b WHERE b.obj_id = a.id)");

            $this->objednavky = Doctrine::getTable('Objednavky')
                    ->createQuery('Objednavky o')
                    ->leftJoin('o.Mena m')
                    ->leftJoin('o.Platba p')
                    ->where('o.Zakaznik_id = ?', UserHelper::getInstance()->aktUSerId())
                    ->orderBy('o.id DESC')
                    ->execute();

        }
    }

    public function executeUpdate(sfWebRequest $request) {
        $this->forward404Unless($request->isMethod('post'));

        $d = $request->getParameter('zakaznik');
        if (isset($d['id'])) {
            $this->form = new ZakaznikForm(Doctrine::getTable('Zakaznik')->findOneById($d['id']));
        } else {
            $this->form = new ZakaznikForm(Doctrine::getTable('Zakaznik')
                                    ->findOneById(UserHelper::getInstance()->aktUSerId()));
        }
        $this->form->bind($d);
        if ($this->form->isValid()) {
            $author = $this->form->save();
        }

        $this->setTemplate('username');
    }

    public function executeObj(sfWebRequest $request) {

        $this->kosik = UserHelper::getInstance()->getKosik();
        $this->mena = UserHelper::getInstance()->aktMena();

        $this->doruceni = Doctrine::getTable('Doprava')
                ->createQuery('Doprava d')
                ->leftJoin('d.Mena m')
                ->leftJoin('d.PobockyDoprava p')
                ->where('d.zeme_urceni_id = ?', UserHelper::getInstance()->aktUserDoruceni())
                ->execute();

        if (isset($_COOKIE['doruceni'])) {
            $this->dor = $_COOKIE['doruceni'];
        }else
            $this->dor = '';

        if (isset($_COOKIE['pobo'])) {
            $this->do_po = $_COOKIE['pobo'];
        }else
            $this->do_po = '';

        if (isset($_COOKIE['pl'])) {
            $this->pl = $_COOKIE['pl'];
        }else
            $this->pl = '';

        $doprava_id = Doctrine::getTable('Doprava')
                ->findOneBySlug($this->dor);
        if ($doprava_id && $doprava_id->count() > 0) {
            $doprava_id = $doprava_id->getDopravaId();
        } else {
            $doprava_id = '';
        }

        $this->platba = Doctrine::getTable('Platba')
                ->findByDopravaId($doprava_id);

        $this->zakaznik = Doctrine::getTable('Zakaznik')
                ->findOneById(UserHelper::getInstance()->aktUSerId());
    }

    //dokonceni objednavky
    //prevod kosiku na navou obj a presmerovani na platbu 
    //nove zalozene obj
    public function executeObj_final(sfWebRequest $request) {

        if (isset($_COOKIE['doruceni'])) {
            $dor = $_COOKIE['doruceni'];
        }else
            $this->redirect('@login');

        if (isset($_COOKIE['pobo'])) {
            $do_po = $_COOKIE['pobo'];
            $do_po = Doctrine::getTable('PobockyDoprava')
                    ->findOneBySlug($do_po);
            if ($do_po->count() > 0) {
                $do_po = $do_po->getPobockaId();
            } else
                $this->redirect($request->getReferer());
        }else
            $do_po = null;

        if (isset($_COOKIE['pl'])) {
            $pl = $_COOKIE['pl'];
            $pl = Doctrine::getTable('Platba')
                    ->findOneBySlug($pl);
            if ($pl->count() > 0) {
                $pl = $pl->getId();
            } else
                $this->redirect($request->getReferer());
        }else
            $this->redirect('@login');

        $doprava_id = Doctrine::getTable('Doprava')
                ->findOneBySlug($dor);
        if ($doprava_id && $doprava_id->count() > 0) {
            $doprava_id = $doprava_id->getDopravaId();
        } else {
            $this->redirect($request->getReferer());
        }

        $obj = new Objednavky(null, true);
        $obj->setMenaId(UserHelper::getMena()->getId());

//        $obj_cislo = new CisloObj(null, true);
//        $obj_cislo->setTitle($obj_cislo->getId());
//        $obj_cislo->save();
//
//        $obj->setCisloObj($obj_cislo);

        $obj->setTyp('Přijato');

//        $stav = Doctrine::getTable('StavObjednavky')
//                ->findOneById('1');
//
//        $obj->setStavId($stav);

        $obj->setZakaznikId(UserHelper::aktUserId());

        $obj->setDopravaId($doprava_id);

        $obj->setPlatbaId($pl);
        $obj->setPobockaId($do_po);

        //vlozeni celkove slevy
        $obj->setSleva(0);
        //celkova cena dopravy a platby
        $obj->setCelkemDopl(0);
        $obj->save();

        $kos = Doctrine::getTable('Kosik')
                ->createQuery('Kosik k')
                ->leftJoin('k.Zbozi z')
                ->leftJoin('z.Mena m')
                ->leftJoin('z.DPH d')
                ->where('k.zakaznik_id = ?', UserHelper::aktUserId())
                ->execute();

        foreach ($kos as $value) {
            $pol = new PolozkyObj(null, true);
            $pol->setObjId($obj->getId());
            $pol->setZboziId($value->getZboziId());
            $pol->setMno($value->getMno());

            $zbozi = Doctrine::getTable('Zbozi')
                    ->FindOneByZboziId($value->getZboziId());

            if ($zbozi->getSkladem() > 0) {
                $pol->setStav('Skladem');
                $zbozi->setSkladem($zbozi->getSkladem() - 1);
                $zbozi->save();
            } else {
                $pol->setStav('Objednat');
            }
            $pol->setCena(UserHelper::getCena($zbozi));
//            $pol->setSleva($value->getSleva());
            $pol->setMenaId($value->getMenaId());
            $pol->setStav('Přijato');
            $pol->save();

            $value->delete();
        }

        $message = $this->getMailer()->compose(
                array(NavigationHelper::getSetting()->getEmail() => NavigationHelper::getSetting()->getSiteName()), UserHelper::getZakaznik()->getEmail(), 'Objednavka na ' . NavigationHelper::getSetting()->getSiteName(), <<<EOF
Vase obj cislo {$obj->getId()} ...
EOF
        );

        $this->getMailer()->send($message);

        $this->obj = $obj;
    }

    public function executeObj_detail(sfWebRequest $request) {

        if (UserHelper::getInstance()->aktUserName() == "") {
            $this->forward('kosik', 'login');
        } else {

            $this->obj = Doctrine::getTable('Objednavky')
                    ->createQuery('Objednavky o')
                    ->leftJoin('o.Polozky p')
                    ->leftJoin('o.Zakaznik z')
                    ->leftJoin('o.Doprava do')
                    ->leftJoin('o.Platba pl')
                    ->leftJoin('o.PobockyDoprava po')
                    ->leftJoin('o.Mena me')
                    ->where('o.id = ?', $request->getParameter('slug', 0))
                    ->fetchOne();
        }
    }

//    public function executeFak_detail(sfWebRequest $request) {
//        if (UserHelper::getInstance()->aktUserName() == "") {
//            $this->forward('kosik', 'login');
//        } else {
//            $this->fak = Doctrine::getTable('Faktura')
//                    ->createQuery('Faktura f')
//                    ->leftJoin('f.Polozky p')
//                    ->execute();
//        }
//    }

}
