<?php

/**
 * homepage actions.
 *
 * @package    Sipkova E Shop
 * @subpackage homepage
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class homepageActions extends sfActions {

    /**
     * Executes index action
     *
     * @param sfRequest $request A request object
     */
    public function executeIndex(sfWebRequest $request) {
        $resp = $this->getResponse();

        $this->str = Doctrine::getTable('Stranky')
                ->createQuery('stranky s')
                ->andWhere('s.enabled = ?', 1)
                ->andWhere('s.is_homepage = ?', true)
                ->execute();

        if ($this->str->count() > 0) {
            $resp->setTitle($this->str[0]->getTitle().' | '.NavigationHelper::getSetting()->getSitename());            
        }else
            $resp->setTitle('ESHOP');
    }

}
