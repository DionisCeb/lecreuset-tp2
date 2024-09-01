<?php
get_header();


$champs_accueil = get_fields();
$accueil_slogan =  $champs_accueil['accueil_slogan'];
$accueil_image_bg =  $champs_accueil['accueil_image_bg'];
$accueil_introduction =  $champs_accueil['accueil_introduction'];
?>
<header class="introduction-header">
    <div class="intro">
        <?php if( $accueil_image_bg ) : ?>
            <div class="bg-image-container">
                <img class="bg-image" src="<?php echo esc_html($accueil_image_bg); ?>" alt="Random PHP" />
            </div>
        <?php endif; ?>
        <?php if( $accueil_slogan ) : ?>
            <h2><?php echo esc_html($accueil_slogan); ?></h2>
        <?php endif; ?>
    </div>
    
    <?php if( $accueil_introduction ) : ?>
            <div class="introduction"><?php echo $accueil_introduction; ?></div>
        <?php endif; ?>
    </header>
    <?php


get_footer();


?>