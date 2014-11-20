<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
Zapomenuté heslo uživatele
<form action="<?php echo url_for('kosik/forgoton') ?>" method="POST">
  <table>
    <?php echo $form ?>
    <tr>
      <td colspan="2">
        <input type="submit" />
      </td>
    </tr>
  </table>
</form>