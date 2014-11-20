<?php
if ($str->count() > 0) {
    ?>
<!--    <div id="slider">
        <div class="slider_ramecek" id="foto"></div>
        <div class="slider_ukazatel">
            <a href="#" class="ukazslid"><span>1</span></a>
            <a href="#" class="ukazslid active"><span>2</span></a>
            <a href="#" class="ukazslid"><span>3</span></a>
            <a href="#" class="ukazslid"><span>4</span></a>
        </div>
    </div>-->
    <?php
    echo $str[0]->getRaw('popis');
}
