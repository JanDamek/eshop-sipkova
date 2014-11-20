<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
use_helper('ImageResizer');
?>
Zaplatit objednávku číslo <?php echo $obj_id; ?> na částku <?php
echo $obj->getCelkem() . ' ' .
 $obj->getMena()->getOznaceni();
?><br />
<br />
<ul>
    <?php if (isset($webpay)) : ?>
        <li><?php
    if ($webpay[0]->getImg() != '')
        echo link_to(image_tag(image_resizer(105, 50, $webpay[0]->getImg())), '@webpay?obj_id=' . $obj_id,array('class'=>'pay_img'));
    echo link_to('WebPay', '@webpay?obj_id=' . $obj_id,array('class'=>'pay_link'));
        ?>
        </li>
        <?php
    endif;
    if (isset($paypal)) :
        ?>
        <li><?php 
    if ($paypal[0]->getImg() != '')
        echo link_to(image_tag(image_resizer(105, 50, $paypal[0]->getImg())), '@paypal?obj_id=' . $obj_id,array('class'=>'pay_img'));
        echo link_to('PayPal', '@paypal?obj_id=' . $obj_id,array('class'=>'pay_link')); ?></li>
        <?php
    endif;
    if (isset($eplatba)) :
        ?>
        <li><?php 
    if ($eplatba[0]->getImg() != '')
        echo link_to(image_tag(image_resizer(105, 50, $eplatba[0]->getImg())), '@eplatba?obj_id=' . $obj_id,array('class'=>'pay_img'));
        echo link_to('ePlatba', '@eplatba?obj_id=' . $obj_id,array('class'=>'pay_link')); ?></li>
<?php endif; ?>
</ul>