<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
//echo link_to('web pay','@web_pay?obj_id='.$obj->getId());
?>
<h2>Dokončení objednávky proběhlo úspěšně.</h2>
<ul>
<?php 
if ($obj->getPlatba()->getSystemPlatby()=='OnLine'){
    ?>
    <li>Platbu objednávky můžete provést <?php echo link_to('zde','@pay?obj_id='.$obj_id);?></li>
    <li>Platbu můžete provést také kdykoliv pozdeji</li>
<?php 
} 
?>
    <li><?php echo link_to('Seznam objednávek','@username');?></li>
</ul>
