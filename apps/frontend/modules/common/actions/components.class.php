<?php

use_helper('Navigation', 'User');

class commonComponents extends sfComponents {

    public function executeLogin() {
        $user = UserHelper::getInstance();
        $this->logged = $user->aktUserName();
        if ($this->logged == '') {
            $user->doLogin($this->request);
            $this->logged = $user->aktUserName();
        }
    }

    public function executeTopmenu() {
        $this->topmenu = Doctrine::getTable('Kategorie')
                ->createQuery('kategorie k')
                ->where('k.pozice = ?', 'Horní pruh')
                ->andWhere('k.enabled= ?', 1)
                ->orderBy('k.poradi')
                ->execute();
    }

    public function executeKosik() {
        $user = UserHelper::getInstance();
        $user->doLogin($this->request);
        $this->castka = $user->celkemKosik();
        $this->mena = $user->aktMena();
    }

    public function executeLeftmenu() {
        $this->leftmenu = Doctrine::getTable('Kategorie')
                ->createQuery('kategorie k')
                ->where('k.pozice = ?', 'Levý sloupec')
                ->andWhere('k.enabled= ?', 1)
                ->orderBy('k.poradi')
                ->execute();
    }

    public function executeNovinky() {
        $this->akce = Doctrine::getTable('Akce')
                ->createQuery('akce a')
                ->where('a.enabled = ?', 1)
                ->andWhere('a.platne_od IS NULL or a.platne_od <= ?', date('Y-m-d h:m:s'))
                ->andWhere('a.platne_do IS NULL or a.platne_do >= ?', date('Y-m-d h:m:s'))
                ->orderBy('a.platne_od desc, a.id desc')
                ->limit('3')
                ->execute();
    }

    public function executeDownmenu() {
        $this->downmenu = Doctrine::getTable('Kategorie')
                ->createQuery('kategorie k')
                ->where('k.pozice = ?', 'Dolní pruh')
                ->andWhere('k.enabled= ?', 1)
                ->orderBy('k.poradi')
                ->execute();
    }

}