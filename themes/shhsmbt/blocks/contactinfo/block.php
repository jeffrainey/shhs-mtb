<?php
    if(block_value('phone')){
        $phone = block_value('phone');
    }else{
        $phone = get_theme_mod('phonenumber');
    }
    if(block_value('email')){
        $email = block_value('email');
    }else{
        $email = get_theme_mod('email');
    }
    if(block_value('address')){
        $address = block_value('address');
    }else{
        $address = get_theme_mod('address_street') . ', ' . get_theme_mod('address_city') . ', ' . get_theme_mod('address_state') . ', ' . get_theme_mod('address_zip');
    }
?>
<div class="contactinfo-section">
    <div class="contactinfo-content">
        <h2>Our Address</h2>
        <p class="contact-address"><? echo $address; ?></p>
    </div>
    <div class="contactinfo-content">
        <h2>Email Us</h2>
        <p class="contact-email"><? echo $email; ?></p>
    </div>
    <div class="contactinfo-content">
        <h2>Call Us</h2>
        <p class="contact-phone"><? echo $phone; ?></p>
    </div>
</div>