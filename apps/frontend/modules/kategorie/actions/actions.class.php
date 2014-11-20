<?php

/**
 * kategorie actions.
 *
 * @package    Sipkova E Shop
 * @subpackage kategorie
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class kategorieActions extends sfActions {

    /**
     * Executes index action
     *
     * @param sfRequest $request A request object
     */
    public function executeIndex(sfWebRequest $request) {
        $this->kat = Doctrine::getTable('Kategorie')
                ->createQuery('kategorie k')
                ->where('k.slug = ?', $request->getParameter('slug', ''))
                ->andWhere('k.enabled = ?', 1)
                ->execute();

        $page = $request->getParameter('page');

        switch ($this->kat[0]->getTyp()) {
            case 'Zboží':
                $this->zbo = Doctrine::getTable('Zbozi')
                        ->createQuery('zbozi z')
                        ->leftJoin('z.KategorieZbozi k')
                        ->where('k.kategorie_id = ?', $this->kat[0]->getId())
                        ->andWhere('z.enabled = ?', 1)
                        ->execute();

                $this->mena = UserHelper::getInstance()->aktMena();
                $this->setTemplate('zbozi');
                break;

            case "Stránky":
                $this->str = Doctrine::getTable('Stranky')
                        ->createQuery('stranky s')
                        ->where('s.kategorie_id = ?', $this->kat[0]->getId())
                        ->andWhere('s.enabled = ?', 1)
//                        ->andWhere('s.is_homepage <> ? or s.is_homepage is null',true)
                        ->execute();

                $this->setTemplate('str');
                break;
            case "Akce":
                $this->akce = Doctrine::getTable('Akce')
                        ->createQuery('akce a')
                        ->where('a.kategorie_id = ?', $this->kat[0]->getId())
                        ->andWhere('a.enabled = ?', 1)
                        ->andWhere('a.platne_od IS NULL or a.platne_od <= ?', date('Y-m-d h:m:s'))
                        ->andWhere('a.platne_do IS NULL or a.platne_do >= ?', date('Y-m-d h:m:s'))
                        ->execute();

                $this->setTemplate('akce');
                break;

                $this->setTemplate('index');
        }
    }

}
