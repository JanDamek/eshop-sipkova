<?php
foreach ($str as $value) {
    echo "<h2>" . $value->getTitle() . "</h2>";
    echo "<b>" . $value->getPerex() . "</b><br />" . $value->getRaw('popis');
}