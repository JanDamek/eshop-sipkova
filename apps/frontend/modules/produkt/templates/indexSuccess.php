<?php use_helper('ImageResizer', 'User', 'Number', 'Lightbox'); ?>
<div class="produkt_solo">
    <div class="imgp_solo">
        <?php
        if (isset($gal_img) && $gal_img->count() > 0) {
            $images = array();
            $link_options = array(
                'title' => 'Fotogalerie',
                'size' => '880x530',
                'speed' => '20'
            );
            foreach ($gal_img as $value) {
                $images[] = array(
                    'thumbnail' => image_resizer(100, 80, $value->getPath()),
                    'image' => image_resizer(870, 500, $value->getPath()),
                    'options' => array('title' => $value->getTitle(), 'alt' => $value->getTitle())
                );
            }
            echo light_slide_text(
                    image_tag(image_resizer(310, 165, $item->getPerexImg()), array('title' => $item->getName(), 'alt' => $item->getName()))
                    , $images, $link_options);
        } else
            echo image_tag(image_resizer(310, 165, $item->getPerexImg()), array('title' => $item->getName(), 'alt' => $item->getName()));
        ?>
    </div>
    <div class="nadpis">
        <?php
        if ($item->getNazevImg() == "") {
            echo "<center><big>" . $item->getName() . "</big></center>";
        } else {
            echo image_tag(image_resizer(310, 45, $item->getNazevImg()), array('title' => $item->getName(), 'alt' => $item->getName()));
        }
        ?>
    </div>
    <p><?php echo $item->getRaw('perex'); ?></p>
    <?php if ($item->getBaleni() != '') : ?>
        <p>Balení : <?php echo $item->getBaleni(); ?></p>
    <?php endif; ?>
    <div class="meta">
        <?php
        $cena = UserHelper::getInstance()->getCena($item);
        if (UserHelper::$je_sleva) {
            ?>    
            <div class="cena skrtnuti">cena:  <strong><?php echo format_currency(UserHelper::getInstance()->cena_zbozi($item->getCena(), $item->getMenaId())) . ' ' . $mena; ?></strong></div>
            <div class="posleve">cena po slevě:  <strong><?php echo format_currency($cena) . ' ' . $mena; ?></strong></div>
        <?php } else {
            ?>
            <div class="cena">cena:  <strong><?php echo format_currency(UserHelper::getInstance()->cena_zbozi($item->getCena(), $item->getMenaId())) . ' ' . $mena; ?></strong></div>
            <?php
        }
        echo link_to("<span>koupit</span>", "@koupit?slug=" . $item->getSlug(), array('class' => "koupit"));
        ?>
    </div>
    <div class="oproduktu">
        <p><?php echo $item->getRaw('popis'); ?></p>
        <?php if ($item->getSlozeni()->count() > 0) : ?>
            <h3>Složení:</h3>
            <?php foreach ($item->getSlozeni() as $slozeni) : ?>
                <p>
                    <?php echo image_tag(image_resizer(115, 80, $slozeni->getImg()), array('title' => $slozeni->getTitle(), 'alt' => $slozeni->getTitle(), 'class' => "ilustracni_foto")); ?>
                    <strong><?php echo $slozeni->getTitle(); ?></strong> <?php echo $slozeni->getPopis(); ?>
                </p>
                <?php
            endforeach;
        endif;
        ?>

    </div>
</div>
<div id="fb-root"></div>
<script>(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/cs_CZ/all.js#xfbml=1&appId=<?php echo NavigationHelper::getSetting()->getFacebookId(); ?>";
    fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<fb:comments href="http://www.facebook.com/<?php echo NavigationHelper::getSetting()->getFacebookUrl(); ?>" num_posts="40" width="650"></fb:comments>

