<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<h1>Nová registrace uživatele</h1>
<form action="<?php echo url_for('@register') ?>" method="POST">
    <div class="registrace">
        <div class="coool">

            <?php echo $form ?>

<!--            <div class="obchodni-podminky-off">
                <span>Souhlas s obchodnímy podmínkami.</span>
            </div>-->

            <input type="submit" value="" class="submit-registrovat"/>
        </div>
    </div>
</form>
