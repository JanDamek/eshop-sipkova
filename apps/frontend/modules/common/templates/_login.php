<div class="wrap">
<?php
if ($logged==""){
echo link_to('přihlásit se','@login',array('class'=>'prihlas'));
echo '&nbsp;';
echo link_to('registrovat se','@register',array('class'=>'prihlas'));
echo '&nbsp;';
echo link_to('velkoobchod','@login_vel',array('class'=>'prihlas'));
} else {
echo link_to($logged,'@username',array('class'=>'prihlas'));    
echo '&nbsp;&nbsp;&nbsp;';
echo link_to('odhlásit','@logout',array('class'=>'prihlas'));
}
?>
</div>
