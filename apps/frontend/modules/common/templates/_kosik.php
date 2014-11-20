<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
use_helper('Number');
$link = link_to('více »','@kosik');
echo 
'<div id="kosik"><p>košík: <span>'.  format_currency($castka).' '.$mena.'</span>'.$link.'</p></div>';
