<?php

/**
 * produkt actions.
 *
 * @package    Sipkova E Shop
 * @subpackage produkt
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class produktActions extends sfActions {

    /**
     * Executes index action
     *
     * @param sfRequest $request A request object
     */
    public function executeIndex(sfWebRequest $request) {
        $item = Doctrine::getTable('Zbozi')
                ->createQuery('Zbozi z')
                ->leftJoin('z.Mena m')
                ->leftJoin('z.Slozeni s')
                ->leftJoin('z.Gallery g')
                ->leftJoin('g.GalleryImages i')
                ->where('z.slug = ?', $request->getParameter('slug'))
                ->execute();

        if ($item && $item->count() > 0) {
            $this->item = $item[0];
            if ($item[0]->getGalleryId() > 0) {
                $this->gal_img = Doctrine::getTable('GalleryImage')
                        ->findByGalleryId($item[0]->getGalleryId());
            }
        }

        $this->mena = UserHelper::getInstance()->aktMena();
    }

}
