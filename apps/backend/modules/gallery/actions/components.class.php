<?php
class galleryComponents extends sfComponents
{
  public function executeShowGalleryImages(sfWebRequest $request)
  {
    $galleryId = $request->getParameter('id');
    if($galleryId)
    {
      $query = Doctrine_Query::create()->from('GalleryImage i')
        ->where('i.gallery_id = ?', $galleryId)
        ->orderBy('i.ord ASC');

      $this->images = $query->execute();
    }
  }
}