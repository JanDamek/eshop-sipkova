<?php

/**
 * objednavka actions.
 *
 * @package    E Shop
 * @subpackage objednavka
 * @author     Jan Damek, damekjan74@gmail.com
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class objednavkaActions extends sfActions {

    /**
     * Executes index action
     *
     * @param sfRequest $request A request object
     */
    public function executeIndex(sfWebRequest $request) {
        $this->obj_id = $request->getParameter('obj_id', 0);
        if ($this->obj_id == 0)
            $this->redirect('@login');

        $this->obj = Doctrine::getTable('Objednavky')
                ->findOneById($this->obj_id);
        if (!$this->obj)
            $this->redirect($request->getReferer());

        if ($this->obj->getZakaznikId() != UserHelper::aktUserId())
            $this->redirect('@login');
    }

    public function executeStorno(sfWebRequest $request) {
        $this->obj_id = $request->getParameter('obj_id', 0);
        if ($this->obj_id == 0)
            $this->redirect('@login');

        $this->obj = Doctrine::getTable('Objednavky')
                ->findOneById($this->obj_id);
        if (!$this->obj)
            $this->redirect($request->getReferer());

        if ($this->obj->getZakaznikId() != UserHelper::aktUserId())
            $this->redirect('@login');
    }

    public function executePay(sfWebRequest $request) {
        $this->obj_id = $request->getParameter('obj_id', 0);
        if ($this->obj_id == 0)
            $this->redirect('@login');

        $this->obj = Doctrine::getTable('Objednavky')
                ->findOneById($this->obj_id);
        if (!$this->obj)
            $this->redirect($request->getReferer());

        if ($this->obj->getZakaznikId() != UserHelper::aktUserId())
            $this->redirect('@login');

        $this->webpay = Doctrine::getTable('WebPay')
                ->createQuery('WebPay wp')
                ->where('wp.zeme_urceni_id=?', $this->obj->getDoprava()->getZemeUrceniId())
                ->andWhere('wp.enabled = ?', true)
                ->execute();

        $this->eplatba = Doctrine::getTable('ePlatba')
                ->createQuery('ePlatba wp')
                ->where('wp.zeme_urceni_id=?', $this->obj->getDoprava()->getZemeUrceniId())
                ->andWhere('wp.enabled = ?', true)
                ->execute();

        $this->paypal = Doctrine::getTable('PayPal')
                ->createQuery('PayPal wp')
                ->where('wp.zeme_urceni_id=?', $this->obj->getDoprava()->getZemeUrceniId())
                ->andWhere('wp.enabled = ?', true)
                ->execute();
    }

    public function executeDostorno(sfWebRequest $request) {
        $this->obj_id = $request->getParameter('obj_id', 0);
        if ($this->obj_id == 0)
            $this->redirect('@login');

        $this->obj = Doctrine::getTable('Objednavky')
                ->findOneById($this->obj_id);
        if (!$this->obj)
            $this->redirect($request->getReferer());

        if ($this->obj->getZakaznikId() != UserHelper::aktUserId())
            $this->redirect('@login');

        $this->obj->setTyp('Stornováno');
        $this->obj->save();

        $this->redirect('@username');
    }

    public function executePlatbaok(sfWebRequest $request) {
        $this->obj_id = $request->getParameter('obj_id', 0);
        if ($this->obj_id == 0)
            $this->redirect('@login');

        $this->obj = Doctrine::getTable('Objednavky')
                ->findOneById($this->obj_id);
        if (!$this->obj)
            $this->redirect($request->getReferer());

        if ($this->obj->getZakaznikId() != UserHelper::aktUserId())
            $this->redirect('@login');

        //proces platby OK
        $this->obj->setStav('Zaplaceno');
        $this->obj->save();

        $this->redirect('@username');
    }

    public function executePlatbano(sfWebRequest $request) {
        $this->obj_id = $request->getParameter('obj_id', 0);
        if ($this->obj_id == 0)
            $this->redirect('@login');

        $this->obj = Doctrine::getTable('Objednavky')
                ->findOneById($this->obj_id);
        if (!$this->obj)
            $this->redirect($request->getReferer());

        if ($this->obj->getZakaznikId() != UserHelper::aktUserId())
            $this->redirect('@login');

        //proces platby zamitnuto

        $this->redirect('@username');
    }

}
