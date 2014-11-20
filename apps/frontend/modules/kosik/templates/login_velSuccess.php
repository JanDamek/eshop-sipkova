<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<h1>Přihlášení pro velkoobchod</h1>
<div class="prihlaseni">
    <form action="<?php echo url_for('kosik/login_vel') ?>" method="POST">
        <input type="text" name="login[username]" value="" class="inp-text" size="40" title="Vaše jméno"/>
        <input type="password" name="login[password]" value="" class="inp-text" size="40" title="Heslo"/>
        <input type="submit" value="" class="submit-prihlasit"/><br />
        <?php
        echo link_to('Zapomenute heslo', '@zapomenute_heslo', array('class' => 'but-decor'));
        echo link_to('registrovat se', '@register', array('class' => 'but-decor'));
        ?>
    </form>
</div>