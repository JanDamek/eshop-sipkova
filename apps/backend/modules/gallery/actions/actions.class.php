<?php

require_once dirname(__FILE__).'/../lib/galleryGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/galleryGeneratorHelper.class.php';

/**
 * gallery actions.
 *
 * @package    femina.cz
 * @subpackage gallery
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class galleryActions extends autoGalleryActions
{
  public function executeDeleteImage(sfWebRequest $request)
  {
    $image = Doctrine::getTable('GalleryImage')->findOneById($request->getParameter('id'));
    $image->delete();
  
    return sfView::NONE;
  }
  
  public function executeSortimages(sfWebRequest $request)
  {
    foreach($request->getParameter('listItem') as $position => $item)
    {
      $image = Doctrine::getTable('GalleryImage')->findOneById($item);
      if($image != null)
      {
        $image->setOrd($position);
        $image->save();
      }
    }
  
    return sfView::NONE;
  }
  
  public function executeAjaxGallery($request)
  {
    $this->getResponse()->setContentType('application/json');
 
    $authors = Doctrine::getTable('Gallery')->retrieveForSelect(
      $request->getParameter('q'),
      $request->getParameter('limit')
    );
    $authors[''] = ' ... ';
    return $this->renderText(json_encode($authors));
  }
}
