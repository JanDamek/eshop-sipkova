<?php

/**
 * akce actions.
 *
 * @package    Sipkova E Shop
 * @subpackage akce
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class akceActions extends sfActions {

    /**
     * Executes index action
     *
     * @param sfRequest $request A request object
     */
    public function executeIndex(sfWebRequest $request) {
        $this->akce = Doctrine::getTable('Akce')
                ->findOneBySlug($request->getParameter('slug', ''));
    }

}
