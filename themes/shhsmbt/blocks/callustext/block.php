<?php
    if (get_theme_mod('phonenumber')){
        $phone = get_theme_mod('phonenumber');
    }else{
        $phone = block_value('phone');
    }
    $text = block_value('text') . ' ';
?>
<p class="call-us-text h2"> <? echo $text; ?> <a href="tel:<? echo $phone ?>"><? echo $phone ?></a></p>