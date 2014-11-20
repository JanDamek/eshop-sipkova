<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<h1>Nastavení uživatele</h1>
<div class="registrace">
    <div class="coool">
        <form action="<?php echo url_for('kosik/username') ?>" method="POST">

            <?php echo $form ?>

            <input type="submit" value="Změnit" class="submit-zmenit"/>
        </form>
    </div>
</div>
