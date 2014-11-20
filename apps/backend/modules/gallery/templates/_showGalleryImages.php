<?php use_javascript('admin'); ?>
<?php use_helper('jQuery'); ?>
<?php use_helper('ImageResizer'); ?>

  <div id="info"></div>
  <div id="imagesList">
    <ul id="images-list">
      <?php if (!empty($images)): ?>
      <?php foreach ($images as $image): ?>
        <li id="listItem_<?php echo $image->getId(); ?>">
          Název: <strong><?php echo $image->getTitle(); ?></strong><br />
          Alternativní text: <strong><?php echo $image->getAlt(); ?></strong><br />
          <img src="/sfDoctrinePlugin/images/desc.png" alt="move" width="16" height="16" class="handle" />
          <?php echo jq_link_to_remote(image_tag('/sfDoctrinePlugin/images/delete.png', array()), array(
                       'url' => '@gallery_delete_image?id=' . $image->getId(),
                       'complete' => '$("#listItem_' . $image->getId() . '").hide();',
                        ), array('style' => 'background-image: none;')); ?>
          <?php echo image_tag(image_resizer(150,120,$image->getPath())); ?>
        </li>
      <?php endforeach; ?>
      <?php endif; ?>
    </ul>
  </div>
