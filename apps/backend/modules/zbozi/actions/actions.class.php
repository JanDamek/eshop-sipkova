<?php

require_once dirname(__FILE__) . '/../lib/zboziGeneratorConfiguration.class.php';
require_once dirname(__FILE__) . '/../lib/zboziGeneratorHelper.class.php';

/**
 * zbozi actions.
 *
 * @package    Sipkova E Shop
 * @subpackage zbozi
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class zboziActions extends autoZboziActions {

    public function executeAjaxGallery($request) {
        $this->getResponse()->setContentType('application/json');

        $authors = Doctrine::getTable('Zbozi')->retrieveForSelect(
                $request->getParameter('q'), $request->getParameter('limit')
        );
        $authors[''] = ' ... ';
        return $this->renderText(json_encode($authors));
    }

}
